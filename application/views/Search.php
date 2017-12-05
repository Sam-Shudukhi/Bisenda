<script>
$(document).ready(function(){
   $("#search").keyup(function(){
       var str=  $("#search").val();
       if(str == "") {
               $( "#txtHint" ).html("<b>information will be listed here...</b>"); 
       }else {
               $('#txtHint').html('<i class="fa fa-spinner fa-spin w3-jumbo w3-text-blue" aria-hidden="true"></i>');
               $.get( "<?php echo base_url();?>welcome/search?id="+str, function( data ){
                   $( "#txtHint" ).html( data );  
            });
       }
   });  
});  
</script>

<div class="container">
    
 <!-- search box container starts  -->
 
    <div class="search">
        <div class="space"></div>
  <form action="" method="get">
    
      <div class="row">
       <div class="col-lg-10 col-lg-offset-1">
        <div class="input-group">
            
            <span class="input-group-addon" >SEARCH</span>
  <input autocomplete="off" id="search"  type="text" class="form-control input-lg" placeholder="Search store name" >
   
        </div>
       </div>
      </div>   
      <div class="space"></div>
  </form>
     </div>  
  <!-- search box container ends  -->
  
    
     <div id="txtHint" style="padding-top:50px; text-align:center;width:100%" ><b class='w3-text-white'>Business information will be listed here...</b></div>
     
</div>
<script>
// above script codes... 
</script>