<section id="main-content">

  <section class="wrapper">

    <div class="row">

      <div class="col-lg-12">

        <!--breadcrumbs start -->

        <ul class="breadcrumb">

          <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang('home'); ?></a></li>

          <?php ?>   <li class="active"><?php echo  lang('newsletter');?></li><?php ?>

        </ul>

        <!--breadcrumbs end -->

      </div>

    </div>



    <!-- page start-->

    <div class="row">

      <div class="col-lg-12">

       <section class="panel">
        <header class="panel-heading">
          <?php echo lang('newsletter'); ?>
          <div class="pull-right">

          </div>
        </header>
        <?php if(!empty($emails)){  ?>
            <p style="margin-right:80px; font-size:19px;"><?php echo $emails; ?> </p>
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