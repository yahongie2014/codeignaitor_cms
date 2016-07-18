<script type="text/javascript" src="<?php if(!empty($url)) echo $url; ?>js/bootstrap.min.js"></script>

<!-- Header Slide - Start -->
<div class="header-slide" style="position:relative;">
    <?php  if(!empty($bannerData)) { ?>
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
<?php if(!empty($course)) { ?>
<section class='padding-bottom-25 padding-top-25'>
    <!-- Angled Section - Start -->
    <div class="angled_down_inside white">
        <div class="slope upleft"></div>
        <div class="slope upright"></div>
    </div>
    <!-- Angled Section - End -->

    <div class="container">
        <div class="row">
            <h1 class="heading"><?php if(!empty($course->title)) echo $course->title; ?></h1>
            <div class="headul"></div>

            <div class="col-lg-8 col-lg-offset-0  col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-10 col-xs-offset-1 inviewport animated delay3" data-effect="fadeInUp">
                <?php  if(!empty($course->content)) { ?>
                <div class="box_style_1">
                    <h2><?php echo lang('front_course_content'); ?></h2>
                    <p>
                        <?php echo $course->content; ?>
                    </p>
                </div>
                <?php } ?>

                <div class="box_style_1">
                    <ul class="course-data">
                        <?php  if(!empty($course->duration)) { ?>
                        <li>
                            <i class="fa fa-clock-o"></i><?php echo $course->duration; ?><?php  if($course->duration == 2){echo lang('clock');}elseif($course->duration == 1){echo lang('clock');}elseif($course->duration >= 11){echo lang('clock');}else{echo lang('clocks');} ?>
                        </li>
                        <?php } ?>
                        <?php  if(!empty($course->weeksNum)) { ?>
                        <li>
                            <i class="fa fa-calendar"></i> <?php echo $course->weeksNum; ?>
                        </li>
                        <?php } ?>
                        <?php if(!empty($course->lecturesNum)) { ?>
                        <li>
                            <i class="fa fa-pencil"></i> <?php echo $course->lecturesNum; ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
			<?php  if(!empty($branches)) { ?>

				
				<h4> <?=lang('avilablecourse');?> </h4>
                                <div class="row">
					
					<!--Loop Should Start Here -->
                                        <?php $i =0;foreach ($branches as $item) { $i++; ?>

					<div class="col-sm-6">
						<table class="table table-striped table-bordered">
		                    	<tr>
		                    		 <th class="text-center pr10"><?=lang('bransh');?></th>
		                    		 <td class="text-center pr10"><?php if(!empty($item->name)) echo $item->name; ?></td>
		                    	</tr>
		                    	<tr>
		                    		 <th class="text-center pr10"><?=lang('fees');?></th>
		                    		 <td class="text-center pr10"><?php if(!empty($item->price)) echo $item->price; ?></td>
		                    	</tr>
		                    	<tr>
		                    		 <th class="text-center pr10"><?=lang('period');?></th>
		                    		 <td class="text-center pr10"><?php if(!empty($item->duration)) echo $item->duration; ?></td>
		                    	</tr>
		                    	<tr>
		                    		 <th class="text-center pr10"><?=lang('weeks');?></th>
		                    		 <td class="text-center pr10"><?php if(!empty($item->weeksNum)) echo $item->weeksNum; ?></td>
		                    	</tr>
		                    	<tr>
		                    		 <th class="text-center pr10"><?=lang('Lec/Week');?></th>
		                    		 <td class="text-center pr10"><?php if(!empty($item->lecturesNum)) echo $item->lecturesNum; ?></td>
		                    	</tr>
                                        <tr>
		                    		 <th class="text-center pr10"><?=lang('AvailableSeats');?></th>
		                    		 <td class="text-center pr10"><?php if(!empty($item->AvailableSeats)) echo $item->AvailableSeats; ?></td>
		                    	</tr>
		                    	<tr>
                                            <th class="text-center pr10"><?=lang('date');?></th>
		                    		 <td class="text-center pr10"><?php if(!empty($item->start)) echo $item->start; ?></td>
		                    	</tr>
		                    	<tr>
		                    		<td colspan="2" class="text-center">
		                    		<h5 style="margin:0;"><?=lang('paymentoption');?></h5>
		                    		</td>
		                    	</tr>
			                    <tr>
			                    	<td colspan="2">
			                    		
                                                    <a class="btn btn-primary modalLink1" data-toggle="modal" data-id='<?php echo $i;?>' href="#paypalModal<?php echo $i;?>" data-id="<?php if(!empty($course->id)) echo $course->id; ?>" ><i class="fa fa-paypal payments"></i><?=lang('paypal');?></a>
			                    	    <a class="btn btn-primary modalLink" data-toggle="modal" data-id='<?php echo $i;?>' href="#viewForm<?php echo $i;?>" data-id="<?php if(!empty($course->id)) echo $course->id; ?>" ><?php echo lang('book_pay_later'); ?></a>
                                                </td>
			                    </tr>
		                </table>
					</div>
					
					<!-- Loop Should End Here -->
                                        <?php } ?>
				</div>
			      
                                <?php   }  ?>

            </div>

            <div class="col-lg-4 col-lg-offset-0 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1 inviewport animated delay3" data-effect="fadeInUp">

                <div class="box_style_1">
                    <?php if(!empty($course->instructors)) { ?>
                    <h4><?php echo lang('front_instructors'); ?></h4>
                    <?php foreach ($course->instructors as $item) { ?>
                    <div class="media">
                        <div class="pull-right">
                            <?php $filename = "application/views/images/upload/instructors/".$item->image;
                            if ( $item->image != "" && file_exists( "$filename" ) ) {  ?>
                                <img class="course-profile" src="<?php echo base_url().$filename; ?>" alt="<?php if(!empty($item->name)) echo $item->name; ?>" title="<?php if(!empty($item->name)) echo $item->name; ?>">
                            <?php  } //end if
                            elseif (!empty($item->gender)) { //female ?>
                                <img class="course-profile" src="<?php if(!empty($url)) echo $url; ?>img/female.png" alt="<?php if(!empty($item->name)) echo $item->name; ?>" title="<?php if(!empty($item->name)) echo $item->name; ?>" width="120px" height="118px">
                            <?php } else { //male ?>
                                <img class="course-profile" src="<?php if(!empty($url)) echo $url; ?>img/male.png" alt="<?php if(!empty($item->name)) echo $item->name; ?>" title="<?php if(!empty($item->name)) echo $item->name; ?>" width="120px" height="118px">
                            <?php } ?>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading"><a href=""><?php if(!empty($item->name)) echo $item->name; ?></a></h5>
                            <p>
                                <?php if(!empty($item->description)) echo $item->description; ?>
                            </p>
                        </div>
                    </div>
                    <?php } //foreach instructors
                    } //if instructors ?>

                    <?php if (!empty($relatedCourses)) { ?>
                    <h4><?php echo lang('related_courses'); ?></h4>
                    <ul class="list_1">
                        <?php $i = 0; foreach ($relatedCourses as $item) {  $i++;
                            if (!empty($i) && $i <= 4) {  ?>
                          <li><a href="<?php echo base_url().'courses/'.$item->id ?>"><?php if(!empty($item->title)) echo $item->title; ?></a></li>
                        <?php } //end if i ?>
                        <?php } //end foreach relatedCourses ?>
                    </ul>
                    <?php } //end if relatedCourses ?>

              </div>
          </div>

      </div>
  </div>
  <!-- Angled Section - Start -->
  <div class="angled_up_inside white">
  </div>
  <?php  if(!empty($branches)) { ?>
 <?php $i=0; foreach ($branches as $item) { ?>
  <div class="modal fade" id="paypalModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="paypalModal<?php echo $i;?>" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
          <h4 class="modal-title custom_align" id="Heading">Paypal</h4>
        </div>
        <div class="modal-body" style="width: 100% !important;  padding-right: 0px !important;">

              <div id="order-result<?php echo $i;?>"></div>
                <form action="<?php echo base_url().'courses/apply/'.$course->id.'/paypal'; ?>" method="post" target="_top" id="paypalForm">

                    <!-- <input type="hidden" name="on0" value="name"> -->
                    <input type='text' placeholder='<?php echo lang('front_name'); ?>' class='col-xs-12 transition' id='name' name='name' value="<?php echo set_value('name'); ?>" required>

                    <!-- <input type="hidden" name="on1" value="email"> -->
                    <input type='text' placeholder='<?php echo lang('front_email'); ?>' class='col-xs-12 transition' id='email' name="email" value="<?php echo set_value('email'); ?>" required>

                    <!-- <input type="hidden" name="on2" value="phone"> -->
                    <input type='text' placeholder='<?php echo lang('front_phone'); ?>' class='col-xs-12 transition' id='phone' name="phone" value="<?php echo set_value('phone'); ?>" required>
                    <input type='hidden'  id='branchesId' name="branchesId" value="<?php echo $item->id; ?>" required>

                    <!-- <input type="hidden" name="on3" value="college_work"> -->
                    <input type='text' placeholder='College/Work' class='col-xs-12 transition' name="college_work" id="college_work" value="<?php echo set_value('college_work'); ?>" required>

                   <!-- Display the payment button. -->
                   <input type="image" name="submit" id="paypalBtn" border="0"
                   src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                   alt="PayPal - The safer, easier way to pay online">
                   <img alt="" border="0" width="1" height="1"
                   src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                </form>

                <form action="<?php if(!empty($paypalUrl)) echo $paypalUrl; ?>" method="post" target="_top" id="paypalForm<?php echo $i;?>">

                    <input type="hidden" name="business" value="<?php if(!empty($paypalEmail)) echo $paypalEmail; ?>">

                   <!-- Specify a Buy Now button. -->
                   <input type="hidden" name="cmd" value="_xclick">

                   <!-- Specify details about the item that buyers will purchase. -->
                   <input type="hidden" name="item_name" value="<?php if(!empty($course->title)) echo $course->title; ?>">
                   <input type="hidden" name="amount" value="<?php if(!empty($item->price)) echo $item->price; ?>">
                   <input type="hidden" name="currency_code" value="GBP">

                  <input type="hidden" name="return" value="<?php echo base_url().'courses/'.$course->id; ?>">
                  <input type="hidden" name="cancel_return" value="<?php echo base_url().'courses/'.$course->id; ?>">
                  <input type="hidden" name="notify_url" value="<?php echo base_url().'courses/ipn'; ?>">


                </form>

        </div>
        <div class="modal-footer ">
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="viewForm<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="viewForm<?php echo $i;?>" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
          <h4 class="modal-title custom_align" id="Heading"><?php echo lang('book_pay_later'); ?></h4>
        </div>
        <div class="modal-body" style="width: 100% !important;  padding-right: 0px !important;">

              <div id="order-result"></div>
              <!-- Form - Start -->
              <form action='<?php echo base_url().'courses/apply/'.$course->id; ?>' method='post' id="quoteForm">
                <input type='text' placeholder='<?php echo lang('front_name'); ?>' class='col-xs-12 transition' id='name' name='name' value="<?php echo set_value('name'); ?>" >
                <input type='text' placeholder='<?php echo lang('front_email'); ?>' class='col-xs-12 transition' id='email' name="email" value="<?php echo set_value('email'); ?>" >
                <input type='text' placeholder='<?php echo lang('front_phone'); ?>' class='col-xs-12 transition' id='phone' name="phone" value="<?php echo set_value('phone'); ?>" >
                <input type='text' placeholder='College/Work' class='col-xs-12 transition' name="college_work" id="college_work" value="<?php echo set_value('college_work'); ?>">
                <input type='hidden'  id='branchesId' name="branchesId" value="<?php echo $item->id; ?>" required>
                <div id='response_email'></div>
                <button type='submit' class='btn btn-block btn-primary transition' id='sendBtn'><?php echo lang('front_send_message'); ?></button>
              </form>
              <!-- Form - End -->

        </div>
        <div class="modal-footer ">
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  
<!-- Section End - Meet Our Team -->
<script type="text/javascript">
$(document).ready(function () {
  $('.modalLink1').click(function(){
    var link =($(this).attr('href'));
    // or alert($(this).hash();
  });

    //callback handler for form submit
    $("#quoteForm").submit(function(e) {
        e.preventDefault(); //STOP default action
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        var form = $('#quoteForm');
        $.ajax({
            url : formURL,
            type: "POST",
            data : postData,
            success:function(response, textStatus, jqXHR) {
                //remove all errors
                $( ".alert-danger" ).remove();
                if (response.status == true) {
                    //show success message
                    $('#order-result').html(response.message);
                    $("#quoteForm").slideUp(); //hide form after success
                } else {
                    $.each(response.errors, function(key, val) {
                        $('#order-result').append(val);
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('error');
            }
        });
    });

    //callback handler for form submit
    $("#paypalBtn").click(function(e) {
        e.preventDefault(); //STOP default action
        var form = $('#paypalForm');
        var formURL = form.attr("action");
        var postData = form.serializeArray();
        $.ajax({
            url : formURL,
            type: "POST",
            data : postData,
            success:function(response, textStatus, jqXHR) {
                //remove all errors
                $( ".alert-danger" ).remove();
                if (response.status == true) {
                    if(link=='#paypalModal1'){
                           //show success message
                     $('#order-result1').html(response.message);
                     //form.attr('action', '<?php if(!empty($paypalUrl)) echo $paypalUrl; ?>');
                    $('#paypalForm1').submit();
                    }else if(link=='#paypalModal2'){
                           //show success message
                     $('#order-result2').html(response.message);
                     //form.attr('action', '<?php if(!empty($paypalUrl)) echo $paypalUrl; ?>');
                    $('#paypalForm2').submit();
                    }
                      
                    } else {
                    $.each(response.errors, function(key, val) {
                        $('#order-result1').append(val);
                        alert('no action')
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('error');
            }
        });
    });
});
</script>
 <?php $i++;  } ?>
<?php } ?>
</section>
  <?php } ?>
