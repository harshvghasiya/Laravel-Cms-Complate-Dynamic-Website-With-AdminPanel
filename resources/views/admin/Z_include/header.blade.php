@php 
$author_desc=\App\setting::find(1);
@endphp
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
    type="text/css" />
<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet"
    type="text/css" />
    {{--  <link href="{{ asset('public/admin_asset/tostr/toastr.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('public/admin_asset/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
    type="text/css" />
    <link href="{{ asset('public/admin_asset/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}"
    rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/admin_asset/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"
    type="text/css" />
    <link href="{{ asset('public/admin_asset/assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet"
    type="text/css" />
    <link href="{{ asset('public/admin_asset/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}"
    rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('public/admin_asset/assets/admin/pages/css/profile.css')}}" rel="stylesheet" type="text/css"/>
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="{{ asset('public/admin_asset/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}"
    rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/admin_asset/assets/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet"
    type="text/css" />
    <link href="{{ asset('public/admin_asset/assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet"
    type="text/css" />
    <link href="{{ asset('public/admin_asset/assets/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN PAGE STYLES -->
    <link href="{{ asset('public/admin_asset/assets/admin/pages/css/tasks.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
    <!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
    <link href="{{ asset('public/admin_asset/assets/global/css/components-rounded.css') }}" id="style_components"
    rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/admin_asset/assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/admin_asset/assets/admin/layout4/css/layout.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/admin_asset/assets/admin/layout4/css/dashboard.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/admin_asset/assets/admin/layout4/css/themes/light.css') }}" rel="stylesheet" type="text/css"
    id="style_color" />
    <link href="{{ asset('public/admin_asset/assets/admin/layout4/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/admin_asset/assets/admin/layout4/css/toster.css') }}" rel="stylesheet" type="text/css" />

    <script src='{{ asset("public/ckeditor/ckeditor.js")}}'></script>

    <link href="{{ asset('public/admin_asset/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/admin_asset/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link href="{{$author_desc->getFaviconImageUrl()}}" rel="icon">
    <script src="{{ asset('public/admin_asset/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/admin_asset/assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript">
    </script>

    <script src="{{ asset('public/admin_asset/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript">
    </script>
    <!-- jQuery -->
    <script src="{{ asset('public/admin_asset/assets/admin/layout4/scripts/jquery.bootstrap-growl.min.js') }}" type="text/javascript"></script> 
    <link href="{{ asset('public/admin_asset/assets/imageupload/css/themes/jquery.filer-dragdropbox-theme.css')}}" type="text/css" rel="stylesheet" />  
   <link href="{{ asset('public/admin_asset/assets/imageupload/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />

</head>