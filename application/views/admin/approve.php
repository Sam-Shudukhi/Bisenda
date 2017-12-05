<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $header; ?>
<?php echo $dashboard; ?>
<br>

<body>
 <div id="container">
  <h1 style='text-decoration=underline'>Comments Pending Approval</h1><br>
  <div id="body">
  <div class="table-responsive">   
  <table class="table table-hover table-striped" width="90%">
    <thead>
      <tr>
        <!-- <th>Id</th> -->
        <th>Name</th>
        <th>Business</th>
        <th>Comment</th>
        <th>Rate</th>
        <th>Date</th>
        <th>Approved</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
   
<?php
$countNonApproved = 0;
foreach($results as $data) {
    if ($data->status == '0') {
      $countNonApproved++;
      $originalDate = $data->date_added;
      $newDate = date("Y-m-d h:i", strtotime($originalDate));
    // echo "<tr>
    // <td>$data->uid</td>";
    echo "<td>$data->first - $data->last</td>
    <td>$data->title</td>
    <td>$data->comment</td>
    <td>$data->rate</td>
    <td>$newDate</td>    
    <td class='warning'>No</td>
    <td><button class='btn-primary w3-round'><a href='".base_url()."admin/aprroveUserComment/".$data->uid."/".$data->first. '-' . $data->last."/".$data->title."/".$data->lid."/".$data->rate."/".$data->comment."' style='color:white;'>Approve</a></button></td>
  </tr>";
}
}
if ($countNonApproved == 0) {
  echo '<tr><td colspan="6" class="centered w3-center">No New Reviews. No Reviews Pending Approval</td></tr>';
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
</tr>
 </tbody>
  </table>
</div> <!-- end responsive div -->


  <!-- // verified business  -->


  <div id="container">
  <h1 style='text-decoration=underline'>Approved Comments</h1><br>
  <div id="body">
  <div class="table-responsive">   
  <table class="table table-hover table-striped" width="90%">
    <thead>
      <tr>
      <!-- <th>Id</th> -->
      <th>Name</th>
      <th>Business</th>
      <th>Comment</th>
      <th>Rate</th>
      <th>Date</th>
      <th>Approved</th>
      <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
   
<?php
foreach($results as $data) {
    if ($data->status == '1') {
    // echo "<tr>
    // <td>$data->uid</td>";
    $originalDate = $data->date_added;
    $newDate = date("Y-m-d h:i", strtotime($originalDate));
    echo "<td>$data->first - $data->last</td>
    <td>$data->title</td>
    <td>$data->comment</td>
    <td>$data->rate</td>
    <td>$newDate</td>
    <td class='success'>Yes</td>
    <td><button class='btn-danger w3-round'><a href='".base_url()."admin/disaprroveUserComment/".$data->uid."/".$data->lid."' style='color:white;'>Disapprove</a></button></td>    
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
</tr>
 </tbody>
  </table>
  </div> <!-- end responsive div -->


  </div>
 </div>
</body>