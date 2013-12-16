<!DOCTYPE html>
<html class="login">

<head>
	<link rel="stylesheet" type="text/css" href="awesome.css" />
	<script type="text/javascript" src="login.js"></script>
	<title>Welcome to Awesome 5x5 Tic Tac Toe</title>
</head>

<!-- Background Border -->
<div class="loginBackgroundBorder">

	<!-- Pivott Logo -->
	<img class="align-center medium" src="awesome_logo.png" alt="Awesome Logo" title="Awesome Logo">
	<p></p>
		<!-- JavaScript form to check valid login information -->
		<form name="loginForm" onSubmit="return validateLogin()" action="index.php" method="post">
			<!-- Username Input -->
			<div class="loginUserInput">
				<label for="username">Username:</label>
				<input type="text" class="loginInput" name="username" placeholder="Username" />
			</div>
			<div class="loginErrors">
				<label id="usernameErrors" class="errors"></label>
			</div>

			<!-- Password Input -->
			<div class="loginUserInput">
				<label for="password">Password:</label>
				<input type="password" class="loginInput" name="password" placeholder="Password" />
			</div>
			<div class="loginErrors">
				<label id="passwordErrors" class="errors"></label>
			</div>

			<!-- Submit Buttons -->
			<div class="loginSubmitInput">

				<input type="submit" value="Login" class="loginSubmitButton" />

				<a href="register.php">
				<input type="button" value="Register" class="loginSubmitButton" />
				</a>
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
if (isset($_POST["username"]) && isset($_POST["password"]))
{

    $username = mysql_real_escape_string(trim($_POST["username"]));
    $password = md5(mysql_real_escape_string(trim($_POST["password"])));
   if(strlen($username)>0 && strlen($password)>0)
   {
		$q = "SELECT username FROM `users` WHERE (username = '$username') and (password = '$password')";
		if(!($result_set = mysql_query($q))) die(mysql_error());
		$number = mysql_num_rows($result_set);
	 
		if (!$number) 
		{
			  echo '<script type="text/javascript">document.getElementById("passwordErrors").innerHTML = "Failed login, try again maybe?? Remember, your inputs are case sensitive."</script>'; 
		} 
		else 
		{
			$_SESSION["tictactoe-user"] = $username;
			$_SESSION["tictactoe-pass"] = $password;
			header('Location: main.php');
		}
   }
}
else
{
  if ($session == true)
    echo "You are already logged in.";
}


?>
