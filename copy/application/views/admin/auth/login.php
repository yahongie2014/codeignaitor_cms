

    <div class="container">
        <img style="display: block;margin: 0 auto;" src="<?php echo base_url(); ?>img/login-logo.png" class="signin-logo" />
      <form class="form-signin" action="<?php echo base_url(); ?>admin/auth/login" method="post">
        <h2 class="form-signin-heading"><?php echo lang('welcome'); ?></h2>

        <div class="login-wrap">
           <div id="infoMessage"><?php if(isset($message) && !empty($message))echo $message; ?></div>

    
            <!-- <input type="text" class="form-control" placeholder="User ID" autofocus> -->
             <?php echo form_input($identity); ?>
            <!-- <input type="password" class="form-control" placeholder="Password"> -->
             <?php echo form_input($password); ?>
            <label class="checkbox">
                <!-- <input type="checkbox" value="1" name="remember" id="remember"> --> <?php echo lang('remember_me') ?>
                <!-- <span class="pull-right"> <a href="#"> Forgot Password?</a></span> -->
                  <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit"><?php echo lang('Sign_in'); ?></button>
             <!-- <p><?php echo form_submit('submit', 'Login'); ?></p> -->


   

        </div>
      </form>

    </div>

