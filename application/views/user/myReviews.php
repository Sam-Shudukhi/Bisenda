<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo $header; ?>
<?php echo $dashboard; 
echo '<br>';
    echo $this->session->flashdata('msg'); 
echo '<br>'; 
    $user_data = $this->session->userdata('logged_in');
    $uid = $user_data['uid'];
?>

<script>
    function removeReview(rid,uid) {
        
        cond = confirm('Once deleted you will not be able to restore your review');
        if (cond) {
            window.location.href = '<?php echo base_url().'user/User/removeComment/';?>'+rid+'/'+uid;
        } else {
            
        }
    }
</script>

		 <!-- Container, Row, and Column used for illustration purposes -->
		 <div class="container">
		 	<div class="row">
		 		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">

		 			<!-- Fluid width widget -->        
		 			<div class="panel panel-default">
		 				<div class="panel-heading">
		 					<h3 class="panel-title">
		 						<span class="glyphicon glyphicon-comment"></span> 
		 						My Reviews
		 					</h3>
		 				</div>
		 				<div class="panel-body">
		 					<ul class="media-list">


		 						<?php

		 						foreach ($results as $row) {
		 							?>
		 							<li class="media">
		 								<div class="media-left">
		 									<img src="http://placehold.it/60x60" class="img-circle">
		 								</div>
		 								<div class="media-body">
		 									<h4 class="media-heading">
		 										<!-- <?php echo $row->first. ' ' . $row->last. '';?> -->
		 										<br>
 		 										<small>
		 											commented on <a href="#"> <?php echo $row->title ?> </a>

		 										</small>
		 										<br>
		 										
		 										<small>
		 											<?php echo $row->date_added ?>
		 										</small> 

		 									</h4>
		 									<p>
		 										<?php echo $row->comment ?>
		 									</p>
		 									<p>
		 									    <?php if ($row->status == 1) {
		 									        echo '<i class="fa fa-check"></i>&nbsp;:&nbsp;Approved';
		 									    } else if ($row->status == 0) {
		 									        echo '<i class="fa fa-check"></i>&nbsp;:&nbsp;Waiting Approval';
		 									    }?>
		 									</p>
                                            <p>
                                                <span onclick='removeReview("<?php echo $row->rid;?>","<?php echo $uid;?>");' style='cursor:pointer;'><i class='fa fa-remove fa-2x w3-text-red'></i>
                                            </span>
		 								</div>
		 							</li>
                                    </hr>
		 							<?php
		 						}
		 						?>




		 					</ul>
		 				</div>
		 			</div>
		 			<!-- End fluid width widget --> 

		 		</div>
		 	</div>
		 </div>