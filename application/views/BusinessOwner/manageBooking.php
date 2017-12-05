<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
// echo $header;
// echo $dashboard;
echo $managePanel;
?>

<?php
foreach($Listing as $tuple){
    $lid = $tuple->lid;
    $bid = $tuple->bid;
    $lname = $tuple->title;
    $lemail = $tuple->email;
    
}
 
// print_r($allBookings);
?>

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

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/bootstrap-clockpicker.min.css">


<!--<div class="container" style="margin-top:70px;">-->
<!--	<div class="row">-->
<!--        <form class="form-horizontal col-sm-7 col-sm-offset-2" action="<?php echo base_url(); ?>BusinessOwner/BusinessOwner/reservition/<?php //echo $lid;?>" method="post">-->
<!--        <input type="hidden" name="<?php //echo $this->security->get_csrf_token_name(); ?>" value="<?php //echo $this->security->get_csrf_hash(); ?>">-->

<!--            <div class="form-group registration-date">-->
<!--                <label class="control-label col-sm-3" for="registration-date">Date and Time:</label>-->
<!--            	<div class="input-group registration-date-time">-->
<!--            		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>-->
<!--            		<input class="form-control" name="reserve-date" id="reserve-date" type="date">-->
<!--                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></span>-->
<!--                    <td><input class="form-control" id="reserve-time" name='reserve-time' value="" placeholder=":" style="width:80px;"></td>-->


<!--            	</div>-->

<!--            </div>-->
            
<!--            <div class="col-sm-offset-5 col-sm-3  btn-submit">-->
<!--                                        <button type="submit" class="btn btn-success">go</button>-->
<!--                                    </div>-->
<!--        </form>-->
<!--	</div>-->
<!--</div>-->
<br><br>
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
    <span class='w3-padding-16 btn w3-round w3-hover-red filter-button' data-filter="not-confirmed" style='border:3px dashed #428BCA'>&nbsp;&nbsp;<i class="fa fa-check fa-3x" aria-hidden="true"></i>
&nbsp;&nbsp;&nbsp;&nbsp;Needs Approval&nbsp;&nbsp;</span>
</div>

</div>
<br><br>



<!-- Card -->
<?php 

    date_default_timezone_set("Canada/Saskatchewan");
    $today = date("Y-m-d");

foreach ($allBookings as $key) {
    
        //   if ($key->date_reserved  == '0000-00-00') { 
        // $expired = false;
            if ($key->cancelled == 0 && $today <= $key->date_reserved) {
           ?>
        <div class='col-lg-12 w3-margin-bottom filter not-confirmed'>
            <?php }
        else if ($today <= $key->date_reserved) { $expired = false;?>
        <div class='col-lg-12 w3-margin-bottom filter going'>
            <?php } 
            else if ($today > $key->date_reserved) { $expired = true;?>
        <div class='col-lg-12 w3-margin-bottom filter expired'>
           <?php } ?>
            <div class="w3-container">
                <div class="w3-card-2 w3-round-large" style="width:80%;margin:0 auto;">

                    <div class="w3-container w3-center">
                        <h3><?php echo $key->first;?></h3>
                        <div class="hr2"><hr /></div>
                        <h3><?php echo $key->last;?></h3>
                        <br><br>
                        <!--<div class="hr"><hr /></div>-->
                        <div class='col-lg-4'>
                            <?php if ($key->cancelled == 3) {
                                ?>
                                <h4>Reservation time: <span class='w3-text-red'>Cancelled By User.</span></h4>
                                <?php
                            } else {
                                ?>
                                <h4>Reservation time: <span class='w3-text-black'><?php echo $key->time_reserved;?></span></h4>
                                <?php
                            }
                            ?>
                        </div>
                        <div class='col-lg-4'>
                            <h4>Email: <span class='w3-text-black'><?php echo $key->email;?></span></h4>
                        </div>
                        <div class='col-lg-4'>
                            <h4>Reservation date: <?php if ($today > $key->date_reserved) {
                            echo '<span class="w3-text-red">'.$key->date_reserved;
                            } else {
                            echo '<span class="w3-text-black">'.$key->date_reserved;
                            } ?></span></h4>
                        </div>

 
                            <div class="w3-section">
                                <button class="w3-button btn-primary w3-round" onclick="window.location.href = '<?php echo base_url()."BusinessOwner/BusinessOwner/dashboard/wrightemail/".$key->email;?>';">Contact</button>
                                
                                <?php 
                                    if($key->cancelled == 0 && $today <= $key->date_reserved){
                                        ?>
                                        
                                        <a href="<?php echo base_url()."BusinessOwner/BusinessOwner/confirmBooking/".$key->reserve_table_id."/".$key->email;?>" class="w3-button btn-success w3-round " onclick='myFunction(this.id);'>Confirm</a> 
                                    <?php    
                                    }
                                    
                                ?>
                                 
                            </div>
 
                            
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
<?php
        
    }

    ?>

    <!--  -->













<script type="text/javascript" src='<?php echo base_url();?>assets/js/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src='<?php echo base_url();?>dist/bootstrap-clockpicker.min.js'></script>
<script type="text/javascript">
$('.clockpicker').clockpicker()
	.find('input').change(function(){
		console.log(this.value);
	});
	// monday
    var reservetime = $('#reserve-time').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
});
</script>

