<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	include "../header-admin.php";
	include "../koneksi_db.php";
	include "../check_session_admin.php";

	$no = 1;
	$sql = "SELECT * FROM user_pic WHERE user_type = 'Manager P.I.C' ORDER BY id_pic ASC";
	$result = mysqli_query($connect, $sql);

?>


	<title>Manager P.I.C</title>

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title" style="font-weight: bold; font-size: 40px; margin-top: 10px;">MANAGER P.I.C</h3>

						<a href="signup.php" class="btn btn-primary glyphicon glyphicon-plus" style="font-size: 18px; margin-top: 20px;"> Add </a>

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
										<thead style="font-size: 18px;">
											<tr>
												<th>No.</th>
												<th>Username</th>
												<th>Name</th>
												<th>Phone</th>
												<th>Email</th>
												<th>Lab P.I.C</th>
												<th>Action</th>
											</tr>
										</thead>

							<?php while($data = mysqli_fetch_array($result)) { ?>

										<tbody style="font-size: 16px;">
											<tr>
												<td><?php echo $no++;?></td>
												<td><?php echo $data['username']?></td>
												<td><?php echo $data['name_pic']?></td>
												<td><?php echo $data['phone']?></td>
												<td><?php echo $data['email']?></td>
												<td><?php echo $data['lab_pic']?></td>
												<td> <a class="btn btn-primary" onclick="return konfirmasi2();" href="update_user.php?id=<?php echo $data['id_pic'];?>" style="font-weight: bold;">Update</a>
								      					&nbsp;
								      				<a class="btn btn-primary" onclick="return konfirmasi();" href="act_delete_user.php?id=<?php echo $data['id_pic'];?>" style="font-weight: bold;">Delete</a>
								    			</td>

					    	<!-- End Action-->


											</tr>
										</tbody>

							<?php } ?>

									</table>
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