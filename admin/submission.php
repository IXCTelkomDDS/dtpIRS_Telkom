<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "../header-admin.php";
	include "../koneksi_db.php";
	include "../pagination1.php";
	include "../check_session_admin.php";

?>

	<script src="../js/jquery.js"></script>
		<script>
		
		<!-- js field File -->
		
			$(document).ready(function(){
    		$("#file_info").css("display","none"); //Menghilangkan file_info2 ketika pertama kali dijalankan
        		$(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
        			if ($("input[name='JENIS_FILE_UPLOAD']:checked").val() == "Kajian") { //Jika radio button selain "Prototype" dipilih maka tampilkan file_info2
            			$("#file_info").slideDown("fast"); //Efek Slide Down (Menampilkan file_info2)
        			} else {
            			$("#file_info").slideUp("fast");  //Efek Slide Up (Menghilangkan file_info2)
        			}
        			if ($("input[name='JENIS_FILE_UPLOAD']:checked").val() == "Dokumen Standar") { //Jika radio button selain "Prototype" dipilih maka tampilkan file_info2
            			$("#file_info3").slideDown("fast"); //Efek Slide Down (Menampilkan file_info2)
        			} else {
            			$("#file_info3").slideUp("fast");  //Efek Slide Up (Menghilangkan file_info2)
        			}
					if ($("input[name='JENIS_FILE_UPLOAD']:checked").val() == "Prototype" ) { //Jika radio button selain "Prototype" dipilih maka tampilkan file_info2
            			$("#file_info2").slideDown("fast"); //Efek Slide Down (Menampilkan file_info2)
        			} else {
            			$("#file_info2").slideUp("fast");  //Efek Slide Up (Menghilangkan file_info2)
        			}
     			});
     		});
			
			<!-- end js field File -->

			<!-- js field File -->
		
			$(document).ready(function(){
    		$("#prototype2").css("display","none"); //Menghilangkan prototype2 ketika pertama kali dijalankan
        		$(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
        			if ($("input[name='JENIS_FILE_UPLOAD']:checked").val() == "Prototype") { //Jika radio button selain "Prototype" dipilih maka tampilkan prototype2
            			$("#prototype2").slideDown("fast"); //Efek Slide Down (Menampilkan prototype2)
        			} else {
            			$("#prototype2").slideUp("fast");  //Efek Slide Up (Menghilangkan prototype2)
        			}
     			});
     		});
			
			<!-- end js field File -->
			
			<!-- js tombol Upload -->
			
			$(document).ready(function(){
    		$("#upload").css("display","none"); //Menghilangkan tombol upload ketika pertama kali dijalankan
        		$(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
        			if ($("input[name='JENIS_FILE_UPLOAD']:checked").val() == "Kajian" ) { //Jika radio button selain "Prototype" dipilih maka tampilkan file_info2
            			$("#upload").slideDown("fast"); //Efek Slide Down (Menampilkan file_info2)
        			} else {
            			$("#upload").slideUp("fast");  //Efek Slide Up (Menghilangkan file_info2)
        			}
        			if ($("input[name='JENIS_FILE_UPLOAD']:checked").val() == "Dokumen Standar" ) { //Jika radio button selain "Prototype" dipilih maka tampilkan file_info2
            			$("#upload3").slideDown("fast"); //Efek Slide Down (Menampilkan file_info2)
        			} else {
            			$("#upload3").slideUp("fast");  //Efek Slide Up (Menghilangkan file_info2)
        			}
					if ($("input[name='JENIS_FILE_UPLOAD']:checked").val() == "Prototype" ) { //Jika radio button selain "Prototype" dipilih maka tampilkan file_info2
            			$("#upload2").slideDown("fast"); //Efek Slide Down (Menampilkan file_info2)
        			} else {
            			$("#upload2").slideUp("fast");  //Efek Slide Up (Menghilangkan file_info2)
        			}
     			});
     		});

			<!-- end js tombol Upload -->

			
		</script>


	<title>Doc. Submission IRS</title>


		<link rel="stylesheet" type="text/css" href="../css/util.css">
		<link rel="stylesheet" type="text/css" href="../css/main_upload.css">


		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title" style="font-weight: bold; font-size: 40px; margin-top: 10px;">Doc. Submission IRS</h3>

						<div class="div-block-12">
	  
        <!-- section start -->
		<!-- ================ -->
		<div class="section clearfix object-non-visible" data-animation-effect="fadeIn">
			<div align="center" class="container">
				<div class="row">
					
				<div class="space"></div>

				<!-- Form Upload -->
			<div class="wrap-login100 p-l-100 p-r-100 p-t-10 p-b-10" style="background-color: #D3D3D3;">

				<form class="login100-form validate-form flex-sb flex-w" role="form" method="post" enctype="multipart/form-data" action="../act_upload_adminSubmission.php">

					<div class="p-t-10 p-b-9">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">P.I.C</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; font-size: 14px;" readonly="" type="text" name="USERNAME" id="USERNAME" value="<?php echo $_SESSION['username'];?>" required="">
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-10 p-b-9">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">Title of Review</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; font-size: 14px;" type="text" name="JUDUL_UPLOAD" id="JUDUL_UPLOAD" Placeholder="Title of Review" required="">
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-10 p-b-9" style="padding-top: 16px;">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">Type of Document</span>
					</div>
					<div class="wrap-input100 validate-input" style="height: 30px; font-size: 15px; padding-right: 170px; background-color: #D3D3D3; border-color: #D3D3D3;">
						<input type="radio" name="JENIS_FILE_UPLOAD" value="Kajian" class="detail" required=""> Kajian &nbsp; &nbsp; &nbsp;
						<input type="radio" name="JENIS_FILE_UPLOAD" value="Dokumen Standar" class="detail" required=""> Dokumen Standar
						&nbsp; &nbsp; &nbsp;
						<input type="radio" name="JENIS_FILE_UPLOAD" value="Prototype" class="detail" required=""> Prototype
						<span class="focus-input100"></span>
					</div>

					<div id="prototype2" style="display:none">
						<div class="wrap validate-input" style="padding-top: 16px;">
							<input style="height: 20px;" type="checkbox" name="UNGGULAN" value="Unggulan"> <span style="font-weight: bold;">Checklist if the featured product (prototype) </span>
						</div>
					</div>

					<div class="p-t-10 p-b-9" style="padding-top: 16px; margin-right: 150px;">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">Lab</span>
					</div>
					<div class="wrap-input100 validate-input">
						<select name="JENIS_LAB_UPLOAD" required="" class="input100" style="height: 30px; font-size: 14px; width: 458px; border-color: transparent;">
								<option value="">-- Choose the Lab --</option>
								<option value="IXC">IXC Lab</option>
								<option value="BAN">BAN Lab</option>
								<option value="BCN">BCN Lab</option>
								<option value="CNP">CNP Lab</option>
								<option value="FMC">FMC Lab</option>
								<option value="ISR">ISR Lab</option>
								<option value="SOB">SOB Lab</option>
							</select>
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-10 p-b-9" style="padding-top: 16px;">
						<span class="txt1" style="font-weight: bold; font-size: 14px;">Description of Document</span>
					</div>
					<div class="wrap-input100 validate-input">
						<textarea class="input100" style="height: 70px; font-size: 14px;" name="DESKRIPSI_UPLOAD" required=""></textarea>
						<span class="focus-input100"></span>
					</div>

				<div id="file_info" style="display:none; padding-top: 16px;" class="p-t-10 p-b-9">
					<span class="txt1" style="font-weight: bold; font-size: 14px; padding-right: 430px;">File</span>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; width: 460px; font-size: 14px; padding-top: 4px;" type="file" name="NAMA_FILE_UPLOAD" id="File">
						<span class="focus-input100"></span>
					</div>
				</div>

				<div id="file_info3" style="display:none; padding-top: 16px;" class="p-t-10 p-b-9">
					<span class="txt1" style="font-weight: bold; font-size: 14px; padding-right: 430px;">File</span>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; width: 460px; font-size: 14px; padding-top: 4px;" type="file" name="NAMA_FILE_UPLOAD" id="File">
						<span class="focus-input100"></span>
					</div>
				</div>

				<div id="file_info2" style="display:none; padding-top: 16px;" class="p-t-10 p-b-9">
					<span class="txt1" style="font-weight: bold; font-size: 14px; padding-right: 430px;">URL</span>
					<div class="wrap-input100 validate-input">
						<input class="input100" style="height: 30px; width: 450px; font-size: 14px;" type="text" name="URL" id="url" Placeholder="URL">
						<span class="focus-input100"></span>
					</div>
				</div>

					<div id="upload" style="display: none; padding-top: 10px; padding-bottom: 20px;" class="container-login100-form-btn m-t-17">
						<button class="btn btn-primary btn-lg btn-block" type="submit" value="Upload File" name="Submit" style="font-weight: bold; height: 40px;"> Upload File </button>
					</div>

					<div id="upload3" style="display: none; padding-top: 10px; padding-bottom: 20px;" class="container-login100-form-btn m-t-17">
						<button class="btn btn-primary btn-lg btn-block" type="submit" value="Upload File" name="Submit3" style="font-weight: bold; height: 40px;"> Upload File </button>
					</div>

					<div id="upload2" style="display: none; padding-top: 10px; padding-bottom: 20px;" class="container-login100-form-btn m-t-17">
						<button onclick = "Warn2();" class="btn btn-primary btn-lg btn-block" type="submit" value="Upload URL" name="Submit2" style="font-weight: bold; height: 40px;"> Upload URL </button>
					</div>

				</form>
			</div>
			<!-- End Form Upload -->

		</div>
	</div>
</div>
		<!-- section end -->
			
         
        </div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->


	<?php
		include "footer.php";
	?>



<script>
			
	function Warn2() {
        var URL=document.getElementById('url');
					
		if(URL.value=='') {
			alert ("Please fill the URL");
			return false;
		}
			return true;
        }
			
</script>