<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $header; ?>
<?php echo $dashboard; ?>
<br>

<div class="row" style='width:50%;margin:0 auto;'>
							
		<div class="col-lg-6 col-xs-6">
			<a href="<?php echo base_url();?>BusinessOwner/BusinessOwner/dashboard/addNewDeal" data-toggle="collapse" data-target="#recent" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('recent');">
			<div id="box_1"><span class="fa fa-plus"><span class="fa fa-tag fa-2x"></span></span></div>
			<div id="box_2" class="icon-label">Add New Deal</div>
			</a>
		</div>
								
		<div class="col-lg-6 col-xs-6">
			<a href="<?php echo base_url();?>BusinessOwner/BusinessOwner/dashboard/manageDeals" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('approve');">
			<div id="box_1"><span class="fa fa-tags fa-2x"></span></div>
			<div id="box_2" class="icon-label">View Deals</div>
			</a>
		</div>
</div>


