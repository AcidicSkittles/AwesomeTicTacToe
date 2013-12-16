<!DOCTYPE html>
<html>
<html class="base">
<head>
	<link rel="stylesheet" type="text/css" href="awesome.css" />
	
	<title>Awesome Game</title>
    
</head>
<a href="main.php">Home</a><br />
<?php
 include("db.php");
 $link = mysql_connect($server, $user, $pass);
 if(!mysql_select_db($database)) die(mysql_error());
 session_start();
 include("session.php");
 if($session == false)
 header('Location: index.php');
 
 $game = mysql_real_escape_string(trim($_GET["game"]));

 //identify what player number this person is
 //we assume for debug sake the game name id is asdf
 $result_set = mysql_query("SELECT * FROM `players` where game LIKE '$game' ORDER BY id ASC");
 $number = mysql_num_rows($result_set);
 if (!$number)
 {
       die("Game does not exist"); 
 } 
 if($number < 3)
 {
	 die("Game does not have a valid number of players! Need 3 to start!");
 }
 $playerNumber =0;
 while($row = mysql_fetch_array($result_set))
 {
	 $playerNumber = $playerNumber + 1;
	 if($row['player'] == $userid)
	 break;
 }
 if($playerNumber ==4)
 die("You are not part of this game.");

 //find out who's turn it is
 $result = mysql_query("SELECT * FROM `moves` where game LIKE '$game' ORDER BY id DESC");
 //player1 uses X's player2 O's and player3 T's
 $number = mysql_num_rows($result);
 if($number)
 {
	
	//load in all the old moves that have been made onto the board
 	$row = mysql_fetch_array($result);
 	$lastCharPlaced = $row['char'];
		 
 }
 else
 {
	//no one has made a move. it's player1's turn 
	$lastCharPlaced = 'None';
 }
 
 
 $waitingOnPlayer;
 echo "<div id=\"waiting\">";
 if($lastCharPlaced == 'X')
 {
 	echo "Waiting on player2";
  		if($playerNumber ==2)
 			echo " (That's you)"; 
 	echo " to make a move";
	$waitingOnPlayer = 2;

 }
 else if($lastCharPlaced == 'O')
 {
 	echo "Waiting on player3";
  		if($playerNumber ==3)
 			echo " (That's you)"; 
 	echo " to make a move";
	$waitingOnPlayer = 3;
 }
 else 
 {
 	echo "Waiting on player1";
  		if($playerNumber ==1)
 			echo " (That's you)"; 
 	echo " to make a move";
	$waitingOnPlayer = 1;
 }
  echo "</div>";
  echo "<div id=\"scoreboard\"><br /></div>";

//game setup information (size, etc)
$result_set = mysql_query("SELECT * FROM `games` where game LIKE '$game'");
$row = mysql_fetch_array($result_set);
$size = $row['size'];

 ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
if (document.all||document.getElementById){
document.write('<style>.tictac{')
document.write('width:50px;height:50px;')
document.write('}</style>')
}
var board_size = <?php echo $size; ?>;
var waitingOnPlayer = <?php echo $waitingOnPlayer; ?>;
var playerNumber = <?php echo $playerNumber; ?>;
var sqr1
var sqr2
var sqr3
var sqr4
var sqr5
var sqr6
var sqr7
var sqr8
var sqr9
var sqr10
var sqr11
var sqr12
var sqr13
var sqr14
var sqr15
var sqr16
var sqr17
var sqr18
var sqr19
var sqr20
var sqr21
var sqr22
var sqr23
var sqr24
var sqr25
var  sqr26
var  sqr27
var  sqr28
var  sqr29
var  sqr30
var  sqr31
var  sqr32
var  sqr33
var  sqr34
var  sqr35
var  sqr36
var  sqr37
var  sqr38
var  sqr39
var  sqr40
var  sqr41
var  sqr42
var  sqr43
var  sqr44
var  sqr45
var  sqr46
var  sqr47
var  sqr48
var  sqr49
var  sqr50
var  sqr51
var  sqr52
var  sqr53
var  sqr54
var  sqr55
var  sqr56
var  sqr57
var  sqr58
var  sqr59
var  sqr60
var  sqr61
var  sqr62
var  sqr63
var  sqr64
var  sqr65
var  sqr66
var  sqr67
var  sqr68
var  sqr69
var  sqr70
var  sqr71
var  sqr72
var  sqr73
var  sqr74
var  sqr75
var  sqr76
var  sqr77
var  sqr78
var  sqr79
var  sqr80
var  sqr81
var  sqr82
var  sqr83
var  sqr84
var  sqr85
var  sqr86
var  sqr87
var  sqr88
var  sqr89
var  sqr90
var  sqr91
var  sqr92
var  sqr93
var  sqr94
var  sqr95
var  sqr96
var  sqr97
var  sqr98
var  sqr99
var  sqr100
var sqrT = new Array(99)
var moveCount = 0
var turn = 1
var mode = 2

