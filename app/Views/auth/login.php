<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.ninjateam.org/html/zeiss/light/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jul 2022 16:17:09 GMT -->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>
	<link rel="stylesheet" href="assets/styles/style.min.css">
	<link rel="stylesheet" href="assets/styles/custom.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

	<div id="single-wrapper">
		<div class="col-3 mx-auto mt-5">
			<div class="text-center mt-3">
				<p class="">Log in to continue to Iren Collection.</p>
				<?= view('Myth\Auth\Views\_message_block') ?>
			</div>
			<div class="p-3 custom-form">
				<form action="<?= route_to('login') ?>" method="post">
					<?= csrf_field('') ?>
					<?php if ($config->validFields === ['email']) : ?>
						<div class="form-group">
							<label for="login"><?= lang('Auth.email') ?></label>
							<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
					<?php else : ?>
						<div class="form-group">
							<label for="login"><?= lang('Auth.emailOrUsername') ?></label>
							<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
					<?php endif; ?>
					<div class="form-group">
						<label for="password"><?= lang('Auth.password') ?></label>
						<input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
						<div class="invalid-feedback">
							<?= session('errors.password') ?>
						</div>
					</div>

					<?php if ($config->allowRemembering) : ?>
						<div class="form-group">
							<label class="form-group-label">
								<input type="checkbox" name="remember" class="form-group-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
								<?= lang('Auth.rememberMe') ?>
							</label>
						</div>
					<?php endif; ?>

					<button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
				</form>
			</div>
		</div>
		<!-- /.frm-single -->
	</div>
	<!--/#single-wrapper -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js" type="c7e85d576dd77fa1f4835327-text/javascript"></script>
	<script src="assets/scripts/modernizr.min.js" type="c7e85d576dd77fa1f4835327-text/javascript"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js" type="c7e85d576dd77fa1f4835327-text/javascript"></script>
	<script src="assets/plugin/nprogress/nprogress.js" type="c7e85d576dd77fa1f4835327-text/javascript"></script>
	<script src="assets/plugin/waves/waves.min.js" type="c7e85d576dd77fa1f4835327-text/javascript"></script>

	<script src="assets/scripts/main.min.js" type="c7e85d576dd77fa1f4835327-text/javascript"></script>
	<script src="assets/scripts/mycommon.js" type="c7e85d576dd77fa1f4835327-text/javascript"></script>
	<script src="../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="c7e85d576dd77fa1f4835327-|49" defer=""></script>
</body>

<!-- Mirrored from demo.ninjateam.org/html/zeiss/light/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jul 2022 16:17:09 GMT -->

</html>