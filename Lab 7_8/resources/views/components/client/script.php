<script src="../resources/assets/client/js/jquery-3.2.1.min.js"></script>
<script src="../resources/assets/client/styles/bootstrap4/popper.js"></script>
<script src="../resources/assets/client/styles/bootstrap4/bootstrap.min.js"></script>
<script src="../resources/assets/client/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../resources/assets/client/plugins/easing/easing.js"></script>
<script src="../resources/assets/client/js/custom.js"></script>
<script src="../resources/assets/client/js/contact.js"></script>
<script src="../resources/assets/client/js/course.js"></script>
<script src="../resources/assets/client/js/courses.js"></script>
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
	const logoutLink = document.getElementById('logoutLink');
	logoutLink.addEventListener('click', function () {
		Swal.fire({
			title: 'Bạn có chắc chắn muốn đăng xuất?',
			text: "Bạn sẽ bị đăng xuất khỏi tài khoản hiện tại.",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Đăng xuất',
			cancelButtonText: 'Hủy bỏ'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = '/dang-xuat';
			}
		});
	});
</script>