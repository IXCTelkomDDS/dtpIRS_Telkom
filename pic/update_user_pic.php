<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>
 
<?php

	session_start();

  include "../koneksi_db.php";
  include "../header-pic.php";
  include "../check_session.php";

  	//query get data user_pic
 	$sql = "SELECT * FROM user_pic WHERE id_pic = '$_GET[id]'";
	$result = mysqli_query($connect, $sql);
	$data = mysqli_fetch_array($result);


	if(isset($_POST['Update'])) {

      $id_pic       = $_POST['id_pic'];
      $name_pic     = $_POST['name_pic'];
      $username     = $_POST['username'];
      $password     = $_POST['password'];
      $phone        = $_POST['phone'];
      $email        = $_POST['email'];
      $lab_pic      = $_POST['lab_pic'];
      $user_type    = $_POST['user_type'];

        //pemeriksaan input selesai, bila benar langsung jalankan perintah selanjutnya
        $sql2 = "UPDATE user_pic SET name_pic = '$name_pic', username = '$username', password = '$password', phone = '$phone', email = '$email', lab_pic = '$lab_pic', user_type = '$user_type' WHERE id_pic = '$id_pic'";
        $query2 = mysqli_query($connect, $sql2);
  
        if($query2) { ?>
          <script>
            alert('Update Successful');
            location.href='index.php';
          </script>

        <?php } else { ?>
          <script>
            alert('Update Failed');
            location.href='update_user_pic.php';
          </script>

      <?php } ?> 

  <?php } ?>


?>

	<title>Edit User</title>

	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">


<body class="no-trans">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

		<!-- header start -->
		<!-- ================ --> 
		<header class="header navbar navbar-fixed-top" style="background-color: #D3D3D3; height: 100px;">
			<div class="container">
				<div class="row">
					<div class="col-md-2">

						<!-- header-left start -->
						<!-- ================ -->
						<div class="header-left clearfix">

							<!-- logo -->
							<div class="logo smooth-scroll">
								<a href="index.php"><img id="logo" src="../images/DDS-telkom.png" width="60" alt="Worthy"></a>
							</div>

						</div>
						<!-- header-left end -->

					</div>
					<div class="col-md-10">

						<!-- header-right start -->
						<!-- ================ -->
						<div class="header-right clearfix">

							<!-- main-navigation start -->
							<!-- ================ -->
							<div class="main-navigation animated">

								<!-- navbar start -->
								<!-- ================ -->
								<nav class="navbar navbar-default" role="navigation">

										<!-- Collect the nav links, forms, and other content for toggling -->
										<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
											<ul class="nav navbar-nav navbar-left" style="padding-left: 10px;">
												<li><a href="index.php" style="font-weight: bold;">Home</a></li>
												<li><a href="research-result.php" style="font-weight: bold;">Research Result</a></li>
												<li class="active"><a href="" style="font-weight: bold;">Edit User</a></li>
												<li><a href="prototype.php" style="font-weight: bold;;">Prototype</a></li>
												<li><a href="#contact" style="font-weight: bold;">Contact Us</a></li>
											</ul>

											<ul class="nav navbar-nav navbar-right">
												<!-- logo -->
												<div class="logo smooth-scroll">
													<a href="index.php"><img id="logo" src="../images/logo-telkom.png" width="90" alt="Worthy"></a>
												</div>

											</ul>
										</div>

								</nav>
								<!-- navbar end -->

							</div>
							<!-- main-navigation end -->

						</div>
						<!-- header-right end -->

					</div>
				</div>
			</div>
		</header>
		<!-- header end -->


		<div class="space"></div>
		
		<!-- section start -->
		<!-- ================ -->
		<div class="section clearfix" data-animation-effect="fadeIn" style="background-color: white;">
			<div align="center" class="container">
				<div class="row">

				<h1 id="edit" class="title text-center" style="font-weight: bold;">Edit User P.I.C</h1>
				<div class="space"></div>

				<!-- Form Upload -->
			<div class="wrap-login100 p-l-110 p-r-110 p-t-10 p-b-10" style="background-color: #D3D3D3;">

				<form class="login100-form validate-form flex-sb flex-w" role="form" method="post" enctype="multipart/form-data" action="">
					
					<div class="p-t-10 p-b-9">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">Name</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; font-size: 14px;" type="text" name="name_pic" id="name_pic" value="<?php echo $data['name_pic'];?>" required="">
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-10 p-b-9">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">Username</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; font-size: 14px;" type="text" name="username" id="username" value="<?php echo $data['username'];?>" required="">
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-10 p-b-9">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">Password</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; font-size: 14px;" type="password" name="password" id="password" value="<?php echo $data['password'];?>" required="">
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-10 p-b-9">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">Phone</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; font-size: 14px;" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="phone" id="phone" value="<?php echo $data['phone'];?>" required="">
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-10 p-b-9">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">Email</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; font-size: 14px;" type="text" name="email" id="email" value="<?php echo $data['email'];?>" required="">
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-10 p-b-9">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">P.I.C Lab</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input readonly="" class="input100" style="height: 30px; font-size: 14px;" type="text" name="lab_pic" id="lab_pic" value="<?php echo $data['lab_pic'];?>" required="">
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-10 p-b-9">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">Usertype</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input readonly="" class="input100" style="height: 30px; font-size: 14px;" type="text" name="user_type" id="user_type" value="<?php echo $data['user_type'];?>" required="">
						<span class="focus-input100"></span>
					</div>

					<div style="padding-top: 10px; padding-bottom: 20px;" class="container-login100-form-btn m-t-17">
						<button class="btn btn-primary btn-lg btn-block" type="submit" value="Submit" name="Update" style="font-weight: bold; height: 40px;"> EDIT </button>
					</div>

					<input type="hidden" name="id_pic" value="<?php echo $data['id_pic'];?>">

				</form>

			</div>
			<!-- End Form Upload -->

		</div>
	</div>
</div>
		<!-- section end -->

</body>

</html>