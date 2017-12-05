<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  <title><?php echo $title?></title>
  
  <style>
    body {
      background-color: #eee;
    }

    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 10px;
    }
    .form-signin .checkbox {
      font-weight: normal;
    }
    .form-signin .form-control {
      position: relative;
      height: auto;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      padding: 10px;
      font-size: 16px;
    }
    .form-signin .form-control:focus {
      z-index: 2;
    }
    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

  </style>




  <div class="container">
    <?php $attributes = array("class" => "form-horizontal", "id" => "adminloginform", "name" => "adminloginform");
    echo form_open("Admin/index", $attributes);
    ?>
    <form class="form-signin">
      <h2 class="form-signin-heading">Administration!</h2>
      <label for="txt_email" class="sr-only">Email address</label>
      <input class="form-control" id="txt_email" name="txt_email" placeholder="Email address" type="text" value="<?php echo set_value('txt_email'); ?>" required autofocus />
      <span class="text-danger"><?php echo form_error('txt_email'); ?></span>
      
      <label for="txt_password" class="control-label">Password</label>
      <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>" />
      <span class="text-danger"><?php echo form_error('txt_password'); ?></span>

      <div class="checkbox">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      
      <button id="btn_login" name="btn_login" class="btn btn-lg btn-primary btn-block" type="submit" value="Login">Sign in</button>


      <?php echo form_close(); ?>
      <?php echo $this->session->flashdata('msg'); ?>


    </form>
  </div>


  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="application/assets/js/ie10-viewport-bug-workaround.js"></script>
  
  <br><br>
  <?php require 'application/views/footer.php';
