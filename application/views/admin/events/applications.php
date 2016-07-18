  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <!--breadcrumbs start -->
          <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang('home'); ?></a></li>
            <li><a href="<?php echo site_url('admin/events'); ?>"><?php echo lang('events'); ?></a></li>
            <li class="active"><?php echo $eventName;?></li>
          </ul>
          <!--breadcrumbs end -->
        </div>
      </div>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
         <section class="panel">
          <header class="panel-heading">
            <?php echo lang('applications'); ?>
          </header>

          <?php if(!empty($returnedData)){  ?>
          <form class='cmxform form-horizontal tasi-form'  id='form11' method='post' action="#">
            <table class="table table-striped border-top" id="sample_1">
              <thead>
                <tr>
                  <th class="hidden-phone">#</th>
                  <th class="hidden-phone"><?php echo lang('Name'); ?></th>
                  <th class="hidden-phone"><?php echo lang('Phone'); ?></th>
                  <th class="hidden-phone"><?php echo lang('Email'); ?></th>
                  <th class="hidden-phone"><?php echo lang('date'); ?></th>

                </tr>
              </thead>
              <tbody>
               <?php $i = 0; ?>
               <?php foreach ($returnedData as $item) { $i++; ?>
               <tr class="odd gradeX">

                <td><?php echo $i; ?></td>
                <td><?php  if(!empty($item->name)) echo $item->name; ?></td>
                <td><?php  if(!empty($item->tel)) echo $item->tel; ?></td>
                <td><?php  if(!empty($item->email)) echo $item->email; ?></td>
                <td><?php  if(!empty($item->date)) echo $item->date; ?></td>

                </tr>
                <?php } ?>


              </tbody>
            </table>
            </form>

            <?php }
            else
            {
              echo lang('no_data');
            }            ?>

          </section>

        </div>

      </div>

      <!-- page end-->

    </section>

  </section>