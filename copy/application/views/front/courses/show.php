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

            <?php if(!empty($categories)) { ?>
            <div class="filter-categories filter-mixitup">
                <span class="btn filter " data-filter="all">All</span>
                <?php $i = 0; foreach ($categories as $cat) { $i++; ?>
                <span class="btn filter " data-filter=".a<?php if(!empty($cat->id)) echo $cat->id; ?>"><?php if(!empty($cat->title)) echo $cat->title; ?></span>
                <?php } //foreach categories ?>
            </div>
            <?php } //if categories ?>
            <div class="filter-items filter-mixitup  inviewport animated " data-effect="fadeIn" id="courses-mixitup">

                <?php if(!empty($courses)) {
                 foreach ($courses as $item) { ?>
                <div class="filter-item2 a<?php if(!empty($item->categoryId)) echo $item->categoryId; ?> col-lg-4 col-md-4 col-sm-8 col-xs-12 course inviewport animated delay2">
                    <div class="pic">
                        <?php $filename = "application/views/images/upload/courses/".$item->image;
                        if ( $item->image != "" && file_exists( "$filename" ) ) {      ?>
                            <a href="<?php echo base_url().'courses/'.$item->id; ?>"><img alt="<?php if(!empty($item->title)) echo $item->title; ?>" title="<?php if(!empty($item->title)) echo $item->title; ?>" class="img-responsive" src="<?php echo base_url().$filename; ?>"></a>
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
                    <div class="info">
                        <h3><a href="<?php echo base_url().'courses/'.$item->id; ?>"><?php if(!empty($item->title)) echo $item->title; ?></a></h3>
                        <p><?php if(!empty($item->desc200)) echo $item->desc200; ?></p>
                    </div>
                </div>
                <!-- Item - End -->
                <?php } //foreach courses
                } //if courses ?>
            </div>
        </div>
    </div>
    <!-- Angled Section - Start -->
    <div class="angled_up_inside white">
    </div>
    <!-- Angled Section - End -->
</section>
<!-- Section End - Meet Our Team -->