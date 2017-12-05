<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php //echo $header; ?>
<?php //echo $dashboard; 
echo $dealsPannel.'<br><br>';
foreach ($Listing as $row)
{
    $lid = $row->lid;
}
?>
<!--<h1>Manage deals</h1>-->
<script>
    $(document).ready(function(){
    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>
<style>



</style>
<div class='row'>
<div class='col-lg-3 col-xs-3'>
    <span class='w3-padding-16 btn w3-round w3-hover-blue filter-button' data-filter='all' style='border:3px dashed #428BCA;'>&nbsp;&nbsp;
        <i class="fa fa-dot-circle-o fa-3x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;All&nbsp;&nbsp;
    </span>
</div>
<div class='col-lg-3 col-xs-3'>
    <span class='w3-padding-16 btn w3-round w3-hover-blue filter-button' data-filter="going" style='border:3px dashed #428BCA'>&nbsp;&nbsp;<i class="fa fa-hourglass-half fa-3x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;On Going&nbsp;&nbsp;</span>
</div>
<div class='col-lg-3 col-xs-3'>
    <span class='w3-padding-16 btn w3-round w3-hover-red filter-button' data-filter="expired" style='border:3px dashed #428BCA'>&nbsp;&nbsp;<i class="fa fa-hourglass-end fa-3x" aria-hidden="true"></i>
&nbsp;&nbsp;&nbsp;&nbsp;Expired&nbsp;&nbsp;</span>
</div>
<div class='col-lg-3 col-xs-3'>
    <span class='w3-padding-16 btn w3-round w3-hover-red filter-button' data-filter="unknown" style='border:3px dashed #428BCA'>&nbsp;&nbsp;<i class="fa fa-exclamation fa-3x" aria-hidden="true"></i>
&nbsp;&nbsp;&nbsp;&nbsp;No Expiry&nbsp;&nbsp;</span>
</div>
</div>
<br><br>

        <style>
        .hr2 {
            width:30%;
            margin:0 auto;
        }
hr {border: 0;
  width: 80%;
  color: #f00;
background-color: #428BCA;
height: 2px;
margin: 0 auto;
}
        </style>
        
        <script>
            function myFunction(id) {
   swal({
  title: "Confirm Deletion",
  text: 'Are you sure?',
  icon: "info",
  buttons: ['Cancel','Remove'],
})
.then((willLogin) => {
  if (willLogin) {
    var base_url = "<?php echo base_url();?>BusinessOwner/BusinessOwner/removeDeal/";
    window.location.href = base_url+id;
  }
});
 }
        </script>
    <?php 
    date_default_timezone_set("Canada/Saskatchewan");
    $today = date('Y-m-d');



    foreach ($deals as $deal) {
           if ($deal->expiry == '0000-00-00') { $expired = false;?>
        <div class='col-lg-12 w3-margin-bottom filter unknown'>
            <?php }
        else if (($deal->expiry != '0000-00-00') && ( $deal->expiry == $today || $today < $deal->expiry)) { $expired = false;?>
        <div class='col-lg-12 w3-margin-bottom filter going'>
            <?php } 
            else if ($deal->expiry != '0000-00-00' && $today > $deal->expiry) { $expired = true;?>
        <div class='col-lg-12 w3-margin-bottom filter expired'>
           <?php } ?>
            <div class="w3-container">
                <div class="w3-card-2 w3-round-large" style="width:80%;margin:0 auto;">

                    <div class="w3-container w3-center">
                        <h3><?php echo $deal->deal_name;?></h3>
                        <div class="hr2"><hr /></div>
                        <h3><?php echo $deal->deal_info;?></h3>
                        <br><br>
                        <!--<div class="hr"><hr /></div>-->
                        <div class='col-lg-4'>
                            <h4>Offer: <span class='w3-text-black'><?php echo $deal->discount;?></span></h4>
                        </div>
                        <div class='col-lg-4'>
                            <h4>Promo: <span class='w3-text-black'><?php echo $deal->promo_code;?></span></h4>
                        </div>
                        <div class='col-lg-4'>
                            <h4>Expiry: <?php if ($deal->expiry == '0000-00-00') {
                                echo '<span class="w3-text-red"><i class="fa fa-exclamation fa-2x" aria-hidden="true"></i>';
                            } else if ($expired) {
                            echo '<span class="w3-text-red">'.$deal->expiry;
                            } else {
                            echo '<span class="w3-text-black">'.$deal->expiry;
                            } ?></span></h4>
                        </div>
                            <div class="w3-section">
                                <button class="w3-button btn-primary w3-round"onclick="window.location.href = '<?php echo base_url()."BusinessOwner/BusinessOwner/dashboard/updateDeal/".$deal->did;?>';">Update</button>
                                <button id='<?php echo $deal->did;?>'class="w3-button btn-danger w3-round" onclick='myFunction(this.id);'>Remove</button>
                            </div>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
<?php
        
    }

    ?>
  
    
   