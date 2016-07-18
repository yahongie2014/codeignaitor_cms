<section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <!--breadcrumbs start -->
          <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang('home'); ?></a></li>
               <li class="active"><?php echo  lang('events');?></li>
          </ul>
          <!--breadcrumbs end -->
        </div>
      </div>
      <!-- page start-->

      <div class="row">
        <div class="col-lg-12">
         <section class="panel">
          <header class="panel-heading">
            <?php echo lang('events'); ?>
            <div class="pull-right">
              <a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/events/form'; ?>"><span class="glyphicon glyphicon-plus"></span> <?php echo lang('form_add'); ?></a>
            </div>
          </header>
            <?php if ( $this->session->flashdata( 'msg' ) ) {?>
            <div id="divMessage" class="<?php echo $this->session->flashdata( 'msg_class' );?>" >

              <?php echo $this->session->flashdata( 'msg' );?></div><?php }  ?>
          <?php if(!empty($events)){  ?>
          <form class='cmxform form-horizontal tasi-form'  id='form11' method='post' action="">
            <table class="table table-striped border-top" id="sample_1">
              <thead>
                <tr>
                  <th class="hidden-phone">#</th>
                  <th class="hidden-phone"><?php echo lang('title'); ?></th>
                  <th class="hidden-phone"><?php echo lang('date'); ?></th>
                  <th class="hidden-phone"><?php echo lang('Location'); ?></th>
                  <th class="hidden-phone"><?php echo lang('User_Name'); ?></th>
                  <th class="hidden-phone"><?php echo lang('addingDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('lastModifiedDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('Actions'); ?></th>
                </tr>
              </thead>
              <tbody>
               <?php $i = 0; ?>
               <?php foreach ($events as $item) { $i++; ?>
               <tr class="odd gradeX">

                <td><?php echo $i; ?></td>
                <td><?php  if(!empty($item->title)) echo $item->title; ?></td>
                <td><?php  if(!empty($item->date)) echo $item->date; ?></td>
                <td><?php  if(!empty($item->location)) echo $item->location; ?></td>
                <td><?php  if(!empty($item->username)) echo $item->username; ?></td>
                <td><?php  if(!empty($item->addingDate)) echo $item->addingDate; ?></td>
                <td><?php  if(!empty($item->lastModifiedDate)) echo $item->lastModifiedDate; ?></td>
                <td>
                    <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/events/form/'.$item->id; ?>"><span class="glyphicon glyphicon-cog"></span> <?php echo lang('edit'); ?></a>

                    <?php if (!empty($item->applications)) { ?>
                    <a class="btn btn-sm btn-success" href="<?php echo base_url().'admin/events/applications/'.$item->id; ?>"><span class="glyphicon glyphicon-file"></span> <?php echo lang('applications'); ?></a>
                    <?php } //if applications ?>

                    <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/events/delete/'.$item->id; ?>"  onClick="return Del_Confirm(); "><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a>
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
            }  ?>
        </section>
        </div>
      </div>
      <!-- page end-->
    </section>
  </section>
<script type="text/javascript">
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
