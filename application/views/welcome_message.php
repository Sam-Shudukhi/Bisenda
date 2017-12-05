<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
	function getSearchType(type) {
		alert(type);
	}
	function getSrachQ(q) {
		$('#searchResult').html('You Searched: '+q);
	}
</script>
<style> 
/* // search input  */

body {
    background: url('https://media.expedia.com/media/content/shared/images/travelguides/Regina-4053-smallTabletRetina.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}

#custom-search-input{
    padding: 3px;
    border: solid 1px #E4E4E4;
    border-radius: 6px;
    background-color: #fff;
}

#custom-search-input input{
    border: 0;
    box-shadow: none;
}

#custom-search-input button{
    margin: 2px 0 0 0;
    background: none;
    box-shadow: none;
    border: 0;
    color: #666666;
    padding: 0 8px 0 10px;
    border-left: solid 1px #ccc;
}

#custom-search-input button:hover{
    border: 0;
    box-shadow: none;
    border-left: solid 1px #ccc;
}

#custom-search-input .glyphicon-search{
    font-size: 23px;
}
</style>
<div class="hero-unit">
<div class='w3-row'>
<div class='w3-col l6 w3-container' >
<h1 style='color:#00477e;'> Welcome to Bisenda - </h1>
</div></div>
<div class='w3-row'>
	<div class='w3-col l9 w3-container w3-center' >
<h3 style='color:#00477e'><span style='color:white;'>{</span> Start up the <span style='color:red;text-decoration:underline;'><b>right</b></span> way <span style='color:white;'>}</span></h3>
</div></div>
</div>
<br>
<br><br><br>

<?php echo $search;?>

<br>
<br>
<div id='searchResult'><div>
<br>

<?php require 'application/views/footer.php';