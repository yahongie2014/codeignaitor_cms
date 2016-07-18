<?php
if (!empty($returnedData)) {
    extract((array) $returnedData);
}else {
  $id = '';
}
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
          <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang( 'home' ); ?></a></li>

          <li><a href="<?php echo base_url().'admin/trainees/'; ?>"><?php echo lang( 'trainees' ); ?></a></li>
          <li class="active"><?php if(!empty($returnedData)) { echo lang( 'edit' ); } else{ echo lang('add_new'); } ?></li>

        </ul>
        <!--breadcrumbs end -->
      </div>
    </div>
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
         <!-- Form Start -->
         <div class="form">

           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/trainees/form/'.$id)?>">

          <div class="panel-body">

            <div class="tab-content">
                    <h3><?php echo lang('traineeData'); ?></h3>
                <div class="form-group ">
                  <label for="name" class="control-label col-lg-2"><?php echo lang( 'Name' ); ?>   *</label>
                  <div class="col-lg-6">
                    <input class="form-control" id="name" name="name" value="<?php echo !empty($name) ?  $name : set_value('name'); ?>" type="text" />
                  </div>
                  <div class="col-lg-4"><?php echo form_error('name');?></div>
                </div>


                    <?php if (!$this->admin_ion_auth->in_group(array('secretary'))) { ?>
                <div class="form-group ">
                  <label for="phone" class="control-label col-lg-2"><?php echo lang( 'Phone' ); ?>   *</label>
                  <div class="col-lg-6">
                    <input class="form-control" id="phone" name="phone" value="<?php echo !empty($phone) ?  $phone : set_value('phone'); ?>" type="text" />
                  </div>
                  <div class="col-lg-4"><?php echo form_error('phone');?></div>
                </div>
                <?php } // if permission ?>



                <div class="form-group ">
                  <label for="email" class="control-label col-lg-2"><?php echo lang( 'Email' ); ?>   *</label>
                  <div class="col-lg-6">
                    <input class="form-control" id="email" name="email" value="<?php echo !empty($email) ?  $email : set_value('email'); ?>" type="text" />
                  </div>
                  <div class="col-lg-4"><?php echo form_error('email');?></div>
                </div>


                <div class="form-group ">
                  <label for="college_work" class="control-label col-lg-2"><?php echo lang( 'college_work' ); ?>   *</label>
                  <div class="col-lg-6">
                    <input class="form-control" id="college_work" name="college_work" value="<?php echo !empty($college_work) ?  $college_work : set_value('college_work'); ?>" type="text" />
                  </div>
                  <div class="col-lg-4"><?php echo form_error('college_work');?></div>
                </div>

            </div>
            <br>

            </div>

            <div class="col-lg-12 bottom-form-update">

              <div class="form-group">

                <div class="col-lg-offset-9 col-lg-3">

                  <button class="btn btn-success" type="submit"><?php echo lang('Save'); ?></button>

                  <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/trainees'); ?>'"><?php echo lang( 'Cancel' ); ?></button>

                </div>

              </div>

            </div>

          </form>

        </div>
      </section>

    </div>

  </div>

  <!-- page end-->

</section>

</section>