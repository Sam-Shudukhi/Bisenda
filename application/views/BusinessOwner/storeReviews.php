<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<?php 
// print_r($storeReviews);
?>
<style>
    .glyphicon-star {
  color:gold;
}
.glyphicon-calendar {
  padding-left:20px;
}
.fa-facebook-official {
  color:#3b5998;;
}
.fa-twitter-square {
  color:#00aced;
}
.fa-google-plus {
  color: #dd4b39;    
}
</style>


    <?php 
    if (!empty($storeReviews)) {
        echo '<div class="container">
                <h1>Customer Reviews</h1>';
        foreach($storeReviews as $review) {
            $originalDate = $review->date_added;
            $newDate = date("Y-m-d h:i", strtotime($originalDate));
            ?>
              <div class="row-fluid w3-center centered" style="margin: 0 auto;"> 
      <div class="col-sm-12 w3-center centered" style="margin: 0 auto;">
        <div class="panel panel-default">
        <div class="panel-heading">
          <span itemscope itemtype="http://schema.org/Review">
          <h3 class="panel-title" itemprop="name"><?php echo $review->first . $review->last;?></h3>
        </div><!--/panel-heading-->
        <div class="panel-body" itemprop="reviewBody">
            <p><?php echo $review->comment;?></p>
            <span itemprop="author" itemscope itemtype="http://schema.org/Person">
            <small>
            <span itemprop="name"><?php echo $review->first . $review->last;?> Reviewer</span>
          </span><!--/author schema -->
          <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            <meta itemprop="datePublished" content="01-01-2016"><?php echo $newDate;?>
            <span class="pull-right">
            <span class="reviewRating" itemscope itemtype="http://schema.org/Rating">
              <meta itemprop="worstRating" content="1">
                <span itemprop="ratingValue"><?php echo $review->rate;?></span> / 
              <span itemprop="bestRating"> stars </span>
            </span><!--/reviewRating-->
            <?php if ($review->rate == 1) {
                echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
            } else if ($review->rate == 2) {
                echo 
                '
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                ';
            } else if ($review->rate == 3) {
                echo 
                '
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                ';
            } else if ($review->rate == 4) {
                echo 
                '
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                ';
            } else if ($review->rate == 5) {
                echo 
                '
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                ';
            }
            ?>
          </small>
        </div><!--/panel-body-->
        <div class="panel-footer clearfix">
            <br>
        </div><!--/panel-footer-->
      </div><!--/panel-->
      </div><!--/col-sm-12-->
  </div><!--/row -->

  
            <?php
            
        }
       echo '</div>'; //<!--/container-->
    }
    ?>

        
        
          

          

            
            
            