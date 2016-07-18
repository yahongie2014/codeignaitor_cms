  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <!--breadcrumbs start -->
          <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang('home'); ?></a></li>
            <li><a href="<?php echo site_url('admin/packages'); ?>"><?php echo lang('packages'); ?></a></li>
            <li class="active"><?php echo $courseName.' -  '.lang('trainees');?></li>
          </ul>
          <!--breadcrumbs end -->
        </div>
      </div>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
         <section class="panel">
          <header class="panel-heading">
            <?php echo lang('trainees'); ?>
          </header>

          <?php $msg = $this->session->flashdata( 'msg' ); if (!empty($msg) ){
            $msg_class = $this->session->flashdata( 'msg_class' ); ?>
          <div id="divMessage" class="<?php echo $msg_class; ?>" >
          <?php echo $msg;?></div><?php } //end if $msg  ?>

          <?php if(!empty($returnedData)){  ?>
          <form class='cmxform form-horizontal tasi-form'  id='form11' method='post' action="#">
            <table class="table table-striped border-top" id="sample_1">
              <thead>
                <tr>
                  <th class="hidden-phone">#</th>
                  <!-- <th class="hidden-phone"><?php echo lang('courseName'); ?></th> -->
                  <th class="hidden-phone"><?php echo lang('Name'); ?></th>
                  <th class="hidden-phone"><?php echo lang('Phone'); ?></th>
                  <th class="hidden-phone"><?php echo lang('Email'); ?></th>
                  <th class="hidden-phone"><?php echo lang('college_work'); ?></th>
                  <th class="hidden-phone"><?php echo lang('Type'); ?></th>
                  <th class="hidden-phone"><?php echo lang('addingDate'); ?></th>

                    <?php if ($this->admin_ion_auth->in_group(array('admin'))) { ?>

                  <th class="hidden-phone"><?php echo lang('actions'); ?></th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
               <?php $i = 0; ?>
               <?php foreach ($returnedData as $item) { $i++; ?>
               <tr class="odd gradeX">

                <td><?php echo $i; ?></td>
                <!-- <td><?php  if(!empty($item->courseName)) echo $item->courseName; ?></td> -->
                <td><?php  if(!empty($item->name)) echo $item->name; ?></td>
                <td><?php  if(!empty($item->phone)) echo $item->phone; ?></td>
                <td><?php  if(!empty($item->email)) echo $item->email; ?></td>
                <td><?php  if(!empty($item->college_work)) echo $item->college_work; ?></td>
                <th><?php  if(!empty($item->type)) echo "PayPal"; else echo "Book & Pay Later"; ?></th>
                <td><?php  if(!empty($item->addingDate)) echo $item->addingDate; ?></td>

                    <?php if ($this->admin_ion_auth->in_group(array('admin'))) { ?>

                <td>
                  <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/trainees/assign/'.$item->applicationsId.'/'.$item->traineeId.'/package'; ?>" ><span class="glyphicon glyphicon-cog"></span> <?php echo lang('edit'); ?></a>
                  <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/packages/deleteApplication/'.$item->applicationsId.'/'.$item->traineeId.'/'.$item->packageId; ?>"  onClick="return Del_Confirm(); "><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a>
                </td>
                <?php } ?>
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

      <!-- page end-->

    </section>

  </section>