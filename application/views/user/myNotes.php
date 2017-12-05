<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo $header; ?>
<?php echo $dashboard; 

echo '<br>'; ?>

<style type="text/css">

	a.btn:hover {
		-webkit-transform: scale(1.1);
		-moz-transform: scale(1.1);
		-o-transform: scale(1.1);
	}
	a.btn {
		-webkit-transform: scale(0.8);
		-moz-transform: scale(0.8);
		-o-transform: scale(0.8);
		-webkit-transition-duration: 0.5s;
		-moz-transition-duration: 0.5s;
		-o-transition-duration: 0.5s;
	}
</style>
<script>
    function removeNote(uid,nid) {
        
        cond = confirm('Once deleted you will not be able to restore your note');
        if (cond) {
            window.location.href = '<?php echo base_url().'user/User/deleteNote/';?>'+uid+'/'+nid;
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
						My Notes
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
										<?php //echo $row->uid;?>
										<br>
										<small>
											commented on <a href="#"> <?php echo $row->title ?> </a>

										</small>
										<br>
										
										<small>
											<?php echo $row->date_added ?>
										</small>

									</h4>


									<span style='cursor:pointer' onclick='removeNote("<?php echo $row->uid ?>","<?php echo $row->nid ?>")' class="btn btn-primary a-btn-slide-text">
										<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
										<span><strong>Delete</strong></span>            
									</span>
									<p>
										<?php echo $row->note ?>
									</p>
									
								</div>
							</li>

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