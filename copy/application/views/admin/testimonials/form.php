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
          <li><a href="<?php echo base_url().'admin/testimonials'; ?>"><?php echo lang( 'testimonials' ); ?></a></li>
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
           <?php //if(!empty($message)) echo $message; ?>
           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/testimonials/form/'.$id); ?>">

            <!-- tabbed header -->

            <header class="panel-heading tab-bg-dark-navy-blue tab-right ">

              <ul class="nav nav-tabs pull-right">

                <li class="active">

                  <a data-toggle="tab" href="#home-36">

                   <?php echo lang( 'arabic' ); ?>

                 </a>

               </li>

               <li class="">

                <a data-toggle="tab" href="#about-36">

                  <?php echo lang( 'german' ); ?>

                </a>

              </li>

            </ul>
          </header>

          <!-- tabbed content -->
            <div class="panel-body">

                <div class="tab-content">
                    <!-- arabic -->

                    <div id="home-36" class="tab-pane active">
                        <div class="form-group ">
                          <label for="nameAR" class="control-label col-lg-2"><?php echo lang( 'Name' ); ?>   *</label>
                          <div class="col-lg-6">
                            <input class=" form-control" id="nameAR" name="nameAR" value="<?php echo !empty($nameAR) ?  $nameAR : set_value('nameAR'); ?>" type="text" />
                          </div>
                          <div class="col-lg-4"><?php echo form_error('nameAR');?></div>
                        </div>

                        <div class="form-group ">
                          <label for="testimonialAR" class="control-label col-lg-2"><?php echo lang( 'content' ); ?>   *</label>
                          <div class="col-lg-6">
                            <textarea class=" form-control" id="testimonialAR" name="testimonialAR"><?php echo !empty($testimonialAR) ?  $testimonialAR : set_value('testimonialAR'); ?> </textarea>
                          </div>
                          <div class="col-lg-4"><?php echo form_error('testimonialAR');?></div>
                        </div>
                    </div>


                    <!-- german -->
                    <div id="about-36" class="tab-pane">
                        <div class="form-group ">
                          <label for="nameGE" class="control-label col-lg-2"><?php echo lang( 'Name' ); ?>   *</label>
                          <div class="col-lg-6">
                            <input class=" form-control" id="nameGE" name="nameGE" value="<?php echo !empty($nameGE) ?  $nameGE : set_value('nameGE'); ?>" type="text" />
                          </div>
                          <div class="col-lg-4"><?php echo form_error('nameGE');?></div>
                        </div>

                        <div class="form-group ">
                          <label for="testimonialGE" class="control-label col-lg-2"><?php echo lang( 'content' ); ?>   *</label>
                          <div class="col-lg-6">
                            <textarea class=" form-control" id="testimonialGE" name="testimonialGE"><?php echo !empty($testimonialGE) ?  $testimonialGE : set_value('testimonialGE'); ?> </textarea>
                          </div>
                          <div class="col-lg-4"><?php echo form_error('testimonialGE');?></div>
                        </div>
                    </div>

                    <hr/>

                </div> <!--tab-content-->


              </div><!--panel-body-->

              <div class="col-lg-12 bottom-form-update">

                <div class="form-group">

                  <div class="col-lg-offset-9 col-lg-3">

                    <button class="btn btn-success" type="submit"><?php echo lang('Save') ?></button>

                    <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/testimonials/'); ?>'"><?php echo lang( 'Cancel' ) ?></button>

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