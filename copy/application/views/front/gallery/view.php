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

<?php if(!empty($galleryFiles)) { ?>
<!-- Section Start - Portfolio -->
<section class=' padding-top-50 padding-bottom-100 ' id='portfolio'>
    <!-- Angled Section - Start -->
    <div class="angled_down_inside white">
        <div class="slope upleft"></div>
        <div class="slope upright"></div>
    </div>
    <!-- Angled Section - End -->

    <div class="container">
        <div class="row gallery-row">
            <?php if(!empty($galleryContent)) {  ?>
            <h1 class="heading"><?php if(!empty($galleryContent->title)) echo $galleryContent->title; ?></h1>
            <div class="headul"></div>
            <p class="subheading"><?php if(!empty($galleryContent->caption)) echo $galleryContent->caption; ?></p>
            <?php } //galleryContent ?>

            <!-- Gallery Items - Start -->
            <div class="filter-items filter-mixitup  inviewport animated " data-effect="fadeIn" id="gallery-mixitup">
                <?php foreach ($galleryFiles as $item) { ?>
                <?php if (!empty($type) && $type == 1) {  ?>

                <?php $filename = "application/views/images/upload/gallery/".$item->fileName;
                if ( $item->fileName != "" && file_exists( "$filename" ) ) {      ?>
                    <!-- Item - Start -->
                    <div class="filter-item  col-lg-3 col-md-4 col-sm-6 col-xs-6">
                        <img alt="<?php if(!empty($item->title)) echo $item->title; ?>" title="<?php if(!empty($item->title)) echo $item->title; ?>" src="<?php echo base_url().$filename; ?>" class="img-responsive transition">
                        <div class="info transition">
                            <a class="btn btn-primary fancybox" title="<?php if(!empty($item->title)) echo $item->title; ?>" data-fancybox-group="gallery" href="<?php echo base_url().$filename; ?>"><i class="fa fa-search-plus"></i></a>
                        </div>
                    </div>
                    <!-- Item - End -->
                <?php  } //end if
                 } elseif (!empty($type) && $type == 2) { ?>
                    <?php if(!empty($item->fileName)) { ?>
                    <!-- Item - Start -->
                    <div class="filter-item  col-lg-3 col-md-4 col-sm-6 col-xs-6">
                        <img alt="<?php if(!empty($item->title)) echo $item->title; ?>" title="<?php if(!empty($item->title)) echo $item->title; ?>" src="http://img.youtube.com/vi/<?php echo $item->fileName; ?>/hqdefault.jpg" class="img-responsive transition">
                        <div class="info transition">
                            <a class="btn btn-primary fancybox" title="<?php if(!empty($item->title)) echo $item->title; ?>" data-fancybox-group="gallery" href="http://www.youtube.com/embed/<?php echo $item->fileName; ?>"><i class="fa fa-search-plus"></i></a>
                        </div>
                    </div>
                    <!-- Item - End -->

                    <!-- <div class="col-md-3">
                        <a href="http://www.youtube.com/embed/<?php echo $item->fileName; ?>" rel="video" title="<?php if(!empty($item->title)) echo $item->title; ?>">
                            <img src="http://img.youtube.com/vi/<?php echo $item->fileName; ?>/hqdefault.jpg" title="<?php if(!empty($item->title)) echo $item->title; ?> " style="width: 100%;">
                        </a>
                    </div> -->
                    <?php } ?>
                <?php } ?>
                <?php } //foreach ?>

            </div>
            <!-- Gallery Items - End -->
        </div>

    </div>

</section>
<?php } //if galleryFiles?>
<!-- Section End - Portfolio