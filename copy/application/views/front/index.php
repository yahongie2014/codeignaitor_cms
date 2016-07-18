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

            <div class="overlay overlay1">
                <div class="black inviewport animated delay4" data-effect="fadeInLeftOpacity"></div>
                <div class="primary inviewport animated delay4" data-effect="fadeInRightOpacity"></div>

                <!-- Header Text - Start -->
                <div class="maintext">
                        <div class="primary-text inviewport animated delay4" data-effect="fadeInRightBig">
                            <div class="left-line">
                                <h4><?php if(!empty($bannerData->title1)) echo $bannerData->title1; ?></h4>
                                <h1><?php if(!empty($bannerData->title2)) echo $bannerData->title2; ?></h1>
                            </div>
                        </div>
                        <div class="black-text inviewport animated delay4" data-effect="fadeInLeftBig">
                            <div>
                                <h1><?php if(!empty($bannerData->title3)) echo $bannerData->title3; ?></h1>
                            </div>
                        </div>
                </div>
                <!-- Header Text - End -->
            </div>
            <?php } //bannerData ?>
        </div>
        <!-- Header Slide - End -->



    </section>

<!-- Section End - Header -->

<?php if(!empty($aboutPage)) { ?>
<!-- Section Start - Why Choose Us -->
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
                <?php if(!empty($aboutPage->aboutImages)) {
                    foreach ($aboutPage->aboutImages as $item) { ?>
                        <!-- Image Carousel Item - Start -->
                        <?php $filename = "application/views/images/upload/about/".$item->image;
                        if ( $item->image != "" && file_exists( "$filename" ) ) {  ?>
                            <li class="">
                                <img class="lazyOwl img-responsive" data-src="<?php echo base_url().$filename; ?>"  alt="<?php if(!empty($aboutPage->title)) echo $aboutPage->title; ?>"  src="#">
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
<?php } //aboutPage ?>

<!-- Section Start - Services -->
<section class='bg-primary '>



        <!-- Angled Section - Start -->
        <div class="angled_down_outside outside primary lightgray">
            <div class="slope downleft"></div>
            <div class="slope downright"></div>
        </div>
        <!-- Angled Section - End -->

    </section>
<!-- Section End - Services -->


<section class=" paddin-top-25 padding-bottom-100" id="">
    <div class="container">
    <div class="row home-courses">
            <?php if(!empty($coursesContent)) { ?>
            <h1 class="heading"><?php if(!empty($coursesContent->title)) echo $coursesContent->title; ?></h1>
            <div class="headul"></div>
            <p class="subheading"><?php if(!empty($coursesContent->caption)) echo $coursesContent->caption; ?></p>
            <?php } //coursesContent ?>

            <?php if(!empty($courses)) {
                foreach ($courses as $course) { ?>
            <div class="filter-item2 a1 col-lg-4 col-md-4 col-sm-8 col-xs-12 course inviewport animated delay2">
                <div class="pic">
                    <a href="<?php echo base_url().'courses/'.$course->id; ?>">
                        <?php $filename = "application/views/images/upload/courses/".$course->image;
                        if ( $course->image != "" && file_exists( "$filename" ) ) {  ?>
                            <img alt="<?php if(!empty($course->title)) echo $course->title; ?>" class="img-responsive" src="<?php echo base_url().$filename; ?>">
                        <?php  } //end if ?>
                    </a>
                    <ul class="social">
                            <li>
                                <?php if(!empty($course->duration)) echo $course->duration; ?>
                            </li>
                            <li class="fees">
                                <?php if(!empty($course->price)) echo $course->price; ?> L.E.
                            </li>
                    </ul>
                </div>
                <div class="info">
                    <h3><a href="<?php echo base_url().'courses/'.$course->id; ?>"><?php if(!empty($course->title)) echo $course->title; ?></a></h3>
                    <p><?php if(!empty($course->desc200)) echo $course->desc200; ?></p>
                </div>
            </div>
                        <!-- Item - End -->
                <?php } // foreach courses ?>
            <?php } //if courses ?>

        </div>
        <div class="row">
            <div class="padding-more-link">
                <a href="<?php echo base_url().'courses'; ?>" class="btn btn-primary"><?php echo lang('more'); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Section Start - Meet Our Team -->
<section class='bg-lightgray padding-bottom-0 ' id='team'><div class="container">
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

    </div>
        <!-- Angled Section - Start -->
        <div class="angled_up_inside lightgray">
            <div class="slope upleft"></div>
            <div class="slope upright"></div>
        </div>
        <!-- Angled Section - End -->

    </section>
<!-- Section End - Meet Our Team -->

<!-- Section Start - Clients -->
<section class='bg-primary clients padding-top-125 padding-bottom-0 '>
    <div class="container">
        <div class="row">
        <?php if(!empty($contactInfo))  {  extract((array) $contactInfo); ?>
                <?php if(!empty($facebook)) { ?>
                <!-- Client Image - Start -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 client inviewport animated delay1" data-effect="fadeInUp">
                <a href="<?php echo $facebook; ?>" target="_blank"><img alt="client-logo" src="<?php if(!empty($url)) echo $url; ?>img/client-1.png" class="img-responsive"></a>
            </div>
            <!-- Client Image - End -->
            <?php } //facebook ?>

            <?php if(!empty($twitter)) { ?>
                    <!-- Client Image - Start -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 client inviewport animated delay2" data-effect="fadeInUp">
                <a href="<?php echo $twitter; ?>" target="_blank"><img alt="client-logo" src="<?php if(!empty($url)) echo $url; ?>img/client-2.png" class="img-responsive"></a>
            </div>
            <!-- Client Image - End -->
            <?php } //twitter ?>
            <?php if(!empty($linkedIn)) { ?>
                    <!-- Client Image - Start -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 client inviewport animated delay3" data-effect="fadeInUp">
                <a href="<?php echo $linkedIn; ?>" target="_blank"><img alt="client-logo" src="<?php if(!empty($url)) echo $url; ?>img/client-3.png" class="img-responsive"></a>
            </div>
            <!-- Client Image - End -->
            <?php } //linkedIn ?>
                    <!-- Client Image - Start -->
            <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 client inviewport animated delay4" data-effect="fadeInUp">
                <a href=""><img alt="client-logo" src="<?php if(!empty($url)) echo $url; ?>img/client-4.png" class="img-responsive"></a>
            </div> -->
            <!-- Client Image - End -->
            <?php } //contactInfo ?>
        </div>

    </div>
        <!-- Angled Section - Start -->
        <div class="angled_down_outside outside primary lightgray">
            <div class="slope downleft"></div>
            <div class="slope downright"></div>
        </div>
        <!-- Angled Section - End -->

</section>
<!-- Section End - Clients -->

<!-- Section Start - Blogs -->
<section class='bg-lightgray padding-bottom-100 '><div class="container">
    <div class="row">
            <?php if(!empty($blogContent)) { ?>
            <h1 class="heading"><?php if(!empty($blogContent->title)) echo $blogContent->title; ?></h1>
            <div class="headul"></div>
            <p class="subheading"><?php if(!empty($blogContent->caption)) echo $blogContent->caption; ?></p>
            <?php } //blogContent ?>

            <?php if(!empty($blog)) { $i = 0;
                foreach ($blog as $post) {  $i++;
                    if($i == 1) { ?>

            <!-- Blog - Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 blog blog_altered blog_left">
                <div class="row">

                <!-- Blog Image - Start -->
                <div class=" col-lg-6 col-md-6 col-sm-10 col-xs-12  pic inviewport animated delay1" data-effect="fadeIn">
                    <?php $filename = "application/views/images/upload/blog/".$post->image;
                    if ( $post->image != "" && file_exists( "$filename" ) ) {  ?>
                        <img  alt="<?php if(!empty($post->title)) echo $post->title; ?>" title="<?php if(!empty($post->title)) echo $post->title; ?>" class="img-responsive" src="<?php echo base_url().$filename; ?>">
                    <?php  } //end if ?>
                </div>
        <!-- Blog Image - End -->
            <!-- Blog Info - Start -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 inviewport animated delay1" data-effect="fadeIn">
                    <div class="info">
                        <span class="date"><?php if(!empty($post->addingDate)) echo date('j F Y', strtotime($post->addingDate)); ?></span>
                        <h4 class="title"><a href="<?php echo base_url().'blog/'.$post->id; ?>"><?php if(!empty($post->title)) echo $post->title; ?></a></h4>
                        <p><?php if(!empty($post->description)) echo $post->description; ?></p>

                        <a class="btn btn-primary text-on-primary"  href="<?php echo base_url().'blog/'.$post->id; ?>"><?php echo lang('front_read_more'); ?></a>
                    </div>
                </div>
        <!-- Blog Info - End -->

                </div>
            </div>
        <!-- Blog - End -->
        <?php } else { ?>
        <!-- Blog - Start -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 blog blog_altered blog_right">
                <div class="row">

                <!-- Blog Image - Start -->
                <div class=" col-xs-12 col-sm-10 hidden-md hidden-lg  pic inviewport animated delay1" data-effect="fadeIn">
                    <?php $filename = "application/views/images/upload/blog/".$post->image;
                    if ( $post->image != "" && file_exists( "$filename" ) ) {  ?>
                        <img  alt="<?php if(!empty($post->title)) echo $post->title; ?>" title="<?php if(!empty($post->title)) echo $post->title; ?>" class="img-responsive" src="<?php echo base_url().$filename; ?>">
                    <?php  } //end if ?>
                </div>
        <!-- Blog Image - End -->
            <!-- Blog Info - Start -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 inviewport animated delay1" data-effect="fadeIn">
                    <div class="info">
                        <span class="date"><?php if(!empty($post->addingDate)) echo date('j F Y', strtotime($post->addingDate)); ?></span>
                        <h4 class="title"><a href="<?php echo base_url().'blog/'.$post->id; ?>"><?php if(!empty($post->title)) echo $post->title; ?></a></h4>
                        <p><?php if(!empty($post->description)) echo $post->description; ?></p>

                        <a class="btn btn-primary text-on-primary"  href="<?php echo base_url().'blog/'.$post->id; ?>">Read More</a>
                    </div>
                </div>
        <!-- Blog Info - End -->
            <!-- Blog Image - Start -->
                <div class=" col-lg-6 col-md-6 hidden-sm hidden-xs  pic inviewport animated delay1" data-effect="fadeIn">
                    <?php $filename = "application/views/images/upload/blog/".$post->image;
                    if ( $post->image != "" && file_exists( "$filename" ) ) {  ?>
                        <img  alt="<?php if(!empty($post->title)) echo $post->title; ?>" title="<?php if(!empty($post->title)) echo $post->title; ?>" class="img-responsive" src="<?php echo base_url().$filename; ?>">
                    <?php  } //end if ?>
                </div>
        <!-- Blog Image - End -->

                </div>
            </div>
        <!-- Blog - End -->
        <?php } //else ?>
        <?php } //foreach ?>
        <?php } //if ?>
       </div>
    </div>
        <!-- Angled Section - Start -->
            <div class="angled_up_inside lightgray">
                <div class="slope upleft"></div>
                <div class="slope upright"></div>
            </div>
        <!-- Angled Section - End -->

    </section>
<!-- Section End - Blogs -->

<?php if(!empty($testimonials)) { ?>
<!-- Section Start - Twitter -->
<section class="parallax twitter" id="twitter" style=" background-image: url('img/banner-1.jpg'); position: relative; overflow: hidden; background-size: cover; background-position: center center;" >
    <div class="bg-overlay opacity-85"></div>
    <div class="container">
        <div class="row">
            <h1 class="heading">Testimonials </h1>
            <div class="headul"></div>

            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">

            <!-- Tweet Carousel - Start -->
                <ul id="twitter-carousel" class="owl-carousel">
                    <?php $i = 0; foreach ($testimonials as $item) {  $i++; ?>
                        <!-- Tweet - Start -->
                    <li class="">
                      <h3 class="tweet" data-id="tweet-<?php echo $i; ?>">
                          <?php if(!empty($item->testimonial)) echo $item->testimonial; ?>               </h3>
                      <div class="tweet_by"><?php if(!empty($item->name)) echo $item->name; ?></div>
                    </li>
                    <!-- Tweet - End -->
                    <?php } //foreach testimonials ?>
                </ul>
                <!-- Tweet Carousel - End -->
            </div>
        </div>
    </div>
</section>
<!-- Section End - Twitter -->
<?php } //testimonials ?>