function vari()
{
sqr1 = document.tic.sqr1.value
sqr2 = document.tic.sqr2.value
sqr3 = document.tic.sqr3.value
sqr4 = document.tic.sqr4.value
sqr5 = document.tic.sqr5.value
sqr6 = document.tic.sqr6.value
sqr7 = document.tic.sqr7.value
sqr8 = document.tic.sqr8.value
sqr9 = document.tic.sqr9.value
sqr10 = document.tic.sqr10.value
sqr11 = document.tic.sqr11.value
sqr12 = document.tic.sqr12.value
sqr13 = document.tic.sqr13.value
sqr14 = document.tic.sqr14.value
sqr15 = document.tic.sqr15.value
sqr16 = document.tic.sqr16.value
sqr17 = document.tic.sqr17.value
sqr18 = document.tic.sqr18.value
sqr19 = document.tic.sqr19.value
sqr20 = document.tic.sqr20.value
sqr21 = document.tic.sqr21.value
sqr22 = document.tic.sqr22.value
sqr23 = document.tic.sqr23.value
sqr24 = document.tic.sqr24.value
sqr25 = document.tic.sqr25.value
sqr26= document.tic.sqr26.value
sqr27= document.tic.sqr27.value
sqr28= document.tic.sqr28.value
sqr29= document.tic.sqr29.value
sqr30= document.tic.sqr30.value
sqr31= document.tic.sqr31.value
sqr32= document.tic.sqr32.value
sqr33= document.tic.sqr33.value
sqr34= document.tic.sqr34.value
sqr35= document.tic.sqr35.value
sqr36= document.tic.sqr36.value
sqr37= document.tic.sqr37.value
sqr38= document.tic.sqr38.value
sqr39= document.tic.sqr39.value
sqr40= document.tic.sqr40.value
sqr41= document.tic.sqr41.value
sqr42= document.tic.sqr42.value
sqr43= document.tic.sqr43.value
sqr44= document.tic.sqr44.value
sqr45= document.tic.sqr45.value
sqr46= document.tic.sqr46.value
sqr47= document.tic.sqr47.value
sqr48= document.tic.sqr48.value
sqr49= document.tic.sqr49.value
sqr50= document.tic.sqr50.value
sqr51= document.tic.sqr51.value
sqr52= document.tic.sqr52.value
sqr53= document.tic.sqr53.value
sqr54= document.tic.sqr54.value
sqr55= document.tic.sqr55.value
sqr56= document.tic.sqr56.value
sqr57= document.tic.sqr57.value
sqr58= document.tic.sqr58.value
sqr59= document.tic.sqr59.value
sqr60= document.tic.sqr60.value
sqr61= document.tic.sqr61.value
sqr62= document.tic.sqr62.value
sqr63= document.tic.sqr63.value
sqr64= document.tic.sqr64.value
sqr65= document.tic.sqr65.value
sqr66= document.tic.sqr66.value
sqr67= document.tic.sqr67.value
sqr68= document.tic.sqr68.value
sqr69= document.tic.sqr69.value
sqr70= document.tic.sqr70.value
sqr71= document.tic.sqr71.value
sqr72= document.tic.sqr72.value
sqr73= document.tic.sqr73.value
sqr74= document.tic.sqr74.value
sqr75= document.tic.sqr75.value
sqr76= document.tic.sqr76.value
sqr77= document.tic.sqr77.value
sqr78= document.tic.sqr78.value
sqr79= document.tic.sqr79.value
sqr80= document.tic.sqr80.value
sqr81= document.tic.sqr81.value
sqr82= document.tic.sqr82.value
sqr83= document.tic.sqr83.value
sqr84= document.tic.sqr84.value
sqr85= document.tic.sqr85.value
sqr86= document.tic.sqr86.value
sqr87= document.tic.sqr87.value
sqr88= document.tic.sqr88.value
sqr89= document.tic.sqr89.value
sqr90= document.tic.sqr90.value
sqr91= document.tic.sqr91.value
sqr92= document.tic.sqr92.value
sqr93= document.tic.sqr93.value
sqr94= document.tic.sqr94.value
sqr95= document.tic.sqr95.value
sqr96= document.tic.sqr96.value
sqr97= document.tic.sqr97.value
sqr98= document.tic.sqr98.value
sqr99= document.tic.sqr99.value
sqr100= document.tic.sqr100.value
}
function player1Check()
{

}

