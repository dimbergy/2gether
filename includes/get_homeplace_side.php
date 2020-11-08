<?php

$adm = $conn->query("SELECT id FROM users WHERE email='$email'");
if($adm->num_rows > 0) {
    while ($rowadm = $adm->fetch_assoc()){
        $admin = $rowadm['id'];
    }
}

if($u=='friend') {

    $homepr = $conn->query("SELECT homeplace_privacy FROM homeplace WHERE user_id=$id AND homeplace_privacy!=2");
    if($homepr->num_rows > 0) {
    while ($rowhome = $homepr->fetch_assoc()){
        $home_privacy = $rowhome['homeplace_privacy'];
    }
    }

    $cit = $conn->query("SELECT cities.id, city FROM cities INNER JOIN users ON cities.id=users.city_id WHERE users.id=".$id);
    if ($cit->num_rows > 0) {
        while ($row4 = $cit->fetch_assoc()) {
     $city = $row4['city'];

        }
    }

    $coun = $conn->query("SELECT countries.id, country FROM countries INNER JOIN users ON countries.id=users.country_id WHERE users.id=".$id);
    if ($coun->num_rows > 0) {
        while ($row5 = $coun->fetch_assoc()) {
            $country = $row5['country'];
        }
    }


    if($home_privacy==0){ ?>

        <li><i class="fa fa-map-marker"></i><?php echo $city ?>, <?php echo $country ?></li>

    <?php } else {

        if($status==1){ ?>

            <li><i class="fa fa-map-marker"></i></li>

        <?php }
    }

  } else if ($u=='user') {

    $cit = $conn->query("SELECT cities.id, city FROM cities INNER JOIN users ON cities.id=users.city_id WHERE users.id=".$admin);
    if ($cit->num_rows > 0) {
        while ($row4 = $cit->fetch_assoc()) {
            $city = $row4['city'];

        }
    }

    $coun = $conn->query("SELECT countries.id, country FROM countries INNER JOIN users ON countries.id=users.country_id WHERE users.id=".$admin);
    if ($coun->num_rows > 0) {
        while ($row5 = $coun->fetch_assoc()) {
            $country = $row5['country'];
        }
    } ?>

    <li><i class="fa fa-map-marker"></i><?php echo $city ?>, <?php echo $country ?></li>


<?php }

?>