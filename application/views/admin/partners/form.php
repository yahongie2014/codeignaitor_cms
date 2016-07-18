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
          <li><a href="<?php echo base_url().'admin/partners/'; ?>"><?php echo lang( 'partners' ); ?></a></li>
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
           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/partners/form/'.$id); ?>">
            <div class="panel-body">
              <div class="tab-content">

                <div class="form-group ">
                  <label  class="control-label col-lg-2"><?php echo lang('Name').' ('.lang('arabic').')'; ?>   *</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="nameAR" name="nameAR" value="<?php echo !empty($nameAR) ?  $nameAR : set_value('nameAR');   ?>" type="text" />
                  </div>
                  <div class="col-lg-4"><?php echo form_error('nameAR');?></div>
                </div>

                <div class="form-group ">
                  <label  class="control-label col-lg-2"><?php echo lang('Name').' ('.lang('german').')'; ?>   *</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="nameGE" name="nameGE" value="<?php echo !empty($nameGE) ?  $nameGE : set_value('nameGE');   ?>" type="text" />
                  </div>
                  <div class="col-lg-4"><?php echo form_error('nameGE');?></div>
                </div>

                <div class="form-group ">
                  <label  class="control-label col-lg-2"><?php echo lang( 'website' ); ?>  * </label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="website" name="website" value="<?php echo !empty($website) ?  $website : set_value('website');   ?>" type="text" />
                  </div>
                  <div class="col-lg-4"><?php echo form_error('website');?></div>
                </div>


                <br/>
                <div class="form-group ">
                  <label for="logo" class="control-label col-lg-2"><?php echo lang( 'logo' ); ?> *</label>
                  <?php  if(!empty($logo)){ ?>
                  <?php $filename = "application/views/images/upload/partners/".$logo; ?>
                  <div class="col-lg-6">
                    <input type="file" name="logo" id="logo">
                        Allowed Types: jpg, png, jpeg
                  </div>
                  <?php if ( $logo!="" && file_exists( "$filename" ) ) { ?>
                  <div class="bs-example bs-example-images">
                    <img src="<?php echo base_url().$filename?>" width="150px" class="img-thumbnail">
                  </div>
                    <?php  }//end file_exists
                    } //end if logo
                    else{  ?>
                    <div class="col-lg-6">
                      <input type="file" name="logo" id="logo" required>
                        Allowed Types: jpg, png, jpeg
                    </div>
                    <?php } //end else ?>
                      <div class="col-lg-4">
                      <?php $image_msg = $this->session->flashdata( 'image_msg' );
                      if (!empty($image_msg) ){ echo $image_msg; } //end if $msg  ?>
                      </div>
                  </div>

                </div>
                <br>

              </div>

              <div class="col-lg-12 bottom-form-update">

                <div class="form-group">

                  <div class="col-lg-offset-9 col-lg-3">

                    <button class="btn btn-success" type="submit"><?php echo lang('Save') ?></button>

                    <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/partners'); ?>'"><?php echo lang( 'Cancel' ) ?></button>

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