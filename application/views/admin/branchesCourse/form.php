<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<?php
if (!empty($returnedData)) {
    extract((array) $returnedData);
} else {
  $id = '';
} ?>

<?php 
// echo '<pre>';
//print_r($branches);
//echo '</pre>';
//exit();
?>
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
          <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang( 'home' ); ?></a></li>
          <li><a href="<?php echo base_url().'admin/branchesCourse/'; ?>"><?php echo lang( 'courses' ); ?></a></li>
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

           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/branchesCourse/form/'.$id); ?>">
            <!-- tabbed content -->
          <div class="panel-body">


      
                    <div class="form-group ">
                      <label for="project-title-en" class="control-label col-lg-2"><?php echo lang( 'arabic_title' ); ?>   *</label>
                      <div class="col-lg-6">
                          <input class=" form-control" id="titleAR" name="titleAR" disabled="disabled" value="<?php echo !empty($titleAR) ?  $titleAR : set_value('titleAR');   ?>" type="text" />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('titleAR');?></div>
                    </div>

          
   
              

            </div>

            <div class="col-lg-12 bottom-form-update">

              <div class="form-group">

                <div class="col-lg-offset-9 col-lg-3">

                  <button class="btn btn-success" type="submit"><?php echo lang('Save'); ?></button>

                  <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/branchesCourse'); ?>'"><?php echo lang( 'Cancel' ); ?></button>

                </div>

              </div>

            </div>

          </form>

             
              <div class="input_fields_wrap">
    <button class="add_field_button">Add More Fields</button>
    <div><input type="text" name="mytext[]"></div>
</div>
           
        </div>
      </section>

    </div>

  </div>

  <!-- page end-->

</section>

</section>
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script type="text/javascript">// <![CDATA[

$(document).ready(function () {
    $('#startDiv').datetimepicker({
        format: 'yyyy-MM-dd',
      pickTime: false,
    });
  
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
            $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
//
//$(document).ready(function() {
//    var max_fields      = 20; //maximum input boxes allowed
//    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
//    var add_button      = $(".add_field_button"); //Add button ID
//    
//    var x = 1; //initlal text box count
//    $(add_button).click(function(e){ //on add input button click
//        e.preventDefault();
//            x++; //text box increment
//            $(wrapper).append('<div><label class="control-label col-lg-2" for="inputSuccess"><?=lang("Coursesdatesnum");?>'+x+'</label><br /><hr /><div class="form-group"><label for="branchesId" class="col-lg-2 control-label"><?php echo lang("Branches"); ?> * </label><div class="col-lg-6"><select class="form-control" id="branchesId" name="branches['+(x-1)+'][branchesId]"><option  value="#"><?php echo lang("choose"); ?></option><?php foreach ( $branches as $item ) { ?><option value="<?php echo $item->id; ?>" <?php if($item->id==$items->branchesId){ echo "selected=selected"; }?> > <?php echo $item->title; ?></option><?php } //end foreach ?></select></div><div class="col-lg-4"><?php echo form_error("branches['+(x-1)+'][branchesId]");?></div></div><div class="form-group "><label for="duration" class="control-label col-lg-2"><?php echo lang( "price" ); ?>   *</label><div class="col-lg-6"><input class="form-control" id="duration" name="branches['+(x-1)+'][price]" value="<?php echo !empty($items->price) ?  $items->price : set_value("price"); ?>" type="number"  /></div><div class="col-lg-4"><?php echo form_error("branches['+(x-1)+'][price]"); ?></div></div><div class="form-group "><label for="duration" class="control-label col-lg-2"><?php echo lang( "duration" ); ?>   *</label><div class="col-lg-6"><input class="form-control" id="duration" name="branches['+(x-1)+'][duration]" value="<?php echo !empty($items->duration) ?  $items->duration : set_value("duration"); ?>" type="number"  /></div><div class="col-lg-4"><?php echo form_error("branches['+(x-1)+'][duration]"); ?></div></div><div class="form-group "><label for="weeksNum" class="control-label col-lg-2"><?php echo lang( "weeksNum" ); ?>   </label><div class="col-lg-6"><input class="form-control" id="weeksNum" name="branches['+(x-1)+'][weeksNum]" value="<?php echo !empty($items->weeksNum) ?  $items->weeksNum : set_value("weeksNum"); ?>" type="number" /></div><div class="col-lg-4"><?php echo form_error("branches['+(x-1)+'][weeksNum]"); ?></div></div><div class="form-group "><label for="lecturesNum" class="control-label col-lg-2"><?php echo lang( "lecturesNum" ); ?>   </label><div class="col-lg-6"><input class="form-control" id="lecturesNumAR" name="branches['+(x-1)+'][lecturesNum]" value="<?php echo !empty($items->lecturesNum) ?  $items->lecturesNum : set_value("lecturesNum"); ?>" type="number" /></div><div class="col-lg-4"><?php echo form_error("branches['+(x-1)+'][lecturesNum]"); ?></div></div><div class="form-group "><label for="start" class="control-label col-lg-2"><?php  echo lang( "startTime" );  ?>   *</label><div class="col-lg-6"><div id="startDiv" class="input-append date"><input type="text" class="form-control" id="start" name="branches['+(x-1)+'][start]"   value="<?php  echo !empty($items->start) ?  date("l jS \of F Y", strtotime($items->start)) : set_value("start");    ?>"><span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span></div></div><div class="col-lg-4"><?php  echo form_error("branches['+(x-1)+'][start]"); ?></div></div><a href="#" class="btn btn-danger remove_field"><?=lang("delete");?></a></div>'); //add input box
//    });
//    
//    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
//        e.preventDefault(); $(this).parent('div').remove(); x--;
//    })
//});
</script>