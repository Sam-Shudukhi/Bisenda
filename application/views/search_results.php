
<style>
    .button {
    border: none;
    color: white;
    padding: 10px 22px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: default;
    }
</style>
<?php
	if(!empty($listings ))  
 { 
      echo '<div class="container">
                  <div class="">
                  <table class=" table">
	                <thead>
                          <tr>
		
                            
                              <th>&nbsp;</th>
                              
 		          </tr>
				   
                  </thead>
                  <tbody>
                  ';
                  
      foreach ($listings as $objects)    
	   {   
		    $businessLoacation = "$objects->address, $objects->city, $objects->province";
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
            } else {
                $direction = '';
            }
            // end get direction
            $dashedTitle = str_replace(" ", "-", $objects->title); 
            echo "<tr>";
            echo "<td>";
            echo '<div class="col-lg-12 col-sm-12 space w3-margin-bottom filter verified">';
            echo '<div class="w3-card-4" style="width:100%;border: 3px dashed #428BCA;">';
            echo '<header class="w3-container w3-light-grey">';
            echo '<h3>'.$objects->title.'<br>'.$objects->category.' ';if ($objects->verified == 1) {
              echo '&nbsp;|&nbsp;<span class="fa fa-stack fa-sm">
    <i class="fa fa-certificate fa-stack-2x" style="color: #428bca"></i>
    <i class="fa fa-check fa-stack-1x fa-inverse"></i>
</span>&nbsp;</h3>';
            } else { echo '</h3>'; }
            echo '<a class="w3-button btn-primary" href="'.base_url().'welcome/storeview/'.$dashedTitle.'bisenda'.$objects->lid.'" target="_blank">View</a>';
            if ($objects->booking == 1 || $objects->booking == 2) {
                echo '&nbsp;<a style="cursor:default;text-decoration:none;color:white"class="button w3-yellow">&nbsp;BOOKING&nbsp;</a>';
            }
            echo '&nbsp;<a href="'.$direction.'" target="_blank" style="cursor:pointer;text-decoration:none;color:white"class="button w3-green">&nbsp;Get Direction&nbsp;</a>';
            
            echo '<div class="w3-container">';
            echo '<br>';
            echo '<p>'.$objects->address.', '.$objects->city.', '.$objects->province.'</p><br>';
            echo '<p>'.$objects->phone.'   |   '.$objects->email.'</p><br>';
            echo '</div>';
            echo '<div class="w3-block w3-dark-grey"></div></a>';
            echo '</div>';
            echo '</div>';
            echo '</header>';
            echo "</td>
                </tr> ";
        } 
 }

 
 else  
 {  
      echo 'Data Not Found';  
 } 