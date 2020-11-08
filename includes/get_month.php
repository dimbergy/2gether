<?php

if ($u=='friend') {

    $mon = $conn->query("SELECT users.id AS userid, months.id, months.month AS mo FROM months INNER JOIN users ON months.id=users.month_id WHERE users.id='$id'");

} else if ($u=='user') {
    $mon = $conn->query("SELECT months.id, months.month AS mo FROM months INNER JOIN users ON months.id=users.month_id WHERE email='$email'");
}


if ($mon->num_rows > 0) {
    while ($row2 = $mon->fetch_assoc()) {
        echo $row2['mo'];
    }
}
?>
