<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo $header; ?>
<?php echo $dashboard; ?>



<?php



foreach ($Listing as $row)
{
    $lid = $row->lid;

}



?>

<style>

.header {
    color: #36A0FF;
    font-size: 27px;
    padding: 10px;
}

.bigicon {
    font-size: 35px;
    color: #36A0FF;
}    
    
    
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                
        <?php 
        if($SubsNum == 0){
            
            echo "<h1>No Subscribers yet!</h1>";
        }
        else{ ?>
            <form class="form-horizontal" action="<?php echo base_url();?>BusinessOwner/BusinessOwner/broadcastMessage" method="post">
                    <input name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" type="hidden">
                    
                    <input name ="lid" id="lid" value="<?php echo $lid; ?>" type="hidden">

                    <fieldset>
                <legend class="text-center header">Broadcast a Message to Your Subscribers</legend>
                            
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="message" name="message" value="" rows="7" required></input>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                    
                </form>
        
        <?php
                            echo $this->session->flashdata('broadcast');

        }
        ?>
                
            </div>
        </div>
    </div>
</div>

<br><br>
