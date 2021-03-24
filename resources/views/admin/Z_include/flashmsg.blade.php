{{--  <script src="{{ asset('admin_asset/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_asset/assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript">
    </script>
    IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip
    <script src="{{ asset('admin_asset/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript">
    </script>
<script src="{{ asset('admin_asset/assets/admin/layout4/scripts/toastr.min.js') }}" type="text/javascript"></script>
 <link href="{{ asset('admin_asset/assets/admin/layout4/css/toster.css') }}" rel="stylesheet" type="text/css" /> --}}

@if($message = Session::get('danger'))
<script type="text/javascript">
	toastr.error('<?php echo $message; ?>', { timeOut:5000})
</script>
<?php  Session::forget('danger'); ?>
@endif

@if($message = Session::get('success'))
<script type="text/javascript">
	toastr.success('<?php echo $message; ?>', { timeOut:5000})
</script>
<?php  Session::forget('success'); ?>
@endif
