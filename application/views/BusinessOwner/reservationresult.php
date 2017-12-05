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

?>



<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/bootstrap-clockpicker.min.css">


<div class="container" style="margin-top:70px;">
	<div class="row">
        <form class="form-horizontal col-sm-7 col-sm-offset-2" action="<?php echo base_url(); ?>BusinessOwner/BusinessOwner/reservition/<?php echo $lid;?>" method="post">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

            <div class="form-group registration-date">
                <label class="control-label col-sm-3" for="registration-date">Date and Time:</label>
            	<div class="input-group registration-date-time">
            		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            		<input class="form-control" name="reserve-date" id="reserve-date" type="date">
                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></span>
                    <td><input class="form-control" id="reserve-time" name='reserve-time' value="" placeholder=":" style="width:80px;"></td>


            	</div>

            </div>
            
            <div class="col-sm-offset-5 col-sm-3  btn-submit">
                                        <button type="submit" class="btn btn-success">go</button>
                                    </div>
        </form>
	</div>
</div>




<!-- Card -->
<?php 

// print_r($searchResult);

    date_default_timezone_set("Canada/Saskatchewan");
    $today = date("Y-m-d");

foreach ($searchResult as $key) {
       ?>
        <div class='col-lg-12 w3-margin-bottom filter unknown'>
 


            <div class="w3-container">
                <div class="w3-card-2 w3-round-large" style="width:80%;margin:0 auto;">

                    <div class="w3-container w3-center">
                        <h3><?php echo $key->first;?></h3>
                        <div class="hr2"><hr /></div>
                        <h3><?php echo $key->last;?></h3>
                        <br><br>
                        <!--<div class="hr"><hr /></div>-->
                        <div class='col-lg-4'>
                            <h4>Reservation time: <span class='w3-text-black'><?php echo $key->time_reserved;?></span></h4>
                        </div>
                        <div class='col-lg-4'>
                            <h4>Email: <span class='w3-text-black'><?php echo $lemail;?></span></h4>
                        </div>
                        <div class='col-lg-4'>
                            <h4>Reservation date: <?php if ($key->date_reserved == '0000-00-00') {
                                echo '<span class="w3-text-red"><i class="fa fa-exclamation fa-2x" aria-hidden="true"></i>';
                            } 
                            echo '<span class="w3-text-black">'.$key->date_reserved;
                            ?></span></h4>
                        </div>

 
                            <div class="w3-section">
                                <button class="w3-button btn-primary w3-round"onclick="window.location.href = '<?php echo base_url()."BusinessOwner/BusinessOwner/dashboard/wrightemail/".$key->email;?>';">Contact</button>
                                <!-- <button id='<?php echo $key->uid;?>'class="w3-button btn-danger w3-round" onclick='myFunction(this.id);'>Contact</button> -->
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