<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style type="text/css">
    .form-box{
      max-width: 500px;
      position: relative;
      margin: 5% auto;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="container">
      <div class="row">
        <div class="form-box">
          <div class="panel">
            <div class="panel-heading text-center">
              <h3>Register</h3>
              <hr>
            </div>
            <div class="panel-body">
              <div class="row">
                  <div class="col-sm-12">
                      <?php
                      
                    // if (isset($this->Factory)){
                    //     echo "Factory is loaded";
                    // }
                    

                    echo $this->session->flashdata('createList'); 
                      echo $this->session->flashdata('msg1'); 
                      echo $this->session->flashdata('msg2'); 
                      echo $this->session->flashdata('msg3'); 
                      ?>
                      
                      <?php echo validation_errors(); ?>
                  </div>
              </div>
              <form action="<?php echo base_url(); ?>BusinessOwner/BusinessOwner/registration" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                                    <label class="control-label" for="Name">Your Name</label>
                                        <div >
                                            <input type="text" class="form-control" id="Name" name="Name" placeholder="Please type your name" required="" value="<?php echo set_value('Name'); ?>">
                                            <span class="text-danger"><?php echo form_error('Name'); ?></span>
                                        </div>
                                </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                                    <label class="control-label" for="EIN">Employer Identification Number</label>
                                        <div >
                                            <input type="text" class="form-control" id="EIN" name="EIN" placeholder="12-2342343" required="" value="<?php echo set_value('EIN'); ?>">
                                            <span class="text-danger"><?php echo form_error('EIN'); ?></span>
                                        </div>
                                </div>
                  </div>
                </div>
                
                            
                <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                    <div>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="" value="<?php echo set_value('email'); ?>">
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label" for="phone">Phone</label>
                                    <div>
                                        <input type="phone" class="form-control" id="phone" name="phone" placeholder="(306)-123-1234" required="" value="<?php echo set_value('phone'); ?>">
                                        <span class="text-danger"><?php echo form_error('phone'); ?></span>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label" for="city">City</label>
                                    <div>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="for example Regina" required="" value="<?php echo set_value('city'); ?>">
                                        <span class="text-danger"><?php echo form_error('city'); ?></span>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label" for="province">Province</label>
                                    <div>
                                        
                                <select id="province" name="province" class="form-control" required="required">
                                    <option value="" selected="">Choose Province:</option>
                                    <option value="OA">OA</option>
                                    <option value="QC">QC</option>
                                    <option value="NS">NS</option>
                                    <option value="NB">NB</option>
                                    <option value="MB">MB</option>
                                    <option value="BC">BC</option>
                                    <option value="PE">PE</option>
                                    <option value="SK">SK</option>
                                    <option value="AB">AB</option>
                                    <option value="NL">NL</option>
                                                                
                                </select>
                            
                                        <span class="text-danger"><?php echo form_error('province'); ?></span>
                                    </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="control-label" for="category">Type of Business</label>
                                    <div>
                                        
                                <select id="category" onchange='setBooking(this.value);'name="category" class="form-control" required="required">
                                    <option value=''>Choose Type of Business</option>
                                    <option value="Restaurant">Restaurant</option>
                                    <option value="Barber shop/Spa">Barber shop/Spa</option>
                                    <option value="Personal Health">Personal Health</option>
                                    <option value="Department Store">Department Store</option>
                                    <option value="Electronic Store">Electronic Store</option>
                                    <option value="Grocery Store">Grocery Store</option>
                                    <option value="Convenience Store">Convenience Store</option>
                                    <option value="Cosmetics Store">Cosmetics Store</option>
                                    <option value="Clothing/Shoe Store">Clothing/Shoe Store</option>
                                    <option value="Entertainment">Entertainment</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Other">Other</option>
                                                                
                                </select>
                            
                                        <span class="text-danger"><?php echo form_error('category'); ?></span>
                                    </div>
                            </div>
                            
                            
                            <div class="form-group" id='setBooking' style='display:none;'>
                                <label class="control-label" for="booking_type">Does Your Business Provide Booking?</label>
                                    <div>
                                        
                            <select id="booking_type" name="booking_type" class="form-control">
                                    <option value="3" selected="">Does Your Business Provide Booking?</option>
                                    <option value="1">Yes, we provide our own booking</option>
                                    <option value="2">No, I need Bisenda booking</option>
                                    <option value="3">No, no booking is needed</option>
                            </select>
                            
                                        <span class="text-danger"><?php echo form_error('booking_type'); ?></span>
                                    </div>
                            </div>
                            
                
                            <div class="form-group">
                                <label class="control-label" for="pswd">Password</label>
                                    <div>
                                        <input type="password" class="form-control" id="pswd" name="password" placeholder="Password" required="">
                                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="cn-pswd">Confirm Password</label>
                                    <div>
                                        <input type="password" class="form-control" id="cn-pswd" name="confirmpswd" placeholder="Confirm Password" required="">
                                        <span class="text-danger"><?php echo form_error('confirmpswd'); ?></span>
                                    </div>
                            </div>
                            
                            <div class="form-group"> 
                                <div class="row">
                                    <div class="col-sm-offset-5 col-sm-3  btn-submit">
                                        <button type="submit" class="btn btn-success">Register</button>
                                    </div>
                                </div>
                            </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
      function setBooking(val) {
          if (val == 'Restaurant') {
              $('#setBooking').show();
          } else {
              $('#setBooking').hide();
          }
      }
  </script>
  
<br><br>

<?php require 'application/views/footer.php';