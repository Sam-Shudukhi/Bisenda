<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $header; ?>
<?php echo $dashboard; 

echo '<br><br>'; 

foreach ($results as $row) {
  $first_name = $row->first;
  $last_name = $row->last;
  $email = $row->email;
  $phone = $row->phone;
  $birthdate = $row->birthdate;
  $date_added = $row->date_added;
    $pic = $row->pic;
}
?>
<br>


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
  </style>



  <div class="container">
    
    
   <div class="col-md-6">

    <div class="panel panel-default">
      <div class="panel-heading">  <h4 >User Profile</h4></div>
      <div class="panel-body">
       
        <div class="box box-info">
          
          <div class="box-body">
           <div class="col-sm-6">
             <div  align="center"> <img alt="User Pic" src="<?php echo "/uploads/" . $pic;?>" id="profile-image1" class="img-circle"> 
             </div>
             
             <br>
             
             <!-- /input-group -->
           </div>
           <div class="col-sm-6">
            <h4 style="color:#00b1b1;"><?php echo '' .$first_name. ' ' . $last_name . ' ' ; ?> </h4></span>
            <span><p>Member</p></span> 

            
            <div> Edit Profile
             <a href="<?php echo base_url();?>user/User/dashboard/editProfile" class="fa fa-pencil-square-o" role="button" style="padding:2px;" onclick="viewPage('editProfile');"> </a> </div>

             <div> Change Password
               <a href="<?php echo base_url();?>user/User/dashboard/changePassword" class="fa fa-key" role="button" style="padding:2px;"> </a> </div>


             </div>
             <div class="clearfix"></div>
             <hr style="margin:5px 0 5px 0;">
             
             
             <div class="col-sm-5 col-xs-6 tital " >First Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $first_name; ?> </div>
             <div class="clearfix"></div>
             <div class="bot-border"></div>


             <div class="col-sm-5 col-xs-6 tital " >Last Name:</div><div class="col-sm-7"> <?php echo $last_name; ?></div>
             <div class="clearfix"></div>
             <div class="bot-border"></div>

             <div class="col-sm-5 col-xs-6 tital " >Member since:</div><div class="col-sm-7"><?php echo $date_added; ?></div>

             <div class="clearfix"></div>
             <div class="bot-border"></div>

             <div class="col-sm-5 col-xs-6 tital " >Date Of Birth:</div><div class="col-sm-7"><?php echo $birthdate; ?></div>

             <div class="clearfix"></div>
             <div class="bot-border"></div>

             <div class="col-sm-5 col-xs-6 tital " >Phone Number:</div><div class="col-sm-7"><?php echo $phone; ?></div>

             <div class="clearfix"></div>
             <div class="bot-border"></div>


             <div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7"><?php echo $email; ?></div>




             <!-- /.box-body -->
           </div>
           <!-- /.box -->

         </div>
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




          