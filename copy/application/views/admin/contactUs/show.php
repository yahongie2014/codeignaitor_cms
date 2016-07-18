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

$('#table_1').dataTable({
});
});
function submitForm()
{
  $('#newsForm').submit();
}
</script>


<!--sidebar end-->
<?php if ( $this->session->flashdata( 'msg' ) ) {?>
<div id="divMessage" class="<?php echo $this->session->flashdata( 'msg_class' );?>" >

  <?php echo $this->session->flashdata( 'msg' );?></div><?php }  ?>

  <?php



  ?>

  <section id="main-content">

    <section class="wrapper">

      <div class="row">

        <div class="col-lg-12">

          <!--breadcrumbs start -->

          <ul class="breadcrumb">

            <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang('home'); ?></a></li>

            <?php ?>   <li class="active"><?php echo  lang('contact_us');?></li><?php ?>

          </ul>

          <!--breadcrumbs end -->

        </div>

      </div>



      <!-- page start-->

      <div class="row">

        <div class="col-lg-12">

         <section class="panel">
          <header class="panel-heading">
            <?php echo lang('contact_us'); ?>
            <div class="pull-right">

             <a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'admin/contactUs/form' ?>"><span class="glyphicon glyphicon-file"></span> <?php echo lang('edit'); ?></a>

             <a class="btn btn-sm btn-danger" href="javascript:submitForm();"><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a>
           </div>
         </header>
         <?php if($messages != 0){  ?>
         <form class='cmxform form-horizontal tasi-form'  id='newsForm' method='post' action="<?php echo base_url() . 'admin/contactUs/deleteMultiple' ?>">
          <table class="table table-striped border-top" id="table_1">
            <thead>
              <tr>
                <th style="width:8px;"><input type="checkbox" class="group-checkable"  name="checkAll" id="checkAll"/></th>
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
             <?php foreach ($messages as $ne) {
               $i++;
               ?>
               <tr class="odd gradeX">

                <td><input type="checkbox" class="checkboxes" name="choosedItem[]" id="checked<?php echo $i; ?>" value="<?php echo $ne->id; ?>" /></td>

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
        </form>

        <?php }
        else
        {
          echo lang('no_data');
        }
        ?>

        <br/>
        <br/>
        <br/>


      </section>

    </div>

  </div>

  <!-- page end-->

</section>

</section>