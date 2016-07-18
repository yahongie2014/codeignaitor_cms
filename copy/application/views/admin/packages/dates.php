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
            <li><a href="<?php echo base_url().'admin/packages'; ?>"><?php echo lang( 'packages' ); ?></a></li>
          <li><a href="<?php echo base_url().'admin/packages/packageData/'.$packageId; ?>"><?php echo lang( 'packageDates' ); ?></a></li>
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

           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/packages/dates/'.$packageId.'/'.$id)?>">

          <div class="panel-body">

            <div class="tab-content">

                <!-- Course Dates -->
                <!-- <h3><?php echo lang('packageDates'); ?></h3> -->
                <!-- <button type="button" class="btn btn-primary"> <?php echo lang('addCourseDate'); ?> </button> -->
                <!-- <div class="packageDatesDiv" > -->
                    <!-- <div class="date1"> -->
                        <div class="form-group ">
                            <div class="col-lg-1">
                            <label for="project-title-en" class="control-label col-lg-1"><?php  echo lang( 'startDate' );  ?>   *</label>
                            </div>
                          <div class="col-lg-4">
                            <div id="datetimepicker1" class="input-append date">
                              <input type="text" class="form-control" id="startDate" name="startDate"   value="<?php  echo !empty($startDate) ?  $startDate : set_value('startDate'); ?>" required>
                              <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                              </span><?php  echo form_error('startDate'); ?>
                            </div>
                          </div>
                          <div class="col-lg-1">
                            <label for="project-title-en" class="control-label col-lg-1"><?php  echo lang( 'endDate' );  ?>   *</label>
                          </div>
                          <div class="col-lg-4">
                            <div id="datetimepicker2" class="input-append date">
                              <input type="text" class="form-control" id="endDate" name="endDate"   value="<?php  echo !empty($endDate) ?  $endDate : set_value('endDate'); ?>" required>
                              <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                              </span>
                              <?php  echo form_error('endDate'); ?>
                            </div>
                          </div>
                        </div>

                        <button type="button" class="btn btn-primary" id="groupBtn"> <?php echo lang('addCourseGroup'); ?> </button>
                        <!-- Course Groups -->
                        <div class="groupsDiv">

                            <?php if(!empty($groupsData)) { $i = 0; ?>
                            <input type="hidden" name="itr" id="itr" value="<?php echo count($groupsData) ?>">

                            <?php foreach($groupsData as $item) {  $i++; ?>
                                <div class="group<?php echo $i; ?>">
                                    <h2><?php echo lang('group').$i; ?>
                                        <button type="button" id="remove<?php echo $i; ?>" class="btn btn-danger" onclick="removeItemForEdit(<?php echo $i; ?>, <?php echo $item->id; ?>);" ><?php  echo lang("list_delete")  ?></button>
                                    </h2>
                                        <input type="hidden" name="groupId<?php echo $i; ?>" id="groupId<?php echo $i; ?>" value="<?php if(!empty($item->id)) echo $item->id; ?>">
                                    <div class="form-group ">
                                      <label for="code<?php echo $i; ?>" class="control-label col-lg-2"><?php echo lang( 'group_code' ); ?>   *</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" id="code<?php echo $i; ?>" name="code<?php echo $i; ?>" required value="<?php if(!empty($item->code)) echo $item->code; ?>">
                                      </div>
                                      <div class="col-lg-4"></div>
                                    </div>

                                    <div class="form-group ">
                                        <label class="control-label col-lg-2" for="inputSuccess"><?php echo lang( 'days' ); ?> *</label>
                                        <div class="col-lg-8">
                                            <label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days<?php echo $i; ?>[]" id="Sat" value="Sat" <?php if(in_array("Sat", $item->days)) echo " checked"; ?> /><?php echo lang('Sat'); ?> </label>
                                            <label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days<?php echo $i; ?>[]" id="Sun" value="Sun" <?php if(in_array("Sun", $item->days)) echo " checked"; ?> /><?php echo lang('Sun'); ?></label>
                                            <label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days<?php echo $i; ?>[]" id="Mon" value="Mon" <?php if(in_array("Mon", $item->days)) echo " checked"; ?> /><?php echo lang('Mon'); ?></label>
                                            <label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days<?php echo $i; ?>[]" id="Tue" value="Tue" <?php if(in_array("Tue", $item->days)) echo " checked"; ?> /><?php echo lang('Tue'); ?></label>
                                            <label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days<?php echo $i; ?>[]" id="Wed" value="Wed" <?php if(in_array("Wed", $item->days)) echo " checked"; ?> /><?php echo lang('Wed'); ?></label>
                                            <label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days<?php echo $i; ?>[]" id="Thu" value="Thu" <?php if(in_array("Thu", $item->days)) echo " checked"; ?> /><?php echo lang('Thu'); ?></label>
                                            <label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days<?php echo $i; ?>[]" id="Fri" value="Fri" <?php if(in_array("Fri", $item->days)) echo " checked"; ?> /><?php echo lang('Fri'); ?></label>
                                            <div class="alert alert-danger daysAlert<?php echo $i; ?>" style="display:none;"><?php echo lang('choose_days'); ?></div>

                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-lg-1">
                                        <label for="project-title-en" class="control-label col-lg-1"><?php  echo lang( 'hours' ).' '.lang('From');  ?>   *</label>
                                        </div>
                                      <div class="col-lg-4">
                                        <div id="hoursFromDiv<?php echo $i; ?>" class="input-append date">
                                          <input type="text" class="form-control" id="hoursFrom<?php echo $i; ?>" name="hoursFrom<?php echo $i; ?>"  value="<?php if(!empty($item->hoursFrom)) echo date("g:i A", strtotime($item->hoursFrom)); ?>"  required>
                                          <span class="add-on">
                                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                          </span>
                                        </div>
                                      </div>
                                      <div class="col-lg-1">
                                        <label for="project-title-en" class="control-label col-lg-1"><?php  echo lang( 'To' );  ?>   *</label>
                                      </div>
                                      <div class="col-lg-4">
                                        <div id="hoursToDiv<?php echo $i; ?>" class="input-append date">
                                          <input type="text" class="form-control" id="hoursTo<?php echo $i; ?>" name="hoursTo<?php echo $i; ?>"  required value="<?php if(!empty($item->hoursTo)) echo date("g:i A", strtotime($item->hoursTo)); ?>">
                                          <span class="add-on">
                                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                          </span>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group ">
                                      <label for="seatsNum<?php echo $i; ?>" class="control-label col-lg-2"><?php echo lang( 'seatsNum' ); ?>   *</label>
                                      <div class="col-lg-6">
                                          <input type="number" class="form-control" id="seatsNum<?php echo $i; ?>" name="seatsNum<?php echo $i; ?>"  min="0" required value="<?php if(!empty($item->seatsNum)) echo $item->seatsNum; ?>">
                                      </div>
                                      <div class="col-lg-4"></div>
                                    </div>

                                    <div class="form-group ">
                                        <label class="control-label col-lg-2" for="availability<?php echo $i; ?>"><?php echo lang( 'availability' ); ?> *</label>
                                        <div class="col-lg-3">
                                          <select class="form-control m-bot15" id="availability<?php echo $i; ?>" name="availability<?php echo $i; ?>">
                                            <?php if(!empty($item->availability) && $item->availability == 1) { ?>
                                            <option value="1" selected ><?php echo lang('complete'); ?></option>
                                            <option value="0" <?php if (empty($item->availability)) echo lang('selected');  ?>><?php echo lang('available'); ?></option>
                                            <?php } else { ?>
                                            <option value="1"  ><?php echo lang('complete'); ?></option>
                                            <option value="0" selected><?php echo lang('available'); ?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                    </div>
                                </div>

                            <?php } //end foreach groupsData
                            } //end if groupsData
                            else { ?>
                                <input type="hidden" name="itr" id="itr" value="1">
                                <div class="group1">
                                    <h2><?php echo lang('group'); ?>
                                        <button type="button" id="remove1" class="btn btn-danger" onclick="removeItem(1);" ><?php  echo lang("list_delete")  ?></button>
                                    </h2>

                                    <div class="form-group ">
                                      <label for="code1" class="control-label col-lg-2"><?php echo lang( 'group_code' ); ?>   *</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" id="code1" name="code1" required >
                                      </div>
                                      <div class="col-lg-4"></div>
                                    </div>

                                    <div class="form-group ">
                                        <label class="control-label col-lg-2" for="inputSuccess"><?php echo lang( 'days' ); ?> *</label>
                                        <div class="col-lg-8">
                                            <label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days1[]" id="Sat" value="Sat" /><?php echo lang('Sat'); ?> </label>
                                            <label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days1[]" id="Sun" value="Sun" /><?php echo lang('Sun'); ?></label>
                                            <label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days1[]" id="Mon" value="Mon" /><?php echo lang('Mon'); ?></label>
                                            <label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days1[]" id="Tue" value="Tue" /><?php echo lang('Tue'); ?></label>
                                            <label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days1[]" id="Wed" value="Wed" /><?php echo lang('Wed'); ?></label>
                                            <label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days1[]" id="Thu" value="Thu" /><?php echo lang('Thu'); ?></label>
                                            <label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days1[]" id="Fri" value="Fri" /><?php echo lang('Fri'); ?></label>
                                            <div class="alert alert-danger daysAlert1" style="display:none;"><?php echo lang('choose_days'); ?></div>

                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="col-lg-1">
                                        <label for="project-title-en" class="control-label col-lg-1"><?php  echo lang( 'hours' ).' '.lang('From');  ?>   *</label>
                                        </div>
                                      <div class="col-lg-4">
                                        <div id="hoursFromDiv1" class="input-append date">
                                          <input type="text" class="form-control" id="hoursFrom1" name="hoursFrom1"   required>
                                          <span class="add-on">
                                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                          </span>
                                        </div>
                                      </div>
                                      <div class="col-lg-1">
                                        <label for="project-title-en" class="control-label col-lg-1"><?php  echo lang( 'To' );  ?>   *</label>
                                      </div>
                                      <div class="col-lg-4">
                                        <div id="hoursToDiv1" class="input-append date">
                                          <input type="text" class="form-control" id="hoursTo1" name="hoursTo1"  required>
                                          <span class="add-on">
                                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                          </span>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group ">
                                      <label for="seatsNum1" class="control-label col-lg-2"><?php echo lang( 'seatsNum' ); ?>   *</label>
                                      <div class="col-lg-6">
                                          <input type="number" class="form-control" id="seatsNum1" name="seatsNum1"  min="0" required>
                                      </div>
                                      <div class="col-lg-4"></div>
                                    </div>
                                    <input type="hidden" name="availability1" id="availability1" value="0">
                                    <hr/>
                                </div>

                            <?php } //end else groupsData ?>

                        </div>
                    <!-- </div> -->

                <!-- </div>       /packageDatesDiv -->

            </div>
            <br>

            </div>

            <div class="col-lg-12 bottom-form-uptitleAR">

              <div class="form-group">

                <div class="col-lg-offset-9 col-lg-3">

                  <button class="btn btn-success" type="submit"><?php echo lang('Save') ?></button>

                  <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/packages/packageData/'.$packageId); ?>'"><?php echo lang( 'Cancel' ) ?></button>

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

    //startDate
    $('#datetimepicker1').datetimepicker({
      format: 'yyyy-MM-dd',
      pickTime: false,
    });

    //endDate
    $('#datetimepicker2').datetimepicker({
      format: 'yyyy-MM-dd',
      pickTime: false,
    });

    $('#groupBtn').click(function(event) {
        var itr = $('#itr').val();
        // alert(itr);
        itr++;

        $('.groupsDiv').append('<div class="group'+itr+'">'
                +'<h2><?php echo lang("group"); ?>  '
                +'<button type="button" id="remove'+itr+'" class="btn btn-danger" onclick="removeItem('+itr+');" ><?php  echo lang("list_delete")  ?></button></h2>'
                +'<div class="form-group ">'
                  +'<label for="code'+itr+'" class="control-label col-lg-2"><?php echo lang("group_code"); ?> *</label>'
                  +'<div class="col-lg-6">'
                    +'  <input type="text" class="form-control" id="code'+itr+'" name="code'+itr+'" required>'
                  +'</div>'
                  +'<div class="col-lg-4"></div>'
                +'</div>'
                +'<div class="form-group ">'
                    +'<label class="control-label col-lg-2" for="inputSuccess"><?php echo lang("days"); ?> *</label>'
                    +'<div class="col-lg-8">'
                        +'<label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days'+itr+'[]" id="Sat" value="Sat" /><?php echo lang("Sat"); ?> </label>'
                        +'<label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days'+itr+'[]" id="Sun" value="Sun" /><?php echo lang("Sun"); ?></label>'
                        +'<label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days'+itr+'[]" id="Mon" value="Mon" /><?php echo lang("Mon"); ?></label>'
                        +'<label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days'+itr+'[]" id="Tue" value="Tue" /><?php echo lang("Tue"); ?></label>'
                        +'<label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days'+itr+'[]" id="Wed" value="Wed" /><?php echo lang("Wed"); ?></label>'
                        +'<label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days'+itr+'[]" id="Thu" value="Thu" /><?php echo lang("Thu"); ?></label>'
                        +'<label class="checkbox-inline"><input type="checkbox" class="checkboxes" name="days'+itr+'[]" id="Fri" value="Fri" /><?php echo lang("Fri"); ?></label>'
                        +'<div class="alert alert-danger daysAlert'+itr+'" style="display:none;"><?php echo lang("choose_days"); ?></div>'
                    +'</div>'
                +'</div>'

                +'<div class="form-group ">'
                    +'<div class="col-lg-1">'
                    +'<label for="project-title-en" class="control-label col-lg-1"><?php  echo lang("hours").' '.lang("From");  ?>   *</label>'
                    +'</div>'
                  +'<div class="col-lg-4">'
                    +'<div id="hoursFromDiv'+itr+'" class="input-append date">'
                      +'<input type="text" class="form-control" id="hoursFrom'+itr+'" name="hoursFrom'+itr+'" required>'
                      +'<span class="add-on">'
                        +'<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>'
                      +'</span>'
                    +'</div>'
                  +'</div>'
                  +'<div class="col-lg-1">'
                    +'<label for="project-title-en" class="control-label col-lg-1"><?php echo lang("To");  ?>   *</label>'
                  +'</div>'
                  +'<div class="col-lg-4">'
                    +'<div id="hoursToDiv'+itr+'" class="input-append date">'
                      +'<input type="text" class="form-control" id="hoursTo'+itr+'" name="hoursTo'+itr+'" required>'
                      +'<span class="add-on">'
                        +'<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>'
                      +'</span>'
                    +'</div>'
                  +'</div>'
                +'</div>'

                +'<div class="form-group ">'
                  +'<label for="seatsNum" class="control-label col-lg-2"><?php echo lang( "seatsNum" ); ?>   *</label>'
                  +'<div class="col-lg-6">'
                      +'<input type="number" class="form-control" id="seatsNum'+itr+'" name="seatsNum'+itr+'"  min="0" required>'
                  +'</div>'
                  +'<div class="col-lg-4"></div>'
                +'</div>'
                +'<input type="hidden" name="availability'+itr+'" id="availability'+itr+'" value="0">'
                +'<hr/>'
                +'</div>');

        $('#itr').val(itr);

        $('#hoursFromDiv'+itr+'').datetimepicker({
          format: 'HH:mm PP',
          pickDate: false,
          pick12HourFormat: true,   // enables the 12-hour format time picker
          pickSeconds: false         // disables seconds in the time picker
        });

        $('#hoursToDiv'+itr+'').datetimepicker({
          format: 'HH:mm PP',
          pickDate: false,
          pick12HourFormat: true,   // enables the 12-hour format time picker
          pickSeconds: false         // disables seconds in the time picker
        });

        // //check if at least one activity is checked
        // if ($("input[name='days"+itr+"[]']:checked").length > 0) {
        //     $('.daysAlert'+itr+'').css('display', 'none');
        // } else {
        //     $('.daysAlert'+itr+'').css('display', 'block');
        // }
    });

    $('.cmxform').submit(function(event) {

        var itr = $('#itr').val();
        for (var i = 1; i <= itr; i++) {

            //check if at least one activity is checked
            if ($("input[name='days"+itr+"[]']:checked").length > 0) {
                $('.daysAlert'+itr+'').css('display', 'none');
            } else {
                $('.daysAlert'+itr+'').css('display', 'block');
                return false;
            }
        }
    });

    //assign timepiicker to inputs for edit form
    var itr = $('#itr').val();
    for (var i = 1; i <= itr; i++) {

        $('#hoursFromDiv'+i).datetimepicker({
          format: 'HH:mm PP',
          pickDate: false,
          pick12HourFormat: true,   // enables the 12-hour format time picker
          pickSeconds: false         // disables seconds in the time picker
        });

        $('#hoursToDiv'+i).datetimepicker({
          format: 'HH:mm PP',
          pickDate: false,
          pick12HourFormat: true,   // enables the 12-hour format time picker
          pickSeconds: false         // disables seconds in the time picker
        });
    }
});

function removeItem($i) {
    // delete by parents
    $("#remove"+$i).parent().parent().remove();
}

function removeItemForEdit($i, $groupId) {
    alert($i);
    alert($groupId);

    $.ajax({
        url: '<?php echo base_url()."admin/packages/deleteGroup/" ?>' + $groupId,
        type: 'POST',
    })
    .done(function(message) {
        console.log("success");
        if(message === "TRUE") {
            // delete by parents
            $("#remove"+$i).parent().parent().remove();
        }
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });

}
</script>