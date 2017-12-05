<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Observer - using push method:
// - subscribed observers get attached to listings.
// - a message (post form) comes from business managers will be pushed to the observers.
// - this can contain message, promotions..etc.
// - observer model is loaded in both user and businessOwner controllers to enable pushing info.
// - a table in db called messages will link the listing id, user id and the pushed info.
// - sends email to observers


class ObserverModel extends CI_Model {
    protected $state;
    protected $emailList;
    
    public function __construct() {
        parent::__construct();
        $this->state = 0;
    }
    
    public function subscribe($uid, $lid){

        // create new objects
        $newSubject = new ConcreteSubject;
        $newObserver = new ConcreteObserver;
        
        // call setters
        $newSubject->setListingID($lid);
        $newObserver->setUserID($uid);
        
        $data['lid'] = $newSubject->getListingID();
        $data['uid'] = $newObserver->getUserID();
        
        // attach observer to subject
        return $newSubject->attach($newObserver);
    }
    
    
    public function unsubscribe($uid, $lid){
        
        $newSubject = new ConcreteSubject;
        $newObserver = new ConcreteObserver;
        
        $newSubject->setListingID($lid);
        $newObserver->setUserID($uid);
        
        
        $data['lid'] = $newSubject->getListingID();
        $data['uid'] = $newObserver->getUserID();
        
        return $newSubject->detach($newObserver);
    }
    
    public function notify($data){
        
        /*
        creates new subject to link new msg then gets observers from db
        then pushes new data to the list of observers
        
        */
        
        // create objects
        $Listing = new ConcreteSubject;
        $Observer = new ConcreteObserver;
        
        // set listing id and data
        $Listing->setListingID($data['lid']);
        $Listing->setData($data);
        

        // get list of observers from db
        $observerslist = $Listing->getListOfObservers();
        
        // set list of observers as ConcreteObservers
        $Listing->setObservers($observerslist); 
        
        $Listing->getObservers();
        
        $this->setEmails($Listing);
        
        // push to observers
        $Listing->push();
        
        return $this->changeState();
        // send email notification to observers

    }
    
    function changeState(){
        return $this->state = 1;
    }
    
    public function getState(){
        return $this->state;
    }
    
    public function setEmails($Listing){
        $observers = $Listing->getObservers();
        
        foreach($observers as $obs) {
            $this->emailList[] = json_decode(json_encode($obs->getEmail()), True);
        }
        
        return;
    }
    
    public function getEmails(){
        return $this->emailList;
    }
    
} // end of Observer class

abstract class abstractSubject{
    
    public function __construct() {
        
    }
    
    abstract function setListingID($newlid);
    abstract function setData($data);
    abstract function setObservers($observersList);
    
    abstract function getData();
    abstract function getListingID();
    abstract function getListOfObservers(); // from db
    abstract function getObservers();
    abstract function getEmail($lid); // from db
    
    abstract function attach(abstractObserver $newObserver);
    abstract function detach(abstractObserver $Observer);
    abstract function push();
    abstract function insert($data);
    abstract function deleteObserver($data);
    
}

abstract class abstractObserver{
    public function __construct() {
        
    }
    
    abstract function setUserID($newuid);
    abstract function getUserID();
    abstract function setEmail($email);
    abstract function getEmail();
    abstract function update(abstractSubject $ObservedListing);
}


class ConcreteSubject extends abstractSubject {
    protected $lid;
    protected $CI;
    protected $data;
    protected $observers;
    
    public function __construct() {
        parent::__construct();
        $this->CI =& get_instance();
        $this->lid = "";
    }
    
    public function setListingID($newlid){
        return $this->lid = $newlid;
    }
    
    public function setData($data){
        return $this->data = $data;
    }
    
    
    public function setObservers($observersList){
        /*
            get list of observers' ids and inserts them in $observers[]
            as ConcreteObservers
        */
        foreach($observersList as $row){
            
            $newObserver = new ConcreteObserver;
            
            $newObserver->setUserID($row->uid);
            
            // get email
            $email = $this->getEmail($row->uid);
            
            $newObserver->setEmail($email);
            
            $this->observers[] = $newObserver;
        }
    }
    
    public function getData(){
        return $this->data;
    }
    
    public function getEmail($uid){
        $this->CI->db->select('email');
        $this->CI->db->where('uid', $uid);
        $query = $this->CI->db->get('user');
        
        return $query->result();
    }
    public function getMessage(){
        $msg = $this->data['message'];
        return $msg;
    }
    
    public function getListingID(){
        return $this->lid;
    }
    
    public function getObservers(){
        return $this->observers;
    }
    
    public function getListOfObservers(){
        // this function gets list of observers from db
        
        $list;
        $lid = $this->lid;
        
        $this->CI->db->select('uid');
        $this->CI->db->where('lid', $lid);
        $query = $this->CI->db->get('Subscriptions');
        
        return $query->result();
    }
    
    public function attach(abstractObserver $newObserver) {
        
        /*
        attaching an observer to a subject is done by inserting a new instance
        in the Subscriptions table in the db instead of an array. 
        This table in the db will link subject and its observers for later retrieval
        */

        $newSub = array(
            'uid' => $newObserver->getUserID(),
            'lid' => $this->getListingID()
            );

        return $this->insert($newSub);
    }
    
    public function detach(abstractObserver $Observer) {
        /*
        detaching an observer to a subject is done by deleting their link on the db
        */
        
        $newSub = array(
            'uid' => $Observer->getUserID(),
            'lid' => $this->getListingID()
            );
       
        return $this->deleteObserver($newSub);
    }
    
    public function insert($data){
        return $this->CI->db->insert('Subscriptions', $data);
    }
    
    public function deleteObserver($data){
        $this->CI->db->where('uid', $data['uid']);
        $this->CI->db->where('lid', $data['lid']);
        return $this->CI->db->delete('Subscriptions');
    }
    
    
    public function push(){
        // iterates through observers list and calls update()
        // update() -  takes the message data array and send it to insert()
        
        foreach($this->observers as $obs) {
            $obs->update($this);
        }
        
        
    }
}


class ConcreteObserver extends abstractObserver{
    protected $uid;
    protected $CI;
    protected $email;
    
    public function __construct() {
        parent::__construct();
        $this->uid = "";
        $this->CI =& get_instance();
    }
    
    function setUserID($newUid){
        return $this->uid = $newUid;
    }
    
    function getUserID(){
        return $this->uid;
    }
    
    function setEmail($email){
        return $this->email = $email;
    }
    
    function getEmail(){
        return $this->email;
    }
    
    function update(abstractSubject $ObservedListing){
        // takes data and inserts it into db
        
        $newBroadcast = array(
            'lid' => $ObservedListing->getListingID(),
            'uid' => $this->uid,
            'message' => $ObservedListing->getMessage()
            );
            
        return $this->CI->db->insert('Messages', $newBroadcast);
    }

} // end of ConcreteObserver class


?>