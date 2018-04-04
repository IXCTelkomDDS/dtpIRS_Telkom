<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "../header-admin.php";
	include "../koneksi_db.php";
	include "../pagination1.php";
	include "../check_session_admin.php";

	//mengatur variabel reload dan sql
	if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
		//if search found
		$keyword = $_REQUEST['keyword'];
		$reload = "prototype.php?pagination=true&keyword=$keyword";
		$sql = "SELECT ID_UPLOAD, TGL_UPLOAD, JUDUL_UPLOAD, JENIS_FILE_UPLOAD, UNGGULAN, JENIS_LAB_UPLOAD, DESKRIPSI_UPLOAD, URL FROM upload_dtp WHERE JENIS_FILE_UPLOAD = 'Prototype' AND JENIS_LAB_UPLOAD LIKE '%$keyword%' || JENIS_FILE_UPLOAD LIKE '%$keyword%' || JUDUL_UPLOAD LIKE '%$keyword%' || UNGGULAN LIKE '%$keyword%' || DESKRIPSI_UPLOAD LIKE '%$keyword%' || URL LIKE '%$keyword%' ORDER BY ID_UPLOAD ASC";
		$result = mysqli_query($connect, $sql);
	} else {
		//if search not found
		$reload = "prototype.php?pagination=true";
		$sql = "SELECT ID_UPLOAD, TGL_UPLOAD, JUDUL_UPLOAD, JENIS_FILE_UPLOAD, UNGGULAN, JENIS_LAB_UPLOAD, DESKRIPSI_UPLOAD, URL FROM upload_dtp WHERE JENIS_FILE_UPLOAD = 'Prototype' ORDER BY ID_UPLOAD ASC";
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


	<title>List of Prototype IRS</title>

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title" style="font-weight: bold; font-size: 40px; margin-top: 10px;">List of Prototype IRS</h3>

					<div class="col-lg-1 text-right">
						<a href="submission.php" class="btn btn-primary glyphicon glyphicon-plus" style="height: 32px;"> Add </a>
					</div>

						<!-- Search -->
					<div class="col-lg-2 text-right">
                   		<!--muncul jika ada pencarian (tombol reset pencarian)-->
                    	<?php
							if($_REQUEST['keyword']<>""){
                    	?>
                        	<a class="btn btn-default" href="prototype.php" style="height: 32px; border-color: transparent; font-weight: bold;">Reset Search</a>
                    	<?php
                    		}
                    	?>
                	</div>

                	<div class= "nav navbar-nav navbar-right col-md-3">
                    	<form method="post" action="prototype.php">
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
												<th>Title</th>
												<th>Upload Date</th>
												<th>Lab</th>
												<th>Description</th>
												<th>File</th>
												<th>Action</th>
											</tr>
										</thead>

							<?php while(($count<$rpp) && ($i<$tcount)){
							  mysqli_data_seek($result,$i);
							  $data = mysqli_fetch_array($result); ?>

										<tbody style="font-size: 16px;">
											<tr>
												<td><?php echo ++$no_urut;?></td>

												<?php if ($data['UNGGULAN'] == 'Unggulan') { ?>

												<td><?php echo $data['JUDUL_UPLOAD']?> (<?php echo $data['UNGGULAN']?>) </td>

												<?php } else if ($data['UNGGULAN'] != 'Unggulan') { ?>

												<td><?php echo $data['JUDUL_UPLOAD']?></td>

												<?php } ?>

											<!--menampilkan hanya tgl dari datetime-->
												<?php
													$tgl   = explode(' ', $data['TGL_UPLOAD']);
												?>
												<td style="width: 100px;"><?php echo $date = $tgl[0];?></td>
											<!--end-->

												<td><?php echo $data['JENIS_LAB_UPLOAD']?></td>
												<td><?php echo $data['DESKRIPSI_UPLOAD']?></td>
												<td><div align="center"><?php echo '<a target="_blank" class="link-4" href = " '.$data['URL'].'">'.$data['URL'].'<a>';?></td>

							<td> <a class="btn btn-primary" onclick="return konfirmasi2();" href="update.php?id=<?php echo $data['ID_UPLOAD'];?>" style="font-weight: bold;">Update</a>
		      					&nbsp;
			      				<a class="btn btn-primary" onclick="return konfirmasi();" href="../act_delete_adminPrototype.php?id=<?php echo $data['ID_UPLOAD'];?>" style="font-weight: bold;">Delete</a>
			    			</td>

					    	<!-- End Action-->


											</tr>


								<?php 
									$i++;
									$count++;
						    		}
								?>

										</tbody>

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



<!-- pop up details -->
<script type="text/javascript">
    function showDetails(button) {
        $.ajax({
            success: function(response) {
            }
        });
    }

 	function konfirmasi() {
 		tanya = confirm("Are you sure to delete the data?");
 			if (tanya == true) return true;
 			else return false;
 	}

 	function konfirmasi2() {
 		tanya2 = confirm("Are you sure to update the data?");
 			if (tanya2 == true) return true;
 			else return false;
 	}
</script>