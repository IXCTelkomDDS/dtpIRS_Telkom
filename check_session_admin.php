<?php
   session_start();

     if(!isset($_SESSION['Login Admin'])){
	    echo 'Forbidden access !<br>';
		echo '<a href="index.php">Please login first !</a>';
		exit;
	 }
?>