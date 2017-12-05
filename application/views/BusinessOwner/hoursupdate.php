<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php echo $header; ?>
<?php echo $dashboard; ?>

<?php if (!empty($hours)) {
    $hid1=$hid2=$hid3=$hid4=$hid5=$hid6=$hid7='';
    foreach($hours as $time) {
     $data['lid'] = $time->lid;
    // monday array
    if ($time->d_name == 'Monday') {
        $monday['day'] = $time->d_name;
        $monday['from'] = $time->from_time;
        $monday['to'] = $time->to_time;
        // $hid['one'] = $time->hid;
        $hid1 = $time->hid;
        if ($time->active == 0) {
        $monday['status'] = 'Closed';
        $monday['from'] = '';
        $monday['to'] = '';
        } else if ($time->active == 1) {
        $monday['status'] = 'Open';
        $monday['from_hours'] = substr($monday['from'], 0, strpos($monday['from'], ':'));
        $monday['from_minutes'] = substr($monday['from'], strpos($monday['from'], ":") + 1);
        $monday['to_hours'] = substr($monday['to'], 0, strpos($monday['to'], ':'));
        $monday['to_minutes'] = substr($monday['to'], strpos($monday['to'], ":") + 1);
        }
    }
    // tuesday array
    if ($time->d_name == 'Tuesday') {
        $tuesday['day'] = $time->d_name;
        $tuesday['from'] = $time->from_time;
        $tuesday['to'] = $time->to_time;
        // $hid['two'] = $time->hid;
        $hid2 = $time->hid;
        if ($time->active == 0) {
        $tuesday['status'] = 'Closed';
        $tuesday['from'] = '';
        $tuesday['to'] = '';
        } else if ($time->active == 1) {
        $tuesday['status'] = 'Open';
        $tuesday['from_hours'] = substr($tuesday['from'], 0, strpos($tuesday['from'], ':'));
        $tuesday['from_minutes'] = substr($tuesday['from'], strpos($tuesday['from'], ":") + 1);
        $tuesday['to_hours'] = substr($tuesday['to'], 0, strpos($tuesday['to'], ':'));
        $tuesday['to_minutes'] = substr($tuesday['to'], strpos($tuesday['to'], ":") + 1);
        }
    }
    // wednesday array
    if ($time->d_name == 'Wednesday') {
        $wednesday['day'] = $time->d_name;
        $wednesday['from'] = $time->from_time;
        $wednesday['to'] = $time->to_time;
        // $hid['three'] = $time->hid;
        $hid3 = $time->hid;
        if ($time->active == 0) {
        $wednesday['status'] = 'Closed';
        $wednesday['from'] = '';
        $wednesday['to'] = '';
        } else if ($time->active == 1) {
        $wednesday['status'] = 'Open';
        $wednesday['from_hours'] = substr($wednesday['from'], 0, strpos($wednesday['from'], ':'));
        $wednesday['from_minutes'] = substr($wednesday['from'], strpos($wednesday['from'], ":") + 1);
        $wednesday['to_hours'] = substr($wednesday['to'], 0, strpos($wednesday['to'], ':'));
        $wednesday['to_minutes'] = substr($wednesday['to'], strpos($wednesday['to'], ":") + 1);
        }
    }
    // thursday array
    if ($time->d_name == 'Thursday') {
        $thursday['day'] = $time->d_name;
        $thursday['from'] = $time->from_time;
        $thursday['to'] = $time->to_time;
        // $hid['four'] = $time->hid;
        $hid4 = $time->hid;
        if ($time->active == 0) {
        $thursday['status'] = 'Closed';
        $thursday['from'] = '';
        $thursday['to'] = '';
        } else if ($time->active == 1) {
        $thursday['status'] = 'Open';
        $thursday['from_hours'] = substr($thursday['from'], 0, strpos($thursday['from'], ':'));
        $thursday['from_minutes'] = substr($thursday['from'], strpos($thursday['from'], ":") + 1);
        $thursday['to_hours'] = substr($thursday['to'], 0, strpos($thursday['to'], ':'));
        $thursday['to_minutes'] = substr($thursday['to'], strpos($thursday['to'], ":") + 1);
        }
    }
        // friday array
    if ($time->d_name == 'Friday') {
        $friday['day'] = $time->d_name;
        $friday['from'] = $time->from_time;
        $friday['to'] = $time->to_time;
        // $hid['five'] = $time->hid;
        $hid5 = $time->hid;
        if ($time->active == 0) {
        $friday['status'] = 'Closed';
        $friday['from'] = '';
        $friday['to'] = '';
        } else if ($time->active == 1) {
        $friday['status'] = 'Open';
        $friday['from_hours'] = substr($friday['from'], 0, strpos($friday['from'], ':'));
        $friday['from_minutes'] = substr($friday['from'], strpos($friday['from'], ":") + 1);
        $friday['to_hours'] = substr($friday['to'], 0, strpos($friday['to'], ':'));
        $friday['to_minutes'] = substr($friday['to'], strpos($friday['to'], ":") + 1);
        }
    }
        // saturday array
    if ($time->d_name == 'Saturday') {
        $saturday['day'] = $time->d_name;
        $saturday['from'] = $time->from_time;
        $saturday['to'] = $time->to_time;
        // $hid['six'] = $time->hid;
        $hid6 = $time->hid;
        if ($time->active == 0) {
        $saturday['status'] = 'Closed';
        $saturday['from'] = '';
        $saturday['to'] = '';
        } else if ($time->active == 1) {
        $saturday['status'] = 'Open';
        $saturday['from_hours'] = substr($saturday['from'], 0, strpos($saturday['from'], ':'));
        $saturday['from_minutes'] = substr($saturday['from'], strpos($saturday['from'], ":") + 1);
        $saturday['to_hours'] = substr($saturday['to'], 0, strpos($saturday['to'], ':'));
        $saturday['to_minutes'] = substr($saturday['to'], strpos($saturday['to'], ":") + 1);
        }
    }
        // sunday array
    if ($time->d_name == 'Sunday') {
        $sunday['day'] = $time->d_name;
        $sunday['from'] = $time->from_time;
        $sunday['to'] = $time->to_time;
        // $hid['seven'] = $time->hid;
        $hid7 =$time->hid;
        if ($time->active == 0) {
        $sunday['status'] = 'Closed';
        $sunday['from'] = '';
        $sunday['to']  = '';
        } else if ($time->active == 1) {
        $sunday['status'] = 'Open';
        $sunday['from_hours'] = substr($sunday['from'], 0, strpos($sunday['from'], ':'));
        $sunday['from_minutes'] = substr($sunday['from'], strpos($sunday['from'], ":") + 1);
        $sunday['to_hours'] = substr($sunday['to'], 0, strpos($sunday['to'], ':'));
        $sunday['to_minutes'] = substr($sunday['to'], strpos($sunday['to'], ":") + 1);
        }
    }
    $hidArray = array($hid1,$hid2,$hid3,$hid4,$hid5,$hid6,$hid7);
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

// arrays for times to set for select options

$hoursArray = array('01','02','03','04','05','06','07','08','09','10','11','12');
$minutesArray = array('00','05','10','15','20','25','30','35','40','45','50','55');
$hoursArrayCount = count($hoursArray);
$minutesArrayCount = count($minutesArray);
?>

<br><br>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/github.min.css">
<style type="text/css">
body {background-color: #eee;color:#00477e;}
.navbar h3 {
	color: #f5f5f5;
	margin-top: 14px;
}

.input-group {
	width: 110px;
	margin-bottom: 10px;
}

@media (min-width: 768px) {
  .container {
    max-width: 730px;
  }
}
@media (max-width: 767px) {
  .pull-center {
    float: right;
  }
}
</style>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="assets/js/html5shiv.js"></script>
  <script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>


<div class="container demo-bg">
<div class="row">
<div class="col-sm-12">
<div class="business-hours">
<h2 class="title">Opening Hours</h2>
        <div style='overflow-x:auto;'>
        <table class='table list-unstyled opening-hours'>
    <tr>
    <th></th>
    <th>Day</th>
    <th>Time</th>
    <th></th>
    </tr>

    <tr>
    <th></th>
    <th></th>
    <th>From</th>
    <th>TO</th>
    <th></th>
    </tr>
            <form action='<?php echo base_url();?>BusinessOwner/BusinessOwner/updateHours/<?php echo $data['lid'];?>' method='POST'>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <?php if(!empty($hidArray))
            {foreach($hidArray as $value) {?>
            <input type='hidden' name='hid[]' value='<?php  echo $value;?>'>
            <?php } }?>
        <!--*** MONDAY ***-->
    <tr>
        <!--checkbox-->
        <td><input type='checkbox' name='setMonday' id='setMonday' value='1' <?php echo ($monday['status']=='Open' ? 'checked' : '');?>></td>
        <!--day name-->
        <td><?php echo $monday['day'];?></td>
        <!--*** FROM ***-->
        <td><input class="form-control" id="mondayFrom" name='mondayFrom' value="<?php echo $monday['from'];?>" placeholder=":" style="width:80px;"></td>
        <!--*** TO ***-->
        <td><input class="form-control" id="mondayTo" name='mondayTo' value="<?php echo $monday['to'];?>" placeholder=":" style="width:80px;"></td>
    </tr>
    <!--*** TUESDAY ***-->
    <tr>
        <!--checkbox-->
        <td><input type='checkbox' name='setTuesday' id='setTuesday' value='1' <?php echo ($tuesday['status']=='Open' ? 'checked' : '');?>></td>
        <!--day name-->
        <td><?php echo $tuesday['day'];?></td>
        <!--*** FROM ***-->
        <td><input class="form-control" id="tuesdayFrom" name='tuesdayFrom' value="<?php echo $tuesday['from'];?>" placeholder=":" style="width:80px;"></td>
        <!--*** TO ***-->
        <td><input class="form-control" id="tuesdayTo" name='tuesdayTo' value="<?php echo $tuesday['to'];?>" placeholder=":" style="width:80px;"></td>
    </tr>
    <!--*** WEDNESDAY ***-->
    <tr>
        <!--checkbox-->
        <td><input type='checkbox' name='setWednesday' id='setWednesday' value='1' <?php echo ($wednesday['status']=='Open' ? 'checked' : '');?>></td>
        <!--day name-->
        <td><?php echo $wednesday['day'];?></td>
        <!--*** FROM ***-->
        <td><input class="form-control" id="wednesdayFrom" name='wednesdayFrom' value="<?php echo $wednesday['from'];?>" placeholder=":" style="width:80px;"></td>
        <!--*** TO ***-->
        <td><input class="form-control" id="wednesdayTo" name='wednesdayTo' value="<?php echo $wednesday['to'];?>" placeholder=":" style="width:80px;"></td>
    </tr>
    <!--*** THURSDAY ***-->
    <tr>
        <!--checkbox-->
        <td><input type='checkbox' name='setThursday' id='setThursday' value='1' <?php echo ($thursday['status']=='Open' ? 'checked' : '');?>></td>
        <!--day name-->
        <td><?php echo $thursday['day'];?></td>
        <!--*** FROM ***-->
        <td><input class="form-control" id="thursdayFrom" name='thursdayFrom' value="<?php echo $thursday['from'];?>" placeholder=":" style="width:80px;"></td>
        <!--*** TO ***-->
        <td><input class="form-control" id="thursdayTo" name='thursdayTo' value="<?php echo $thursday['to'];?>" placeholder=":" style="width:80px;"></td>
    </tr>
    <!--*** FRIDAY ***-->
    <tr>
        <!--checkbox-->
        <td><input type='checkbox' name='setFriday' id='setFriday' value='1' <?php echo ($friday['status']=='Open' ? 'checked' : '');?>></td>
        <!--day name-->
        <td><?php echo $friday['day'];?></td>
        <!--*** FROM ***-->
        <td><input class="form-control" id="fridayFrom" name='fridayFrom' value="<?php echo $friday['from'];?>" placeholder=":" style="width:80px;"></td>
        <!--*** TO ***-->
        <td><input class="form-control" id="fridayTo" name='fridayTo' value="<?php echo $friday['to'];?>" placeholder=":" style="width:80px;"></td>
    </tr>
    <!--*** SATURDAY ***-->
    <tr>
        <!--checkbox-->
        <td><input type='checkbox' name='setSaturday' id='setSaturday' value='1' <?php echo ($saturday['status']=='Open' ? 'checked' : '');?>></td>
        <!--day name-->
        <td><?php echo $saturday['day'];?></td>
        <!--*** FROM ***-->
        <td><input class="form-control" id="saturdayFrom" name='saturdayFrom' value="<?php echo $saturday['from'];?>" placeholder=":" style="width:80px;"></td>
        <!--*** TO ***-->
        <td><input class="form-control" id="saturdayTo" name='saturdayTo' value="<?php echo $saturday['to'];?>" placeholder=":" style="width:80px;"></td>
    </tr>
     <!--*** SUNDAY ***-->
    <tr>
        <!--checkbox-->
        <td><input type='checkbox' name='setSunday' id='setSunday' value='1' <?php echo ($sunday['status']=='Open' ? 'checked' : '');?>></td>
        <!--day name-->
        <td><?php echo $sunday['day'];?></td>
        <!--*** FROM ***-->
        <td><input class="form-control" id="sundayFrom" name='sundayFrom' value="<?php echo $sunday['from'];?>" placeholder=":" style="width:80px;"></td>
        <!--*** TO ***-->
        <td><input class="form-control" id="sundayTo" name='sundayTo' value="<?php echo $sunday['to'];?>" placeholder=":" style="width:80px;"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type='submit' name='update_hours' id='update_hours' value='Save' class='btn btn-lg btn-primary w3-padding w3-round'></td>
    </tr>
    </form>
    
    
</table>
</div>
</div>
</div>
</div>
</div>


<script type="text/javascript" src='<?php echo base_url();?>assets/js/jquery.min.js'></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src='<?php echo base_url();?>dist/bootstrap-clockpicker.min.js'></script>
<script type="text/javascript">
$('.clockpicker').clockpicker()
	.find('input').change(function(){
		console.log(this.value);
	});
	// monday
    var mondayFrom = $('#mondayFrom').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
});
    var mondayTo = $('#mondayTo').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
});
    // tuesday
   var tuesdayFrom = $('#tuesdayFrom').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
});
    var tuesdayTo = $('#tuesdayTo').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
}); 
    // wednesday
    var wednesdayFrom = $('#wednesdayFrom').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
});
    var wednesdayTo = $('#wednesdayTo').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
}); 
    // thursday
    var thursdayFrom = $('#thursdayFrom').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
});
    var thursdayTo = $('#thursdayTo').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
}); 
    // friday
    var fridayFrom = $('#fridayFrom').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
});
    var fridayTo = $('#fridayTo').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
}); 
    // saturday
    var saturdayFrom = $('#saturdayFrom').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
});
    var saturdayTo = $('#saturdayTo').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
}); 
// sunday
    var sundayFrom = $('#sundayFrom').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
});
    var sundayTo = $('#sundayTo').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
}); 
// Manually toggle to the minutes view
$('#check-minutes').click(function(e){
	// Have to stop propagation here
	e.stopPropagation();
	input.clockpicker('show')
			.clockpicker('toggleView', 'minutes');
});
if (/mobile/i.test(navigator.userAgent)) {
	$('input').prop('readOnly', true);
}
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/highlight.min.js"></script>