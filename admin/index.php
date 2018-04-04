<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>
 
<?php

  include "../koneksi_db.php"; 

  $username = $_POST['username'];
  $password = $_POST['password'];
 
    if(isset($_POST['Login2'])) {
      $query2 = "SELECT * FROM user_pic WHERE user_type = 'Admin DTP' AND username = '$username' AND password = '$password'";
      $result2 = mysqli_query($connect, $query2);
      $found2 = mysqli_num_rows($result2);
      
      if($found2 == 1) {

         session_start();

          $data2 = mysqli_fetch_array($result2);

              $_SESSION['username'] = $data2['username'];
              $_SESSION['password'] = $data2['password'];

          if ($_SESSION['Login Admin'] = TRUE) {
          header('location: home_admin.php');
      } else {
          header('location: index.php');
      }
    }
  }  


?>


<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		
		<meta name="description" content="Worthy a Bootstrap-based, Responsive HTML5 Template">
		<meta name="author" content="htmlcoder.me">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Log In Admin DTP</title>

		<!-- Favicon -->
		<link rel="shortcut icon" href="../images/login.png">

		<!-- Web Fonts -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Raleway:700,400,300" rel="stylesheet" type="text/css">

		<!-- Bootstrap core CSS -->
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

		<!-- Font Awesome CSS -->
		<link href="../fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Table CSS -->
		<link href="../css/table.css" rel="stylesheet">

		<!-- Plugins -->
		<link href="../css/animations.css" rel="stylesheet">

		<!-- Worthy core CSS file -->
		<link href="../css/style.css" rel="stylesheet">

		<!-- Custom css --> 
		<link href="../css/custom.css" rel="stylesheet">

		<!-- Pop up css --> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<!-- Custom css --> 
		<link href="../css/main_login.css" rel="stylesheet">


	</head>

	
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box" style="width: 500px; height: 400px;">
					<div class="left" style="width: 500px;">
						<div class="content" style="padding-bottom: 50px;">
								<p class="lead" style="font-weight: bold; font-size: 30px;">Log In to your account</p>
							<form class="form-auth-small" role="form" method="post" enctype="multipart/form-data" action="">
								<div class="form-group">
									<label class="control-label" style="margin-right: 500px;">Username</label>
									<input type="text" class="form-control" required="" name="username" placeholder="Username">
								</div>
								<div class="form-group">
									<label class="control-label" style="margin-right: 500px;">Password</label>
									<input type="password" class="form-control" required="" name="password" placeholder="Password">
								</div>
								<button type="submit" name="Login2" value="Login Admin" class="btn btn-primary btn-lg btn-block" style="font-size: 18px; font-weight: bold;">LOGIN</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
