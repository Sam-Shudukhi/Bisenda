<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php echo $header; ?>
<br>
<?php foreach($listing as $key) {
    $business['description'] = $key->description;
    $city = $key->city;
    $province = $key->province;
    $location = $key->address;
    $phone = $key->phone;
    $address = "$location, $city, $province";
}
?>

<script>

$(document).keydown(function(event) { 
    if (event.keyCode == 27) { 
       $('#gallery').hide();
    }
    
    if(event.keyCode == 37){
        plusSlides(-1);
    }
    
    if(event.keyCode == 39){
        plusSlides(1);
    }
});


function openModal() {
  document.getElementById('gallery').style.display = "block";
}

function closeModal() {
  document.getElementById('gallery').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
    
</script>



<style>
body {font-family:Lucida Console;}
    
* {
  box-sizing: border-box;
}

.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.column {
  /*float: left;*/
  width: 30%;
  margin:0 auto;
}

 The Modal (background) 
.modal {
  display: none;
  position: relative;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 50%;
  height: 50%;
  overflow: auto;
  background-color: black;
}

 Modal Content 
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 50%;
  max-width: 500px;
}

 The Close Button 
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

.mySlides {
  display: none;
}

.cursor {
  cursor: pointer
}

 Next & previous buttons 
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 50px;
  margin-top: -50px;
  color: black;
  font-weight: bold;
  font-size: 30px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

img {
  margin-bottom: -4px;
  
}

.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

/*.demo {*/
/*  opacity: 0.2;*/
/*}*/

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}

</style>


<br><br>


<h1 style='color:#00477e;'><?php echo $storeName; ?></h1> 
<span class="fa fa-stack fa-lg w3-xxlarge">
    <i class="fa fa-certificate fa-stack-2x" style="color: #428bca"></i>
    <i class="fa fa-check fa-stack-1x fa-inverse"></i>
</span>
<br>
<?php echo $this->session->flashdata('msg'); ?>

<hr>
<div class='row w3-margin-bottom' style='width:90%;margin-left: auto;margin-right: auto;'>
<div class='col-lg-12 col-xs-12'>
    <?php echo $map;?>
</div>
</div>

<!--+++++Modal++++-->

<?php

if(!empty($gallery)){
    


?>


<div id="gallery" class="modal">
   
  <div class="modal-content">
 <span class="close cursor" onclick="closeModal()">close window</span>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

  
<?php
//get album

foreach($gallery as $row){
    $image[] = $row->image;
//    $image2 = $row-image
?>

<!--<img src="<?php //echo '/uploads/' .  $row->image;?>">-->

     <div class="mySlides">
      <div class="numbertext">1 / 4</div>
      <img src="<?php echo '/uploads/' .  $row->image;?>" style="width:100%" class="img-thumbnail">
    </div>
    
<?php
    
}
?>
  </div>
</div>

<div class="row w3-margin-top w3-margin-bottom">
        <div class="column">
            <img src="<?php echo '/uploads/' .  $image[0];?>" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor img-thumbnail">
        </div>
    </div>
<!--+++Modal++++-->
<?php
}
else{
    //echo "No pictures available";
}
?>

<?php echo $actionmenu; ?>
<a href="https://bis-up.000webhostapp.com/welcome/contactUs">Report this page?</a>

    <!--// store description-->
<div class='row' style='width:90%;margin-left: auto;margin-right: auto;'>
    <div class='col-lg-12 col-xs-12 w3-border w3-border-white w3-round w3-padding'>
        <?php echo "<h3>About</h3>".'<span style="font-family: Arial;font-size:24;">'.$business['description'].'</span>'; ?>
    </div>
    
    
    
</div>

<br><br><br>
<div class='col-md-12 col-xs-12 w3-large w3-margin-bottom'>
        <div id="content">
      <div id="siteNotice">
      </div>
      <div id="mapContent">
      <p><b class='w3-large'>Address:&nbsp;</b><i class='fa fa-globe fa-2x'>&nbsp;<?php echo $address;?></i></p>
      <p><b class='w3-large'>Contact:&nbsp;</b><i class='fa fa-phone fa-2x'>&nbsp;<?php echo $phone;?></i></p>
      </hr>
      </div>
      </div>
    </div>
    <!--// hours of operation -->
<div class='row'>
    <div class='col-lg-12 col-xs-12 w3-round' style='margin-left:auto;margin-right:auto;'>
        <?php echo $sidemenubar; ?>
    </div>
</div>

<br><br><br>

    <?php if (!empty($deals)) {?>
    <!--// latest deal-->
<div class='row'>
    <div class='col-lg-12 col-xs-12 w3-round' style='margin-left: auto;margin-right: auto;'>
       <?php echo $deals; ?>
    </div>
</div>
<?php } ?>
<br><br>
<?php 
// view of reviews
    echo $reviewsPage;
    echo '<br>';
    if($this->session->userdata('logged_in')){
        echo $addReview;
    }
    else{
        echo "Login in to review this store!";
    }
    
    
    
?>
