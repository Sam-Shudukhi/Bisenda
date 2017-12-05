<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $header; ?>
<br>

<style>
.w3-container, .w3-panel 
{
    padding: 0.01em 1px;
}


.gallery-title
{
    font-size: 36px;
    color: #42B32F;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 1px solid #5e5e5e;
}
.filter-button
{
    font-size: 18px;
    border: 1px solid #428BCA;
    border-radius: 5px;
    text-align: center;
    color: #428BCA;
    margin-bottom: 30px;

}
.filter-button:hover
{
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    background-color: #42B32F;

}
.btn-default:active .filter-button:active
{
    background-color: #42B32F;
    color: white;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
}

</style>


<div class="container">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="w3-panel">
<div class="w3-tag w3-jumbo w3-red">S</div>
<div class="w3-tag w3-jumbo">A</div>
<div class="w3-tag w3-jumbo w3-yellow">L</div>
<div class="w3-tag w3-jumbo">E</div>
</div>
        </div>
        </div>

<div class="w3-row-padding">

<?php

date_default_timezone_set("Canada/Saskatchewan");
$today = date("Y-m-d");

foreach($deals as $tuple){ 

  if ($tuple->expiry == '0000-00-00' || $tuple->expiry == $today || $today < $tuple->expiry)
  {

  ?>
  <div class="w3-third">
  <div class="w3-card filter hdpe">

  
  <div class="w3-container w3-red">
    <h1><b> <?php echo $tuple->title;?> </b></h1>
  </div>
<div style='overflow-y:scroll;height:300px' class='w3-margin-bottom'>

  <div class="w3-xlarge">
    <p> <?php echo $tuple->deal_name;?> <br>

<!--// scroll-->
    <span class="w3-text-red"><b><?php echo $tuple->deal_info;?></b></span></p>
    <p> <?php echo $tuple->deal_info;?> </p> <br>
    <p>Discount: <?php echo $tuple->discount;?> </p> <br>
    <p>Promo code: <?php echo $tuple->promo_code;?> </p> <br>
    <p>Expiry: <?php echo $tuple->expiry;?> </p> <br>
    </div>
  </div>
  
  <div class="w3-red">
    <p class="w3-opacity">Contact: <?php echo $tuple->phone;?></p>
  </div>

  </div>
  <br>
  </div>

<?php 
  }
} 

?>


</div>
</div>
           
</section>
