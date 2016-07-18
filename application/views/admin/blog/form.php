<?php if (!empty($returnedData)) {  extract((array) $returnedData); } else {  $id = ''; } ?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
          <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang('home'); ?></a></li>
          <li><a href="<?php echo base_url().'admin/blog/'; ?>"><?php echo lang('blog'); ?></a></li>
          <li class="active"><?php if(!empty($returnedData)) { echo lang('edit'); } else{ echo lang('add_new'); } ?></li>
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
           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo site_url('admin/blog/form/'.$id)?>">
            <!-- tabbed header -->
            <header class="panel-heading tab-bg-dark-navy-blue tab-right ">
              <ul class="nav nav-tabs pull-right">
                <li class="active">
                  <a data-toggle="tab" href="#home-36">
                   <?php echo lang('arabic'); ?>
                 </a>
               </li>
               <li class="">
                <a data-toggle="tab" href="#about-36">
                  <?php echo lang('german'); ?>
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
                            <label  class="control-label col-lg-2"><?php echo lang('arabic_title'); ?>   *</label>
                            <div class="col-lg-6">
                              <input class=" form-control" id="titleAR" name="titleAR" value="<?php echo !empty($titleAR) ?  $titleAR : set_value('titleAR');   ?>" type="text" />
                            </div>
                            <div class="col-lg-4"><?php echo form_error('titleAR'); ?></div>
                          </div>

                            <div class="form-group ">
                            <label  class="control-label col-lg-2"><?php echo lang('auther'); ?>   *</label>
                            <div class="col-lg-6">
                              <input class=" form-control" id="titleAR" name="autherAR" value="<?php echo !empty($autherAR) ?  $autherAR : set_value('autherAR');   ?>" type="text" />
                            </div>
                            <div class="col-lg-4"><?php echo form_error('autherAR'); ?></div>
                          </div>
                        
                          <div class="form-group ">
                            <label class="control-label col-lg-2"><?php echo lang('arabic_content'); ?>  *</label>
                            <div class="col-lg-8">
                              <textarea class="form-control" id="descAR" name="descAR"> <?php if(!empty($descAR)) { echo $descAR; } else { echo set_value('descAR'); } ?></textarea>
                            </div>
                            <div class="col-lg-2"><?php echo form_error('descAR'); ?></div>
                          </div>

                    </div> <!--home-36-->

                    <!-- german -->
                    <div id="about-36" class="tab-pane">

                        <div class="form-group ">
                            <label  class="control-label col-lg-2"><?php echo lang('title'); ?>   *</label>
                            <div class="col-lg-6">
                              <input class=" form-control" id="titleGE" name="titleGE" value="<?php echo !empty($titleGE) ?  $titleGE : set_value('titleGE');   ?>" type="text" />
                            </div>
                            <div class="col-lg-4"><?php echo form_error('titleGE'); ?></div>
                        </div>

                          <div class="form-group ">
                            <label  class="control-label col-lg-2"><?php echo lang('auther'); ?>   *</label>
                            <div class="col-lg-6">
                              <input class=" form-control" id="autherGE" name="autherGE" value="<?php echo !empty($autherGE) ?  $autherGE : set_value('autherGE');   ?>" type="text" />
                            </div>
                            <div class="col-lg-4"><?php echo form_error('autherGE'); ?></div>
                        </div>
                        
                        <div class="form-group ">
                            <label class="control-label col-lg-2"><?php echo lang('content'); ?>  *</label>
                            <div class="col-lg-6">
                              <textarea class="form-control" id="descGE" name="descGE"> <?php if(!empty($descGE)) { echo $descGE; } else { echo set_value('descGE'); } ?></textarea>
                            </div>
                            <div class="col-lg-4"><?php echo form_error('descGE'); ?></div>
                        </div>
                    </div>  <!--about-36-->
                </div> <!--tab-content-->

                <hr/>

                <!-- tags -->
                <div class="form-group ">
                  <label class="control-label col-lg-2"><?php echo lang( 'tags' ); ?> </label>
                  <div class="col-lg-6">
                     <?php if(!empty($returnedData)) {
                      echo form_multiselect('tagId[]', $tags, $articleTags, 'class="form-control"');
                      } else {
                        echo form_multiselect('tagId[]', $tags, 'class="form-control"');
                       } ?>
                  </div>
                  <div class="col-lg-4"><?php echo form_error('tagId'); ?></div>
                </div>

                
                <div class="form-group ">
                    <label for="image" class="control-label col-lg-2"><?php echo lang('image'); ?> *</label>
                    <?php  if(!empty($image)) { ?>
                    <?php $filename = "application/views/images/upload/blog/".$image; ?>
                        <div class="col-lg-6">
                        <input type="file" name="image" id="image">
                        </div>
                    <?php if ( $image!="" && file_exists( "$filename" ) ) { ?>
                        <div class="bs-example bs-example-images">
                        <img src="<?php echo base_url().$filename; ?>" width="150px" class="img-thumbnail">
                        </div>
                    <?php  }//end file_exists
                    } //end if image
                    else{  ?>
                    <div class="col-lg-6">
                      <input type="file" name="image" id="image" required>
                    </div>
                    <?php } //end else ?>
                        Allowed Types: jpg, png, jpeg
                      <div class="col-lg-4">
                      <?php $image_msg = $this->session->flashdata('image_msg');
                      if (!empty($image_msg) ) { echo $image_msg; } //end if $msg  ?>
                      </div>
                </div>

              </div><!--panel-body-->

              <div class="col-lg-12 bottom-form-update">

                <div class="form-group">

                  <div class="col-lg-offset-9 col-lg-3">

                    <button class="btn btn-success" type="submit"><?php echo lang('Save'); ?></button>

                    <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/blog'); ?>'"><?php echo lang('Cancel'); ?></button>

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