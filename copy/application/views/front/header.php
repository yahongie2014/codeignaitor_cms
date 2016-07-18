<!DOCTYPE html>
<html>

<head>
    <title><?php  if (!empty($title))  echo $title. ' | '; ?> MIG</title>
    <link rel='shortcut icon' type='image/ico' href='<?php if(!empty($url)) echo $url; ?>img/new/favicon.ico'>
    <link rel='fluid-icon' type='image/png' href='<?php if(!empty($url)) echo $url; ?>img/new/icon.png'>

    <script type="text/javascript" src="<?php if(!empty($url)) echo $url; ?>js/pace.min.js"></script>
    <link href="<?php if(!empty($url)) echo $url; ?>css/pace-loading-bar.css" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="<?php if(!empty($url)) echo $url; ?>css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php if(!empty($url)) echo $url; ?>css/font-awesome.min.css" />

    <link rel="stylesheet" type="text/css" href="<?php if(!empty($url)) echo $url; ?>css/materialdesignicons.css">

    <link rel="stylesheet" type="text/css" href="<?php if(!empty($url)) echo $url; ?>css/bootstrap.css">

    <script type="text/javascript" src="<?php if(!empty($url)) echo $url; ?>js/jquery.min.js"></script>
    <script src="<?php if(!empty($url)) echo $url; ?>js/inviewport-1.3.2.js"></script>
    <!--Mixitup -->
    <script type="text/javascript" src="<?php if(!empty($url)) echo $url; ?>js/jquery.mixitup.min.js"></script>

    <!--Fancybox -->
    <script type="text/javascript" src="<?php if(!empty($url)) echo $url; ?>js/jquery.fancybox.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php if(!empty($url)) echo $url; ?>css/jquery.fancybox.css" media="screen" />

    <!--Owl-->
    <link href="<?php if(!empty($url)) echo $url; ?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?php if(!empty($url)) echo $url; ?>css/owl.theme.css" rel="stylesheet">
    <link href="<?php if(!empty($url)) echo $url; ?>css/owl.transitions.css" rel="stylesheet">
    <script src="<?php if(!empty($url)) echo $url; ?>js/owl.carousel.min.js"></script>

    <!-- Main Style -->
    <link rel="stylesheet" id="main-style" type="text/css" href="<?php if(!empty($url)) echo $url; ?>css/style.css">

    <script type="text/javascript">
jQuery(function($) {

    'use strict';
        var sendMessage = "<?php echo lang('front_sending'); ?>";
        var url = "<?php echo base_url().'contact'; ?>";
    });
    </script>
    <script type="text/javascript" src="<?php if(!empty($url)) echo $url; ?>js/main.js"></script>



</head>
<body class=" angled  yellow">


    <!-- Section Start - Header -->

    <section class="header bg-lightgray header-1" >


        <!-- Menu Top Bar - Start -->
        <div class="topbar " data-effect="fadeIn">
            <div class="menu">
                <div class="primary inviewport animated delay4" data-effect="fadeInRightBig">
                    <div class='cssmenu'>

                        <!-- Menu - Start -->
                        <ul class='menu-ul'>
                            <li>
                                <a href='<?php echo base_url().'index'; ?>'><?php echo lang('front_home'); ?></a>
                            </li>
                            <li class='has-sub'>
                                <a href='<?php echo base_url().'about'; ?>'><?php echo lang('front_about'); ?> <i class='mdi mdi-chevron-down'></i></a>
                                <ul>
                                    <li>
                                        <a href='<?php echo base_url().'team'; ?>'><?php echo lang('front_team'); ?></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo base_url().'partners'; ?>'><?php echo lang('front_partners'); ?></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href='<?php echo base_url().'courses'; ?>'><?php echo lang('front_courses'); ?></a>
                            </li>
                            <li>
                                <a href='<?php echo base_url().'packages'; ?>'><?php echo lang('front_packages'); ?></a>
                            </li>

                        </ul>
                        <!-- Menu - End -->
                    </div>
                </div>
                <div class="black inviewport animated delay4" data-effect="fadeInLeftBig">
                    <div class='cssmenu'>
                        <!-- Menu - Start -->
                        <ul class='menu-ul'>
                            <li>
                                <a href='<?php echo base_url().'events'; ?>'><?php echo lang('front_events'); ?></a>
                            </li>
                            <li class='has-sub'>
                                <a href='<?php echo base_url().'gallery'; ?>'><?php echo lang('front_gallery'); ?> <i class='mdi mdi-chevron-down'></i></a>
                                <ul>
                                    <li>
                                        <a href='<?php echo base_url().'gallery/images'; ?>'><?php echo lang('front_images'); ?></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo base_url().'gallery/videos'; ?>'><?php echo lang('front_videos'); ?></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href='<?php echo base_url().'blog'; ?>'><?php echo lang('front_blog'); ?></a>
                            </li>
                            <li>
                                <a href='<?php echo base_url().'news'; ?>'><?php echo lang('front_news'); ?></a>
                            </li>
                            <li class='has-sub'>
                                <a href='<?php echo base_url().'contact'; ?>'><?php echo lang('front_contact'); ?> <i class='mdi mdi-chevron-down'></i></a>
                                <ul>
                                    <li>
                                        <a href='<?php echo base_url().'contact/feedback'; ?>'><?php echo lang('front_feedback'); ?></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- Menu - End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu Top Bar - End -->

        <!-- Logo and Mobile Menu - Start -->
        <div class='header-logo-wrap'>
            <div class="container">
                <div class="logo">
                    <a href="<?php echo base_url().'index'; ?>"><img src="<?php if(!empty($url)) echo $url; ?>img/new/logo.png" /></a>
                </div>
                <div class="menu-mobile pull-right cssmenu">
                    <i class="mdi mdi-menu menu-toggle"></i>
                    <ul class="menu" id='parallax-mobile-menu'>

                    </ul>
                </div>

            </div>
        </div>
        <!-- Logo and Mobile Menu - End -->
