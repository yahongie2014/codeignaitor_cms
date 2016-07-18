<?php
if (!empty($returnedData)) {
    extract((array) $returnedData);
} else {
  $id = 0;
}
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
          <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang( 'home' ); ?></a></li>
          <?php if(!empty($traineeId)) { ?>
          <li><a href="<?php echo base_url().'admin/trainees/'; ?>"><?php echo lang( 'trainees' ); ?></a></li>
          <li><a href="<?php echo base_url().'admin/trainees/applications/'.$traineeId; ?>"><?php echo lang( 'applications' ); ?></a></li>
          <?php } //if traineeId
          else { ?>
          <li><a href="<?php echo base_url().'admin/courses/'; ?>"><?php echo lang( 'courses' ); ?></a></li>
          <?php } ?>
          <li class="active"><?php if(!empty($returnedData)) { echo lang( 'edit' ); } else { echo lang('add_new'); } ?></li>

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
            <?php if(!empty($traineeId)) { ?>
           <form class="cmxform form-horizontal tasi-form" id="assignForm" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/trainees/assignAjax/'.$id.'/'.$traineeId); ?>">
            <?php } else { ?>
           <form class="cmxform form-horizontal tasi-form" id="assignForm" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/trainees/assignAjax/'.$id); ?>">
            <?php } ?>

          <div class="panel-body">

            <div class="tab-content">

                    <div id="validation-messages"></div>

                <?php if(empty($traineeId)) { ?>
                <div class="form-group ">
                  <label for="name" class="control-label col-lg-2"><?php echo lang( 'trainees' ); ?>   *</label>
                  <div class="col-lg-6">

                    <select id="traineeId" name="traineeId" class="trainees form-control">
                          <option value="#" selected="selected"><?php echo lang('choose'); ?></option>
                          <?php if(!empty($trainees)) {
                            foreach ($trainees as $wr) { ?>
                            <option value="<?php echo $wr->id; ?>" <?php if(!empty($returnedData)  && ($wr->id == $traineeId)) echo "selected"; ?> ><?php echo $wr->name; ?></option>
                            <?php }//foreach
                          }//if trainees ?>
                    </select>

                  </div>
                  <div class="col-lg-4"><!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal"><?php echo lang('add_new'); ?></button>
                    <br/><?php echo form_error('traineeId'); ?>
                  </div>
                </div>
                <?php } //if traineeId ?>

                <h3><?php echo lang('courseData'); ?></h3>
                        <input type="hidden" name="type" value="<?php echo !empty($type) ?  $type : set_value('type'); ?>">
                    <div class="form-group">
                        <label for="categoryId" class="col-lg-2 control-label"><?php echo lang('Category'); ?> * </label>
                        <div class="col-lg-6">
                          <select class="form-control" id="categoryId" name="categoryId">

                          <!-- <option value="#" selected="selected"><?php echo lang('choose'); ?></option> -->
                          <?php if(!empty($categories)) {
                            foreach ($categories as $wr) { ?>
                            <option value="<?php echo $wr->id; ?>" <?php if(!empty($returnedData)  && ($wr->id == $categoryId)) echo "selected"; ?> ><?php echo $wr->title; ?></option>
                            <?php }//foreach
                          }//if categories ?>

                          </select>
                        </div>
                        <div class="col-lg-4"><?php echo form_error('categoryId');?></div>
                    </div>

                <div class="form-group coursesDiv">
                  <label for="courseId" class="control-label col-lg-2"><?php echo lang( 'courses' ); ?>  *</label>
                  <div class="col-lg-6">
                    <select name="courseId" id="courseId" class=" form-control" >
                    </select>
                  </div>
                  <div class="col-lg-4"><?php echo form_error('courseId');?></div>
                </div>

                <div class="form-group ">
                  <label for="price" class="control-label col-lg-2"><?php echo lang( 'price' ); ?>   *</label>
                  <div class="col-lg-6">
                    <input class="form-control number" id="price" name="price" value="<?php echo !empty($price) ?  $price : set_value('price'); ?>" type="text" />
                  </div>
                  <div class="col-lg-4"><?php echo form_error('price');?></div>
                </div>

                <div class="form-group ">
                  <label for="status" class="control-label col-lg-2"><?php echo lang( 'status' ); ?>  </label>
                  <div class="col-lg-6">
                    <select name="status" id="status" class=" form-control" >
                      <!-- <option value="0"><?php echo lang('choose'); ?></option> -->
                      <option value='pending' <?php echo set_select('status', 'pending', ( !empty($status) && $status == "pending" ? TRUE : FALSE )); ?> > <?php echo lang('pending'); ?> </option>
                      <option value='normal' <?php echo set_select('status', 'normal', ( !empty($status) && $status == "normal" ? TRUE : FALSE )); ?> > <?php echo lang('normal'); ?> </option>
                      <option value='hold' <?php echo set_select('status', 'hold', ( !empty($status) && $status == "hold" ? TRUE : FALSE )); ?> > <?php echo lang('hold'); ?> </option>
                      <option value='passed' <?php echo set_select('status', 'passed', ( !empty($status) && $status == "passed" ? TRUE : FALSE )); ?> > <?php echo lang('passed'); ?> </option>
                      <option value='failed' <?php echo set_select('status', 'failed', ( !empty($status) && $status == "failed" ? TRUE : FALSE )); ?> > <?php echo lang('failed'); ?> </option>
                      <option value='canceled' <?php echo set_select('status', 'canceled', ( !empty($status) && $status == "canceled" ? TRUE : FALSE )); ?> > <?php echo lang('canceled'); ?> </option>
                    </select>
                  </div>
                  <div class="col-lg-4"><?php echo form_error('status');?></div>
                </div>

            </div>
            <br>



            </div>

            <div class="col-lg-12 bottom-form-update">

              <div class="form-group">

                <div class="col-lg-offset-9 col-lg-3">

                  <button class="btn btn-success" type="submit"><?php echo lang('Save'); ?></button>

                    <?php if(!empty($traineeId)) { ?>
                  <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/trainees/applications/'.$traineeId); ?>'"><?php echo lang( 'Cancel' ) ?></button>
                  <?php } else { ?>
                  <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/trainees/assign/0'); ?>'"><?php echo lang( 'Cancel' ); ?></button>
                  <?php } ?>

                </div>

              </div>

            </div>

          </form>

        </div>
      </section>

    </div>



    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo lang('trainees').' '.lang('add_new'); ?></h4>
          </div>
            <form class="cmxform form-horizontal tasi-form" id="traineeForm" method="post">

                <div class="modal-body">

                    <div id="validation-error"></div>

                  <div class="panel-body">

                    <div class="tab-content">

                        <div class="form-group ">
                          <label for="name" class="control-label col-lg-2"><?php echo lang( 'Name' ); ?>   *</label>
                          <div class="col-lg-6">
                            <input class="form-control" id="name" name="name" value="<?php echo !empty($name) ?  $name : set_value('name'); ?>" type="text" />
                          </div>
                          <div class="col-lg-4"><?php echo form_error('name');?></div>
                        </div>

                        <div class="form-group ">
                          <label for="phone" class="control-label col-lg-2"><?php echo lang( 'Phone' ); ?>   *</label>
                          <div class="col-lg-6">
                            <input class="form-control" id="phone" name="phone" value="<?php echo !empty($phone) ?  $phone : set_value('phone'); ?>" type="text" />
                          </div>
                          <div class="col-lg-4"><?php echo form_error('phone');?></div>
                        </div>

                        <div class="form-group ">
                          <label for="email" class="control-label col-lg-2"><?php echo lang( 'Email' ); ?>   *</label>
                          <div class="col-lg-6">
                            <input class="form-control" id="email" name="email" value="<?php echo !empty($email) ?  $email : set_value('email'); ?>" type="text" />
                          </div>
                          <div class="col-lg-4"><?php echo form_error('email');?></div>
                        </div>

                        <div class="form-group ">
                          <label for="college_work" class="control-label col-lg-2"><?php echo lang( 'college_work' ); ?>   *</label>
                          <div class="col-lg-6">
                            <input class="form-control" id="college_work" name="college_work" value="<?php echo !empty($college_work) ?  $college_work : set_value('college_work'); ?>" type="text" />
                          </div>
                          <div class="col-lg-4"><?php echo form_error('college_work');?></div>
                        </div>

                    </div>
                    <br>

                    </div>

              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit"><?php echo lang('Save'); ?></button>
                <button type="button" class="btn btn-danger" id="closeModal" data-dismiss="modal"><?php echo lang( 'Cancel' ); ?></button>
              </div>
            </form>
        </div>

      </div>
    </div><!-- / Modal -->

  </div>

  <!-- page end-->

