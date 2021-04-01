
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
