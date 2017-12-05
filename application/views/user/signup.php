<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo $header;?>
<style>#success_message{ display: none;}</style>


<div class="container">
 <?php $attributes = array("class" => "well form-horizontal", "id" => "signupform", "name" => "signupform");
    echo form_open("user/User/signup", $attributes);
    ?>
    <form class="well form-horizontal">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Registration Form</b></h2></center></legend><br>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">First Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="first_name" id='first_name' placeholder="First Name" class="form-control" type="text" value="<?php echo set_value('first_name'); ?>">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Last Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" id='last_name' placeholder="Last Name" class="form-control" type="text" value="<?php echo set_value('last_name'); ?>">
    </div>
  </div>
</div>
  
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Username</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="user_name" id='user_name' placeholder="Username" class="form-control" type="text" value="<?php echo set_value('user_name'); ?>">
    </div>
  </div>
</div>


<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" id='email' placeholder="E-Mail Address" class="form-control" type="text" value="<?php echo set_value('email'); ?>">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="user_password" id='user_password' placeholder="Password" class="form-control" type="password" value="<?php echo set_value('user_password'); ?>">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Confirm Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="confirm_password" id='confirm_password' placeholder="Confirm Password" class="form-control" type="password" value="<?php echo set_value('confirm_password'); ?>">
    </div>
  </div>
</div>




<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Contact No.</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="contact_no" id='contact_no' placeholder="(306-999-9999)" class="form-control" type="text" value="<?php echo set_value('contact_no'); ?>">
    </div>
  </div>
</div>

<!-- Select Basic -->

<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button name='signup-btn' type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>
<?php echo form_close(); ?>
      <?php echo $this->session->flashdata('msg'); ?>
</div>
    </div><!-- /.container -->

    <br><br>

    <?php require 'application/views/footer.php';