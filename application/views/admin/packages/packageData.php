<section id="main-content">

    <section class="wrapper">

      <div class="row">
        <div class="col-lg-12">
          <!--breadcrumbs start -->
          <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang('home'); ?></a></li>
            <li><a href="<?php echo site_url('admin/packages'); ?>"><?php echo lang('packages'); ?></a></li>
            <li class="active"><?php echo  lang('courses'); ?></li>
          </ul>
          <!--breadcrumbs end -->
        </div>
      </div>

      <!-- courses start-->
      <div class="row">
        <div class="col-lg-12">
         <section class="panel">
          <header class="panel-heading">
            <?php echo lang('courses'); ?>
            <div class="pull-right">
              <a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/packages/course/'.$packageId; ?>"><span class="glyphicon glyphicon-plus"></span> <?php echo lang('form_add'); ?></a>
            </div>
          </header>
            <?php if ( $this->session->flashdata( 'msg' ) ) { ?>
            <div id="divMessage" class="<?php echo $this->session->flashdata( 'msg_class' );?>" >

              <?php echo $this->session->flashdata( 'msg' );?></div><?php }  ?>

          <?php if(!empty($courses)){  ?>
          <form class='cmxform form-horizontal tasi-form'  id='form11' method='post' action="<?php echo base_url() . 'admin/packages/delete' ?>">
            <table class="table table-striped border-top" id="sample_1">
              <thead>
                <tr>
                  <th class="hidden-phone">#</th>
                  <th class="hidden-phone"><?php echo lang('title'); ?></th>
                  <!-- <th class="hidden-phone"><?php echo lang('duration'); ?></th> -->
                  <th class="hidden-phone"><?php echo lang('User_Name'); ?></th>
                  <th class="hidden-phone"><?php echo lang('addingDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('lastModifiedDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('Actions'); ?></th>
                </tr>
              </thead>
              <tbody>
               <?php $i = 0; ?>
               <?php foreach ($courses as $course) { $i++; ?>
               <tr class="odd gradeX">
                <td><?php echo $i; ?></td>
                <td><?php  if(!empty($course->title)) echo $course->title; ?></td>
                <!-- <td><?php  //if(!empty($course->duration) && !empty($course->durationText)) echo $course->duration.' '.lang($course->durationText); ?></td> -->
                <td><?php  if(!empty($course->username)) echo $course->username; ?></td>
                <td><?php  if(!empty($course->addingDate)) echo $course->addingDate; ?></td>
                <td><?php  if(!empty($course->lastModifiedDate) && $course->lastModifiedDate != '0000-00-00 00:00:00') echo $course->lastModifiedDate; ?></td>
                <td>
                    <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/packages/course/'.$course->packageId.'/'.$course->id; ?>"><span class="glyphicon glyphicon-cog"></span> <?php echo lang('edit'); ?></a>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/packages/delete/'.$course->id.'/course/'.$course->packageId; ?>"  onClick="return Del_Confirm(); "><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a>
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
      <!-- courses end-->


    </section>

  </section>
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
});

function submitForm()
{
  var result = Del_Confirm();
  if(result == true)
  {
    $('#form11').submit();
  }
}

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
