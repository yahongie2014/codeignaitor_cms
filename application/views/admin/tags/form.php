<section id="main-content">
    <?php if (!empty($returnedData)) {
        extract((array) $returnedData);
    } else {
      $id = 0;
    } ?>
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
          <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang('home'); ?></a></li> <li><a href="<?php echo base_url().'admin/tags/'.$type; ?>"><?php echo lang('tags'); ?></a></li>
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
           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo site_url('admin/tags/form/'.$id.'/'.$type); ?>">
            <div class="panel-body">
              <div class="tab-content">
                <div class="form-group ">
                  <label  class="control-label col-lg-2"><?php echo lang('arabic_title'); ?>   *</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="titleAR" name="titleAR" value="<?php echo !empty($titleAR) ?  $titleAR : set_value('titleAR');   ?>" type="text" />
                  </div>
                  <div class="col-lg-4"><?php echo form_error('titleAR'); ?></div>
                </div>
                <div class="form-group ">
                  <label  class="control-label col-lg-2"><?php echo lang('title').' ('.lang('german').')'; ?>   *</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="titleGE" name="titleGE" value="<?php echo !empty($titleGE) ?  $titleGE : set_value('titleGE');   ?>" type="text" />
                  </div>
                  <div class="col-lg-4"><?php echo form_error('titleGE'); ?></div>
                </div>


                </div>
                <br>
              </div>
              <div class="col-lg-12 bottom-form-update">
                <div class="form-group">
                  <div class="col-lg-offset-9 col-lg-3">
                    <button class="btn btn-success" type="submit"><?php echo lang('Save'); ?></button>
                    <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/tags/'.$type); ?>'"><?php echo lang('Cancel'); ?></button>
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