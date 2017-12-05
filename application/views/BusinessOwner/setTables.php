<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php 
// echo $header;
// echo $dashboard;
echo $managePanel;
?>

<style>
.center{
width: 300px;
  margin: 40px auto; 
}
</style>

<div class="container">
<div class="wrapper">


<?php

// echo "from myListing: " . $bid;
//echo "business_id = $business_id";

foreach($Listing as $tuple){
    $lid = $tuple->lid;
    $bid = $tuple->bid;
}

$tablesExist=$amount1=$amount2=$amount3=$amount4=0;
if (!empty($tables)) {
foreach($tables as $key) {
    if ($key->table_type == 1) {
        $amount1 = $key->amount;
    } else if ($key->table_type == 2) {
        $amount2 = $key->amount;
    } else if ($key->table_type == 3) {
        $amount3 = $key->amount;
    } else if ($key->table_type == 4) {
        $amount4 = $key->amount;
    }
}
$tablesExist = 1;
} 
// else {
    
//     $amount1=$amount2=$amount3=$amount4=0;
// }
?>

  </div>
</div>


<div class="center" >
<div class="well form-horizontal">



<form action="<?php echo base_url(); ?>BusinessOwner/BusinessOwner/numberOfTables/<?php echo $lid.'/'.$tablesExist;?>" method="post" class="form-horizontal">
<fieldset>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<!-- <input name ="lid" id="lid" value="<?php echo $lid; ?>" type="hidden"> -->
<?php 
if (!empty($tables)) {
foreach($tables as $key) {
    ?>
    <input name ="rids[]" id="lid" value="<?php echo $key->rid; ?>" type="hidden">
    <?php
}
}
?>
<h2># of tables</h2>




<div class="form-group">
  <label class="col-md-4 control-label">4 Seater</label>  
  <div class="inputGroupContainer">
  <div class="input-group">
  <span class="input-group-btn">
      <button type="button" class="btn btn-default btn-number"  data-type="minus" data-field="4seater">
          <span class="glyphicon glyphicon-minus"></span>
      </button>
  </span>
  <input type="text" name="4seater" id="4seater" class="form-control input-number" value="<?php echo $amount1;?>" min="0" max="25">
  <span class="input-group-btn">
      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="4seater">
          <span class="glyphicon glyphicon-plus"></span>
      </button>
  </span>
</div>
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label">2 Seater</label>  
  <div class="inputGroupContainer">
  <div class="input-group">
  <span class="input-group-btn">
      <button type="button" class="btn btn-default btn-number"  data-type="minus" data-field="2seater">
          <span class="glyphicon glyphicon-minus"></span>
      </button>
  </span>
  <input type="text" name="2seater" class="form-control input-number" value="<?php echo $amount2;?>" min="0" max="25">
  <span class="input-group-btn">
      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="2seater">
          <span class="glyphicon glyphicon-plus"></span>
      </button>
  </span>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Booth</label>  
  <div class="inputGroupContainer">
  <div class="input-group">
  <span class="input-group-btn">
      <button type="button" class="btn btn-default btn-number"  data-type="minus" data-field="booth">
          <span class="glyphicon glyphicon-minus"></span>
      </button>
  </span>
  <input type="text" name="booth" class="form-control input-number" value="<?php echo $amount3;?>" min="0" max="25">
  <span class="input-group-btn">
      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="booth">
          <span class="glyphicon glyphicon-plus"></span>
      </button>
  </span>
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label">Bar</label>  
  <div class="inputGroupContainer">
  <div class="input-group">
  <span class="input-group-btn">
      <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="bar">
          <span class="glyphicon glyphicon-minus"></span>
      </button>
  </span>
  <input type="text" name="bar" class="form-control input-number" value="<?php echo $amount4;?>" min="0" max="25">
  <span class="input-group-btn">
      <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="bar">
          <span class="glyphicon glyphicon-plus"></span>
      </button>
  </span>
    </div>
  </div>
</div>


                            <div class="form-group"> 
                                <div class="row">
                                    <div class="col-sm-offset-5 col-sm-3  btn-submit">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </div>

</fieldset>
</form>



</div>
</div>



<script>
//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>