</section>

</section>
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {

    //language courses
    $('#categoryId').change(function(event) {
        //get language courses

        var categoryId = $('#categoryId').val();

        $("#courseId"+" > option").remove(); //first of all clear select items
        var url = "<?php echo base_url(); ?>admin/trainees/get_courses/" + categoryId ;
        // alert(url);
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: url, //here we are calling our user controller and get_groups method with the dateId
            success: function(courses) //we're calling the response json array 'courses'
            {
              // console.log(courses);
              $.each(courses, function(id, item) //here we're doing a foeach loop round each item with id as the key and item as the value
              {
                   var opt = $('<option />'); // here we're creating a new select option with for each item
                   opt.val(id);
                   opt.text(item);
                  $('#courseId').append(opt); //here we will append these new select options to a dropdown with the id 'courses'

              });

                ////////for edit
                $('select[name="courseId"]').find('option[value="<?php if(!empty($courseId)) echo $courseId; ?>"]').attr("selected", "selected");
                /////////////
              $('#courseId').trigger('change');
            }
        });
    });

    //dates
    $('#courseId').change(function() { //any select change on the dropdown with id language trigger this code

        var courseId = $('#courseId').val();  // here we are taking language id of the selected one.
        var url = "<?php echo base_url(); ?>admin/trainees/get_course_data/" + courseId+'/course' ;
        // alert(url);
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: url, //here we are calling our user controller and get_course_data method with the courseId
            success: function(response) //we're calling the response json array 'dates'
            {
               // console.log(response[0]);
               $('#price').val(response[0]);
            }
        });

        //////////for edit
        // $('#price').val(<?php if(!empty($price)) echo $price; ?>);
        ///////////////

    });

    //allow float numbers only
    $('.number').keypress(function(event) {
         if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46)
              return true;

         else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))
              event.preventDefault();
    });

    $('#assignForm').on('submit', function(evnt) {
        evnt.preventDefault();
        var form = $(this);

        tinyMCE.triggerSave();

        var data = {};
        $(this).find('[name]').each(function(index,value) {
            var that = $(this);
            name = that.attr('name');
            value = that.val();
            data[name] = value;
        });
        // console.log(data);

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(response) {
                // console.log(response);
                //remove all errors
                $( ".error" ).remove();
                if (response.status == true) {
                        //redirect
                    <?php if(!empty($traineeId)) { ?>
                    // similar behavior as clicking on a link
                    window.location.href = '<?php echo base_url(). "admin/trainees/applications/".$traineeId; ?>';
                    <?php } else { ?>
                    window.location.href = '<?php echo base_url(). "admin/trainees/assign/0"; ?>';
                    <?php } ?>
                } else {
                    if(response.message != null && response.message != '') {
                      $('#validation-messages').html(message);
                    }

                    $.each(response.errors, function(key, val) {
                        $('[name="'+ key +'"]', form).after(val);
                    })
                }
            }
        });
    });


});
</script>

