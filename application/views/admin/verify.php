<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $header; ?>
<?php echo $dashboard; ?>
<br>

<body style"width=90%">
 <div id="container">
  <h1>Stores Pending Verification</h1><br>
  <div id="body" style"width=90%">
  <div class="table-responsive">   
  <table class="table table-hover table-striped container col-xs-12 col-sm-12 col-md-12 col-lg-12" style"width=90%">
    <thead>
      <tr>
        <th>Owner</th>
        <th>Business</th>
        <th>Bisenda Booking</th>
        <th>Email</th>
        <th>Website</th>
        <th>View</th>
        <th>Verified</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
   
<?php
foreach($results as $data) {
    if ($data->verified == '0') {
      if ($data->booking == 1) $data->booking = 'External Booking';
      if ($data->booking == 2) $data->booking = 'Bisenda Booking';
      if ($data->booking == 3) $data->booking = 'No Booking';
    echo "<tr>
    <td>$data->owner</td>
    <td>$data->title</td>
    <td>$data->booking</td>
    <td>$data->email</td>
    <td><a href='".$data->website."' target='_blank'>$data->title/website</a></td>";
    $data->title = str_replace(" ", "-", $data->title);    
    echo "<td><a href='".base_url()."admin/business/".$data->title."bisenda".$data->lid."'>$data->title/view</a></td>
    <td class='warning'>No</td>
    <td><button class='btn-primary w3-round'><a href='".base_url()."admin/verify_new_business/".$data->lid."/".$data->bid."' style='color:white;'>Verify</a></button></td>
    </tr>";
}
}
?>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $links; ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
 </tbody>
  </table>
</div>


  <!-- // verified business  -->


  <div id="container">
  <h1 style='text-decoration=underline'>Verified Stores</h1><br>
  <div id="body">

  <table class="table table-hover table-striped" style"width=90%">
    <thead>
      <tr>
        <th>Owner</th>
        <th>Business</th>
        <th>Bisenda Booking</th>
        <th>Email</th>
        <th>Website</th>
        <th>View</th>
        <th>Verified</th>
        <th>Action</th>        
      </tr>
    </thead>
    <tbody>
      
   
<?php
foreach($results as $data) {
    if ($data->verified == '1') {
      if ($data->booking == 1) $data->booking = 'External Booking';
      if ($data->booking == 2) $data->booking = 'Bisenda Booking';
      if ($data->booking == 3) $data->booking = 'No Booking';
    echo "<tr>
    <td>$data->owner</td>
    <td>$data->title</td>
    <td>$data->booking</td>
    <td>$data->email</td>
    <td><a href='".$data->website."' target='_blank'>$data->title/website</a></td>";
    $data->title = str_replace(" ", "-", $data->title);    
    echo "<td><a href='".base_url()."admin/business/".$data->title."bisenda".$data->lid."'>$data->title/view</a></td>
    <td class='success'>Yes</td>
    <td><button class='btn-danger w3-round'><a href='".base_url()."admin/unverify_business/".$data->lid."' style='color:white;'>Unverify</a></button></td>    
    </tr>";
}
}
?>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $links; ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
 </tbody>
  </table>


  </div>
 </div>
</body>