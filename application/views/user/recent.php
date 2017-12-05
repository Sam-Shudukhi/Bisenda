<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $header; ?>
<?php echo $dashboard; 

echo '<br><br>'; 

?>

<style type="text/css">

/*@import url(http://fonts.googleapis.com/css?family=Open+Sans);*/

.activity-feed {
  padding: 15px;
}
.activity-feed .feed-item {
  position: relative;
  padding-bottom: 20px;
  padding-left: 30px;
  border-left: 2px solid #e4e8eb;
}
.activity-feed .feed-item:last-child {
  border-color: transparent;
}
.activity-feed .feed-item:after {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: -6px;
  width: 10px;
  height: 10px;
  border-radius: 6px;
  background: #fff;
  border: 1px solid #f37167;
}
.activity-feed .feed-item .date {
  position: relative;
  top: -5px;
  color: #8c96a3;
  text-transform: uppercase;
  font-size: 13px;
}
.activity-feed .feed-item .text {
  position: relative;
  top: -3px;
}

</style>


<h2>Recent</h2>
<div class="activity-feed">
  <div class="feed-item">
    <div class="date">Sep 25</div>
    <div class="text">Responded to need <a href="single-need.php">“Volunteer opportunity”</a></div>
  </div>
  <div class="feed-item">
    <div class="date">Sep 24</div>
    <div class="text">Added an interest “Volunteer Activities”</div>
  </div>
  <div class="feed-item">
    <div class="date">Sep 23</div>
    <div class="text">Joined the group <a href="single-group.php">“Boardsmanship Forum”</a></div>
  </div>
  <div class="feed-item">
    <div class="date">Sep 21</div>
    <div class="text">Responded to need <a href="single-need.php">“In-Kind Opportunity”</a></div>
  </div>
  <div class="feed-item">
    <div class="date">Sep 18</div>
    <div class="text">Created need <a href="single-need.php">“Volunteer Opportunity”</a></div>
  </div>
  <div class="feed-item">
    <div class="date">Sep 17</div>
    <div class="text">Attending the event <a href="single-event.php">“Some New Event”</a></div>
  </div>
</div>

