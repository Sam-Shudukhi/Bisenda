<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php //echo $header; ?>
<?php //echo $dashboard; 
echo $dealsPannel.'<br><br>';
$deal_lid = 0;
foreach($Listing as $key){
    $owner_lid = $key->lid;
}
if(!empty($deals)) {
foreach ($deals as $deal)
{
    if ($deal->did == $did) {
        $deal_lid = $deal->lid;
        $deal_name = $deal->deal_name;
        $deal_info = $deal->deal_info;
        $deal_discount = $deal->discount;
        $deal_promo = $deal->promo_code;
        $deal_expiry = $deal->expiry;
        if ($deal->expiry == '0000-00-00') {
            $deal->expiry = ' ';
        } 
    }
}
}else {
            $deal_lid = 0;
        }
if ($owner_lid != $deal_lid){
    echo '<div class="w3-container col-lg-12 w3-large" style="background:#428bca;color:white;margin:0 auto;">ACCESS DENIED</div>';
} else {
?>
<style>

.header {
    color: #36A0FF;
    font-size: 27px;
    padding: 10px;
}

.bigicon {
    font-size: 35px;
    color: #36A0FF;
}    
    
    
</style>
 <!--add deal *** -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" action="<?php echo base_url();?>BusinessOwner/BusinessOwner/updateDeal" method="post">
                    <input name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" type="hidden">
                    
                    <input name ="did" id="did" value="<?php echo $did; ?>" type="hidden">

                    <fieldset>
                <legend class="text-center header">Update Deal</legend>
                            <!--// deal name-->
                        <div class="form-group">
                            <span class="col-md-2 text-center"><i class='w3-text-red'>*</i>&nbsp;Deal title/name</i></span>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="deal_name" name="deal_name" value="<?php echo $deal_name;?>" rows="7">
                            </div>
                        </div>
                        <!--// deal information-->
                        <div class="form-group">
                            <span class="col-md-2 text-center"><i class='w3-text-red'>*</i>&nbsp;Deal description</i></span>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="deal_info" name="deal_info" value="<?php echo $deal_info;?>" rows="7">
                            </div>
                        </div>
                        <!--// discount-->
                        <div class="form-group">
                            <span class="col-md-2 text-center"><i class='w3-text-red'>*</i>&nbsp;Deal value/discount</i></span>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="deal_discount" name="deal_discount" value="<?php echo $deal_discount;?>" rows="7">
                            </div>
                        </div>
                        <!--// promo_code-->
                        <div class="form-group">
                            <span class="col-md-2 text-center">Promo code</i></span>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="promo_code" name="promo_code" value="<?php echo $deal_promo;?>" rows="7">
                            </div>
                        </div>
                        <!--// expiry -->
                        <div class="form-group">
                            <span class="col-md-2 text-center">Expiry date</i></span>
                            <div class="col-md-8">
                                <input type="date" placeholder='yyy-mm-dd' class="form-control" id="expiry_date" name="expiry_date" value="<?php echo $deal_expiry;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" name='update' class="btn btn-primary btn-lg" value='update'>Update</button>
                            </div>
                        </div>
                    </fieldset>
                    <?php echo $this->session->flashdata('msg'); ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php }