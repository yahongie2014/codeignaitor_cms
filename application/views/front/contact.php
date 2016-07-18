<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="<?php if(!empty($url)) echo $url; ?>js/gmaps.js"></script>
<div class="header-slide" style="position:relative;">
    <?php if(!empty($bannerData)) { ?>
    <?php $filename = "application/views/images/upload/banner/".$bannerData->image;
    if ( $bannerData->image != "" && file_exists( "$filename" ) ) {      ?>
    <img src="<?php echo base_url().$filename; ?>"  alt="<?php if(!empty($bannerData->title)) echo $bannerData->title; ?>"  class='header-img' >
        <?php  } //end if
        else { ?>
        <img alt="<?php if(!empty($bannerData->title)) echo $bannerData->title; ?>" src="<?php if(!empty($url)) echo $url; ?>img/banner-1.jpg" class='header-img'>
        <?php } ?>
        <?php } //bannerData ?>

        <div class="overlay overlaysmall3">
            <div class="black inviewport animated delay4" data-effect="fadeInLeftOpacity"></div>
            <div class="primary inviewport animated delay4" data-effect="fadeInRightOpacity"></div>

            <!-- Header Text - Start -->
            <div class="maintext">
                <?php if(!empty($generalContent)) { ?>
                <div class="primary-text inviewport animated delay4" data-effect="fadeInRightBig">
                    <div class="left-line">
                        <h4><?php if(!empty($generalContent->title1)) echo $generalContent->title1; ?></h4>
                        <h1><?php if(!empty($generalContent->title2)) echo $generalContent->title2; ?></h1>
                    </div>
                </div>
                <div class="black-text inviewport animated delay4" data-effect="fadeInLeftBig">
                    <div>
                        <h1><?php if(!empty($generalContent->title3)) echo $generalContent->title3; ?></h1>
                    </div>
                </div>
                <?php } //generalContent ?>
            </div>
            <!-- Header Text - End -->
        </div>
    </div>
    <!-- Header Slide - End -->

</section>
<!-- Section End - Header -->

<!-- Section Start - Heading Area -->
<section class='section-heading padding-top-50 padding-bottom-0 '>
    <!-- Angled Section - Start -->
    <div class="angled_down_inside white">
        <div class="slope upleft"></div>
        <div class="slope upright"></div>
    </div>
    <!-- Angled Section - End -->
<?php
//echo '<pre>';
//print_r($branches);
//echo '</pre>';
//exit();
?>
    <div class="container">
        <div class="row">
            <?php if(!empty($generalContent)) { ?>
            <h1 class="heading"><?php if(!empty($generalContent->title)) echo $generalContent->title; ?></h1>
            <div class="headul"></div>
            <p class="subheading"><?php if(!empty($generalContent->caption)) echo $generalContent->caption; ?></p>
            <?php } //generalContent ?>
        </div>
        
        <!-- New branches Section -->
        
        <div class="row">
        	<?php $i=0; foreach ($branches as $branche) {  ?>
        	<!--Loop Start here -->
			<div class="col-sm-6">
                            <div class=" row <?php if($i % 2 == true){         echo 'branch-container'; }else{     echo 'branch-container2';}?>">
					<div class="col-sm-6">
						<div class="branch">
			              <h5><?php echo lang('branshis').' '.$branche->title;?></h5>
                                      <span><i class="fa fa-map-marker"></i><?php echo $branche->des; ?></span> 
			              <span dir="ltr"><i class="fa fa-phone"></i> <?php echo $branche->phone; ?></span>
			              <span><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $branche->mail; ?>" title="Contact"><?php echo $branche->mail; ?></a></span>
			            </div>
					</div>
					<div class="col-sm-6">
                                            <div id="gmap<?php echo $i;?>" class="gmap3"> </div>
						<script>
						$(document).ready(function($) {
							(function(){
					
							var map;
							var latlng = new google.maps.LatLng(<?php echo $branche->latitude; ?>,<?php echo $branche->lagitude; ?>);
							map = new GMaps({
								el: '#gmap<?php echo $i;?>',
								center : latlng,
								scrollwheel:false,
								zoom: 14,
								zoomControl : true,
								panControl : false,
								streetViewControl : false,
								mapTypeControl: false,
								overviewMapControl: false,
								clickable: false
							});
					
							var image = '<?php if(!empty($url)) echo $url; ?>/img/new/map-marker.png';
							map.addMarker({
								position : latlng,
								icon: image,
								animation: google.maps.Animation.DROP,
								verticalAlign: 'bottom',
								horizontalAlign: 'center',
								backgroundColor: '#d3cfcf',
							});
					
					
						}());
						
						});
					</script>
					</div>
				</div>
			</div>
		<?php $i++;} ?>
		<!-- Loop Ends Here -->
		
		</div>
        
    </div>
    <!-- Angled Section - Start -->
    <div class="angled_up_inside white">
        <div class="slope upleft"></div>
        <div class="slope upright"></div>
    </div>
    <!-- Angled Section - End -->
