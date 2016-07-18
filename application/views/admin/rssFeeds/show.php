
<section id="main-content">

  <section class="wrapper">

    <div class="row">

      <div class="col-lg-12">

        <!--breadcrumbs start -->

        <ul class="breadcrumb">

          <li><a href="<?php echo base_url(); ?>"><i class="icon-dashboard"></i><?php echo lang('home'); ?></a></li>
          <li class="active"><?php echo  lang('newsFeed');?></li>

        </ul>

        <!--breadcrumbs end -->

      </div>

    </div>
    <!-- page start-->

    <div class="row">

      <div class="col-lg-12">

       <section class="panel">
        <div class="form">
          <!-- tabbed header -->
          <!-- tabbed content -->
          <div class="panel-body">
           <header class="panel-heading">
            <h3 style="text-align: center;"><?=lang('rssfeed');?></h3>
          </header>
          <br/>
            <?php if(!empty($rssFeeds)){ ?>
            <table class="table table-striped border-top" id="sample_1">
            <thead>
                <tr>
                  <th class="hidden-phone">#</th>
                 <th><?php echo lang('title'); ?></th>
                 <th><?php echo lang('addingDate'); ?></th>
                  <th><?php echo lang('mainDesc'); ?></th>
                  <th><?php echo lang('Actions'); ?></th>
               </tr>
             </thead>
             <tbody>             
               <?php $i = 0; ?>
            <?php foreach ($rssFeeds as $item) { $i++; ?>
            <tr class="odd gradeX">
                <td><?php echo $i; ?></td>
                  
                    <td><?php  if(!empty($item->title)) echo  Cut($item->title, 600); ?></td>
                    <td><?php  if(!empty($item->pubDate)) echo $item->pubDate; ?></td>
                    <td><?php  if(!empty($item->description)) echo Cut($item->description, 600); ?></td>
              <td>      
             <a href="<?php echo base_url().'admin/rssFeeds/form/'.$item->id; ?>" class="btn btn-sm btn-info"><?php echo lang('edit'); ?></a>
                    <a href="<?php  if(!empty($item->url)) echo $item->url; ?>" target="_blank" class="btn btn-sm btn-info"><?php echo lang('view_source'); ?></a>
                    <a href="<?php echo base_url().'admin/rssFeeds/delete/'.$item->id; ?>" onClick="return Del_Confirm(); " class="btn btn-sm btn-danger"><?php echo lang('list_delete'); ?></a>
              </td>
            </tr>
              <?php }//foreach ?>
           
            </tbody>
            </table>
            <?php if (!empty($pagination)) {
                  echo $pagination;
              }
            }//if  ?>
          </div>
        </div>

      </section>

    </div>

  </div>

  <!-- page end-->

</section>

</section>
<?php
function Cut($string, $max_length) {
  $string = strip_tags($string);
  if (strlen($string) > $max_length) {
    $string = substr($string, 0, $max_length);
    $pos = strrpos($string, " ");
    if ($pos === false) {
      return substr($string, 0, $max_length) . "...";
    }
    return substr($string, 0, $pos) . "...";
  } else {
    return $string;
  }
}
?>
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