<?php

if($u=='friend') {

    $hplace = $conn->query("SELECT cities.city AS cityname, countries.country AS countryname FROM cities INNER JOIN users ON cities.id=users.city_id INNER JOIN countries ON countries.id=users.country_id INNER JOIN homeplace ON homeplace.user_id=users.id WHERE users.id='$id' AND homeplace_privacy!=2");

} else if ($u=='user') {

    $hplace = $conn->query("SELECT cities.city AS cityname, countries.country AS countryname FROM cities INNER JOIN users ON cities.id=users.city_id INNER JOIN countries ON countries.id=users.country_id INNER JOIN homeplace ON homeplace.user_id=users.id WHERE users.email='$email'");

}


if ($hplace->num_rows > 0) {
    while($rowhplace = $hplace->fetch_assoc()) {

        echo $rowhplace['cityname']. ", ".$rowhplace['countryname'];
    }
}

?>

