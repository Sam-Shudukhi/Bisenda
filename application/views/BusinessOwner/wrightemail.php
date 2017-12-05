<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $managePanel;
?>
<br>
<?php
foreach($Listing as $key){

    $lname = $key->title;
    $lemail = $key->email;
}

?>

<!DOCTYPE html>
<html>
<head>
<style>
input[type=text], input[type=email], textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: none;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
</head>
<body>

<h3>Contact Form</h3>

<br>

    <?php echo $this->session->flashdata('msg'); ?>
<br>

<div class="container">
<form action="<?php echo base_url(); ?>BusinessOwner/BusinessOwner/sendEmailToUser" method="post">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                          
   
    <input type="hidden" id="name" name="name" placeholder="user name.." value='<?php echo $lname?>'>


    <input type="hidden" id="emailFrom" name="emailFrom" placeholder="user email.." value='<?php echo $lemail;?>'>
    

    <input type="hidden" id="emailTo" name="emailTo" value='<?php echo $email_to;?>'> 
    
    <!--disabled>-->

    <label for="subject">Subject</label>
    <input type="text" id="subject" name="subject" placeholder="subject..">
    
    <label for="message">Message</label>
    <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>

