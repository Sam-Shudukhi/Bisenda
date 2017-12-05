<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $header; ?>
<?php echo $dashboard; 

echo '<br><br>'; 

?>


<style type="text/css">
    @import url("//fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic");
    @import url("//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css");
    body {
		padding: 60px 0px;
		background-color: rgb(220, 220, 220);
	}
    
    .event-list {
		list-style: none;
		font-family: 'Lato', sans-serif;
		margin: 0px;
		padding: 0px;
	}
	.event-list > li {
		background-color: rgb(255, 255, 255);
		box-shadow: 0px 0px 5px rgb(51, 51, 51);
		box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.7);
		padding: 0px;
		margin: 0px 0px 20px;
	}
	.event-list > li > time {
		display: inline-block;
		width: 100%;
		color: rgb(255, 255, 255);
		background-color: rgb(197, 44, 102);
		padding: 5px;
		text-align: center;
		text-transform: uppercase;
	}
	.event-list > li:nth-child(even) > time {
		background-color: rgb(165, 82, 167);
	}
	.event-list > li > time > span {
		display: none;
	}
	.event-list > li > time > .day {
		display: block;
		font-size: 24pt;
		font-weight: 100;
		line-height: 1;
	}
	.event-list > li time > .time {
		display: block;
		font-size: 24pt;
		font-weight: 900;
		line-height: 1;
	}
	
	.event-list > li time > .status {
		display: block;
		font-size: 12pt;
		font-weight: 900;
		line-height: 1;
	}
	.event-list > li > img {
		width: 100%;
	}
	.event-list > li > .info {
		padding-top: 5px;
		text-align: center;
	}
	.event-list > li > .info > .title {
		font-size: 17pt;
		font-weight: 700;
		margin: 0 auto;
	}
	.event-list > li > .info > .desc {
		font-size: 13pt;
		font-weight: 300;
		margin: 0px;
	}
	.event-list > li > .info > ul,
	.event-list > li > .social > ul {
		display: table;
		list-style: none;
		margin: 10px 0px 0px;
		padding: 0px;
		width: 100%;
		text-align: center;
	}

	.event-list > li > .info > ul > li,
	.event-list > li > .social > ul > li {
		display: table-cell;
		cursor: default;
		color: rgb(30, 30, 30);
		font-size: 11pt;
		font-weight: 300;
        padding: 3px 0px;
	}
    .event-list > li > .info > ul > li > a {
		display: block;
		width: 100%;
		color: rgb(30, 30, 30);
		text-decoration: none;
	} 

	.event-list > li > .info > ul > li:hover,
	.event-list > li > .social > ul > li:hover {
		/*color: rgb(30, 30, 30);*/
		/*background-color: rgb(200, 200, 200);*/
	}


	@media (min-width: 768px) {
		.event-list > li {
			position: relative;
			display: block;
			width: 100%;
			height: 200px;
			padding: 0px;
		}
		.event-list > li > time,
		.event-list > li > img  {
			display: inline-block;
		}
		.event-list > li > time,
		.event-list > li > img {
			width: 200px;
			float: left;
		}
		.event-list > li > .info {
			background-color: rgb(245, 245, 245);
			overflow: hidden;
		}
		.event-list > li > time,
		.event-list > li > img {
			width: 200px;
			height: 200px;
			padding: 0px;
			margin: 0px;
		}
		.event-list > li > .info {
			position: relative;
			height: 200px;
			text-align: left;
			padding-right: 40px;
		}	
		.event-list > li > .info > .title, 
		.event-list > li > .info > .desc {
			padding: 0px 10px;
		}
		.event-list > li > .info > ul {
			position: absolute;
			left: 0px;
			bottom: 0px;
		}
	
	}
</style> 
<script>
    function cancelAppointment(rid) {
        
        cond = confirm('Once deleted you will not be able to restore your reservation');
        if (cond) {
            window.location.href = "<?php echo base_url();?>user/User/cancelAppointment/"+rid;
            alert('Removed');
        } else {
            
        }
    }
</script>

    <div class="container">
		<div class="row">
			<div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
				<ul class="event-list">

<?php
                        $status = '';
                        date_default_timezone_set("Canada/Saskatchewan");
                        $today = date('Y-m-d h:i');
                        // echo $today.'<br>';
                        $ongoing = false;
						foreach ($results as $row) {
						  //  if ($row->cancelled != 3) {
						    $businessLoacation = "$row->address, $row->city, $row->province";
		                    $Address = urlencode($businessLoacation);
                            $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
                            $xml = simplexml_load_file($request_url) or die("url not loading");
                            $status = $xml->status;
                            if ($status=="OK") 
                            {
                                $Lat = $xml->result->geometry->location->lat;
                                $Lon = $xml->result->geometry->location->lng;
                                $LatLng = "$Lat,$Lon";
                                $direction = "https://www.google.com/maps/dir//$Lat,$Lon/@$Lat,$Lon,17z/data=!3m1!4b1";
                            }
						    $appointment_date_and_time = $row->date_reserved.' '.$row->time_reserved;
						    $appointment_cancelled = $row->cancelled;
						    
                        if ($appointment_date_and_time > $today) {
                            $status = 'On-going';
                            $ongoing = true;
                        } else {
                            $status = 'Not available';
                        }
                        
                        
                        if($appointment_cancelled == '0')
                        {
                            $status2 = 'wating for approval';
                            
                        } else{
                            
                            $status2 = 'Approved';
                        }
                        
                        if ($appointment_cancelled != 3) {
						?>

					<li>
						<time>
						    <br>
							<span class="day"><?php echo $row->date_reserved ?></span><br>
							<span class="time"><?php echo $row->time_reserved ?></span><br>
							<span class = 'status'> <i class="fa fa-clock-o" aria-hidden="true"></i>:&nbsp;<?php echo $status;?></span> <br>
							<span class = 'status'><?php echo $status2;?></span>
						</time>
						<div class="info">
							<h2 class="title w3-center"><?php echo $row->title ?></h2>
							<?php if ($row->category == 'Restaurant') {?>
							<p class="desc"><?php echo "Table Type: $row->t_name" ?></p>
							<p class="desc"><?php echo "Quantity: $row->quantity" ?></p>
							<p class="desc"><a href='<?php echo $direction;?>' target='_blank'>
							<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;
                            <?php echo "$row->address, $row->city, $row->province" ?></a></p>
                            
							<p class="desc"><i class="fa fa-phone" aria-hidden="true"></i>
                            &nbsp;<?php echo "$row->phone" ?></p>
                            
							<p class="desc"><i class="fa fa-envelope" aria-hidden="true"></i>
                            &nbsp;<?php echo "$row->email" ?></p>
                            
							<?php } ?>
							<ul>
								<li style="width:50%;"><a href="<?php echo $row->website;?>" target='_blank'><span class="fa fa-globe"></span> Website</a></li>
								<li style="width:50%;">
								    <?php if ($ongoing == true) {?>
								    <span id='cancel' style='cursor:pointer' onclick='cancelAppointment(<?php echo $row->reserve_table_id;?>);'>
								    <i class="fa fa-remove" aria-hidden="true"></i>&nbsp;Cancel
								    </span>
								    
								    </li>
								    <?php } ?>
							</ul>
						</div>
					</li>

<?php
} 
}?>

				</ul>
			</div>
		</div>
	</div>




