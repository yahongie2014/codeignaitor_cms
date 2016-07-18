<?php
if (!empty($returnedData)) {
    extract((array) $returnedData);
} else {
  $id = '';
} ?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
          <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang( 'home' ); ?></a></li>
          <li><a href="<?php echo base_url().'admin/about/'; ?>"><?php echo lang( 'about' ); ?></a></li>
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

            <?php $msg = $this->session->flashdata( 'msg' ); if (!empty($msg) ) {
              $msg_class = $this->session->flashdata( 'msg_class' ); ?>
            <div id="divMessage" class="<?php echo $msg_class; ?>" >
            <?php echo $msg; ?></div><?php } //end if $msg  ?>

           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/about'); ?>">
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
                    <label  class="control-label col-lg-2"><?php echo lang( 'main_title' ); ?>   *</label>
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

                    <div class="form-group ">
                          <label  class="control-label col-lg-2"><?php echo lang( 'arabic_title' ); ?>   *</label>
                          <div class="col-lg-6">
                            <input class=" form-control" id="titleAR" name="titleAR" value="<?php echo !empty($titleAR) ?  $titleAR : set_value('titleAR');   ?>" type="text" />
                          </div>
                          <div class="col-lg-4"><?php echo form_error('titleAR'); ?></div>
                    </div>

                    <!-- descAR -->
                    <div class="form-group ">
                      <label  class="control-label col-lg-2"><?php echo lang( 'arabic_content' ); ?>  *</label>
                      <div class="col-lg-6">
                        <textarea class="form-control " id="descAR" name="descAR"> <?php if(!empty($descAR)) { echo $descAR; } else { echo set_value('descAR'); } ?></textarea>
                      </div>
                      <div class="col-lg-4"><?php echo form_error('descAR'); ?></div>
                    </div>

                    <?php for ($i=1; $i <=3 ; $i++) {  ?>
                    <h2><?php echo lang('section').$i; ?></h2>
                    <div class="form-group ">
                      <div class="col-lg-3">
                      <label  class="control-label"><?php echo lang( 'title' ); ?>  </label>
                        <input class=" form-control" id="sectionTitleAR<?php echo $i; ?>" name="sectionTitleAR<?php echo $i; ?>" value="<?php echo !empty(${'sectionTitleAR'.$i}) ?  ${'sectionTitleAR'.$i} : set_value('sectionTitleAR'.$i);   ?>" type="text" />
                      </div>
                      <div class="col-lg-3">
                        <label  class="control-label"><?php echo lang( 'caption' ); ?>  </label>
                        <input class=" form-control" id="sectionCaptionAR<?php echo $i; ?>" name="sectionCaptionAR<?php echo $i; ?>" value="<?php echo !empty(${'sectionCaptionAR'.$i}) ?  ${'sectionCaptionAR'.$i} : set_value('sectionCaptionAR'.$i);   ?>" type="text" />
                      </div>
                      <div class="col-lg-6">
                        <label  class="control-label"><?php echo lang( 'content' ); ?>   </label>
                          <textarea class="form-control " id="sectionDescAR<?php echo $i; ?>" name="sectionDescAR<?php echo $i; ?>"> <?php if(!empty(${'sectionDescAR'.$i})) { echo ${'sectionDescAR'.$i}; } else { echo set_value('sectionDescAR'.$i); } ?></textarea>
                      </div>
                    </div>
                    <hr>
                    <?php } //for ?>

              </div>

              <!-- german -->
              <div id="about-36" class="tab-pane">

                    <div class="form-group ">
                      <label  class="control-label col-lg-2"><?php echo lang( 'main_title' ); ?>   *</label>
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

                    <div class="form-group ">
                      <label  class="control-label col-lg-2"><?php echo lang( 'title' ); ?>   *</label>
                      <div class="col-lg-6">
                        <input class=" form-control" id="titleGE" name="titleGE" value="<?php echo !empty($titleGE) ?  $titleGE : set_value('titleGE');   ?>" type="text" />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('titleGE'); ?></div>
                    </div>

                    <!-- descGE -->
                    <div class="form-group ">
                      <label  class="control-label col-lg-2"><?php echo lang( 'content' ); ?>  *</label>
                      <div class="col-lg-6">
                        <textarea class="form-control " id="descGE" name="descGE"> <?php if(!empty($descGE)) { echo $descGE; } else { echo set_value('descGE'); } ?></textarea>
                      </div>
                      <div class="col-lg-4"><?php echo form_error('descGE'); ?></div>
                    </div>

                     <?php for ($i=1; $i <=3 ; $i++) {  ?>
                     <h2><?php echo lang('section').$i; ?></h2>
                     <div class="form-group ">
                       <div class="col-lg-3">
                       <label  class="control-label"><?php echo lang( 'title' ); ?>  </label>
                         <input class=" form-control" id="sectionTitleGE<?php echo $i; ?>" name="sectionTitleGE<?php echo $i; ?>" value="<?php echo !empty(${'sectionTitleGE'.$i}) ?  ${'sectionTitleGE'.$i} : set_value('sectionTitleGE'.$i);   ?>" type="text" />
                       </div>
                       <div class="col-lg-3">
                         <label  class="control-label"><?php echo lang( 'caption' ); ?>  </label>
                         <input class=" form-control" id="sectionCaptionGE<?php echo $i; ?>" name="sectionCaptionGE<?php echo $i; ?>" value="<?php echo !empty(${'sectionCaptionGE'.$i}) ?  ${'sectionCaptionGE'.$i} : set_value('sectionCaptionGE'.$i);   ?>" type="text" />
                       </div>
                       <div class="col-lg-6">
                         <label  class="control-label"><?php echo lang( 'content' ); ?>   </label>
                           <textarea class="form-control " id="sectionDescGE<?php echo $i; ?>" name="sectionDescGE<?php echo $i; ?>"> <?php if(!empty(${'sectionDescGE'.$i})) { echo ${'sectionDescGE'.$i}; } else { echo set_value('sectionDescGE'.$i); } ?></textarea>
                       </div>
                     </div>
                     <hr>
                     <?php } //for ?>


              </div>

            </div>
            <br>

                <div class="form-group imageDiv" >
                 <label for="aboutImages" class="control-label col-lg-2"><?php echo lang( 'images' ); ?> </label>
                    <div class="col-lg-8">
                        <input type="hidden" name="itr" id="itr" value="1">
                        <input class="btn btn-sm btn-success" type="button" id="addNew" value="<?php echo lang('add_new') ?>">
                      Allowed Types: (gif, jpg, png, jpeg)
                        <div class="filesDiv"></div>
                      <br/>
                      <div id="projectImages">
                          <?php if (!empty($aboutImages)) { ?>
                         <table>
                              <tr>
                                  <td><?php echo lang('image'); ?></td>
                                  <td></td>
                              </tr>
                            <?php $i = 0;
                              foreach ($aboutImages as $file) { $i++;
                                $filename = "application/views/images/upload/about/".$file->image;
                                if ( $file->image !="" && file_exists( "$filename" ) ) {
                              ?>

                            <tr>
                              <td><img src="<?php echo base_url().$filename; ?>" height="50px"/></td>
                              <td> <a href="javascript:removeImage(<?php echo $file->id ?>, <?php echo $id; ?>);" class="btn btn-danger"> <?php echo lang('list_delete'); ?></a> </td>
                            </tr>
                            <?php }
                              }?>

                         </table>
                         <?php } ?>
                      </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-12 bottom-form-update">
              <div class="form-group">
                <div class="col-lg-offset-9 col-lg-3">
                  <button class="btn btn-success" type="submit"><?php echo lang('Save'); ?></button>
                  <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/about'); ?>'"><?php echo lang( 'Cancel' ); ?></button>
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
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
     $('#addNew').click(function(event) {
        var itr = Number($('#itr').val());
        itr += 1;
        $('#itr').val(itr);
        $('.filesDiv').append('<div><input type="file" name="files[]" id="file'+itr+'"  style="float:left;"/><a id="remove_btn'+itr+'" href="javascript:cancelFileUpload('+itr+');" class="btn btn-sm btn-danger" style="float:left;"> <?php echo lang('list_delete'); ?></a> <br/>'
            +'<hr/></div>');
    });
});

function cancelFileUpload (itr) {
    $('#file'+itr).parent().remove();
}

function removeImage($imageId, $sectionId)
{
  if($imageId != '')
  {
    //remove by ajax
    $('#projectImages').load("<?php echo base_url();  ?>admin/about/removeImage/" + $imageId+'/'+$sectionId);
  }
}
</script>