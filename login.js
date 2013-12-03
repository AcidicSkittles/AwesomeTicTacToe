// Awesome 5x5 Tic Tac Toe Login Validation
// Javascript File
// Description: This file will validate that a valid
// username/email address was entered into the 
// corresponding text box. Also this file checks if
// a valid password was entered according to our
// database configuration

// This function checks for valid email & password
function validateLogin()
{
	// Store user entered email 
	var username = document.forms["loginForm"]["username"].value;

	// Usernames and passwords are limited to alphanumeric characters, underscores, pound signs, and periods
	var pattern = /^[A-Za-z0-9_#.]*$/;

	// Test for valid email
	try
	{	
		// If invalid email
		if(pattern.test(username) == false)
			throw "Invalid username entered\n";
		else
			throw ""; // Clear any previous error messages
	}

	// Catch errors (if any)
	// Display then in template underneath textboxes
	catch(err)
	{
		document.getElementById("emailErrors").innerHTML = err;
	}

	// Store user entered password	
	var password = document.forms["loginForm"]["password"].value;

	// Variable to hold length
	var length = password.length;

	// Test if valid password entered
	try
	{
		// Max Length is 20
		if(length >= 21)
			throw "Password must be less than 21 characters\n";
		// Cannot be blank
		else if(length <= 0)
			throw "Password cannot be left blank\n";
		// Min Length is 7
		else if(length < 7)
			throw "Password must be longer than 6 characters\n";
		// Else -> Allow data to be sent to server
		else
			throw ""; // To clear any possible error messages
	}

	// If errors -> Print them now
	catch(err)
	{
		document.getElementById("passwordErrors").innerHTML = err;
	}

	// Check if no errors occured 
	if(document.getElementById("emailErrors").innerHTML == "" && document.getElementById("passwordErrors").innerHTML == "")
		return true;
	else
		return false;
}
