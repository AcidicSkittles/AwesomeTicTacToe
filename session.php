<?php
 
  $userid = "";
  $session = false;

   if (isset($_SESSION["tictactoe-user"]))
   {
      $session = true;
      $username = $_SESSION["tictactoe-user"];
      $password = $_SESSION["tictactoe-pass"];

      $q = "SELECT id FROM `users` WHERE (username = '$username') and (password = '$password')";
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
   {
      $session = false;
   }

?>