<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "../header-admin.php";
	include "../koneksi_db.php";
	include "../check_session_admin.php";
	include "../pagination1.php";

	//mengatur variabel reload dan sql
	if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
		//if search found
		$keyword = $_REQUEST['keyword'];
		$reload = "log_user.php?pagination=true&keyword=$keyword";
		$sql = "SELECT lu.tgl_ruh, lu.kd_ruh, lu.com_ruh, lu.name, up.user_type FROM log_user_pic lu JOIN user_pic up ON (lu.name = up.username) WHERE lu.tgl_ruh LIKE '%$keyword%' || lu.kd_ruh LIKE '%$keyword%' || lu.com_ruh LIKE '%$keyword%' || lu.name LIKE '%$keyword%' || up.user_type LIKE '%$keyword%' ORDER BY tgl_ruh ASC";
		$result = mysqli_query($connect, $sql);
	} else {
		//if search not found
		$reload = "log_user.php?pagination=true";
		$sql = "SELECT lu.tgl_ruh, lu.kd_ruh, lu.com_ruh, lu.name, up.user_type FROM log_user_pic lu JOIN user_pic up ON (lu.name = up.username) ORDER BY tgl_ruh ASC";
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


	<title>Log Activity User IRS</title>

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title" style="font-weight: bold; font-size: 40px; margin-top: 10px;">Log Activity Users IRS</h3>

						<!-- Search -->
					<div class="col-lg-2 text-right">
                   		<!--muncul jika ada pencarian (tombol reset pencarian)-->
                    	<?php
							if($_REQUEST['keyword']<>""){
                    	?>
                        	<a class="btn btn-default" href="log-admin.php" style="height: 32px; border-color: transparent; font-weight: bold;">Reset Search</a>
                    	<?php
                    		}
                    	?>
                	</div>

                	<div class= "nav navbar-nav navbar-right col-md-3">
                    	<form method="post" action="log-admin.php">
                        	<div class="form-group input-group">
                            	<input style="width: 200px; height: 30px;" type="text" name="keyword" class="form-control" placeholder="Search" value="<?php echo $_REQUEST['keyword'];?>">
                            	<span class="form-group input-group-btn">
                                	<button style="height: 30px; width: 65px; font-size: 12px;" class="button btn-primary" type="submit">Search</button>
                            	</span>
                        	</div>
                    	</form>
                	</div>
                	<!-- End Search -->

					<div class="row">
						<div class="col-md-12">
							<!-- BORDERED TABLE -->
							<div class="panel">
								<div class="panel-body" style="margin-top: 20px;">
									<table class="table table-bordered">
										<thead style="font-size: 18px;">
											<tr>
												<th>No.</th>
												<th>Log Date</th>
												<th>Log Activity</th>
												<th>Log Place</th>
												<th>Username</th>
												<th>Usertype</th>
											</tr>
										</thead>

							<?php while($data = mysqli_fetch_array($result)) { ?>

										<tbody style="font-size: 16px;">
											<tr>
												<td><?php echo ++$no_urut;?></td>
												<td><?php echo $data['tgl_ruh']?></td>
												<td><?php echo $data['kd_ruh']?></td>
												<td><?php echo $data['com_ruh']?></td>
												<td><?php echo $data['name']?></td>
												<td><?php echo $data['user_type']?></td>
											</tr>
										</tbody>

							<?php } ?>

									</table>

									<div align="center"><?php echo paginate_one($reload, $page, $tpages);?></div>

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