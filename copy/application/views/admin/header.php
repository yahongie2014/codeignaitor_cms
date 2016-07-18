<!DOCTYPE html>
<html lang="en">
<head>

 <meta charset="UTF-8" />
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><!--
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <!-- <meta http-equiv="content-type" content="text/html; charset=UTF-8"> -->

 <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico">

 <title><?php
 echo $this->config->item('site_title');
 if (!empty($page_title))
  echo " " . $this->config->item('site_title_delimiter') . " " . $page_title;
?></title>


<!-- Bootstrap core CSS -->
<link href="<?php echo base_url().$css; ?>/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">

<link href="<?php echo base_url().$css; ?>/bootstrap-reset.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" />
<!--external css-->
<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url().$css; ?>/owl.carousel.css" type="text/css">
<!-- Custom styles for this template -->
<link href="<?php echo base_url().$css; ?>/style.css" rel="stylesheet">
<link href="<?php echo base_url().$css; ?>/style-responsive.css" rel="stylesheet" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>js/html5shiv.js"></script>
<script src="<?php echo base_url (); ?>js/respond.min.js"></script>
<![endif]-->

</head>

<body>

  <section id="container" >
    <!--header start-->
    <header class="header white-bg">
      <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
      </div>
      <!--logo start-->
      <a href="<?php echo base_url().'admin' ?>" class="logo" <?php if(!empty($css) && $css == 'arabic') { echo 'style="float: right !important;"'; } ?> ><!-- <img src="<?php //echo base_url(); ?>/img/main-logo.png" /> --></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
        </ul>
      </div>
      <div class="top-nav ">
        <ul class="nav pull-right top-menu">
                 <!--  <li>
                      <input type="text" class="form-control search" placeholder="Search">
                    </li> -->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="username"><?php //if ($this->admin_ion_auth->is_admin()){

                          $user = $this->admin_ion_auth->user()->row();
                          if (!empty($user->username)) {
                            echo $user->username;
                          }
                        //}    ?></span>
                        <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="<?php echo base_url().'admin/users/update/'. $this->session->userdata('adminId');?>"> <i class=" icon-suitcase"></i><?php echo lang('Profile') ?></a></li>

                          <li class="gr "><a href="<?php echo site_url('admin/index/set_lang/german'); ?>" class="language-link active" lang="en"><img class="language-icon" src="<?php echo base_url(); ?>img/gr.png" width="16" height="12" alt="German" title="German" /> </a></li>

                         <li class="ar first"><a href="<?php echo site_url('admin/index/set_lang/arabic'); ?>" class="language-link" lang="ar"><img class="language-icon" src="<?php echo base_url(); ?>img/sa.png" width="16" height="12" alt="Arabic" title="Arabic" /> </a></li>

                         <li><a href="<?php echo site_url('admin/auth/logout'); ?>"><i class="icon-key"></i><?php echo lang('logout') ?></a></li>
                       </ul>
                     </li>
                     <!-- user login dropdown end -->
                   </ul>
                 </div>
               </header>
               <!--header end-->

               <!--sidebar start-->
               <aside>
                <div id="sidebar"  class="nav-collapse">
                  <!-- sidebar menu start-->
                  <ul class="sidebar-menu">
                    <li >
                      <a  href="<?php echo site_url('admin'); ?>">
                        <span class="glyphicon glyphicon-dashboard"></span>
                        <span><?php echo lang('home'); ?></span>
                      </a>
                    </li>

                        <li <?php if((!empty($admin_menu_home_main) && $admin_menu_home_main == true) || (!empty($admin_menu_banner) && $admin_menu_banner == true)) { echo ' class="sub-menu active"'; } else { echo " class='sub-menu'"; } ?> >
                          <a href="javascript:;" >
                            <span class="glyphicon glyphicon-file"></span>
                            <span><?php echo lang('index'); ?></span>
                            <span class="arrow"></span>
                          </a>
                          <ul class="sub">
                            <li  <?php if(!empty($admin_menu_banner) && $admin_menu_banner == true) { echo ' class="active"'; } ?>>
                              <a  href="<?php echo base_url(); ?>admin/banner">
                                <span><?php echo lang('banner'); ?></span>
                              </a>
                            </li>
                          </ul>
                        </li>


                        <li <?php if((!empty($admin_menu_about) && $admin_menu_about == true) ) { echo ' class="sub-menu active"'; } else { echo " class='sub-menu'"; } ?> >
                              <a  href="<?php echo base_url(); ?>admin/about">
                                <span class="glyphicon glyphicon-file"></span>
                                <span><?php echo lang('about'); ?></span>
                              </a>
                        </li>

                        <li  <?php if(!empty($admin_menu_instructors) && $admin_menu_instructors == true) { echo ' class="sub-menu active"'; } else { echo " class='sub-menu'"; } ?> >
                          <a href="<?php echo base_url(); ?>admin/instructors" >
                            <span class="glyphicon glyphicon-user"></span>
                            <span><?php echo lang('instructors'); ?></span>
                          </a>
                        </li>

                        <li  <?php if(!empty($admin_menu_categories) && $admin_menu_categories == true) { echo ' class="sub-menu active"'; } else { echo " class='sub-menu'"; } ?> >
                          <a href="<?php echo base_url(); ?>admin/categories" >
                            <span class="glyphicon glyphicon-file"></span>
                            <span><?php echo lang('categories'); ?></span>
                          </a>
                        </li>

                    <li <?php if((!empty($admin_menu_coursesContent) && $admin_menu_coursesContent === true) || (!empty($admin_menu_courses) && $admin_menu_courses === true) || (!empty($admin_menu_courses_application) && $admin_menu_courses_application === true)  ) { echo ' class="sub-menu active"'; } else { echo " class='sub-menu'"; } ?> >
                      <a href="javascript:;" >
                        <span class="glyphicon glyphicon-file"></span>
                        <span><?php echo lang('courses'); ?></span>
                        <span class="arrow"></span>
                      </a>
                      <ul class="sub">

                        <li  <?php if(!empty($admin_menu_coursesContent) && $admin_menu_coursesContent == true) { echo ' class="active"'; } ?>>
                          <a  href="<?php echo base_url(); ?>admin/general/coursesContent">
                            <span><?php echo lang('content'); ?></span>
                          </a>
                        </li>

                        <li <?php if(!empty($admin_menu_courses) && $admin_menu_courses == true) { echo ' class="active"'; } ?>><a  href="<?php echo base_url(); ?>admin/courses"><?php echo lang('courses'); ?></a></li>
                        <li <?php if(!empty($admin_menu_courses_application) && $admin_menu_courses_application == true) { echo ' class="active"'; } ?>><a  href="<?php echo base_url(); ?>admin/trainees/assign/0/0/course"><?php echo lang('course_application'); ?></a></li>
                      </ul>
                    </li>

                    <li <?php if((!empty($admin_menu_packagesContent) && $admin_menu_packagesContent === true) || (!empty($admin_menu_packages) && $admin_menu_packages === true) || (!empty($admin_menu_packages_application) && $admin_menu_packages_application === true)  ) { echo ' class="sub-menu active"'; } else { echo " class='sub-menu'"; } ?> >
                      <a href="javascript:;" >
                        <span class="glyphicon glyphicon-file"></span>
                        <span><?php echo lang('packages'); ?></span>
                        <span class="arrow"></span>
                      </a>
                      <ul class="sub">

                        <li  <?php if(!empty($admin_menu_packagesContent) && $admin_menu_packagesContent == true) { echo ' class="active"'; } ?>>
                          <a  href="<?php echo base_url(); ?>admin/general/packagesContent">
                            <span><?php echo lang('content'); ?></span>
                          </a>
                        </li>

                        <li <?php if(!empty($admin_menu_packages) && $admin_menu_packages == true) { echo ' class="active"'; } ?>><a  href="<?php echo base_url(); ?>admin/packages"><?php echo lang('packages'); ?></a></li>
                        <li <?php if(!empty($admin_menu_packages_application) && $admin_menu_packages_application == true) { echo ' class="active"'; } ?>><a  href="<?php echo base_url(); ?>admin/trainees/assign/0/0/package"><?php echo lang('package_application'); ?></a></li>
                      </ul>
                    </li>

                    <li  <?php if(!empty($admin_menu_trainees) && $admin_menu_trainees == true) { echo ' class="sub-menu active"'; } else { echo " class='sub-menu'"; } ?> >
                      <a href="<?php echo base_url(); ?>admin/trainees" >
                        <span class="glyphicon glyphicon-user"></span>
                        <span><?php echo lang('trainees'); ?></span>
                      </a>
                    </li>


                    <li <?php if((!empty($admin_menu_ourTeam) && $admin_menu_ourTeam === true) || (!empty($admin_menu_our_team) && $admin_menu_our_team === true) ) { echo ' class="sub-menu active"'; } else { echo " class='sub-menu'"; } ?> >
                      <a href="javascript:;" >
                        <span class="glyphicon glyphicon-user"></span>
                        <span><?php echo lang('our_team'); ?></span>
                        <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                        <li  <?php if(!empty($admin_menu_ourTeam) && $admin_menu_ourTeam == true) { echo ' class="active"'; } ?>>
                          <a  href="<?php echo base_url(); ?>admin/general/ourTeam">
                            <span><?php echo lang('content'); ?></span>
                          </a>
                        </li>
                        <li <?php if(!empty($admin_menu_our_team) && $admin_menu_our_team == true) { echo ' class="active"'; } ?>><a  href="<?php echo base_url(); ?>admin/ourTeam"><?php echo lang('our_team'); ?></a></li>
                      </ul>
                    </li>

                    <li <?php if((!empty($admin_menu_partnersContent) && $admin_menu_partnersContent === true) || (!empty($admin_menu_partners) && $admin_menu_partners === true) ) { echo ' class="sub-menu active"'; } else { echo " class='sub-menu'"; } ?> >
                      <a href="javascript:;" >
                        <span class="glyphicon glyphicon-user"></span>
                        <span><?php echo lang('partners'); ?></span>
                        <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                        <li  <?php if(!empty($admin_menu_partnersContent) && $admin_menu_partnersContent == true) { echo ' class="active"'; } ?>>
                          <a  href="<?php echo base_url(); ?>admin/general/partnersContent">
                            <span><?php echo lang('content'); ?></span>
                          </a>
                        </li>
                        <li <?php if(!empty($admin_menu_partners) && $admin_menu_partners == true) { echo ' class="active"'; } ?>><a  href="<?php echo base_url(); ?>admin/partners"><?php echo lang('partners'); ?></a></li>
                      </ul>
                    </li>
                    <li <?php if((!empty($admin_menu_galleryContent) && $admin_menu_galleryContent === true) || (!empty($admin_menu_albumsContent) && $admin_menu_albumsContent === true) || (!empty($admin_menu_videosContent) && $admin_menu_videosContent === true)  || (!empty($admin_menu_gallery) && $admin_menu_gallery === true)  || (!empty($admin_menu_albums) && $admin_menu_albums === true)  || (!empty($admin_menu_videos) && $admin_menu_videos === true) ) { echo ' class="sub-menu active"'; } else { echo " class='sub-menu'"; } ?> >
                      <a href="javascript:;" >
                        <span class="glyphicon glyphicon-file"></span>
                        <span><?php echo lang('gallery'); ?></span>
                        <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                        <li  <?php if(!empty($admin_menu_galleryContent) && $admin_menu_galleryContent == true) { echo ' class="active"'; } ?>>
                          <a  href="<?php echo base_url(); ?>admin/general/galleryContent">
                            <span><?php echo lang('content'); ?></span>
                          </a>
                        </li>
                        <li  <?php if(!empty($admin_menu_albumsContent) && $admin_menu_albumsContent == true) { echo ' class="active"'; } ?>>
                          <a  href="<?php echo base_url(); ?>admin/general/albumsContent">
                            <span><?php echo lang('albumsContent'); ?></span>
                          </a>
                        </li>
                        <li  <?php if(!empty($admin_menu_videosContent) && $admin_menu_videosContent == true) { echo ' class="active"'; } ?>>
                          <a  href="<?php echo base_url(); ?>admin/general/videosContent">
                            <span><?php echo lang('videosContent'); ?></span>
                          </a>
                        </li>
                        <li <?php if(!empty($admin_menu_albums) && $admin_menu_albums == true) { echo ' class="active"'; } ?>><a  href="<?php echo base_url(); ?>admin/albums"><?php echo lang('albums'); ?></a></li>
                        <li <?php if(!empty($admin_menu_videos) && $admin_menu_videos == true) { echo ' class="active"'; } ?>><a  href="<?php echo base_url(); ?>admin/videos"><?php echo lang('videos'); ?></a></li>
                      </ul>
                    </li>

                    <li  <?php if((!empty($admin_menu_blog) && $admin_menu_blog == true) ||(!empty($admin_menu_blogContent) && $admin_menu_blogContent == true) || (!empty($admin_menu_tags_blog) && $admin_menu_tags_blog == true) ) { echo ' class="sub-menu active"'; } else{ echo " class='sub-menu'"; } ?>>
                      <a href="javascript:;">
                        <span class="glyphicon glyphicon-file"></span>
                        <span><?php echo lang('blog'); ?></span>
                        <span class="arrow"></span>
                      </a>

                      <ul class="sub">
                        <li  <?php if(!empty($admin_menu_blogContent) && $admin_menu_blogContent == true) { echo ' class="active"'; } ?>>
                          <a  href="<?php echo base_url(); ?>admin/general/blogContent">
                            <span><?php echo lang('blogContent'); ?></span>
                          </a>
                        </li>
                        <li <?php if(!empty($admin_menu_tags_blog) && $admin_menu_tags_blog == true) { echo ' class="active"'; } ?>><a class="" href="<?php echo base_url(); ?>admin/tags/blog"><?php echo lang('tags'); ?></a></li>
                        <li <?php if(!empty($admin_menu_blog) && $admin_menu_blog == true) { echo ' class="active"'; } ?>><a class="" href="<?php echo base_url(); ?>admin/blog"><?php echo lang('blog'); ?></a></li>
                      </ul>
                    </li>

                    <li <?php if(isset($admin_menu_rssFeed) && $admin_menu_rssFeed == true) { echo ' class="sub-menu active"'; } else { echo ' class="sub-menu"'; } ?> >
                        <a href="javascript:;" class="">
                            <span class="glyphicon glyphicon-file"></span>
                            <span>
                              <?php echo lang('newsFeed'); ?>
                            </span>&nbsp;&nbsp;&nbsp;
                            <span style="color:#FF0000;"><?php if(!empty($feedsCount)) echo $feedsCount; ?></span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li  <?php if(!empty($admin_menu_newsContent) && $admin_menu_newsContent == true) { echo ' class="active"'; } ?>>
                              <a  href="<?php echo base_url(); ?>admin/general/newsContent">
                                <span><?php echo lang('newsContent'); ?></span>
                              </a>
                            </li>
                          <li <?php if(isset($admin_menu_newsFeed) && $admin_menu_newsFeed == true) { echo ' class="  active"'; } else { echo ' class=""'; } ?>><a class="" href="<?php echo base_url().'admin/newsFeed'; ?>"><?php echo lang('newsFeedSettings'); ?></a></li>

                          <li <?php if(isset($admin_menu_rssFeeds) && $admin_menu_rssFeeds == true) { echo ' class="  active"'; } else { echo ' class=""'; } ?>><a class="" href="<?php echo base_url(); ?>admin/rssFeeds"><?php echo lang('newsFeed'); ?></a></li>
                        </ul>
                    </li>
                    <li  <?php if((!empty($admin_menu_events) && $admin_menu_events == true) ||(!empty($admin_menu_eventsContent) && $admin_menu_eventsContent == true) || (!empty($admin_menu_tags_events) && $admin_menu_tags_events == true) ) { echo ' class="sub-menu active"'; } else{ echo " class='sub-menu'"; } ?>>
                      <a href="javascript:;">
                        <span class="glyphicon glyphicon-file"></span>
                        <span><?php echo lang('events'); ?></span>
                        <span class="arrow"></span>
                      </a>

                      <ul class="sub">
                        <li  <?php if(!empty($admin_menu_eventsContent) && $admin_menu_eventsContent == true) { echo ' class="active"'; } ?>>
                          <a  href="<?php echo base_url(); ?>admin/general/eventsContent">
                            <span><?php echo lang('eventsContent'); ?></span>
                          </a>
                        </li>
                        <li <?php if(!empty($admin_menu_events) && $admin_menu_events == true) { echo ' class="active"'; } ?>><a class="" href="<?php echo base_url(); ?>admin/events"><?php echo lang('events'); ?></a></li>
                      </ul>
                    </li>

                    <li <?php if((!empty($admin_menu_testimonials) && $admin_menu_testimonials == true) ) { echo ' class="sub-menu active"'; } else { echo " class='sub-menu'"; } ?> >
                          <a  href="<?php echo base_url(); ?>admin/testimonials">
                            <span class="glyphicon glyphicon-comment"></span>
                            <span><?php echo lang('testimonials'); ?></span>
                          </a>
                    </li>

                    <li <?php if((!empty($admin_menu_contactContent) && $admin_menu_contactContent === true) || (!empty($admin_menu_contact) && $admin_menu_contact === true) ) { echo ' class="sub-menu active"'; } else { echo " class='sub-menu'"; } ?> >
                      <a href="javascript:;" >
                        <span class="glyphicon glyphicon-comment"></span>
                        <span><?php echo lang('contact_us'); ?></span>
                        <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                        <li  <?php if(!empty($admin_menu_contactContent) && $admin_menu_contactContent == true) { echo ' class="active"'; } ?>>
                          <a  href="<?php echo base_url(); ?>admin/general/contactContent">
                            <span><?php echo lang('content'); ?></span>
                          </a>
                        </li>
                        <li <?php if(!empty($admin_menu_contact) && $admin_menu_contact == true) { echo ' class="active"'; } ?>><a  href="<?php echo base_url(); ?>admin/contactUs"><?php echo lang('contact_us'); ?></a></li>
                      </ul>
                    </li>

                    <li <?php if((!empty($admin_menu_feedbackContent) && $admin_menu_feedbackContent === true) || (!empty($admin_menu_feedback) && $admin_menu_feedback === true) ) { echo ' class="sub-menu active"'; } else { echo " class='sub-menu'"; } ?> >
                      <a href="javascript:;" >
                        <span class="glyphicon glyphicon-comment"></span>
                        <span><?php echo lang('feedback'); ?></span>
                        <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                        <li  <?php if(!empty($admin_menu_feedbackContent) && $admin_menu_feedbackContent == true) { echo ' class="active"'; } ?>>
                          <a  href="<?php echo base_url(); ?>admin/general/feedbackContent">
                            <span><?php echo lang('content'); ?></span>
                          </a>
                        </li>
                        <li <?php if(!empty($admin_menu_feedback) && $admin_menu_feedback == true) { echo ' class="active"'; } ?>><a  href="<?php echo base_url(); ?>admin/feedback"><?php echo lang('feedback'); ?></a></li>
                      </ul>
                    </li>

                    <li  <?php if(isset($admin_menu_newsletter) && $admin_menu_newsletter == true) { echo ' class="sub-menu active"'; } else { echo " class='sub-menu'"; } ?> >
                      <a href="<?php echo base_url(); ?>admin/newsletter" >
                        <span class="glyphicon glyphicon-picture"></span>
                        <span><?php echo lang('newsletter'); ?></span>
                      </a>
                    </li>

                        <li  <?php if(!empty($admin_menu_users) && $admin_menu_users == true) { echo ' class="sub-menu active systemClass"'; } else { echo " class='sub-menu systemClass'"; } ?> >
                          <a href="javascript:;" >
                            <span class="glyphicon glyphicon-user"></span>
                            <span><?php echo lang('users'); ?></span>
                            <span class="arrow"></span>
                          </a>
                          <ul class="sub">

                            <li <?php if(!empty($admin_menu_users_add) && $admin_menu_users_add == true) { echo ' class="active"'; } ?>><a  href="<?php echo base_url(); ?>admin/users/add"><?php echo lang('add_admin');   ?></a></li>

                            <li <?php if(!empty($admin_menu_users_show) && $admin_menu_users_show == true) { echo ' class="active"'; } ?>><a  href="<?php echo base_url(); ?>admin/users"><?php echo lang('users'); ?></a></li>
                          </ul>
                        </li>

                  </ul>
                  <!-- sidebar menu end-->
                </div>
              </aside>
              <!--sidebar end-->