function drawCheck()
{
  var counter = 0;
  for(var i = 0; i<sqrT.length; i++)
		if(sqrT[i] == 1)
			counter++;

  if(counter == (board_size*board_size))
  {
    //reset();
    document.getElementById("waiting").innerHTML = "Game over. All spaces filled.";
  }
}


function reset()
{
  document.tic.sqr1.value = "     "
  document.tic.sqr2.value = "     "
  document.tic.sqr3.value = "     "
  document.tic.sqr4.value = "     "
  document.tic.sqr5.value = "     "
  document.tic.sqr6.value = "     "
  document.tic.sqr7.value = "     "
  document.tic.sqr8.value = "     "
  document.tic.sqr9.value = "     "
  document.tic.sqr10.value = "     "
  document.tic.sqr11.value = "     "
  document.tic.sqr12.value = "     "
  document.tic.sqr13.value = "     "
  document.tic.sqr14.value = "     "
  document.tic.sqr15.value = "     "
  document.tic.sqr16.value = "     "
  document.tic.sqr17.value = "     "
  document.tic.sqr18.value = "     "
  document.tic.sqr19.value = "     "
  document.tic.sqr20.value = "     "
  document.tic.sqr21.value = "     "
  document.tic.sqr22.value = "     "
  document.tic.sqr23.value = "     "
  document.tic.sqr24.value = "     "
  document.tic.sqr25.value = "     "
document.tic.sqr26.value= "     "
document.tic.sqr27.value= "     "
document.tic.sqr28.value= "     "
document.tic.sqr29.value= "     "
document.tic.sqr30.value= "     "
document.tic.sqr31.value= "     "
document.tic.sqr32.value= "     "
document.tic.sqr33.value= "     "
document.tic.sqr34.value= "     "
document.tic.sqr35.value= "     "
document.tic.sqr36.value= "     "
document.tic.sqr37.value= "     "
document.tic.sqr38.value= "     "
document.tic.sqr39.value= "     "
document.tic.sqr40.value= "     "
document.tic.sqr41.value= "     "
document.tic.sqr42.value= "     "
document.tic.sqr43.value= "     "
document.tic.sqr44.value= "     "
document.tic.sqr45.value= "     "
document.tic.sqr46.value= "     "
document.tic.sqr47.value= "     "
document.tic.sqr48.value= "     "
document.tic.sqr49.value= "     "
document.tic.sqr50.value= "     "
document.tic.sqr51.value= "     "
document.tic.sqr52.value= "     "
document.tic.sqr53.value= "     "
document.tic.sqr54.value= "     "
document.tic.sqr55.value= "     "
document.tic.sqr56.value= "     "
document.tic.sqr57.value= "     "
document.tic.sqr58.value= "     "
document.tic.sqr59.value= "     "
document.tic.sqr60.value= "     "
document.tic.sqr61.value= "     "
document.tic.sqr62.value= "     "
document.tic.sqr63.value= "     "
document.tic.sqr64.value= "     "
document.tic.sqr65.value= "     "
document.tic.sqr66.value= "     "
document.tic.sqr67.value= "     "
document.tic.sqr68.value= "     "
document.tic.sqr69.value= "     "
document.tic.sqr70.value= "     "
document.tic.sqr71.value= "     "
document.tic.sqr72.value= "     "
document.tic.sqr73.value= "     "
document.tic.sqr74.value= "     "
document.tic.sqr75.value= "     "
document.tic.sqr76.value= "     "
document.tic.sqr77.value= "     "
document.tic.sqr78.value= "     "
document.tic.sqr79.value= "     "
document.tic.sqr80.value= "     "
document.tic.sqr81.value= "     "
document.tic.sqr82.value= "     "
document.tic.sqr83.value= "     "
document.tic.sqr84.value= "     "
document.tic.sqr85.value= "     "
document.tic.sqr86.value= "     "
document.tic.sqr87.value= "     "
document.tic.sqr88.value= "     "
document.tic.sqr89.value= "     "
document.tic.sqr90.value= "     "
document.tic.sqr91.value= "     "
document.tic.sqr92.value= "     "
document.tic.sqr93.value= "     "
document.tic.sqr94.value= "     "
document.tic.sqr95.value= "     "
document.tic.sqr96.value= "     "
document.tic.sqr97.value= "     "
document.tic.sqr98.value= "     "
document.tic.sqr99.value= "     "
document.tic.sqr100.value= "     "
for(var i = 0; i< (board_size*board_size); i++)
	sqrT[i] = 0;
  vari()
  turn = 1
  moveCount = 0
}

