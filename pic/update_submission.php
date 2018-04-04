<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "../koneksi_db.php";
	include "../header-pic.php";
	include "../check_session.php";

	$query = "SELECT * FROM upload_dtp WHERE ID_UPLOAD = '$_GET[id]'";
	$result = mysqli_query($connect, $query);
	$data = mysqli_fetch_array($result);

?>


		<title>Update Documents IRS</title>

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
											<ul class="nav navbar-nav navbar-left" style="padding-left: 40px;">
												<li><a href="index.php" style="font-weight: bold;">Home</a></li>
												<li><a href="research-result.php" style="font-weight: bold;">Research Result</a></li>
												<li><a href="#update" style="font-weight: bold;">Doc. Update Submission</a></li>
												<li><a href="prototype.php" style="font-weight: bold;">Prototype</a></li>
											</ul>

											<ul class="nav navbar-nav navbar-right">
												<!-- logo -->
												<div class="logo smooth-scroll">
													<a href="index.php"><img id="logo" src="../images/logo-telkom.png" width="90" alt="Worthy"></a>
												</div>

											</ul>
										</div>

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
		<div class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="background-color: white;">
			<div align="center" class="container">
				<div class="row">

				<h1 id="update" class="title text-center" style="font-weight: bold; margin-top: 10px;">Document Update IRS</h1>
				<div class="space"></div>

			<div class="wrap-login100 p-l-110 p-r-110 p-t-10 p-b-10" style="background-color: #D3D3D3;">

				<form class="login100-form validate-form flex-sb flex-w" role="form" method="post" enctype="multipart/form-data" action="../act_update_picSubmission.php">

					<div class="p-t-10 p-b-9">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">P.I.C</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; font-size: 14px;" readonly="" type="text" name="USERNAME" id="USERNAME" value="<?php echo $_SESSION['username'];?>" required="">
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-10 p-b-9">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">
							Title of Review
						</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; font-size: 14px;" type="text" name="JUDUL_UPLOAD" id="JUDUL_UPLOAD" Placeholder="Title of Review" required="" value="<?php echo $data['JUDUL_UPLOAD'];?>">
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-10 p-b-9" style="padding-top: 16px;">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">
							Type of Document
						</span>
					</div>
					<div class="wrap-input100 validate-input" style="height: 30px; font-size: 15px; padding-right: 100px; background-color: #D3D3D3; border-color: #D3D3D3;">
						<input readonly="readonly" type="radio" name="JENIS_FILE_UPLOAD" value="Kajian" class="detail" required="" <?php echo $data['JENIS_FILE_UPLOAD']=='Kajian'?'checked="checked"':'';?>> Kajian &nbsp; &nbsp; &nbsp;
						<input readonly="readonly" type="radio" name="JENIS_FILE_UPLOAD" value="Dokumen Standar" class="detail" required="" <?php echo $data['JENIS_FILE_UPLOAD']=='Dokumen Standar'?'checked="checked"':'';?>> Dokumen Standar
						&nbsp; &nbsp; &nbsp;
						<input readonly="readonly" type="radio" name="JENIS_FILE_UPLOAD" value="Prototype" class="detail" required="" <?php echo $data['JENIS_FILE_UPLOAD']=='Prototype'?'checked="checked"':'';?>> Prototype
						<span class="focus-input100"></span>
					</div>

					<?php if (($data['JENIS_FILE_UPLOAD'] == 'Prototype') AND ($data['UNGGULAN']=='Unggulan')) { ?>

					<div class="wrap validate-input" style="padding-top: 16px;">
						<input style="height: 20px;" type="checkbox" name="UNGGULAN" value="Unggulan" <?php echo $data['UNGGULAN']=='Unggulan'?'checked="checked"':'';?>> <span style="font-weight: bold;">Checklist if featured product (for Prototype) </span>
					</div>

					<?php } ?>

					<div class="p-t-10 p-b-9" style="padding-top: 16px; margin-right: 120px;">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">
							Lab
						</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input readonly="" class="input100" style="height: 30px; font-size: 14px; width: 458px;" type="text" name="JENIS_LAB_UPLOAD" id="JENIS_LAB_UPLOAD" value="<?php echo $data['JENIS_LAB_UPLOAD'];?>" required="">
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-10 p-b-9" style="padding-top: 16px;">
						<span class="txt1" style="font-weight: bold; font-size: 14px;"> Description of Document </span>
					</div>
					<div class="wrap-input100 validate-input">
						<textarea class="input100" style="height: 70px; font-size: 14px;" name="DESKRIPSI_UPLOAD" required=""><?php echo $data['DESKRIPSI_UPLOAD'];?></textarea>
						<span class="focus-input100"></span>
					</div>

					<?php if ($data['JENIS_FILE_UPLOAD'] != 'Prototype') { ?>

					<div class="p-t-10 p-b-9">
						<span class="txt1" style="font-weight: bold; font-size: 14px; margin-right: 300px;">File</span>
						<br>
						<input type="checkbox" name="ubah_file" value="true"> Checklist if you want to change the file 
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; font-size: 14px;" type="file" name="NAMA_FILE_UPLOAD" id="NAMA_FILE_UPLOAD">
						<span class="focus-input100"></span>
					</div>

					<?php } ?>

					<?php if ($data['JENIS_FILE_UPLOAD'] == 'Prototype') { ?>

					<div class="p-t-10 p-b-9">
						<span class="txt1" style="font-weight: bold; font-size: 14px; margin-right: 300px;">URL</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; font-size: 14px;" type="text" name="URL" id="URL" value="<?php echo $data['URL'];?>">
						<span class="focus-input100"></span>
					</div>

					<?php } ?>

					<?php if ($data['JENIS_FILE_UPLOAD'] != 'Prototype') { ?>

					<div style="padding-top: 10px; padding-bottom: 20px;" class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit" value="Update File" name="Submit" style="font-weight: bold; height: 40px;"> Update File </button>
					</div>

					<?php } ?>

					<?php if ($data['JENIS_FILE_UPLOAD'] == 'Prototype') { ?>

					<div style="padding-top: 10px; padding-bottom: 20px;" class="container-login100-form-btn m-t-17">
						<button onclick = "Warn2();" class="login100-form-btn" type="submit" value="Update URL" name="Submit2" style="font-weight: bold; height: 40px;"> Update URL </button>
					</div>

					<?php } ?>


					<input type="hidden" name="ID_UPLOAD" value="<?php echo $data['ID_UPLOAD'];?>">
      				<input type="hidden" name="NAMA_FILE_UPLOAD" value="<?php echo $data['NAMA_FILE_UPLOAD'];?>">


				</form>

			</div>
		</div>
	</div>

</div>
		<!-- section end -->		


<?php
	include "../footer-pic.php";
?>


<style type="text/css">
	/*$(':radio,:checkbox').click(function(){
	    return false;
	});*/

	$(':radio[readonly]:not(:checked)').attr('disabled', true);
</style>
