// Pivott Registration Validation
// Javascript File
// Description: This file will validate that the following
// user input textboxes for: Username/email, password,
// and first and last names. If there are any checks that 
// fail, an error will be displayed

// Validates user registration data entered
function validateRegistration ()
{
	// Store Username/Password
	var username = document.forms["registerForm"]["username"].value;

	// Email pattern using regular expressions
	var pattern = /^[A-Za-z0-9_#.]*$/;

	// Test for valid email
	try
	{
		// If invalid email
		if(pattern.test(username) == false)
			throw "Invalid username entered. Usernames can only be alphanumeric containing the # . or _ chars\n";
		else if(username.length <3)
			throw "Username needs to be at least 3 chars long.";
		else if(username.length > 24)
			throw "Username needs to be limited to 24 chars long.";
		else
			throw ""; // Clear any previous error messages
	}

	// If errors -> display underneath textbox as error
	catch(err)
	{
		document.getElementById("usernameErrors").innerHTML = err;
	}
	
	// Store user entered password
	var password = document.forms["registerForm"]["password"].value;

	// Variable to hold length
	var length = password.length;

	// Test for valid password
	try
	{
		// Max length is 20
		if(length >= 21)
			throw "Password must be less than 21 characters\n";
		// Cannot be blank
		else if(length <= 0)
			throw "Password cannot be left blank\n";
		// Must be greater than 6 characters
		else if(length < 7)
			throw "Password must be greater than 6 characters\n";
		// Else -> Pass along to server for validation
		else
			throw ""; // To clear any possible error messages
	}

	// Display errors
	catch(err)
	{
		document.getElementById("passwordErrors").innerHTML = err;
	}

	// Check if confirm password text entry is the same as the first password entered
	
	// Store user entered confirm password
	var secondPassword = document.forms["registerForm"]["passwordConf"].value;

	// Check password
	try
	{
		// Compare password and secondPassword to see if equal
		if(password != secondPassword)
			throw "Confirm Password entry must match Password entry\n";
		// Cannot be blank either
		else if(secondPassword == "")
			throw "Confirm Password cannot be blank\n";
		else
			throw ""; // Clears any prior error messages
	}

	// Display errors
	catch(err)
	{
		document.getElementById("passwordConfErrors").innerHTML = err;
	}

	// Check if no errors occured
	if(document.getElementById("usernameErrors").innerHTML == "" &&
		document.getElementById("passwordErrors").innerHTML == "" &&
		document.getElementById("passwordConfErrors").innerHTML == "")
		{
			return true;
		}
	else
	{
		return false;
	}
}
