<!-- REQUIRED JS SCRIPTS -->

<!-- Scripts --> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXFNXUXTucS-m45EVzs_QCnX1-HoNjuks"></script> 
<!-- jQuery 2.1.4 -->
<script src="{{ asset('la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('la-assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('socio-assets/js/jquery-2.1.3.min.js') }}"></script> 
<script src="{{ asset('socio-assets/js/bootstrap.js') }}"></script> 
<script src="{{ asset('socio-assets/js/plugins/superfish.min.js') }}"></script> 
<script src="{{ asset('socio-assets/js/jquery.ui.min.js') }}"></script> 
<script src="{{ asset('socio-assets/js/plugins/rangeslider.min.js') }}"></script> 
<script src="{{ asset('socio-assets/js/plugins/jquery.flexslider-min.js') }}"></script> 
<script src="{{ asset('socio-assets/js/uou-accordions.js') }}"></script> 
<script src="{{ asset('socio-assets/js/uou-tabs.js') }}"></script> 
<script src="{{ asset('socio-assets/js/plugins/select2.min.js') }}"></script> 
<script src="{{ asset('socio-assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('socio-assets/js/gmap3.min.js') }}"></script> 
<script src="{{ asset('socio-assets/js/scripts.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('la-assets/plugins/morris/morris.min.js') }}"></script>
<!-- jquery.validate + select2 -->
<script src="{{ asset('la-assets/plugins/jquery-validation/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('la-assets/plugins/select2/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('la-assets/plugins/bootstrap-datetimepicker/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('la-assets/plugins/bootstrap-datetimepicker/locale/es.js') }}" type="text/javascript"></script>
<script src="{{ asset('la-assets/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>




<script src="{{ asset('la-assets/plugins/stickytabs/jquery.stickytabs.js') }}" type="text/javascript"></script>
<script src="{{ asset('la-assets/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('la-assets/plugins/tinymce/js/tinymce/tinymce.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('la-assets/plugins/fullcalendar-3.8.2/fullcalendar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('la-assets/plugins/fullcalendar-3.8.2/locale/es.js') }}" type="text/javascript"></script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
 /* ================= bootstrap-datetimepicker ================= */
    $(".input-group.date").datetimepicker({
        format: 'DD/MM/YYYY',
         locale: moment.locale('es'),
    });

 
  
  
    $(".input-group.datetime").datetimepicker({
        format: 'DD/MM/YYYY LT',
        sideBySide: true,
         locale: moment.locale('es'),
    });


</script>
       

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" type="text/javascript" charset="utf-8"></script>



@stack('scripts')