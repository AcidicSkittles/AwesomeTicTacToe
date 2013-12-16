<!DOCTYPE html>
<html>
<html class="base">
<head>
	<link rel="stylesheet" type="text/css" href="awesome.css" />
	
	<title>Awesome Main</title>
    
</head>


<!-- Pivott Logo -->
	<img class="align-center medium" src="awesome_logo.png" alt="Awesome Logo" title="Awesome Logo">
	<p></p>



<?php
 include("db.php");
 $link = mysql_connect($server, $user, $pass);
 if(!mysql_select_db($database)) die(mysql_error());
 session_start();
 include("session.php");
 if($session == false)
 header('Location: index.php');

$result_set = mysql_query("SELECT * FROM `players` where player LIKE '$userid' ORDER BY id ASC");
 $number = mysql_num_rows($result_set);
 if (!$number)
 {
       echo("You are in no games"); 
 } 
 else
 {
	 $i =1;
	 echo "You are in these games:<br />";
	 while($row = mysql_fetch_array($result_set))
	 {
		 $friends = mysql_query("SELECT users.username FROM `users` INNER JOIN `players` ON players.player = users.id where players.game LIKE '$row[game]' ORDER BY users.id DESC");
		 echo "<a href=\"./game.php?game={$row['game']}\">Game #{$i} with ";
		 //print out usernames in the game
		 while($row2 = mysql_fetch_array($friends))
		 	echo $row2['username'] . " ";
		 
		  echo "</a><br />";
		 $i++;
	 }
 }
 echo "<br />
 <input type=\"submit\" value=\"New Game\" id=\"btnSubmit\"/>
 <script type=\"text/javascript\">
 document.getElementById('btnSubmit').onclick=function(id){toggleElement('newGame');}
 </script>
 <div id=\"newGame\" style=\"display:none\">
 <form name=\"submitForm\"  action=\"main.php\" method=\"post\">
 <label>Player 1: {$username} (That's you)</label><br />
 <label>Player 2:</label><input  name=\"player2\" /><br />
 <label>Player 3:</label><input  name=\"player3\" /><br />
 <label>Board Size:</label><input  name=\"size\" placeholder=\"Sizes can be 5 - 10\"/><br /><br />
 <input type=\"submit\" value=\"Create Game\" />
 </form>
 </div>
 ";
 
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
    function toggleElement(id)
    {

        if(document.getElementById(id).style.display == 'none')
            document.getElementById(id).style.display = '';
        else
            document.getElementById(id).style.display = 'none';
    }

</script>
<?php
//trying to create a new game
	if (isset($_POST["player2"]) && isset($_POST["player3"]) && isset($_POST["size"]))
	{
		$player2 = mysql_real_escape_string(trim($_POST["player2"]));
		$player3 = mysql_real_escape_string(trim($_POST["player3"]));
		$size = mysql_real_escape_string(trim($_POST["size"]));
		//we should make sure that all players are different
		if(strcmp($username, $player2)==0 || strcmp($username, $player3)==0 || strcmp($player2, $player3)==0)
		die("<script type=\"text/javascript\">alert(\"All the players need to be different!\");</script>");
		
		
	   if(strlen($player2)>0 && strlen($player3)>0 && strlen($size)>0)
	   {
			//check to see if those players he wants to play with exist
			$player2Data = mysql_query("SELECT * FROM `users` where username LIKE '$player2'");
			$number = mysql_num_rows($player2Data);
			if(!$number)
			{
				die("<script type=\"text/javascript\">alert(\"Player2: {$player2} does not exist.\");</script>");
			}
			$player2Data = mysql_fetch_array($player2Data);
			
			$player3Data = mysql_query("SELECT * FROM `users` where username LIKE '$player3'");
			$number = mysql_num_rows($player3Data);
			if(!$number)
			{
				die("<script type=\"text/javascript\">alert(\"Player2: {$player3} does not exist.\");</script>");
			}
			$player3Data = mysql_fetch_array($player3Data);
			
			//check if valid board size
			if($size54 || $size > 10)
			die("<script type=\"text/javascript\">alert(\"Board size can only be 5 - 10\");</script>");
			$rndName = md5($username . date("d-m-y") . time());
			//create the game
			if(!mysql_query("INSERT INTO `games` (game, size) VALUES ('$rndName', '$size')"))die(mysql_error());
			//add players to the game
			if(!mysql_query("INSERT INTO `players` (player, game) VALUES ('$userid', '$rndName')"))die(mysql_error());
			if(!mysql_query("INSERT INTO `players` (player, game) VALUES ('$player2Data[id]', '$rndName')"))die(mysql_error());
			if(!mysql_query("INSERT INTO `players` (player, game) VALUES ('$player3Data[id]', '$rndName')"))die(mysql_error());
			//redirect them into the new game
			header("Location: game.php?game={$rndName}");
	   }
			
	}
?>

</html>