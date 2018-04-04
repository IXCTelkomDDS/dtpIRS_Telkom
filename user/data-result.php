<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

session_start();


	$sql_pic = "SELECT name_pic, phone, email FROM user_pic WHERE user_type = 'Manager P.I.C' GROUP BY name_pic";
	$result_pic = mysqli_query($connect, $sql_pic);


//$_SESSION['lab_pic'] = $data['lab_pic'];

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


        <table class="table table-bordered">

			<tr style="background-color: #C0C0C0; font-weight: bold;">
				<td>NO.</td>
				<td>TITLE</td>
				<td>UPLOAD DATE</td>
				<td>DOCUMENT TYPE</td>
				<td>LAB</td>
				<td>DESCRIPTION</td>
				<td>FILE</td>
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


			</tr>

		<?php 
			$i++;
			$count++;
    		}
		?>

					
		</table>

				</div>

					<div align="center"><?php echo paginate_one($reload, $page, $tpages);?></div>



<!-- pop up details -->
<script type="text/javascript">
    function showDetails(button) {
        $.ajax({
            success: function(response) {
            }
        });
    }
</script>