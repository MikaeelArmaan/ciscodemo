<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
</div>
</div>

<!-- /.content-wrapper -->
<footer class="main-footer">
	<strong>Copyright &copy; 2014-2019
		<a href="http://adminlte.io">AdminLTE.io</a>.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> 3.0.3
	</div>
</footer>



<!-- AdminLTE App -->
<script src="<?php echo plugin_url("jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo plugin_url("bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?php echo plugin_url("overlayScrollbars/js/jquery.overlayScrollbars.min.js"); ?>"></script>


<?php
if (isset($js_files) && is_array($js_files)) {
	foreach ($js_files as $file) {
		echo '<script src="' . plugin_url($file) . '"></script>';
	}
}
?>

<script src="<?php echo plugin_url("js/adminlte.min.js"); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script>
	function chkAllByName(chkboxname) {
		var ch = $('input[name="' + chkboxname + '"]');
		if ($("#chkAll").is(':checked')) {
			//check all rows in table
			ch.each(function() {
				$(this).prop('checked', true);
			});


		} else {
			//uncheck all rows in table
			ch.each(function() {
				$(this).prop('checked', false);
			});

		}

	}
</script>

</body>

</html>