
<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

	session_start();

	//$_SESSION['lab_pic'] = $data['lab_pic'];

    //pagination config start
	  $rpp = 5; //jml record per halaman
	  $page = isset($_GET["page"]) ? (intval($_GET["page"])) : 1;
	  $tcount = mysqli_num_rows($result2);
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
				<td>URL</td>
			</tr>

			<?php while(($count<$rpp) && ($i<$tcount)){
			  mysqli_data_seek($result2,$i);
			  $data = mysqli_fetch_array($result2); //data di extract menggunakan "fetch array", kemudian ditampung di result menjadi data, setelah itu ditampilkan di tabel// ?>

			<tr>
				<td><?php echo ++$no_urut;?></td>
				<td style="width: 100px;"><?php echo $data['JUDUL_UPLOAD'];?></td>

				<!--menampilkan hanya tgl dari datetime-->
					<?php
						$tgl   = explode(' ', $data['TGL_UPLOAD']);
					?>
				<td style="width: 100px;"><?php echo $date = $tgl[0];?></td>
				<!--end-->

				<td><?php echo $data['JENIS_FILE_UPLOAD'];?></td>
				<td><?php echo $data['JENIS_LAB_UPLOAD'];?></td>
				<td><?php echo $data['DESKRIPSI_UPLOAD'];?></td>
				<td><?php echo '<a target="_blank" class="link-4" style="font-weight: bold;" href = " '.$data['URL'].'">'.$data['URL'].'<a>';?></td>


			</tr>

		<?php 
			$i++;
			$count++;
    		}
		?>

					
		</table>

				</div>

					<div align="center"><?php echo paginate_one($reload, $page, $tpages);?></div>
