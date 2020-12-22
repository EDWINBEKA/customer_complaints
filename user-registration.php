  <?php
use Phppot\Member;
if (! empty($_POST["signup-btn"])) {
    require_once './Model/Member.php';
    $member = new Member();
    $registrationResponse = $member->registerMember();
}
?>
<HTML>
<HEAD>
<TITLE>User Registration</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</HEAD>
<BODY bgcolor="#240CF3">
	<div class="phppot-container">
		<div class="sign-up-container">
			<div class="login-signup">
				<a href="index.php">Login</a>
			</div>
			<div class="">
				<form name="sign-up" action="" method="post"
					onsubmit="return signupValidation()">
					<div class="signup-heading">Registration</div>
				<?php
    if (! empty($registrationResponse["status"])) {
        ?>
                    <?php
        if ($registrationResponse["status"] == "error") {
            ?>
				    <div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        } else if ($registrationResponse["status"] == "success") {
            ?>
                    <div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        }
        ?>
				<?php
    }
    ?>
				<div class="error-msg" id="error-msg"></div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label"> Username<span class="required error" id="username-info"></span>
							</div>
							<input class="input-box-330" type="text" name="username" id="username">
						</div>
					</div>
				<div class="row">
						<div class="inline-block">
							<div class="form-label">
								First Name<span class="required error" id="fname-info"></span>
							</div>
							<input class="input-box-330" type="text" name="fname" id="fname">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Last Name<span class="required error" id="Lname-info"></span>
							</div>
							<input class="input-box-330" type="text" name="Lname" id="Lname">
						</div>
					</div>

					<div class="row">Gender:
						<input type="radio" name="gender" 
							   <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female 
						<input type="radio" name="gender" 
							   <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
						<input type="radio" name="gender" 
							   <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other

					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Email<span class="required error" id="email-info"></span>
							</div>
							<input class="input-box-330" type="email" name="email" id="email">
						</div>
					</div>

					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								National Identity Number<span class="required error" id="NIN-info"></span>
							</div>
							<input class="input-box-330" type="text" name="NIN" id="NIN">
						</div>
					</div>

					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Address<span class="required error" id="address-info"></span>
							</div>
							<input class="input-box-330" type="text" name="address" id="address">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Bank Account Number<span class="required error" id="Bank-Account-Number-info"></span>
							</div>
							<input class="input-box-330" type="text" name="Bank_Account_Number" id="Bank_Account_Number">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Phone Number<span class="required error" id="Pnumber-info"></span>
							</div>
							<input class="input-box-330" type="text" name="Pnumber" id="Pnumber">
						</div>
					</div>

					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="signup-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="signup-password" id="signup-password">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Confirm Password<span class="required error"
									id="confirm-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="confirm-password" id="confirm-password">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="signup-btn"
							id="signup-btn" value="Sign up">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
function signupValidation() {
	var valid = true;

	$("#username").removeClass("error-field");
	$("#email").removeClass("error-field");
	$("#password").removeClass("error-field");
	$("#confirm-password").removeClass("error-field");
	$("#fname").removeClass("error-field");
	$("#Lname").removeClass("error-field");
	$("#Bank_Account_Number").removeClass("error-field");
	$("#NIN").removeClass("error-field");
	$("#address").removeClass("error-field");
	$("#Pnumber").removeClass("error-field");


	var fname = $("#fname").val();
	var Lname = $("#Lname").val();
	var UserName = $("#username").val();
	var NIN = $("#NIN").val();
	var Address = $("#address").val();
	var BankAccount = $("#Bank_Account_Number").val();
	var Pnumber = $("#Pnumber").val();
	var email = $("#email").val();
	var Password = $('#signup-password').val();
    var ConfirmPassword = $('#confirm-password').val();
	var PnumberRegex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-.]?([0-9]{4}$/;
	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

	$("#username-info").html("").hide();
	$("#fname-info").html("").hide();
	$("#Lname-info").html("").hide();
	$("#email-info").html("").hide();
	$("#NIN-info").html("").hide();
	$("#Bank-Account-info").html("").hide();
	$("#Pnumber-info").html("").hide();
	$("#address-info").html("").hide();

	if (fname.trim() == "") {
		$("#fname-info").html("required.").css("color", "#ee0000").show();
		$("#fname").addClass("error-field");
		valid = false;
	}
	if (Lname.trim() == "") {
		$("#Lname-info").html("required.").css("color", "#ee0000").show();
		$("#Lname").addClass("error-field");
		valid = false;
	}
	if (UserName.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (email == "") {
		$("#email-info").html("required").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (email.trim() == "") {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (!emailRegex.test(email)) {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000")
				.show();
		$("#email").addClass("error-field");
		valid = false;
	}
		if (Pnumber == "") {
		$("#Pnumber-info").html("required").css("color", "#ee0000").show();
		$("#Pnumber").addClass("error-field");
		valid = false;
	} else if (Pnumber.trim() == "") {
		$("#Pnumber-info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#Pnumber").addClass("error-field");
		valid = false;
	} else if (!PnumberRegex.test(email)) {
		$("#Pnumber-info").html("Invalid Phone number address.").css("color", "#ee0000")
				.show();
		$("#Pnumber").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#signup-password-info").html("required.").css("color", "#ee0000").show();
		$("#signup-password").addClass("error-field");
		valid = false;
	}
	if (ConfirmPassword.trim() == "") {
		$("#confirm-password-info").html("required.").css("color", "#ee0000").show();
		$("#confirm-password").addClass("error-field");
		valid = false;
	}
	if(Password != ConfirmPassword){
        $("#error-msg").html("Both passwords must be same.").show();
        valid=false;
    }
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</BODY>
</HTML>
