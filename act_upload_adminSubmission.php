<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

  include "koneksi_db.php";

    if(isset($_POST['Submit'])) {

    $allowed_ext  = array('pdf', ''); //untuk tipe file
    $file_name    = $_FILES['NAMA_FILE_UPLOAD']['name'];
    $file_ext     = strtolower(end(explode('.', $file_name)));
    //$file_ext   = pathinfo($_FILES['NAMA_FILE_UPLOAD']['name'],PATHINFO_EXTENSION);
    //$file_size    = $_FILES['NAMA_FILE_UPLOAD']['size'];
    $file_tmp     = $_FILES['NAMA_FILE_UPLOAD']['tmp_name'];
    //$max_size     = 5000000; //5 MB

      $username       = $_POST['USERNAME'];
      $judul          = $_POST['JUDUL_UPLOAD'];
      $jenis_file     = $_POST['JENIS_FILE_UPLOAD'];
      $jenis_lab      = $_POST['JENIS_LAB_UPLOAD'];
      $deskripsi      = $_POST['DESKRIPSI_UPLOAD'];

      if(in_array($file_ext, $allowed_ext) === true){
        //if($file_size < 1000000){
          $nama_file = $file_name;
            move_uploaded_file($file_tmp, 'uploads/'.$nama_file);

            $sql = "INSERT INTO upload_dtp (ID_UPLOAD, USERNAME, TGL_UPLOAD, JUDUL_UPLOAD, JENIS_FILE_UPLOAD, JENIS_LAB_UPLOAD, DESKRIPSI_UPLOAD, NAMA_FILE_UPLOAD) VALUES (null, '$username', NOW(), '$judul', '$jenis_file', '$jenis_lab', '$deskripsi', '$nama_file')";
            $query = mysqli_query($connect,$sql);     

            if($query) { ?>
              <script>
                alert('Add Successful');
                location.href='admin/review.php';
              </script>
            <?php } else { ?>
              <script>
                alert('Add Failed');
                location.href='admin/upload.php';
              </script>
            <?php } ?>
    
    <?php } ?>

  <?php }

  else if(isset($_POST['Submit3'])) {

    $allowed_ext  = array('pdf', ''); //untuk tipe file
    $file_name    = $_FILES['NAMA_FILE_UPLOAD']['name'];
    $file_ext     = strtolower(end(explode('.', $file_name)));
    //$file_ext   = pathinfo($_FILES['NAMA_FILE_UPLOAD']['name'],PATHINFO_EXTENSION);
    //$file_size    = $_FILES['NAMA_FILE_UPLOAD']['size'];
    $file_tmp     = $_FILES['NAMA_FILE_UPLOAD']['tmp_name'];
    //$max_size     = 5000000; //5 MB

      $username       = $_POST['USERNAME'];
      $judul          = $_POST['JUDUL_UPLOAD'];
      $jenis_file     = $_POST['JENIS_FILE_UPLOAD'];
      $jenis_lab      = $_POST['JENIS_LAB_UPLOAD'];
      $deskripsi      = $_POST['DESKRIPSI_UPLOAD'];

      if(in_array($file_ext, $allowed_ext) === true){
        //if($file_size < 1000000){
          $nama_file = $file_name;
            move_uploaded_file($file_tmp, 'uploads/'.$nama_file);

            $sql = "INSERT INTO upload_dtp (ID_UPLOAD, USERNAME, TGL_UPLOAD, JUDUL_UPLOAD, JENIS_FILE_UPLOAD, JENIS_LAB_UPLOAD, DESKRIPSI_UPLOAD, NAMA_FILE_UPLOAD) VALUES (null, '$username', NOW(), '$judul', '$jenis_file', '$jenis_lab', '$deskripsi', '$nama_file')";
            $query = mysqli_query($connect,$sql);     

            if($query) { ?>
              <script>
                alert('Add Successful');
                location.href='admin/standardization.php';
              </script>
            <?php } else { ?>
              <script>
                alert('Add Failed');
                location.href='admin/upload.php';
              </script>
            <?php } ?>
    
    <?php } ?>
    
  <?php }

  else if(isset($_POST['Submit2'])) {

    $username       = $_POST['USERNAME'];
    $judul          = $_POST['JUDUL_UPLOAD'];
    $jenis_file     = $_POST['JENIS_FILE_UPLOAD'];
    $unggulan       = $_POST['UNGGULAN'];
    $jenis_lab      = $_POST['JENIS_LAB_UPLOAD'];
    $deskripsi      = $_POST['DESKRIPSI_UPLOAD'];
    $url            = $_POST['URL'];

      if($url != '') {
        $sql2 = "INSERT INTO upload_dtp (ID_UPLOAD, USERNAME, TGL_UPLOAD, JUDUL_UPLOAD, JENIS_FILE_UPLOAD, UNGGULAN, JENIS_LAB_UPLOAD, DESKRIPSI_UPLOAD, URL) VALUES (null, '$username', NOW(), '$judul', '$jenis_file', '$unggulan', '$jenis_lab', '$deskripsi', '$url')";
        $query2 = mysqli_query($connect,$sql2);

            if($query2) { ?>
                <script>
                alert('Add Successful');
                location.href='admin/prototype.php';
              </script>
            <?php } else { ?>
                <script>
                alert('Add Failed');
                location.href='admin/upload.php';
              </script>
            <?php } ?>    

      <?php } else { ?>
          <script>
          alert('Add Failed');
          location.href='admin/upload.php';
        </script>       

      <?php } ?>

    <?php } ?>