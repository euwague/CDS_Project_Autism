<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'autismdb';

   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }//else 
      //echo "Connection estbalished";

?>
