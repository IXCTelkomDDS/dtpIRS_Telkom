<?php
  $host = 'localhost';
  //$username = 'id4115751_haerdiansyah90';
  //$password = 'Ardi2290';
  $username = 'root';
  $password = "";
  $connect = mysqli_connect($host, $username, $password);
  // if($connect) echo 'Connected'; //true
  //  else 'Not Connected Yet'; //false
	
	$sel_db = mysqli_select_db($connect,'digital_touch_point');

	if ($connect) {
		// echo "berhasil konek";
	}
	if ($sel_db) {
		// echo "berhasil select db";
	}
?>