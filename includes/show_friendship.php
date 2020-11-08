<?php


$a = "SELECT status FROM relationship WHERE user1_id='".$email."' AND user2_id='".$id."''";

$b = mysqli_query($conn, $a);



if ($b===TRUE)  {

    while ($c = mysqli_fetch_assoc($b)) {

        echo "<p>".$c['status']."</p>";

    }
} else {

    echo "Fail";
}



?>
