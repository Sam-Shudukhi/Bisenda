<?php
    if (!empty($user_information)) {
        // print_r($user_information);
        foreach ($user_information as $user) {
            $fname = $user->first;
            $lname = $user->last;
            $email = $user->email;
            $phone = $user->phone;
        }
        
    }
    
    // get the category of the listing
    if (!empty($listing)) {
    foreach($listing as $list) {
        $category = $list->category;
        $lid = $list->lid;
        $storeEmail = $list->email;
    }
    }
     
    date_default_timezone_set("Canada/Saskatchewan");
    $todays_date = date('Y-m-d');
    $datetime = DateTime::createFromFormat('Y-m-d', $todays_date);
    $todays_name = $datetime->format('D');
    $time_now = date('h:i');
    $currDate = $todays_date;
    
    
    
    $Mon = array('Mon','Tue','Wed','Thu','Fri','Sat','Sun');
    $Tue = array('Tue','Wed','Thu','Fri','Sat','Sun','Mon');
    $Wed = array('Wed','Thu','Fri','Sat','Sun','Mon','Tue');
    $Thu = array('Thu','Fri','Sat','Sun','Mon','Tue','Wed');
    $Fri = array('Fri','Sat','Sun','Mon','Tue','Wed','Thu');
    $Sat = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
    $Sun = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
    $activeMon = array('Mon'=>'','Tue'=>'','Wed'=>'','Thu'=>'','Fri'=>'','Sat'=>'','Sun'=>'');
    $activeTue = array('Tue'=>'','Wed'=>'','Thu'=>'','Fri'=>'','Sat'=>'','Sun'=>'','Mon'=>'');
    $activeWed = array('Wed'=>'','Thu'=>'','Fri'=>'','Sat'=>'','Sun'=>'','Mon'=>'','Tue'=>'');
    $activeThu = array('Thu'=>'','Fri'=>'','Sat'=>'','Sun'=>'','Mon'=>'','Tue'=>'','Wed'=>'');
    $activeFri = array('Fri'=>'','Sat'=>'','Sun'=>'','Mon'=>'','Tue'=>'','Wed'=>'','Thu'=>'');
    $activeSat = array('Sat'=>'','Sun'=>'','Mon'=>'','Tue'=>'','Wed'=>'','Thu'=>'','Fri'=>'');
    $activeSun = array('Sun'=>'','Mon'=>'','Tue'=>'','Wed'=>'','Thu'=>'','Fri'=>'','Sat'=>'');
    $monTimes = array('monFrom'=>'','tueFrom'=>'','wedFrom'=>'', 'thuFrom'=>'', 'friFrom'=>'', 'satFrom'=>'', 'sunFrom'=>'', 'monTo'=>'','tueTo'=>'','wedTo'=>'','thuTo'=>'','friTo'=>'','satTo'=>'','sunTo'=>'','');
    $storeHours = array('monFrom'=>'','tueFrom'=>'','wedFrom'=>'', 'thuFrom'=>'', 'friFrom'=>'', 'satFrom'=>'', 'sunFrom'=>'', 'monTo'=>'','tueTo'=>'','wedTo'=>'','thuTo'=>'','friTo'=>'','satTo'=>'','sunTo'=>'','');
   // add 1 hour from store openning hour till closing hour
    function add_1_Hour($time_var) {
        $timestamp = strtotime($time_var) + 60*60;         
        $time = date('h:i', $timestamp);
        return $time;
    }
    // add 1 dat to curr date for a week
    function add_1_day($date_var) {
        $stop_date = date('Y-m-d', strtotime($date_var . ' +1 day'));
        return $stop_date;
    }
    
    $page_url = $this->uri->slash_segment(3, 'leading');
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}




/*// radio buttons */

.button-grid.active {
    background: #428bca;   
}

.button-grid {
    width: 80px; 
    padding: 10px;
    position: relative;
    margin-bottom:5px;
}

.button-grid.active .button-grid-word{
    color: white;
}

.button-grid-word {
    font-size: 15px;
    font-weight: 600;
}
</style>

