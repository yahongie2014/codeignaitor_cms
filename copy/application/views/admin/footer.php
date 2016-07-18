
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

    <script src="<?php echo base_url(); ?>js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo base_url(); ?>js/owl.carousel.js" ></script>
    <script src="<?php echo base_url(); ?>js/jquery.customSelect.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/data-tables/DT_bootstrap.js"></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url(); ?>js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="<?php echo base_url(); ?>js/dynamic-table.js"></script>


<script src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js" > </script>

<script type="text/javascript">
        tinyMCE.init({
            mode : "textareas",
            plugins : "image,,insertdatetime,preview,visualchars,nonbreaking",
            plugin_insertdate_dateFormat : "%Y-%m-%d",
            plugin_insertdate_timeFormat : "%H:%M:%S",
            apply_source_formatting : true,
            spellchecker_languages : "+Arabic=ar",
            extended_valid_elements :"img[src|border=0|alt|title|width|height|align|name],a[href|target|name|title],p,",
            invalid_elements: "table,span,tr,td,tbody,font"
        });
</script>
  </body>
</html>
