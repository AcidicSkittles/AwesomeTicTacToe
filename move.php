<?php
 include("db.php");
 $link = mysql_connect($server, $user, $pass);
 if(!mysql_select_db($database)) die(mysql_error());
 session_start();
 include("session.php");
if (isset($_POST["game"]) && isset($_POST["char"]) && isset($_POST["location"]))
{

    $game = mysql_real_escape_string(trim($_POST["game"]));
	 $char = mysql_real_escape_string(trim($_POST["char"]));
	  $location = mysql_real_escape_string(trim($_POST["location"]));
	
	if(!mysql_query("INSERT INTO `moves` (game, `char`, location) VALUES ('$game', '$char', '$location')"))die(mysql_error());
	echo "Your move has been recorded.";
}
?>