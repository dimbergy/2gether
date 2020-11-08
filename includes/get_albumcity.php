<?php

if ($u=='user') {


    $city = $conn->query("SELECT city FROM cities INNER JOIN albums ON cities.id=album_city WHERE albums.id=" . $rowcover['id'] . " AND created_by=$frindex");

} else if ($u=='friend') {

    $city = $conn->query("SELECT city FROM cities INNER JOIN albums ON cities.id=album_city WHERE albums.id=" . $rowcover['id'] . " AND created_by=$id");

}


if ($city->num_rows > 0) {
    while ($rowcity = $city->fetch_assoc()) {

        echo $rowcity['city'];
        echo " ";

    }

     }

?>