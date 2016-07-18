<style type="text/css">
/* Source: http://snipplr.com/view/10979/css-cross-browser-word-wrap */
/*force text to wrap in the div*/
.wordwrap {
    white-space: pre-wrap;      /* CSS3 */
    white-space: -moz-pre-wrap; /* Firefox */
    white-space: -pre-wrap;     /* Opera <7 */
    white-space: -o-pre-wrap;   /* Opera 7 */
    word-wrap: break-word;      /* IE */
}
</style>
<section id="sub-header_pattern_2">
    <div class="container">
        <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1><?php echo lang('list_search'); ?></h1>
                </div>
        </div><!-- End row -->
    </div><!-- End container -->
    <div class="divider_top"></div>
</section><!-- End sub-header -->

<section id="main_content">
    <div class="container">
        <div class="row">
            <aside class="col-lg-3 col-md-4 col-sm-4">
                <div class="box_style_1">
                    <h4><?php echo lang('courses'); ?></h4>
                    <ul class="submenu-col">
                        <li><a href="<?php echo base_url().'courses/search' ?>" id="<?php if(!empty($activeItem) && $activeItem == 'all') echo "active"; ?>"><?php echo lang('all_languages'); ?></a></li>
                        <?php if(!empty($languages)) {
                            foreach ($languages as $lang) { ?>
                        <li><a href="<?php echo base_url().'courses/search/language/'.$lang->id; ?>" id="<?php if(!empty($type) && $type == 'language' && !empty($activeItem) && $activeItem == $lang->id) echo "active"; ?>"><?php if(!empty($lang->title)) echo $lang->title.' ('.$lang->languageCoursesNum.')'; ?></a>

                            <?php if(!empty($lang->categories)) { ?>
                            <ul>
                                <?php foreach ($lang->categories as $cat) { ?>
                                <li><a href="<?php echo base_url().'courses/search/category/'.$cat->id; ?>" id="<?php if(!empty($type) && $type == 'category' && !empty($activeItem) && $activeItem == $cat->id) echo "active"; ?>"><?php if(!empty($cat->title)) echo $cat->title.' ('.$cat->categoryCourseNum.')'; ?> </a></li>
                                <?php } //end foreach lang->categories ?>
                            </ul>
                            <?php } //end if lang->categories ?>
                        </li>
                        <?php } //end foreach languages ?>
                        <?php } //end if languages ?>

                        <?php if(!empty($otherCourses)) { ?>
                            <li><a href="<?php echo base_url().'courses/search/other' ?>" id="<?php if(!empty($type) && !empty($activeItem) && $activeItem == 'other') echo "active"; ?>"><?php echo lang('other_courses').' ('.$otherCoursesNum.')'; ?></a></li>
                        <?php } //end if otherCourses ?>
                    </ul>

                </div>
            </aside>

            <!-- Courses -->
            <div class="col-lg-9 col-md-8 col-sm-8">
                <div class="row ">

                    <?php if(!empty($courses)) {
                        foreach ($courses as $course) { extract((array) $course); ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="col-item">
                            <div class="photo">
                                <a href="<?php echo base_url().'courses/'.$id; ?>">
                                    <?php $filename = "application/views/images/upload/courses/".$image;
                                    if ( $image != "" && file_exists( "$filename" ) ) {      ?>
                                        <img src="<?php echo base_url().$filename?>" alt="<?php if(!empty($title)) echo $title; ?>">
                                    <?php  } //end if  ?>
                                </a>
                                <div class="cat_row ">
                                    <a href="<?php if(!empty($languageId)) echo base_url().'courses/search/language/'.$languageId; ?>">
                                        <?php
                                        if(!empty($languageTitle)) {
                                            echo $languageTitle;
                                        } else {
                                            echo lang('other');
                                        } ?>
                                    </a>
                                    <span class="pull-right"><i class=" icon-clock"></i><?php if(!empty($duration) && !empty($durationText)) echo $duration.' '.lang($durationText); ?></span>
                                </div>
                            </div>
                            <div class="info <?php $colorsArray = Array('blue_bg','yellow_bg','red_bg','green_bg'); echo $colorsArray[array_rand($colorsArray)]; ?> ">
                                <div class="row">
                                    <div class="course_info col-md-12 col-sm-12 ">
                                        <h4><?php if(!empty($title)) echo $title; ?></h4>
                                        <div class="wordwrap">
                                            <!-- <p> --> <?php if(!empty($desc200)) echo $desc200; ?> <!-- </p> -->
                                        </div>
                                        <div class="price pull-right"><?php if(!empty($price)) echo $price; ?><span><?php echo lang('LE'); ?></span></div>
                                    </div>
                                </div>
                                <div class="separator clearfix">
                                    <p class="btn-add"> <a href="<?php echo base_url().'courses/'.$id.'/groups'; ?>"><i class="icon-export-4"></i> <?php echo lang('apply_now'); ?></a></p>
                                    <p class="btn-details"> <a href="<?php echo base_url().'courses/'.$id; ?>"><i class=" icon-list"></i> <?php echo lang('show_details'); ?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php } //end foreach courses ?>
                    <?php } else { ?>
                <?php
                    echo lang('no_courses');
                } ?>

                </div><!-- End row -->
            </div><!-- End col-lg-9-->



        </div><!-- End row -->

        <hr>
        <div class="row">
            <div class="col-md-12 text-center">
                <?php if(!empty($paginationText)) echo $paginationText; ?>

          </div>
      </div>

  </div><!-- End container -->
    </section><!-- End main_content -->