<?php defined('BASEPATH') OR exit('No direct script access allowed');

foreach($Listing as $k) {
    $category = $k->category;
}

?>
 
<!DOCTYPE html>

<html>

<head>

    <!-- we brough from https://bootsnipp.com/snippets/xxE9 -->
  <!-- Force IE to turn off past version compatibility mode and use current version mode -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">
  <!-- Get the width of the users display-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Text encoded as UTF-8 -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<!-- bootstrap -->
	<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="default">
	<!-- theme -->

<style>
body {background-color: #eee;color:#00477e;}
table#TixManagementContent {background-color: #eee ;}
.navbar-btn.navbar-left {margin-left: 10px;}
.navbar-btn.navbar-right {margin-right: 10px;}

 </style>
 
 <script>
 $(function(){
    

    $(".input-group-btn .dropdown-menu li a").click(function(){

        var selText = $(this).html();
    
        //working version - for single button //
       //$('.btn:first-child').html(selText+'<span class="caret"></span>');  
       
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

<!-- end header -->

    <div class="row">

         <nav class="navbar navbar-default" role="navigation">
                
                <div class=" navbar-btn navbar-left">
                    <button class="btn btn-default">
						<span class="glyphicon glyphicon-dashboard"></span>
					<span class="label-icon"><a href='<?php echo base_url();?>BusinessOwner/BusinessOwner/dashboard' style='text-decoration=none;color:black;' id='dash'>Dashboard</a></span>
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
    
            <div class="row">

					<div class="panel ">
						
						
						<div class="panel-body" style="background-color:#eee">
							<div class="row">
							
							<div class="col-lg-2">
									<a href="<?php echo base_url();?>BusinessOwner/BusinessOwner/dashboard/hours" data-toggle="collapse" data-target="#recent" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('recent');">
										<div id="box_1"><span class="fa fa-clock-o fa-3x"></span></div>
										<div id="box_2" class="icon-label">Operational Hours</div>
									</a>
								</div>

								<div class="col-lg-2">
									<a href="<?php echo base_url();?>BusinessOwner/BusinessOwner/dashboard/myListing" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('myListing');">
										<div id="box_1"><span class="fa fa-list fa-3x"></span></div>
										<div id="box_2" class="icon-label">Edit Business Listing</div>
									</a>
								</div>
								

								
								<div class="col-lg-2">
									<a href="<?php echo base_url();?>BusinessOwner/BusinessOwner/dashboard/myDeals" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('mySubs');">
										<div id="box_1"><span class="fa fa-usd fa-3x"></span></div>
										<div id="box_2" class="icon-label">Deals</div>
									</a>
								</div>
								<?php if ($category == 'Restaurant') {?>
								<div class="col-lg-2">
									<a href="<?php echo base_url();?>BusinessOwner/BusinessOwner/dashboard/booking" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('booking');">
										<div id="box_1"><span class="fa fa-suitcase fa-3x"></span></div>
										<div id="box_2" class="icon-label">My Booking</div>
									</a>
								</div>
								<?php } ?>

                <div class="col-lg-2">
                  <a href="<?php echo base_url();?>BusinessOwner/BusinessOwner/dashboard/broadcast" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('broadcast');">
                    <div id="box_1"><span class="fa fa-send fa-3x"></span></div>
                    <div id="box_2" class="icon-label">Broadcast</div>
                  </a>
                </div>
								
								<div class="col-lg-2">
									<a href="<?php echo base_url();?>BusinessOwner/BusinessOwner/dashboard/setting" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('setting');">
										<div id="box_1"><span class="fa fa-cog fa-3x"></span></div>
										<div id="box_2" class="icon-label">Settings</div>

									</a>
								</div>


								<div class="col-lg-2">
								   
									<a href="<?php echo base_url();?>BusinessOwner/BusinessOwner/dashboard/gallery" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('gallery');">
										<div id="box_1"><span class="fa fa-photo fa-3x"></span></div>
										<div id="box_2" class="icon-label">Gallery</div>

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
 
</body>


