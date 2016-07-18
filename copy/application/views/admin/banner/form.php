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
          <li class="active"><?php echo  lang( 'banner' ); ?></li>
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

            <?php $msg = $this->session->flashdata( 'msg' ); if (!empty($msg) ) {
              $msg_class = $this->session->flashdata( 'msg_class' ); ?>
            <div id="divMessage" class="<?php echo $msg_class; ?>" >
            <?php echo $msg; ?></div><?php } //end if $msg  ?>

           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/banner'); ?>">
              <!-- tabbed header -->
              <header class="panel-heading tab-bg-dark-navy-blue tab-right ">
                <ul class="nav nav-tabs pull-right">
                  <li class="active">
                    <a data-toggle="tab" href="#home-36">
                     <?php echo lang( 'arabic' ); ?>
                   </a>
                 </li>
                 <li class="">
                  <a data-toggle="tab" href="#banner-36">
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
                    <label  class="control-label col-lg-2"><?php echo lang( 'title' ); ?>   *</label>
                    <div class="col-lg-3">
                      <input class=" form-control" id="title1AR" name="title1AR" value="<?php echo !empty($title1AR) ?  $title1AR : set_value('title1AR');   ?>" type="text" />
                      <?php echo form_error('$title1AR'); ?>
                    </div>
                    <div class="col-lg-3">
                      <input class=" form-control" id="title2AR" name="title2AR" value="<?php echo !empty($title2AR) ?  $title2AR : set_value('title2AR');   ?>" type="text" />
                      <?php echo form_error('$title2AR'); ?>
                    </div>
                    <div class="col-lg-3">
                      <input class=" form-control" id="title3AR" name="title3AR" value="<?php echo !empty($title3AR) ?  $title3AR : set_value('title3AR');   ?>" type="text" />
                      <?php echo form_error('$title3AR'); ?>
                    </div>
                    <!-- <div class="col-lg-2"></div> -->
                  </div>



                </div>

                <!-- german -->
                <div id="banner-36" class="tab-pane">

                    <div class="form-group ">
                      <label  class="control-label col-lg-2"><?php echo lang( 'title' ); ?>   *</label>
                      <div class="col-lg-3">
                        <input class=" form-control" id="title1GE" name="title1GE" value="<?php echo !empty($title1GE) ?  $title1GE : set_value('title1GE');   ?>" type="text" />
                        <?php echo form_error('$title1GE'); ?>
                      </div>
                      <div class="col-lg-3">
                        <input class=" form-control" id="title2GE" name="title2GE" value="<?php echo !empty($title2GE) ?  $title2GE : set_value('title2GE');   ?>" type="text" />
                        <?php echo form_error('$title2GE'); ?>
                      </div>
                      <div class="col-lg-3">
                        <input class=" form-control" id="title3GE" name="title3GE" value="<?php echo !empty($title3GE) ?  $title3GE : set_value('title3GE');   ?>" type="text" />
                        <?php echo form_error('$title3GE'); ?>
                      </div>
                      <!-- <div class="col-lg-2"></div> -->
                    </div>


                </div>
                <hr/>
                <div class="form-group ">
                  <label for="image" class="control-label col-lg-2"><?php echo lang( 'icon_image' ); ?> *</label>
                  <?php  if(!empty($returnedData->image)) { ?>
                  <?php $filename = "application/views/images/upload/banner/".$returnedData->image; ?>
                  <?php if ($returnedData->image != "" && file_exists( "$filename" ) ) { ?>
                  <div class="col-lg-6">
                    <input type="file" name="image" id="image">
                        Allowed Types: jpg, png, jpeg
                    <?php echo form_error('image'); ?>
                  </div>
                  <div class="bs-example bs-example-images">
                    <img src="<?php echo base_url().$filename; ?>" width="150px" class="img-thumbnail">
                  </div>
                    <?php  }//end file_exists
                    else { ?>
                  <div class="col-lg-6">
                    <input type="file" name="image" id="image" required>
                  </div>
                    <?php } //end else
                    } //end if image
                    else{  ?>
                    <div class="col-lg-6">
                      <input type="file" name="image" id="image" required>
                        Allowed Types: jpg, png, jpeg
                    <?php echo form_error('image'); ?>
                    </div>
                    <?php } //end else ?>
                </div>
                </div>
              </div>


            <div class="col-lg-12 bottom-form-update">
              <div class="form-group">
                <div class="col-lg-offset-9 col-lg-3">
                  <button class="btn btn-success" type="submit"><?php echo lang('Save'); ?></button>
                  <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/banner'); ?>'"><?php echo lang( 'Cancel' ); ?></button>
                </div>
              </div>
            </div>

              <br>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
  <!-- page end-->
</section>
</section>