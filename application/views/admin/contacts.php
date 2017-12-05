<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $header; ?>
<?php echo $dashboard; ?>
<br>

<div class="row" style='width:50%;margin:0 auto;'>
							
		<div class="col-lg-6 col-xs-6">
			<a href="<?php echo base_url();?>Admin/dashboard/userscontacts" data-toggle="collapse" data-target="#recent" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('recent');">
			<div id="box_1"><span class="fa fa-user fa-3x"></span></div>
			<div id="box_2" class="icon-label">Users</div>
			</a>
		</div>
								
		<div class="col-lg-6 col-xs-6">
			<a href="<?php echo base_url();?>Admin/dashboard/businesscontacts" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('approve');">
			<div id="box_1"><span class="fa fa-shopping-bag fa-3x"></span></div>
			<div id="box_2" class="icon-label">Businesses</div>
			</a>
		</div>
</div>


