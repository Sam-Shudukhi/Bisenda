<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form','url','html'));
        $this->load->library(array('session','form_validation','email','pagination'));
        $this->load->model('Admin_model');
        $this->load->model('BusinessOwnerModel');
    }

    public function index() {
        //get the posted values
        $username = $this->input->post("txt_email");
        $password = $this->input->post("txt_password");

        //set validations
        $this->form_validation->set_rules("txt_email", "Username", "trim|required");
        $this->form_validation->set_rules("txt_password", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE)
        {
             //validation fails
             require 'application/views/header.php';              
             $this->load->view('admin/index');
        }
        else
        {
             //validation succeeds
             if ($this->input->post('btn_login') == "Login")
             {
                  //check if username and password is correct
                  $usr_result = $this->Admin_model->get_user($username, $password);
                  if ($usr_result > 0) //active user record is present
                  {
                       //set the session variables
                       $sessiondata = array(
                            'username' => $username,
                            'loginuser' => TRUE
                       );
                       $this->session->set_userdata('admin_logged_in',$sessiondata);
                       redirect(base_url().'Admin/dashboard');
                  }
                  else
                  {
                       $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                       redirect('Admin/index');
                  }
             }
             else
             {
               require 'application/views/header.php';                
                  redirect('Admin/index');
             }
        }
    }


    public function dashboard($pageName = null) {
        if($this->session->userdata('admin_logged_in')){
            //admin is already logged in
            if (!$pageName) {
            require 'application/views/header.php';  
            $this->load->view('admin/dashboard');
            $data['dashboard'] = $this->load->view('admin/dashboard', null, true);
            } else {
                // verify new business, view verify page
                if ($pageName == 'verify') {
                    // set pagination
                    $config["base_url"] = base_url() . "admin/dashboard/".$pageName;
                    $config["total_rows"] = $this->Admin_model->listing_record_count();
                    $config["per_page"] = 20;
                    $config["uri_segment"] = 4;
                    $config['use_page_numbers'] = true;
                    $choice = $config["total_rows"] / $config["per_page"];
                    $config["num_links"] = round($choice);
                    $this->pagination->initialize($config);
                    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;

                    // get results from the model
                    $data["results"] = $this->Admin_model
                        ->fetch_business_lists($config["per_page"], $page);
                    $data["links"] = $this->pagination->create_links();
                    $data['header'] = $this->load->view('header', null, true);
                    $data['dashboard'] = $this->load->view('admin/dashboard', null, true);
                    $this->load->view("admin/verify", $data);
                } 
                // approve user reviews, view approval page                
                else if ($pageName == 'approve') {
                    // set pagination
                    $config["base_url"] = base_url() . "admin/dashboard/".$pageName;
                    $config["total_rows"] = $this->Admin_model->reviews_record_count();
                    $config["per_page"] = 20;
                    $config["uri_segment"] = 4;
                    $config['use_page_numbers'] = true;
                    $choice = $config["total_rows"] / $config["per_page"];
                    $config["num_links"] = round($choice);
                    $this->pagination->initialize($config);
                    $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;

                    // get results from the model
                    $data["results"] = $this->Admin_model
                        ->fetch_user_comments($config["per_page"], $page);
                    $data["links"] = $this->pagination->create_links();
                    $data['header'] = $this->load->view('header', null, true);
                    $data['dashboard'] = $this->load->view('admin/dashboard', null, true);
                    $this->load->view("admin/approve", $data);
                }
                // view contacts to select from users or businesses
                else if ($pageName == 'contacts') {
                    $data['header'] = $this->load->view('header', null, true);
                    $data['dashboard'] = $this->load->view('admin/dashboard', null, true);
                    $this->load->view("admin/contacts", $data);
                } else if ($pageName == 'userscontacts') {
                    $data['header'] = $this->load->view('header', null, true);
                    $data['dashboard'] = $this->load->view('admin/dashboard', null, true);
                    $data['users'] = $this->Admin_model->userContactInformation();
                    $data['contactsPanel'] = $this->load->view('admin/contacts', $data, true);
                    $this->load->view("admin/".$pageName, $data);
                } else if ($pageName == 'businesscontacts') {
                    $data['header'] = $this->load->view('header', null, true);
                    $data['dashboard'] = $this->load->view('admin/dashboard', null, true);
                    $data['stores'] = $this->Admin_model->businessContactInformation();
                    $data['contactsPanel'] = $this->load->view('admin/contacts', $data, true);
                    $this->load->view("admin/".$pageName, $data);
                }
                
                
                else {
                $data['dashboard'] = $this->load->view('admin/dashboard', null, true);            
                require 'application/views/header.php';  
                $this->load->view('admin/'. $pageName, $pageName);
                }
            }
            } else {
            echo '<h1>WLECOME, YOU NEED TO <a href="'.base_url().'Admin/">LOGIN</a> FIRST</h1><br>'; 
            }
    }

    public function logout() {
        $this->session->unset_userdata('admin_logged_in');
        redirect(base_url().'Welcome');
    }

    // approve user comments/rates with email notification
    public function aprroveUserComment($user_id,$fullname,$title,$business_id,$rate,$comment){
        // get user email from model for email notification
        $data = $this->Admin_model->getUserEmail($user_id,$business_id);
        foreach($data as $user) {
            $userEmail = $user->email;
        }
        // clean strings
        $title = str_replace("%20", " ", $title);
        $comment = str_replace("%20", " ", $comment);
        // update review status
        $this->Admin_model->approveReview($user_id, $business_id);
        // notify with email
        $this->sendEmail($userEmail,'Bisenda: Your Comment on '.$title.' Has Been Approved','Thank you '.$fullname.' for your review on '.$title.'<br>Your rate: '.$rate.'<br>Your comment: '.$comment);
        redirect(base_url().'/Admin/dashboard/approve');
    }

    // disapprove user comments/rates
    public function disaprroveUserComment($user_id,$business_id){
        $this->Admin_model->disaprroveUserComment($user_id,$business_id);
        redirect(base_url().'/Admin/dashboard/approve');        
    }
    

    public function sendEmail($userEmail, $subject, $message) {
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = 'bisendatech@gmail.com';
        $config['smtp_pass'] = 'b123456781'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);
        $this->email->from('bisendatech@gmail.com', 'Bisenda');
        $this->email->to($userEmail); 
        $this->email->subject($subject);
        $html_msg = '<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                    <tr>
                        <td align="center" valign="top">
                            <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailHeader">
                                <tr>
                                    <td align="center" valign="top">
                                        <h1>'.$subject.'</h1>
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
                                        <h3><p>Hi,</p>'.$message.'<p><br/></h3>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailFooter">
                                <tr>
                                    <td align="center" valign="top">
                                        <p>Sincerely,</p><p>Bisenda Team</p>
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

    // view a business page from admin verification
    public function business($title) {
        $hashedTitle = $title;
        $businessTitle = substr($hashedTitle, 0, strpos($hashedTitle, 'bisenda'));
        $businessTitle = str_replace("-", " ", $businessTitle);
        $lid = substr($hashedTitle, strpos($hashedTitle, "bisenda") + 7);   
        $lidArray = array('lid'=>$lid);
        $data['lid'] = $lid;
        $data['hours'] = $this->BusinessOwnerModel->getOperationalHours('',$lid);
        $data['listing'] = $this->Admin_model->getListingDetails($lid);
        $data['storeName'] = $businessTitle;
        $data['actionmenu'] = $this->load->view('BusinessOwner/actionmenu',$data,true);
        $data['header'] = $this->load->view('header.php',null,true);
        $data['sidemenubar'] = $this->load->view('BusinessOwner/sidemenubar.php',$data,true);
        $this->load->view('BusinessOwner/listing.php', $data);
    }

    // verify a new business account
    public function verify_new_business($lid,$bid) {
        $data = $this->Admin_model->getOwnerEmail($bid);
        foreach($data as $user) {
            $ownerEmail = $user->email;
        }
        $this->Admin_model->verify_new_business($lid);
        $this->sendEmail($ownerEmail,'Bisenda: You account has been approved', 'Your account has been approved.<br>If you need further assistance, please contact us');
        redirect(base_url().'/Admin/dashboard/verify');        
    }
    // unverify a business account
    public function unverify_business($lid) {
        $this->Admin_model->unverify_business($lid);
        redirect(base_url().'/Admin/dashboard/verify');       
    }
    
    // view contact user through email
    public function contactuser($name,$email,$confirmedAccount) {
        $fixedName = str_replace("-", " ", $name);
        $data['name'] = $fixedName;
        $data['email'] = $email;
        $data['confirmed'] = $confirmedAccount;
        $data['header'] = $this->load->view('header', null, true);
        $data['dashboard'] = $this->load->view('admin/dashboard', null, true);
        $data['contactsPanel'] = $this->load->view('admin/contacts', $data, true);
        $this->load->view('admin/wrightemail',$data);
    }
    
    // view contact user through email
    public function contactbusiness($title,$email,$verified){
        $fixedTitle = str_replace("-", " ", $title);
        $data['name'] = $fixedTitle;
        $data['email'] = $email;
        $data['confirmed'] = $verified;
        $data['header'] = $this->load->view('header', null, true);
        $data['dashboard'] = $this->load->view('admin/dashboard', null, true);
        $data['contactsPanel'] = $this->load->view('admin/contacts', $data, true);
        $this->load->view('admin/wrightemail',$data);
    }
    
    public function sendEmailToUser() {
        $username = $this->input->post('name');
        $userEmail = $this->input->post('email');
        $emailSubject = $this->input->post('subject');
        $emailMessage = $this->input->post('message');
        $confirmed = $this->input->post('confirmed');
        $fixedName = str_replace(" ", "-", $username);
        $this->form_validation->set_rules("name", "name", "trim|required");
        $this->form_validation->set_rules("email", "email", "trim|required");
        $this->form_validation->set_rules("subject", "subject", "trim|required");
        $this->form_validation->set_rules("message", "message", "trim|required");
        

        if ($this->form_validation->run() == FALSE)
        {
    //          //validation fails
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Error sending a message. Make sure to fill all fields</div>');
                redirect(base_url().'admin/contactuser/'.$fixedName.'/'.$userEmail.'/'.$confirmed);
        } else {
            $this->sendEmail($userEmail,"Bisenda: $emailSubject","<h3>Message for $username</h3><br>$emailMessage");
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Message was successfully sent</div>');
                redirect(base_url().'admin/contactuser/'.$fixedName.'/'.$userEmail.'/'.$confirmed);
        }
    }
    
}