
<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "../koneksi_db.php";
	include "../header-pic.php";
	include "../pagination1.php";

	//mengatur variabel reload dan sql
	if(isset($_REQUEST['keyword2']) && $_REQUEST['keyword2']<>""){
		//if search found
		$keyword2 = $_REQUEST['keyword2'];
		$reload = "prototype.php?pagination=true&keyword2=$keyword2";
		$sql2 = "SELECT ID_UPLOAD, TGL_UPLOAD, JUDUL_UPLOAD, JENIS_FILE_UPLOAD, JENIS_LAB_UPLOAD, DESKRIPSI_UPLOAD, URL FROM upload_dtp WHERE JENIS_FILE_UPLOAD = 'Prototype' AND JENIS_LAB_UPLOAD LIKE '%$keyword2%' || JUDUL_UPLOAD LIKE '%$keyword2%' || DESKRIPSI_UPLOAD LIKE '%$keyword2%' || URL LIKE '%$keyword2%' ORDER BY ID_UPLOAD ASC";
		$result2 = mysqli_query($connect, $sql2);
	} else {
		//if search not found
		$reload = "prototype.php?pagination=true";
		$sql2 = "SELECT * FROM upload_dtp WHERE JENIS_FILE_UPLOAD = 'Prototype' ORDER BY ID_UPLOAD ASC";
		$result2 = mysqli_query($connect, $sql2);
	}


?>


		<title>List of Prototypes IRS</title>


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
								<a href="../index.php"><img id="logo" src="../images/DDS-telkom.png" width="60" alt=""></a>
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
											<ul class="nav navbar-nav navbar-left" style="padding-left: 90px;">
												<li><a href="../index.php" style="font-weight: bold;">Home</a></li>
												<li><a href="research-result.php" style="font-weight: bold;">Research Result</a></li>
												<li class="active"><a href="#prototype" style="font-weight: bold;;">Prototype</a></li>
												<li><a href="#contact" style="font-weight: bold;">Contact Us</a></li>
											</ul>

											<ul class="nav navbar-nav navbar-right">
												<!-- logo -->
												<div class="logo smooth-scroll">
													<a href="../index.php"><img id="logo" src="../images/logo-telkom.png" width="90" alt="Worthy"></a>
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
		<div class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="background-color: white;">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<h1 id="prototype" class="title text-center" style="font-weight: bold;">List of Prototypes IRS</h1>
						<div class="space"></div>

					<!-- Search -->
					<div class="col-lg-2 text-right">
                   		<!--muncul jika ada pencarian (tombol reset pencarian)-->
                    	<?php
							if($_REQUEST['keyword2']<>""){
                    	?>
                        	<a class="btn btn-default" href="prototype.php">Reset Search</a>
                    	<?php
                    		}
                    	?>
                	</div>

                	<div class= "nav navbar-nav navbar-right col-md-3">
                    	<form method="post" action="prototype.php">
                        	<div class="form-group input-group">
                            	<input style="width: 210px; height: 30px;" type="text" name="keyword2" class="form-control" placeholder="Search" value="<?php echo $_REQUEST['keyword2'];?>">
                            	<span class="form-group input-group-btn">
                                	<button style="height: 30px; padding-right: 30px; font-size: 12px;" class="btn-primary" type="submit">Search</button>
                            	</span>
                        	</div>
                    	</form>
                	</div>
                	<!-- End Search -->

	       		<?php 
	       			include "data-prototype.php";
	       		?>


          		</div>
			</div>
		</div>
		<!-- section end -->		


<?php
	include "../footer-user.php";
?>