<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/favicon.ico">

    <title>Login | MIG Academy</title>

 <meta charset="UTF-8" />
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><!--
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

 <!-- <meta http-equiv="content-type" content="text/html; charset=UTF-8"> -->




    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().$css; ?>/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url().$css; ?>/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url().$css; ?>/style.css" rel="stylesheet">
    <link href="<?php echo base_url().$css; ?>/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>js/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

<?php echo $content; ?>


            <?php $this->load->view('admin/footer.php'); ?>
