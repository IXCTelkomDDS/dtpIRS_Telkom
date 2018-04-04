<?php
   session_start();

     if(!isset($_SESSION['Login DTP'])){
	    echo 'Forbidden access website!<br>';
		echo '<a href="../login.php">Please login first !</a>';
		exit;
	 }
?>