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
<section class='padding-bottom-25 padding-top-25' id='team'>
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

            <?php if(!empty($partners)) { $i = 0;
                    foreach ($partners as $member) { $i++; ?>
            <!-- Team Member - Start -->
            <div class="col-lg-4 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 member inviewport animated delay<?php echo $i; ?>" data-effect="fadeInUp">
                <div class="pic">
                    <?php $filename = "application/views/images/upload/partners/".$member->logo;
                    if ( $member->logo != "" && file_exists( "$filename" ) ) {  ?>
                        <img class="img-responsive" src="<?php echo base_url().$filename; ?>" alt="<?php if(!empty($member->name)) echo $member->name; ?>" title="<?php if(!empty($member->name)) echo $member->name; ?>">
                    <?php  } //end if ?>
                </div>
                <div class="info">
                    <h3></h3>
                    <p></p>
                </div>
            </div>
            <!-- Team Member - End -->
                <?php } //foreach partners ?>
            <?php } //if partners ?>

        </div>
    </div>
    <!-- Angled Section - Start -->
    <div class="angled_up_inside white">
    </div>
    <!-- Angled Section - End -->

</section>
<!-- Section End - Meet Our Team -->