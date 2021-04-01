    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>

<![endif]-->

<script src="{{ asset('public/admin_asset/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript">
</script>
<script
src="{{ asset('public/admin_asset/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"
type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"
type="text/javascript">
</script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"
type="text/javascript">
</script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('public/admin_asset/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript">
</script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}"
type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}"
type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}"
type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}"
type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}"
type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}"
type="text/javascript">
</script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="{{ asset('public/admin_asset/assets/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/morris/raphael-min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript">
</script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('public/admin_asset/assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/admin/layout4/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/admin/layout4/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/admin/pages/scripts/index3.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/admin/pages/scripts/tasks.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/admin/layout4/scripts/toastr.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('public/admin_asset/assets/admin/pages/scripts/profile.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js
" type="text/javascript" charset="utf-8" async defer></script>
<script src="{{ asset('public/admin_asset/assets/admin/pages/scripts/ui-extended-modals.js')}}"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/imageupload/js/jquery.filer.min.js')}}"></script>
<script src="{{ asset('public/admin_asset/assets/imageupload/js/jquery.filer.js')}}"></script>




<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        Demo.init(); // init demo features 
        Index.init(); // init index page
        Tasks.initDashboardWidget(); // init tash dashboard widget  
        Profile.init(); // init page demo
         UIExtendedModals.init();

    });


$(".js-example-placeholder-multiple").select2({
    placeholder: "Select a Catagory",
    
});
    
$(".js-example-placeholder-single").select2({
    placeholder: "Select Module ",
    allowClear: true
});
 $(".js-example-placeholder").select2({
    placeholder: "Select Parent Catagory ",
    allowClear: true
});  

     $('#checkAll').change(function() {
      // alert('dfsdf');
        $('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
    });
     
    $('.check').change(function() {
        // alert('dfsdf');
        if ($(this).prop('checked') == false) {
            $('#checkAll').prop('checked', false);
        }
        if ($('.check:checked').length == $('.check').length) {
            $('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
        }
    });             
    </script>
    <!-- END JAVASCRIPTS -->
   
    @yield('script')
    
    <script src="{{ asset('public/admin_asset/common.js') }}"></script>
    <script type="text/javascript">
       
       $(document).ready(function(){

           
       });
    </script>
