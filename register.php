
<!DOCTYPE html>
<html class="login">

<head>
	<link rel="stylesheet" type="text/css" href="awesome.css">
	<script type="text/javascript" src="register.js"></script>
	<title>Awesome Registration</title>
</head>

<!-- Background Border -->
<div class="loginBackgroundBorder">

	<!-- Pivott Logo -->
	<img class="align-center medium" src="awesome_logo.png" alt="Awesome Logo" title="Awesome Logo">

	<!-- JavaScript form to check valid registration information -->
	<form name="registerForm" onSubmit="return validateRegistration()" method="post" action="register.php" >
		<!-- Username Input -->
		<div class="registerUserInput">
			<label for="username">Username:</label>
			<input type="text" class="loginInput" name="username" placeholder="Username" />
		</div>
		<div class="loginErrors">
			<label id="usernameErrors" class="errors"></label>
		</div>

		<!-- Password Input -->
		<div class="registerUserInput">
			<label for="password">Password:</label>
			<input type="password" class="loginInput" name="password" placeholder="Password" />
		</div>
		<div class="loginErrors">
			<label id="passwordErrors" class="errors"></label>
		</div>

		<!-- Confirm Password -->
		<div class="registerUserInput">
			<label for="passwordConf">Confirm Password:</label>
			<input type="password" class="loginInput" name="passwordConf" placeholder="Password" />
		</div>
		<div class="loginErrors">
			<label id="passwordConfErrors" class="errors"></label>
		</div>

		<!-- Submit Buttons -->
		<div class="loginSubmitInput">
			<input type="submit" value="Register" class="loginSubmitButton" />
			<!--<input type="button" value="Register" class="loginSubmitButton" />-->
		</div>
	
	</form>

<!-- End of Login Border -->
</div>

</html>
<?php
 include("db.php");
 $link = mysql_connect($server, $user, $pass);
 if(!mysql_select_db($database)) die(mysql_error());
 session_start();
 include("session.php");
if (isset($_POST["username"]) && isset($_POST["password"])&& isset($_POST["passwordConf"]))
{

    $username = mysql_real_escape_string(trim($_POST["username"]));
    $password = md5(mysql_real_escape_string(trim($_POST["password"])));
	$passwordConf = mysql_real_escape_string(trim($_POST["passwordConf"]));
   
    $q = "SELECT username FROM `users` WHERE (username COLLATE latin1_swedish_ci = '$username')";
             if(!($result_set = mysql_query($q))) die(mysql_error());
             $number = mysql_num_rows($result_set);

             if ($number) {
				  echo '<script type="text/javascript">document.getElementById("usernameErrors").innerHTML = "An account with the specified username already exists."</script>';
             }
             else
			 {
								 
				 $ipaddress = $_SERVER['REMOTE_ADDR'];
                 $q = "INSERT INTO `users` (username, password, ip) VALUES ('$username', '$password', '$ipaddress')"; 
                 mysql_query($q);
				 
		header('Location: index.php');
    }
   
}
?>