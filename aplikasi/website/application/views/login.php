<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LabID Administrator</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>data/assets-limitless/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>data/assets-limitless/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>data/assets-limitless/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>data/assets-limitless/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>data/assets-limitless/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->



	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->


	<script type="text/javascript" src="<?php echo base_url();?>data/assets-limitless/js/core/app.js"></script>

</head>

<style type="text/css">
	body, html {
    	height: 100%;
	}

	.bg { 
    	/* The image used */
    	background-image: url("data/assets-limitless/images/Backround.jpg");

    	/* Full height */
    	height: 100%; 

    	/* Center and scale the image nicely */
    	background-position: center;
    	background-repeat: no-repeat;
    	background-size: cover;
	}
</style>

<body class="login-container bg" >

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->					
					<form action="<?php echo base_url('login/check_login')?>" method="post">						
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
							</div>
							<?php if($this->session->flashdata('false')) { ?>
							<div class="alert alert-danger no-border">
								<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
								<span class="text-semibold">Warning! </span> 
								<?php echo $this->session->flashdata('false');?>
						    </div> 
							<?php } ?>
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" name="username" placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-primary btn-block" value='Sign in'>
							</div>

							<!-- <div class="text-center">
								<a href="login_password_recover.html">Forgot password?</a>
							</div> -->
						</div>
					</form>
					<!-- /simple login form -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; 2017. <a href="#">Eloktronik Health Record</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Ilmu Komputer AJ11</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
