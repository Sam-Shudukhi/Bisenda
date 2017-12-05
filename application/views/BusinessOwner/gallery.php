<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo $header; ?>
<?php echo $dashboard; ?>



<?php


//print_r($allData);

foreach ($Listing as $row)
{
    $lid = $row->lid;
    // echo "<br>" . $lid;
}




?>

<!--++++++++++++++++++++++++++++++++++++-->
<!--++++++++++++++GALLERY++++++++++++++++-->


    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
 
<style type="text/css">
#loader{display: none}
#preview{display: none}

body {
    min-height: 100vh;
    font: normal 16px sans-serif;
    padding: 40px 0;
}

.container.gallery-container {
    background-color: #eee;
    color: #35373a;
    min-height: 100vh;
    padding: 30px 50px;
}

.gallery-container h1 {
    text-align: center;
    margin-top: 50px;
    font-family: 'Droid Sans', sans-serif;
    font-weight: bold;
}

.gallery-container p.page-description {
    text-align: center;
    margin: 25px auto;
    font-size: 18px;
    color: #999;
}

.tz-gallery {
    padding: 40px;
}

/* Override bootstrap column paddings */
.tz-gallery .row > div {
    padding: 2px;
}

.tz-gallery .lightbox img {
    width: 100%;
    border-radius: 0;
    position: relative;
    max-height: 300px;
    min-height: 300px;

}

.tz-gallery .lightbox:before {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -13px;
    margin-left: -13px;
    opacity: 0;
    color: #fff;
    font-size: 26px;
    font-family: 'Glyphicons Halflings';
    content: '\e003';
    pointer-events: none;
    z-index: 9000;
    transition: 0.4s;
}


.tz-gallery .lightbox:after {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    background-color: rgba(46, 132, 206, 0.7);
    content: '';
    transition: 0.4s;
}

.tz-gallery .lightbox:hover:after,
.tz-gallery .lightbox:hover:before {
    opacity: 1;
}

.baguetteBox-button {
    background-color: transparent !important;
}

@media(max-width: 768px) {
    body {
        padding: 0;
    }
}
</style>

<div class="container">
    <div class="row clear-fix">
    <div class="col-md-12">
    
              <?php echo form_open_multipart('BusinessOwner/BusinessOwner/uploadImage'); ?>


<?php  echo $this->session->flashdata('error'); ?>
<input name ="lid" id="lid" value="<?php echo $lid; ?>" type="hidden">

                
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
    <div class="form-group" style="background: #f5f5f5">
    <label for="">Choose image</label>
    <input type="file" name="userfile" id="userfile">
    </div>
    
    <div class="form-group">

    <input type="submit" class="btn btn-info btn-block" style="width: 200px;" value="Add">
    </div>
    
    <div class="form-group">
    <img id="loader" src="#" style="height: 30px;">
    </div>
    <br>
    <div class="form-group">
    <img id="preview" src="#"/>
    </div>
    
    </form>
    
    </div>
    </div>
    
    <div class="row clear-fix">
    <div class="col-md-12">
    <div id="response">
    </div>  
    </div>
    </div>
    <div class="row clear-fix">
    <div class="col-md-12">
    <div style="margin-top: 1%;">
        
    <!--<blockquote>-->
    <!--<ul class="list-inline"  id="gallery">-->
    <!--</ul>-->
    <!--</blockquote>-->
</div>  
</div>
</div>
</div>


<div class="container gallery-container">

    <h1>Gallery</h1>


    <div class="tz-gallery">

        <div class="row">
            
            
<?php
                            echo $this->session->flashdata('msg_deleteImage');
if(empty($gallery) == FALSE){
    
    
// get photos
    foreach ($gallery as $row)
    {
    
    // echo "<br>" . $lid;


?>
            <div class="w3-third">

            <div class="col-sm-12 col-md-12 w3-margin-bottom">
                
                <a class="lightbox" href="<?php echo '/uploads/' . $row->image; ?>">
                    <img src="<?php echo '/uploads/' .  $row->image;?>">
                </a>
        </div> 
           
            <a href="<?php echo base_url() ;?>BusinessOwner/BusinessOwner/deleteImage/<?php echo $row->gid; ?>">Delete</a>
        </div>



    <?php  }
    
}
else{
    
    echo "No pictures found";


    }
?>
        </div>

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>


