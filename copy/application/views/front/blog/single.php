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

<!-- Section Start - Blog Single Page -->
<section class=' padding-top-50 padding-bottom-100 '>
    <!-- Angled Section - Start -->
    <div class="angled_down_inside white">
        <div class="slope upleft"></div>
        <div class="slope upright"></div>
    </div>
    <!-- Angled Section - End -->

    <div class="container">
        <?php if(!empty($post)) { ?>
        <div class="row">
            <div class="blog blog-full">
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 info inviewport animated delay1" data-effect="fadeIn">
                    <span class="date"><?php if(!empty($post->addingDate)) echo date('j F Y', strtotime($post->addingDate)); ?></span>
                    <h3 class="title"><a href="#"><?php if(!empty($post->title)) echo $post->title; ?></a></h3>
                    <p class="meta">
                        <?php if(!empty($post->tags)) { ?>
                        <span><?php echo lang('front_in'); ?>:
                        <?php $i=0; foreach ($post->tags as $tag) { $i++; ?>
                        <a href="<?php echo base_url().'blog/t/'.$tag->id; ?>"><?php if(!empty($tag->title)) echo $tag->title; ?></a>
                        <?php
                                if($i != count($post->tags)) {
                                    echo ", ";
                                }
                            } //forach tags
                         } //if tags ?>
                    </span>
                    <span><?php echo lang('front_posted_by'); ?>: <a href='#'><?php if(!empty($post->firstName) && !empty($post->lastName)) echo $post->firstName.' '.$post->lastName; ?></a></span></p>
                </div>

                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 media inviewport animated delay1" data-effect="fadeIn">
                    <?php $filename = "application/views/images/upload/blog/".$post->image;
                    if ( $post->image != "" && file_exists( "$filename" ) ) {  ?>
                    <img class="img-responsive" src="<?php echo base_url().$filename; ?>" alt="<?php if(!empty($post->title)) echo $post->title; ?>" title="<?php if(!empty($post->title)) echo $post->title; ?>">
                    <?php  } //end if ?>
                </div>

                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 info inviewport animated delay1" data-effect="fadeIn">
                    <p><?php if(!empty($post->description)) echo $post->description; ?></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php  } //post ?>
    </div>
</section>
<!-- Section End - Blog Single Page -->