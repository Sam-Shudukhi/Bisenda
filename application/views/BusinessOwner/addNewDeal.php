<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php //echo $header; ?>
<?php //echo $dashboard; 
echo $dealsPannel.'<br><br>';
foreach ($Listing as $row)
{
    $lid = $row->lid;
}
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
                <form class="form-horizontal" action="<?php echo base_url();?>BusinessOwner/BusinessOwner/addNewDeal" method="post">
                    <input name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" type="hidden">
                    
                    <input name ="lid" id="lid" value="<?php echo $lid; ?>" type="hidden">

                    <fieldset>
                <legend class="text-center header">Add a New Deal</legend>
                            <!--// deal name-->
                        <div class="form-group">
                            <span class="col-md-2 text-center"><i class='w3-text-red'>*</i>&nbsp;Deal title/name</i></span>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="deal_name" name="deal_name" value="<?php //echo $currentMsg;?>" rows="7">
                            </div>
                        </div>
                        <!--// deal information-->
                        <div class="form-group">
                            <span class="col-md-2 text-center"><i class='w3-text-red'>*</i>&nbsp;Deal description</i></span>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="deal_info" name="deal_info" value="<?php //echo $currentMsg;?>" rows="7">
                            </div>
                        </div>
                        <!--// discount-->
                        <div class="form-group">
                            <span class="col-md-2 text-center"><i class='w3-text-red'>*</i>&nbsp;Deal value/discount</i></span>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="deal_discount" name="deal_discount" value="<?php //echo $currentMsg;?>" rows="7">
                            </div>
                        </div>
                        <!--// promo_code-->
                        <div class="form-group">
                            <span class="col-md-2 text-center">Promo code</i></span>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="promo_code" name="promo_code" value="<?php //echo $currentMsg;?>" rows="7">
                            </div>
                        </div>
                        <!--// expiry -->
                        <div class="form-group">
                            <span class="col-md-2 text-center">Expiry date</i></span>
                            <div class="col-md-8">
                                <input type="date" placeholder='yyyy-mm-dd' class="form-control" id="expiry_date" name="expiry_date">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" name='add' class="btn btn-primary btn-lg" value='add'>Add</button>
                            </div>
                        </div>
                    </fieldset>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="w3-container">
  <div class="w3-panel w3-pale-green w3-bottombar w3-border-green w3-border"><br>
    <h4>Your deals and coupons will be listed in <a href='<?php echo base_url()."welcome/deals";?>'>Deals</a> page, in your business view page and also in your subscribers' profiles</h4>
  </div>
</div>
                </form>
            </div>
        </div>
    </div>
</div>