function generate_board(someint)
{
	if(someint>10)
		{document.write("<p> That is too large a board to generate</p>");}
	else{
		var squarenum = someint * someint;
		document.write('<FORM NAME="tic">');
			for(var i = 1; i<squarenum+1; i++)
			{
				document.write('<INPUT TYPE="button" NAME="sqr'+i+'" id ="'+i+'" class="tictac" value="     " onClick="command(document.tic.sqr'+i+','+i+')">');
					if(i%someint == 0)
						{ document.write("<br />");}
			}
		document.write("</form>");
		//load in all the old moves that have been made
		getMoves();

	}
}
function resetter()
{
  reset()
}
function command(sqr, integer)
{
	//check if it's this players turn to make a turn
	if(waitingOnPlayer != playerNumber)
	{
	alert("It's not your turn yet!");
	return;
	}

	for(var i = 0; i<sqrT.length; i++)
	{
		var holder = i+1;
		var string = "sqr"+holder;
		if(sqr.name == string)
		{
			if(sqrT[i] != 1)
			{
				sqrT[i] = 1;
				var char = <?php if($playerNumber == 1) echo json_encode('X'); else if($playerNumber == 2) echo json_encode('O'); else echo json_encode('T');?>;
				$.post("./move.php",
  				{
    				game:<?php echo json_encode($game); ?>,
    				char:char,
					location:(i+1)//+1 since board square numbering starts at 1 and not 0
  				},
  				function(data,status){
   				alert(data + "\n");//alert whatever move.php outputs
  				});
				//update the board with the move
				if(playerNumber == 1)
				sqr.value = ' X ';
				else if(playerNumber == 2)
				sqr.value = ' O ';
				else
				sqr.value = ' T ';
				
				waitingOnPlayer = (waitingOnPlayer%3) + 1;
				
				var output = "Waiting on player" + waitingOnPlayer;
				if(waitingOnPlayer == playerNumber)
				output = output + " (That's you) ";
				output = output + " to make a move";
 				document.getElementById("waiting").innerHTML = output;
				
				vari();
			}
			else
			alert("Whoa there buddy, someone already made a move here!");
		}
	}
drawCheck();
}

generate_board(board_size);
resetter();

