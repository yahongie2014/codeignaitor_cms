
<?php



if ( isset( $contactMessage ) && count($contactMessage) == 0) {
  echo'<div>'.lang( 'no_data' ).'</div>';

}else {

  $message      = $contactMessage->message;

  $ID           = (int)$contactMessage->id;

  $name    = $contactMessage->name;
  $tel    = $contactMessage->tel;
  $email    = $contactMessage->email;
  $Date      = $contactMessage->date;


  ?>

  <section id="main-content">

      <section class="wrapper">

        <div class="row">

          <div class="col-lg-12">

            <!--breadcrumbs start -->

            <ul class="breadcrumb">

              <li><a href="<?php echo site_url('admin'); ?>"><i class="icon-dashboard"></i><?php echo lang( 'home' ); ?></a></li>

              <li class="active"><?php echo  lang( 'contact_us' );?></li>

          </ul>

          <!--breadcrumbs end -->

      </div>

  </div>



  <!-- page start-->

  <div class="row">

      <div class="col-lg-12">

       <section class="panel">



         <!-- Form Start -->

         <div class="form">

           <?php if ( $this->session->flashdata( 'msg' ) ) {?><div id="divMessage" class="<?php echo $this->session->flashdata( 'msg_class' );?>" ><?php echo $this->session->flashdata( 'msg' );?></div><?php }  ?>

           <form class="cmxform form-horizontal tasi-form" id="signupForm" enctype="multipart/form-data" method="post" action="">

            <!-- tabbed header -->

            <header class="panel-heading tab-bg-dark-navy-blue tab-right ">



                <!-- <span class="hidden-sm wht-color"><?php //echo lang( 'edit_service'); ?></span> -->

            </header>

            <!-- tabbed content -->

            <div class="panel-body">

                <div class="tab-content">
                  <div class="form-group ">

                      <label for="project-title-ar" class="control-label col-lg-2"><?php echo lang( 'Name' ); ?>  </label>

                      <div class="col-lg-6">

                        <?php if(!empty($name) && !empty($name) ) echo $name; ?>


                    </div>



                    <div class="col-lg-4"></div>

                </div>



                <div class="form-group ">

                  <label for="project-title-ar" class="control-label col-lg-2"><?php echo lang( 'Email' ); ?>  </label>

                  <div class="col-lg-6">

                    <span><?php if(!empty($email)) echo $email; ?></span>


                </div>



                <div class="col-lg-4"></div>

            </div>
            <div class="form-group ">

              <label for="project-title-ar" class="control-label col-lg-2"><?php echo lang( 'phone' ); ?>  </label>

              <div class="col-lg-6">

                <span><?php if(!empty($tel)) echo $tel; ?></span>


            </div>



            <div class="col-lg-4"></div>

        </div>

    </div>



    <hr/>

    <div class="form-group ">

      <label for="project-description-en" class="control-label col-lg-2"><?php echo lang( 'message' ); ?>  </label>

      <div class="col-lg-6">

       <?php if(!empty($message)) echo $message; ?>
   </div>



   <div class="col-lg-4"></div>

</div>




<div class="form-group">

    <label class="control-label col-lg-2" for="inputSuccess"><?php echo lang( 'date' ); ?> </label>

    <div class="col-lg-3">

      <?php if(!empty($Date)) echo $Date; ?>

  </div>

</div>







</div>



</form>

</div>
<?php }?>

</section>

</div>

</div>

<!-- page end-->

</section>

</section>