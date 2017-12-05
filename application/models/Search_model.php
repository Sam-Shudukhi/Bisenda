<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model {

    public function get_results($search_term='default')
    {
        // Use the Active Record class for safer queries.
        $this->db->select('*');
        $this->db->from('BusinessListing');
        $this->db->like('title',$search_term);

        // Execute the query.
        $query = $this->db->get();

        // Return the results.
        return $query->result_array();
    }
    
    function listings($search){

        $query = $this
                ->db
                ->select('*')
                ->from('BusinessListing')
                ->like('title',$search)
                ->or_like('category',$search)
                ->get();
     
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
		
}

}