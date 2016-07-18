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
          <li><a href="<?php echo base_url().'admin/courses/'; ?>"><?php echo lang( 'courses' ); ?></a></li>
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

          <?php $msg = $this->session->flashdata( 'msg' ); if (!empty($msg) ){
            $msg_class = $this->session->flashdata( 'msg_class' ); ?>
          <div id="divMessage" class="<?php echo $msg_class; ?>" >
          <?php echo $msg;?></div><?php } //end if $msg  ?>

           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/courses/form/'.$id); ?>">
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
                      <label for="project-title-en" class="control-label col-lg-2"><?php echo lang( 'arabic_title' ); ?>   *</label>
                      <div class="col-lg-6">
                        <input class=" form-control" id="titleAR" name="titleAR" value="<?php echo !empty($titleAR) ?  $titleAR : set_value('titleAR');   ?>" type="text" />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('titleAR');?></div>
                    </div>

                    <!-- desc200AR -->
                    <div class="form-group ">
                        <label for="desc200AR" class="control-label col-lg-2"><?php echo lang( 'desc200AR' ); ?>  </label>
                        <div class="col-lg-6">
                          <textarea class="form-control " id="desc200AR" name="desc200AR"> <?php if(!empty($desc200AR)){ echo $desc200AR; } else{ echo set_value('desc200AR'); } ?></textarea>
                        </div>
                        <div class="col-lg-4"><?php echo form_error('desc200AR');?></div>
                    </div>

                    <!-- contentAR -->
                    <div class="form-group ">
                        <label for="contentAR" class="control-label col-lg-2"><?php echo lang('course_content').' ('.lang('arabic').')'; ?>  </label>
                        <div class="col-lg-6">
                          <textarea class="form-control " id="contentAR" name="contentAR"> <?php if(!empty($contentAR)){ echo $contentAR; } else{ echo set_value('contentAR'); } ?></textarea>
                        </div>
                        <div class="col-lg-4"><?php echo form_error('contentAR');?></div>
                    </div>

                    <div class="form-group ">
                      <label for="durationAR" class="control-label col-lg-2"><?php echo lang( 'duration' ). ' ('.lang('arabic').')'; ?>   *</label>
                      <div class="col-lg-6">
                        <input class="form-control" id="durationAR" name="durationAR" value="<?php echo !empty($durationAR) ?  $durationAR : set_value('durationAR'); ?>" type="text" placeholder="ex: 20 HRS"/>
                      </div>
                      <div class="col-lg-4"><?php echo form_error('durationAR'); ?></div>
                    </div>

                    <div class="form-group ">
                      <label for="weeksNumAR" class="control-label col-lg-2"><?php echo lang( 'weeksNum' ). ' ('.lang('arabic').')'; ?>   </label>
                      <div class="col-lg-6">
                        <input class="form-control" id="weeksNumAR" name="weeksNumAR" value="<?php echo !empty($weeksNumAR) ?  $weeksNumAR : set_value('weeksNumAR'); ?>" type="text" placeholder="ex: 10 Weeks"/>
                      </div>
                      <div class="col-lg-4"><?php echo form_error('weeksNumAR'); ?></div>
                    </div>

                    <div class="form-group ">
                      <label for="lecturesNumAR" class="control-label col-lg-2"><?php echo lang( 'lecturesNum' ). ' ('.lang('arabic').')'; ?>   </label>
                      <div class="col-lg-6">
                        <input class="form-control" id="lecturesNumAR" name="lecturesNumAR" value="<?php echo !empty($lecturesNumAR) ?  $lecturesNumAR : set_value('lecturesNumAR'); ?>" type="text" placeholder="ex: 2 Lectures / Week "/>
                      </div>
                      <div class="col-lg-4"><?php echo form_error('lecturesNumAR'); ?></div>
                    </div>

                </div>

                <!-- german -->
                <div id="about-36" class="tab-pane">

                    <div class="form-group ">
                      <label for="project-title-en" class="control-label col-lg-2"><?php echo lang( 'title' ); ?>   *</label>
                      <div class="col-lg-6">
                        <input class=" form-control" id="titleGE" name="titleGE" value="<?php echo !empty($titleGE) ?  $titleGE : set_value('titleGE');   ?>" type="text" />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('titleGE');?></div>
                    </div>

                    <!-- desc200GE -->
                    <div class="form-group ">
                        <label for="desc200GE" class="control-label col-lg-2"><?php echo lang( 'desc200' ); ?>  </label>
                        <div class="col-lg-6">
                          <textarea class="form-control " id="desc200GE" name="desc200GE"> <?php if(!empty($desc200GE)){ echo $desc200GE; } else{ echo set_value('desc200GE'); } ?></textarea>
                        </div>
                        <div class="col-lg-4"><?php echo form_error('desc200GE');?></div>
                    </div>

                    <!-- contentGE -->
                    <div class="form-group ">
                        <label for="contentGE" class="control-label col-lg-2"><?php echo lang('course_content').' ('.lang('german').')'; ?>  </label>
                        <div class="col-lg-6">
                          <textarea class="form-control " id="contentGE" name="contentGE"> <?php if(!empty($contentGE)){ echo $contentGE; } else{ echo set_value('contentGE'); } ?></textarea>
                        </div>
                        <div class="col-lg-4"><?php echo form_error('contentGE');?></div>
                    </div>

                    <div class="form-group ">
                      <label for="durationGE" class="control-label col-lg-2"><?php echo lang( 'duration' ). ' ('.lang('german').')'; ?>   *</label>
                      <div class="col-lg-6">
                        <input class="form-control" id="durationGE" name="durationGE" value="<?php echo !empty($durationGE) ?  $durationGE : set_value('durationGE'); ?>" type="text" placeholder="ex: 20 HRS"/>
                      </div>
                      <div class="col-lg-4"><?php echo form_error('durationGE'); ?></div>
                    </div>

                    <div class="form-group ">
                      <label for="weeksNumGE" class="control-label col-lg-2"><?php echo lang( 'weeksNum' ). ' ('.lang('german').')'; ?>   </label>
                      <div class="col-lg-6">
                        <input class="form-control" id="weeksNumGE" name="weeksNumGE" value="<?php echo !empty($weeksNumGE) ?  $weeksNumGE : set_value('weeksNumGE'); ?>" type="text" placeholder="ex: 10 Weeks"/>
                      </div>
                      <div class="col-lg-4"><?php echo form_error('weeksNumGE'); ?></div>
                    </div>

                    <div class="form-group ">
                      <label for="lecturesNumGE" class="control-label col-lg-2"><?php echo lang( 'lecturesNum' ). ' ('.lang('german').')'; ?>   </label>
                      <div class="col-lg-6">
                        <input class="form-control" id="lecturesNumGE" name="lecturesNumGE" value="<?php echo !empty($lecturesNumGE) ?  $lecturesNumGE : set_value('lecturesNumGE'); ?>" type="text" placeholder="ex: 2 Lectures / Week "/>
                      </div>
                      <div class="col-lg-4"><?php echo form_error('lecturesNumGE'); ?></div>
                    </div>

                </div>
                <hr/>
                <div class="form-group ">
                    <label for="image" class="control-label col-lg-2"><?php echo lang( 'image' ); ?> </label>
                    <?php  if(!empty($image)){ ?>
                    <?php $filename = "application/views/images/upload/courses/".$image; ?>
                        <div class="col-lg-6">
                        <input type="file" name="image" id="image">

                      <div style="color:#FF0000;">
                        Allowed Formats: jpg, jpeg, png
                      </div>
                        </div>
                    <?php if ( $image!="" && file_exists( "$filename" ) ) { ?>
                        <div class="bs-example bs-example-images">
                        <img src="<?php echo base_url().$filename?>" width="150px" class="img-thumbnail">
                        </div>
                    <?php  }//end file_exists
                    } //end if image
                    else{  ?>
                    <div class="col-lg-6">
                      <input type="file" name="image" id="image" required>

                      <div style="color:#FF0000;">
                        Allowed Formats: jpg, jpeg, png
                      </div>
                    </div>
                    <?php } //end else ?>

                      <div class="col-lg-4">
                      <?php $image_msg = $this->session->flashdata( 'image_msg' );
                      if (!empty($image_msg) ){ echo $image_msg; } //end if $msg  ?>
                      </div>
                </div>

                    <div class="form-group">
                        <label for="categoryId" class="col-lg-2 control-label"><?php echo lang('Category'); ?> * </label>
                        <div class="col-lg-6">
                          <select class="form-control" id="categoryId" name="categoryId">
                            <option  value="#"><?php echo lang('choose'); ?></option>
                            <?php foreach ( $categories as $item ) { ?>
                                <option value='<?php echo $item->id; ?>' <?php echo set_select('categoryId', $item->id, ( !empty($categoryId) && $categoryId == $item->id ? TRUE : FALSE )); ?> > <?php echo $item->title; ?></option>
                            <?php
                            } //end foreach ?>
                          </select>
                        </div>
                        <div class="col-lg-4"><?php echo form_error('categoryId');?></div>
                    </div>


                <div class="form-group ">
                  <label for="price" class="control-label col-lg-2"><?php echo lang( 'price' ); ?>   *</label>
                  <div class="col-lg-6">
                    <input class="form-control" id="price" name="price" value="<?php echo !empty($price) ?  $price : set_value('price'); ?>" type="text" />
                  </div>
                  <div class="col-lg-4"><?php echo form_error('price');?></div>
                </div>

                <!-- instructors -->
                <div class="form-group ">
                  <label for="project-description-ar" class="control-label col-lg-2"><?php echo lang( 'instructors' ); ?>  *</label>
                  <div class="col-lg-6">
                     <?php if (!empty($returnedData)) {
                            //if form validation fails
                            $instructorIds = $this->input->post('instructorId');
                            if (!empty($instructorIds)) {
                                $courseInstructors = $instructorIds; //keep selected options
                            }

                            //courseInstructors is an array generated from database.
                            echo form_multiselect('instructorId[]', $instructors, $courseInstructors, 'class="form-control"');
                      } else {
                            //if form validation fails
                            $instructorIds = $this->input->post('instructorId');
                            if(!empty($instructorIds)) {
                                $courseInstructors = $instructorIds; //keep selected options
                                echo form_multiselect('instructorId[]', $instructors, $courseInstructors, 'class="form-control"');
                            } else {
                                echo form_multiselect('instructorId[]', $instructors, 'class="form-control"');
                            }
                       } ?>
                  </div>
                  <div class="col-lg-4"><?php echo form_error('instructorId[]');?></div>
                </div>

                <div class="form-group ">
                    <label class="control-label col-lg-2" for="inputSuccess"><?php echo lang( 'status' ); ?> *</label>
                    <div class="col-lg-3">
                      <select class="form-control m-bot15" id="slc_status" name="isActive">
                        <?php if (!empty($returnedData)){ ?>
                        <option value="1" <?php if(!empty($isActive)) echo "selected";  ?> ><?php echo lang( 'enable' ); ?></option>
                        <option value="0" <?php if (empty($isActive)) echo "selected";  ?>><?php echo lang( 'disable' ); ?></option>
                        <?php } else{ ?>
                        <option value="1"><?php echo lang( 'enable' ); ?></option>
                        <option value="0"><?php echo lang( 'disable' ); ?></option>
                        <?php }  ?>
                      </select>
                    </div>
                </div>

            </div>
            <br>

            </div>

            <div class="col-lg-12 bottom-form-update">

              <div class="form-group">

                <div class="col-lg-offset-9 col-lg-3">

                  <button class="btn btn-success" type="submit"><?php echo lang('Save'); ?></button>

                  <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/courses'); ?>'"><?php echo lang( 'Cancel' ); ?></button>

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
<script type="text/javascript">// <![CDATA[

$(document).ready(function() {

    $('#price').keypress(function(event) {
      if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
      }
    });

    //if form validation fails, repopulate categoryId dropdown menu.
    $('#categoryId').val(<?php $categoryId = $this->input->post('categoryId'); if(!empty($categoryId)) echo $categoryId; ?>);

});
</script>