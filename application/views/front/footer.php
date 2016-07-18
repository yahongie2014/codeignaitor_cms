<!-- Section Start - Footer -->
<section class='footer bg-black padding-top-75 padding-bottom-25 '>
    <!-- Angled Section - Start -->
    <div class="angled_down_inside black">
        <div class="slope upleft"></div>
        <div class="slope upright"></div>
    </div>
    <!-- Angled Section - End -->

    <div class="container">
        <div class="row">
            <!-- Text Widget - Start -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-widget inviewport animated delay1" data-effect="fadeInUp">
                <div class="logo">
                    <a href="<?php echo base_url().'index'; ?>"><img src="<?php if(!empty($url)) echo $url; ?>img/new/logo-white.png" /></a>
                </div>
                 <?php if(!empty($contactInfo))  {  extract((array) $contactInfo); ?>
                 <?php if(!empty($contactContent)) { ?>
                <p><?php if($contactContent->caption) echo $contactContent->caption; ?></p>
                <?php } //contactContent ?>
                <p><?php if(!empty($email)){ ?> <?php echo lang('front_email'); ?>: <?php echo $email; ?> <?php }//end email ?> <br>
                    <?php if(!empty($tel)){ ?> <?php echo lang('front_phone'); ?>: <?php echo $tel; ?> <?php }//end tel ?></p>
                <?php } //contactInfo ?>
            </div>
            <!-- Text Widget - End -->

            <!-- Twitter Widget - Start -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 twitter-widget inviewport animated delay2" data-effect="fadeInUp">
                <h4>Twitter</h4>
                <div class="headul left-align"></div>
                <?php if(!empty($twitterFeed)) echo $twitterFeed; ?>
                <!-- <div class="tweet">
                    <i class="mdi mdi-twitter"></i>
                    <div class="message"><strong>@thePixelsTheme</strong> Actually preparing a blog :)  <small>10 minutes ago</small></div>
                </div> -->

            </div>
            <!-- Twitter Widget - End -->

            <!-- newsletter Widget - Start -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 flickr-widget inviewport animated delay3" data-effect="fadeInUp">
                <h4><?php echo lang('subscribe'); ?></h4>
                <div class="headul left-align"></div>
                <p><?php echo lang('subscribe_message'); ?></p>

                <?php $msg = $this->session->flashdata( 'msg' ); if (!empty($msg) ){
                  $msg_class = $this->session->flashdata( 'msg_class' ); ?>
                <div id="divMessage" class="<?php echo $msg_class; ?>" >
                <?php echo $msg; ?></div><?php } //end if $msg  ?>

                <form action='<?php echo site_url('index/setNewsL'); ?>' method='post'>
                    <input type='text' placeholder='<?php echo lang('front_name'); ?>' class='col-xs-12 transition' id='c_name' name="name" >
                    <input name="news_mail" id="c_email" type="email" placeholder="<?php echo lang('front_email'); ?>" class='col-xs-12 transition'>
                    <button type='submit' class='btn btn-block btn-primary disabled transition' id='c_send'><?php echo lang('send_message'); ?></button>
                </form>
            </div>
            <!-- newsletter Widget - End -->
        </div>

    </div>

    <!-- Copyright Bar - Start -->
    <div class="copyright">
        <div class="col-md-12">
            <div class="container">
                <div class="">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 message inviewport animated delay1" data-effect="fadeInUp">
                        <span class="">&copy; 2015 Make It Germany</span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 social">

                    <?php if(!empty($contactInfo))  {  extract((array) $contactInfo); ?>
                        <?php if(!empty($facebook)) { ?>
                        <a href="<?php echo $facebook; ?>" target="_blank" class="inviewport animated delay1" data-effect="fadeInUp"><i class="mdi mdi-facebook text-on-primary"></i></a>
                        <?php } //facebook ?>

                        <?php if(!empty($twitter)) { ?>
                        <a href="<?php echo $twitter; ?>" target="_blank" class="inviewport animated delay2" data-effect="fadeInUp"><i class="mdi mdi-twitter text-on-primary"></i></a>
                        <?php } //twitter ?>

                        <?php if(!empty($linkedIn)) { ?>
                        <!-- <a href="<?php echo $linkedIn; ?>" class="inviewport animated delay2" data-effect="fadeInUp"><i class="mdi mdi-linkedin text-on-primary"></i></a> -->
                        <?php } //linkedIn ?>

                    <?php } //if  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright Bar - End -->


</section>

<!-- Section End - Footer -->

</body>

</html>