<?php
if (!empty($returnedData)) {
    extract((array) $returnedData);
}else {
  $id = '';
} ?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
          <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang( 'home' ); ?></a></li>
          <li><a href="<?php echo base_url().'admin/packages'; ?>"><?php echo lang( 'packages' ); ?></a></li>
          <li><a href="<?php echo base_url().'admin/packages/packageData/'.$packageId; ?>"><?php echo lang( 'courses' ); ?></a></li>
          <li><a href="<?php echo base_url().'admin/packages/courseModules/'.$packageId.'/'.$courseId; ?>"><?php echo lang( 'course_modules' ); ?></a></li>
          <li class="active"><?php if(!empty($returnedData)){ echo lang( 'edit' ); } else{ echo lang('add_new'); } ?></li>
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

           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/packages/module/'.$packageId.'/'.$courseId.'/'.$id)?>">

          <div class="panel-body">

            <div class="tab-content">

                    <div class="form-group ">
                      <label for="project-title-en" class="control-label col-lg-2"><?php echo lang( 'arabic_title' ); ?>   *</label>
                      <div class="col-lg-6">
                        <input class=" form-control" id="titleAR" name="titleAR" value="<?php echo !empty($titleAR) ?  $titleAR : set_value('titleAR');   ?>" type="text" />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('titleAR');?></div>
                    </div>

                    <div class="form-group ">
                      <label for="project-title-en" class="control-label col-lg-2"><?php echo lang( 'german_title' ); ?>   *</label>
                      <div class="col-lg-6">
                        <input class=" form-control" id="titleEN" name="titleEN" value="<?php echo !empty($titleEN) ?  $titleEN : set_value('titleEN');   ?>" type="text" />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('titleEN');?></div>
                    </div>


                <div class="form-group ">
                  <label for="duration" class="control-label col-lg-2"><?php echo lang( 'duration' ); ?>   *</label>
                  <div class="col-lg-6">
                    <input class="form-control" id="duration" name="duration" value="<?php echo !empty($duration) ?  $duration : set_value('duration');   ?>" type="number" min="0" step="any"/>
                    <?php echo form_error('duration');?>
                  </div>
                  <div class="col-lg-4">
                    <select name="durationText" id="durationText" class=" form-control" >
                      <option value='hours' <?php echo set_select('durationText', 'hours', ( !empty($durationText) && $durationText == "hours" ? TRUE : FALSE )); ?> > <?php echo lang('hours'); ?> </option>
                      <option value='days' <?php echo set_select('durationText', 'days', ( !empty($durationText) && $durationText == "days" ? TRUE : FALSE )); ?> > <?php echo lang('days'); ?> </option>
                      <option value='months' <?php echo set_select('durationText', 'months', ( !empty($durationText) && $durationText == "months" ? TRUE : FALSE )); ?> > <?php echo lang('months'); ?> </option>
                    </select>
                  </div>
                </div>

            </div>
            <br>

            </div>

            <div class="col-lg-12 bottom-form-uptitleAR">

              <div class="form-group">

                <div class="col-lg-offset-9 col-lg-3">

                  <button class="btn btn-success" type="submit"><?php echo lang('Save') ?></button>

                  <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo base_url().'admin/packages/courseModules/'.$packageId.'/'.$courseId; ?>'"><?php echo lang( 'Cancel' ) ?></button>

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