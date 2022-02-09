<?php

  $mysqli = mysqli_connect("localhost", "root", "", "db_skripsi", 3306); 
  
  if(!$mysqli){
  	die('error: '. mysqli_connect_error());
  }

?>