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
		$reload = "review.php?pagination=true&keyword=$keyword";
		$sql = "SELECT ID_UPLOAD, TGL_UPLOAD, JUDUL_UPLOAD, JENIS_FILE_UPLOAD, JENIS_LAB_UPLOAD, DESKRIPSI_UPLOAD, NAMA_FILE_UPLOAD FROM upload_dtp WHERE JENIS_FILE_UPLOAD = 'Kajian' AND JENIS_LAB_UPLOAD LIKE '%$keyword%' || JENIS_FILE_UPLOAD LIKE '%$keyword%' || JUDUL_UPLOAD LIKE '%$keyword%' || DESKRIPSI_UPLOAD LIKE '%$keyword%' || NAMA_FILE_UPLOAD LIKE '%$keyword%' ORDER BY ID_UPLOAD ASC";
		$result = mysqli_query($connect, $sql);
	} else {
		//if search not found
		$reload = "review.php?pagination=true";
		$sql = "SELECT ID_UPLOAD, TGL_UPLOAD, JUDUL_UPLOAD, JENIS_FILE_UPLOAD, JENIS_LAB_UPLOAD, DESKRIPSI_UPLOAD, NAMA_FILE_UPLOAD FROM upload_dtp WHERE JENIS_FILE_UPLOAD = 'Kajian' ORDER BY ID_UPLOAD ASC";
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


	<title>List of Reviews IRS</title>

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title" style="font-weight: bold; font-size: 40px; margin-top: 10px;">List of Reviews IRS</h3>

					<div class="col-lg-1 text-right">
						<a href="submission.php" class="btn btn-primary glyphicon glyphicon-plus" style="height: 32px;"> Add </a>
					</div>

						<!-- Search -->
					<div class="col-lg-2 text-right">
                   		<!--muncul jika ada pencarian (tombol reset pencarian)-->
                    	<?php
							if($_REQUEST['keyword']<>""){
                    	?>
                        	<a class="btn btn-default" href="review.php" style="height: 32px; border-color: transparent; font-weight: bold;">Reset Search</a>
                    	<?php
                    		}
                    	?>
                	</div>

                	<div class= "nav navbar-nav navbar-right col-md-3">
                    	<form method="post" action="review.php">
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
												<td style="width: 70px;"><?php echo $data['JUDUL_UPLOAD']?></td>

											<!--menampilkan hanya tgl dari datetime-->
												<?php
													$tgl   = explode(' ', $data['TGL_UPLOAD']);
												?>
												<td style="width: 100px;"><?php echo $date = $tgl[0];?></td>
											<!--end-->

												<td><?php echo $data['JENIS_LAB_UPLOAD']?></td>
												<td style="width: 300px;"><?php echo $data['DESKRIPSI_UPLOAD']?></td>

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
								<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								    <div class="modal-dialog">
								        <div class="modal-content">
								            <div class="modal-header">
								                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								                <h4 class="modal-title" id="myModalLabel">Details of Manager P.I.C</h4>
								            </div>

								        <?php while($data_pic = mysqli_fetch_array($result_pic)) { //data di extract menggunakan "fetch array", kemudian ditampung di result menjadi data, setelah itu ditampilkan di tabel// ?>

								        
										<div class="modal-body">
										    <!-- display data in pop up -->

										    <?php if($data_pic['lab_pic'] == $data['LAB_MANAGER']) { ?>

										    <p>Nama     : <?php echo $data_pic['name_pic'];?></p>
										    <p>No. Telp : <?php echo $data_pic['phone'];?></p>
										    <p>Email    : <?php echo $data_pic['email'];?></p>	

										    <?php } ?>

								        </div>

								        <?php } ?>

								   		</div>
								    </div>
								</div>
								<!-- End Modal -->

									<?php } ?>
									<?php } ?>
											

							<td style="width: 30px;"> <a class="btn btn-primary" onclick="return konfirmasi2();" href="update.php?id=<?php echo $data['ID_UPLOAD'];?>" style="font-weight: bold;">Update</a>
		      					&nbsp;
			      				<a class="btn btn-primary" onclick="return konfirmasi();" href="../act_delete_adminReview.php?id=<?php echo $data['ID_UPLOAD'];?>" style="font-weight: bold;">Delete</a>
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