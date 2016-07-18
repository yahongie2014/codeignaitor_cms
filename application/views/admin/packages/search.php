
          <?php if(!empty($returnedData)){  ?>
          <form class='cmxform form-horizontal tasi-form'  id='form11' method='post' action="<?php echo base_url() . 'admin/packages/delete' ?>">
            <table class="table table-striped border-top" id="sample_1">
              <thead>
                <tr>
                  <!-- <th style="width:8px;"><input type="checkbox" class="group-checkable"  name="checkAll" id="checkAll"/></th> -->
                  <th class="hidden-phone">#</th>
                  <th class="hidden-phone"><?php echo lang('title'); ?></th>
                  <th class="hidden-phone"><?php echo lang('isActive'); ?></th>
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

                <!-- <td><input type="checkbox" class="checkboxes" name="choosedItem[]" id="checked<?php echo $i; ?>" value="<?php echo $item->id; ?>" /></td> -->
                <td><?php echo $i; ?></td>
                <td><?php  if(!empty($item->title)) echo $item->title; ?></td>
                <td class="hidden-phone">
                    <?php if(!empty($item->isActive) && $item->isActive == 1) {
                                echo "<span class='alert-success'>".lang('enable')."</span>";
                            } else {
                                echo "<span class='alert-danger'>".lang('disable')."</span>";
                            } ?>
                </td>
                <td><?php  if(!empty($item->username)) echo $item->username; ?></td>
                <td><?php  if(!empty($item->addingDate)) echo $item->addingDate; ?></td>
                <td><?php  if(!empty($item->lastModifiedDate) && $item->lastModifiedDate != '0000-00-00 00:00:00') echo $item->lastModifiedDate; ?></td>
                <td>
                  <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/packages/form/'.$item->id; ?>"><span class="glyphicon glyphicon-cog"></span> <?php echo lang('edit'); ?></a>

                  <a class="btn btn-sm btn-success" href="<?php echo base_url().'admin/packages/packageData/'.$item->id; ?>"><span class="glyphicon glyphicon-file"></span> <?php echo lang('packageData'); ?></a>

                    <?php if (!empty($item->applications)) { ?>
                  <a class="btn btn-sm btn-warning" href="<?php echo base_url().'admin/packages/applications/'.$item->id; ?>"><span class="glyphicon glyphicon-file"></span> <?php echo lang('applications'); ?></a>
                  <?php } //if applications ?>

                  <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/packages/delete/'.$item->id; ?>"  onClick="return Del_Confirm(); "><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a></td>
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
