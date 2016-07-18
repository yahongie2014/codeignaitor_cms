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
                <?php if(!empty($aboutPage)) { ?>
                    <div class="primary-text inviewport animated delay4" data-effect="fadeInRightBig">
                        <div class="left-line">
                            <h4><?php if(!empty($aboutPage->title1)) echo $aboutPage->title1; ?></h4>
                            <h1><?php if(!empty($aboutPage->title2)) echo $aboutPage->title2; ?></h1>
                        </div>
                    </div>
                    <div class="black-text inviewport animated delay4" data-effect="fadeInLeftBig">
                        <div>
                            <h1><?php if(!empty($aboutPage->title3)) echo $aboutPage->title3; ?></h1>
                        </div>
                    </div>
                <?php } //if aboutImage ?>
            </div>
            <!-- Header Text - End -->
        </div>
    </div>
    <!-- Header Slide - End -->
</section>

<!-- Section End - Header -->

<?php if(!empty($aboutPage)) { ?>
<!-- Section Start - Made For You -->
<section class='madeforyou padding-top-50 padding-bottom-0 ' id='madeforyou'>
    <!-- Angled Section - Start -->
    <div class="angled_down_inside white">
        <div class="slope upleft"></div>
        <div class="slope upright"></div>
    </div>
    <!-- Angled Section - End -->

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-area">
                <h1 class="heading left-align"><?php if(!empty($aboutPage->title)) echo $aboutPage->title; ?></h1>
                <div class="headul left-align"></div>
                <p><?php if(!empty($aboutPage->description)) echo $aboutPage->description; ?></p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 slider-area">


                <!-- Image Carousel - Start -->
                <ul id="image-slider" class="owl-carousel">
                    <?php if(!empty($aboutImages)) {
                        foreach ($aboutImages as $item) { ?>
                            <!-- Image Carousel Item - Start -->
                            <?php $filename = "application/views/images/upload/about/".$item->image;
                            if ( $item->image != "" && file_exists( "$filename" ) ) {  ?>
                                <li class="">
                                    <img class="lazyOwl img-responsive" data-src="<?php echo base_url().$filename; ?>"  alt="<?php if(!empty($aboutPage->title)) echo $aboutPage->title; ?>" title="<?php if(!empty($aboutPage->title)) echo $aboutPage->title; ?>"  src="#">
                                </li>
                            <?php  } //end if ?>
                        <?php  } //end foreach ?>
                    <!-- Image Carousel Item - End -->
                    <?php } //aboutImages ?>
                </ul>
                <!-- Image Carousel - End -->


            </div>
        </div>

    </div>
    <!-- Angled Section - Start -->
    <div class="angled_up_inside white">
        <div class="slope upleft"></div>
        <div class="slope upright"></div>
    </div>
    <!-- Angled Section - End -->

</section>
<!-- Section End - Made For You -->
<?php } //aboutPage ?>


<?php if(!empty($sections)) { ?>
<!-- Section Start - What Why How -->
<section class="parallax whatwhyhow" id="">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <?php $i = 0; foreach ($sections as $item) { $i++;
                    if(!empty($item->title)) {  ?>
                <!-- Query Info Box - Start -->
                <div class="col-lg-4 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 query_box inviewport animated delay<?php echo $i; ?>" data-effect="fadeInUp">
                    <div class="box-wrapper">
                        <h2 class="text-on-primary"><?php echo $item->title; ?></h2>
                        <h3><?php if(!empty($item->caption)) echo $item->caption; ?></h3>
                        <p><?php if(!empty($item->description)) echo $item->description; ?></p>
                    </div>
                </div>
                <!-- Query Info Box - End -->
                <?php  } //if title
                 } //foreach sections ?>

            </div>

        </div>
    </div>
</section>
<!-- Section End - What Why How -->
<?php } //if sections ?>

<!-- Section Start - Meet Our Team -->
<section class='padding-bottom-25 padding-top-25' id='team'>
    <!-- Angled Section - Start -->
    <div class="angled_down_inside white">
        <div class="slope upleft"></div>
        <div class="slope upright"></div>
    </div>
    <!-- Angled Section - End -->

    <div class="container">
        <div class="row">
            <?php if(!empty($teamContent)) { ?>
            <h1 class="heading"><?php if(!empty($teamContent->title)) echo $teamContent->title; ?></h1>
            <div class="headul"></div>
            <p class="subheading"><?php if(!empty($teamContent->caption)) echo $teamContent->caption; ?></p>
            <?php } //teamContent ?>

            <?php if(!empty($ourTeam)) { $i = 0;
                foreach ($ourTeam as $member) {  $i++;?>

            <!-- Team Member - Start -->
            <div class="col-lg-4 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 member inviewport animated delay<?php echo $i; ?>" data-effect="fadeInUp">
                <div class="pic">
                        <?php $filename = "application/views/images/upload/ourTeam/".$member->image;
                        if ( $member->image != "" && file_exists( "$filename" ) ) {  ?>
                            <img class="img-responsive" src="<?php echo base_url().$filename; ?>" alt="<?php if(!empty($member->name)) echo $member->name; ?>" title="<?php if(!empty($member->name)) echo $member->name; ?>">
                        <?php  } //end if
                        elseif (!empty($member->gender)) { //female ?>
                            <img class="img-responsive" src="<?php if(!empty($url)) echo $url; ?>img/female.png" alt="<?php if(!empty($member->name)) echo $member->name; ?>" title="<?php if(!empty($member->name)) echo $member->name; ?>">
                        <?php } else { //male ?>

                            <img class="img-responsive" src="<?php if(!empty($url)) echo $url; ?>img/male.png" alt="<?php if(!empty($member->name)) echo $member->name; ?>" title="<?php if(!empty($member->name)) echo $member->name; ?>">
                        <?php } ?>
                    <div class="social">
                            <?php if(!empty($member->linkedIn)) { ?>
                            <a href="<?php echo $member->linkedIn; ?>" target="_blank"><i class="fa fa-linkedin text-on-primary"></i></a>
                            <?php } //linkedIn ?>
                            <?php if(!empty($member->twitter)) { ?>
                            <a href="<?php echo $member->twitter; ?>" target="_blank"><i class="fa fa-twitter text-on-primary"></i></a>
                            <?php } //twitter ?>
                            <?php if(!empty($member->facebook)) { ?>
                            <a href="<?php echo $member->facebook; ?>" target="_blank"><i class="fa fa-facebook text-on-primary"></i></a>
                            <?php } //facebook ?>
                    </div>
                </div>
                <div class="info">
                    <h3><?php if(!empty($member->name)) echo $member->name; ?></h3>
                    <p><?php if(!empty($member->description)) echo $member->description; ?></p>
                </div>
            </div>
            <!-- Team Member - End -->
                <?php } // foreach ourTeam ?>
            <?php } //if ourTeam ?>

        </div>
        <div class="row">
            <div class="padding-more-link">
                <a href="<?php echo base_url().'team'; ?>" class="btn btn-primary"><?php echo lang('meet_team'); ?></a>
            </div>
        </div>
    </div>
    <!-- Angled Section - Start -->
    <div class="angled_up_inside white">
    </div>
    <!-- Angled Section - End -->

</section>
<!-- Section End - Meet Our Team -->