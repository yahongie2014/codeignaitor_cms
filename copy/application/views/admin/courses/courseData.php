<script src="<?php echo base_url() ?>js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {

        //for lists------------
//check or uncheck all
// Listen for click on toggle checkbox
$('#checkAll').click(function(event) {
  if (this.checked) {
                // Iterate each checkbox
                $('.checkboxes').each(function() {
                  this.checked = true;
                });
              }
              else {
                // Iterate each checkbox
                $(".checkboxes").each(function() {
                  this.checked = false;
                });
              }
            });

$('#table_1').dataTable();
$('#sample_2').dataTable();
$('#sample_3').dataTable();
$('#sample_4').dataTable();
});

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
</script>

<?php if ( $this->session->flashdata( 'msg' ) ) {?>
<div id="divMessage" class="<?php echo $this->session->flashdata( 'msg_class' );?>" >

  <?php echo $this->session->flashdata( 'msg' );?></div><?php }  ?>

  <section id="main-content">

    <section class="wrapper">

      <div class="row">
        <div class="col-lg-12">
          <!--breadcrumbs start -->
          <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang('home'); ?></a></li>
            <li><a href="<?php echo site_url('admin/courses'); ?>"><?php echo lang('courses'); ?></a></li>
            <li class="active"><?php echo  lang('courseData');?></li>
          </ul>
          <!--breadcrumbs end -->
        </div>
      </div>

      <!-- levels start-->
          <?php if(!empty($type) && $type == 'language') {  ?>
      <div class="row">
        <div class="col-lg-12">
         <section class="panel">
          <header class="panel-heading">
            <?php echo lang('levels'); ?>
            <div class="pull-right">
              <a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/courses/level/'.$courseId; ?>"><span class="glyphicon glyphicon-plus"></span> <?php echo lang('form_add'); ?></a>
            </div>
          </header>

          <?php if(!empty($levels)) {  ?>
            <table class="table table-striped border-top" id="sample_1">
              <thead>
                <tr>
                  <th class="hidden-phone">#</th>
                  <th class="hidden-phone"><?php echo lang('title'); ?></th>
                  <th class="hidden-phone"><?php echo lang('User_Name'); ?></th>
                  <th class="hidden-phone"><?php echo lang('addingDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('lastModifiedDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('Actions'); ?></th>
                </tr>
              </thead>
              <tbody>
               <?php $i = 0; ?>
               <?php foreach ($levels as $level) { $i++; ?>
               <tr class="odd gradeX">
                <td><?php echo $i; ?></td>
                <td><?php  if(!empty($level->title)) echo $level->title; ?></td>
                <td><?php  if(!empty($level->username)) echo $level->username; ?></td>
                <td><?php  if(!empty($level->addingDate)) echo $level->addingDate; ?></td>
                <td><?php  if(!empty($level->lastModifiedDate) && $level->lastModifiedDate != '0000-00-00 00:00:00') echo $level->lastModifiedDate; ?></td>
                <td>
                    <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/courses/level/'.$level->courseId.'/'.$level->id; ?>"><span class="glyphicon glyphicon-cog"></span> <?php echo lang('edit'); ?></a>

                    <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/courses/delete/'.$level->id.'/level/'.$level->courseId; ?>"  onClick="return Del_Confirm(); "><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a>
                </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>

            <?php } //if levels  ?>
        </section>
        </div>
      </div>
      <hr/>
            <?php } //if type  ?>
      <!-- levels end-->


      <!-- stages start-->
      <div class="row">
        <div class="col-lg-12">
         <section class="panel">
          <header class="panel-heading">
            <?php echo lang('stages'); ?>
            <div class="pull-right">
              <a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/courses/stage/'.$courseId; ?>"><span class="glyphicon glyphicon-plus"></span> <?php echo lang('form_add'); ?></a>
            </div>
          </header>
          <?php if(!empty($stages)){  ?>
          <form class='cmxform form-horizontal tasi-form' method='post' action="<?php echo base_url() . 'admin/courses/delete' ?>">
            <table class="table table-striped border-top" id="sample_1">
              <thead>
                <tr>
                  <th class="hidden-phone">#</th>
                  <th class="hidden-phone"><?php echo lang('subTitle'); ?></th>
                  <th class="hidden-phone"><?php echo lang('title'); ?></th>
                  <th class="hidden-phone"><?php echo lang('duration'); ?></th>
                  <th class="hidden-phone"><?php echo lang('User_Name'); ?></th>
                  <th class="hidden-phone"><?php echo lang('addingDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('lastModifiedDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('Actions'); ?></th>
                </tr>
              </thead>
              <tbody>
               <?php $i = 0; ?>
               <?php foreach ($stages as $stage) { $i++; ?>
               <tr class="odd gradeX">
                <td><?php echo $i; ?></td>
                <td><?php  if(!empty($stage->subTitle)) echo $stage->subTitle; ?></td>
                <td><?php  if(!empty($stage->title)) echo $stage->title; ?></td>
                <td><?php  if(!empty($stage->duration) && !empty($stage->durationText)) echo $stage->duration.' '.lang($stage->durationText); ?></td>
                <td><?php  if(!empty($stage->username)) echo $stage->username; ?></td>
                <td><?php  if(!empty($stage->addingDate)) echo $stage->addingDate; ?></td>
                <td><?php  if(!empty($stage->lastModifiedDate) && $stage->lastModifiedDate != '0000-00-00 00:00:00') echo $stage->lastModifiedDate; ?></td>
                <td>
                    <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/courses/stage/'.$stage->courseId.'/'.$stage->id; ?>"><span class="glyphicon glyphicon-cog"></span> <?php echo lang('edit'); ?></a>

                    <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/courses/delete/'.$stage->id.'/stage/'.$stage->courseId; ?>"  onClick="return Del_Confirm(); "><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a>
                </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            </form>
            <?php } else {  echo lang('no_data');  }  ?>
        </section>
        </div>
      </div>
      <!-- stages end-->

      <hr/>

      <!-- courseDates start-->
      <div class="row">
        <div class="col-lg-12">
         <section class="panel">
          <header class="panel-heading">
            <?php echo lang('courseDates'); ?>
            <div class="pull-right">
              <a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/courses/dates/'.$courseId; ?>"><span class="glyphicon glyphicon-plus"></span> <?php echo lang('form_add'); ?></a>
            </div>
          </header>
          <?php if(!empty($courseDates)){  ?>
          <form class='cmxform form-horizontal tasi-form' method='post' action="<?php echo base_url() . 'admin/courses/delete' ?>">
            <table class="table table-striped border-top" id="sample_2">
              <thead>
                <tr>
                  <th class="hidden-phone">#</th>
                  <th class="hidden-phone"><?php echo lang('startDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('endDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('User_Name'); ?></th>
                  <th class="hidden-phone"><?php echo lang('addingDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('lastModifiedDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('Actions'); ?></th>
                </tr>
              </thead>
              <tbody>
               <?php $i = 0; ?>
               <?php foreach ($courseDates as $item) { $i++; ?>
               <tr class="odd gradeX">
                <td><?php echo $i; ?></td>
                <td><?php  if(!empty($item->startDate)) echo $item->startDate; ?></td>
                <td><?php  if(!empty($item->endDate)) echo $item->endDate; ?></td>
                <td><?php  if(!empty($item->username)) echo $item->username; ?></td>
                <td><?php  if(!empty($item->addingDate)) echo $item->addingDate; ?></td>
                <td><?php  if(!empty($item->lastModifiedDate) && $item->lastModifiedDate != '0000-00-00 00:00:00') echo $item->lastModifiedDate; ?></td>
                <td>
                    <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/courses/dates/'.$item->courseId.'/'.$item->id; ?>"><span class="glyphicon glyphicon-cog"></span> <?php echo lang('edit'); ?></a>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/courses/delete/'.$item->id.'/dates/'.$item->courseId; ?>"  onClick="return Del_Confirm(); "><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a>
                </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            </form>
            <?php } else {  echo lang('no_data');  }  ?>
        </section>
        </div>
      </div>
      <!-- courseDates end-->


    </section>

  </section>