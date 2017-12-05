<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
echo $contactsPanel;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            $('.filter').show('1000');
        }
        else
        {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>
<style>
.chip {
    display: inline-block;
    padding: 0 25px;
    height: 150px;
    font-size: 16px;
    line-height: 50px;
    border-radius: 25px;
    background-color: #f1f1f1;
}

/*.space {*/
/*    margin-buttom:25px;*/
/*}*/

.chip img {
    float: left;
    margin: 0 10px 0 -25px;
    height: 50px;
    width: 50px;
    border-radius: 50%;
}
a {color:#00477e;}
</style>
<!--<h1>USERS</h1>-->
<br><br><br>
<div class='row'>
<div class='col-lg-4 col-xs-4'>
    <span class='w3-padding-16 btn w3-round w3-gray w3-hover-blue filter-button' data-filter='all' style='border:3px dashed #428BCA;border:3px dashed white'>&nbsp;&nbsp;
        All Users&nbsp;&nbsp;
    </span>
</div>
<div class='col-lg-4 col-xs-4'>
    <span class='w3-padding-16 btn w3-round w3-gray w3-hover-dark-gray filter-button' data-filter="confirmed" style='border:3px dashed #428BCA'>&nbsp;&nbsp;Confirmed&nbsp;&nbsp;</span>
</div>
<div class='col-lg-4 col-xs-4'>
    <span class='w3-padding-16 btn w3-round w3-gray w3-hover-red filter-button' data-filter="non-confirmed" style='border:3px dashed red'>&nbsp;&nbsp;Non-confirmed&nbsp;&nbsp;</span>
</div>
</div>
<br><br>

<?php
    $counter = 0;
    foreach($users as $user) {
    ++$counter;
    // if confirmed, blue dashed
    if ($user->confirmed){
    $fullName = $user->first . ' ' . $user->last;
    $strippedName = str_replace(" ", "-", $fullName);
    echo '<div class="col-lg-4 col-sm-4 space w3-margin-bottom filter confirmed">';
    echo '<a href="'.base_url().'/admin/contactuser/'.$strippedName.'/'.$user->email.'/'.$user->confirmed.'">';
    echo '<div class="chip" style="border: 3px dashed #428BCA;">';
    echo '<img src="https://www.w3schools.com/howto/img_avatar.png" alt="'.$user->first.' '.$user->last.'" width="96" height="96">';
    echo $fullName.'<br>';
    echo $user->phone .'<br>'. $user->email;
    echo '</div>';
    echo '</a>';
    echo '</div>';
    } // if not confirmed, red dashed 
    else {
        $fullName = $user->first . ' ' . $user->last;
    $strippedName = str_replace(" ", "-", $fullName);
    echo '<div class="col-lg-4 col-sm-4 w3-margin-bottom filter non-confirmed">';
    echo '<a href="'.base_url().'/admin/contactuser/'.$strippedName.'/'.$user->email.'/'.$user->confirmed.'">';
    echo '<div class="chip " style="border: 3px dashed red;">';
    echo '<img src="https://www.w3schools.com/howto/img_avatar.png" alt="'.$user->first.' '.$user->last.'" width="96" height="96">';
    echo $user->first.' '.$user->last.'<br>';
    echo $user->phone .'<br>'. $user->email;
    echo '</div></a>';
    echo '</div>';
    }
}
