<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $header; ?>
<?php echo $dashboard; 

echo '<br><br>'; 

foreach ($Results as $row) {
    $uid = $row->uid;

}


?>
<br>


        <!--++++++++++-->
        <!--messages-->
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


  <div class="container" >
    
    
   <div class="col-md-12 ">

    <div class="panel panel-default">
      <div class="panel-heading">  <h4>Broadcast Messages</h4></div>
      <div class="panel-body">
       
        <div class="box box-info">
          
          <div class="box-body">
           
             <br>
             
             <!-- /input-group -->
           </div>
           
           <?php 
           
        foreach($mail as $row){

                $message = $row->message; 
                $title = $row->title;
                
           ?>

           <div class="col-sm-10">


    <div class="col-sm-5 col-xs-6 title " >From: </div><div class="col-sm-7"> <?php echo $title;?></div>
    
    <div class="col-sm-5 col-xs-6 title " >Message: </div><div class="col-sm-7"> <?php echo $message;?></div>

             <div class="clearfix"></div>
             <div class="bot-border"></div>
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>-->


             <!-- /.box-body -->
                </div>
           <!-- /.box -->
           


    <?php } ?>
                </div>
            </div> 
        </div>
    </div>
</div> 

                <!--++++++++++++++++End of Mailbox++++++++++++++++++++++++++-->





          