<style type="text/css">
.error{
  color: #ff0000;
}
</style>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<script type="text/javascript">
function updateDatabase(newLat, newLng)
{
  $('#latitude').val(newLat);
  $('#lagitude').val(newLng);
}
</script>
<?php echo $map['js']; ?>
<?php
if ( !empty( $branchesInfo )) {
  $ID           = (int)$branchesInfo->id;
  $latitude    = $branchesInfo->latitude;
  $lagitude    = $branchesInfo->lagitude;
  $tel    = $branchesInfo->phone;
  $mail    = $branchesInfo->mail;
  $titleGE    = $branchesInfo->titleGE;
    $titleAR    = $branchesInfo->titleAR;
      $desGE    = $branchesInfo->desGE;
    $desAR    = $branchesInfo->desAR;

} ?>



<?php
if (!empty($branchesInfo)) {
    extract((array) $branchesInfo);
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
          <li><a href="<?php echo base_url().'admin/branches/'; ?>"><?php echo lang( 'branches' ); ?></a></li>
          <li class="active"><?php if(!empty($branchesInfo)){ echo lang( 'edit' ); } else{ echo lang('add_new'); } ?></li>
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

           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/branches/form/'.$id); ?>">
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

                
                        <!-- hidden inputs -->
              <input type="hidden" name="latitude" id="latitude" value="<?php if (!empty($latitude)) {
               echo $latitude; } ?>"/>
              <input type="hidden" name="lagitude" id="lagitude" value="<?php if(!empty($lagitude)) {echo $lagitude; }?>"/>
              <div class="form-group ">
                  <div class="col-lg-12">
                    <?php echo lang('map_message'); ?>
                    <br/>
                    <br/>
                    <?php echo $map['html']; ?>
                  </div>
                  <!--   <div class="col-lg-4"></div> -->
              </div>

              
            <!-- tabbed content -->
          <div class="panel-body">

            <div class="tab-content">

                <!-- arabic -->
                <div id="home-36" class="tab-pane active">
                    <div class="form-group ">
                      <label for="titleAR" class="control-label col-lg-2"><?php echo lang( 'bransh_name' ); ?>   *</label>
                      <div class="col-lg-6">
                        <input class=" form-control" id="titleAR" name="titleAR" value="<?php echo !empty($titleAR) ?  $titleAR : set_value('titleAR');   ?>" type="text" />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('titleAR');?></div>
                    </div>
           
                    
                    <!-- des200AR -->
                    <div class="form-group ">
                        <label for="desAR" class="control-label col-lg-2"><?php echo lang( 'arabic_title' ); ?>  </label>
                        <div class="col-lg-6">
                          <input class=" form-control" id="desAR" name="desAR" value="<?php echo !empty($desAR) ?  $desAR : set_value('desAR');   ?>" type="text" />
                        </div>
                        <div class="col-lg-4"><?php echo form_error('desAR');?></div>
                    </div>
                </div>

                <!-- german -->
                <div id="about-36" class="tab-pane">

                    <div class="form-group ">
                      <label for="titleGE" class="control-label col-lg-2"><?php echo lang( 'title' ); ?>   *</label>
                      <div class="col-lg-6">
                        <input class=" form-control" id="titleGE" name="titleGE" value="<?php echo !empty($titleGE) ?  $titleGE : set_value('titleGE');   ?>" type="text" />
                      </div>
                      <div class="col-lg-4"><?php echo form_error('titleGE');?></div>
                    </div>

                    <!-- des200GE -->
                    <div class="form-group ">
                        <label for="desGE" class="control-label col-lg-2"><?php echo lang( 'des200GE' ); ?>  </label>
                        <div class="col-lg-6">
                          <textarea class="form-control " id="desGE" name="desGE"> <?php if(!empty($desGE)){ echo $desGE; } else{ echo set_value('desGE'); } ?></textarea>
                        </div>
                        <div class="col-lg-4"><?php echo form_error('desGE');?></div>
                    </div>

                </div>
<hr/>

  

                    <div class="form-group ">
                      <label for="phone" class="control-label col-lg-2"><?php echo lang( 'phone' ); ?>   *</label>
                      <div class="col-lg-6">
                        <input class="form-control" id="phone" name="phone" value="<?php echo !empty($phone) ?  $phone : set_value('phone'); ?>" type="text"/>
                      </div>
                      <div class="col-lg-4"><?php echo form_error('phone'); ?></div>
                    </div>

                    <div class="form-group ">
                      <label for="mail" class="control-label col-lg-2"><?php echo lang( 'Email' ); ?>   </label>
                      <div class="col-lg-6">
                        <input class="form-control" id="mail" name="mail" value="<?php echo !empty($mail) ?  $mail : set_value('mail'); ?>" type="text"/>
                      </div>
                      <div class="col-lg-4"><?php echo form_error('mail'); ?></div>
                    </div>

                <div class="form-group ">
                    <label class="control-label col-lg-2" for="inputSuccess"><?php echo lang( 'status' ); ?> *</label>
                    <div class="col-lg-3">
                      <select class="form-control m-bot15" id="slc_status" name="isActive">
                        <?php if (!empty($branchesInfo)){ ?>
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

                  <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/branches'); ?>'"><?php echo lang( 'Cancel' ); ?></button>

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