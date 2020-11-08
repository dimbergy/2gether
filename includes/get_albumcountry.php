<?php

if ($u=='user') {
    $country = $conn->query("SELECT country, country_abr FROM countries INNER JOIN albums ON countries.id=album_country WHERE albums.id=".$rowcover['id']." AND created_by=$frindex");

} else if ($u == 'friend') {

    $country = $conn->query("SELECT country, country_abr FROM countries INNER JOIN albums ON countries.id=album_country WHERE albums.id=".$rowcover['id']." AND created_by=$id");
}


if ($country->num_rows > 0) {
    while ($rowcountry = $country->fetch_assoc()) {

        echo $rowcountry['country'];

    }

}

?>