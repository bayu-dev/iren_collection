<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Log In - Iren Collection</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
	<meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
	<meta content="Themesdesign" name="author" />
	<!-- favicon -->
	<link href="<?= base_url('assets_login/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets_login/css/materialdesignicons.min.css') ?>" rel="stylesheet" type="text/css" />
	<!-- flexslider slider -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets_login/css/flexslider.css') ?>" />
	<!--Slider-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets_login/css/owl.carousel.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets_login/css/owl.theme.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets_login/css/owl.transitions.css') ?>" />
	<!-- magnific pop-up -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets_login/css/magnific-popup.css') ?>" />
	<link href="<?= base_url('assets_login/css/style.css') ?>" rel="stylesheet" type="text/css" />

	<link href="<?= base_url('assets_login/css/all.css') ?>" rel="stylesheet" type="text/css">

</head>

<body>

	<div class="account-home-btn d-none d-sm-block">
		<a href="<?= base_url() ?>" class="text-primary"><i class="fas fa-home fa-lg"></i></a>
	</div>

	<section class="bg-account-pages vh-100">
		<div class="display-table">
			<div class="display-table-cell">
				<div class="container">
					<div class="row no-gutters align-items-center">

						<div class="col-lg-12">
							<div class="login-box">
								<div class="row align-items-center no-gutters">
									<div class="col-lg-6">
										<div class="bg-light">

											<div class="row justify-content-center">
												<div class="col-lg-10">

													<div class="home-img login-img text-center d-none d-lg-inline-block">

														<div class="animation-2"></div>
														<div class="animation-3"></div>


														<img src="<?= base_url('assets_frontend/images/1.png') ?>" class="img-fluid" height="100" alt="">
													</div>

												</div>
											</div>
										</div>

									</div>


									<div class="col-lg-6">
										<div class="row justify-content-center">
											<div class="col-lg-11">
												<div class="p-4">
													<div class="text-center mt-3">
														<a href="<?= base_url() ?>"><img src="<?= base_url('assets_frontend/images/logo/logo-text.png') ?>" alt="" height="70"></a>
														<p class="text-muted mt-3">Log in to continue to Iren Collection.</p>
														<?= view('Myth\Auth\Views\_message_block') ?>
													</div>
													<div class="p-3 custom-form">
														<form action="<?= route_to('login') ?>" method="post">
															<?= csrf_field('') ?>
															<fieldset>
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
																<div class="row mt-3">
																	<div class="col-12 text-center">
																		<?php if ($config->allowRegistration) : ?>
																			<!-- <p class="text-muted">Don't have an account? <a href="<?= route_to('register') ?>"><b>Sign Up</b></a></p> -->
																			<p class="text-muted ">Don't have an account? <a class="text-success" href="<?= route_to('register') ?>"><b> Sign Up</b></a></p>
																			<p class="text-muted ">Back to home? <a class="text-success" href="<?= base_url() ?>"><b> Home</b></a></p>
																		<?php endif; ?>
																		<?php if ($config->activeResetter) : ?>
																			<div class="mt-4 pt-1 mb-0 text-center">
																				<p><a class="text-dark" href="<?= route_to('forgot') ?>"><i class="fas fa-lock text-success"></i> <?= lang('Auth.forgotYourPassword') ?></a></p>
																			</div>

																		<?php endif; ?>
																	</div> <!-- end col -->
																</div>

															</fieldset>
														</form>


													</div>
												</div>


											</div>

										</div>
									</div>
								</div>
							</div>
						</div>




					</div>



					<!-- end col -->
				</div>
				<!-- end row -->
			</div>
		</div>
	</section>
	<!-- end account-pages  -->
	<!-- javascript -->
	<script src="<?= base_url('assets_login/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets_login/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('assets_login/js/jquery.easing.min.js') ?>"></script>
	<script src="<?= base_url('assets_login/js/jquery.mb.YTPlayer.js') ?>"></script>
	<!--flex slider plugin-->
	<script src="<?= base_url('assets_login/js/jquery.flexslider-min.js') ?>"></script>
	<!-- Portfolio -->
	<script src="<?= base_url('assets_login/js/jquery.magnific-popup.min.js') ?>"></script>
	<!-- contact init -->
	<script src="<?= base_url('assets_login/js/contact.init.js') ?>"></script>
	<!-- counter init -->
	<script src="<?= base_url('assets_login/js/counter.init.js') ?>"></script>
	<!-- Owl Carousel -->
	<script src="<?= base_url('assets_login/js/owl.carousel.min.js') ?>"></script>
	<script src="<?= base_url('assets_login/js/app.js') ?>"></script>

	<script src="<?= base_url('assets_login/js/all.js') ?>"></script>

</body>

</html>