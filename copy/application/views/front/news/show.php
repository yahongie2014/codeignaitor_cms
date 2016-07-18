<!-- Header Slide - Start -->
<div class="header-slide" style="position:relative;">
    <?php if(!empty($bannerData)) { ?>
    <?php $filename = "application/views/images/upload/banner/".$bannerData->image;
    if ( $bannerData->image != "" && file_exists( "$filename" ) ) {      ?>
    <img src="<?php if(!empty($post->image)) echo $post->image; ?>"  alt="<?php if(!empty($bannerData->title)) echo $bannerData->title; ?>"  class='header-img' >
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

<!-- Section Start - Blogs -->
<section class=' padding-top-50 padding-bottom-100 '>
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

            <?php if(!empty($news)) { $i = 0;
                foreach ($news as $post) { $i++;
                    if($i % 2 != 0) { ?>
                    <!-- Blog - Start -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 blog blog_altered blog_left">
                        <div class="row">

                            <!-- Blog Image - Start -->
                            <div class=" col-lg-6 col-md-6 col-sm-10 col-xs-12  pic inviewport animated delay1" data-effect="fadeIn">

                                <?php  if(!empty($post->image)) { ?>
                                                        <?php $filename = "application/views/images/upload/rssFeeds/".$post->image;
                                                         if ( $post->image!="" && file_exists( "$filename" ) ) { ?>
                                                            <div class="bs-example bs-example-images">
                                                            <img src="<?php echo base_url().$filename; ?>" class="img-responsive" alt="<?php if(!empty($post->title)) echo $post->title; ?>" title="<?php if(!empty($post->title)) echo $post->title; ?>">
                                                            </div>
                                                        <?php  }//end file_exists
                                                        elseif ($post->image!="") { ?>
                                                            <div class="bs-example bs-example-images">
                                                            <img src="<?php echo $url; ?>" class="img-responsive" alt="<?php if(!empty($post->title)) echo $post->title; ?>" title="<?php if(!empty($post->title)) echo $post->title; ?>">
                                                            </div>
                                                        <?php }
                                                        } ?>

                            </div>
                            <!-- Blog Image - End -->
                            <!-- Blog Info - Start -->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 inviewport animated delay1" data-effect="fadeIn">
                                <div class="info">
                                    <span class="date"><?php if(!empty($post->pubDate)) echo date('j F Y', strtotime($post->pubDate)); ?></span>
                                    <h4 class="title"><a href="<?php if(!empty($post->description)) echo $post->url; ?>"><?php if(!empty($post->title)) echo $post->title; ?></a></h4>
                                    <p><?php if(!empty($post->description)) echo $post->description; ?></p>
                                    <a class="btn btn-primary text-on-primary"  href="<?php if(!empty($post->description)) echo $post->url; ?>"><?php echo lang('front_read_more'); ?></a>
                                </div>
                            </div>
                            <!-- Blog Info - End -->

                        </div>
                    </div>
                    <!-- Blog - End -->

                    <?php } //if i
                    else { ?>

                    <!-- Blog - Start -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 blog blog_altered blog_right">
                        <div class="row">

                            <!-- Blog Image - Start -->
                            <div class=" col-xs-12 col-sm-10 hidden-md hidden-lg  pic inviewport animated delay1" data-effect="fadeIn">

                                <?php  if(!empty($post->image)) { ?>
                                                        <?php $filename = "application/views/images/upload/rssFeeds/".$post->image;
                                                         if ( $post->image!="" && file_exists( "$filename" ) ) { ?>
                                                            <div class="bs-example bs-example-images">
                                                            <img src="<?php echo base_url().$filename; ?>" class="img-responsive" alt="<?php if(!empty($post->title)) echo $post->title; ?>" title="<?php if(!empty($post->title)) echo $post->title; ?>">
                                                            </div>
                                                        <?php  }//end file_exists
                                                        elseif ($post->image!="") { ?>
                                                            <div class="bs-example bs-example-images">
                                                            <img src="<?php echo $url; ?>" class="img-responsive" alt="<?php if(!empty($post->title)) echo $post->title; ?>" title="<?php if(!empty($post->title)) echo $post->title; ?>">
                                                            </div>
                                                        <?php }
                                                        } ?>
                            </div>
                            <!-- Blog Image - End -->
                            <!-- Blog Info - Start -->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 inviewport animated delay1" data-effect="fadeIn">
                               <div class="info">
                                <span class="date"><?php if(!empty($post->pubDate)) echo date('j F Y', strtotime($post->pubDate)); ?></span>
                                <h4 class="title"><a href="<?php if(!empty($post->description)) echo $post->url; ?>"><?php if(!empty($post->title)) echo $post->title; ?></a></h4>
                                <p><?php if(!empty($post->description)) echo $post->description; ?></p>
                                <a class="btn btn-primary text-on-primary"  href="<?php if(!empty($post->description)) echo $post->url; ?>"><?php echo lang('front_read_more'); ?></a>
                            </div>
                        </div>
                        <!-- Blog Info - End -->
                        <!-- Blog Image - Start -->
                        <div class=" col-lg-6 col-md-6 hidden-sm hidden-xs  pic inviewport animated delay1" data-effect="fadeIn">
                                <?php  if(!empty($post->image)) { ?>
                                                        <?php $filename = "application/views/images/upload/rssFeeds/".$post->image;
                                                         if ( $post->image!="" && file_exists( "$filename" ) ) { ?>
                                                            <div class="bs-example bs-example-images">
                                                            <img src="<?php echo base_url().$filename; ?>" class="img-responsive" alt="<?php if(!empty($post->title)) echo $post->title; ?>" title="<?php if(!empty($post->title)) echo $post->title; ?>">
                                                            </div>
                                                        <?php  }//end file_exists
                                                        elseif ($post->image!="") { ?>
                                                            <div class="bs-example bs-example-images">
                                                            <img src="<?php echo $url; ?>" class="img-responsive" alt="<?php if(!empty($post->title)) echo $post->title; ?>" title="<?php if(!empty($post->title)) echo $post->title; ?>">
                                                            </div>
                                                        <?php }
                                                        } ?>
                        </div>
                        <!-- Blog Image - End -->

                    </div>
                </div>
                <!-- Blog - End -->
                <?php } //else ?>
                <?php } //foreach blog ?>
                <?php } //if blog ?>
            </div>


            <div class="row">
                <div class="col-xs-12 blog_pagination blog_altered">
                    <?php if(!empty($pagination)) echo $pagination; ?>
                </div>
            </div>


        </div>
    </section>
    <!-- Section End - Blogs -->
