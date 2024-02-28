<?php session_start(); 

	// Check if the session is set, redirect to home page
	if (isset($_SESSION['user_email'])) {
		header("Location: ../admin.php");
		exit();
	}

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>AMHC || Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	<link rel="icon" type="image/png" sizes="192x192" href="../assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo.png">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">

	<section class="ftco-section ">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-2">
				<img src="../assets/images/logo.png" class="img-thumbnail border-0" alt="..." style="width:60px; height:60px;">
				</div>
			</div>
			<div class="row justify-content-center bac">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center"><a href="login.php" class="text-white">Admin Login</a></h3>
		      	<div class="signin-form" id="login_form">
					
				<div class="form-group">
					<input id="email-field" type="email" class="form-control" placeholder="Email" >
					<div class="invalid-feedback">
                      Invalid Email!
                    </div>
				</div>

	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Password" >
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password position-absolute "></span>
				  <div class="invalid-feedback">
                      Invalid Password!
                  </div>
	            </div>

	            <div class="form-group">
	            	<button  onclick="login()" class="form-control btn btn-primary px-3">Sign In</button>
	            </div>

			</div>
	          <p class="w-100 mt-5 text-center">&mdash; Advance Mental Health Care &mdash;</p>
			  <p class="w-100 mt-3 text-center d-none" id="reset_pass_title"> Reset Password </p>

			  <div class="form-group ">
					<input id="forgot_email-field" type="email" class="form-control d-none" placeholder="Email" >
					<div class="invalid-feedback">
                      Invalid Email!
                    </div>
			  </div>

			  <form  id="reset_pass_form" class="d-none">
			  <div class="form-group">
	              <input id="new-password" type="password" class="form-control " placeholder="New Password" >
	              <span toggle="#new-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
				  <div class="invalid-feedback">
                      Invalid Password!
                  </div>
	            </div>
					<div class="form-group">
					<input id="repeat-password" type="password" class="form-control" placeholder="Repeat Password" >
					<span toggle="#repeat-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					<div class="invalid-feedback" id = "repeat_password_feedback">
						Repeat-password and Password does not match!
					</div>
					</div>

					<div class="form-group ">
						<input id="code_input" type="text" class="form-control" placeholder="Reset Code" maxlength="6">
						<div class="invalid-feedback">
						Invalid Code!
					</div>
					</div>
				</form>
	          <div class="social d-flex text-center">
	          	<a href="../index.php" class="px-2 py-2 mr-2 rounded"><span class="mr-2"></span> Student View</a>
				<a type ="button" class="px-2 py-2 mr-1 rounded" onclick="show_forgot_input()" id ="show_forgot_input" ><span class="mr-2"></span> Forgot Password</a>
				<a type ="button" class="px-2 py-2 mr-1 rounded d-none" onclick="check_email_if_exist()" id ="send_otp_email" >Send Reset Code</a>
				<a type ="button" class="px-2 py-2 mr-1 rounded d-none" disabled id ="send_otp_email_loading" >
				<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Sending...
				</a>
				<a type ="button" class="px-2 py-2 mr-1 rounded d-none" onclick="creat_new_password()" id ="reset_now" > Reset Now</a>

	          </div>
		      </div>
			</div>
			</div>
		</div>
	</section>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="../vendor/jquery/jquery.min.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>

