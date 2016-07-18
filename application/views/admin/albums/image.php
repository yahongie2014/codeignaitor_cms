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
          <li><a href="<?php echo base_url().'admin/albums/'; ?>"><?php echo lang( 'albums' ); ?></a></li>
          <li><a href="<?php echo base_url().'admin/albums/images/'.$galleryId; ?>"><?php echo lang( 'images' ); ?></a></li>
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

           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/albums/imageForm/'.$galleryId.'/'.$id)?>">

          <div class="panel-body">

            <div class="tab-content">

                <div class="form-group ">
                  <label for="project-title-en" class="control-label col-lg-2"><?php echo lang( 'arabic_title' ); ?>   *</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="titleAR" name="titleAR" value="<?php echo !empty($titleAR) ?  $titleAR : set_value('titleAR');   ?>" type="text" />
                  </div>
                  <div class="col-lg-4"><?php echo form_error('titleAR'); ?></div>
                </div>

                <div class="form-group ">
                  <label for="project-title-en" class="control-label col-lg-2"><?php echo lang( 'title' ); ?>   *</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="titleGE" name="titleGE" value="<?php echo !empty($titleGE) ?  $titleGE : set_value('titleGE');   ?>" type="text" />
                  </div>
                  <div class="col-lg-4"><?php echo form_error('titleGE'); ?></div>
                </div>


            </div>
            <br>

                <div class="form-group ">
                    <label for="fileName" class="control-label col-lg-2"><?php echo lang( 'image' ); ?> </label>
                    <?php  if(!empty($fileName)){ ?>
                    <?php $filename = "application/views/images/upload/gallery/".$fileName; ?>
                        <div class="col-lg-6">
                        <input type="file" name="fileName" id="fileName">
                        </div>
                    <?php if ( $fileName!="" && file_exists( "$filename" ) ) { ?>
                        <div class="bs-example bs-example-images">
                        <img src="<?php echo base_url().$filename?>" width="150px" class="img-thumbnail">
                        </div>
                    <?php  }//end file_exists
                    } //end if fileName
                    else{  ?>
                    <div class="col-lg-6">
                      <input type="file" name="fileName" id="fileName" required>
                    </div>
                    <?php } //end else ?>
                        Allowed Types: jpg, png, jpeg
                      <div class="col-lg-4">
                      <?php $image_msg = $this->session->flashdata( 'image_msg' );
                      if (!empty($image_msg) ){ echo $image_msg; } //end if $msg  ?>
                      </div>
                </div>

            </div>

            <div class="col-lg-12 bottom-form-update">

              <div class="form-group">

                <div class="col-lg-offset-9 col-lg-3">

                  <button class="btn btn-success" type="submit"><?php echo lang('Save') ?></button>

                  <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/albums/images/'.$galleryId); ?>'"><?php echo lang( 'Cancel' ) ?></button>

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