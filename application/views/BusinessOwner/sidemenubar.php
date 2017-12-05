<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	
<?php if (!empty($hours)) {
    foreach($hours as $time) {
    // echo $time->d_name . '/' . $time->from_time . ' - ' . $time->to_time . '<br>';
    // monday array
    if ($time->d_name == 'Monday') {
        $monday['day'] = $time->d_name;
        $monday['from'] = $time->from_time;
        $monday['to'] = $time->to_time;
        if ($time->active == 0) {
        $monday['status'] = 'Closed';
        $monday['from'] = $monday['status'];
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
        $tuesday['from'] = $tuesday['status'];
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
        $wednesday['from'] = $wednesday['status'];
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
        $thursday['from'] = $thursday['status'];
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
        $friday['from'] = $friday['status'];
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
        $saturday['from'] = $saturday['status'];
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
        $sunday['from'] = $sunday['status'];
        $sunday['to']  = '';
        } else if ($time->active == 1) {
        $sunday['status'] = 'Open';
        }
    }
}
} else {
    //monday
    $monday['day'] = 'Monday';
    $monday['from'] = 'soon';
    $monday['to'] = 'soon';
    $monday['status'] = 'soon';
    // tuesday
    $tuesday['day'] = 'Tuesday';
    $tuesday['from'] = 'soon';
    $tuesday['to'] = 'soon';
    $tuesday['status'] = 'soon';
    // wednesday
    $wednesday['day'] = 'Wednesday';
    $wednesday['from'] = 'soon';
    $wednesday['to'] = 'soon';
    $wednesday['status'] = 'soon';
    // thursday
    $thursday['day'] = 'Thursday';
    $thursday['from'] = 'soon';
    $thursday['to'] = 'soon';
    $thursday['status'] = 'soon';
    // friday
    $friday['day'] = 'Friday';
    $friday['from'] = 'soon';
    $friday['to'] = 'soon';
    $friday['status'] = 'soon';
    // saturday
    $saturday['day'] = 'Saturday';
    $saturday['from'] = 'soon';
    $saturday['to'] = 'soon';
    $saturday['status'] = 'soon';
    // sunday
    $sunday['day'] = 'Sunday';
    $sunday['from'] = 'soon';
    $sunday['to'] = 'soon';
    $sunday['status'] = 'soon';
}
?>

<style>
    .openinghours {
    font-family:Lucida Console;
    overflow: hidden;
    display: inline-block;
    font-size:34px;
}
.openinghourscontent {
    float:left;
}
.openinghourscontent h2 {
    display:block;
    text-align:center;
    margin-top:.33em;
}

.today {
    color: #8AC007;
}
.opening-hours-table tr td:first-child {
    font-weight:bold;
}
#open-status {
    display:block;
    text-align:center;
}
.openorclosed:after {
    content:" open during these hours:";
}
.open {
    color:green;
}
.open:after {
    content:" Open";
    color: #6C0;
}
.closed:after {
    content:" Closed";
    color: red;
}
.opening-hours-table td {
    padding:5px;
}
</style>



<table class="table w3-padding" style='width:90%;margin-left:auto;margin-right:auto;font-size:24px;'>
            <tr id="Monday">
                <td><?php echo $monday['day'];?></td>
                <td class="opens"><?php echo $monday['from'];?></td>
                <td><?php if ($monday['status']=='Open') echo '-';?></td>
                <td class="closes"><?php echo $monday['to'];?></td>
            </tr>
            <tr id="Tuesday">
                <td><?php echo $tuesday['day'];?></td>
                <td class="opens"><?php echo $tuesday['from'];?></td>
                <td><?php if ($tuesday['status']=='Open') echo '-';?></td>
                <td class="closes"><?php echo $tuesday['to'];?></td>
            </tr>
            <tr id="Wednesday">
                <td><?php echo $wednesday['day'];?></td>
                <td class="opens"><?php echo $wednesday['from'];?></td>
                <td><?php if ($wednesday['status']=='Open') echo '-';?></td>
                <td class="closes"><?php echo $wednesday['to'];?></td>
            </tr>
            <tr id="Thursday">
                <td><?php echo $thursday['day'];?></td>
                <td class="opens"><?php echo $thursday['from'];?></td>
                <td><?php if ($thursday['status']=='Open') echo '-';?></td>
                <td class="closes"><?php echo $thursday['to'];?></td>
            </tr>
            <tr id="Friday">
                <td><?php echo $friday['day'];?></td>
                <td class="opens"><?php echo $friday['from'];?></td>
                <td><?php if ($friday['status']=='Open') echo '-';?></td>
                <td class="closes"><?php echo $friday['to'];?></td>
            </tr>
            <tr id="Saturday">
                <td><?php echo $saturday['day'];?></td>
                <td class="opens"><?php echo $saturday['from'];?></td>
                <td><?php if ($saturday['status']=='Open') echo '-';?></td>
                <td class="closes"><?php echo $saturday['to'];?></td>
            </tr>
            <tr id="Sunday">
                <td><?php echo $sunday['day'];?></td>
                <td class="opens"><?php echo $sunday['from'];?></td>
                <td><?php if ($sunday['status']=='Open') echo '-';?></td>
                <td class="closes"><?php echo $sunday['to'];?></td>
            </tr>
        </table>
