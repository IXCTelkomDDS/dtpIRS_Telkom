<?php

    include "koneksi_db.php";

    //read the json file contents
    $url = 'https://dds.telkom.co.id/wp-json/wp/v2/posts?author=22';

    $content = file_get_contents($url);
    $json = json_decode($content, true);

    foreach ($json as $key => $arr) {
        // Iterate through for loop
        for ($i = 0; $i < count($json); $i++) {
            // If all is well, perform the query
            $date[$key][$i] = $json[$i]['date'];
            $title[$key][$i] = $json[$i]['title']['rendered'];
            $link[$key][$i] = $json[$i]['link'];

            $cekdata = "SELECT judul_news FROM news WHERE judul_news = '".$json[$i]['title']['rendered']."'";
            $ada = mysqli_query($connect, $cekdata) or die(mysqli_error());
                
        }
    }

?>



