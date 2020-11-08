<?php

if($u=='friend') {

    $coun = $conn->query("SELECT users.id AS userid, countries.id, country FROM countries INNER JOIN users ON countries.id=users.country_id WHERE users.id=".$id);

} else if($u=='user') {

    $coun = $conn->query("SELECT countries.id, country FROM countries INNER JOIN users ON countries.id=users.country_id WHERE email='$email'");

}


if ($coun->num_rows > 0) {
    while ($row5 = $coun->fetch_assoc()) {
        echo $row5['country'];
        }
}
?>
