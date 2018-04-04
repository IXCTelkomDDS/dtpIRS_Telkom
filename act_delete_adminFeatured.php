<?php error_reporting(0) // tambahkan untuk menghilangkan notice ?>

<?php

include "koneksi_db.php";

   if($_GET) {
     $query4 = "DELETE FROM upload_dtp WHERE ID_UPLOAD = '$_GET[id]'";
     $delete4 = mysqli_query($connect, $query4);

        if($delete4) { ?>
            <script>
                alert('Delete Successful');
                location.href='admin/faetured.php';
            </script>
        <?php } else { ?>
            <script>
                alert('Delete Failed');
                location.href='admin/featured.php';
            </script>
        <?php } ?>

    <?php } ?>