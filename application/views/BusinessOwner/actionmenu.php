<?php defined('BASEPATH') OR exit('No direct script access allowed');
if (!empty($listing)) {
foreach ($listing as $key) {
    $data['website'] = $key->website;
    $data['booking'] = $key->booking;
    $data['lid'] = $key->lid;
    $data['booking_url'] = $key->booking_url;
    $data['category'] = $key->category;
    $data['title'] = $key->title;
    if (empty($user_subscriptions)) {$data['subscribed_to_lid'] = '';}
    if (empty($user_notes)) {$data['notes'] = ''; $noteExists = false;} else {$noteExists = true;}
}
}
 if ($this->session->userdata('logged_in')) {
    $user_data = $this->session->userdata('logged_in');
    if (!empty($user_subscriptions)) {
    foreach($user_subscriptions as $subscription) {
        $data['subscribed_to_lid'] = $subscription->lid;
    }
    }
    
    if (!empty($user_notes)) {
    foreach($user_notes as $note) {
        if ($note->lid == $data['lid']) {
            $data['notes'] = $note->note;
            $originalDate = $note->date_added;
            $data['note_date'] = date("Y-m-d h:i", strtotime($originalDate));
            $noteExists = true;
        } else {
            $noteExists = false;
        }
    }
    }
}

$page_url = $this->uri->slash_segment(3, 'leading');

    
?>
 
<!DOCTYPE html>

<html>

<head>

  <meta name="generator" content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39">
    <!-- brough from https://bootsnipp.com/snippets/xxE9 -->
  <!-- Force IE to turn off past version compatibility mode and use current version mode -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">
  <!-- Get the width of the users display-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Text encoded as UTF-8 -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<!-- bootstrap -->
	<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="default">
	<!-- theme -->
	<!--<link href="https://netdna.bootstrapcdn.com/bootswatch/3.1.0/bootstrap/bootstrap.min.css" rel="stylesheet" title="theme">-->
	
