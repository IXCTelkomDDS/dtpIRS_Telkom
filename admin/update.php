<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "../koneksi_db.php";
	include "../header-admin.php";
	include "../check_session_admin.php";

	$query = "SELECT * FROM upload_dtp WHERE ID_UPLOAD = '$_GET[id]'";
	$result = mysqli_query($connect, $query);
	$data = mysqli_fetch_array($result);

?>


		<link rel="stylesheet" type="text/css" href="../css/util.css">
		<link rel="stylesheet" type="text/css" href="../css/main.css">


		<title>Update Documents IRS</title>

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title" style="font-weight: bold; font-size: 40px; margin-top: 10px;">Update Documents IRS</h3>

					<div class="row">
						<div class="col-md-12">
							<!-- BORDERED TABLE -->
							<div class="panel">
								<div class="panel-body" style="margin-top: 20px;">
									
				<form class="login100-form validate-form flex-sb flex-w" role="form" method="post" enctype="multipart/form-data" action="../act_update_adminSubmission.php">

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
					<div class="wrap-input100 validate-input" style="height: 30px; font-size: 15px; padding-right: 100px; background-color: transparent; border-color: transparent;">
						<input type="radio" name="JENIS_FILE_UPLOAD" value="Kajian" class="detail" required="" <?php echo $data['JENIS_FILE_UPLOAD']=='Kajian'?'checked="checked"':'';?>> Kajian &nbsp; &nbsp; &nbsp;
						<input type="radio" name="JENIS_FILE_UPLOAD" value="Dokumen Standar" class="detail" required="" <?php echo $data['JENIS_FILE_UPLOAD']=='Dokumen Standar'?'checked="checked"':'';?>> Dokumen Standar
						&nbsp; &nbsp; &nbsp;
						<input type="radio" name="JENIS_FILE_UPLOAD" value="Prototype" class="detail" required="" <?php echo $data['JENIS_FILE_UPLOAD']=='Prototype'?'checked="checked"':'';?>> Prototype
						<span class="focus-input100"></span>
					</div>

					<?php if (($data['JENIS_FILE_UPLOAD'] == 'Prototype') AND ($data['UNGGULAN']=='Unggulan')) { ?>

					<div class="wrap-input100 validate-input" style="padding-top: 16px; background-color: white; border-color: transparent;">
						<input style="height: 20px;" type="checkbox" name="UNGGULAN" value="Unggulan" <?php echo $data['UNGGULAN']=='Unggulan'?'checked="checked"':'';?>> <span style="font-weight: bold;">Checklist if featured product (for Prototype) </span>
					</div>

					<?php } ?>

					<div class="p-t-10 p-b-9" style="padding-top: 16px;">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">Lab</span>
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

					<?php if ($data['JENIS_FILE_UPLOAD'] == 'Kajian') { ?>

					<div class="p-t-10 p-b-9">
						<span class="txt1" style="font-weight: bold; font-size: 14px; margin-right: 300px;">File</span>
						<br>
						<input type="checkbox" name="ubah_file" value="true"> Checklist if you want to change the file 
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; font-size: 14px;" type="file" name="NAMA_FILE_UPLOAD" id="NAMA_FILE_UPLOAD">
						<span class="focus-input100"></span>
					</div>

					<?php } else if ($data['JENIS_FILE_UPLOAD'] == 'Dokumen Standar') { ?>

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

					<?php if ($data['JENIS_FILE_UPLOAD'] == 'Kajian') { ?>

					<div style="padding-top: 10px; padding-bottom: 20px;" class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit" value="Update File" name="Submit_ka" style="font-weight: bold; height: 40px;"> Update File </button>
					</div>

					<?php } else if ($data['JENIS_FILE_UPLOAD'] == 'Dokumen Standar') { ?>

					<div style="padding-top: 10px; padding-bottom: 20px;" class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit" value="Update File" name="Submit_sta" style="font-weight: bold; height: 40px;"> Update File </button>
					</div>

					<?php } ?>

					<?php if ($data['JENIS_FILE_UPLOAD'] == 'Prototype') { ?>

					<div style="padding-top: 10px; padding-bottom: 20px;" class="container-login100-form-btn m-t-17">
						<button onclick = "Warn2();" class="login100-form-btn" type="submit" value="Update URL" name="Submit_pro" style="font-weight: bold; height: 40px;"> Update URL </button>
					</div>

					<?php } ?>

					<input type="hidden" name="ID_UPLOAD" value="<?php echo $data['ID_UPLOAD'];?>">
      				<input type="hidden" name="NAMA_FILE_UPLOAD" value="<?php echo $data['NAMA_FILE_UPLOAD'];?>">


				</form>

								</div>

							</div>
							<!-- END BORDERED TABLE -->
						</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->


	<?php
		include "../footer-admin.php";
	?>
