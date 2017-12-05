 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $header; ?>
<?php echo $dashboard; 

echo '<br>'; 

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

  <div class="container" >


<form method="post" action="<?php echo base_url() . "user/User/changePassword"?>">
        
            <input type="text" id="hide" name="user_id" value="<?php echo $row->uid; ?>">

       <div class="col-md-6 col-md-offset-3">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >Change Password</h4></div>
   <div class="panel-body">
       <div class="col-sm-12">
                      <?php echo $this->session->flashdata('msg'); ?>
                  </div>
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

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
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button name='signup-btn' type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</form>
    </div> 



    </div>




</div> 
</div> 


    <script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});       
              </script>      
       
   </div>
</div>




         