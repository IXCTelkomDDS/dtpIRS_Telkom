<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "../koneksi_db.php";
	include "../header-pic.php";
	include "../pagination1.php";


	$sql_pic = "SELECT name_pic, phone, email FROM user_pic WHERE user_type = 'Manager P.I.C' GROUP BY name_pic";
	$result_pic = mysqli_query($connect, $sql_pic);


	//mengatur variabel reload dan sql
	if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
		//if search found
		$keyword = $_REQUEST['keyword'];
		$reload = "search.php?pagination=true&keyword=$keyword";
		$sql = "SELECT ID_UPLOAD, TGL_UPLOAD, JUDUL_UPLOAD, JENIS_FILE_UPLOAD, JENIS_LAB_UPLOAD, DESKRIPSI_UPLOAD, NAMA_FILE_UPLOAD, URL FROM upload_dtp WHERE JENIS_LAB_UPLOAD LIKE '%$keyword%' || JENIS_FILE_UPLOAD LIKE '%$keyword%' || JUDUL_UPLOAD LIKE '%$keyword%' || DESKRIPSI_UPLOAD LIKE '%$keyword%' || NAMA_FILE_UPLOAD LIKE '%$keyword%' || URL LIKE '%$keyword%' ORDER BY ID_UPLOAD ASC";
		$result = mysqli_query($connect, $sql);
	} else {
		//if search not found
		$reload = "search.php?pagination=true";
		$sql = "SELECT ID_UPLOAD, TGL_UPLOAD, JUDUL_UPLOAD, JENIS_FILE_UPLOAD, JENIS_LAB_UPLOAD, DESKRIPSI_UPLOAD, NAMA_FILE_UPLOAD, URL FROM upload_dtp ORDER BY ID_UPLOAD ASC";
		$result = mysqli_query($connect, $sql);
	}


	//pagination config start
	  $rpp = 5; //jml record per halaman
	  $page = isset($_GET["page"]) ? (intval($_GET["page"])) : 1;
	  $tcount = mysqli_num_rows($result);
	  $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; //total page, last page number
	  $count = 0;
	  $i = ($page-1)*$rpp;
	  $no_urut = ($page-1)*$rpp;
	  //pagination config end

