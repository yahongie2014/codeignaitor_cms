<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<?php
if (!empty($returnedData)) {
    extract((array) $returnedData);
}else {
  $id = '';
}  ?>
<?php  echo $map['js'];  ?>

<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
          <li><a href="<?php  echo site_url('admin');  ?>"><i class="icon-dashboard"></i><?php  echo lang( 'home' );  ?></a></li>
          <li><a href="<?php echo base_url().'admin/events/'; ?>"><?php echo lang( 'events' ); ?></a></li>
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
           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php  echo site_url( 'admin/events/form/'.$id); ?>">

            <!-- tabbed header -->

            <header class="panel-heading tab-bg-dark-navy-blue tab-right ">

              <ul class="nav nav-tabs pull-right">

                <li class="active">

                  <a data-toggle="tab" href="#home-36">

                   <?php  echo lang( 'arabic' );  ?>

                 </a>

               </li>

               <li class="">

                <a data-toggle="tab" href="#about-36">

                  <?php  echo lang( 'german' );  ?>

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
                      <label for="project-title-en" class="control-label col-lg-2"><?php  echo lang( 'arabic_title' );  ?>   *</label>
                      <div class="col-lg-6">
                        <input class=" form-control" id="titleAR" name="titleAR" value="<?php  echo !empty($titleAR) ?  $titleAR : set_value('titleAR');    ?>" type="text" />
                      </div>
                      <div class="col-lg-4"><?php  echo form_error('titleAR'); ?></div>
                    </div>

                    <div class="form-group ">
                      <label for="locationAR" class="control-label col-lg-2"><?php  echo lang( 'Location' ).' ('.lang('arabic').')';  ?>   *</label>
                      <div class="col-lg-6">
                        <input class=" form-control" id="locationAR" name="locationAR" value="<?php  echo !empty($locationAR) ?  $locationAR : set_value('locationAR');    ?>" type="text" />
                      </div>
                      <div class="col-lg-4"><?php  echo form_error('locationAR'); ?></div>
                    </div>

                    <!-- contentAR -->
                    <div class="form-group ">
                      <label for="contentAR" class="control-label col-lg-2"><?php  echo lang( 'arabic_content' );  ?>  *</label>
                      <div class="col-lg-6">
                        <textarea class="form-control" id="contentAR" name="contentAR"> <?php  if(!empty($contentAR)) { echo $contentAR; }else{ echo set_value('contentAR'); }  ?></textarea>
                      </div>
                      <div class="col-lg-4"><?php  echo form_error('contentAR'); ?></div>
                    </div>

                </div>

              <!-- german -->
              <div id="about-36" class="tab-pane">
                    <div class="form-group ">
                      <label for="project-title-en" class="control-label col-lg-2"><?php  echo lang( 'title' );  ?>   *</label>
                      <div class="col-lg-6">
                        <input class=" form-control" id="titleGE" name="titleGE" value="<?php  echo !empty($titleGE) ?  $titleGE : set_value('titleGE');    ?>" type="text" />
                      </div>
                      <div class="col-lg-4"><?php  echo form_error('titleGE'); ?></div>
                    </div>

                    <div class="form-group ">
                      <label for="locationGE" class="control-label col-lg-2"><?php  echo lang( 'Location' ).' ('.lang('german').')';  ?>   *</label>
                      <div class="col-lg-6">
                        <input class=" form-control" id="locationGE" name="locationGE" value="<?php  echo !empty($locationGE) ?  $locationGE : set_value('locationGE');    ?>" type="text" />
                      </div>
                      <div class="col-lg-4"><?php  echo form_error('locationGE'); ?></div>
                    </div>

                    <!-- contentGE -->
                    <div class="form-group ">
                      <label for="contentGE" class="control-label col-lg-2"><?php  echo lang( 'content' );  ?>  *</label>
                      <div class="col-lg-6">
                        <textarea class="form-control" id="contentGE" name="contentGE"> <?php  if(!empty($contentGE)) { echo $contentGE; }else{ echo set_value('contentGE'); }  ?></textarea>
                      </div>
                      <div class="col-lg-4"><?php  echo form_error('contentGE'); ?></div>
                    </div>

              </div>
                    <hr/>

                <div class="form-group ">
                  <label for="project-title-en" class="control-label col-lg-2"><?php  echo lang( 'date' );  ?>   *</label>
                  <div class="col-lg-6">
                    <div id="datetimepicker1" class="input-append date">
                      <input type="text" class="form-control" id="date" name="date"   value="<?php  echo !empty($date) ?  $date : set_value('date');    ?>">
                      <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span>
                    </div>
                  </div>
                  <div class="col-lg-4"><?php  echo form_error('date'); ?></div>
                </div>

                <div class="form-group ">
                  <label for="startTime" class="control-label col-lg-2"><?php  echo lang( 'startTime' );  ?>   *</label>
                  <div class="col-lg-6">
                    <div id="startTimeDiv" class="input-append date">
                      <input type="text" class="form-control" id="startTime" name="startTime"   value="<?php  echo !empty($startTime) ?  date("g:i A", strtotime($startTime)) : set_value('startTime');    ?>">
                      <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span>
                    </div>
                  </div>
                  <div class="col-lg-4"><?php  echo form_error('startTime'); ?></div>
                </div>


                <div class="form-group ">
                  <label for="endTime" class="control-label col-lg-2"><?php  echo lang( 'endTime' );  ?>   *</label>
                  <div class="col-lg-6">
                    <div id="endTimeDiv" class="input-append date">
                      <input type="text" class="form-control" id="endTime" name="endTime"   value="<?php  echo !empty($endTime) ?  date("g:i A", strtotime($endTime)) : set_value('endTime');    ?>">
                      <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span>
                    </div>
                  </div>
                  <div class="col-lg-4"><?php  echo form_error('endTime'); ?></div>
                </div>

                <div class="form-group ">
                  <label for="image" class="control-label col-lg-2"><?php  echo lang( 'main_image' );  ?> *</label>
                  <?php   if(!empty($image)) {  ?>
                  <?php  $filename = "application/views/images/upload/events/".$image;  ?>
                  <div class="col-lg-6">
                    <input type="file" name="image" id="image">
                    <p class="help-block">Please select Main Image</p>
                  </div>
                  <?php  if ( $image!="" && file_exists( "$filename" ) ) {  ?>
                  <div class="bs-example bs-example-images">
                    <img src="<?php  echo base_url().$filename ?>" width="150px" class="img-thumbnail">
                  </div>
                    <?php   }//end file_exists
                    } //end if image
                    else {   ?>
                    <div class="col-lg-6">
                      <input type="file" name="image" id="image" required>
                      <p class="help-block">Please select Main Image</p>
                    </div>
                    <?php  } //end else  ?>
                </div>

                  <!-- hidden inputs -->
                  <input type="hidden" name="latitude" id="latitude" value="<?php  if (!empty($latitude)) {
                   echo $latitude; }  ?>"/>
                  <input type="hidden" name="lagitude" id="lagitude" value="<?php  if(!empty($lagitude)) {echo $lagitude; } ?>"/>
                  <div class="form-group ">
                      <div class="col-lg-6">
                        <?php  echo lang('map_message');  ?>
                        <br/>
                        <br/>
                        <?php  echo $map['html'];  ?>
                      </div>
                      <!--   <div class="col-lg-4"></div> -->
                  </div>


                </div>
                <br>

              </div>

              <div class="col-lg-12 bottom-form-update">

                <div class="form-group">

                  <div class="col-lg-offset-9 col-lg-3">

                    <button class="btn btn-success" type="submit"><?php  echo lang('Save');  ?></button>

                    <button class="btn btn-danger" type="button" onclick="window.location = '<?php  echo site_url('admin/events');  ?>'"><?php  echo lang( 'Cancel' );  ?></button>

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

<script src="<?php  echo base_url();  ?>js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#datetimepicker1').datetimepicker({
      format: 'yyyy-MM-dd',
      pickTime: false,
    });

    $('#startTimeDiv').datetimepicker({
      format: 'HH:mm PP',
      pickDate: false,
      pick12HourFormat: true,   // enables the 12-hour format time picker
      pickSeconds: false         // disables seconds in the time picker
    });

    $('#endTimeDiv').datetimepicker({
      format: 'HH:mm PP',
      pickDate: false,
      pick12HourFormat: true,   // enables the 12-hour format time picker
      pickSeconds: false         // disables seconds in the time picker
    });
});
function updateDatabase(newLat, newLng)
{
  $('#latitude').val(newLat);
  $('#lagitude').val(newLng);
}
</script>
