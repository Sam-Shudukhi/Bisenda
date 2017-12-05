<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo $header; ?>
<?php echo $dashboard; ?>

<br>
<?php if (!empty($hours)) {
    foreach($hours as $time) {

    if ($time->d_name == 'Monday') {
        $monday['day'] = $time->d_name;
        $monday['from'] = $time->from_time;
        $monday['to'] = $time->to_time;
        if ($time->active == 0) {
        $monday['status'] = 'Closed';
        $monday['from'] = '';
        $monday['to'] = '';
        } else if ($time->active == 1) {
        $monday['status'] = 'Open';
        } 
    }
    // tuesday array
    if ($time->d_name == 'Tuesday') {
        $tuesday['day'] = $time->d_name;
        $tuesday['from'] = $time->from_time;
        $tuesday['to'] = $time->to_time;
        if ($time->active == 0) {
        $tuesday['status'] = 'Closed';
        $tuesday['from'] = '';
        $tuesday['to'] = '';
        } else if ($time->active == 1) {
        $tuesday['status'] = 'Open';
        }
    }
    // wednesday array
    if ($time->d_name == 'Wednesday') {
        $wednesday['day'] = $time->d_name;
        $wednesday['from'] = $time->from_time;
        $wednesday['to'] = $time->to_time;
        if ($time->active == 0) {
        $wednesday['status'] = 'Closed';
        $wednesday['from'] = '';
        $wednesday['to'] = '';
        } else if ($time->active == 1) {
        $wednesday['status'] = 'Open';
        }
    }
    // thursday array
    if ($time->d_name == 'Thursday') {
        $thursday['day'] = $time->d_name;
        $thursday['from'] = $time->from_time;
        $thursday['to'] = $time->to_time;
        if ($time->active == 0) {
        $thursday['status'] = 'Closed';
        $thursday['from'] = '';
        $thursday['to'] = '';
        } else if ($time->active == 1) {
        $thursday['status'] = 'Open';
        }
    }
        // friday array
    if ($time->d_name == 'Friday') {
        $friday['day'] = $time->d_name;
        $friday['from'] = $time->from_time;
        $friday['to'] = $time->to_time;
        if ($time->active == 0) {
        $friday['status'] = 'Closed';
        $friday['from'] = '';
        $friday['to'] = '';
        } else if ($time->active == 1) {
        $friday['status'] = 'Open';
        }
    }
        // saturday array
    if ($time->d_name == 'Saturday') {
        $saturday['day'] = $time->d_name;
        $saturday['from'] = $time->from_time;
        $saturday['to'] = $time->to_time;
        if ($time->active == 0) {
        $saturday['status'] = 'Closed';
        $saturday['from'] = '';
        $saturday['to'] = '';
        } else if ($time->active == 1) {
        $saturday['status'] = 'Open';
        }
    }
        // sunday array
    if ($time->d_name == 'Sunday') {
        $sunday['day'] = $time->d_name;
        $sunday['from'] = $time->from_time;
        $sunday['to'] = $time->to_time;
        if ($time->active == 0) {
        $sunday['status'] = 'Closed';
        $sunday['from'] = '';
        $sunday['to']  = '';
        } else if ($time->active == 1) {
        $sunday['status'] = 'Open';
        }
    }
}
} else {
    //monday
    $monday['day'] = 'Monday';
    $monday['from'] = 'no information';
    $monday['to'] = 'no information';
    $monday['status'] = 'no information';
    // tuesday
    $tuesday['day'] = 'Tuesday';
    $tuesday['from'] = 'no information';
    $tuesday['to'] = 'no information';
    $tuesday['status'] = 'no information';
    // wednesday
    $wednesday['day'] = 'Wednesday';
    $wednesday['from'] = 'no information';
    $wednesday['to'] = 'no information';
    $wednesday['status'] = 'no information';
    // thursday
    $thursday['day'] = 'Thursday';
    $thursday['from'] = 'no information';
    $thursday['to'] = 'no information';
    $thursday['status'] = 'no information';
    // friday
    $friday['day'] = 'Friday';
    $friday['from'] = 'no information';
    $friday['to'] = 'no information';
    $friday['status'] = 'no information';
    // saturday
    $saturday['day'] = 'Saturday';
    $saturday['from'] = 'no information';
    $saturday['to'] = 'no information';
    $saturday['status'] = 'no information';
    // sunday
    $sunday['day'] = 'Sunday';
    $sunday['from'] = 'no information';
    $sunday['to'] = 'no information';
    $sunday['status'] = 'no information';
}
?>
<style>
    .demo-bg{
background: ;
margin-top: 60px;
}
.business-hours {
background: ; 
padding: 40px 14px;
margin-top: -15px;
position: relative;
}
.business-hours:before{
content: '';
width: 23px;
height: 23px;
background: ;
position: absolute;
top: 5px;
left: -12px;
transform: rotate(-45deg);
z-index: -1;
}
.business-hours .title {
font-size: 30px;
color: #BBB;
text-transform: uppercase;
padding-left: 5px;
border-left: 4px solid #ffac0c; 
}
.business-hours li, .table {
color: #888;
line-height: 38px;
border-bottom: 1px solid #333; 
}
.business-hours li:last-child, .table {
border-bottom: none; 
}
.business-hours .opening-hours li.today {
color: #ffac0c; 
}
.table {font-size:24px;}
</style>

<script>
    // highlight current day on opeining hours
$(document).ready(function() {
$('.opening-hours li').eq(new Date().getDay()).addClass('today');
});
</script>
    <div class="container demo-bg">
<div class="row">
<!--<div class="col-sm-4"></div>-->
<!--<div class="col-sm-4"></div>-->
<div class="col-sm-12">
<div class="business-hours">
<h2 class="title">Opening Hours - <a href="<?php echo base_url();?>BusinessOwner/BusinessOwner/dashboard/hoursupdate" class="btn btn-lg">
          <span class="glyphicon glyphicon-pencil"></span> edit 
        </a></h2>
<table class='table list-unstyled opening-hours'>
    <tr>
        <th></th>
        <th></th>
        <th>Day</th>
        <th>Time</th>
        <!--<th>Status</th>-->
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><?php echo $monday['day'];?></td>
        <td><?php echo $monday['from'] . ' - ' . $monday['to'];?></td>
        <!--<td><?php echo $monday['status'];?></td>-->
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><?php echo $tuesday['day'];?></td>
        <td><?php echo $tuesday['from'] . ' - ' . $tuesday['to'];?></td>
        <!--<td><?php echo $tuesday['status'];?></td>-->
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><?php echo $wednesday['day'];?></td>
        <td><?php echo $wednesday['from'] . ' - ' . $wednesday['to'];?></td>
        <!--<td><?php echo $wednesday['status'];?></td>-->
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><?php echo $thursday['day'];?></td>
        <td><?php echo $thursday['from'] . ' - ' . $thursday['to'];?></td>
        <!--<td><?php echo $thursday['status'];?></td>-->
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><?php echo $friday['day'];?></td>
        <td><?php echo $friday['from'] . ' - ' . $friday['to'];?></td>
        <!--<td><?php echo $friday['status'];?></td>-->
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><?php echo $saturday['day'];?></td>
        <td><?php echo $saturday['from'] . ' - ' . $saturday['to'];?></td>
        <!--<td><?php echo $saturday['status'];?></td>-->
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><?php echo $sunday['day'];?></td>
        <td><?php echo $sunday['from'] . ' - ' . $sunday['to'];?></td>
        <!--<td><?php echo $sunday['status'];?></td>-->
    </tr>
</table>
</div>
</div>
</div>
</div>