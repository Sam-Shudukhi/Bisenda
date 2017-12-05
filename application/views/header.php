<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
<head>
<title> BISENDA - Your Business Agenda</title>
<!-- <meta name='viewpoint' initial-scale='1.0' charset='UTF-8'> -->
<meta charset="UTF-8">
<meta name="description" content="Bisup home page">
<meta name="keywords" content="Business,Start-up,Booking,Marketinh">
<meta name="author" content="Bisup team">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Latest compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <style>
  body {
   top:1;
   padding:10px 10px;
   background-size: cover;
   background-color: #eee;
  }</style>
</head>

<body>
<!-- // navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <!-- home -->
      <a class="navbar-brand" href="<?php echo base_url();?>welcome">BISENDA</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <!-- home / deals -->
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url();?>welcome">Home</a></li>
        <li><a href="<?php echo base_url();?>welcome/contactUs">Contact us</a></li>
        <li><a href="<?php echo base_url();?>welcome/deals">Deals</a></li>
      </ul>

      <!-- merchants -->
      <ul class="nav navbar-nav navbar-right">
        <?php if ($this->session->userdata('admin_logged_in') || $this->session->userdata('logged_in')) { echo '<div style="display:none">'; }?>        
        <?php
        // when BusinessOwner is logged in, disable "are you a merchant?" dropdown menu
            if ($this->session->userdata('BusinessOwner_logged_in')){ ?>
                      <!-- empty if statement -->
        <li><a href='<?php echo base_url();?>BusinessOwner/BusinessOwner/dashboard'><?php echo $this->session->userdata['BusinessOwner_logged_in']['username']; ?>&nbsp;<i class='fa fa-suitcase'></i>&nbsp;</a></li>

        <?php   
                
            }else{ // this else means not business owner so display the menu
                ?>
                
                 <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" style='text-decoration:underline;cursor:pointer'>Are you a merchant?<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url();?>BusinessOwner/BusinessOwner/signup">List your business</a></li>
            <li><a href="<?php echo base_url();?>BusinessOwner/BusinessOwner">Dashboard</a></li>
          </ul>
        </li> 
                
        <?php
            }            
        ?>
        <?php if ($this->session->userdata('admin_logged_in') || $this->session->userdata('logged_in')) { echo '</div>'; }?>  
        
        
      <!-- dashboard when admin is signed up -->
      <?php if ($this->session->userdata('admin_logged_in')) { ?>
      <li><a href='<?php echo base_url();?>Admin/dashboard'>Admin <span class='glyphicon glyphicon-user'></span></a></li>
    <?php } ?>

    <!-- dashboard when user is signed up -->
    <?php if ($this->session->userdata('logged_in')) { ?>
      <li><a href='<?php echo base_url();?>user/User/dashboard'><?php echo $this->session->userdata['logged_in']['username']; ?><span class='glyphicon glyphicon-user'></span></a></li>
    <?php } ?>

        <!-- signup signin signout -->
        <?php if ($this->session->userdata('admin_logged_in')) {
          ?><li><a href="<?php echo base_url();?>Admin/logout"> Signout <span class="glyphicon glyphicon-log-out"></span></a></li><?php
        }else if ($this->session->userdata('logged_in')) { ?>
          <li><a href="<?php echo base_url();?>user/User/logout"> Signout <span class="glyphicon glyphicon-log-out"></span></a></li><?php       
      }else if($this->session->userdata('BusinessOwner_logged_in')){ ?>
      
 <li><a href="<?php echo base_url();?>BusinessOwner/BusinessOwner/logout"> Signout <span class="glyphicon glyphicon-log-out"></span></a></li>
		  
	  <?php }
      else {?>
        <li><a href="<?php echo base_url();?>user/User/signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="<?php echo base_url();?>user/User"><span class="glyphicon glyphicon-log-in"></span> Login</a></li><?php
      } ?>
      </ul>
    </div>
  </div>
</nav>

    <div id='' class='w3-center'>


	