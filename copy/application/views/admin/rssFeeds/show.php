
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
            <h3 style="text-align: center;">News Feed</h3>
          </header>
          <br/>
          <ul class="row">
            <?php if(!empty($rssFeeds)){
              foreach ($rssFeeds as $item) {  ?>
              <li class="col-lg-6  col-md-6 col-sm-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <?php  if(!empty($item->image)) { ?>
                        <?php $filename = "application/views/images/upload/rssFeeds/".$item->image;
                         if ( $item->image!="" && file_exists( "$filename" ) ) { ?>
                            <div class="bs-example bs-example-images">
                            <img src="<?php echo base_url().$filename; ?>"  style="height:200px; width: 100%;">
                            </div>
                        <?php  }//end file_exists
                        elseif ($item->image!="") { ?>
                            <div class="bs-example bs-example-images">
                            <img src="<?php echo $url; ?>"  style="height:200px; width: 100%;">
                            </div>
                        <?php }
                        } ?>
                  </div>
                  <div class="col-lg-6  col-md-6 col-sm-12">
                    <h4><?php  if(!empty($item->title)) echo $item->title; ?></h4>
                    <h5><?php  if(!empty($item->pubDate)) echo $item->pubDate; ?></h5>
                    <p><?php  if(!empty($item->description)) echo Cut($item->description, 600); ?></p>
                    <a href="<?php echo base_url().'admin/rssFeeds/form/'.$item->id; ?>" class="btn btn-sm btn-info"><?php echo lang('edit'); ?></a>
                    <a href="<?php  if(!empty($item->url)) echo $item->url; ?>" target="_blank" class="btn btn-sm btn-info"><?php echo lang('view_source'); ?></a>
                    <a href="<?php echo base_url().'admin/rssFeeds/delete/'.$item->id; ?>" onClick="return Del_Confirm(); " class="btn btn-sm btn-danger"><?php echo lang('list_delete'); ?></a>
                  </div>

                </div>
                <br/>
                <br/>
              </li>

              <?php }//foreach
              if (!empty($pagination)) {
                  echo $pagination;
              }
            }//if  ?>
            </ul>
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