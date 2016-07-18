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
            <?php if(!empty($galleryContent)) { ?>
            <div class="primary-text inviewport animated delay4" data-effect="fadeInRightBig">
                <div class="left-line">
                    <h4><?php if(!empty($galleryContent->title1)) echo $galleryContent->title1; ?></h4>
                    <h1><?php if(!empty($galleryContent->title2)) echo $galleryContent->title2; ?></h1>
                </div>
            </div>
            <div class="black-text inviewport animated delay4" data-effect="fadeInLeftBig">
                <div>
                    <h1><?php if(!empty($galleryContent->title3)) echo $galleryContent->title3; ?></h1>
                </div>
            </div>
            <?php } //galleryContent ?>
        </div>
        <!-- Header Text - End -->
    </div>
</div>
<!-- Header Slide - End -->



</section>

<!-- Section End - Header -->



                <?php if(!empty($albums)) { ?>
<!-- Section Start - Gallery -->
<section class=' padding-top-50 padding-bottom-100 '>
    <!-- Angled Section - Start -->
    <div class="angled_down_inside white">
        <div class="slope upleft"></div>
        <div class="slope upright"></div>
    </div>
    <!-- Angled Section - End -->

    <div class="container">
        <div class="row">
            <?php if(!empty($galleryContent)) { ?>
            <h1 class="heading"><?php if(!empty($galleryContent->title)) echo $galleryContent->title; ?></h1>
            <div class="headul"></div>
            <p class="subheading"><?php if(!empty($galleryContent->caption)) echo $galleryContent->caption; ?></p>
            <?php } //galleryContent ?>

            <div class='products'>

                    <?php $i = 0;
                        foreach ($albums as $item) { $i++; ?>
                <!-- Gallery Box - Start -->
                <div class="col-lg-4 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 product inviewport animated delay1" data-effect="fadeInUp">
                    <div class="pic">
                        <?php $filename = "application/views/images/upload/gallery/".$item->image;
                        if ( $item->image != "" && file_exists( "$filename" ) ) {  ?>
                            <img class="img-responsive" src="<?php echo base_url().$filename; ?>" alt="<?php if(!empty($item->name)) echo $item->name; ?>" title="<?php if(!empty($item->name)) echo $item->name; ?>">
                        <?php  }  ?>
                        <a href="<?php echo base_url().'gallery/images/'.$item->id; ?>" class="cart-layer transition"></a>

                    </div>
                    <div class="info">
                        <h4 class="text-on-primary"><a href="<?php echo base_url().'gallery/images/'.$item->id; ?>"><?php if(!empty($item->title)) echo $item->title; ?></a></h4>
                        <div class="price"><h4><?php echo lang('front_image'); ?></h4></div>
                    </div>
                </div>
                <!-- Gallery Box - End -->

                    <?php } //foreach albums ?>

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
                <?php } //if albums ?>
<!-- Section End - Gallery -->


<?php if(!empty($videos)) { ?>
<!-- Section Start - Gallery -->
<section class=' padding-top-50 padding-bottom-100 '>
    <!-- Angled Section - Start -->
    <div class="angled_down_inside white">
        <div class="slope upleft"></div>
        <div class="slope upright"></div>
    </div>
    <!-- Angled Section - End -->

    <div class="container">
        <div class="row">
            <?php if(!empty($galleryContent)) { ?>
            <h1 class="heading"><?php if(!empty($galleryContent->title)) echo $galleryContent->title; ?></h1>
            <div class="headul"></div>
            <p class="subheading"><?php if(!empty($galleryContent->caption)) echo $galleryContent->caption; ?></p>
            <?php } //galleryContent ?>

            <div class='products'>
                    <?php $i = 0;
                        foreach ($videos as $item) { $i++; ?>
                <!-- Gallery Box - Start -->
                <div class="col-lg-4 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 product inviewport animated delay1" data-effect="fadeInUp">
                    <div class="pic">
                        <?php $filename = "application/views/images/upload/gallery/".$item->image;
                        if ( $item->image != "" && file_exists( "$filename" ) ) {  ?>
                            <img class="img-responsive" src="<?php echo base_url().$filename; ?>" alt="<?php if(!empty($item->name)) echo $item->name; ?>" title="<?php if(!empty($item->name)) echo $item->name; ?>">
                        <?php  }  ?>
                        <a href="<?php echo base_url().'gallery/videos/'.$item->id; ?>" class="cart-layer transition"></a>

                    </div>
                    <div class="info">
                        <h4 class="text-on-primary"><a href="<?php echo base_url().'gallery/videos/'.$item->id; ?>"><?php if(!empty($item->title)) echo $item->title; ?></a></h4>
                        <div class="price"><h4><?php echo lang('front_video'); ?></h4></div>
                    </div>
                </div>
                <!-- Gallery Box - End -->

                    <?php } //foreach videos ?>

            </div>
        </div>

    </div>

</section>
<?php } //if videos ?>
<!-- Section End - Products -->