<?php

if($u=='friend') {

    $bcity = $conn->query("SELECT cities.city AS cityname FROM cities INNER JOIN bcity ON cities.id=bcity.city_id INNER JOIN birthplace ON bcity.user_id=birthplace.user_id WHERE birthplace.user_id='.$id.' AND birthplace_privacy!=2");


} else if ($u=='user') {

    $bcity = $conn->query("SELECT cities.city AS cityname FROM cities INNER JOIN bcity ON cities.id=bcity.city_id INNER JOIN users ON users.id=bcity.user_id WHERE users.email='$email'");


}


if ($bcity->num_rows > 0) {
    while($rowcity = $bcity->fetch_assoc()) {

        echo $rowcity['cityname'];
        if ($rowcity['cityname']!="") echo ", ";
    }

}

?>

