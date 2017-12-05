<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard</title>
</head>
<style>
    body {color:#00477e; background:#eee;}
</style>


<div id="container">
  <h1>Welcome to Your Dashboard!</h1>
  <!-- <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p> -->
</div> 
<!-- end page content -->
<br>
<!-- // quick links + imbeded page contents -->

<?php 


//  $this->load->view('BusinessOwner/quicklinks');
echo $quicklinks;
 
?>


<?php
 ?>