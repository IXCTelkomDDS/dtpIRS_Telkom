<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "../header-admin.php";
	include "../koneksi_db.php";
	include "../pagination1.php";
	include "../check_session_admin.php";

	$reload = "manager-pic.php?pagination=true";
	$sql = "SELECT * FROM user_pic WHERE user_type = 'Admin DTP' ORDER BY id_pic ASC";
	$result = mysqli_query($connect, $sql);

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


	<title>Admin DTP</title>

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title" style="font-weight: bold; font-size: 40px; margin-top: 10px;">ADMIN DTP</h3>

						<a href="signup-admin.php" class="btn btn-primary glyphicon glyphicon-plus" style="font-size: 18px; margin-top: 20px;"> Add	</a>

						<form class="navbar-form navbar-right">
							<div class="input-group">
								<input type="text" value="" class="form-control" placeholder="Search">
								<span class="input-group-btn"><button type="button" class="btn btn-primary">Search</button></span>
							</div>
						</form>

					<div class="row">
						<div class="col-md-12">
							<!-- BORDERED TABLE -->
							<div class="panel">
								<div class="panel-body" style="margin-top: 20px;">
									<table class="table table-bordered">
										<thead style="font-size: 18px; margin: auto;">
											<tr>
												<th>No.</th>
												<th>Username</th>
												<th>Name</th>
												<th>Phone</th>
												<th>Email</th>
												<th>Action</th>
											</tr>
										</thead>

							<?php while(($count<$rpp) && ($i<$tcount)){
							  mysqli_data_seek($result,$i);
							  $data = mysqli_fetch_array($result); ?>

										<tbody style="font-size: 16px;">
											<tr>
												<td><?php echo ++$no_urut;?></td>
												<td><?php echo $data['username']?></td>
												<td><?php echo $data['name_pic']?></td>
												<td><?php echo $data['phone']?></td>
												<td><?php echo $data['email']?></td>
												<td> <a class="btn btn-primary" onclick="return konfirmasi2();" href="update_admin.php?id=<?php echo $data['id_pic'];?>" style="font-weight: bold;">Update</a>
								      					&nbsp;
								      				<a class="btn btn-primary" onclick="return konfirmasi();" href="act_delete_user.php?id=<?php echo $data['id_pic'];?>" style="font-weight: bold;">Delete</a>
								    			</td>
											</tr>

										</tbody>

							<?php 
								$i++;
								$count++;
						    	}
							?>

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



<script type="text/javascript">
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