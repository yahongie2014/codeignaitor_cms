<section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <!--breadcrumbs start -->
          <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang('home'); ?></a></li>
            <li class="active"><?php echo  lang('tags'); ?></li>
          </ul>
          <!--breadcrumbs end -->
        </div>
      </div>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
         <section class="panel">
          <header class="panel-heading">
            <?php echo lang('tags'); ?>
            <div class="pull-right">
              <a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/tags/form/0/'.$type; ?>"><span class="glyphicon glyphicon-plus"></span> <?php echo lang('form_add'); ?></a>
              <a class="btn btn-sm btn-danger" href="javascript:submitForm();"><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a>
            </div>
          </header>

          <?php if ($this->session->flashdata('msg')) { ?>
          <div id="divMessage" class="<?php echo $this->session->flashdata('msg_class'); ?>" >
            <?php echo $this->session->flashdata('msg'); ?></div><?php }  ?>

          <?php if(!empty($returnedData)) {  ?>
          <form class='cmxform form-horizontal tasi-form'  id='form11' method='post' action="<?php echo base_url() . 'admin/tags/delete/'.$type; ?>">
            <table class="table table-striped border-top" id="sample_1">
              <thead>
                <tr>
                  <th style="width:8px;"><input type="checkbox" class="group-checkable"  name="checkAll" id="checkAll"/></th>
                  <th class="hidden-phone">#</th>
                  <th class="hidden-phone"><?php echo lang('title'); ?></th>
                  <!-- <th class="hidden-phone"><?php echo lang('Type'); ?></th> -->
                  <th class="hidden-phone"><?php echo lang('User_Name'); ?></th>
                  <th class="hidden-phone"><?php echo lang('addingDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('lastModifiedDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('Actions'); ?></th>
                </tr>
              </thead>
              <tbody>
               <?php $i = 0; ?>
               <?php foreach ($returnedData as $item) { $i++; ?>
               <tr class="odd gradeX">
                <td><input type="checkbox" class="checkboxes" name="choosedItem[]" id="checked<?php echo $i; ?>" value="<?php echo $item->id; ?>" /></td>
                <td><?php echo $i; ?></td>
                <td><?php  if(!empty($item->title)) echo $item->title; ?></td>
                <!-- <td><?php  if(!empty($item->type)) echo lang($item->type); ?></td> -->
                <td><?php  if(!empty($item->username)) echo $item->username; ?></td>
                <td><?php  if(!empty($item->addingDate)) echo $item->addingDate; ?></td>
                <td><?php  if(!empty($item->lastModifiedDate)) echo $item->lastModifiedDate; ?></td>
                <td><a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/tags/form/'.$item->id.'/'.$type; ?>"><span class="glyphicon glyphicon-cog"></span> <?php echo lang('edit'); ?></a>
                  <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/tags/delete/'.$item->id.'/'.$type; ?>"  onClick="return Del_Confirm(); "><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a></td>
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
  <script src="<?php echo base_url() ?>js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
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
  var delConfirm = confirm("<?php echo lang('alert_delete'); ?>")
  if (delConfirm)
  {
    return true;
  }else
  {
    return false;
  }
}
</script>