<!-- Header Slide - Start -->
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

<!-- Section Start - Meet Our Team -->
<section class='padding-bottom-25 padding-top-25' id='portfolio'>
    <!-- Angled Section - Start -->
    <div class="angled_down_inside white">
        <div class="slope upleft"></div>
        <div class="slope upright"></div>
    </div>
    <!-- Angled Section - End -->

    <div class="container">
        <div class="row">
            <?php if(!empty($generalContent)) { ?>
            <h1 class="heading"><?php if(!empty($generalContent->title)) echo $generalContent->title; ?></h1>
            <div class="headul"></div>
            <p class="subheading"><?php if(!empty($generalContent->caption)) echo $generalContent->caption; ?></p>
            <?php } //generalContent ?>

            <?php if(!empty($packages)) {
             foreach ($packages as $item) { ?>
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12 course packages inviewport animated delay2">
                <div class="col-lg-4">
                    <div class="pic">
                        <?php $filename = "application/views/images/upload/packages/".$item->image;
                        if ( $item->image != "" && file_exists( "$filename" ) ) {      ?>
                            <a href="<?php echo base_url().'packages/'.$item->id; ?>"><img alt="<?php if(!empty($item->title)) echo $item->title; ?>" title="<?php if(!empty($item->title)) echo $item->title; ?>" class="img-responsive" src="<?php echo base_url().$filename; ?>"></a>
                        <?php  } //end if  ?>
                        <ul class="social">
                            <?php if(!empty($item->duration)) { ?>
                            <li>
                                <?php  echo $item->duration; ?>
                            </li>
                            <?php }  ?>
                            <?php  if(!empty($item->price)) { ?>
                            <li class="fees">
                                <?php echo $item->price; ?> <?php if($this->GetLang == 'arabic') echo 'جنيه'; else echo "L.E."; ?>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info">
                        <h3><a href="<?php echo base_url().'packages/'.$item->id; ?>"><?php echo lang('front_package_content'); ?></a></h3>
                        <p>
                            <?php if(!empty($item->desc200)) echo $item->desc200; ?>
                        </p>
                        <a href="<?php echo base_url().'packages/'.$item->id; ?>" class="btn btn-primary"><?php echo lang('front_view_package'); ?></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info">
                        <?php if(!empty($item->courses)) { ?>
                        <h3><a href="<?php echo base_url().'packages/'.$item->id; ?>"><?php echo lang('front_package_courses'); ?></a></h3>
                        <ul class="courses-list">
                            <?php foreach ($item->courses as $course) { ?>
                            <li><?php if(!empty($course->title)) echo $course->title; ?></li>
                            <?php } //foreach item->courses ?>
                        </ul>
                        <?php } //if  item->courses ?>
                    </div>
                </div>

            </div>
            <?php } //foreach packages
            } //if packages ?>
            <!-- Item - End -->

        </div>
    </div>
    <!-- Angled Section - Start -->
    <div class="angled_up_inside white">
    </div>
    <!-- Angled Section - End -->

</section>
<!-- Section End - Meet Our Team -->