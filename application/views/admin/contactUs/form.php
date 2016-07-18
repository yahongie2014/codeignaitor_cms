<style type="text/css">
.error{
  color: #ff0000;
}
</style>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<script type="text/javascript">
function updateDatabase(newLat, newLng)
{
  $('#latitude').val(newLat);
  $('#lagitude').val(newLng);
}
</script>
<?php echo $map['js']; ?>
<?php
if ( !empty( $contactInfo )) {
  $ID           = (int)$contactInfo->id;
  $latitude    = $contactInfo->latitude;
  $lagitude    = $contactInfo->lagitude;
  $tel    = $contactInfo->tel;
  $email    = $contactInfo->email;
  $paypalEmail    = $contactInfo->paypalEmail;
  $facebook      = $contactInfo->facebook;
  $linkedIn    = $contactInfo->linkedIn;
  $twitter    = $contactInfo->twitter;
} ?>

<section id="main-content">

  <section class="wrapper">

    <div class="row">

      <div class="col-lg-12">

        <!--breadcrumbs start -->

        <ul class="breadcrumb">

          <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang( 'home' ); ?></a></li>

          <li class="active"><?php echo  lang( 'contact_us' );?></li>

        </ul>

        <!--breadcrumbs end -->

      </div>

    </div>
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
       <section class="panel">
         <!-- Form Start -->
         <div class="form">
           <?php if ( $this->session->flashdata( 'msg' ) ) { ?><div id="divMessage" class="<?php echo $this->session->flashdata( 'msg_class' );?>" ><?php echo $this->session->flashdata( 'msg' );?></div><?php }  ?>

            <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/contactUs/form'; ?>">

              <!-- hidden inputs -->
              <input type="hidden" name="latitude" id="latitude" value="<?php if (!empty($latitude)) {
               echo $latitude; } ?>"/>
              <input type="hidden" name="lagitude" id="lagitude" value="<?php if(!empty($lagitude)) {echo $lagitude; }?>"/>
              <div class="form-group ">
                  <div class="col-lg-12">
                    <?php echo lang('map_message'); ?>
                    <br/>
                    <br/>
                    <?php echo $map['html']; ?>
                  </div>
                  <!--   <div class="col-lg-4"></div> -->
              </div>

            <div class="panel-body">
            <div class="tab-content">

                <div class="form-group ">
                  <label  class="control-label col-lg-2"><?php echo lang('phone'); ?>   *</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="tel" name="tel" value="<?php if(!empty($tel) ) { echo $tel; } else{ echo set_value('tel');  } ?>" type="text" />
                  </div>
                  <div class="col-lg-4"> <?php echo form_error('tel'); ?> </div>
                </div>

                <div class="form-group ">
                  <label  class="control-label col-lg-2"><?php echo lang('Email'); ?>   *</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="email" name="email" value="<?php if(!empty($email) ) { echo $email; } else{ echo set_value('email');  } ?>" type="email" />
                  </div>
                  <div class="col-lg-4"> <?php echo form_error('email'); ?> </div>
                </div>

                <div class="form-group ">
                  <label  class="control-label col-lg-2"><?php echo lang('paypalEmail'); ?>   *</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="paypalEmail" name="paypalEmail" value="<?php if(!empty($paypalEmail) ) { echo $paypalEmail; } else{ echo set_value('paypalEmail');  } ?>" type="email" />
                  </div>
                  <div class="col-lg-4"> <?php echo form_error('paypalEmail'); ?> </div>
                </div>

                <div class="form-group ">
                    <label for="project-title-ar" class="control-label col-lg-2"><?php echo lang( 'facebook_url' ); ?>  </label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="name_ar" value="<?php echo !empty($facebook) ?  $facebook : set_value('facebook');   ?>"  name="facebook" type="text" />
                    </div>
                    <div class="col-lg-4">
                    <?php echo form_error('facebook'); ?></div>
                </div>

                  <div class="form-group ">
                    <label  class="control-label col-lg-2"><?php echo lang( 'twitter_url' ); ?>   </label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="twitter" name="twitter" value="<?php echo !empty($twitter) ?  $twitter : set_value('twitter');   ?>" type="text" />
                    </div>
                    <div class="col-lg-4">
                    <?php echo form_error('twitter'); ?></div>
                  </div>


                  <div class="form-group ">
                    <label  class="control-label col-lg-2"><?php echo lang( 'linkedin_url' ); ?>   </label>
                    <div class="col-lg-6">
                      <input class=" form-control" id="linkedIn" name="linkedIn" value="<?php echo !empty($linkedIn) ?  $linkedIn : set_value('linkedIn');   ?>" type="text" />
                    </div>
                    <div class="col-lg-4">
                    <?php echo form_error('linkedIn'); ?></div>
                  </div>

            </div>
          </div>
          <div class="col-lg-12 bottom-form-update">
            <div class="form-group">
              <div class="col-lg-offset-9 col-lg-3">
                <button class="btn btn-success" type="submit"><?php echo lang('form_edit') ?></button>
                <button class="btn btn-danger" type="button" onclick="window.location = '<?php echo site_url('admin/contactUs'); ?>'"><?php echo lang( 'Cancel' ) ?></button>
              </div>
            </div>

          </div>

        </form>

      </div>


    </section>

  </div>

</div>

<!-- page end-->

</section>

</section>