<?php

    include "koneksi_db.php";

    //read the json file contents
  	$url = 'https://dds.telkom.co.id/wp-json/wp/v2/posts?author=22';

    $content = file_get_contents($url);
    $json = json_decode($content, true);

    $data_arr = $data['data'];

    foreach ($data_arr as $key => $arr) {
        // Iterate through for loop
        for ($i = 0; $i < count($data_arr); $i++) {
            // If all is well, perform the query
            $date[$key][$i] = $data_arr[$i]['date'];
            $title[$key][$i] = $data_arr[$i]['title'];
            $link[$key][$i] = $data_arr[$i]['link'];

            $cekdata = "SELECT judul_news FROM news where judul_news = '$data_arr[$i]['title']'";
            $ada = mysqli_query($cekdata) or die(mysqli_error());
                if(mysqli_num_rows($ada) > 0) { 
                    echo "<h3>This data already exists!</h3>"; 
                } else {
                    $sql[$key][$i] = "INSERT INTO news (id_news, tgl_news, judul_news, link) VALUES (NULL, '{$date[$key][$i]}', '{$title[$key][$i]}', '{$link[$key][$i]}')";

                    //insert into mysql table
                    $query[$key][$i] = mysqli_query($connect, $sql[$key][$i]);
                }
        }
    }

?>



