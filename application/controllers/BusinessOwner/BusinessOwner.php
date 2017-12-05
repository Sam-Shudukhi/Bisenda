<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BusinessOwner extends CI_Controller {
    public function __construct() 
    {
            parent::__construct();
            // Your own constructor code
            $this->load->helper(array('form','url','html'));
            $this->load->library(array('session','form_validation','email','upload'));
            //load the login model
            $this->load->model('BusinessOwnerModel');
            //load the factory model
            $this->load->model('Factory');
             //load the observer model
            $this->load->model('ObserverModel');
    }

    public function index()
    {
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
              $this->load->view('BusinessOwner/index.php');
         }
         else
         {
              //validation succeeds
              if ($this->input->post('btn_login') == "Login")
              {
                   //check if username and password is correct
                   $data['results'] = $this->BusinessOwnerModel->get_user($username, $password);
                   if ($data['results'] > 0) //active user record is present
                   {
    
                        //set the session variables
                        $sessiondata = array(
                             'username' => $username,
                             'loginuser' => TRUE
                        );
                        
                        $this->session->set_userdata('BusinessOwner_logged_in',$sessiondata);
                        
                        redirect(base_url().'BusinessOwner/BusinessOwner/dashboard');
                   }
                   else
                   {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                        redirect('BusinessOwner/BusinessOwner/index');
                   }
              }
              else
              {
                require 'application/views/header.php';                
                   redirect('BusinessOwner/BusinessOwner/index');
              }
         }
    }


    // view sign up page
    public function signup() {
        require 'application/views/header.php';                
        $this->load->view('BusinessOwner/register');
    }

    // process sign up form
    public function registration()
  {
      
    //validate input value with form validation class of codeigniter
    $this->form_validation->set_rules('Name', 'Name', 'required');
    $this->form_validation->set_rules('EIN', 'EIN', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');
    $this->form_validation->set_rules('confirmpswd', 'Password Confirmation', 'required|matches[password]');
    $this->form_validation->set_rules('booking_type', 'Does Your Business Provide Booking?', 'required');
    $this->form_validation->set_rules('category', 'Type of Business', 'required');
    $this->form_validation->set_rules('province', 'Province', 'required');
    

        if ($this->form_validation->run() == FALSE)
        {
            require 'application/views/header.php';                            
            $this->load->view('BusinessOwner/register');
        }
        else
        {
            $Name = $_POST['Name'];
            $EIN = $_POST['EIN'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
            $province = $_POST['province'];
            $booking_type = $_POST['booking_type'];
            $category = $_POST['category'];
            //md5 hashing algorithm to decode and encode input password
            $passhash = hash('md5', $password);
            $saltid     = md5($email);
            $status     = 0;

            // array to hold owner information
            $ownerData = array(
                'owner' => $Name,
              'ein' => $EIN,
              'email' => $email,
              'password' => $passhash,
              'phone' => $phone,
              'city' => $city,
              'province' => $province,
              'confirmed' => $status);
              
            // array to hold business information
              $listingData = array(
                  'email' => $email,
              'city' => $city,
              'province' => $province,
              'booking' => $booking_type,
              'category' => $category,
              'phone' => $phone
              );
              

              
      if($this->BusinessOwnerModel->insertuser($ownerData))
      {
          
            if($this->Factory->create($listingData)){
                // sends $listingData to Factory
                 //echo("<script> console.log('from controller: Factory->create() called');</script>");
                if($this->sendemail($email, $saltid))
                    {

                         // successfully sent mail to user email
                            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Please confirm the mail sent to your email id to complete the registration.</div>');
                            redirect(base_url());
                    }
                    else
                        {
                           $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please try again ...</div>');
                           redirect(base_url());
                       }
        
             }
            else{
                    $this->session->set_flashdata('createList','<div class="alert alert-danger text-center">Something Wrong. Please try again ...</div>');
                            redirect(base_url());
                }

      }
      else
      {

        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something Wrong. Please try again ...</div>');
                    redirect(base_url());
      }
      

        } // end of registration() else
        
  }
  function sendemail($email,$saltid){
    // configure the email setting
    
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
        $url = base_url()."BusinessOwner/BusinessOwner/confirmation/".$saltid;
        $this->email->from('bisendatech@gmail.com', 'Bisenda');
    $this->email->to($email); 
    $this->email->subject('Bisenda: Please Verify Your Email Address');
    $html_msg = '<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
    <tr>
        <td align="center" valign="top">
            <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailHeader">
                            <tr>
                                <td align="center" valign="top">
                                    WELCOME TO BISENDA.
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
                                    <p>Hi,</p><p>Thanks for registration with Bisenda.</p><p>Please click below link to verify your email.</p>'.$url.'<br/>
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
    $message = "<html><head><head></head><body><p>Hi,</p><p>Thanks for registration with Bisenda.</p><p>Please click below link to verify your email.</p>".$url."<br/><p>Sincerely,</p><p>Bisenda Team</p></body></html>";
    $this->email->message($html_msg);
    return $this->email->send();
    }
    public function confirmation($key)
    {
        if($this->BusinessOwnerModel->verifyemail($key))
        {
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your Email Address is successfully verified!</div>');
            redirect(base_url().'BusinessOwner/BusinessOwner/index');
        }
        else
        {
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Your Email Address Verification Failed. Please try again later...</div>');
            redirect(base_url());
        }
    }

    public function testEmail() {
        $this->sendemail('alshuduki@gmail.com', md5('alshuduki'));
    }

    public function dashboard($pageName = null,$parameter2=null) {
        if($this->session->userdata('BusinessOwner_logged_in')){
            //user is already logged in
            
            if (!$pageName) {
            $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', null, true);
            $data['BusID'] = $this->BusinessOwnerModel->getBusinessID();
            $data['Listing'] = $this->BusinessOwnerModel->getListing();
            $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
            require 'application/views/header.php';
            $this->load->view('BusinessOwner/dashboard',$data);
            
            } else { // if argument is used, view the right page
                // $data['condition'] = 0;
                // view setting page
                if ($pageName == 'setting') {
                    $data['BusID'] = $this->BusinessOwnerModel->getBusinessID();
                    $data['header'] = $this->load->view('header', null, true); 
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
                    $this->load->view('BusinessOwner/'. $pageName, $data);
                }
                else if ($pageName == 'myListing') {
                    
                    $data['BusID'] = $this->BusinessOwnerModel->getBusinessID();
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['header'] = $this->load->view('header', null, true); 
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);

                    $this->load->view('BusinessOwner/'. $pageName, $data);
                }
                // ** deals section ** //
               else if ($pageName == 'myDeals') {
                    $data['BusID'] = $this->BusinessOwnerModel->getBusinessID();
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['header'] = $this->load->view('header', null, true); 
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
                    $this->load->view('BusinessOwner/'. $pageName, $data);
                } else if ($pageName == 'addNewDeal') {
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['header'] = $this->load->view('header', null, true); 
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
                    $data['dealsPannel'] = $this->load->view('BusinessOwner/myDeals',$data,true);
                    $this->load->view('BusinessOwner/'. $pageName, $data);
                } else if ($pageName == 'manageDeals') {
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['header'] = $this->load->view('header', null, true); 
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
                    $data['dealsPannel'] = $this->load->view('BusinessOwner/myDeals',$data,true);
                    $data['deals'] = $this->BusinessOwnerModel->getBusinessDeals($data['Listing']);
                    $this->load->view('BusinessOwner/'. $pageName, $data);
                } else if ($pageName == 'updateDeal') {
                    $data['did'] = $parameter2;
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['header'] = $this->load->view('header', null, true); 
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
                    $data['dealsPannel'] = $this->load->view('BusinessOwner/myDeals',$data,true);
                    $data['deals'] = $this->BusinessOwnerModel->getBusinessDeals($data['Listing']);
                    $this->load->view('BusinessOwner/'. $pageName, $data);
                }// ** end deals ** //

                else if ($pageName == 'booking') {
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['tables'] = $this->BusinessOwnerModel->getTables($data['Listing']);
                    $data['header'] = $this->load->view('header', null, true); 
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
                    $this->load->view('BusinessOwner/'. $pageName, $data);
                }
                
                else if ($pageName == 'setTables') {
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['tables'] = $this->BusinessOwnerModel->getTables($data['Listing']);
                    $data['header'] = $this->load->view('header', null, true); 
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
                    $data['managePanel'] = $this->load->view('BusinessOwner/booking', $data, true);
                    $this->load->view('BusinessOwner/'. $pageName, $data);
                }

                else if ($pageName == 'manageBooking') {
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['allBookings'] = $this->BusinessOwnerModel->getAllBookings($data['Listing']);
                    $data['tables'] = $this->BusinessOwnerModel->getTables($data['Listing']);
                    $data['header'] = $this->load->view('header', null, true); 
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
                    $data['managePanel'] = $this->load->view('BusinessOwner/booking', $data, true);
                    $this->load->view('BusinessOwner/'. $pageName, $data);
                }
                
                
                else if ($pageName == 'wrightemail') {
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['allBookings'] = $this->BusinessOwnerModel->getAllBookings($data['Listing']);
                    $data['tables'] = $this->BusinessOwnerModel->getTables($data['Listing']);
                    $data['header'] = $this->load->view('header', null, true); 
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
                    $data['managePanel'] = $this->load->view('BusinessOwner/booking', $data, true);
                    $data['email_to'] = $parameter2;
                    $this->load->view('BusinessOwner/'. $pageName, $data);
                }
                
                else if ($pageName == 'myActv') {
                    
                    $data['BusID'] = $this->BusinessOwnerModel->getBusinessID();
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['header'] = $this->load->view('header', null, true); 
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
                    
                    
                    $this->load->view('BusinessOwner/'. $pageName, $data);
                }
                
                // view for operational hours
                else if ($pageName == 'hours') {
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['hours'] = $this->BusinessOwnerModel->getOperationalHours($data['Listing'], '');
                    $data['BusID'] = $this->BusinessOwnerModel->getBusinessID();
                    $data['header'] = $this->load->view('header', null, true); 
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
                    $this->load->view('BusinessOwner/'. $pageName, $data);
                }
                else if ($pageName == 'hoursupdate') {
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['hours'] = $this->BusinessOwnerModel->getOperationalHours($data['Listing'],'');
                    $data['BusID'] = $this->BusinessOwnerModel->getBusinessID();
                    $data['header'] = $this->load->view('header', null, true); 
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
                    $this->load->view('BusinessOwner/'. $pageName, $data);
                }
                else if ($pageName == 'broadcast') {
                    
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['BusID'] = $this->BusinessOwnerModel->getBusinessID();
                    $data['SubsNum'] = $this->BusinessOwnerModel->getNumberOfSubs($data['Listing']);
                    $data['header'] = $this->load->view('header', null, true);
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
                    $this->load->view('BusinessOwner/'. $pageName, $data);
                }
                
                else if ($pageName == 'gallery') {
                    
                    $data['Listing'] = $this->BusinessOwnerModel->getListing();
                    $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks',$data,true);
                    $data['BusID'] = $this->BusinessOwnerModel->getBusinessID();
                    $data['gallery'] = $this->BusinessOwnerModel->getGallery($data['Listing']);
                    $data['header'] = $this->load->view('header', null, true);
                    $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
                    $this->load->view('BusinessOwner/'. $pageName, $data);
                }
                else { // this should be an error msg when page doesn't exists
                $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', null, true);            
                require 'application/views/header.php';  
                $this->load->view('BusinessOwner/'. $pageName, $data);
                }
            }
            } else {
                redirect(base_url().'BusinessOwner/BusinessOwner');
            }
    }

    public function logout() {
        $this->session->unset_userdata('BusinessOwner_logged_in');
        redirect(base_url().'BusinessOwner/BusinessOwner');

    }
    
    public function UpdateInformation(){

        //validate input value with form validation class of codeigniter
    $this->form_validation->set_rules('owner', 'owner', 'required');
    $this->form_validation->set_rules('ein', 'EIN', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[BusinessOwner.email]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');
    $this->form_validation->set_rules('confirmpswd', 'Password Confirmation', 'required|matches[password]');
        if ($this->form_validation->run() == FALSE)
        {
            require 'application/views/header.php';                            
            $this->load->view('BusinessOwner/setting');
        }
        else
        {
            $busID = $_POST['busID'];
            $owner = $_POST['owner'];
            $ein = $_POST['ein'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
            $province = $_POST['province'];
            $passhash = hash('md5', $password);

      $saltid     = md5($email);
      $newData = array(
          'owner' => $owner,
              'ein' => $ein,
              'email' => $email,
              'password' => $passhash,
              'phone' => $phone,
              'city' => $city,
              'province' => $province
               );
               
        if($this->BusinessOwnerModel->UpdateInfo($newData, $busID))
        {

            $this->session->unset_userdata('BusinessOwner_logged_in');
            $sessiondata = array(
                'username' => $email,
                'loginuser' => TRUE
                );
                
            $this->session->set_userdata('BusinessOwner_logged_in', $sessiondata);
            
            
            redirect(base_url('BusinessOwner/BusinessOwner/dashboard'));
        }
        else
        {
        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something Wrong. Please try again ...</div>');
            redirect(base_url('BusinessOwner/BusinessOwner/dashboard'));
      }
        }
        
        
    } // end of update function 
    
    
    function updateSession($busID, $email){
        // unset, then set new user session with updated login info
            $this->session->unset_userdata('BusinessOwner_logged_in');
            $sessiondata = array(
                'username' => $email,
                'loginuser' => TRUE
                );
                
        return $this->session->set_userdata('BusinessOwner_logged_in', $sessiondata);
    }
    
    
    public function UpdateListing(){
                                        
        //checks if business listing exists for logged in user
        //validate input value with form validation class of codeigniter
    $this->form_validation->set_rules('title', 'owner', 'required');
    $this->form_validation->set_rules('address', 'address', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    
   
        if ($this->form_validation->run() == FALSE)
        {
            require 'application/views/header.php';                            
            $this->load->view('BusinessOwner/dashboard');
        }
        else
        {
            $lid = $_POST['lid'];
            $busID = $_POST['bid'];
            $title = $_POST['title'];
            $category = $_POST['category'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
            $province = $_POST['province'];
            $postal = $_POST['postalcode'];
            $url = $_POST['bookingURL'];
            $website = $_POST['website'];
            $desc = $_POST['desc'];


      $saltid = md5($email);
      $newData = array(
                'title' => $title,
                'category' =>$category,
                'address' => $address,
                'email' => $email,
                'phone' => $phone,
                'city' => $city,
                'province' => $province,
                'postal_code' => $postal,
                'booking_url' => $url,
                'website' => $website,
                'description' => $desc
               );
               
        if($this->BusinessOwnerModel->updateListingInfo($newData, $lid))
        {
            
            $this->session->set_flashdata('sucess2','<div class="alert alert-danger text-center">Listing sucessfuly updated!</div>');
           
           
            redirect(base_url('BusinessOwner/BusinessOwner/myListing'));
        
        }
        else
        {
        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something Wrong. Please try again ...</div>');
            redirect(base_url('BusinessOwner/BusinessOwner/dashboard'));
        }
        }
    }
    
    
    public function updateHours($lid) {
        // rules / trim 
        $this->form_validation->set_rules('mondayFrom', 'mondayFromHours', 'trim');
        $this->form_validation->set_rules('mondayFrom', 'mondayFromMinutes', 'trim');
        $this->form_validation->set_rules('mondayTo', 'mondayToHours', 'trim');
        $this->form_validation->set_rules('mondayTo', 'mondayToMinutes', 'trim');
        
        if ($this->form_validation->run() == FALSE)
        {
            redirect(base_url().'BusinessOwner/BusinessOwner/dashboard/updateHours');
        }
        else
        {
             //validation succeeds
              if ($this->input->post('update_hours') == "Save")
              {
               
              $hid = $this->input->post('hid');
        // ** MONDAY **
        $mondayCheckbox = $this->input->post("setMonday");
        // * from *
        $mondayFrom = $this->input->post("mondayFrom");
        //  * to *
        $mondayTo = $this->input->post("mondayFrom");
        if ($mondayCheckbox=='') {$mondayCheckbox=0;}
        $data['did'] = 1;
        $data['mondayChecked'] = $mondayCheckbox;
        if ($mondayCheckbox == 1 && $mondayFrom == '' || $mondayTo == '') {
            $data['mondayChecked'] = 0;
        }
        $data['mondayFrom'] = $mondayFrom;
        $data['mondayTo'] = $mondayTo;
        
        // ** TUESDAY ** 
        $tuesdayCheckbox = $this->input->post("setTuesday");
        // * from *
        $tuesdayFrom = $this->input->post("tuesdayFrom");
        //  * to *
        $tuesdayTo = $this->input->post('tuesdayTo');
        if ($tuesdayCheckbox=='') $tuesdayCheckbox=0;
        $data['did'] = 2;
        $data['tuesdayChecked'] = $tuesdayCheckbox;
        if ($tuesdayCheckbox == 1 && $tuesdayFrom == '' || $tuesdayTo == '') {
            $data['tuesdayChecked'] = 0;
        }
        $data['tuesdayFrom'] = $tuesdayFrom;
        $data['tuesdayTo'] = $tuesdayTo;
        
        // ** WEDNESDAY **
        $wednesdayCheckbox = $this->input->post("setWednesday");
        // * from *
        $wednesdayFrom = $this->input->post("wednesdayFrom");
        //  * to *
        $wednesdayTo = $this->input->post('wednesdayTo');
        if ($wednesdayCheckbox=='') $wednesdayCheckbox=0;
        $data['did'] = 3;
        $data['wednesdayChecked'] = $wednesdayCheckbox;
        if ($wednesdayCheckbox == 1 && $wednesdayFrom == '' || $wednesdayTo == '') {
            $data['wednesdayChecked'] = 0;
        }
        $data['wednesdayFrom'] = $wednesdayFrom;
        $data['wednesdayTo'] = $wednesdayTo;
        
        // ** THURSDAY **
        $thursdayCheckbox = $this->input->post("setThursday");
        // * from *
        $thursdayFrom = $this->input->post("thursdayFrom");
        //  * to *
        $thursdayTo = $this->input->post('thursdayTo');
        if ($thursdayCheckbox=='') $thursdayCheckbox=0;
        $data['did'] = 4;
        $data['thursdayChecked'] = $thursdayCheckbox;
        if ($thursdayCheckbox == 1 && $thursdayFrom == '' || $thursdayTo == '') {
            $data['thursdayChecked'] = 0;
        }
        $data['thursdayFrom'] = $thursdayFrom;
        $data['thursdayTo'] = $thursdayTo;
        
        // ** FRIDAY **
        $fridayCheckbox = $this->input->post("setFriday");
        // * from *
        $fridayFrom = $this->input->post("fridayFrom");
        
        //  * to *
        $fridayTo = $this->input->post('fridayTo');
        if ($fridayCheckbox=='') $fridayCheckbox=0;
        $data['did'] = 5;
        $data['fridayChecked'] = $fridayCheckbox;
        if ($fridayCheckbox == 1 && $fridayFrom == '' || $fridayTo == '') {
            $data['fridayChecked'] = 0;
        }
        $data['fridayFrom'] = $fridayFrom;
        $data['fridayTo'] = $fridayTo;
        
        // ** SATURDAY **
        $saturdayCheckbox = $this->input->post("setSaturday");
        // * from *
        $saturdayFrom = $this->input->post("saturdayFrom");
        //  * to *
        $saturdayTo = $this->input->post('saturdayTo');

        if ($saturdayCheckbox=='') $saturdayCheckbox=0;
        $data['did'] = 6;
        $data['saturdayChecked'] = $saturdayCheckbox;
        if ($saturdayCheckbox == 1 && $saturdayFrom == '' || $saturdayTo == '') {
            $data['saturdayChecked'] = 0;
        }
        $data['saturdayFrom'] = $saturdayFrom;
        $data['saturdayTo'] = $saturdayTo;
        
        // ** SUNDAY **
        $sundayCheckbox = $this->input->post("setSunday");
        // * from *
        $sundayFrom = $this->input->post("sundayFrom");
        //  * to *
        $sundayTo = $this->input->post('sundayTo');
        if ($sundayCheckbox=='') $sundayCheckbox=0;
        $data['did'] = 7;
        $data['sundayChecked'] = $sundayCheckbox;
        if ($sundayCheckbox == 1 && $sundayFrom == '' || $sundayTo == '') {
            $data['sundayChecked'] = 0;
        }
        $data['sundayFrom'] = $sundayFrom;
        $data['sundayTo'] = $sundayTo;
        
        // update array that holds new values of each row to be updated
            $updateArray = 
            array(
                array(
                    'hid'=>$hid[0],
                    'from_time'=>$data['mondayFrom'],
                    'to_time'=>$data['mondayTo'],
                    'active'=>$data['mondayChecked']
                    ),
                    array(
                    'hid'=>$hid[1],
                    'from_time'=>$data['tuesdayFrom'],
                    'to_time'=>$data['tuesdayTo'],
                    'active'=>$data['tuesdayChecked']
                    ),
                    array(
                    'hid'=>$hid[2],
                    'from_time'=>$data['wednesdayFrom'],
                    'to_time'=>$data['wednesdayTo'],
                    'active'=>$data['wednesdayChecked']
                    ),
                    array(
                    'hid'=>$hid[3],
                    'from_time'=>$data['thursdayFrom'],
                    'to_time'=>$data['thursdayTo'],
                    'active'=>$data['thursdayChecked']
                    ),
                    array(
                    'hid'=>$hid[4],
                    'from_time'=>$data['fridayFrom'],
                    'to_time'=>$data['fridayTo'],
                    'active'=>$data['fridayChecked']
                    ),
                    array(
                    'hid'=>$hid[5],
                    'from_time'=>$data['saturdayFrom'],
                    'to_time'=>$data['saturdayTo'],
                    'active'=>$data['saturdayChecked']
                    ),
                    array(
                    'hid'=>$hid[6],
                    'from_time'=>$data['sundayFrom'],
                    'to_time'=>$data['sundayTo'],
                    'active'=>$data['sundayChecked']
                    )
                );
        $this->BusinessOwnerModel->updateStoreHours($lid,$updateArray);
        redirect(base_url().'BusinessOwner/BusinessOwner/dashboard/hours');
        
              }
        }
    }
    

//set the number of tables for restaurant reservition
    public function numberOfTables($lid,$condition){
                $fourSeater = $_POST['4seater'];
                $twoSeater = $_POST['2seater'];
                $booth = $_POST['booth'];
                $bar = $_POST['bar'];
                if ($condition) {
                $rids = $_POST['rids'];
                
                $updateData = 
                   array(
                       array(
                           'lid'=>$lid,
                           'rid'=>$rids[0],
                           'amount'=>$fourSeater,
                           ),
                           array(
                            'lid'=>$lid,
                            'rid'=>$rids[1],
                            'amount'=>$twoSeater,
                           ),
                           array(
                           'lid'=>$lid,
                           'rid'=>$rids[2], 
                           'amount'=>$booth,
                       ),
                           array(
                            'lid'=>$lid,
                            'rid'=>$rids[3],
                            'amount'=>$bar,
                        )
                    );
                } else {
                    $updateData = array();
                }
                    $newData = 
                   array(
                       array(
                           'lid'=>$lid,
                           'table_type'=>1,
                           'amount'=>$fourSeater,
                           ),
                           array(
                            'lid'=>$lid,
                            'table_type'=>2,
                            'amount'=>$twoSeater,
                           ),
                           array(
                           'lid'=>$lid,
                           'table_type'=>3, 
                           'amount'=>$booth,
                       ),
                           array(
                            'lid'=>$lid,
                            'table_type'=>4,
                            'amount'=>$bar,
                        )
                    );
                   
            if($this->BusinessOwnerModel->setTablesNumber($newData,$updateData,$lid))
            {
                
                $this->session->set_flashdata('sucess2','<div class="alert alert-danger text-center">Tables sucessfuly added!</div>');         
                redirect(base_url('BusinessOwner/BusinessOwner/dashboard/booking'));
            
            }
            else
              {
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something Wrong. Please try again ...</div>');
                redirect(base_url('BusinessOwner/BusinessOwner/booking'));
              }
     }
    
    function broadcastMessage(){
        //get data
        $this->form_validation->set_rules("message", "message", "trim|required");
        $data = array(
            'message' => $_POST['message'],
            'lid' => $_POST['lid']
            
            );
            
            
        if ($this->form_validation->run() == FALSE){
          $this->session->set_flashdata('broadcast','<div class="alert alert-danger text-center">Broadcast failed!</div>');
            redirect(base_url('BusinessOwner/BusinessOwner/dashboard/broadcast'));
            
        }
        else{
            $this->ObserverModel->notify($data);
            
            if($this->ObserverModel->getState() == 1){
                // emailobservers
                $listingID = $data['lid'];
                $emails = $this->ObserverModel->getEmails();
                $this->sendEmailToObservers($emails, $listingID);
            }

    $this->session->set_flashdata('broadcast','<div class="alert alert-success text-center">Broadcast sent!</div>');
        redirect(base_url('BusinessOwner/BusinessOwner/dashboard/broadcast'));     
        }
    }
    
    // add a new deal from business dashboard
    public function addNewDeal() {
         //set validations
         $this->form_validation->set_rules("deal_name", "deal_name", "trim|required");
         $this->form_validation->set_rules("deal_info", "deal_info", "trim|required");
         $this->form_validation->set_rules("deal_discount", "deal_discount", "trim|required");
         $this->form_validation->set_rules("promo_code", "promo_code", "trim");
         $this->form_validation->set_rules("expiry_date", "expiry_date", "trim");

         if ($this->form_validation->run() == FALSE)
         {
              //validation fails
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">There was an error adding a deal. Deal name, description and value are required fields.</div>');
              redirect('BusinessOwner/BusinessOwner/dashboard/addNewDeal');
         }
         else
         {
              //validation succeeds
              if ($this->input->post('add') == "add")
              {
                $lid = $this->input->post('lid');
                $data['lid'] = $lid;
                $data['deal_name'] = $this->input->post('deal_name');
                $data['deal_info'] = $this->input->post('deal_info');
                $data['discount'] = $this->input->post('deal_discount');
                $data['promo_code'] = $this->input->post('promo_code');
                $data['expiry'] = $this->input->post('expiry_date');
                if ($data['expiry'] == '0000-00-00') { $data['expiry'] = '';}
                
                if ($this->BusinessOwnerModel->addNewDeal($data,$lid)){
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">A new deal added successfully</div>');
               redirect(base_url().'BusinessOwner/BusinessOwner/dashboard/manageDeals');
                } else {
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">There was an error adding a deal</div>');
                redirect(base_url().'BusinessOwner/BusinessOwner/dashboard/mySubs/');
                }
              }
              else
              {
                  $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">There was an error adding a deal. Deal name, description and value are required fields.</div>');
                   redirect('BusinessOwner/BusinessOwner/dashboard/mySubs');
              }
         }
    }
    
    // delete a deal from business list 
    public function removeDeal($did) {
        $this->BusinessOwnerModel->removeDeal($did);
        redirect(base_url().'BusinessOwner/BusinessOwner/dashboard/manageDeals');
    }
    
    // update a deal from dashboard business
    public function updateDeal() {
        //set validations
         $this->form_validation->set_rules("deal_name", "deal_name", "trim|required");
         $this->form_validation->set_rules("deal_info", "deal_info", "trim|required");
         $this->form_validation->set_rules("deal_discount", "deal_discount", "trim|required");
         $this->form_validation->set_rules("promo_code", "promo_code", "trim");
         $this->form_validation->set_rules("expiry_date", "expiry_date", "trim");
         $did = $this->input->post('did');
         if ($this->form_validation->run() == FALSE)
         {
              //validation fails
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">There was an error updating a deal. Deal name, description and value are required fields.</div>');
              redirect(base_url().'BusinessOwner/BusinessOwner/dashboard/updateDeal/'.$did);
         }
         else
         {
              //validation succeeds
              if ($this->input->post('update') == "update")
              {
                
                $data['did'] = $did;
                $data['deal_name'] = $this->input->post('deal_name');
                $data['deal_info'] = $this->input->post('deal_info');
                $data['discount'] = $this->input->post('deal_discount');
                $data['promo_code'] = $this->input->post('promo_code');
                $data['expiry'] = $this->input->post('expiry_date');
                
                if ($this->BusinessOwnerModel->updateDeal($data,$did)){
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated Successfully</div>');
               redirect(base_url().'BusinessOwner/BusinessOwner/dashboard/updateDeal/'.$did);
                } else {
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">There was an error adding a deal</div>');
               redirect(base_url().'BusinessOwner/BusinessOwner/dashboard/updateDeal/'.$did);
                }
              }
              else
              {
                  $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">There was an error updating a deal. Deal name, description and value are required fields.</div>');
              redirect('BusinessOwner/BusinessOwner/dashboard/mySubs');
              }
         }
    }

public function reservition($lid)
    {
        $rserveDate = $_POST['reserve-date'];
        $rserveTime = $_POST['reserve-time'];
        $data['condition'] = 0;
        $data['Listing'] = $this->BusinessOwnerModel->getListing();
        $data['quicklinks'] = $this->load->view('BusinessOwner/quicklinks', $data, true);
        $data['tables'] = $this->BusinessOwnerModel->getTables($data['Listing']);
        $data['header'] = $this->load->view('header', null, true); 
        $data['dashboard'] = $this->load->view('BusinessOwner/dashboard', $data, true);
        $data['managePanel'] = $this->load->view('BusinessOwner/booking', $data, true);
        $data['searchResult'] = $this->BusinessOwnerModel->searchReservation($rserveDate, $rserveTime, $lid);
       return $this->load->view('BusinessOwner/reservationresult', $data);
    }
    
    public function uploadImage(){
        
        $this->upload->initialize(array(
            'upload_path' => './uploads/',
            'overwrite' => false,
            'max_filename' => 300,
            'encrypt_name' => true,
            'remove_spaces' => true,
            'allowed_types' => 'gif|jpg|jpeg|png',
            'max_size' => 2000,
            'xss_clean' => true,
        ));
        
        if ($this->upload->do_upload('userfile')) {
        
                $data = $this->upload->data(); // Get the file data
                $fileData[] = $data; // It's an array with many data
                // Interate throught the data to work with them
                foreach ($fileData as $file) {
                    $file_data = $file;
                }
            
            $lid= $this->input->post('lid');
            $data = array(
            'lid' => $lid,
           'image' => $file_data['file_name']
          );
          
          $this->BusinessOwnerModel->InsertImage($data);
        }
        else{
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url().'BusinessOwner/BusinessOwner/dashboard/gallery');
        }
       
        redirect(base_url().'BusinessOwner/BusinessOwner/dashboard/gallery');
    }
    
    function deleteImage($gid){
        
        if($this->BusinessOwnerModel->removeImage($gid)){
        $this->session->set_flashdata('msg_deleteImage', '<div class="alert alert-success text-center">Image removed!</div>');
        redirect(base_url().'BusinessOwner/BusinessOwner/dashboard/gallery');

        }
        else{
            $this->session->set_flashdata('msg_deleteImage', '<div class="alert alert-danger text-center">Image could not be removed!</div>');
            redirect(base_url().'BusinessOwner/BusinessOwner/dashboard/gallery');
        }
    }
    
    function sendEmailToObservers($emails, $lid){
        $storeTitle = $this->BusinessOwnerModel->getTitleOfListing($lid);
        
        foreach($storeTitle as $row){
            $tit = $row->title;
        }
        
        $subject  = "You have a message from ". $tit;
        $message = "<p>Check your Bisenda account <a href='https://bis-up.000webhostapp.com/user/User/dashboard/Messages'>Login</a> </p>";
        
        foreach($emails as $obs){
            foreach($obs as $key){
                    $email = $key['email'];
                    //echo "Emails here: <br>" . $email;
                    $this->emailNotification($email, $subject, $message);
            }
        }
        
    }
    
    function emailNotification($userEmail, $subject, $message){
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
    
    
    function confirmBooking($reserve_table_id, $email){
        $this->BusinessOwnerModel->updateBookingStatus($reserve_table_id);
         $this->sendReservationConfirmation($email);
        redirect(base_url().'BusinessOwner/BusinessOwner/dashboard/manageBooking');
    }
    
    function sendReservationConfirmation($email){
        $subject  = "Your reservation has been Confirmed";
        $message = "<p>Check your Bisenda account for details <a href='https://bis-up.000webhostapp.com/user/User/dashboard/'>Login</a> </p>";
        
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
        $this->email->to($email); 
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
    
    function addReview(){
        $uid = $this->input->post("userID");
        $lid = $this->input->post("listingID");
        $rating = $this->input->post("rating");
        $comment = $this->input->post("new-review");
        $url = $this->input->post("url");
        
         //set validations
         $this->form_validation->set_rules("rating", "Ratings", "required");
         $this->form_validation->set_rules("new-review", "Review", "required");
        
        if ($this->form_validation->run() == FALSE)
        {
       $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something wrong happened!.. Please include your rating with your review.</div>');
            redirect(base_url().'welcome/storeview/'. $url);
            
        }
        else
        {
        
            $data = array(
            'uid' => $uid,
            'lid' => $lid,
            'rate' => $rating,
            'comment' => $comment
            );
        
          $this->BusinessOwnerModel->submitReview($data);
          
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your review has been submitted!</div>');          
     
          redirect(base_url().'welcome/storeview/'. $url);
        }
        
    
    }
    
    	    public function sendEmailToUser() {
        $busEmail = $this->input->post('emailFrom');
        $userEmail = $this->input->post('emailTo');
        $busName = $this->input->post('name');
        $emailSubject = $this->input->post('subject');
        $emailMessage = $this->input->post('message');
        $this->form_validation->set_rules("subject", "subject", "trim|required");
        $this->form_validation->set_rules("message", "message", "trim|required");
        
        if ($this->form_validation->run() == FALSE)
        {
    //          //validation fails
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Error sending a message. Make sure to fill all fields</div>');
        } else {
            $this->sendEmail2($busEmail, $userEmail,$busName, $emailSubject, $emailMessage);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Message was successfully sent to '.$userEmail.'</div>');
                redirect(base_url().'BusinessOwner/BusinessOwner/dashboard/wrightemail/'.$userEmail);
        }
        
	}
	
	
	
	    public function sendEmail2($busEmail, $userEmail, $busName, $emailSubject, $emailMessage) {
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
        $this->email->to($userEmail); 
        $this->email->subject($emailSubject);
        $html_msg = '<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                    <tr>
                        <td align="center" valign="top">
                            <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailHeader">
                                <tr>
                                    <td align="center" valign="top">
                                    
                              <h1> From: </h1><h1>'.$busName.'</h1>
                                    <br>
                                 <h1> Subject: </h1><h1>'.$emailSubject.'</h1>
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
                                        <h3><p>Message:,</p>'.$emailMessage.'<p><br/></h3>
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
    
} // end of class 
?>
