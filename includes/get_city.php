<?php

if($u=='friend') {

    $cit = $conn->query("SELECT cities.id, city FROM cities INNER JOIN users ON cities.id=users.city_id WHERE users.id=".$id);

} else if ($u=='user') {

    $cit = $conn->query("SELECT cities.id, city FROM cities INNER JOIN users ON cities.id=users.city_id WHERE email='$email'");

}


if ($cit->num_rows > 0) {
    while($row4 = $cit->fetch_assoc()) {

 echo $row4['city'];
}
    }

 ?>

