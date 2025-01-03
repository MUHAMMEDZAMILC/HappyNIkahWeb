<!DOCTYPE html>
<html lang="en">

<head>
	<title>Happy Nikah - Admin Login</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Happynikah.com is an emerging muslim matrimony site in Kerala that helps Muslim bachelors to find and matchmake with the perfect partner. Nikah matrimony in Kerala">
	<meta name="author" content="">
	<link rel="shortcut icon" href="favicon.ico">
	  <link rel="icon" type="image/png" sizes="64x64" href="<?php echo base_url(); ?>/assets/images/logohappy.png">

	<!-- FontAwesome JS-->
	<script defer src="<?php echo base_url() ?>assets/plugins/fontawesome/js/all.min.js"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="<?php echo base_url() ?>assets/css/portal.css">

	<style type="text/css">
		.errordiv
		{
			float: left;
			width: 100%;
			text-align: center;
			padding: 25px 4px;
			color: #e51010;
		}
	</style>
	
</head>

<body class="app app-login p-0">
	<div class="row g-0 app-auth-wrapper">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto">
					<div class="app-auth-branding mb-4"><a class="app-logo" href="#">
					    
					    <img class="logo-icon me-2" src="<?php echo base_url() ?>assets/images/logoring.png" style="width:100px !important;height:100px !important;" alt="HappNikah Logo">
					    </a></div>
					<h2 class="auth-heading text-center mb-5">Sign in</h2>
					<div class="auth-form-container text-start">
						<form class="auth-form login-form" action="<?php echo site_url('admin/logaction'); ?>" method="post">

							<div class="mb-3">
								<select class="form-control"  style="padding-bottom: 4px;" id="nikah_type" name="nikah_type" required>
									<option value="" selected disabled>--Please Select--</option>
									<option value="happynikah">Happy Nikah</option>
									<option value="happymangalyam">Happy Mangalyam</option>
									<option>Happy Thalikett</option>
									<option value="gotonikah">Goto Nikah</option>
								</select>

							</div>
						     <div class="mb-3">
								<?php 
								   $this->db->select('*');
                                   $this->db->from('tbl_usertype');
                                   $this->db->where('status',1);
                                   $user_type=$this->db->get()->result_array();
                                   ?>                                     
								 <select class="form-control" id="user_type" name="user_type" required 
								 style="padding-bottom: 4px;">
								  <option value="" selected disabled><label>--Please Select User--</label></option> 
									<?php foreach($user_type as $value){ ?>
									<option value="<?php echo $value['usertype_id']; ?>"><?php echo $value['user_type']; ?></option>
									  <?php } ?>
								</select>

							</div>

							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Username</label>
								<input id="signin-email" name="username" type="text" class="form-control signin-email" placeholder="Username" required="required">
							</div>
							<!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Password" required="required">
								<div class="extra mt-3 row justify-content-between">

									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
												Remember me
											</label>
										</div>
									</div>
									<!--//col-6-->
									<div class="col-6">
										<div class="forgot-password text-end">
											<!--<a href="reset-password.html">Forgot password?</a>-->
											<a href="<?php echo base_url();?>">Forgot password?</a>
										</div>
									</div>
									<!--//col-6-->
								</div>
								<!--//extra-->
							</div>
							<!--//form-group-->

							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
								<div class=".errordiv">
									<?php if (!empty($_GET['error']) && $_GET['error'] == 1) { ?> <p class="errordiv"> Username or Password Incorrect</p> <?php } ?>
								</div>
							</div>
						</form>

						<div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="<?php echo base_url();?>">here</a></div>
					</div>
					<!--//auth-form-container-->

				</div>
				<!--//auth-body-->

				<footer class="app-auth-footer">
					<div class="container text-center py-3">
						<!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
						<small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="https://sysol.org" target="_blank">Sysol System Solutions</a></small>

					</div>
				</footer>
				<!--//app-auth-footer-->
			</div>
			<!--//flex-column-->
		</div>
		<!--//auth-main-col-->
		<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
			<div class="auth-background-holder">
			</div>
			<div class="auth-background-mask"></div>
			<div class="auth-background-overlay p-3 p-lg-5">
				<div class="d-flex flex-column align-content-end h-100">
					<div class="h-100"></div>
					<div class="overlay-content p-3 p-lg-4 rounded">
						<h5 class="mb-3 overlay-title">The Future Starts Today..</h5>
						<div>This Portal is for Admins of <a style="text-decoration: none; color:#ff5b85;" href="https://happynikah.com">Happy Nikah Matrimony</a></div>
					</div>
				</div>
			</div>
			<!--//auth-background-overlay-->
		</div>
		<!--//auth-background-col-->

	</div>
	<!--//row-->


</body>

</html>