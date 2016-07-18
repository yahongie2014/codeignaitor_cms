<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<?php
$base = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
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
                      <label for="price" class="control-label col-lg-2"><?php echo lang( 'price' ); ?>   *</label>
                      <div class="col-lg-6">
                          <input class="form-control" id="price" name="price" value="<?php echo !empty($price) ?  $price : set_value('price'); ?>" type="number"  />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('price'); ?></div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="duration" class="control-label col-lg-2"><?php echo lang( 'duration' ); ?>   *</label>
                      <div class="col-lg-6">
                          <input class="form-control" id="duration" name="duration" value="<?php echo !empty($duration) ?  $duration : set_value('duration'); ?>" type="number"  />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('duration'); ?></div>
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
                <?php $i = 0; ?>
                <?php if(is_numeric($base)){ ?>
                <?php  if(!empty($coursebranches)){ foreach ( $coursebranches as $items ) { ?>
                
                <label class="control-label col-lg-2" for="inputSuccess"><?=lang('Coursesdates');?></label>
                    <br />
                    <hr />                    
                    <div class="form-group">
                        <label for="branchesId" class="col-lg-2 control-label"><?php echo lang('Branches'); ?> * </label>
                        <div class="col-lg-6">
                          <select class="form-control" id="branchesId" name="branches[<?=$i;?>][branchesId]">
                            <option  value="#"><?php echo lang('choose'); ?></option>
                            <?php foreach ( $branches as $item ) { ?>
                            <option value='<?php echo $item->id; ?>' <?php if($item->id==$items->branchesId){ echo 'selected="selected"'; }?> > <?php echo $item->title; ?></option>
                            <?php } //end foreach ?>
                          </select>
                        </div>
                        <div class="col-lg-4"><?php echo form_error('branches['.$i.'][branchesId]');?></div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="duration" class="control-label col-lg-2"><?php echo lang( 'price' ); ?>   *</label>
                      <div class="col-lg-6">
                          <input class="form-control" id="duration" name="branches[<?=$i;?>][price]" value="<?php echo !empty($items->price) ?  $items->price : set_value('price'); ?>" type="number"  />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('branches['.$i.'][price]'); ?></div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="duration" class="control-label col-lg-2"><?php echo lang( 'duration' ); ?>   *</label>
                      <div class="col-lg-6">
                          <input class="form-control" id="duration" name="branches[<?=$i;?>][duration]" value="<?php echo !empty($items->duration) ?  $items->duration : set_value('duration'); ?>" type="number"  />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('branches['.$i.'][duration]'); ?></div>
                    </div>

                    <div class="form-group ">
                      <label for="weeksNum" class="control-label col-lg-2"><?php echo lang( 'weeksNum' ); ?>   </label>
                      <div class="col-lg-6">
                        <input class="form-control" id="weeksNum" name="branches[<?=$i;?>][weeksNum]" value="<?php echo !empty($items->weeksNum) ?  $items->weeksNum : set_value('weeksNum'); ?>" type="number" />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('branches['.$i.'][weeksNum]'); ?></div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="AvailableSeats" class="control-label col-lg-2"><?php echo lang( 'AvailableSeats' ); ?>   </label>
                      <div class="col-lg-6">
                        <input class="form-control" id="AvailableSeats" name="branches[<?=$i;?>][AvailableSeats]" value="<?php echo !empty($items->AvailableSeats) ?  $items->AvailableSeats : set_value('AvailableSeats'); ?>" type="number" />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('branches['.$i.'][AvailableSeats]'); ?></div>
                    </div>

                    <div class="form-group ">
                      <label for="lecturesNum" class="control-label col-lg-2"><?php echo lang( 'lecturesNum' ); ?>   </label>
                      <div class="col-lg-6">
                        <input class="form-control" id="lecturesNumAR" name="branches[<?=$i;?>][lecturesNum]" value="<?php echo !empty($items->lecturesNum) ?  $items->lecturesNum : set_value('lecturesNum'); ?>" type="number" />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('branches['.$i.'][lecturesNum]'); ?></div>
                    </div>
                    
                    <div class="form-group ">
                  <label for="start" class="control-label col-lg-2"><?php  echo lang( 'startTime' );  ?>   *</label>
                  <div class="col-lg-6">
                    <div id="startDiv<?=$i;?>" class="input-append date">
                      <input type="text" class="form-control" id="start" name="branches[<?=$i;?>][start]"   value="<?php  echo !empty($items->start) ?  $items->start : set_value('start'); ?>">
                      <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span>
                    </div>
                  </div>
                  <div class="col-lg-4"><?php  echo form_error('branches['.$i.'][start]'); ?></div>

                    </div>
                 <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/courses/deleteBranshes/'.$id.'/'.$items->id; ?>"  onClick="return Del_Confirm(); "><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a></td>
                    <hr />
                          
                    
                    <div class="input_fields_wrap">
                        <button class="add_field_button btn btn-success col-lg-offset-2 col-lg-1">أضف جديد</button>
                    </div>
                <?php }  ?>
                <?php $i++; }  ?>
                <?php }elseif($base=='add' || $base=='form'){ ?>
                    <label class="control-label col-lg-2" for="inputSuccess"><?=lang('Coursesdates');?></label>
                    <br />
                    <hr />
                    <div class="form-group">
                        <label for="branchesId" class="col-lg-2 control-label"><?php echo lang('Branches'); ?> * </label>
                        <div class="col-lg-6">
                          <select class="form-control" id="branchesId" name="branches[0][branchesId]">
                            <option  value="#"><?php echo lang('choose'); ?></option>
                            <?php foreach ( $branches as $item ) { ?>
                            <option value='<?php echo $item->id; ?>' <?php if($item->id){ echo 'selected="selected"'; }?> > <?php echo $item->title; ?></option>
                            <?php } //end foreach ?>
                          </select>
                        </div>
                        <div class="col-lg-4"><?php echo form_error('branches[0][branchesId]');?></div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="duration" class="control-label col-lg-2"><?php echo lang( 'price' ); ?>   *</label>
                      <div class="col-lg-6">
                          <input class="form-control" id="duration" name="branches[0][price]" value="<?php echo set_value('price'); ?>" type="number"  />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('branches[0][price]'); ?></div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="duration" class="control-label col-lg-2"><?php echo lang( 'duration' ); ?>   *</label>
                      <div class="col-lg-6">
                          <input class="form-control" id="duration" name="branches[0][duration]" value="<?php echo set_value('duration'); ?>" type="number"  />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('branches[0][duration]'); ?></div>
                    </div>

                    <div class="form-group ">
                      <label for="weeksNum" class="control-label col-lg-2"><?php echo lang( 'weeksNum' ); ?>   </label>
                      <div class="col-lg-6">
                        <input class="form-control" id="weeksNum" name="branches[0][weeksNum]" value="<?php echo set_value('weeksNum'); ?>" type="number" />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('branches[0][weeksNum]'); ?></div>
                    </div>

                       <div class="form-group ">
                      <label for="AvailableSeats" class="control-label col-lg-2"><?php echo lang( 'AvailableSeats' ); ?>   </label>
                      <div class="col-lg-6">
                        <input class="form-control" id="AvailableSeats" name="branches[0][AvailableSeats]" value="<?php echo set_value('AvailableSeats'); ?>" type="number" />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('branches[0][AvailableSeats]'); ?></div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="lecturesNum" class="control-label col-lg-2"><?php echo lang( 'lecturesNum' ); ?>   </label>
                      <div class="col-lg-6">
                          <input class="form-control" id="lecturesNumAR" name="branches[0][lecturesNum]" value="<?php echo set_value('lecturesNum'); ?>" type="number" />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('branches[0][lecturesNum]'); ?></div>
                    </div>
                    
                    <div class="form-group ">
                  <label for="start" class="control-label col-lg-2"><?php  echo lang( 'startTime' );  ?>   *</label>
                  <div class="col-lg-6">
                    <div id="startDiv0" class="input-append date">
                      <input type="text" class="form-control" id="start" name="branches[0][start]"   value="<?php  echo !empty($start) ?  date("d-m-y", strtotime($start)) : set_value('start');    ?>">
                      <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span>
                    </div>
                  </div>
                  <div class="col-lg-4"><?php  echo form_error('branches[0][start]'); ?></div>
                    </div>
                    <hr />
                <?php } ?>
                    <script type="text/javascript">
                    $(document).ready(function () {
                    $('#startDiv<?php echo $i;?>').datetimepicker({
                      format: 'yyyy-MM-dd',
                      pickTime: false,
                    });
                    });
                    </script>
            </div>
       
            <br />
            <hr/>

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
  function Del_Confirm()
  {
    var delConfirm = confirm("<?php echo lang( 'alert_delete' ) ?>")
    if (delConfirm)
    {
      return true;
    }else
    {
      return false;
    }
  }
