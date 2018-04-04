<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

include "koneksi_db.php";

   if($_GET) {
     $query2 = "DELETE FROM upload_dtp WHERE ID_UPLOAD = '$_GET[id]'";
     $delete2 = mysqli_query($connect, $query2);

        if($delete2) { ?>
            <script>
                alert('Delete Successful');
                location.href='admin/standardization.php';
            </script>
        <?php } else { ?>
            <script>
                alert('Delete Failed');
                location.href='admin/standardization.php';
            </script>
        <?php } ?>

    <?php } ?>