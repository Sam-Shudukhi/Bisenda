<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
<style>

.coupon {
    
    width: 80%;
    border-radius: 15px;
    margin: 0 auto;
    max-height: 50%;
    font-family: Arial;
}

.container {
    padding: 2px 16px;
    background-color: #f1f1f1;
    
}

.border {
    border: 5px dotted #428BCA;
}

.promo {
    background: #ccc;
    padding: 3px;
}

.expire {
    color: red;
}
</style>
</head>
<body>
     <?php 
        date_default_timezone_set('Canada/Saskatchewan');
        $today = date('Y-m-d');
        if (!empty($storeDeals)) {?>
    
     <div style="height: 500px; overflow-y: scroll;">
    <?php
       
            foreach($storeDeals as $deal) {
                // if no expiry date is specified
                if ($deal->expiry == '0000-00-00') { 
                    $open = true; 
                    $expired = false;
                    $going = false;
                    $expiresToday = false;
                }
                // if is going 
                if ($deal->expiry != '0000-00-00' && $deal->expiry >= $today) {
                    $going = true;
                    $open = false;
                    $expired = false;
                    $expiresToday = false;
                }
                // if expires today 
                if ($deal->expiry == $today) {
                    $expiresToday = true;
                    $going = false;
                    $open = false;
                    $expired = false;
                }
                // if expired already
                if ($deal->expiry != '0000-00-00' && $deal->expiry != $today && $deal->expiry < $today) {
                    $expired = true;
                    $going = false;
                    $open = false;
                    $expiresToday = false;
                }
                
                if (!$expired) {
                 
                
            ?>
                <div class="coupon w3-margin-bottom">
            <div class="container border">
                <h3><?php echo $deal->deal_name;?></h3>
                <div class="" style="background-color:white">
                    <h2><b><?php echo $deal->discount;?></b></h2> 
                    <p><?php echo $deal->deal_info;?>.</p>
                </div>
                <p>Use Promo Code: <span class="promo"><?php echo $deal->promo_code;?></span></p>
                <p class="expire">Expires: <?php if($deal->expiry == '0000-00-00'){ echo '-';} else echo $deal->expiry;?></p>
            </div>
        </div>
            <?php }
            }
            // }
        ?>
        
    </div> <!-- end scroll view -->
    <?php }
        ?>
</body>
</html> 