<style>
body {background-color: #eee;color:#00477e;}
table#TixManagementContent {background-color: ;}
.navbar-btn.navbar-left {margin-left: 10px;}
.navbar-btn.navbar-right {margin-right: 10px;}

 </style>
 
 <script>
 function noBooking() {
     swal('Oops!','Sorry, this business does not provide booking','info');
 }
 
 function loginRequired() {
   swal({
  title: "Oops!",
  text: 'Sorry, You need to login to your account first',
  icon: "info",
  buttons: ['Cancel','Login'],
})
.then((willLogin) => {
  if (willLogin) {
    window.location.href = "<?php echo base_url();?>user/User/index";
  }
});
 }
 
 function soon() {
     swal('Oops!','Sorry, this is feature is underconstruction. If you are already a member, you will be notified once this is up and running.','info');
 }
</script>
</head>

<body>
   
<!-- start header -->
<center>
<table width="90%" id="TixManagementContent" class="TixManagementContent" >
<tbody>
<tr>
<td align="left">

<div id="boxed-page">  

<div id="wrapper" class="bootstrap">

<!-- end header -->

            <div class="row">

					<div class="panel">
						
						
						<div class="panel-body w3-round" style="background-color:#428BCA">
							<div class="row">
								
								<div class="col-lg-3 col-xs-3">
								    <!--if user logged in -->
								    <?php if ($this->session->userdata('logged_in')) { 
								        // if user is already subbscribbed
								    if ($data['lid'] == $data['subscribed_to_lid']) {
								    ?>
								    <a href="<?php echo base_url();?>user/User/unsubscribeFromListing/<?php echo $user_data['uid'].'/'.$data['lid'].'/'.$page_url;?>" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;">
								        <div id="box_1"><span class="fa fa-users fa-3x"></span></div>
										<div id="box_2" class="icon-label">Unsubscribe</div>
										
										<!--// if user is not subscribbed-->
								    <?php } else { ?>
									<a href="<?php echo base_url();?>user/User/subscribeToListing/<?php echo $user_data['uid'].'/'.$data['lid'].'/'.$page_url;?>" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;">
									    <div id="box_1"><span class="fa fa-users fa-3x"></span></div>
										<div id="box_2" class="icon-label">Subscribe</div>
									    <!--else if not logged in-->
									    <?php } } else { ?>
									        <span class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick='loginRequired()'>
									            <div id="box_1"><span class="fa fa-users fa-3x"></span></div>
										<div id="box_2" class="icon-label">Subscribe</div>
									        <?php } ?>
										
									</a>
								</div>
								
								<div class="col-lg-3 col-xs-3">
								    <!--// if user logged in-->
								    <?php if ($this->session->userdata('logged_in')) {
								        // if user has note
								        if ($noteExists == true) { ?>
								        <a href="" data-toggle="modal" data-target="#myModal2" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;">
								            <div id="box_1"><span class="fa fa-sticky-note fa-3x"></span></div>
										<div id="box_2" class="icon-label">My Notes</div>
										</a>
										<?php } else { ?>
									<a href="" data-toggle="modal" data-target="#myModal2" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;">
									    <div id="box_1"><span class="fa fa-sticky-note fa-3x"></span></div>
										<div id="box_2" class="icon-label">Notes</div>
									</a>
									<?php } ?>
									    <!--else if not -->
									    <?php } else {?>
									    <span class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="loginRequired()">
									        <div id="box_1"><span class="fa fa-sticky-note fa-3x"></span></div>
										<div id="box_2" class="icon-label">Notes</div>
									</a>
									        <?php } ?>
										
								</div>
								<!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reminder Note</h4>
        </div>
        <div class="modal-body">
            <!--// if notes exists, hide adding block-->
            <?php if ($noteExists) {?>
            <div id='add_note_block' style='display:none'>
                <?php } ?>
          <p>Add memo notes for better future experiences</p>
          <?php// echo form_open("user/User/addNote");?>
          <form action='<?php echo base_url() . 'user/User/addNote/'.$user_data['uid'].'/'.$data['lid'].'/'.$page_url;?>' method='POST'>
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

          <textarea name='txt_note' id='txt_note' cols='5' style='resize:none;height:150px' class='col-lg-12 col-xs-12 col-sm-12 col-md-12' placeholder='For example, only cash available in the X store or two pieces of IDs required.'></textarea>
          <input type='submit' name='submit_note' id='submit_note' class='btn-primary w3-round w3-padding w3-center' value='Save'/><br>
          <?php //echo form_close(); ?>
          </form>
          <?php if ($noteExists) {?>
          </div> <!-- end add_note_block -->
          <?php } ?>
          <!--// if notes exist, view them here -->
          <?php if ($noteExists) { $counter = 0;?>
          <span><smal>* All notes are managable through your <a href='<?php echo base_url().'user/User/dashboard/myNotes';?>' style='text-decoration:none;'>Dashboard</a></smal></span><br>
          <table class='table'>
              <tr>
                  <th>No</th>
                  <th>Note</th>
                  <th>Saved Since</th>
              </tr>
              <?php foreach($user_notes as $unotes) {
                  if ($unotes->lid == $data['lid']) {
                  $originalDate = $unotes->date_added;
                  ?>
                    <tr>
                    <td><?php echo ++$counter;?></td>
                    <td><?php echo $unotes->note;?></td>
                    <td><?php echo date("Y-m-d h:i", strtotime($originalDate));?></td>
                    </tr>
                <?php } } ?>
          </table>
          <br>
          <?php } ?>
          <button class='btn-primary w3-round w3-padding' onclick='document.getElementById("add_note_block").style.display="block"'>Add a New Note</button>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end notes modal -->

                <div class="col-lg-3 col-xs-3">
									<a href="<?php echo $data['website'];?>" target='_blank' class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('setting');">
										<div id="box_1"><span class="fa fa-desktop fa-3x"></span></div>
										<div id="box_2" class="icon-label">Website</div>

									</a>
								</div>
								
								<div class="col-lg-3 col-xs-3">
								    <?php if ($data['booking'] == 3){?>
								    <span href="" class="btn btn-primary btn-lg btn-block dash-widget w3-padding" role="button" style="padding:2px;" onclick="noBooking();">
								        <?php } else {
								        if ($this->session->userdata('logged_in')) {
								        if ($data['booking'] == 1) {?>
								        <a href="<?php echo $data['booking_url'];?>" target='_blank' class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;">
								            <?php } else if ($data['booking'] == 2) {
								            if ($data['category'] == 'Restaurant') {?>
								            <span class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" data-toggle="modal" data-target="#bookingModal">
								            <!--<span class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick='soon();'>-->
								                <?php } } } else { ?>
								                <span class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick='loginRequired()'>
								                 <?php } }?>
									<!--<a href="" class="btn btn-primary btn-lg btn-block dash-widget" role="button" style="padding:2px;" onclick="viewPage('setting');">-->
										<div id="box_1"><span class="fa fa-calendar fa-3x"></span></div>
										<div id="box_2" class="icon-label">Book</div>
									</a>
								</div>
								
							</div>
						</div>
					</div>

            </div>

<!--// booking modal -->
<!-- Modal -->
  <div class="modal fade" id="bookingModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
          <h3 class="modal-title">Reserve a Table at <?php echo $data['title'];?></h3>
        </div>
        <div class="modal-body w3-center">
          <h4>Select the date and time</h4>
          <div class="table-responsive col-lg-12 col-xs-12">
              <?php echo $calendar;?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



<!-- start footer -->    	
</div>
</div>

</td>
</tr>
</tbody>
</table>
 </center>
 