<body>
<form id="regForm" action="<?php echo base_url().'user/User/addBooking/'.$page_url;?>" method='POST'>
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
    
  <h1><i class='fa fa-calendar'></i>&nbsp;Booking</h1>
    <?php 
    if ($this->session->userdata('logged_in')) {
        $user_data = $this->session->userdata('logged_in');
        $uid = $user_data['uid'];
       
       echo '<input type="hidden" name="uid" value="'.$uid.'">';
       echo '<input type="hidden" name="lid" value="'.$lid.'">';
    }
    ?>
  <div class="tab">When(this week):
        
        <br><br>
        <p>
        <select name='weekDays' id='weekDays' style='width:200px;height:170px;background:#428BCA;color:white' onchange='dayPicked(this.value,this.options[this.selectedIndex].id);' multiple>
            <option>- Pick a Day -</option>
            <?php
            //  $todays_name = 'Fri'; 
             if (!empty($hours)) {
                 $monStat=$tueStat=$wedStat=$thuStat=$friStat=$satStat=$sunStat=0;
            foreach($hours as $hour) {
                        // if ($hour->active == 1) {
                        
                            if ($hour->did == 1) {$dayName = 'Mon';$monStat = $hour->active;
                                if ($hour->active) {
                                    $storeHours['monFrom'] = $hour->from_time;
                                    $storeHours['monTo'] = $hour->to_time;
                                }
                            }
                            else if ($hour->did == 2) {$dayName = 'Tue';$tueStat = $hour->active;
                                if ($hour->active) {
                                    $storeHours['tueFrom'] = $hour->from_time;
                                    $storeHours['tueTo'] = $hour->to_time;
                                }
                            }
                            else if ($hour->did == 3) {$dayName = 'Wed';$wedStat = $hour->active;
                                if ($hour->active) {
                                    $storeHours['wedFrom'] = $hour->from_time;
                                    $storeHours['wedTo'] = $hour->to_time;
                                }
                            }
                            else if ($hour->did == 4) {$dayName = 'Thu';$thuStat = $hour->active;
                                if ($hour->active) {
                                    $storeHours['thuFrom'] = $hour->from_time;
                                    $storeHours['thuTo'] = $hour->to_time;
                                }
                            }
                            else if ($hour->did == 5) {$dayName = 'Fri';$friStat = $hour->active;
                                if ($hour->active) {
                                    $storeHours['friFrom'] = $hour->from_time;
                                    $storeHours['friTo'] = $hour->to_time;
                                }
                            }
                            else if ($hour->did == 6) {$dayName = 'Sat';$satStat = $hour->active;
                                if ($hour->active) {
                                    $storeHours['satFrom'] = $hour->from_time;
                                    $storeHours['satTo'] = $hour->to_time;
                                }
                            }
                            else if ($hour->did == 7) {$dayName = 'Sun';$sunStat = $hour->active;
                                if ($hour->active) {
                                    $storeHours['sunFrom'] = $hour->from_time;
                                    $storeHours['sunTo'] = $hour->to_time;
                                }
                            }
                            if ($dayName == $todays_name && $dayName == 'Mon') {
                                for($i = 0; $i < count($Mon); $i++) {
                                    echo "<option value='".$Mon[$i]."' id='".$currDate."'>$Mon[$i]. $currDate</option>";
                                    $currDate = add_1_day($currDate);
                                }
                            }
                            else if ($dayName == $todays_name && $todays_name == 'Tue') {
                                for($j = 0; $j < count($Tue); $j++) {
                                    echo "<option value='".$Tue[$j]."' id='".$currDate."'>$Tue[$j]. $currDate</option>";
                                    $currDate = add_1_day($currDate);
                                }
                            }
                            else if ($dayName == $todays_name && $todays_name == 'Wed') {
                                for($k = 0; $k < count($Wed); $k++) {
                                    echo "<option value='".$Wed[$k]."' id='".$currDate."'>$Wed[$k]. $currDate</option>";
                                    $currDate = add_1_day($currDate);
                                }
                            }
                            else if ($dayName == $todays_name && $todays_name == 'Thu') {
                                for($l = 0; $l < count($Thu); $l++) {
                                    echo "<option value='".$Thu[$l]."' id='".$currDate."'>$Thu[$l]. $currDate</option>";
                                    $currDate = add_1_day($currDate);
                                }
                            }
                            else if ($dayName == $todays_name && $todays_name == 'Fri') {
                                for($m = 0; $m < count($Fri); $m++) {
                                    echo "<option value='".$Fri[$m]."' id='".$currDate."'>$Fri[$m]. $currDate</option>";
                                    $currDate = add_1_day($currDate);
                                }
                            }
                            else if ($dayName == $todays_name && $todays_name == 'Sat') {
                                for($n = 0; $n < count($Sat); $n++) {
                                    echo "<option value='".$Sat[$n]."' id='".$currDate."'>$Sat[$n]. $currDate</option>";
                                    $currDate = add_1_day($currDate);
                                }
                            }
                            else if ($dayName == $todays_name && $todays_name == 'Sun') {
                                for($o = 0; $o < count($Sun); $o++) {
                                    echo "<option value='".$Sun[$o]."' id='".$currDate."'>$Sun[$o]. $currDate</option>";
                                    $currDate = add_1_day($currDate);
                                }
                            }
                        }
                        } 
            ?>
        </select>
        </p>
        <br><br>
        <p id='pickStatus'></p>
        <br><br>
        
        <!--// selections -->
        <!--// monday -->
                    <?php if ($monStat) {?>
                   <div class="rButtons button-grid-group btn-group-vertical col-lg-12 w3-margin-bottom" id="monday" data-toggle="buttons" style="height: 200px; overflow-y: scroll;display:none">
                    <?php
                    $period = 'AM';
                    if ($storeHours['monFrom'] >= '12:00') {$period = 'PM';}
                    echo '<label class="btn btn-default button-grid">';
                    echo '<input type="radio" value="'.$storeHours['monFrom'].'" onchange="setBookingTime(this.value);" name="Options" id="option1" autocomplete="off" >';
                    echo '<span class="button-grid-word">'.$storeHours['monFrom']." ".$period.'</span>
                                </label>';
                    // increment time by 1 hour factor
                            $newTime = add_1_Hour($storeHours['monFrom']);
                            while ($newTime != $storeHours['monTo']):
                                if ($newTime == '12:00') {$period = 'PM';}
                                        ?>
                                <label class="btn btn-default button-grid">
                                <input type="radio" name="Options]" id="option1" autocomplete="off" onchange="setBookingTime(this.value);" value="<?php echo $newTime;?>">
                                <span class="button-grid-word"><?php echo "$newTime $period";?></span>
                                </label>
                                        <?php
                                            $newTime = add_1_Hour($newTime);
                            endwhile;
                                    
                                ?>
                   </div> <!-- end monday -->
                   <?php } ?>
        <!--// tuesday -->
                    <?php if ($tueStat) {?>
                   <div class="rButtons button-grid-group btn-group-vertical col-lg-12 w3-margin-bottom" id="tuesday" data-toggle="buttons" style="height: 200px; overflow-y: scroll;display:none">
                    <?php
                    $period = 'AM';
                    if ($storeHours['tueFrom'] >= '12:00') {$period = 'PM';}
                    echo '<label class="btn btn-default button-grid">';
                    echo '<input type="radio" value="'.$storeHours['tueFrom'].'" name="Options" id="option1" autocomplete="off" onchange="setBookingTime(this.value);">';
                    echo '<span class="button-grid-word">'.$storeHours['tueFrom']." ".$period.'</span>
                                </label>';
                    // increment time by 1 hour factor
                            $newTime = add_1_Hour($storeHours['tueFrom']);
                            while ($newTime != $storeHours['tueTo']):
                                if ($newTime == '12:00') {$period = 'PM';}
                                        ?>
                                <label class="btn btn-default button-grid">
                                <input type="radio"value='<?php echo $newTime;?>' onchange='setBookingTime(this.value);' name="Options]" id="option1" autocomplete="off">
                                <span class="button-grid-word"><?php echo "$newTime $period";?></span>
                                </label>
                                        <?php
                                            $newTime = add_1_Hour($newTime);
                            endwhile;
                                    
                                ?>
                   </div> <!-- end tuesday -->
                   <?php } ?>
        <!--// wednesday -->
                    <?php if ($wedStat) {?>
                   <div class="rButtons button-grid-group btn-group-vertical col-lg-12 w3-margin-bottom" id="wednesday" data-toggle="buttons" style="height: 200px; overflow-y: scroll;display:none">
                    <?php
                    $period = 'AM';
                    if ($storeHours['wedFrom'] >= '12:00') {$period = 'PM';}
                    echo '<label class="btn btn-default button-grid">';
                    echo '<input type="radio" value="'.$storeHours['wedFrom'].'" onchange="setBookingTime(this.value);" name="Options" id="option1" autocomplete="off">';
                    echo '<span class="button-grid-word">'.$storeHours['wedFrom']." ".$period.'</span>
                                </label>';
                    // increment time by 1 hour factor
                            $newTime = add_1_Hour($storeHours['wedFrom']);
                            while ($newTime != $storeHours['wedTo']):
                                if ($newTime == '12:00') {$period = 'PM';}
                                        ?>
                                <label class="btn btn-default button-grid">
                                <input type="radio" name="Options" id="option1" autocomplete="off" onchange="setBookingTime(this.value);" value="<?php echo $newTime;?>">
                                <span class="button-grid-word"><?php echo "$newTime $period";?></span>
                                </label>
                                        <?php
                                            $newTime = add_1_Hour($newTime);
                            endwhile;
                                    
                                    // echo 'outa loop';
                                ?>
                   </div> <!-- end wednesday -->
                   <?php } ?>
        <!--// thursday -->
                    <?php if ($thuStat) {?>
                   <div class="rButtons button-grid-group btn-group-vertical col-lg-12 w3-margin-bottom" id="thursday" data-toggle="buttons" style="height: 200px; overflow-y: scroll;display:none">
                    <?php
                    $period = 'AM';
                    if ($storeHours['thuFrom'] >= '12:00') {$period = 'PM';}
                    echo '<label class="btn btn-default button-grid">';
                    echo '<input type="radio" value="'.$storeHours['thuFrom'].'" onchange="setBookingTime(this.value);" name="Options" id="option1" autocomplete="off">';
                    echo '<span class="button-grid-word">'.$storeHours['thuFrom']." ".$period.'</span>
                                </label>';
                    // increment time by 1 hour factor
                            $newTime = add_1_Hour($storeHours['thuFrom']);
                            while ($newTime != $storeHours['thuTo']):
                                if ($newTime == '12:00') {$period = 'PM';}
                                        ?>
                                <label class="btn btn-default button-grid">
                                <input type="radio" name="Options" id="option1" autocomplete="off" onchange="setBookingTime(this.value);" value="<?php echo $newTime;?>">
                                <span class="button-grid-word"><?php echo "$newTime $period";?></span>
                                </label>
                                        <?php
                                            $newTime = add_1_Hour($newTime);
                            endwhile;
                                    
                                    // echo 'outa loop';
                                ?>
                   </div> <!-- end thursday -->
                   <?php } ?>
        <!--// friday -->
                    <?php if ($friStat) {?>
                   <div class="rButtons button-grid-group btn-group-vertical col-lg-12 w3-margin-bottom" id="friday" data-toggle="buttons" style="height: 200px; overflow-y: scroll;display:none">
                    <?php
                    $period = 'AM';
                    if ($storeHours['friFrom'] >= '12:00') {$period = 'PM';}
                    echo '<label class="btn btn-default button-grid">';
                    echo '<input type="radio" value="'.$storeHours['friFrom'].'" onchange="setBookingTime(this.value);" name="Options" id="option1" autocomplete="off">';
                    echo '<span class="button-grid-word">'.$storeHours['friFrom']." ".$period.'</span>
                                </label>';
                    // increment time by 1 hour factor
                            $newTime = add_1_Hour($storeHours['friFrom']);
                            while ($newTime != $storeHours['friTo']):
                                if ($newTime == '12:00') {$period = 'PM';}
                                        ?>
                                <label class="btn btn-default button-grid">
                                <input type="radio" name="Options" id="option1" autocomplete="off" onchange="setBookingTime(this.value);" value="<?php echo $newTime;?>">
                                <span class="button-grid-word"><?php echo "$newTime $period";?></span>
                                </label>
                                        <?php
                                            $newTime = add_1_Hour($newTime);
                            endwhile;
                                    
                                    // echo 'outa loop';
                                ?>
                   </div> <!-- end friday -->
                   <?php } ?>
                   <!--// saturday -->
                   <?php if ($satStat) {?>
                   <div class="rButtons button-grid-group btn-group-vertical col-lg-12 w3-margin-bottom" id="saturday" data-toggle="buttons" style="height: 200px; overflow-y: scroll;display:none">
                    <?php
                    $period = 'AM';
                    if ($storeHours['satFrom'] >= '12:00') {$period = 'PM';}
                    echo '<label class="btn btn-default button-grid">';
                    echo '<input type="radio" value="'.$storeHours['satFrom'].'" onchange="setBookingTime(this.value);" name="Options" id="" autocomplete="off">';
                    echo '<span class="button-grid-word">'.$storeHours['satFrom']." ".$period.'</span>
                                </label>';
                    // increment time by 1 hour factor
                            $newTimeSat = add_1_Hour($storeHours['satFrom']);
                            while ($newTimeSat != $storeHours['friTo']):
                                if ($newTimeSat == '12:00') {$period = 'PM';}
                                        ?>
                                <label class="btn btn-default button-grid">
                                <input type="radio" name="Options" id="option1" autocomplete="off" value="<?php echo $newTimeSat;?>" onchange="setBookingTime(this.value);">
                                <span class="button-grid-word"><?php echo "$newTimeSat $period";?></span>
                                </label>
                                        <?php
                                            $newTimeSat = add_1_Hour($newTimeSat);
                            endwhile;
                                ?>
                                
                   </div> <!-- end saturday -->
                   <?php } ?>
                   
                   <!--// sunday -->
                   <?php if ($sunStat){?>
                   <div class="rButtons button-grid-group btn-group-vertical col-lg-12 w3-margin-bottom" id="sunday" data-toggle="buttons" style="height: 200px; overflow-y: scroll;display:none">
                    <?php
                    $period = 'AM';
                    if ($storeHours['sunFrom'] >= '12:00') {$period = 'PM';}
                    echo '<label class="btn btn-default button-grid">';
                    echo '<input type="radio" value="'.$storeHours['sunFrom'].'" onchange="setBookingTime(this.value);" name="Options" id="" autocomplete="off">';
                    echo '<span class="button-grid-word">'.$storeHours['sunFrom']." ".$period.'</span>
                                </label>';
                    // increment time by 1 hour factor
                            $newTimeSat = add_1_Hour($storeHours['sunFrom']);
                            while ($newTimeSat != $storeHours['sunTo']):
                                if ($newTimeSat == '12:00') {$period = 'PM';}
                                        ?>
                                <label class="btn btn-default button-grid">
                                <input type="radio" name="Options" id="option1" autocomplete="off" onchange="setBookingTime(this.value);" value="<?php echo $newTimeSat;?>">
                                <span class="button-grid-word"><?php echo "$newTimeSat $period";?></span>
                                </label>
                                        <?php
                                            $newTimeSat = add_1_Hour($newTimeSat);
                            endwhile;
                                ?>
                   </div> <!-- end sunday -->
                    <?php } ?>
         
                <br><br>
        <br><br>
        
  </div> <!-- end when tab -->
  
  <div class="tab">What:
    <p>
        <div class='table-responsive'>
            <table class='table'>
                <tr>
                    <th>Type</th>
                    <?php 
                    if (!empty($availableTables)) {
                        $rids = array('4 Seater'=>'','2 Seater'=>'','Booth'=>'','Bar'=>'');
                        foreach($availableTables as $table) {
                            if ($table->table_type == 1) {
                                $t_name = '4 Seater';
                                $rids[$t_name]=$table->rid;
                                $tableAmounts[0] = $table->amount;
                            }
                            if ($table->table_type == 2) {
                                $t_name = '2 Seater';
                                $rids[$t_name]=$table->rid;
                                $tableAmounts[1] = $table->amount;
                            }
                            if ($table->table_type == 3) {
                                $t_name = 'Booth';
                                $rids[$t_name]=$table->rid;
                                $tableAmounts[2] = $table->amount;
                            }
                            if ($table->table_type == 4) {
                                $t_name = 'Bar';
                                $rids[$t_name]=$table->rid;
                                $tableAmounts[3] = $table->amount;
                            }
                            
                            $tableNames[] = $t_name;
                            echo "<th>$t_name</th>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <?php 
                    if (!empty($availableTables)) {
                        
                            if (array_key_exists('0', $tableAmounts)) {
                                echo '<td><select required class="table_quantity" id="type1" name="quantity1" multiple>';
                                for ($i = 0; $i <= $tableAmounts[0]; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                echo '</select>';
                                echo '<input name="type1Rid" type="hidden" value="'.$rids['4 Seater'].'">';
                                echo '</td>';
                            }
                            if (array_key_exists('1', $tableAmounts)) {
                                echo '<td><select required class="table_quantity" id="type2" name="quantity2" multiple>';
                                for ($i = 0; $i <= $tableAmounts[1]; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                echo '</select>';
                                echo '<input name="type2Rid" type="hidden" value="'.$rids['2 Seater'].'">';
                                echo '</td>';
                            }
                            if (array_key_exists('2', $tableAmounts)) {
                                echo '<td><select required class="table_quantity" id="type3" name="quantity3" multiple>';
                                for ($i = 0; $i <= $tableAmounts[2]; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                echo '</select>';
                                echo '<input name="type3Rid" type="hidden" value="'.$rids['Booth'].'">';
                                echo '</td>';
                            }
                            if (array_key_exists('3', $tableAmounts)) {
                                echo '<td><select required class="table_quantity" id="type4" name="quantity4" multiple>';
                                for ($i = 0; $i <= $tableAmounts[3]; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                echo '</select>';
                                echo '<input name="type4Rid" type="hidden" value="'.$rids['Bar'].'">';
                                echo '</td>';
                            }
                            
                        }
                    
                    ?>
                </tr>
            </table>
        </div>
    </p>
  </div>
  <input type='hidden' name='bookingTime' id='bookingTime' value=''>
  <input type='hidden' name='bookingDate' id='bookingDate' value=''>
  <input type='hidden' name='storeName' value='<?php echo $storeName;?>'>
  <input type='hidden' name='storeEmail' value='<?php echo $storeEmail;?>'>
  <input type='hidden' name='userEmail' value='<?php echo $email;?>'>
  <br><br>
  <div style="overflow:" class='row'>
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <br><br>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;" class='row'>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>


<script>

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab
function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}


function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  
  // tab of date and time
  if (currentTab == 0) {
      var $rButtons = $('.rButtons');
      if (!$("#weekDays option:selected").length) {
        $('#weekDays').addClass(" invalid");
        valid = false;
        alert('select day');
  }
  else if(!$rButtons.find("input:radio:checked").length){
      $('.rButtons').addClass(" invalid");
        valid = false;
        alert('select time');
        // alert($rButtons.val());
  }
  }
  
  // tab of quantity
  if (currentTab == 1) {
      if (!$(".table_quantity option:selected").length) {
        $('.table_quantity').addClass(" invalid");
        valid = false;
        alert('select quantity');
  }
  }
  
  
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
     if (y[i].value == "") {
        // alert('!1'+valid);
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}


function dayPicked(day_name,date_picked) {
    $('#bookingDate').val(date_picked);
     if (day_name == 'Mon') {
        if (<?php echo $monStat;?>) {
            $('#pickStatus').html('<b>Staus:</b> Open During Monday');
            $('#monday').show();
            $('#tuesday').hide();
            $('#wednesday').hide();
            $('#thursday').hide();
            $('#friday').hide();
            $('#saturday').hide();
            $('#sunday').hide();
        } else {
            $('#pickStatus').html('<b>Staus:</b> Sorry its closed on Monday');
            $('#monday').hide();
            $('#tuesday').hide();
            $('#wednesday').hide();
            $('#thursday').hide();
            $('#friday').hide();
            $('#saturday').hide();
            $('#sunday').hide();
            
        }
    }
    else if (day_name == 'Tue') {
        if (<?php echo $tueStat;?>) {
            $('#pickStatus').html('<b>Staus:</b> Open During Tuesday');
            $('#monday').hide();
            $('#tuesday').show();
            $('#wednesday').hide();
            $('#thursday').hide();
            $('#friday').hide();
            $('#saturday').hide();
            $('#sunday').hide();
        } else {
            $('#pickStatus').html('<b>Staus:</b> Sorry its closed on Tuesday');
            $('#monday').hide();
            $('#tuesday').hide();
            $('#wednesday').hide();
            $('#thursday').hide();
            $('#friday').hide();
            $('#saturday').hide();
            $('#sunday').hide();
        }
    }
    else if (day_name == 'Wed') {
        if (<?php echo $wedStat;?>) {
            $('#pickStatus').html('<b>Staus:</b> Open During Wednesday');
            $('#monday').hide();
            $('#tuesday').hide();
            $('#wednesday').show();
            $('#thursday').hide();
            $('#friday').hide();
            $('#saturday').hide();
            $('#sunday').hide();
        } else {
            $('#pickStatus').html('<b>Staus:</b> Sorry its closed on Wednesday');
            $('#monday').hide();
            $('#tuesday').hide();
            $('#wednesday').hide();
            $('#thursday').hide();
            $('#friday').hide();
            $('#saturday').hide();
            $('#sunday').hide();
        }
    }
    else if (day_name == 'Thu') {
        if (<?php echo $thuStat;?>) {
            $('#pickStatus').html('<b>Staus:</b> Open During Thursday');
            $('#monday').hide();
            $('#tuesday').hide();
            $('#wednesday').hide();
            $('#thursday').show();
            $('#friday').hide();
            $('#saturday').hide();
            $('#sunday').hide();
        } else {
            $('#pickStatus').html('<b>Staus:</b> Sorry its closed on Thursday');
            $('#monday').hide();
            $('#tuesday').hide();
            $('#wednesday').hide();
            $('#thursday').hide();
            $('#friday').hide();
            $('#saturday').hide();
            $('#sunday').hide();
        }
    }
    else if (day_name == 'Fri') {
        if (<?php echo $friStat;?>) {
            $('#pickStatus').html('<b>Staus:</b> Open During Friday');
            $('#monday').hide();
            $('#tuesday').hide();
            $('#wednesday').hide();
            $('#thursday').hide();
            $('#friday').show();
            $('#saturday').hide();
            $('#sunday').hide();
            
        } else {
            $('#pickStatus').html('<b>Staus:</b> Sorry its closed on Friday');
            $('#monday').hide();
            $('#tuesday').hide();
            $('#wednesday').hide();
            $('#saturday').hide();
            $('#sunday').hide();
            $('#friday').hide();
            $('#thursday').hide();
        }
    }
    else if (day_name == 'Sat') {
        if (<?php echo $satStat;?>) {
            $('#pickStatus').html('<b>Staus:</b> Open During Saturday');
            $('#monday').hide();
            $('#tuesday').hide();
            $('#wednesday').hide();
            $('#saturday').show();
            $('#sunday').hide();
            $('#friday').hide();
            $('#thursday').hide();
        } else {
            $('#pickStatus').html('<b>Staus:</b> Sorry its closed on Saturday');
            $('#monday').hide();
            $('#tuesday').hide();
            $('#wednesday').hide();
            $('#saturday').hide();
            $('#sunday').hide();
            $('#friday').hide();
            $('#thursday').hide();
        }
    }
    else if (day_name == 'Sun') {
        if (<?php echo $sunStat;?>) {
            $('#pickStatus').html('<b>Staus:</b> Open During Sunday');
            $('#monday').hide();
            $('#tuesday').hide();
            $('#wednesday').hide();
            $('#saturday').hide();
            $('#sunday').show();
            $('#friday').hide();
            $('#thursday').hide();
        } else {
            $('#pickStatus').html('<b>Staus:</b> Sorry its closed on Sunday');
            $('#monday').hide();
            $('#tuesday').hide();
            $('#wednesday').hide();
            $('#thursday').hide();
            $('#friday').hide();
            $('#saturday').hide();
            $('#sunday').hide();
            
        }
    }
}

function setBookingTime(str) {
    // alert(str);
    $('#bookingTime').val(str);
}

</script>


</body>
</html>

