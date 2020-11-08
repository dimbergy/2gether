<?php



    $pho = $conn->query("SELECT user_id, phone_number FROM phones INNER JOIN users ON users.id=user_id WHERE users.email='$email'");

if ($pho->num_rows > 0) {
    while($rowpho = $pho->fetch_assoc()) {

        echo $rowpho['phone_number'] ;
    }
} else {

        echo "Κινητό τηλέφωνο";
}

?>