function getMoves()
{
	//setInterval("getMoves()",6000);
	<?php
		//load in previously made moves
		$result = mysql_query("SELECT * FROM `moves` where game LIKE '$game'");
 		//player1 uses X's player2 O's and player3 T's
 		$number = mysql_num_rows($result);
 		if($number)
 		{
			$lastCharPlaced;
			//load in all the old moves that have been made onto the board
			while($row = mysql_fetch_array($result))
			{
				if(!$lastCharPlaced)
					$lastCharPlaced = $row['char'];
				$move = $row['location'];
				$char = $row['char'];
				echo "document.tic.sqr{$move}.value = \"  {$char}  \"; sqrT[{$move}-1]=1;";
			}
		}
		
	
		?>
		drawCheck();
		updateScore();
 	vari();
	
}
function updateScore()
{
	var lastCharPlaced;
	var location = sqrT;
	// Scoring System
	// 1 mark by itself (no connections) = 1 point
	// 2 connected marks = 1 point per mark + 2 points bonus per mark = 6 points
	// 3 connected marks = 1 point per mark + 3 points bonus per mark = 12 points
	
	var totalScore;
	for(var z =0; z<3;z++)
	{
		totalScore = 0;
		if(z==0)
		lastCharPlaced = "X";
		else if(z==1)
		lastCharPlaced = "O";
		else
		lastCharPlaced = "T";
		// Horizontal checks
		for(var i = 1; i <= board_size; i++)
		{	
			for(var j = 1; j <= board_size; j++)
			{
				// To avoid boundary error for 3 in a row check
				if(j+2 > board_size)
				continue;
				
				// Check for 3 in a row chains
				else if( (location[j].value == lastCharPlaced) && (location[j+1].value == lastCharPlaced) && (location[j+2].value == lastCharPlaced))
				{
				totalScore += (3*3)+(3);
				
				}
				// To avoid boundary error for 2 in a row check
				if(j+1 > board_size)
				continue;
				
				// Check for 2 in a row chains
				else if( (location[j].value == lastCharPlaced) && (location[j+1].value == lastCharPlaced))
				{
					totalScore += (2*2)+(2);
				
				}
				// Add 1 for placing single mark
				else
					totalScore += 1;	
			}
		}
			
		// Vertical checks
		for(var i = 1; i <= board_size; i++)
		{	
			for(var j = 1; j <= board_size; j++)
			{
				// To avoid boundary error for 3 in a row check
				if(i+2 > board_size)
				continue;
				
				// Check for 3 in a row chains
				else if( (location[j].value == lastCharPlaced) && (location[j+board_size].value == lastCharPlaced) && (location[j+board_size*2].value == lastCharPlaced))
				{
				totalScore += (3*3)+(3);
				
				}
				// To avoid boundary error for 2 in a row check
				if(i+1 > board_size)
				continue;
				
				// Check for 2 in a row chains
				else if( (location[j].value == lastCharPlaced) && (location[j+board_size].value == lastCharPlaced))
				{
				totalScore += (2*2)+(2);
				
				}
				
				// Add 1 for placing single mark
				else
				totalScore += 1;	
			}
		}
			
		// Diagonal checks
		for(var i = 1; i <= board_size; i++)
		{	
			for(var j = 1; j <= board_size; j++)
			{
				// To avoid boundary error for 3 in a row diagonally
				if(j+2 > board_size)
				continue;
				else if(j+board_size*2+2 > board_size*board_size)
				continue;
				
				// Check for 3 in a row chains (top-left to bottom-right)
				else if( (location[j].value == lastCharPlaced) && (location[j+board_size+1].value == lastCharPlaced) && (location[j+board_size*2+1].value == lastCharPlaced))
				{
				totalScore += (3*3)+(3);
				
				}
				
				// To avoid boundary error for 2 in a row diagonally
				if(j+1 > board_size)
				continue;
				else if(j+board_size+1 > board_size*board_size)
				continue;
				
				// Check for 2 in a row chains (top-left to bottom-right)
				else if( (location[j].value == lastCharPlaced) && (location[j+board_size+1].value == lastCharPlaced))
				totalScore += (2*2)+(2);
				
				// To avoid boundary error for 3 in a row diagonally
				if(j-2 < 1)
				continue;
				else if(j-board_size*2-1 > 1)
				continue;
				
				// Check for 3 in a row chains (bottom-left to top-right)
				else if( (location[j].value == lastCharPlaced) && (location[j-board_size-1].value == lastCharPlaced) && (location[j-board_size*2-1].value == lastCharPlaced))
				totalScore += (3*3)+(3);
				
				// To avoid boundary error for 2 in a row diagonally
				if(j-1 < 1)
				continue;
				else if(j-board_size-1 < 1)
				continue;
				
				// Check for 2 in a row chains (bottom-left to top-right)
				else if( (location[j].value == lastCharPlaced) && (location[j-board_size-1].value == lastCharPlaced))
				totalScore += (2*2)+(2);
				
				// Add 1 for placing single mark
				else
				totalScore += 1;	
			}
		}
		if(lastCharPlaced == "X")
		document.getElementById("waiting").innerHTML = document.getElementById("waiting").innerHTML + " Player1: " + totalScore + "pts";
		if(lastCharPlaced == "O")
		document.getElementById("waiting").innerHTML = document.getElementById("waiting").innerHTML + " Player2: " + totalScore + "pts";
		if(lastCharPlaced == "T")
		document.getElementById("waiting").innerHTML = document.getElementById("waiting").innerHTML + " Player3: " + totalScore + "pts";
	}
}

</script>
</html>