$(function() {
   $('.datetimepicker').live('focus',function(){
    $(this).datetimepicker({
        todayHighlight:true,
        format:'yyyy-mm-dd',
        autoclose:true
    })
})
});
$(document).ready(function() {

    $('#price').keypress(function(event) {
      if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
      }
    });

    //if form validation fails, repopulate categoryId dropdown menu.
    $('#categoryId').val(<?php $categoryId = $this->input->post('categoryId'); if(!empty($categoryId)) echo $categoryId; ?>);

});
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><br /><hr /><div class="form-group"><label for="branchesId" class="col-lg-2 control-label"><?php echo lang("Branches"); ?> * </label><div class="col-lg-6"><select class="form-control" id="branchesId" name="branches['+(x-1)+'][branchesId]"><option  value="#"><?php echo lang("choose"); ?></option><?php foreach ( $branches as $item ) { ?><option value="<?php echo $item->id; ?>" <?php if($item->id==$items->branchesId){ echo "selected=selected"; }?> > <?php echo $item->title; ?></option><?php } //end foreach ?></select></div><div class="col-lg-4"><?php echo form_error("branches['+(x-1)+'][branchesId]");?></div></div><div class="form-group "><label for="duration" class="control-label col-lg-2"><?php echo lang( "price" ); ?>   *</label><div class="col-lg-6"><input class="form-control" id="duration" name="branches['+(x-1)+'][price]" value="<?php echo set_value("price"); ?>" type="number"  /></div><div class="col-lg-4"><?php echo form_error("branches['+(x-1)+'][price]"); ?></div></div><div class="form-group "><label for="duration" class="control-label col-lg-2"><?php echo lang( "duration" ); ?>   *</label><div class="col-lg-6"><input class="form-control" id="duration" name="branches['+(x-1)+'][duration]" value="<?php echo set_value("duration"); ?>" type="number"  /></div><div class="col-lg-4"><?php echo form_error("branches['+(x-1)+'][duration]"); ?></div></div><div class="form-group "><label for="weeksNum" class="control-label col-lg-2"><?php echo lang( "weeksNum" ); ?>   </label><div class="col-lg-6"><input class="form-control" id="weeksNum" name="branches['+(x-1)+'][weeksNum]" value="<?php echo set_value("weeksNum"); ?>" type="number" /></div><div class="col-lg-4"><?php echo form_error("branches['+(x-1)+'][weeksNum]"); ?></div></div><div class="form-group "><label for="AvailableSeats" class="control-label col-lg-2"><?php echo lang( "AvailableSeats" ); ?> </label><div class="col-lg-6"><input class="form-control" id="AvailableSeats" name="branches['+(x-1)+'][AvailableSeats]" value="<?php echo set_value("AvailableSeats"); ?>" type="number" /></div><div class="col-lg-4"><?php echo form_error("branches['+(x-1)+'][AvailableSeats]"); ?></div></div><div class="form-group "><label for="lecturesNum" class="control-label col-lg-2"><?php echo lang( "lecturesNum" ); ?>   </label><div class="col-lg-6"><input class="form-control" id="lecturesNumAR" name="branches['+(x-1)+'][lecturesNum]" value="<?php echo  set_value("lecturesNum"); ?>" type="number" /></div><div class="col-lg-4"><?php echo form_error("branches['+(x-1)+'][lecturesNum]"); ?></div></div><div class="form-group "><label for="start" class="control-label col-lg-2"><?php  echo lang( "startTime" );  ?>   *</label><div class="col-lg-6"><div id="startDiv" class=""><input type="text" class="datetimepicker form-control " id="start" name="branches['+(x-1)+'][start]"   placeholder="yyyy-mm-dd"  value=""></div></div><div class="col-lg-4"><?php  echo form_error("branches['+(x-1)+'][start]"); ?></div></div><a href="#" class="btn btn-danger remove_field"><?=lang("delete");?></a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>