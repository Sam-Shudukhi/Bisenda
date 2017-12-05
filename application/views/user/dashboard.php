<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>User Dashboard</title>
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
<?php $this->load->view('user/quicklinks'); ?>


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




<!--$page_url = $this->uri->slash_segment(3, 'leading');-->


<!--if($page_url == "/dashboard"){-->
    <!--echo $page_url;-->
    <?php 
    if(!empty($results)) {
        ?>
        
        <div class="container">
    
    
   <div class="col-md-12">

    <div class="panel panel-default">
      <div class="panel-heading">  <h4>Deals</h4></div>
      <div class="panel-body">
       
        <div class="box box-info">
          
          <div class="box-body">
           <div class="col-sm-12">
<?php
foreach($results as $row){
    $title = $row->title;
    $expiry = $row->expiry;
    $dealName = $row->deal_name;
    $dealInfo = $row->deal_info;
    $discount = $row->discount;
    $code = $row->promo_code;
    //echo $title;
    
    ?>
    
<table  class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Store</th>
      <th scope="col">Deal</th>
      <th scope="col">Info</th>
      <th scope="col">Discount</th>
      <th scope="col">Expiry Date</th>
      <th scope="col">Promo Code</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $title; ?></td>
      <td><?php echo $dealName; ?></td>
      <td><?php echo $dealInfo; ?></td>
      <td><?php echo $discount; ?></td>
      <td><?php echo $expiry; ?></td>
      <td><?php echo $code; ?></td>
    </tr>
  </tbody>
</table>



<?php
    }// end of foreach 
 //} // end of if 
}
else{
    // echo "No Deals available now";
}
 
 ?>

             <!-- /.box-body -->
           </div>
           <!-- /.box -->

         </div>
        </div> 
      </div>
    </div>
  </div> 

<?
 require 'application/views/footer.php';
 ?>