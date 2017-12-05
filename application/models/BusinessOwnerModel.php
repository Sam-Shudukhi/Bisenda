<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BusinessOwnerModel extends CI_Model {
    
            public function __construct()
            {
                    parent::__construct();
                    // Your own constructor code
            }

            public function get_last_ten_entries()
            {
                    $query = $this->db->get('BusinessOwner', 10);
                    return $query->result();
            }
            
            // verify login information
            function get_user($usr, $pwd)
            {
                $sql = "select * from BusinessOwner where email = '" . $usr . "' and password = '" . md5($pwd) . "'";
                $query = $this->db->query($sql);
                return $query->num_rows();
            }

            //insert into user table
            public function insertuser($ownerData){
            // insert new owner information
            return $this->db->insert('BusinessOwner', $ownerData);
            }

        // confirm email owner signed up with
            public function verifyemail($key){
                $data = array('confirmed' => 1);
                   $this->db->where('md5(email)', $key);
                   return $this->db->update('BusinessOwner', $data);
             }
        
        
            public function getID(){
                   $BusinessOwnerEmail = $this->session->userdata['BusinessOwner_logged_in']['username'];
                   $query = $this->db->get_where('BusinessOwner', array('email' => $BusinessOwnerEmail));
            
                   if($query->num_rows() > 0){
                       foreach($query->result() as $row){
                           $data[] = $row;
                       }
                       return $data;
                   }
                  return false;
            }
        
        
        // get business owner id
        public function getBusinessID(){
            $BusinessOwnerEmail = $this->session->userdata['BusinessOwner_logged_in']['username'];
            $query = $this->db->get_where('BusinessOwner', array('email' => $BusinessOwnerEmail));
            if($query->num_rows() > 0){
                foreach($query->result() as $row){
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }
        
        public function getNumberOfSubs($Listing){
            foreach ($Listing as $row)
            {
                $lid = $row->lid;
            }
            
            $query = $this->db->where('lid', $lid)->get('Subscriptions'); 
            return $query->num_rows();
        }
        
    // update owner information
        public function UpdateInfo($newData, $busID){
            
            $data= array(
                'owner' => $newData['owner'],
                'email' => $newData['email'],
                'ein' => $newData['ein'],
                'password' => $newData['password'],
                'phone' => $newData['phone'],
                'city' => $newData['city'],
                'province' => $newData['province'],
               'confirmed' => '1'
                );
                
            $this->db->where('bid', $busID);
            $this->db->update('BusinessOwner', $data);
        }
        
        public function getTitleOfListing($lid){
            $this->db->select('title')->from('BusinessListing')->where('lid',$lid);
            $query = $this->db->get();
            return $query->result();
        }
        // query a business listing
        public function getListing(){
            $BusInfo = $this->BusinessOwnerModel->getBusinessID();
            
            foreach($BusInfo as $row1){
                $busID = $row1->bid;
            }
            
            $query = $this->db->get_where('BusinessListing', array('bid' => $busID));
            
            if($query->num_rows() > 0){
                foreach($query->result() as $row){
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }
        
        // query operational hours
        public function getOperationalHours($dataArray,$lid){
            if ($lid == '') {
                foreach($dataArray as $key) {
                $b_lid = $key->lid;
            }
            } else {$b_lid = $lid;}
            $this->db->select('BusinessHours.*,Days.d_name');
            $this->db->from('Days');
            $this->db->join('BusinessHours', 'Days.did = BusinessHours.did AND BusinessHours.lid = '.$b_lid, 'inner');
            $this->db->distinct();
            $query = $this->db->get();
            $query_result = $query->result();
            return $query_result;
        }
        
       public function updateListingInfo($newData, $lid){
            // updates listing
            $this->db->where('lid', $lid);
            $this->db->update('BusinessListing', $newData);
        }
        
    
    
    // update operational hours 
    public function updateStoreHours($lid,$data) {
            $this->db->update_batch('BusinessHours', $data,'hid');
    }


 public function getTables($data)
    {
        if(is_array($data)) {
            foreach($data as $key) {
            $b_lid = $key->lid;
        }
        } else {$b_lid = $data;}
        $this->db->select('*');
        $this->db->from('RestaurantTables');
        $this->db->where('lid', $b_lid);
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }

    public function setTablesNumber($newData,$updateData,$lid) {

    $this->db->select('lid')->from('RestaurantTables')->where('lid',$lid);
    $query = $this->db->get();

    //if exist
    if ($query->num_rows() > 0){
    // Update
    return $this->db->update_batch('RestaurantTables', $updateData, 'rid');
    }
    //if not, insert new 
    else {
    return $this->db->insert_batch('RestaurantTables', $newData, 'table_type');
        }
    }
    
        function searchReservation($rserveDate, $rserveTime, $lid)
    {

        $this->db->select('ReserveRestaurantTable.*,user.uid, user.email, user.first, user.last, user.phone');
        $this->db->from('user');
        $this->db->join('ReserveRestaurantTable', 'user.uid = ReserveRestaurantTable.uid AND ReserveRestaurantTable.lid = '.$lid, 'inner');
        $this->db->where('time_reserved', $rserveTime);
        $this->db->distinct();
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }
    
    
    // insert  a new deal for a business
    public function addNewDeal($data,$lid) {
        return $this->db->insert('Deals',$data);
    }
    
    // get all deals for a business deals view inside dashboard
    public function getBusinessDeals($data){
        // get lid 
        foreach($data as $list) {
            $lid = $list->lid;
        }
        $this->db->select('*')->from('Deals')->where('lid',$lid);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    // remove a deal from business management dashboard
    public function removeDeal($did) {
        $this->db->delete('Deals',array('did'=>$did));
    }
    
    // update a deal from business management dashboard
    public function updateDeal($data,$did) {
        $this->db->where('did', $did);
        return $this->db->update('Deals', $data);
    }
    

    
    // get a list of deals for a certain business
    public function getaBusinessDeals($lid) {
        $this->db->select('*')->from('Deals')->where('lid',$lid);
        $query = $this->db->get();
        return $query->result();
    }
    
    // get all deals
    public function getDeals() {
        $this->db->select('Deals.*, BusinessListing.title, BusinessListing.phone');
        $this->db->from('BusinessListing');
        $this->db->join('Deals', 'BusinessListing.lid = Deals.lid ');
        $this->db->distinct();
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }
    
    public function getAllBookings($data){
        foreach($data as $key){
            $lid = $key->lid;
        }
        $this->db->select('ReserveRestaurantTable.*, user.first, user.last, user.email, user.email, user.phone');
        $this->db->from('user');
        $this->db->join('ReserveRestaurantTable', 'user.uid = ReserveRestaurantTable.uid AND ReserveRestaurantTable.lid = '.$lid, 'inner');
        $this->db->distinct();
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
    }
    
    
    // get bookings list for a certian listing
    public function businessBookingList($lid) {
        $this->db->select('*')->from('ReserveRestaurantTable')->where('ReserveRestaurantTable.lid',$lid);
        $this->db->join('RestaurantTables', 'RestaurantTables.rid = ReserveRestaurantTable.rid');
        $this->db->join('Tables', 'Tables.tid = RestaurantTables.table_type');
        $query = $this->db->get();
        return $query->result();
    }
    
    
    function InsertImage($data){
       return $this->db->insert('gallery', $data);
    }
    
    
    function getGallery($listInfo){
        if(is_array($listInfo)){
            
            foreach ($listInfo as $row)
            {
            $lid = $row->lid;
            }
        
            $this->db->where('lid', $lid);
            $this->db->select('*');
            $this->db->from('gallery');
            $query = $this->db->get();
            $data = $query->result();
            return $query->result();
        }
        
        $this->db->where('lid', $listInfo);
        $this->db->select('*');
        $this->db->from('gallery');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    function removeImage($gid){
       return $this->db->delete('gallery',array('gid'=>$gid));
    }
    
    function updateBookingStatus($reserve_table_id){
        $this->db->where('reserve_table_id', $reserve_table_id);
        return $this->db->update('ReserveRestaurantTable',array('cancelled'=>'1'));
    }
    
    function submitReview($data){
        return $this->db->insert('UserReviews', $data);
    }
    
    function getStoreReviews($lid){
        
        
        $this->db->select('UserReviews.*,BusinessListing.lid, user.uid, user.first, user.last, user.pic');
        $this->db->from('BusinessListing');
        $this->db->join('UserReviews', 'BusinessListing.lid = UserReviews.lid');
        $this->db->join('user', 'user.uid = UserReviews.uid AND UserReviews.status = "1" AND UserReviews.lid = '.$lid, 'inner');
        $this->db->distinct();
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
        
    }
    
} // end of class

