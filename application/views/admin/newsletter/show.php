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

function submitForm() {
    var result = Del_Confirm();
    if(result == true) {
        $('#newsForm').submit();
    }
}

function Del_Confirm() {
    var delConfirm = confirm("<?php echo lang( 'alert_delete' ) ?>")
    if (delConfirm) {
        return true;
    } else {
        return false;
    }
}
</script>

<section id="main-content">

    <section class="wrapper">

      <div class="row">

          <div class="col-lg-12">

              <!--breadcrumbs start -->

              <ul class="breadcrumb">

                  <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang('home'); ?></a></li>

                  <?php ?>   <li class="active"><?php echo  lang('newsletter');?></li><?php ?>

              </ul>

              <!--breadcrumbs end -->

          </div>

      </div>



      <!-- page start-->

      <div class="row">

          <div class="col-lg-12">

           <section class="panel">
            <header class="panel-heading">
              <?php echo lang('newsletter'); ?>
              <div class="pull-right">
                 <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'admin/newsletter/emails' ?>"><span class="glyphicon glyphicon-file"></span> <?php echo lang('show_emails'); ?></a>
                 <a class="btn btn-sm btn-danger" href=" javascript: submitForm();"><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a>
             </div>
         </header>
         <?php if($newsletter != 0){  ?>
         <form class='cmxform form-horizontal tasi-form'  id='newsForm' method='post' action="<?php echo base_url() . 'admin/newsletter/deleteMultiple' ?>">
          <table class="table table-striped border-top" id="table_1">
              <thead>
                  <tr>
                      <th style="width:8px;"><input type="checkbox" class="group-checkable"  name="checkAll" id="checkAll"/></th>
                      <th class="hidden-phone"><?php echo lang('Name'); ?></th>
                      <th class="hidden-phone"><?php echo lang('Email'); ?></th>
                      <th class="hidden-phone"><?php echo lang('applicationDate'); ?></th>
                      <th class="hidden-phone"><?php echo lang('Actions'); ?></th>
                  </tr>
              </thead>
              <tbody>
               <?php
               $i = -1;
               ?>
               <?php foreach ($newsletter as $ne) {
                   $i++;
                   ?>
                   <tr class="odd gradeX">

                      <td><input type="checkbox" class="checkboxes" name="choosedItem[]" id="checked<?php echo $i; ?>" value="<?php echo $ne->id; ?>" /></td>
                      <td><?php echo $ne->name; ?></td>
                      <td><?php echo $ne->email; ?></td>
                      <td><?php echo $ne->date; ?></td>
                      <td>
                        <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/newsletter/delete/'.$ne->id; ?>" onClick="return Del_Confirm(); "><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a></td>
                    </tr>
                    <?php } ?>


                </tbody>
            </table>
        </form>

        <?php }
        else
        {
          echo lang('no_data');
        }  ?>

  </section>

</div>

</div>

<!-- page end-->

</section>

</section>