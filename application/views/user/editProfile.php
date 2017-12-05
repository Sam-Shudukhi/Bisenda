 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $header; ?>
<?php echo $dashboard; 

echo '<br>'; 
foreach ($results as $row) {
  // echo 'First Name: ' . $row->first . '<br>';
  
}
?>



<style type="text/css">
    input.hidden {
    position: absolute;
    left: -9999px;
}

#profile-image1 {
    cursor: pointer;
  
     width: 100px;
    height: 100px;
  border:2px solid #03b1ce ;}
  .tital{ font-size:16px; font-weight:500;}
   .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0} 
   #hide {
display:none
} 
  </style>



  <div class="container">
        
        
       <div class="col-md-6 col-md-offset-3">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >User Profile</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"><?php echo '' .$row->first. ' ' . $row->last . ' ' ; ?> </h4></span>
              <span><p>Member since <?php echo $row->date_added; ?> </p></span> 

                     
                        


            </div>
                  <?php echo form_open_multipart('user/User/editProfile');
                    echo $this->session->flashdata('error');
                  ?> 

                
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <div class="col-sm-6">
       <div  align="left"> <img alt="User Pic" src="<?php echo "/uploads/" . $row->pic; ?>" id="profile-image1" class="img-circle img-responsive"> 

                <input name="userfile" id="userfile" type="file" class="hide">
<div style="color:#999;" >click here to change profile image</div>
                <!--Upload Image Js And Css-->
                     </div>
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
    <input type="text" id="hide" name="user_id" value="<?php echo $row->uid; ?>">
              
<div class="col-sm-5 col-xs-6 tital " >First Name:</div>
<input name="first_name" id='first_name' class="col-sm-5" type="text" value="<?php echo $row->first; ?>" required="">


     <div class="clearfix"></div>
<div class="bot-border"></div>


<div class="col-sm-5 col-xs-6 tital " >Last Name:</div>
<input name="last_name" id='last_name' value="<?php echo $row->last; ?>" class="col-sm-5" type="text" required="">

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Email:</div>
<input name="email" id='email' value="<?php echo $row->email; ?>" class="col-sm-5" type="text" required="">

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Phone Number:</div>

<input name="phone" id='phone' value="<?php echo $row->phone; ?>" class="col-sm-5" type="phone">

  <div class="clearfix"></div>
<div class="bot-border"></div>



<div class="col-sm-5 col-xs-6 tital " >Date Of Birth:</div>
<input name="birthdate" id='birthdate' value="<?php echo $row->birthdate; ?>" class="col-sm-5" type="date" required="">






            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
            
            <div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
      <br>
  <button name='signup-btn' type="submit" class="btn btn-warning" value="upload"></span> Submit</button>
  </div>
</div>

</form>
    </div> 



    </div>




</div> 


    <script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#userfile').click();
    });
});       
              </script>      
       
   </div>
</div>




         