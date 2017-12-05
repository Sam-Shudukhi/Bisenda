<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model {
    
            public function __construct()
            {
                    parent::__construct();
                    // Your own constructor code
            }

            // verify login information
            function get_user($usr, $pwd)
            {
                 $sql = "select * from admins where username = '" . $usr . "' and password = '" . md5($pwd) . "'";
                 $query = $this->db->query($sql);
                 return $query->num_rows();
            }

            // count listings for pagination
            public function listing_record_count() {
                return $this->db->count_all("BusinessListing");
            }

            // count reviews for paginaiton
            public function reviews_record_count() {
                return $this->db->count_all("UserReviews");
            }

            // fetch business lists
            public function fetch_business_lists($limit, $start) {
                $this->db->limit($limit, $start);
                $this->db->select('BusinessListing.*, BusinessOwner.*');
                $this->db->from('BusinessListing');
                $this->db->join('BusinessOwner', 'BusinessOwner.bid = BusinessListing.bid', 'inner');
                $this->db->group_by('BusinessListing.lid');
                $this->db->distinct();
                $query = $this->db->get();
                return $query->result();
           }

           // fetch user comments and rates
           public function fetch_user_comments($limit, $start) {
            $this->db->limit($limit, $start);
            $this->db->select('UserReviews.*,user.*,BusinessListing.*');
            $this->db->from('UserReviews');
            $this->db->join('user','user.uid = UserReviews.uid', 'inner');
            $this->db->join('BusinessListing','BusinessListing.lid = UserReviews.lid');
            $this->db->group_by("UserReviews.rid");            
            $this->db->distinct();
            $query=$this->db->get();
            return $query->result();
           }

           // approve user reviews
           public function approveReview($user_id,$business_id) {
               $data = array('status'=>1);
               $this->db->update('UserReviews', $data, "uid = $user_id AND lid = $business_id");
           }

           // disapprove user reviews
           public function disaprroveUserComment($user_id,$business_id) {
               $data = array('status'=>0);
               $this->db->update('UserReviews', $data, "uid = $user_id AND lid = $business_id");
           }

           // get user email address for notification
           public function getUserEmail($user_id) {
               $this->db->select('email')->from('user')->where('uid',$user_id);
               $query = $this->db->get();
               return $query->result();
           }

           // get owner email address for notification
           public function getOwnerEmail($owner_id) {
               $this->db->select('email')->from('BusinessOwner')->where('bid',$owner_id);
               $query = $this->db->get();
               return $query->result();
           }

           // verify a new business account
           public function verify_new_business($lid) {
               $data = array('verified'=>1);
               $this->db->update('BusinessListing', $data, "lid = $lid");
           }
           // unverify a business account
           public function unverify_business($lid) {
               $data = array('verified'=>0);
               $this->db->update('BusinessListing', $data, "lid = $lid");
           }
           // get a listing details 
           public function getListingDetails($lid) {
               $this->db->select('*')->from('BusinessListing')->where('lid',$lid);
               $query = $this->db->get();
               return $query->result();
           }
           
           // get user contact information
           public function userContactInformation(){
               $this->db->select('*')->from('user');
               $query = $this->db->get();
               return $query->result();
           }
           
           // get stores contact information
           public function businessContactInformation() {
                $this->db->select('*')->from('BusinessListing');
                $query = $this->db->get();
                return $query->result();
           }
        }