<?php if (!empty($returnedData)) { ?>
   <script type="text/javascript">
   $(document).ready(function() {

        //populate categoryId select
        //Using the value
        $('select[name="categoryId"]').find('option[value="<?php if(!empty($categoryId)) echo $categoryId;   ?>"]').attr("selected", "selected");

        $('#categoryId').trigger("change");

        //populate status select
        //Using the value
        $('select[name="status"]').find('option[value="<?php if(!empty($status)) echo $status;   ?>"]').attr("selected", "selected");

        $('#status').trigger("change");

   });
   </script>
<?php } ?>

<?php if(empty($traineeId)) { ?>

<!-- select 2 -->
<script src="<?php echo base_url(); ?>assets/select2/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/select2/js/select2.js"></script>
<link href="<?php echo base_url(); ?>assets/select2/css/select2.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
jQuery(function($) {

      $("select.trainees").select2({
        placeholder: "<?php echo lang('trainees'); ?>"
      });

      //populate traineeId select
      //Using the value
      $('select[name="traineeId"]').find('option[value="<?php echo !empty($traineeId) ?  $traineeId : set_value('traineeId');   ?>"]').attr("selected",true);

      $('.trainees').trigger("change");


    $('#traineeForm').on('submit', function(evnt){
        evnt.preventDefault();
        var form = $(this);
        var data = {};
        $(this).find('[name]').each(function(index,value){
            var that = $(this);
            name = that.attr('name');
            value = that.val();
            data[name] = value;
        });
        // console.log(data);

        $.ajax({
            url: "<?php echo site_url('admin/trainees/addAjax'); ?>",
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(response) {
                // console.log(response);
                // console.log(response.trainees);
                //remove all errors
                $( ".error" ).remove();
                if (response.status == true) {
                    //reset form
                    $("#traineeForm")[0].reset();
                    //populate select2 options
                    $("select.trainees").select2({
                      data: response.trainees
                    });
                    //select last inserted option
                    $("select.trainees").val(response.id).trigger("change");

                    //close the modal
                    $("[data-dismiss=modal]").trigger({ type: "click" });

                }else{
                    if(response.message != null && response.message != ''){
                      $('#validation-error').html(message);
                    }

                    $.each(response.errors, function(key, val) {
                        $('[name="'+ key +'"]', form).after(val);
                    })
                }
            }
        });
    });
});
</script>
<?php } //if traineeId ?>