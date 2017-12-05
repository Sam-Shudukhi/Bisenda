  <?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<style type="text/css">

a.btn:hover {
     -webkit-transform: scale(1.1);
     -moz-transform: scale(1.1);
     -o-transform: scale(1.1);
 }
 a.btn {
     -webkit-transform: scale(0.8);
     -moz-transform: scale(0.8);
     -o-transform: scale(0.8);
     -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
     -o-transition-duration: 0.5s;
 }
</style>

  <!DOCTYPE html>

  <html>

  <head>

    <meta name="generator" content="">
    <!-- brough from https://bootsnipp.com/snippets/xxE9 -->
    <!-- Force IE to turn off past version compatibility mode and use current version mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">
    <!-- Get the width of the users display-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Text encoded as UTF-8 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

    <!-- icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="default">
    <!-- theme -->
    <!--<link href="https://netdna.bootstrapcdn.com/bootswatch/3.1.0/bootstrap/bootstrap.min.css" rel="stylesheet" title="theme">-->

    <style>
      body {background-color: #eee;color:#00477e;}
      table#TixManagementContent {background-color: ;}
      .navbar-btn.navbar-left {margin-left: 10px;}
      .navbar-btn.navbar-right {margin-right: 10px;}

    </style>

    <script>
     $(function(){


      $(".input-group-btn .dropdown-menu li a").click(function(){

        var selText = $(this).html();
  
         //working version - for multiple buttons //
         $(this).parents('.input-group-btn').find('.dropdown-toggle').html(selText+'<span class="caret"></span>');

       });

    });


  </script>
</head>

<body>
   

  <!-- start header -->
  <center>
      
    <table width="90%" id="TixManagementContent" class="TixManagementContent" style='background=red'>
      <tbody>
        <tr>
          <td align="left">

            <div id="boxed-page">  

              <div id="wrapper" class="bootstrap">

    <div class="row">

         <nav class="navbar navbar-default" role="navigation">
                
                <div class=" navbar-btn navbar-left">
                    <button class="btn btn-default">
						<span class="glyphicon glyphicon-dashboard"></span>
					<span class="label-icon"><a href='<?php echo base_url();?>user/User/dashboard' style='text-decoration=none;color:black;' id='dash'>Dashboard</a></span>
					</button>
                </div>
                <div class=" navbar-btn navbar-left">
                    <button class="btn btn-default">
						<span class="glyphicon glyphicon-envelope"></span>
					<span class="label-icon"><a href='<?php echo base_url();?>welcome/contactUs' style='text-decoration=none;color:black;' id='dash'>Contact Support</a></span>
					</button>
                </div>
        </nav>
           </div>
                <!-- end header -->

                <div class="row">

    

  </div>
  <div class="row">

   <div class="panel">
    <div class="panel-heading btn-primary">
     <h3 class="panel-title" style=''>
      <span class="glyphicon glyphicon-dash"></span> Quick Links
    </h3>
  </div>
  <div class="panel-body">
   <div class="row">


  <div class="col-lg-2">
   <a href="<?php echo base_url();?>user/User/dashboard/myBookings" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('myBookings');">
    <div id="box_1"><span class="fa fa-calendar fa-3x"></span></div>
    <div id="box_2" class="icon-label">My Bookings</div>
  </a>
</div>



<div class="col-lg-2">
 <a href="<?php echo base_url();?>user/User/dashboard/mySubscriptions" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('mySubscriptions');">
  <div id="box_1"><span class="fa fa-users fa-3x"></span></div>
  <div id="box_2" class="icon-label">My Subscriptions</div>
</a>
</div>

<div class="col-lg-2">
 <a href="<?php echo base_url();?>user/User/dashboard/myNotes" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('myNotes');">
  <div id="box_1"><span class="fa fa-sticky-note fa-3x"></span></div>
  <div id="box_2" class="icon-label">My Notes</div>
</a>
</div>

<div class="col-lg-2">
<a href="<?php echo base_url();?>user/User/dashboard/myReviews" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('myReviews');">
    <div id="box_1"><span class="fa fa-comments fa-3x"></span></div>
    <div id="box_2" class="icon-label">My Reviews</div>
  </a>
</div>

<div class="col-lg-2">
  <a href="<?php echo base_url();?>user/User/dashboard/Messages" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('Messages');">
    <div id="box_1"><span class="fa fa-envelope fa-3x"></span></div>
    <div id="box_2" class="icon-label">Messages</div>
  </a>
</div>

<div class="col-lg-2">
 <a href="<?php echo base_url();?>user/User/dashboard/profile" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('profile');">
  <div id="box_1"><span class="fa fa-cog fa-3x"></span></div>
  <div id="box_2" class="icon-label">Profile</div>
</a>
</div>

</div>
</div>
</div>

</div>



<!-- start footer -->    	
</div>
</div>

</td>
</tr>
</tbody>
</table>
</center>
<!-- end footer -->

<script>
 function viewPage(id) {
  var arrayOfIds = ['recent','approve','email','manage','verify','contacts'];
  $.each(arrayOfIds, function (index, value) {
    if (id == value) {
      swal(value);
      $('#'+id).removeClass('w3-hide');
      $('#'+id).addClass('w3-hide');
      $('#'+id).show();
    } else {
      $('#'+id).removeClass('w3-hide');
      $('#'+id).addClass('w3-hide');
    }
  });
}</script>
</body>


