<?php

if($u=='friend') {


    $bcountry = $conn->query("SELECT countries.country AS countryname FROM countries INNER JOIN bcountry ON countries.id=bcountry.country_id INNER JOIN birthplace ON bcountry.user_id=birthplace.user_id WHERE birthplace.user_id='.$id.' AND birthplace_privacy!=2");

} else if ($u=='user') {


    $bcountry = $conn->query("SELECT countries.country AS countryname FROM countries INNER JOIN bcountry ON countries.id=bcountry.country_id INNER JOIN users ON users.id=bcountry.user_id WHERE users.email='$email'");

}


if ($bcountry->num_rows > 0) {
    while($rowcountry = $bcountry->fetch_assoc()) {

        echo $rowcountry['countryname'];
    }

}
?>

