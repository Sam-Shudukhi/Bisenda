<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
echo $contactsPanel;
?>
<br><br><br>
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

<div class='row'>
<div class='col-lg-4 col-xs-4'>
    <span class='w3-padding-16 btn w3-round w3-gray w3-hover-blue filter-button' data-filter='all' style='border:3px dashed #428BCA;border:3px dashed white'>&nbsp;&nbsp;
        All Businesses&nbsp;&nbsp;
    </span>
</div>
<div class='col-lg-4 col-xs-4'>
    <span class='w3-padding-16 btn w3-round w3-gray w3-hover-dark-gray filter-button' data-filter="verified" style='border:3px dashed #428BCA'>&nbsp;&nbsp;Verified&nbsp;&nbsp;</span>
</div>
<div class='col-lg-4 col-xs-4'>
    <span class='w3-padding-16 btn w3-round w3-gray w3-hover-red filter-button' data-filter="non-verified" style='border:3px dashed red'>&nbsp;&nbsp;Non-verified&nbsp;&nbsp;</span>
</div>
</div>
<br><br>
<?php 
foreach ($stores as $business) {
    // if verified, blue dashed
    if ($business->verified){
    $businessTitle = $business->title;
    $dashedTitle = str_replace(" ", "-", $businessTitle);
    echo '<div class="col-lg-4 col-sm-4 space w3-margin-bottom filter verified">';
    echo '<div class="w3-card-4" style="width:100%;border: 3px dashed #428BCA;">';
    echo '<header class="w3-container w3-light-grey">';
    echo '<h3>'.$businessTitle.'<br>'.$business->category.'</h3>';
    echo '<a class="w3-button btn-primary" href="'.base_url().'welcome/storeview/'.$dashedTitle.'bisenda'.$business->lid.'" target="_blank">View</a>';
    echo '</header>';
    echo '<div class="w3-container">';
    echo '<br>';
    echo '<img src="https://www.w3schools.com/howto/img_avatar.png" alt="'.$businessTitle.'" class="w3-left w3-circle w3-margin-right" style="width:60px">';
    echo '<p>'.$business->address.', '.$business->city.', '.$business->province.'</p><br>';
    echo '<p>'.$business->phone.'   |   '.$business->email.'</p><br>';
    echo '</div>';
    echo '<a href="'.base_url().'/admin/contactbusiness/'.$dashedTitle.'/'.$business->email.'/'.$business->verified.'" style="color:white"><div class="w3-button w3-block w3-dark-grey">Contact</div></a>';
    echo '</div>';
    echo '</div>';
    } // if not verified, red dashed
    // if verified, blue dashed
    else {
    $businessTitle = $business->title;
    $dashedTitle = str_replace(" ", "-", $businessTitle);
    echo '<div class="col-lg-4 col-sm-4 space w3-margin-bottom filter non-verified">';
    echo '<div class="w3-card-4" style="width:100%;border: 3px dashed red;">';
    echo '<header class="w3-container w3-light-grey">';
    echo '<h3>'.$businessTitle.'<br>'.$business->category.'</h3>';
    echo '<a class="w3-button btn-primary" href="'.base_url().'welcome/storeview/'.$dashedTitle.'bisenda'.$business->lid.'" target="_blank">View</a>';
    echo '</header>';
    echo '<div class="w3-container">';
    echo '<br>';
    echo '<img src="https://www.w3schools.com/howto/img_avatar.png" alt="'.$businessTitle.'" class="w3-left w3-circle w3-margin-right" style="width:60px">';
    echo '<p>'.$business->address.', '.$business->city.', '.$business->province.'</p><br>';
    echo '<p>'.$business->phone.'   |   '.$business->email.'</p><br>';
    echo '</div>';
    echo '<a href="'.base_url().'/admin/contactbusiness/'.$dashedTitle.'/'.$business->email.'/'.$business->verified.'" style="color:white"><div class="w3-button w3-block w3-dark-grey">Contact</div></a>';
    echo '</div>';
    echo '</div>';
    }
}