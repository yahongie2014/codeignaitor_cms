<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="<?php if(!empty($url)) echo $url; ?>js/gmaps.js"></script>
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

<?php if(!empty($post)) { ?>
<!-- Section Start - Blog Single Page -->
<section class=' padding-top-50 padding-bottom-100 '>
    <!-- Angled Section - Start -->
    <div class="angled_down_inside white">
        <div class="slope upleft"></div>
        <div class="slope upright"></div>
    </div>
    <!-- Angled Section - End -->

    <div class="container">

        <div class="row">
            <div class="blog blog-full">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 inviewport animated delay1" data-effect="fadeIn">
                    <?php $filename = "application/views/images/upload/events/".$post->image;
                    if ( $post->image != "" && file_exists( "$filename" ) ) {  ?>
                    <img class="img-responsive" src="<?php echo base_url().$filename; ?>" alt="<?php if(!empty($post->name)) echo $post->name; ?>" title="<?php if(!empty($post->name)) echo $post->name; ?>">
                    <?php  } //end if ?>

                    <div id="gmap" class="gmap2"> </div>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 info inviewport animated delay1" data-effect="fadeIn">
                    <h3 class="title"><a href="#"><?php if(!empty($post->title)) echo $post->title; ?></a></h3>
                    <div class="event-meta-data">
                        <p class="event-meta"><i class="fa fa-clock-o"></i> <?php if(!empty($post->addingDate)) echo $post->addingDate; ?></p>
                        <p class="event-meta"><i class="fa fa-map-marker"></i> <?php if(!empty($post->location)) echo $post->location; ?></p>
                    </div>
                    <p><?php if(!empty($post->content)) echo $post->content; ?></p>
                    <a class="btn btn-primary text-on-primary" data-toggle="modal" href="#viewForm" data-id="<?php if(!empty($post->id)) echo $post->id; ?>" ><?= lang('RSVB'); ?></a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <style>
        form input {
            background-color: transparent;
            color: #757575;
            border: 1px solid;
            height: 50px;
            padding: 10px;
            margin-bottom: 20px;
        }
        form .col-xs-12 {
            width: 90%;
        }
        form .btn-block {
            width: 90%;
        }
    </style>
                <div class="modal fade" id="viewForm" tabindex="-1" role="dialog" aria-labelledby="viewForm" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title custom_align" id="Heading">RSVB</h4>
                    </div>
                    <div class="modal-body" style="width: 100% !important;  padding-right: 0px !important;">

                        <div id="order-result"></div>

                        <!-- Form - Start -->
                        <form action='<?php echo base_url().'events/apply'; ?>' method='post' id="quoteForm">
                            <input type="hidden" name="eventId" id="eventId" value="">
                          <input type='text' placeholder='<?php echo lang('front_name'); ?>' class='col-xs-12 transition' id='name' name='name' value="<?php echo set_value('name'); ?>" >
                          <input type='text' placeholder='<?php echo lang('front_email'); ?>' class='col-xs-12 transition' id='email' name="email" value="<?php echo set_value('email'); ?>" >
                          <input type='text' placeholder='<?php echo lang('front_phone'); ?>' class='col-xs-12 transition' id='tel' name="tel" value="<?php echo set_value('phone'); ?>" >
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
</section>
<!-- Section End - Blog Single Page -->


<script>
$(document).ready(function($) {
    (function(){
        var map;
        var latlng = new google.maps.LatLng(<?php if(!empty($post) && !empty($post->latitude)) echo $post->latitude; ?>,<?php if(!empty($post) && !empty($post->lagitude)) echo $post->lagitude; ?>);
        map = new GMaps({
            el: '#gmap',
            center : latlng,
            scrollwheel:false,
            zoom: 14,
            zoomControl : true,
            panControl : false,
            streetViewControl : false,
            mapTypeControl: false,
            overviewMapControl: false,
            clickable: false
        });

        var image = '<?php if(!empty($url)) echo $url; ?>/img/new/map-marker.png';
        map.addMarker({
            position : latlng,
            icon: image,
            animation: google.maps.Animation.DROP,
            verticalAlign: 'bottom',
            horizontalAlign: 'center',
            backgroundColor: '#d3cfcf',
        });
    }());
});
</script>
<?php  } //post ?>

<script type="text/javascript" src="<?php if(!empty($url)) echo $url; ?>js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {

    $('#viewForm').on('show.bs.modal', function (event) {
        var eventId = $(event.relatedTarget).data('id');
        $('#eventId').val(eventId);
    });

    //callback handler for form submit
    $("#quoteForm").submit(function(e) {
        e.preventDefault(); //STOP default action
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        var form = $('#quoteForm');
        var eventId = $('#eventId').val();
        $.ajax({
            url : formURL +'/' +eventId,
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
});
</script>