?>


		<title>List of All Documents IRS</title>


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
											<ul class="nav navbar-nav navbar-left" style="padding-left: 70px;">
												<li><a href="../index.php" style="font-weight: bold;">Home</a></li>
												<li><a href="#document" style="font-weight: bold; padding-left: 100px;">All Documents</a></li>
												<li><a href="#contact" style="font-weight: bold; padding-left: 100px;">Contact Us</a></li>
											</ul>

											<ul class="nav navbar-nav navbar-right">
												<!-- logo -->
												<div class="logo smooth-scroll">
													<a href="../index.php"><img id="logo" src="../images/logo-telkom.png" width="90" alt=""></a>
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
						<h1 id="result" class="title text-center" style="font-weight: bold;">List of All Documents IRS</h1>
						<div class="space"></div>

					<!-- Search -->
					<div class="col-lg-2 text-right">
                   		<!--muncul jika ada pencarian (tombol reset pencarian)-->
                    	<?php
							if($_REQUEST['keyword']<>""){
                    	?>
                        	<a class="btn btn-default" href="search.php">Reset Search</a>
                    	<?php
                    		}
                    	?>
                	</div>

                	<div class= "nav navbar-nav navbar-right col-md-3">
                    	<form method="post" action="search.php">
                        	<div class="form-group input-group">
                            	<input style="width: 210px; height: 30px;" type="text" name="keyword" class="form-control" placeholder="Search" value="<?php echo $_REQUEST['keyword'];?>">
                            	<span class="form-group input-group-btn">
                                	<button style="height: 30px; padding-right: 30px; font-size: 12px;" class="btn-primary" type="submit">Search</button>
                            	</span>
                        	</div>
                    	</form>
                	</div>
                	<!-- End Search -->

                	<table class="table table-bordered">

			<tr style="background-color: #C0C0C0; font-weight: bold;">
				<td>NO.</td>
				<td>TITLE</td>
				<td>UPLOAD DATE</td>
				<td>DOCUMENT TYPE</td>
				<td>LAB</td>
				<td>DESCRIPTION</td>
				<td>FILE / URL</td>
			</tr>

			<?php while(($count<$rpp) && ($i<$tcount)){
			  mysqli_data_seek($result,$i);
			  $data = mysqli_fetch_array($result); //data di extract menggunakan "fetch array", kemudian ditampung di result menjadi data, setelah itu ditampilkan di tabel// ?>

			<tr>
				<td><?php echo ++$no_urut;?></td>
				<td style="width: 200px;"><?php echo $data['JUDUL_UPLOAD'];?></td>

				<!--menampilkan hanya tgl dari datetime-->
					<?php
						$tgl   = explode(' ', $data['TGL_UPLOAD']);
					?>
				<td style="width: 100px;"><?php echo $date = ($tgl[0]);?></td>
				<!--end-->

				<td><?php echo $data['JENIS_FILE_UPLOAD'];?></td>
				<td><?php echo $data['JENIS_LAB_UPLOAD'];?></td>
				<td><?php echo $data['DESKRIPSI_UPLOAD'];?></td>

				<?php if($data['JENIS_FILE_UPLOAD'] != 'Prototype') { ?>

			<?php
	  			$dir = "../uploads/"; // Directory where files are stored
					if ($dir_list = opendir($dir)) {
						while($file = readdir($dir_list)) {
						}
       					// if($data['STATUS_FILE_UPLOAD'] == 'Public') {
          			        if($file!='.' && $file!='..' && $data['NAMA_FILE_UPLOAD']<>""){ ?>
								<td><?php echo '<a style="font-weight: bold;" href = " '.$dir.''.$data['NAMA_FILE_UPLOAD'].'">'.$data['NAMA_FILE_UPLOAD'].'<a>'?></td>

							<?php } else { ?>
						
						<!-- displaying detail button -->
            					<td>
                		<!-- setting id upload and attaching on click listener -->
                					<div align="center"><button class="btn btn-default" data-toggle="modal" data-target="#myModal" style="color: blue; font-weight: bold; border-color: transparent;" onclick="showDetails(this);">Details</button></div>
            					</td>

		<!-- displaying pop up that will show details -->
		<!-- modal -->
		<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="font-size: 15px;">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title" id="myModalLabel">Details of Manager P.I.C</h4>
		            </div>

		        <?php while($data_pic = mysqli_fetch_array($result_pic)) { //data di extract menggunakan "fetch array", kemudian ditampung di result menjadi data, setelah itu ditampilkan di tabel// ?>

		        
				<div class="modal-body" style="height: 85px;">
				    <!-- display data in pop up -->

				    <?php if(($data['lab_pic'] == $data_pic['lab_pic'])) { ?>

				    <p>Name : <?php echo $data_pic['name_pic'];?></p>
				    <p>Phone : <?php echo $data_pic['phone'];?> &amp; Email : <?php echo $data_pic['email'];?></p>	

				    <?php } ?>

		        </div>

		        <?php } ?>

		   		</div>
		    </div>
		</div>
		<!-- End Modal -->

			<?php } ?>
			<?php } ?>

			<?php } else { ?>

			<td><?php echo '<a target="_blank" class="link-4" style="font-weight: bold;" href = " '.$data['URL'].'">'.$data['URL'].'<a>';?></td>

			<?php } ?>


			</tr>

		<?php 
			$i++;
			$count++;
    		}
		?>

					
		</table>

				</div>

					<div align="center"><?php echo paginate_one($reload, $page, $tpages);?></div>


          		</div>
			</div>
		</div>
		<!-- section end -->		


<?php
	include "../footer-user.php";
?>


<!-- pop up details -->
<script type="text/javascript">
    function showDetails(button) {
        $.ajax({
            success: function(response) {
            }
        });
    }
</script>