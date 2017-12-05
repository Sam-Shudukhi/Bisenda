<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $header; ?>
<?php echo $dashboard; ?>

<?php

    //echo("<script>alert('from controller: Hello world');</script>");

?>



<?php
foreach($BusID as $tuple){ ?>
      <?php
        $this->session->userdata['BusinessOwner_logged_in']['bid'] = $tuple->bid;
        $bid = $tuple->bid;
        $owner = $tuple->owner;
        $ein = $tuple->ein;
        $phone = $tuple->phone;
        $email = $tuple->email;
        $city = $tuple->city;
        $province = $tuple->province;
        $DateJoined = $tuple->date_added;
      ?>
        
    


<?php } ?>

<?php


//echo "from sesssion BID:" . $this->session->userdata['BusinessOwner_logged_in']['bid'];
$bid = $this->session->userdata['BusinessOwner_logged_in']['bid'];
?>


<div class="container">
<div class="well form-horizontal">

      
<form form action="<?php echo base_url(); ?>BusinessOwner/BusinessOwner/UpdateInformation" method="post" class="form-horizontal">
<fieldset>

<h2>Edit Current Information</h2>
<input name ="busID" id="busID" value="<?php echo $bid; ?>" type="hidden">


<div class="form-group">
  <label class="control-label" for="owner">Name</label>  
  <input id="owner" name="owner" type="text" value="<?php echo $owner; ?>" class="form-control">
     <span class="text-danger"><?php echo form_error('owner'); ?></span>

</div>

<div class="form-group">
  <label class="control-label" for="ein">EIN</label>  
  <input id="ein" name="ein" type="text" value="<?php echo $ein; ?>" class="form-control">
         <span class="text-danger"><?php echo form_error('ein'); ?></span>

</div>

<div class="form-group">
  <label class="control-label" for="email">Email Address</label>  
 <input id="email" name="email" type="text" value="<?php echo $email; ?>" class="form-control">
             <span class="text-danger"><?php echo form_error('email'); ?></span>

</div>

                            <div class="form-group">
                                <label class="control-label" for="pswd">New Password</label>
                                    <div>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
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
  <label class="control-label" for="phone">Phone Number</label>  
  <input id="phone" name="phone" type="text" value="<?php echo $phone; ?>" class="form-control" required="required">
           <span class="text-danger"><?php echo form_error('phone'); ?></span>

</div>

<div class="form-group">
  <label class="control-label" for="city">City</label>  
  <input id="city" name="city" type="text" value="<?php echo $city; ?>" class="form-control" required="required">
           <span class="text-danger"><?php echo form_error('city'); ?></span>

</div>

<div class="form-group">
  <label class="control-label" for="province">Province</label>  
    <select id="province" name="province" class="form-control" value ="<?php echo $province; ?>" required="required">
           <option value="na" selected="">Choose Province:</option>
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


                            <div class="form-group"> 
                                <div class="row">
                                    <div class="col-sm-offset-5 col-sm-3  btn-submit">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </div>

</fieldset>
</form>


</div>
</div>
