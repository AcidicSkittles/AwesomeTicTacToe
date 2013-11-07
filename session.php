<?php
 
  $userid = "";
  $session = false;

   if (isset($_SESSION["tictactoe"]))
   {
      $session = true;
      $username = $_SESSION["user"];
      $password = $_SESSION["pass"];

      $q = "SELECT id FROM `members` WHERE (username = '$username') and (password = '$password')";
      if(!($result_set = mysql_query($q))) die(mysql_error());
      $number = mysql_num_rows($result_set);

      if (!$number) {
         session_destroy();
         $session = false;
      }
      else {
        $r = mysql_fetch_array($result_set);
        $userid = $r['id'];
      }
   }
   else
      $session = false;

?>