<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php foreach($hours as $time) {
    // monday
    $times['mondayFrom'] = $time->mondayFrom;
    $times['mondayTo'] = $time->mondayTo;
    // tuesday
    $times['tuesdayFrom'] = $time->tuesdayFrom;
    $times['tuesdayTo'] = $time->tuesdayTo;
    // wednesday
    $times['wednesdayFrom'] = $time->wednesdayFrom;
    $times['wednesdayTo'] = $time->wednesdayTo;
    // thursday
    $times['thursdayFrom'] = $time->thursdayFrom;
    $times['thursdayTo'] = $time->thursdayTo;
    // friday
    $times['fridayFrom'] = $time->fridayFrom;
    $times['fridayTo'] = $time->fridayTo;
    // saturday
    $times['saturdayFrom'] = $time->saturdayFrom;
    $times['saturdayTo'] = $time->saturdayTo;
    // sunday
    $times['sundayFrom'] = $time->sundayFrom;
    $times['sundayTo'] = $time->sundayTo;
}
?>
<div class='col-lg-4'>
<div class="w3-sidebar w3-bar-block w3-light-grey w3-container" style="width:25%;">
  <!-- <a href="#" class="w3-bar-item w3-button">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-hover-black">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-hover-green">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-hover-blue">Link 4</a>
  <a href="#" class="w3-bar-item w3-button w3-hover-red">Link 5</a> -->
  <h2>We're Open At These Times</h2>
  <!-- monday  -->
<div class='w3-row w3-left w3-mobile'>
  <div class='w3-col s12 m12 l12 w3-center w3-mobile'>
  <h5><b style='color:#00477e;'> Monday: </b></h5>
  </div>
  </div>
  <div class='w3-row w3-center w3-mobile'>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b><?php echo $times['mondayFrom'];?></b></h5>
  </div>
  <div class='w3-col s4 m4 l4 w3-center'>
  <h5><b> - </b></h5>
  </div>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b><?php echo $times['mondayTo'];?></b></h5>
  </div>
</div>
<!-- tuesday  -->
<div class='w3-row w3-left w3-mobile'>
  <div class='w3-col s12 m12 l12 w3-center w3-mobile'>
  <h5><b style='color:#00477e;'> Tuesday: </b></h5>
  </div>
  </div>
  <div class='w3-row w3-center w3-mobile'>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b><?php echo $times['tuesdayFrom'];?></b></h5>
  </div>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b> - </b></h5>
  </div>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b><?php echo $times['tuesdayTo'];?></b></h5>
  </div>
</div>
<!-- wednesday  -->
<div class='w3-row w3-left w3-mobile'>
  <div class='w3-col s12 m12 l12 w3-center w3-mobile'>
  <h5><b style='color:#00477e;'> Wednesday: </b></h5>
  </div>
  </div>
  <div class='w3-row w3-center w3-mobile'>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b><?php echo $times['wednesdayFrom'];?></b></h5>
  </div>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b> - </b></h5>
  </div>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b><?php echo $times['wednesdayTo'];?></b></h5>
  </div>
</div>
<!-- Thursday  -->
<div class='w3-row w3-left w3-mobile'>
  <div class='w3-col s12 m12 l12 w3-center w3-mobile'>
  <h5><b style='color:#00477e;'> Thursday: </b></h5>
  </div>
  </div>
  <div class='w3-row w3-center w3-mobile'>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b><?php echo $times['thursdayFrom'];?></b></h5>
  </div>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b> - </b></h5>
  </div>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b><?php echo $times['thursdayTo'];?></b></h5>
  </div>
</div>
<!-- Friday  -->
<div class='w3-row w3-left'>
  <div class='w3-col s12 m12 l12 w3-center w3-mobile'>
  <h5><b style='color:#00477e;'> Friday: </b></h5>
  </div>
  </div>
  <div class='w3-row w3-center w3-mobile'>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b><?php echo $times['fridayFrom'];?></b></h5>
  </div>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b> - </b></h5>
  </div>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b><?php echo $times['fridayTo'];?></b></h5>
  </div>
</div>
<!-- Saturday  -->
<div class='w3-row w3-left w3-mobile'>
  <div class='w3-col s12 m12 l12 w3-center w3-mobile'>
  <h5><b style='color:#00477e;'> Saturday: </b></h5>
  </div>
  </div>
  <div class='w3-row w3-center w3-mobile'>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b><?php echo $times['saturdayFrom'];?></b></h5>
  </div>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b> - </b></h5>
  </div>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b><?php echo $times['saturdayTo'];?></b></h5>
  </div>
</div>
<!-- Sunday  -->
<div class='w3-row w3-left w3-mobile'>
  <div class='w3-col s12 m12 l12 w3-center w3-mobile'>
  <h5><b style='color:#00477e;'> Sunday: </b></h5>
  </div>
  </div>
  <div class='w3-row w3-center w3-mobile'>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b><?php echo $times['sundayFrom'];?></b></h5>
  </div>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b> - </b></h5>
  </div>
  <div class='w3-col s4 m4 l4 w3-center w3-mobile'>
  <h5><b><?php echo $times['sundayTo'];?></b></h5>
  </div>
</div>

</div>
</div> <!-- end of col 1 -->

