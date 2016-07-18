<?php
if (!empty($rssWesite)) {
  $ID           = (int)$rssWesite->id;
  $websiteName      = $rssWesite->websiteName;
  $url      = $rssWesite->url;
}else {
  $ID = 0;
} ?>
  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <!--breadcrumbs start -->
          <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="icon-dashboard"></i><?php echo lang('home'); ?></a></li>
            <li class="active"><?php echo  lang('newsFeedSettings');?></li>
          </ul>
          <!--breadcrumbs end -->
        </div>
      </div>

      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
         <section class="panel">
           <!-- Form Start -->

         <div class="panel-body">

          <?php if ( $this->session->flashdata( 'msg' ) ) {?>
          <div id="divMessage" class="<?php echo $this->session->flashdata( 'msg_class' );?>" >
            <?php echo $this->session->flashdata( 'msg' );?></div><?php }  ?>

           <?php if(!empty($message)) echo $message; ?>


              <form class="form-horizontal" method='post' action="<?php echo base_url() . 'admin/newsFeed/rssWebsites/'.$ID; ?>">
               <div class="form-group">
                 <label for="websitename" class="col-sm-2 control-label"><?php echo lang('websiteName'); ?>*</label>
                 <div class="col-sm-10">
                   <input class=" form-control" id="websiteName" value="<?php echo !empty($websiteName) ?  $websiteName : set_value('websiteName');   ?>"  name="websiteName" type="text" />
                 </div>
               </div>
               <div class="form-group">
                 <label for="newsfeedurl" class="col-sm-2 control-label"><?php echo lang('url'); ?>*</label>
                 <div class="col-sm-10">
                   <input class=" form-control" id="url" value="<?php echo !empty($url) ?  $url : set_value('url');   ?>"  name="url" type="text" />
                   <span id="helpBlock" class="help-block">ex: http://websitename.com/rss</span>
                 </div>
               </div>
               <button type="submit" class="btn btn-success"><?php echo lang('form_save'); ?></button>
             </form>
             <hr />

              <?php if(!empty($rssWesites)){  ?>
             <table class="table table-striped border-top" id="sample_1">
               <thead>
                <tr>
                  <th class="hidden-phone">#</th>
                 <th><?php echo lang('websiteName'); ?></th>
                 <th><?php echo lang('url'); ?></th>
                  <th class="hidden-phone"><?php echo lang('username'); ?></th>
                  <th class="hidden-phone"><?php echo lang('addingDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('lastModifiedDate'); ?></th>
                  <th class="hidden-phone"><?php echo lang('Actions'); ?></th>
               </tr>
             </thead>
             <tbody>
               <?php $i = 0; ?>
               <?php foreach ($rssWesites as $item) { $i++; ?>
               <tr class="odd gradeX">
                <td><?php echo $i; ?></td>
                <td><?php  if(!empty($item->websiteName)) echo $item->websiteName; ?></td>
                <td><?php  if(!empty($item->url)) echo $item->url; ?></td>
                <td><?php  if(!empty($item->addUsername)) echo $item->addUsername; ?></td>
                <td><?php  if(!empty($item->addingDate)) echo $item->addingDate; ?></td>
                <td><?php  if(!empty($item->lastModifiedDate)) echo $item->lastModifiedDate; ?></td>
                <td>
                  <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/newsFeed/rssWebsites/'.$item->id; ?>"><span class="glyphicon glyphicon-cog"></span> <?php echo lang('edit'); ?></a>
                  <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/newsFeed/deleteWebsite/'.$item->id; ?>"  onClick="return Del_Confirm(); "><span class="glyphicon glyphicon-trash"></span> <?php echo lang('list_delete'); ?></a>
                </td>
                </tr>
                <?php } ?>
             </tbody>
           </table>

            <?php }
            else
            {
              echo lang('no_data');
            }
            ?>
         </div>

   </div>
 </section>
</div>
</div>
<!-- page end-->
</section>
</section>
<!--main content end-->
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
