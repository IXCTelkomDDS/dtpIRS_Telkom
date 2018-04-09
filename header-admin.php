<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "koneksi_db.php";
	include "check_session_admin.php";

	$sql_pic = "SELECT * FROM user_pic WHERE user_type = 'Admin DTP' GROUP BY id_pic";
	$result_pic = mysqli_query($connect, $sql_pic);

?>


<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../vendor/linearicons/style.css">
	<link rel="stylesheet" href="../vendor/chartist/css/chartist-custom.css">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../css/main_admin.css">

	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="../css/demo_admin.css">

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

	<!-- ICONS -->
	<link rel="icon" type="image/png" sizes="96x96" href="../images/DDS-telkom.png">

	<!-- bootstrap pagination -->
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>


</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right" style="margin-right: 60px;">
						<li class="dropdown">
							<a href="" class="dropdown-toggle" data-toggle="dropdown"><span>Welcome, &nbsp; <?php echo $_SESSION['username'];?></span><i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="index.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->

		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="home_admin.php" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>

						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>P.I.C DTP IRS</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="user-pic.php" class="">User P.I.C</a></li>
									<li><a href="manager-pic.php" class="">Manager P.I.C</a></li>
									<li><a href="admin-dtp.php" class="">Admin DTP</a></li>
								</ul>
							</div>
						</li>

						<li>
							<a href="#subPages2" data-toggle="collapse"><i class="lnr lnr-file-empty"></i> <span>Documents Lab IRS</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="review.php" class="">Review</a></li>
									<li><a href="standardization.php" class="">Doc. Standardization</a></li>
									<li><a href="prototype.php" class="">Prototype</a></li>
								</ul>
							</div>
						</li>
						
						<li>
							<a href="#subPages3" data-toggle="collapse"><i class="lnr lnr-alarm"></i> <span>Log Activity Admin</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages3" class="collapse ">
								<ul class="nav">
									<li><a href="log_document.php" class="">Documents IRS</a></li>
									<li><a href="log_user.php" class="">Users IRS</a></li>
								</ul>
							</div>
						</li>
						
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->