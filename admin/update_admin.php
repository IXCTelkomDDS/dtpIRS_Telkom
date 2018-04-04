<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>
 
<?php

		session_start();

  include "../koneksi_db.php";
  include "../check_session_admin.php";

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
      $user_type    = $_POST['user_type'];

        //pemeriksaan input selesai, bila benar langsung jalankan perintah selanjutnya
        $sql2 = "UPDATE user_pic SET name_pic = '$name_pic', username = '$username', password = '$password', phone = '$phone', email = '$email', user_type = '$user_type' WHERE id_pic = '$id_pic'";
        $query2 = mysqli_query($connect, $sql2);
  
        if($query2) { ?>
          <script>
            alert('Update Successful');
            location.href='home_admin.php';
          </script>

        <?php } else { ?>
          <script>
            alert('Update Failed');
            location.href='update_user.php';
          </script>

        <?php } ?>

    <?php } ?>


<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>

	<title>Edit User</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min_admin.css">
	<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min_admin.css">
	<link rel="stylesheet" href="../vendor/linearicons/style_admin.css">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../css/main_admin.css">

	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="../css/demo_admin.css">

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

	<!-- ICONS -->
	<link rel="icon" type="image/png" sizes="96x96" href="../images/DDS-telkom.png">

	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap" style="margin-top: 20px; margin-bottom: 20px;">
			<div class="vertical-align-middle">

				<div class="auth-box" style="width: 500px; height: 700px;">
					<div class="left" style="width: 500px;">
						<div class="content" style="padding-bottom: 30px;">
								<p class="lead" style="font-weight: bold; font-size: 30px; margin-top: 30px;">Edit User</p>

								<br>

							<form class="form-auth-small" role="form" method="post" enctype="multipart/form-data" action="">

								<div class="form-group">
									<label class="control-label" style="margin-right: 500px;">Admin</label>
									<input readonly="" type="text" class="form-control" required="" name="name" value="<?php echo $_SESSION['username'];?>">
								</div>

								<div class="form-group">
									<label class="control-label" style="margin-right: 500px;">Name</label>
									<input type="text" class="form-control" required="" name="name_pic" value="<?php echo $data['name_pic'];?>">
								</div>
								<div class="form-group">
									<label class="control-label" style="margin-right: 370px;">Username</label>
									<input type="text" class="form-control" required="" name="username" value="<?php echo $data['username'];?>">
								</div>
								<div class="form-group">
									<label class="control-label" style="margin-right: 370px;">Password</label>
									<input type="password" class="form-control" required="" name="password" value="<?php echo $data['password'];?>">
								</div>
								<div class="form-group">
									<label class="control-label" style="margin-right: 500px;">Phone</label>
									<input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" class="form-control" required="" name="phone" value="<?php echo $data['phone'];?>">
								</div>
								<div class="form-group">
									<label class="control-label" style="margin-right: 500px;">Email</label>
									<input type="text" class="form-control" required="" name="email" value="<?php echo $data['email'];?>">
								</div>
								<div class="form-group">
									<label class="control-label" style="margin-right: 370px;">Usertype</label>
									<input type="text" readonly="" class="form-control" required="" name="user_type" value="<?php echo $data['user_type'];?>">
								</div>

								<div style="padding-top: 10px; padding-bottom: 20px;" class="container-login100-form-btn m-t-17">
									<button class="btn btn-primary btn-lg btn-block" type="submit" value="Submit" name="Update" style="font-weight: bold; height: 40px;"> EDIT </button>
								</div>

								<input type="hidden" name="id_pic" value="<?php echo $data['id_pic'];?>">

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
