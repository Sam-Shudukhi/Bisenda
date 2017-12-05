<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Simple Factory 
    When new user register as Business Owner there two things that happen:
    1- Controller will call Factory model passing user info to create the the listing 
    based on what the user info contains, specifically $listingData['booking'] will carry a value of 1,2 or 3
    that will be checked by ConcreteBusinessFactory to create the correct listing type.
    2- The Factory will also add hours if the business listing is for "Restaurant"

*/

class Factory extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function create($listingData){
        // create Factory
        $BusinessFactory = new ConcreteBusinessFactory;
        
        // create listing and return type of listing
        $listing =  $BusinessFactory->createListing($listingData);

        // insert new business listing
        return $BusinessFactory->insert($listing);

    }
    
} // end of Factory class

class ConcreteBusinessFactory{
    protected $CI;
    protected $lid;
    public function __construct() {
        $this->CI =& get_instance();
    }

    public function createListing($listingData)
    {
        
            // determine type, create listing and return it
        if ($listingData['booking'] == 1) {
                $listing = new BusinessWithExternalBooking($listingData);
                return $listing;
        }
        else if ($listingData['booking'] == 2) {
                $listing = new BusinessWithBisendaBooking($listingData);
                return $listing;
        }
        else if ($listingData['booking'] == 3) {
                $listing = new BusinessListing($listingData);
                return $listing;
        }
        else{
            return false;
        }
    }
    
    public function insert($listing){
        $listingData = $listing->getData();
        $this->CI->db->insert('BusinessListing', $listingData);
        
        $this->lid = $this->CI->db->insert_id();
        return $this->insertHours();
    }
    
    public function insertHours(){
        
        $hours = array(
            array(
                'lid' => $this->lid,
                'did' => 1,
                'active' => 0
                ),
            array(
                'lid' => $this->lid,
                'did' => 2,
                'active' => 0
                ),
            array(
                'lid' => $this->lid,
                'did' => 3,
                'active' => 0
                ),
                
            array(
                'lid' => $this->lid,
                'did' => 4,
                'active' => 0
                ),
            array(
                'lid' => $this->lid,
                'did' => 5,
                'active' => 0
                ),
            array(
                'lid' => $this->lid,
                'did' => 6,
                'active' => 0
                ),
                array(
                'lid' => $this->lid,
                'did' => 7,
                'active' => 0
                )
            );

    return $this->CI->db->insert_batch('BusinessHours', $hours);
    }
    
} // end of ConcreteBusinessFactory class

class ConcreteListing{
    protected $CI;
    protected $data;

    public function __construct($data) {
        $this->CI =& get_instance();
        $this->setData($data);
        $this->data['bid'] = $this->getBusinessID($data['email']);
    }
    
    function setData($data){
        return $this->data = $data;
    }

    function getData(){
        return $this->data;
    }
    
    public function getBusinessID($email){
        $query = $this->CI->db->get_where('BusinessOwner', array('email' => $email));
            
            if($query->num_rows() > 0){
                foreach($query->result() as $row){
                    $bid = $row->bid;
                }
                return $bid;
            }
            else{
                return false;
                }
    }
}

class BusinessListing extends ConcreteListing {
    public function __construct($data) {
        parent::__construct($data);
    }
}

class BusinessWithBisendaBooking extends ConcreteListing {
      public function __construct($data) {
        parent::__construct($data);

    }
}

class BusinessWithExternalBooking extends ConcreteListing {
    public function __construct($data) {
        parent::__construct($data);
    }
}

?>