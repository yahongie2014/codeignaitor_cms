
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
    $('#usersForm').submit();
  }
}

function Del_Confirm()
{
  var delConfirm = confirm("<?php echo lang( 'alert_delete' ) ?>")
  if (delConfirm)
  {
    return true;
  } else
  {
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
            <li><a href="<?php echo base_url(); ?>"><i class="icon-dashboard"></i> <?php echo lang('home'); ?></a></li>

            <?php if(!empty($groupId) ) {
              if($groupId == 1) { ?>
                  <li><a href="<?php echo base_url().'admin/users'; ?>"><i class="icon-user"></i> <?php echo lang('users'); ?></a></li>
                  <li class="active"><?php echo lang('show_admins'); ?></li>

              <?php } elseif($groupId == 2) { ?>
                  <li><a href="<?php echo base_url().'admin/users'; ?>"><i class="icon-user"></i> <?php echo lang('users'); ?></a></li>
                  <li class="active"> <?php echo lang('secretaryAdmin').' '.lang('list_view'); ?></li>

              <?php } elseif($groupId == 3) { ?>
                  <li><a href="<?php echo base_url().'admin/users'; ?>"><i class="icon-user"></i> <?php echo lang('users'); ?></a></li>
                  <li class="active"> <?php echo lang('systemAdmin').' '.lang('list_view'); ?></li>

              <?php } elseif($groupId == 4) { ?>
                  <li><a href="<?php echo base_url().'admin/users'; ?>"><i class="icon-user"></i> <?php echo lang('users'); ?></a></li>
                  <li class="active"> <?php echo lang('websiteAdmin').' '.lang('list_view'); ?></li>

              <?php }
            } else { ?>
            <li class="active"><?php echo lang('users'); ?></li>
            <?php } ?>
          </ul>

          <!--breadcrumbs end -->

        </div>

      </div>



      <!-- page start-->

      <div class="row">

        <div class="col-lg-12">

         <section class="panel">
          <header class="panel-heading tab-bg-dark-navy-blue tab-right">
            <span class="hidden-sm wht-color"><?php echo lang('users'); ?></span>
            <br/>
            <div class="pull-right">

                    <?php if ($this->admin_ion_auth->in_group(array('admin', 'system'))) { ?>
              <div class="btn-group">
                <a type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                 <span class="glyphicon glyphicon-plus"></span> <?php echo lang('form_add');  ?> <span class="glyphicon glyphicon-chevron-down"></span>
               </a>
               <ul class="dropdown-menu" role="menu">

              <?php if ($this->admin_ion_auth->in_group('admin')) { ?>
                <li><a class="" href="<?php echo base_url().'admin/users/add/1'; ?>"><?php echo lang('add_admin'); ?></a></li>
                <?php } ?>
                <!-- <li><a class="" href="<?php echo base_url().'admin/users/add/2'; ?>"><?php echo lang('secretaryAdmin'); ?></a></li>
                <li><a class="" href="<?php echo base_url().'admin/users/add/3'; ?>"><?php echo lang('systemAdmin'); ?></a></li>
                <li><a class="" href="<?php echo base_url().'admin/users/add/4'; ?>"><?php echo lang('websiteAdmin'); ?></a></li> -->
              </ul>
            </div>
            <?php } ?>

            <div class="btn-group">
              <a type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
               <span class="glyphicon glyphicon-filter"></span> <?php echo lang('list_view');  ?> <span class="glyphicon glyphicon-chevron-down"></span>
             </a>
             <ul class="dropdown-menu" role="menu">
                    <?php if ($this->admin_ion_auth->in_group(array('admin', 'system'))) { ?>

              <?php if ($this->admin_ion_auth->in_group('admin')) { ?>
              <li><a class="" href="<?php echo site_url('admin/users/index/1')?>"><?php echo lang('show_admins'); ?></a></li>
              <?php } ?>
              <!-- <li><a class="" href="<?php echo site_url('admin/users/index/2')?>"><?php echo lang('secretaryAdmin'); ?></a></li>
              <li><a class="" href="<?php echo site_url('admin/users/index/3')?>"><?php echo lang('systemAdmin'); ?></a></li>
              <li><a class="" href="<?php echo site_url('admin/users/index/4')?>"><?php echo lang('websiteAdmin'); ?></a></li> -->
              <?php } ?>

              <?php if ($this->admin_ion_auth->in_group('admin')) { ?>
              <li><a class="" href="<?php echo site_url('admin/users/index/all')?>"><?php echo lang('view_all'); ?></a></li>
              <?php } ?>
            </ul>
          </div>

        </div>
      </header>
      <?php if ( $this->session->flashdata( 'msg' ) ) { ?>
      <!-- <div id="divMessage" class="<?php echo $this->session->flashdata( 'msg_class' ); ?>" > -->
        <?php echo $this->session->flashdata( 'msg' ); ?></div><?php }  ?>

      <?php if($users != 0 && count($users) > 0) {  ?>
      <form class='cmxform form-horizontal tasi-form'  id='usersForm' method='post'>
        <table class="table table-striped border-top" id="sample_1">
          <thead>
            <tr>
              <th style="width:8px;"><input type="checkbox" class="group-checkable"  name="checkAll" id="checkAll"/></th>
              <th class="hidden-phone">#</th>
              <th class="hidden-phone"><?php echo lang('firstName'); ?></th>
              <th class="hidden-phone"><?php echo lang('lastName'); ?></th>
              <th class="hidden-phone"><?php echo lang('User_Name'); ?></th>
              <th class="hidden-phone"><?php echo lang('group'); ?></th>
              <th class="hidden-phone"><?php echo lang('Actions'); ?></th>
            </tr>
          </thead>
          <tbody>
           <?php
           $i = -1;
           ?>
           <?php foreach ($users as $ne) {
             $i++;
             ?>
             <tr class="odd gradeX">

              <td><input type="checkbox" class="checkboxes" name="choosedItem[]" id="checked<?php echo $i; ?>" value="<?php echo $ne->user_id; ?>" /></td>
              <td><?php echo $ne->user_id; ?></td>
              <td><?php echo $ne->first_name; ?></td>
              <td><?php echo $ne->last_name; ?></td>
              <td><?php echo $ne->username; ?></td>
              <td  class="hidden-phone">
                <?php if(!empty($ne->groups)) {
                  foreach ($ne->groups as $g) {
                    echo $g->name;
                  }
                } ?>
              </td>
              <td>
                <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/users/update/'.$ne->user_id; ?>"><span class="glyphicon glyphicon-cog"></span> <?php echo lang('edit'); ?></a>


                <?php
                $currentUser = $this->admin_ion_auth->user()->row();
                if(!empty($currentUser)) {
                  $currentId = $currentUser->id;
                }
                if(!empty($currentId) && $currentId != $ne->user_id) { //logged in user ?>
                <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/users/delete/'.$ne->user_id; ?>"><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a></td>
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