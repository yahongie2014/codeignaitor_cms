  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <!--breadcrumbs start -->
          <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang('home'); ?></a></li>
            <li><a href="<?php echo site_url('admin/trainees'); ?>"><?php echo lang('trainees'); ?></a></li>
            <li><?php echo lang('applications'); ?></li>
            <li class="active"><?php if(!empty($traineeName)) echo $traineeName; ?></li>
          </ul>
          <!--breadcrumbs end -->
        </div>
      </div>
      <!-- coursesApplications start-->
      <div class="row">
        <div class="col-lg-12">
         <section class="panel">
          <header class="panel-heading">
            <?php echo lang('courses'); ?>
            <div class="pull-right">
              <a class="btn btn-sm btn-success" href="<?php echo base_url().'admin/trainees/assign/0/'.$traineeId.'/course'; ?>"><span class="glyphicon glyphicon-plus"></span> <?php echo lang('assign_course'); ?></a>
              <a class="btn btn-sm btn-success" href="<?php echo base_url().'admin/trainees/assign/0/'.$traineeId.'/package'; ?>"><span class="glyphicon glyphicon-plus"></span> <?php echo lang('assign_package'); ?></a>
            </div>
          </header>

          <?php $msg = $this->session->flashdata( 'msg' ); if (!empty($msg) ){
            $msg_class = $this->session->flashdata( 'msg_class' ); ?>
          <div id="divMessage" class="<?php echo $msg_class; ?>" >
          <?php echo $msg;?></div><?php } //end if $msg  ?>

          <?php if(!empty($coursesApplications)){  ?>
          <form class='cmxform form-horizontal tasi-form'  id='form11' method='post' action="#">
            <table class="table table-striped border-top" id="sample_1">
              <thead>
                <tr>
                  <th class="hidden-phone">#</th>
                  <th class="hidden-phone"><?php echo lang('courseName'); ?></th>
                  <th class="hidden-phone"><?php echo lang('price'); ?></th>
                  <th class="hidden-phone"><?php echo lang('status'); ?></th>
                  <th class="hidden-phone"><?php echo lang('username'); ?></th>
                  <th class="hidden-phone"><?php echo lang('addingDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('lastModifiedDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('actions'); ?></th>
                </tr>
              </thead>
              <tbody>
               <?php $i = 0; ?>
               <?php foreach ($coursesApplications as $item) { $i++; ?>
               <tr class="odd gradeX">

                <td><?php echo $i; ?></td>
                <td><?php  if(!empty($item->courseName)) echo $item->courseName; ?></td>
                <td><?php  if(!empty($item->price)) echo $item->price; else echo "0"; ?></td>
                <td>
                  <?php if(!empty($item->status)) {
                        if($item->status == "hold") {
                            echo "<span class='alert-default'>".lang('hold')."</span>";
                        } elseif($item->status == "passed") {
                            echo "<span class='alert-success'>".lang('passed')."</span>";
                        } elseif($item->status == "failed") {
                            echo "<span class='alert-danger'>".lang('failed')."</span>";
                        } elseif($item->status == "canceled") {
                            echo "<span class='alert-primary'>".lang('canceled')."</span>";
                        } elseif($item->status == "pending") {
                            echo "<span class='alert-info'>".lang('pending')."</span>";
                        } elseif($item->status == "normal") {
                            echo "<span>".lang('normal')."</span>";
                        }
                    }  ?>
                </td>
                <td><?php  if(!empty($item->username)) echo $item->username; ?></td>
                <td><?php  if(!empty($item->addingDate)) echo $item->addingDate; ?></td>
                <td><?php  if(!empty($item->lastModifiedDate) && $item->lastModifiedDate != '0000-00-00 00:00:00') echo $item->lastModifiedDate; ?></td>

                <td>
                  <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/trainees/assign/'.$item->applicationsId.'/'.$traineeId.'/course'; ?>" ><span class="glyphicon glyphicon-cog"></span> <?php echo lang('edit'); ?></a>
                  <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/trainees/deleteApplication/'.$item->applicationsId.'/'.$traineeId; ?>"  onClick="return Del_Confirm(); "><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a>
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



          </section>

        </div>

      </div>

      <!-- coursesApplications end-->

    <!-- packagesApplications start-->
      <div class="row">
        <div class="col-lg-12">
         <section class="panel">
          <header class="panel-heading">
            <?php echo lang('packages'); ?>
          </header>



          <?php if(!empty($packagesApplications)){  ?>
          <form class='cmxform form-horizontal tasi-form'  id='form11' method='post' action="#">
             <table class="table table-striped border-top" id="sample_2">
              <thead>
                <tr>
                  <th class="hidden-phone">#</th>
                  <th class="hidden-phone"><?php echo lang('courseName'); ?></th>
                  <th class="hidden-phone"><?php echo lang('price'); ?></th>
                  <th class="hidden-phone"><?php echo lang('status'); ?></th>
                  <th class="hidden-phone"><?php echo lang('username'); ?></th>
                  <th class="hidden-phone"><?php echo lang('addingDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('lastModifiedDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('actions'); ?></th>
                </tr>
              </thead>
              <tbody>
               <?php $i = 0; ?>
               <?php foreach ($packagesApplications as $item) { $i++; ?>
               <tr class="odd gradeX">

                <td><?php echo $i; ?></td>
                <td><?php  if(!empty($item->courseName)) echo $item->courseName; ?></td>
                <td><?php  if(!empty($item->price)) echo $item->price; else echo "0"; ?></td>
                <td>
                  <?php if(!empty($item->status)) {
                        if($item->status == "hold") {
                            echo "<span class='alert-default'>".lang('hold')."</span>";
                        } elseif($item->status == "passed") {
                            echo "<span class='alert-success'>".lang('passed')."</span>";
                        } elseif($item->status == "failed") {
                            echo "<span class='alert-danger'>".lang('failed')."</span>";
                        } elseif($item->status == "canceled") {
                            echo "<span class='alert-primary'>".lang('canceled')."</span>";
                        } elseif($item->status == "pending") {
                            echo "<span class='alert-info'>".lang('pending')."</span>";
                        } elseif($item->status == "normal") {
                            echo "<span>".lang('normal')."</span>";
                        }
                    }  ?>
                </td>
                <td><?php  if(!empty($item->username)) echo $item->username; ?></td>
                <td><?php  if(!empty($item->addingDate)) echo $item->addingDate; ?></td>
                <td><?php  if(!empty($item->lastModifiedDate) && $item->lastModifiedDate != '0000-00-00 00:00:00') echo $item->lastModifiedDate; ?></td>

                <td>
                  <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/trainees/assign/'.$item->applicationsId.'/'.$traineeId.'/package'; ?>" ><span class="glyphicon glyphicon-cog"></span> <?php echo lang('edit'); ?></a>
                  <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/trainees/deleteApplication/'.$item->applicationsId.'/'.$item->traineeId; ?>"  onClick="return Del_Confirm(); "><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a>
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



          </section>

        </div>

      </div>

    <!-- packagesApplications end-->

    </section>

  </section>
    <script src="<?php echo base_url() ?>js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#sample_2').dataTable();
    $('#sample_3').dataTable();
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