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
	var email = document.forms["registerForm"]["email"].value;

	// Email pattern using regular expressions
	var emailPattern = /^([\w!.%+\-])+@([\w\-])+(?:\.[\w\-]+)+$/;

	// Test for valid email
	try
	{
		// If invalid email
		if(emailPattern.test(email) == false)
			throw "Invalid email address entered\n";
		else
			throw ""; // Clear any previous error messages
	}

	// If errors -> display underneath textbox as error
	catch(err)
	{
		document.getElementById("emailErrors").innerHTML = err;
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

	// Check First/Last name inputs

	// Store user entered first name
	var firstName = document.forms["registerForm"]["firstName"].value;

	// Store length of first name entry
	var firstNameLength = firstName.length;

	// Pattern for First name
        var firstNamePattern = /^[a-zA-Z'-.]+$/;

	// Check if valid length for new database entry
	try
	{
		// Cannot be more than 15 characters
		if(firstNameLength > 15)
			throw "First name must be less than 16 characters\n";
		// Cannot be left blank
		else if(firstNameLength <= 0)
			throw "First name must not be blank\n";	
		// Check only alphabet characters
		if(firstNamePattern.test(firstName) == false)
			throw "First name must be only alphabets or - or ' characters only\n";
		else
			throw ""; // Clears any prior error messages
	}
	
	// Display errors
	catch(err)
	{
		document.getElementById("firstNameErrors").innerHTML = err;
	}
	
	// Store user entered last name
	var lastName = document.forms["registerForm"]["lastName"].value;

	// Store length of last name entry
	var lastNameLength = lastName.length;

	// Pattern for Last name
        var lastNamePattern = /^[a-zA-Z'-.]+$/;

	// Check if valid length for new database entry
	try
	{
		// Cannot be more than 20 characters
		if(lastNameLength > 20)
			throw "Last name must be less than 21 characters\n";
		// Cannot be left blank
		else if(lastNameLength <= 0)
			throw "Last name must not be blank\n";
		// Check only alphabet characters
        	if(lastNamePattern.test(lastName) == false)
                	throw "First name must be only alphabets or - or ' character\n";
		else
			throw ""; // Clears prior error messages
	}

	// Display errors
	catch(err)
	{
		document.getElementById("lastNameErrors").innerHTML = err;	
	}

	// Check if no errors occured
	if(document.getElementById("emailErrors").innerHTML == "" &&
		document.getElementById("passwordErrors").innerHTML == "" &&
		document.getElementById("passwordConfErrors").innerHTML == "" &&
		document.getElementById("firstNameErrors").innerHTML == "" &&
		document.getElementById("lastNameErrors").innerHTML == "")
		{
			return true;
		}
	else
	{
		return false;
	}
}
