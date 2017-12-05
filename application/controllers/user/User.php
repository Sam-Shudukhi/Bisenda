<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
            // Your own constructor code
            $this->load->helper(array('form','url','html'));
            $this->load->library(array('session','form_validation','email','upload'));
            //load the login model
            $this->load->model('User_model');
            //load the observer model
            $this->load->model('ObserverModel');
  }

    // view / process login
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
    $this->load->view('user/index.php');
  }
  else
  {
              //validation succeeds
    if ($this->input->post('btn_login') == "Login")
    {
                   //check if username and password is correct
     $usr_result = $this->User_model->get_user($username, $password);
                   if ($usr_result > 0) //active user record is present
                   {
                       $user_confirmed = $this->User_model->checkAccountConfirmed($username,$password);
                       if ($user_confirmed > 0) {
                        //set the session variables
                        foreach($usr_result as $info) {$uid = $info->uid;}
                    $sessiondata = array(
                     'username' => $username,
                     'uid' =>$uid,
                     'loginuser' => TRUE
                     );
                    $this->session->set_userdata('logged_in',$sessiondata);
                    redirect(base_url().'user/User/dashboard');
                  } else {
                      $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please confirm your account in the email we sent you</div>');
                    redirect('user/User/index');
                  }
                   }
                  else
                  {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                    redirect('user/User/index');
                  }
                }
                else
                {
                  require 'application/views/header.php';                
                  redirect('user/User/index');
                }
              }
            }

            // view signup page when clicked from header
            public function signup() {

              require 'application/views/header.php';                
              $this->load->view('user/register');
            }

        // process signup registration form
            public function registration()
            {
    //validate input value with form validation class of codeigniter
              $this->form_validation->set_rules('fname', 'First Name', 'required');
              $this->form_validation->set_rules('lname', 'Last Name', 'required');
              $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
              $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');
              $this->form_validation->set_rules('confirmpswd', 'Password Confirmation', 'required|matches[password]');
              $this->form_validation->set_message('is_unique', 'This %s is already exits');
              if ($this->form_validation->run() == FALSE)
              {
                require 'application/views/header.php';                            
                $this->load->view('user/register');
              }
              else
              {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $passhash = hash('md5', $password);

            //md5 hashing algorithm to decode and encode input password
                $saltid     = md5($email);
                $status     = 0;
                $data = array('first' => $fname,
                  'last' => $lname,
                  'email' => $email,
                  'pass' => $passhash,
                  'confirmed' => $status);
                if($this->User_model->insertuser($data))
                {
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
                else
                {
                  $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something Wrong. Please try again ...</div>');
                  redirect(base_url());
                }
              }
            }

            // change password function
            public function changePassword()
            {
    //validate input value with form validation class of codeigniter
              $id= $this->input->post('user_id');

              $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');
              $this->form_validation->set_rules('confirmpswd', 'Password Confirmation', 'required|matches[password]');

              if ($this->form_validation->run() == FALSE)
              {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Invalid password!</div>'); 

                redirect(base_url().'user/User/dashboard/changePassword');
              }
              else
              {
                $password = $_POST['password'];
                $passhash = hash('md5', $password);

                $data = array('pass' => $passhash);

                $this->User_model->updatePassword($id,$data);
                redirect(base_url().'user/User/dashboard/profile');

              }

            }
            
            // send email to user
            function sendemail($email,$saltid){
    // configure the email setting

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
        $url = base_url()."user/User/confirmation/".$saltid;
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
    
    // confirm account after signup
    public function confirmation($key)
    {
      if($this->User_model->verifyemail($key))
      {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your Email Address is successfully verified!</div>');
        redirect(base_url().'user/User/index');
      }
      else
      {
        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Your Email Address Verification Failed. Please try again later...</div>');
        redirect(base_url());
      }
    }

    // dashboard views
    public function dashboard($pageName = null) { 
      if($this->session->userdata('logged_in')){
            //uesr is already logged in
            // if no page agument, view dashboard
        if (!$pageName) {
            
        $data['results'] = $this->User_model->getUserInformation();
        $data['results'] = $this->User_model->getDeals($data['results']);
   
        require 'application/views/header.php';  
          $this->load->view('user/dashboard', $data); 
        } 

            // view profile
        if ($pageName == 'profile') {
          $data['results'] = $this->User_model->getUserInformation();
          $data['header'] = $this->load->view('header', null, true);
          $data['dashboard'] = $this->load->view('user/dashboard', null, true);
          $this->load->view("user/profile", $data);
        }

        else if ($pageName == 'editProfile') {
          $data['results'] = $this->User_model->getUserInformation();
          $data['header'] = $this->load->view('header', null, true);
          $data['dashboard'] = $this->load->view('user/dashboard', null, true);
          $this->load->view("user/editProfile", $data);
        }

        else if ($pageName == 'changePassword') {
          $data['results'] = $this->User_model->getUserInformation();
          $data['header'] = $this->load->view('header', null, true);
          $data['dashboard'] = $this->load->view('user/dashboard', null, true);
          $this->load->view("user/changePassword", $data);
        }

        else if ($pageName == 'myBookings') {
          $data['results'] = $this->User_model->getUserBookings();
          $data['header'] = $this->load->view('header', null, true);
          $data['dashboard'] = $this->load->view('user/dashboard', null, true);
          $this->load->view("user/myBookings", $data);
        } 

        else if ($pageName == 'myNotes') {

          $data['results'] = $this->User_model->getUserNotes();
          $data['header'] = $this->load->view('header', null, true);
          $data['dashboard'] = $this->load->view('user/dashboard', null, true);
          $this->load->view("user/myNotes", $data);
        } 

        else if ($pageName == 'myReviews') {
          $data['results'] = $this->User_model->getUserReviews();
          $data['header'] = $this->load->view('header', null, true);
          $data['dashboard'] = $this->load->view('user/dashboard', null, true);
          $this->load->view("user/myReviews", $data);
        }

        else if ($pageName == 'Messages') {
           $data['Results'] = $this->User_model->getUserInformation();
            $data['mail'] = $this->User_model->getMessages($data['Results']);
          $data['header'] = $this->load->view('header', null, true);
          $data['dashboard'] = $this->load->view('user/dashboard', null, true);
          $this->load->view("user/Messages", $data);
        }
        else if ($pageName == 'mySubscriptions') {
           $data['Results'] = $this->User_model->getUserInformation();
            $data['list'] = $this->User_model->getListSubscriptions($data['Results']);
          $data['header'] = $this->load->view('header', null, true);
          $data['dashboard'] = $this->load->view('user/dashboard', null, true);
          $this->load->view("user/mySubscriptions", $data);
        }
        else if ($pageName == 'recent') {
          $config["base_url"] = base_url() . "user/dashboard/".$pageName;

          $data['header'] = $this->load->view('header', null, true);
          $data['dashboard'] = $this->load->view('user/dashboard', null, true);
          $this->load->view("user/recent", $data);
        }



        } // if not logged in.
        else {
          echo '<h1>WLECOME, YOU NEED TO <a href="'.base_url().'user/User">LOGIN</a> FIRST</h1><br>'; 
        }
      }

        // delete existing note
       public function deleteNote($user_id,$note_id) {
        $this->User_model->deleteNote($user_id,$note_id);
        redirect(base_url().'user/User/dashboard/myNotes'); 

      }

    // logout btn
      public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect(base_url().'user/User');

      }

      
    public function editProfile() {

          
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

            $id= $this->input->post('user_id');
            $data = array(
          'first' => $this->input->post('first_name'),
          'last' => $this->input->post('last_name'),
          'email' => $this->input->post('email'),
          'phone' => $this->input->post('phone'),
          'birthdate' => $this->input->post('birthdate'),
           'pic' => $file_data['file_name'],
          );
          
          $this->User_model->updateUserInfo($id,$data);

        $this->session->unset_userdata("logged_in");
        $sessiondata = array(
          'username' => $this->input->post('email'),
          'loginuser' => TRUE
          );

        $this->session->set_userdata('logged_in', $sessiondata);
        
        }
        else{
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url().'user/User/dashboard/editProfile');
        }
        
       
        redirect(base_url().'user/User/dashboard/profile');

     }

    
    // subscribe to a business
    public function subscribeToListing($uid,$lid,$url){
        // passes $data to observer that subscribes to the subject
        $this->ObserverModel->subscribe($uid,$lid);
        redirect(base_url() . 'welcome/storeview/'.$url);
    }
    
    // unsubscibe from business
    public function unsubscribeFromListing($uid,$lid,$url){
        // passes $data to observer to unsubscribe from the subject
        
      $this->ObserverModel->unsubscribe($uid,$lid);
        if($url == 'mySubscriptions'){
            redirect(base_url() . 'user/User/dashboard/'.$url);
            
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have unsubsribed from store successfully!</div>');
            
        }
        else{
             redirect(base_url() . 'welcome/storeview/'.$url);
         }
    }
    
    // add note for a business view 
    public function addNote($uid,$lid,$url){
        //get the posted values
        $note = $this->input->post("txt_note");
        $this->form_validation->set_rules("txt_note", "Note", "trim|required");
        if ($this->form_validation->run() == FALSE)
        {
              //validation fails
            redirect(base_url() . 'welcome/storeview/'.$url);
        }
        else {
                      //validation succeeds
    if ($this->input->post('submit_note') == "Save")
    {
        $add_note = $this->User_model->add_note($uid,$lid,$note);
        redirect(base_url() . 'welcome/storeview/'.$url);
    }
        }
    }
    
    // cancel user appointment / set value to 3.
    public function cancelAppointment($rid) {
        if ($this->User_model->deleteAppointment($rid)) {
            redirect(base_url().'user/User/dashboard/myBookings');
        }
    }
    
    
    // send email 
    public function sendEmailMessage($userEmail, $subject, $message) {
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
    // add a new booking for a user 
    public function addBooking($url) {
        $uid = $this->input->post('uid');
        $lid = $this->input->post('lid');
        $qunat1Rid = $qunat2Rid = $qunat3Rid = $qunat4Rid = '';
        // quantites selected for each table
        $quantity1 = $this->input->post('quantity1');
        $quantity2 = $this->input->post('quantity2');
        $quantity3 = $this->input->post('quantity3');
        $quantity4 = $this->input->post('quantity4');
        $bookingTime = $this->input->post('bookingTime');
        $bookingDate = $this->input->post('bookingDate');
        $storeName = $this->input->post('storeName');
        $storeEmail = $this->input->post('storeEmail');
        $userEmail = $this->input->post('userEmail');
        $data['lid'] = $lid;
        $data['uid'] = $uid;
        $data['date_reserved'] = $bookingDate;
        $data['time_reserved'] = $bookingTime;
        // set rids
        if ($quantity1 != 0) {
            $qunat1Rid = $this->input->post('type1Rid');
            $data['rid'] = $qunat1Rid;
            $data['quantity'] = $quantity1;
            $this->User_model->insertBooking($data);
        }
        if ($quantity2 != 0) {
            $qunat2Rid = $this->input->post('type2Rid');
            $data['rid'] = $qunat2Rid;
            $data['quantity'] = $quantity2;
          $this->User_model->insertBooking($data);
        }
        if ($quantity3 != 0) {
            $qunat3Rid = $this->input->post('type3Rid');
            $data['rid'] = $qunat3Rid;
            $data['quantity'] = $quantity3;
          $this->User_model->insertBooking($data);
        }
        if ($quantity4 != 0) {
            $qunat4Rid = $this->input->post('type4Rid');
            $data['rid'] = $qunat4Rid;
            $data['quantity'] = $quantity4;
            $this->User_model->insertBooking($data);
        }

        $messageToUser = 
        '<table class="table" style="width:100%">
        <tr>
            <th colspan="5">Tables</th>
        </tr>
        <tr>
            <th>Type</th>
            <th>4 Seater</th>
            <th>2 Seater</th>
            <th>Booth</th>
            <th>Bar</th>
        </tr>
        <tr>
            <th>Quantity</th>
            <th>'.$quantity1.'</th>
            <th>'.$quantity2.'</th>
            <th>'.$quantity3.'</th>
            <th>'.$quantity4.'</th>
        </tr>
        <tr>
            <th>Date</th>
            <th colspan="4">'.$bookingDate.'</th>
        </tr>
        <tr>
            <th>Time</th>
            <th colspan="4">'.$bookingTime.'</th>
        </tr>
        </table>
        ';
        
        
        
        $messageToStore = '
            <table class="table" style="width:100%">
            <tr>
                <th>Booked By</th>
            </tr>
            <tr>
                <th>'.$userEmail.'</th>
            </tr>
            </table>
            <br><br>
        ';
        
        $this->sendEmailMessage($userEmail,'Bisenda: Your Reservation is Awaiting Approval',$messageToUser);
        $this->sendEmailMessage($storeEmail,'Bisenda: A New Reservation is Awaiting Your Approval',$messageToStore . $messageToUser);
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Good To Go, Nice, Thank you for your reservation. You will receive an email shortly. * Your booking is awaiting approval by the store.</div>');
        redirect(base_url().'welcome/storeview/'.$url);
    }
    
    
    // remove user note 
    public function removeComment($rid,$uid) {
        // if user is loggin session is expired
        if ($uid == '') {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">You need to login first.</div>');
            redirect(base_url().'user/User/dashboard/myReviews');
        }  // else if not, check if user owns the comment
        else {
            $review_owner_id = $this->User_model->getReviewOwner($rid);
            if (!empty($review_owner_id)) {
            foreach($review_owner_id as $val) {
                $ruid = $val->uid;
            }
            } else {
                $ruid = 0;
            }
            // user owns the review
            if ($ruid == $uid) {
                $this->User_model->removeComment($rid);
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your comment was successfully removed.</div>');
            redirect(base_url().'user/User/dashboard/myReviews');
            } // else if user doesn't own comment
            else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Illegal Move. Access Denied.</div>');
            redirect(base_url().'user/User/dashboard/myReviews');
            }
        }
        
    }
    
    
} // end of class
?>
