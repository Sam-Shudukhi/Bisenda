<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php echo $header; ?>
<?php echo $dashboard; ?>

<?php
// echo base_url();BusinessOwner/BusinessOwner/UpdateListing
// echo "from myListing: " . $bid;
//echo "business_id = $business_id";

foreach($Listing as $tuple){
    $lid = $tuple->lid;
    $bid = $tuple->bid;
    $listingTitle = $tuple->title;
    $address = $tuple->address;
    $city = $tuple->city;
    $province = $tuple->province;
    $phone = $tuple->phone;
    $postalcode = $tuple->postal_code;
    $listingEmail = $tuple->email;
    $category = $tuple->category;
    $bookingStatus = $tuple->booking;
    $bookingURL = $tuple->booking_url;
    $websiteURL = $tuple->website;
    $listingDescription = $tuple->description;
    $date_added = $tuple->date_added;
}

//$Listing = $this->BusinessOwnerModel->getListing();
//echo "Listing = $Listing";
//echo '<pre>'; print_r($Listing); echo '</pre>';

//echo "listing id = " . $Listing['lid']; 


?>


 <div class="container">
        
        
       <div class="col-md-6 col-md-offset-3">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >Your Business Listing</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"><?php echo '' .$listingTitle; ?> </h4></span>
              <span><p>Member since <?php echo $date_added; ?> </p></span> 
              <h4 style="color:#00b1b1;"><?php echo '' .$category; ?> </h4></span>

                     
                        


            </div>

                  <?php echo form_open_multipart('BusinessOwner/BusinessOwner/UpdateListing');
                    //echo $this->session->flashdata('error');
                  ?> 

                
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

        <div class="col-sm-6">
            
       <!--<div  align="left"> <img alt="User Pic" src="<?php //echo "/uploads/" . $banner; ?>" id="profile-image1" class="img-circle img-responsive"> -->

                <!--<input name="userfile" id="userfile" type="file" class="hide">-->
    <!--<div style="color:#999;" >click here to change profile image</div>-->
                <!--Upload Image Js And Css-->
                     </div>
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
<input name ="bid" id="bid" value="<?php echo $bid; ?>" type="hidden">
<input name ="lid" id="lid" value="<?php echo $lid; ?>" type="hidden">

  <label class="col-md-4 control-label">Title:</label>  
<input name="title" id='title' class="form-control col-sm-5" type="text" value="<?php echo $listingTitle; ?>" required="">

     <div class="clearfix"></div>
<div class="bot-border"></div>

  <label class="col-md-4 control-label">Type of Business:</label>  

                                <select id="category" name="category" class="form-control col-sm-5" required="">
                                    <option value="">Choose Category</option>
                                    <option value="Restaurant">Restaurant</option>
                                    <option value="Barber shop/Spa">Barber shop/Spa</option>
                                    <option value="Personal Health">Personal Health</option>
                                    <option value="Department Store">Department Store</option>
                                    <option value="Electronic Store">Electronic Store</option>
                                    <option value="Grocery Store">Grocery Store</option>
                                    <option value="Convenience Store">Convenience Store</option>
                                    <option value="Cosmetics Store">Cosmetics Store</option>
                                    <option value="Clothing/Shoe Store">Clothing/Shoe Store</option>
                                    <option value="Entertainment">Entertainment</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Other">Other</option>
                                                                
                                </select>
            
                              
                                <label class="col-md-4 control-label">Email:</label>  
      <input name="email" id='email' value="<?php echo $listingEmail; ?>" class="form-control col-sm-5" type="email" required="">


  <div class="clearfix"></div>
<div class="bot-border"></div>

   <label class="col-md-4 control-label">Address:</label>  
<input name="address" id='address' value="<?php echo $address; ?>" class="form-control col-sm-5" type="text" required="">


  <div class="clearfix"></div>
<div class="bot-border"></div>

   <label class="col-md-4 control-label">City:</label>  

<input name="city" id='city' value="<?php echo $city; ?>" class="form-control col-sm-5"  type="text" required="">

  <div class="clearfix"></div>
<div class="bot-border"></div>



   <label class="col-md-4 control-label">Province:</label>  
<input name="province" id='province' value="<?php echo $province; ?>" class="form-control col-sm-5" type="text" required="">

 <div class="clearfix"></div>
<div class="bot-border"></div>


   <label class="col-md-4 control-label">Postal Code:</label>  
<input name="postalcode" id='postalcode' value="<?php echo $postalcode; ?>" class="form-control col-sm-5" type="text" required="">

 <div class="clearfix"></div>
<div class="bot-border"></div>

   <label class="col-md-4 control-label">Phone Number:</label>  
<input name="phone" id='phone' value="<?php echo $phone; ?>" class="form-control col-sm-5" type="number" required="">

 <div class="clearfix"></div>
<div class="bot-border"></div>


   <label class="col-md-4 control-label">Website URL:</label>  
<input name="website" id='website' value="<?php echo $websiteURL; ?>" class="form-control col-sm-5" type="text" required="">

 <div class="clearfix"></div>
<div class="bot-border"></div>


   <label class="col-md-4 control-label">Booking URL:</label>  
<input name="bookingURL" id='bookingURL' value="<?php echo $bookingURL; ?>" class="form-control col-sm-5" type="text" required="">

 <div class="clearfix"></div>
<div class="bot-border"></div>


   <label class="col-md-4 control-label">Listing Description:</label>  
<input name="desc" id='desc' value="<?php echo $listingDescription; ?>" class="form-control col-sm-5" type="text" required="">


            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
            
            <div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
      <br>
  <button name='signup-btn' type="submit" class="btn btn-warning" value="update"></span> Update</button>
  </div>
</div>

</form>
    </div> 



    </div>




</div> 


    <script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#userfile').click();
    });
});       
              </script>      
       
   </div>