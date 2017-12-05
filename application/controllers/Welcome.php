<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


    public function __construct() 
    {
            parent::__construct();
            $this->load->helper(array('form','url','html'));
            $this->load->library(array('session','form_validation','email','upload'));
    }
    
	
	public function index()
	{
		require 'application/views/header.php';
		$data['search'] = $this->load->view('Search', null, true);
		$this->load->view('welcome_message', $data);
	}
    
	public function deals() {
        $this->load->model('BusinessOwnerModel');
        $data['deals'] = $this->BusinessOwnerModel->getDeals();
        $data['header'] = $this->load->view('header', null,true);
		$this->load->view('deals',$data);
	}
	
	
		public function contactUs() {
        $this->load->model('BusinessOwnerModel');
        $data['header'] = $this->load->view('header', null,true);
		$this->load->view('contact_us',$data);
	}
	
	
	    public function sendEmailToUs() {
        $userEmail = $this->input->post('email');
        $emailSubject = $this->input->post('subject');
        $emailMessage = $this->input->post('message');
        $this->form_validation->set_rules("email", "email", "trim|required");
        $this->form_validation->set_rules("subject", "subject", "trim|required");
        $this->form_validation->set_rules("message", "message", "trim|required");
        

        if ($this->form_validation->run() == FALSE)
        {
    //          //validation fails
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Error sending a message. Make sure to fill all fields</div>');
                redirect(base_url().'welcome/contactUs/'.$userEmail);
        } else {
            $this->sendEmail($userEmail, $emailSubject,$emailMessage);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Message was successfully sent</div>');
                redirect(base_url().'welcome/contactUs/'.$userEmail);
        }
        
	}
	
	
	
	    public function sendEmail($userEmail, $subject, $message) {
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = 'bisendatech@gmail.com';
        $config['smtp_pass'] = '****'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);
        $this->email->from('bisendatech@gmail.com', 'Bisenda');
        $this->email->to('bisendatech@gmail.com'); 
        $this->email->subject('Contact Us');
        $html_msg = '<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                    <tr>
                        <td align="center" valign="top">
                            <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailHeader">
                                <tr>
                                    <td align="center" valign="top">
                                    
                              <h1> From: </h1><h1>'.$userEmail.'</h1>
                                    <br>
                                 <h1> Subject: </h1><h1>'.$subject.'</h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailBody">
                                <tr>
                                    <td align="center" valign="top">
                                        <h3><p>Message:,</p>'.$message.'<p><br/></h3>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>';
    $this->email->message($html_msg);
    return $this->email->send();
    }
    
    
	public function search()
    {
      
       if(is_null($this->input->get('id')))
        {
            $this->load->view('testSearch');    
        }
        else
        {
            $this->load->model('Search_model'); 
        
            $data['listings']=$this->Search_model->listings($this->input->get('id')); 
        
            $this->load->view('search_results',$data);
        
        }
    }
    
    public function storeview($title) {
        $this->load->model('BusinessOwnerModel');
        $this->load->model('Admin_model');
        $this->load->model('User_model');
        
        $hashedTitle = $title;
        $businessTitle = substr($hashedTitle, 0, strpos($hashedTitle, 'bisenda'));
        $businessTitle = str_replace("-", " ", $businessTitle);
        $lid = substr($hashedTitle, strpos($hashedTitle, "bisenda") + 7);   
        $lidArray = array('lid'=>$lid);
        // if user logged in 
        if ($this->session->userdata('logged_in')) {
            $user_data = $this->session->userdata('logged_in');
            $data['user_subscriptions'] = $this->User_model->getUserSubscriptions($user_data['uid']);
            $data['user_notes'] = $this->User_model->getUserNotes();
            $data['user_information'] = $this->User_model->getUserInformation();
        }
        $data['bookingsList'] = $this->BusinessOwnerModel->businessBookingList($lid);
        $data['lid'] = $lid;
        $data['hours'] = $this->BusinessOwnerModel->getOperationalHours('',$lid);
        $data['listing'] = $this->Admin_model->getListingDetails($lid);
        $data['storeName'] = $businessTitle;
        $data['availableTables'] = $this->BusinessOwnerModel->getTables($lid);
        $data['calendar'] = $this->load->view('BusinessOwner/bookAppointment', $data,true);
        $data['storeDeals'] = $this->BusinessOwnerModel->getaBusinessDeals($lid);
        $data['actionmenu'] = $this->load->view('BusinessOwner/actionmenu',$data,true);
        $data['map'] = $this->load->view('BusinessOwner/map',$data,true);
        $data['deals'] = $this->load->view('BusinessOwner/coupon',$data,true);
        $data['addReview'] = $this->load->view('BusinessOwner/addreview',$data,true);
        $data['header'] = $this->load->view('header.php',null,true);
        $data['sidemenubar'] = $this->load->view('BusinessOwner/sidemenubar.php',$data,true);
        $data['gallery'] = $this->BusinessOwnerModel->getGallery($lid);
        $data['storeReviews'] = $this->BusinessOwnerModel->getStoreReviews($lid);
        $data['reviewsPage'] = $this->load->view('BusinessOwner/storeReviews',$data,true);
        $this->load->view('BusinessOwner/listing.php', $data);
        
    }
    
}
