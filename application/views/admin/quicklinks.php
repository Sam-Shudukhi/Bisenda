<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
 
<!DOCTYPE html>

<html>

<head>

  <meta name="generator" content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39">
    <!-- brough from https://bootsnipp.com/snippets/xxE9 -->
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
	<link href="https://netdna.bootstrapcdn.com/bootswatch/3.1.0/bootstrap/bootstrap.min.css" rel="stylesheet" title="theme">
	
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

<!-- end header -->

    <div class="row">

</div>
            <div class="row">

					<div class="panel ">
						<div class="panel-heading btn-primary">
							<h3 class="panel-title" style=''>
								<span class="glyphicon glyphicon-dash"></span> Quick Links
							</h3>
						</div>
						<div class="panel-body">
							<div class="row">
							
								
								
								<div class="col-lg-4">
									<a href="<?php echo base_url();?>Admin/dashboard/approve" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('approve');">
										<div id="box_1"><span class="fa fa-desktop fa-3x"></span></div>
										<div id="box_2" class="icon-label">Approve</div>
									
									</a>
								</div>
								
								
								<div class="col-lg-4">
									<a href="<?php echo base_url();?>Admin/dashboard/verify" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('verify');">
										<div id="box_1"><span class="fa fa-suitcase fa-3x"></span></div>
										<div id="box_2" class="icon-label">Verify</div>

									</a>
								</div>
								
								<div class="col-lg-4">
									<a href="<?php echo base_url();?>Admin/dashboard/contacts" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('contacts');">
										<div id="box_1"><span class="fa fa-user fa-3x"></span></div>
										<div id="box_2" class="icon-label">Contacts</div>

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


</body>
