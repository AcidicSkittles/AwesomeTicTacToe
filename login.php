<?php
 session_start();
 
 include("db.php");
 $link = mysql_connect($server, $user, $pass);
 if(!mysql_select_db($database)) die(mysql_error());

 include("session.php");


if (isset($_POST["username"]))  {

   $username = mysql_real_escape_string(trim($_POST["username"]));
   $password = mysql_real_escape_string(trim($_POST["password"]));
   
   
   if (($username != "") && ($password != ""))
   {
        $q = "SELECT username FROM `members` WHERE (username = '$username') and (password = '$password')";
        if(!($result_set = mysql_query($q))) die(mysql_error());
        $number = mysql_num_rows($result_set);
 
        if (!$number) {
            echo "Failed login, try again maybe?? Remember, your inputs are case sensitive."; 
            //showForm();
        } 
        else {
			echo "You have logged in";
        }
   }
   else
     { echo "Please fill in all the fields first !";}
}
else
{
  if ($session == true)
    echo "You are already logged in.";
}


?>
