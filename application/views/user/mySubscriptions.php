<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $header; ?>
<?php echo $dashboard; 

echo '<br><br>'; 

$page_url = $this->uri->slash_segment(4, 'leading');
//echo $page_url;
foreach ($Results as $row) {
    $uid = $row->uid;

}


?>
<br>


        <!--++++++++++-->
        <!--mySubscriptions-->
        <!--++++++++++-->


<style type="text/css">
  input.hidden {
    position: absolute;
    left: -9999px;
  }

  #profile-image1 {
    cursor: pointer;
    
    width: 100px;
    height: 100px;
    border:2px solid #03b1ce ;}
    .tital{ font-size:16px; font-weight:500;}
    .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}  
    

  </style>

<script>
    function unsub(uid,lid,url) {
        
        cond = confirm('Once unsubscribed you will not be able to receive deals or messages from this business');
        if (cond) {
            window.location.href = '<?php echo base_url().'user/User/unsubscribeFromListing/';?>'+uid+'/'+lid+'/'+url;
        } else {
            
        }
    }
</script>

  <div class="container" >
    
    
   <div class="col-md-12">

    <div class="panel panel-default">
      <div class="panel-heading">  <h4>Subscriptions</h4></div>
      <div class="panel-body">
       
        <div class="box box-info">
          
          <div class="box-body">
           
             <br>
             
             <!-- /input-group -->
           </div>
           
           <?php 
    if(!empty($list)){

        foreach($list as $row){
                $lid = $row->lid;
                $date_joined = $row->date_added; 
                $title = $row->title;
                $phone = $row->phone;
                $address = $row->address;
                $city = $row->city;
                $province = $row->province;
           ?>

           <div class="col-sm-10">
<form>
    
    
<div class="bg-info clearfix">
  <div class="col-sm-12">Store: <?php echo $title;?></div>
    <div class="col-sm-12">Date Subscribed: <?php echo $date_joined;?></div>
    <div class="col-sm-12">Address: <?php echo $address;?></div>
    <div class="col-sm-12">City: <?php echo $city;?></div>
    <div class="col-sm-12">Province: <?php echo $province;?></div>
    
     <!--<button  class="btn btn-secondary">Unsub</button>-->
     
     <span  class="btn btn-default" onclick='unsub("<?php echo $uid;?>","<?php echo $lid;?>","<?php echo $page_url;?>");' style='cursor:pointer;'>unsub</span>

</form>
</div>


             <div class="clearfix"></div>
             <div class="bot-border"></div>

             <!-- /.box-body -->
                </div>
           <!-- /.box -->
           


    <?php 
    } 
    
    }
    else{
        echo "<h2>You are not subscribed to any store! ^_^</h2>";
    }
    ?>
                </div>
            </div> 
        </div>
    </div>
</div> 

                <!--++++++++++++++++End of Mailbox++++++++++++++++++++++++++-->





          