var toastMixin = Swal.mixin({
	toast: true,
	icon: 'success',
	title: 'General Title',
	animation: false,
	position: 'top-right',
	showConfirmButton: false,
	timer: 3000,
	timerProgressBar: true,
	didOpen: (toast) => {
	  toast.addEventListener('mouseenter', Swal.stopTimer)
	  toast.addEventListener('mouseleave', Swal.resumeTimer)
   }
 });

 var fullHeight = function() {

	$('.js-fullheight').css('height', $(window).height() + 100);
	$(window).resize(function(){
		$('.js-fullheight').css('height', $(window).height()+100);
	});

};
fullHeight();

$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
	input.attr("type", "text");
  } else {
	input.attr("type", "password");
  }
});

var generatedCode;

function login()
{
	let email = $("#email-field");
	let password = $("#password-field");
	let lognow = true;
	// Regular expression for email validation
	var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

	// Check if the entered email matches the pattern
	if (emailRegex.test(email.val()) == false) {
		email.addClass("is-invalid");
		lognow = false;
	}

	if (password.val().length < 1)
	{
		password.addClass("is-invalid");
		lognow = false;
		$(".field-icon ").css("margin-top", "-12px");
	}

	if(lognow)
	{
		let postEmail = email.val();
		let postPassword = password.val();

		$.post("login-controller.php",
		{
			postEmail: postEmail,
			postPassword: postPassword,
		},
		function(data, status){
			
			if(data == 'Login success.')
			{
				window.location.href = '../admin.php';
			}
			else if(data == 'Invalid password.')
			{
				toastMixin.fire({
					animation: true,
					title: data,
					icon: 'error'
					});
			}
			else
			{
				toastMixin.fire({
					animation: true,
					title: data,
					icon: 'error'
					});
			}

		});
	
	}
	
}

// Function to generate a random alphanumeric code
function generateRandomCode(length) {
const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
let code = '';
for (let i = 0; i < length; i++) {
	const randomIndex = Math.floor(Math.random() * characters.length);
	code += characters.charAt(randomIndex);
}
return code;
}

function show_forgot_input() 
{
	$('#forgot_email-field').removeClass("d-none");
	$('#send_otp_email').removeClass("d-none");
	$('#reset_pass_title').removeClass("d-none");
	$('#show_forgot_input').addClass("d-none");
	$('#login_form').addClass("d-none");
}

function check_email_if_exist()
{
	let forgot_email_field = $('#forgot_email-field');
	generatedCode = generateRandomCode(6);
	let reset = true;

	// Regular expression for email validation
	var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	// Check if the entered email matches the pattern
	if (emailRegex.test(forgot_email_field.val()) == false) {
		forgot_email_field.addClass("is-invalid");
		reset = false;
	}

	if(reset)
	{
		$.post("login-controller.php",
		{
			check_email: forgot_email_field.val(),
		},
		function(data, status){
			if(data == "User found.")
			{
				send_reset_code(forgot_email_field.val(), generatedCode) 
			}
			else
			{
				toastMixin.fire({
					animation: true,
					title: data,
					icon: 'error'
					});
			}
		});
	}

}

function send_reset_code(admin_gmail, reset_code) 
{
	$('#send_otp_email_loading').removeClass("d-none");
	$('#send_otp_email').addClass("d-none");

	$.post("forgotPassword-controller.php",
	{
		forgot: true,
		admin_gmail: admin_gmail,
		reset_code: reset_code
	},
	function(data, status){
		console.log(data)
		if(data == "Message has been sent")
		{
			$('#send_otp_email_loading').addClass("d-none");
			$('#forgot_email-field').addClass("d-none");
			$('#reset_now').removeClass("d-none");
			$('#reset_pass_form').removeClass("d-none");
			//$('#show_forgot_input').removeClass("d-none");
		}
		else
		{
			toastMixin.fire({
			animation: true,
			title: data,
			icon: 'error'
			});
			$('#send_otp_email').removeClass("d-none");
		}
	});
}

function creat_new_password() 
{
	let forgot_email_field = $('#forgot_email-field').val();
	let code_input = $('#code_input');
	let new_password = $('#new-password');
	let repeat_password = $('#repeat-password');
	let reset_now = true;

	if(code_input.val().length < 1)
	{
		code_input.addClass("is-invalid");
		reset_now = false;
	}

	if(new_password.val().length < 1)
	{
		new_password.addClass("is-invalid");
		reset_now = false;
		$(".field-icon ").css("margin-top", "-12px");
	}

	if(repeat_password.val().length < 1)
	{
		repeat_password.addClass("is-invalid");
		$("#repeat_password_feedback").text("Invalid Repeat-password!");
		reset_now = false;
		$(".field-icon ").css("margin-top", "-12px");
	}

	if(new_password.val() != repeat_password.val())
	{
		repeat_password.addClass("is-invalid");
		reset_now = false;
		$(".field-icon ").css("margin-top", "-12px");
	}

	if(reset_now)
	{
		if(code_input.val() != generatedCode)
		{
			toastMixin.fire({
				animation: true,
				title: 'The reset code you entered is invalid.',
				icon: 'error'
			});
		}
		else
		{
			$.post("forgotPassword-controller.php",
			{
				reset_now: true,
				forgot_email_field: forgot_email_field,
				new_password: new_password.val(),
			},
			function(data, status) {
				if (data === 'Password reset successful.') {
					reset_now = false;
					toastMixin.fire({
						animation: true,
						title: data,
						icon: 'success'
					});
	
					setTimeout(function() {
						location.reload();
					}, 3000);
				} else {
					toastMixin.fire({
						animation: true,
						title: data,
						icon: 'error'
					});
				}
			})
			.fail(function(xhr, status, error) {
				// Handle errors here
				console.error("Error:", error);
				toastMixin.fire({
					animation: true,
					title: "An error occurred while processing the request.",
					icon: 'error'
				});
			});
		}

	}
}

$("#email-field").keypress(function(event) {
	if (event.which === 13) {
		login()
	}
});

$("#password-field").keypress(function(event) {
	if (event.which === 13) {
		login()
	}
});







