<script src="<?= _WEB_ROOT ?>../resources/assets/admin/js/core/popper.min.js"></script>
<script src="<?= _WEB_ROOT ?>../resources/assets/admin/js/core/bootstrap.min.js"></script>
<script src="<?= _WEB_ROOT ?>../resources/assets/admin/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?= _WEB_ROOT ?>../resources/assets/admin/js/plugins/smooth-scrollbar.min.js"></script>

<script src="<?= _WEB_ROOT ?>../resources/assets/admin/js/plugins/dragula/dragula.min.js"></script>
<script src="<?= _WEB_ROOT ?>../resources/assets/admin/js/plugins/jkanban/jkanban.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
<?php
use Illuminate\framework\Session;

$msg_success = Session::flash('msg-success') ?? '';
if (!empty($msg_success)) {
	?>
	<script>
		Swal.fire({
			icon: 'success',
			title: '<?php echo $msg_success; ?>',
			toast: true,
			position: 'top-right',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			customClass: "m-3"
		});
	</script>
	<?php
}

$msg_fail = Session::flash('msg-fail') ?? '';
if (!empty($msg_fail)) {
	?>
	<script>
		Swal.fire({
			icon: 'error',
			title: '<?php echo $msg_fail; ?>',
			toast: true,
			position: 'top-right',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			customClass: "m-3"
		});
	</script>
	<?php
}
?>
<script>
	var win = navigator.platform.indexOf('Win') > -1;
	if (win && document.querySelector('#sidenav-scrollbar')) {
		var options = {
			damping: '0.5'
		}
		Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
	}
</script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="<?= _WEB_ROOT ?>../resources/assets/admin/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
	integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
	data-cf-beacon='{"rayId":"823d497a5d8510a8","version":"2023.10.0","token":"1b7cbb72744b40c580f8633c6b62637e"}'
	crossorigin="anonymous"></script>