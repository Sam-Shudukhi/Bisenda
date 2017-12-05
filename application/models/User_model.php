<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class User_Model extends CI_Model {

        public function __construct() 
        {
            parent::__construct();
        }

                // verify login information
        function get_user($usr, $pwd)
        {

            $query = $this->db->get_where('user', array('email' => $usr,'pass'=>md5($pwd)));
            
                  if($query->num_rows() > 0){
                      foreach($query->result() as $row){
                          $data[] = $row;
                      }
                      return $data;
                  } else {
                      
                  }
                  return false;
        }
        
        // check if user account is confirmed
        public function checkAccountConfirmed($usr,$pwd) {
            $query = $this->db->get_where('user', array('email' => $usr,'pass'=>md5($pwd), 'confirmed'=>1));
            
                  if($query->num_rows() > 0){
                      foreach($query->result() as $row){
                          $data[] = $row;
                      }
                      return $data;
                  } else {
                      
                  }
                  return false;
        }

                //insert into user table
        public function insertuser($data)
        {
            return $this->db->insert('user', $data);
        }
        public function verifyemail($key)
        {
            $data = array('confirmed' => 1);
            $this->db->where('md5(email)', $key);
            return $this->db->update('user', $data);
        }

        public function getUserInformation() {
            $userEmail = $this->session->userdata['logged_in']['username'];
            $query = $this->db->get_where('user', array('email' => $userEmail));
            if ($query->num_rows() > 0) {
             foreach ($query->result() as $row) {
                 $data[] = $row;
             }
             return $data;
         }
         return false;
     }


     public function getUserId() {
        $userEmail = $this->session->userdata['logged_in']['username'];
        $this->db->select('uid')->from('user')->where('email',$userEmail);
        $query = $this->db->get();
        return $query->result();
    }



    public function getUserNotes() {
        $userId = $this->getUserId();
        $lid = '';
        foreach ($userId as $key) {
            $uid = $key->uid;
        }
        $this->db->select('UserNotes.*,BusinessListing.title');
        $this->db->from('BusinessListing');
        $this->db->join('UserNotes', 'BusinessListing.lid = UserNotes.lid AND UserNotes.uid = '.$uid, 'inner');
        $this->db->distinct();
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }

    public function getUserReviews() {
        $userId = $this->getUserId();
        $lid = '';
        foreach ($userId as $key) {
            $uid = $key->uid;
        }
        $this->db->select('UserReviews.*,BusinessListing.title');
        $this->db->from('BusinessListing');
        $this->db->join('UserReviews', 'BusinessListing.lid = UserReviews.lid AND UserReviews.uid = '.$uid, 'inner');
        $this->db->distinct();
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }

        public function getUserBookings() {
        $userId = $this->getUserId();
        $lid = '';
        foreach ($userId as $key) {
            $uid = $key->uid;
        }
        $this->db->select('ReserveRestaurantTable.*,BusinessListing.*,RestaurantTables.*,Tables.t_name');
        $this->db->from('BusinessListing');
        $this->db->join('ReserveRestaurantTable', 'BusinessListing.lid = ReserveRestaurantTable.lid AND ReserveRestaurantTable.uid = '.$uid, 'inner');
        $this->db->join('RestaurantTables', 'ReserveRestaurantTable.rid = RestaurantTables.rid');
        $this->db->join('Tables','Tables.tid = RestaurantTables.table_type');
        $this->db->distinct();
        $query = $this->db->get();
        return $query->result();
    }

    function updateUserInfo($id,$data){
                $this->db->where('uid', $id);
                return $this->db->update('user', $data);
    }

    function updatePassword($id,$data){
        $this->db->where('uid', $id);
        $this->db->update('user', $data);
    }

    function deleteNote($user_id,$note_id){
        $this->db->where('uid', $user_id);
        $this->db->where('nid', $note_id);
        $this->db->delete('UserNotes');
    }
    
    function getUserSubscriptions($uid) {
        $this->db->select('*')->from('Subscriptions')->where('uid',$uid);  
        $query = $this->db->get();
        return $query->result();
    }
    

    
    function add_note($uid,$lid,$note){
        $this->db->insert('UserNotes', array('lid'=>$lid,'uid'=>$uid,'note'=>$note));
    }
    
    function getMessages($userInfo){
        // get mail from messages table
        
        foreach($userInfo as $row){
            $uid = $row->uid;
        }
            $this->db->select('Messages.message, BusinessListing.title');
            $this->db->from('BusinessListing');
            $this->db->join('Messages', 'BusinessListing.lid = Messages.lid AND Messages.uid = '.$uid);
            $query = $this->db->get();
            $query_result = $query->result();
             return $query_result;
    }
    
    function getListSubscriptions($userInfo){
        // get List of Subscriptions from db
        
        foreach($userInfo as $row){
            $uid = $row->uid;
        }
        
            $this->db->select('Subscriptions.*, BusinessListing.*');
            $this->db->from('BusinessListing');
            $this->db->join('Subscriptions', 'BusinessListing.lid = Subscriptions.lid AND Subscriptions.uid = '.$uid);
            $query = $this->db->get();
            $query_result = $query->result();
             return $query_result;
    }
    
  function getDeals($userInfo){
        // get deals from db
        
        foreach($userInfo as $row){
            $uid = $row->uid;
        }
            $this->db->select('Subscriptions.*, BusinessListing.*, Deals.*');
            $this->db->from('BusinessListing');
            $this->db->join('Subscriptions', 'BusinessListing.lid = Subscriptions.lid AND Subscriptions.uid = '.$uid);
            $this->db->join('Deals', 'BusinessListing.lid = Deals.lid', 'inner');
            $query = $this->db->get();
            return $query->result();
    }
    
    public function do_upload($img)
        {
                $config['upload_path']          = base_url().'/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2000;
                $config['max_width']            = 2000;
                $config['max_height']           = 1500;
                $this->upload->data($img); 

                return $this->upload->do_upload($img);
        }
        
        // remove / delete an appointment
        public function deleteAppointment($rid) {
            $this->db->where('reserve_table_id',$rid);
            return $this->db->update('ReserveRestaurantTable', array('cancelled'=>3));
        }
        
        // add / insert a new table reservation
        public function insertBooking($data) {
            return $this->db->insert('ReserveRestaurantTable',$data);
        }
        
        // check if user owns the comment before removing it
        public function getReviewOwner($rid) {
            $this->db->select('uid')->from('UserReviews')->where('rid',$rid);
            $query = $this->db->get();
            return $query->result();
        }
        
        // remove user comment if is owned by that user
        public function removeComment($rid) {
            $this->db->where('rid', $rid);
            $this->db->delete('UserReviews');
        }
     
} // end of class

