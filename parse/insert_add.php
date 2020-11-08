<?php


$sql = $conn->query("SELECT id, email, day_id, month_id, year_id, sex, city_id, country_id FROM users WHERE email='$email'");

if ($sql->num_rows > 0) {
    while ($rowsql = $sql->fetch_assoc()) {

        $conn->query($sql1 = "INSERT INTO homeplace (user_id, city_id, country_id, homeplace_privacy, updated_at) VALUES (".$rowsql['id'].", ".$rowsql['city_id'].", ".$rowsql['country_id'].", 0, now())");

        $conn->query($sql2 = "INSERT INTO mailprivacy (user_id, email_privacy, updated_at) VALUES (".$rowsql['id'].", 0, now())");

        $conn->query($sql3 = "INSERT INTO bdayprivacy (user_id, day_id, bday_privacy, updated_at) VALUES (".$rowsql['id'].", ".$rowsql['day_id'].", 0, now())");

        $conn->query($sql4 = "INSERT INTO bmonthprivacy (user_id, month_id, bmonth_privacy, updated_at) VALUES (".$rowsql['id'].", ".$rowsql['month_id'].", 0, now())");

        $conn->query($sql5 = "INSERT INTO byearprivacy (user_id, year_id, byear_privacy, updated_at) VALUES (".$rowsql['id'].", ".$rowsql['year_id'].", 0, now())");

    }
} else {

    echo "0 results";
}




?>