
<section id="main-content">
  <?php if(isset($userData) && count($userData)>0){ ?>
  <section class="wrapper">

    <div class="row">

      <div class="col-lg-12">

        <!--breadcrumbs start -->

        <ul class="breadcrumb">

          <li><a href="<?php echo base_url(); ?>"><i class="icon-dashboard"></i> <?php echo lang('home') ; ?></a></li>
                  <?php if(!empty($groupId) ) {
                    if($groupId == 1) { ?>
                  <li><a href=<?php echo base_url() . 'admin/users/index/1'; ?>> <?php echo lang('show_admins'); ?></a></li>
                  <li class="active"><?php echo lang('add_admin'); ?></li>

                  <?php } elseif($groupId == 2) { ?>
                  <li><a href=<?php echo base_url() . 'admin/users/index/2'; ?>> <?php echo lang('list_view').' '.lang('secretaryAdmin'); ?></a></li>
                  <li class="active"><?php echo lang('secretaryAdmin'); ?></li>

                  <?php } ?>

                  <?php
                    } else { ?>
                  <li><a href=<?php echo base_url() . 'admin/users/index' ?>> <?php echo lang('users'); ?></a></li>
                  <li class="active"><?php echo lang('edit'); ?></li>
                  <?php } ?>
        </ul>

        <!--breadcrumbs end -->

      </div>

    </div>



    <div class="row">

      <div class="col-lg-12">

        <section class="panel">

          <div class="form">

           <?php if ( $this->session->flashdata( 'msg' ) ) { ?>
           <div id="divMessage" class="<?php echo $this->session->flashdata( 'msg_class' ); ?>" >
             <?php echo $this->session->flashdata( 'msg' ); ?></div>
             <?php }  ?>

             <?php
             $attributes = array(
              'class' => 'control-label col-lg-2',
              );              ?>
              <div class="alert alert-error"><?php echo $message; ?></div>

              <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo site_url( 'admin/users/update/'.$userData->id); ?>">


                <div class="panel-body">
                  <legend><?php echo lang('User_Info'); ?></legend>
                  <div class="form-group ">
                    <?php echo form_label(lang('User_Name').'*', 'username', $attributes); ?>
                    <div class="col-lg-3">
                     <?php echo form_input($username); ?>
                   <?php echo form_error('username'); ?>
                   </div>
                 </div>

                 <div class="form-group ">
                  <?php echo form_label(lang('Password').'*', 'password', $attributes); ?>
                  <div class="col-lg-3">
                    <?php echo form_input($password); ?>
                   <?php echo form_error('password'); ?>
                  </div>
                </div>

                <div class="form-group  bottom-rest">
                  <label for="password" class="control-label col-lg-2"><?php echo lang( 'Password_confirm' ).'*'; ?> </label>
                  <div class="col-lg-6">
                    <?php echo form_input($password_confirm); ?>
                   <?php echo form_error('password_confirm'); ?>
                  </div>
                </div>

                <div class="form-group  bottom-rest">
                  <label for="password" class="control-label col-lg-2"><?php echo lang( 'Email' ); ?> *</label>
                  <div class="col-lg-6">
                   <?php echo form_input($email); ?>
                   <?php echo form_error('email'); ?>
                 </div>
               </div>
               <hr />
               <legend><?php echo lang('PersonalData'); ?></legend>

               <div class="form-group ">
                <?php echo form_label(lang('firstName').'*', 'firstname', $attributes); ?>
                <div class="col-lg-3">
                  <?php echo form_input($first_name); ?>
                   <?php echo form_error('first_name'); ?>
                </div>
                <input type="hidden" value="<?php echo base_url(); ?>" id="hiddenurl"/>
                <div class="col-lg-2"></div>
                <?php echo form_label(lang('lastName').'*', 'lastname', $attributes); ?>
                <div class="col-lg-3">
                  <?php echo form_input($last_name); ?>
                   <?php echo form_error('last_name'); ?>
                </div>
              </div>
            </div>



            <div class="col-lg-12 bottom-form-update">

              <div class="form-group">

                <div class="col-lg-offset-9 col-lg-3">

                  <?php

                  $btn_data = array(

                    'type' => 'submit',

                    'content' => lang('edit'),

                    'class' => "btn btn-success"

                    );

                  echo form_button($btn_data);

                  ?>

                  <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/users'); ?>'"><?php echo lang( 'Cancel' ) ?></button>


                </div>



              </div>





            </div>





            <?php echo form_close(); ?>

          </div>

        </section>

      </div>

    </div>

  </section>
  <?php } ?>
</section>
