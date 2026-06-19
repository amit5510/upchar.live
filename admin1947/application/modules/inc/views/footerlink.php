<!-- jQuery 3 --><script src="<?=base_url();?>public/assets/newpanel/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>public/assets/dist/js/zebra_datepicker.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>public/assets/dist/js/examples.js"></script>

<script src="<?=base_url();?>public/assets/newpanel/bower_components/datatables.net/js/jquery.dataTables.min.js"></script><script src="<?=base_url();?>public/assets/newpanel/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="<?=base_url();?>public/assets/dist/js/getdistrict.js"></script>
<!-- jQuery UI 1.11.4 --><script src="<?=base_url();?>public/assets/newpanel/bower_components/jquery-ui/jquery-ui.min.js"></script><!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --><script>  $.widget.bridge('uibutton', $.ui.button);</script><!-- Bootstrap 3.3.7 --><script src="<?=base_url();?>public/assets/newpanel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script><!-- Morris.js charts --><script src="<?=base_url();?>public/assets/newpanel/bower_components/raphael/raphael.min.js"></script><script src="<?=base_url();?>public/assets/newpanel/bower_components/morris.js/morris.min.js"></script><!-- Sparkline --><script src="<?=base_url();?>public/assets/newpanel/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script><!-- jvectormap --><script src="<?=base_url();?>public/assets/newpanel/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script><script src="<?=base_url();?>public/assets/newpanel/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script><!-- jQuery Knob Chart --><script src="<?=base_url();?>public/assets/newpanel/bower_components/jquery-knob/dist/jquery.knob.min.js"></script><!-- daterangepicker --><script src="<?=base_url();?>public/assets/newpanel/bower_components/moment/min/moment.min.js"></script><script src="<?=base_url();?>public/assets/newpanel/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script><!-- datepicker --><script src="<?=base_url();?>public/assets/newpanel/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script><!-- Bootstrap WYSIHTML5 --><script src="<?=base_url();?>public/assets/newpanel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script><!-- Slimscroll --><script src="<?=base_url();?>public/assets/newpanel/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script><!-- FastClick --><script src="<?=base_url();?>public/assets/newpanel/bower_components/fastclick/lib/fastclick.js"></script><!-- AdminLTE App --><script src="<?=base_url();?>public/assets/newpanel/dist/js/adminlte.min.js"></script><!-- AdminLTE dashboard demo (This is only for demo purposes) --><script src="<?=base_url();?>public/assets/newpanel/dist/js/pages/dashboard.js"></script><!-- AdminLTE for demo purposes --><script src="<?=base_url();?>public/assets/newpanel/dist/js/demo.js"></script>


<!-- Multi select box-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>public/assets/multiselect/dist/js/bootstrap-select.js"></script>

  <script>
$('.traineedob').Zebra_DatePicker({
    direction: ['1975-01-01', '2001-12-31']
});
$('.facultydob').Zebra_DatePicker({
    direction: ['1945-01-01', '2001-12-31']
});

$('.sdatepicker').Zebra_DatePicker({
    //direction: true,
    pair: $('.edatepicker')
});
 
$('.edatepicker').Zebra_DatePicker({
 //   direction: 1
});

  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script><script>function myalert(content='',title='Alert!'){	$.alert({    title: title,    content: content,});}</script>