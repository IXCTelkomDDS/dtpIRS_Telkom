<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "../koneksi_db.php";
	include "../header-pic.php";
	include "../pagination1.php";

	$reload = "bcn-review.php?pagination=true";
	$sql = "SELECT * FROM upload_dtp WHERE JENIS_FILE_UPLOAD = 'Kajian' AND JENIS_LAB_UPLOAD = 'BCN' ORDER BY ID_UPLOAD ASC";
	$result = mysqli_query($connect, $sql);

?>


		<title>List of Reviews BCN</title>


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
											<ul class="nav navbar-nav navbar-left">
												<li><a href="../index.php" style="font-weight: bold;">Home</a></li>
												<li><a href="#review" style="font-weight: bold;">Reviews</a></li>
												<li><a href="bcn-standardization.php" style="font-weight: bold;">Doc. Standardization</a></li>
												<li><a href="bcn-featured.php" style="font-weight: bold;">Featured Products</a></li>
												<li><a href="#contact" style="font-weight: bold;">Contact Us</a></li>
											</ul>

											<ul class="nav navbar-nav navbar-right">
												<!-- logo -->
												<div class="logo smooth-scroll">
													<a href="../index.php"><img id="logo" src="../images/logo-telkom.png" width="90" alt=""></a>
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
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<h1 id="review" class="title text-center" style="font-weight: bold;">List of Reviews BCN</h1>
						<div class="space"></div>

                	<?php
            			include "data-result.php";
            		?>


          		</div>
			</div>
		</div>
		<!-- section end -->		


<?php
	include "../footer-user.php";
?>