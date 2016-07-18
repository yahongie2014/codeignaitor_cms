<!--main content start-->
<section id="main-content">
  <section class="wrapper">

    <?php if(!empty($latestStudents)) { ?>
    <div class="row stream">
      <div class="col-lg-12">
          <!--custom chart start-->
          <section class="panel">
              <header class="panel-heading">
                  <?php echo lang('latest_registered_students'); ?>
              </header>
              <table class="table table-striped border-top" id="sample_1">
                  <thead>
                      <tr>
                        <th><?php echo lang('Name'); ?></th>
                        <th class="hidden-phone"><?php echo lang('registration_date'); ?></th>
                        <th class="hidden-phone"><?php echo lang('courseName'); ?></th>
                        <th class="hidden-phone"><?php echo lang('Type'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($latestStudents as $item) { ?>
                    <tr>
                      <th><?php  if(!empty($item->name)) echo $item->name; ?></th>
                      <th class="hidden-phone"><?php  if(!empty($item->registrationDate)) echo date('Y-m-d', strtotime($item->registrationDate)); ?></th>
                      <th class="hidden-phone"><?php  if(!empty($item->courseName)) echo $item->courseName; ?></th>
                      <th class="hidden-phone"><?php  if(!empty($item->type) && $item->type == 1) echo "PayPal"; else echo "Book & Pay Later"; ?></th>
                  </tr>
                  <?php } //foreach latestStudents ?>
              </tbody>
          </table>
      </section>

  </div>

</div>
<?php } //if latestStudents ?>

<?php if(!empty($pendingApplications)) { ?>
<div class="row stream">
  <div class="col-lg-12">
      <!--custom chart start-->
      <section class="panel">
          <header class="panel-heading">
              <?php echo lang('pending_registration'); ?>
          </header>
          <table class="table table-striped border-top" id="sample_2">
              <thead>
                  <tr>
                      <th><?php echo lang('Name'); ?></th>
                      <th class="hidden-phone"><?php echo lang('registration_date'); ?></th>
                      <th class="hidden-phone"><?php echo lang('courseName'); ?></th>
                  </tr>
              </thead>
              <tbody>

                <?php foreach ($pendingApplications as $item) { ?>
                <tr>
                  <th><?php  if(!empty($item->name)) echo $item->name; ?></th>
                  <th class="hidden-phone"><?php  if(!empty($item->registrationDate)) echo date('Y-m-d', strtotime($item->registrationDate)); ?></th>
                  <th class="hidden-phone"> <?php  if(!empty($item->courseName)) echo $item->courseName; ?></th>
              </tr>
              <?php } //foreach pendingApplications ?>
          </tbody>
      </table>
  </section>
</div>
</div>
<?php } //if pendingApplications ?>


<!-- contactMessages start-->
<div class="row">
  <div class="col-lg-12">
   <section class="panel">
      <header class="panel-heading">
       <?php echo lang( 'contact_us' ); ?>
   </header>

   <?php if (!empty($contactMessages)) {  ?>
   <table class="table table-striped border-top" id="sample_3">
      <thead>
        <tr>
          <th class="hidden-phone"><?php echo lang('Name'); ?></th>
          <th class="hidden-phone"><?php echo lang('Email'); ?></th>
          <th class="hidden-phone"><?php echo lang('date'); ?></th>
          <th class="hidden-phone"><?php echo lang('Actions'); ?></th>
      </tr>
  </thead>
  <tbody>
     <?php
     $i = -1;
     ?>
     <?php foreach ($contactMessages as $ne) {
       $i++;
       ?>
       <tr class="odd gradeX">
          <td><?php echo $ne->name; ?></td>
          <td><?php echo $ne->email; ?></td>
          <td><?php echo $ne->date; ?></td>

          <td>
            <a class="btn btn-sm btn-success" href="<?php echo base_url().'admin/contactUs/single/'.$ne->id; ?>"><span class="glyphicon glyphicon-file"></span> <?php echo lang('list_view'); ?></a>
            <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/contactUs/delete/'.$ne->id; ?>"><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a>
        </td>
    </tr>
    <?php } ?>


</tbody>
</table>
                <?php } //end if contactMessages
                else{ echo lang('no_data'); }       ?>
            </section>
        </div>
    </div>
    <!-- contactMessages end-->

<!-- feedbackMessages start-->
<div class="row">
  <div class="col-lg-12">
   <section class="panel">
      <header class="panel-heading">
       <?php echo lang( 'feedback' ); ?>
   </header>

   <?php if (!empty($feedbackMessages)) {  ?>
   <table class="table table-striped border-top" id="sample_3">
      <thead>
        <tr>
          <th class="hidden-phone"><?php echo lang('Name'); ?></th>
          <th class="hidden-phone"><?php echo lang('Email'); ?></th>
          <th class="hidden-phone"><?php echo lang('date'); ?></th>
          <th class="hidden-phone"><?php echo lang('Actions'); ?></th>
      </tr>
  </thead>
  <tbody>
     <?php
     $i = -1;
     ?>
     <?php foreach ($feedbackMessages as $ne) {
       $i++;
       ?>
       <tr class="odd gradeX">
          <td><?php echo $ne->name; ?></td>
          <td><?php echo $ne->email; ?></td>
          <td><?php echo $ne->date; ?></td>

          <td>
            <a class="btn btn-sm btn-success" href="<?php echo base_url().'admin/feedback/single/'.$ne->id; ?>"><span class="glyphicon glyphicon-file"></span> <?php echo lang('list_view'); ?></a>
            <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/feedback/delete/'.$ne->id; ?>"><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a>
        </td>
    </tr>
    <?php } ?>


</tbody>
</table>
                <?php } //end if feedbackMessages
                else{ echo lang('no_data'); }       ?>
            </section>
        </div>
    </div>
    <!-- feedbackMessages end-->



</section>
</section>
<!--main content end-->
<script src="<?php echo base_url() ?>js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function($) {
    // $('#sample_2').dataTable();
    // $('#sample_3').dataTable();
});
function Del_Confirm()
{
    var delConfirm = confirm("<?php echo lang( 'alert_delete' ); ?>")
    if (delConfirm)
    {
      return true;
  }else
  {
      return false;
  }
}
</script>