</section>
<!-- Section Start - Heading End -->

<!-- Section Start - Contact Us -->
<section class="parallax contact padding-top-150 " id="contact">
    <div class="bg-overlay opacity-85"></div>
    <div class="container">
        <div class="">
            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 inviewport animated delay1" data-effect="fadeInUp">
                <!-- Contact Form - Start -->

              <?php $msg = $this->session->flashdata( 'msg' ); if (!empty($msg) ){
                $msg_class = $this->session->flashdata( 'msg_class' ); ?>
              <div id="divMessage" class="<?php echo $msg_class; ?>" >
              <?php echo $msg;?></div><?php } //end if $msg  ?>

                <form action="<?php echo base_url().'contact'; ?>" method='post'>
                    <input type='text' class='col-xs-12 transition' id='c_name' name="name" value="<?php echo set_value('name'); ?>" placeholder="<?php echo lang('front_name'); ?>">
                    <input type='text' class='col-xs-12 transition' id='c_email' name="email" value="<?php echo set_value('email'); ?>" placeholder="<?php echo lang('front_email'); ?>">
                    <input type='text' class='col-xs-12 transition' id='c_phone' name="tel" value="<?php echo set_value('tel'); ?>" placeholder="<?php echo lang('front_phone'); ?>">
                    <textarea class='col-xs-12 transition' placeholder="<?php echo lang('front_message'); ?>" id='c_message' name="message" ><?php echo set_value('message'); ?></textarea>
                    <div id='response_email'></div>
                    <button type='submit' class='btn btn-block btn-primary disabled transition' id='c_send'><?php echo lang('front_send_message'); ?></button>
                </form>
                <!-- Contact Form - End -->
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 contacts inviewport animated delay1" data-effect="fadeInUp">
                <div id="gmap" class="gmap"> </div>
            </div>

        </div>
    </div>
</section>

<!-- Section End - Contact Us -->

<!-- Section End - Footer -->
<script>
$(document).ready(function($) {
    (function(){
        var map;
        var latlng = new google.maps.LatLng(<?php if(!empty($contactInfo) && !empty($contactInfo->latitude)) echo $contactInfo->latitude; ?>,<?php if(!empty($contactInfo) && !empty($contactInfo->lagitude)) echo $contactInfo->lagitude; ?>);
        map = new GMaps({
            el: '#gmap',
            center : latlng,
            scrollwheel:false,
            zoom: 14,
            zoomControl : true,
            panControl : false,
            streetViewControl : false,
            mapTypeControl: false,
            overviewMapControl: false,
            clickable: false
        });

        var image = '<?php if(!empty($url)) echo $url; ?>/img/new/map-marker.png';
        map.addMarker({
            position : latlng,
            icon: image,
            animation: google.maps.Animation.DROP,
            verticalAlign: 'bottom',
            horizontalAlign: 'center',
            backgroundColor: '#d3cfcf',
        });
    }());
});
</script>