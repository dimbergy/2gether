<?php
require('../includes/db_connect.php');
session_start();
// If form submitted, insert values into the database.

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $query = $conn->query("SELECT id, first_name, last_name, avatar, sex, day_id, email FROM users WHERE email='$email'");

    if ($query->num_rows > 0) {

        while ($row = $query->fetch_assoc()) {

            $id = $row['id'];


            if (isset($_POST['cancel'])) {

                header("location: ../user_profile.php");

            } elseif (isset($_POST['update'])) {

                if (isset($_POST['studies']) && ($_POST['studies'])!="") {
                    $studies = stripslashes($_POST['studies']); // removes backslashes
                    $studies = mysqli_real_escape_string($conn, $studies); //escapes special characters in a string

                    $conn->query($std = "INSERT INTO studies (id, user_id, study_desc, study_privacy, updated_at) VALUES (DEFAULT, $id, '$studies', 1, now())");

                }

                if (isset($_POST['studies1']) && ($_POST['studies1'])!="") {
                    $studies1 = stripslashes($_POST['studies1']); // removes backslashes
                    $studies1 = mysqli_real_escape_string($conn, $studies1); //escapes special characters in a string

                    $conn->query($std1= "INSERT INTO studies (id, user_id, study_desc, study_privacy, updated_at) VALUES (DEFAULT, $id, '$studies1', 1, now())");

                }

                if (isset($_POST['studies2']) && ($_POST['studies2'])!="") {
                    $studies2 = stripslashes($_POST['studies2']); // removes backslashes
                    $studies2 = mysqli_real_escape_string($conn, $studies2); //escapes special characters in a string

                    $conn->query($std2 = "INSERT INTO studies (id, user_id, study_desc, study_privacy, updated_at) VALUES (DEFAULT, $id, '$studies2', 1, now())");

                }

                if (isset($_POST['work']) && ($_POST['work'])!="") {
                    $work = stripslashes($_POST['work']); // removes backslashes
                    $work = mysqli_real_escape_string($conn, $work); //escapes special characters in a string

                    $conn->query($wrk = "INSERT INTO professions (id, user_id, profession_desc, profession_privacy, updated_at) VALUES (DEFAULT, $id, '$work', 1, now())");
                }

                if (isset($_POST['work1']) && ($_POST['work1'])!="") {
                    $work1 = stripslashes($_POST['work1']); // removes backslashes
                    $work1 = mysqli_real_escape_string($conn, $work1); //escapes special characters in a string

                    $conn->query($wrk1 = "INSERT INTO professions (id, user_id, profession_desc, profession_privacy, updated_at) VALUES (DEFAULT, $id, '$work1', 1, now())");
                }

                if (isset($_POST['work2']) && ($_POST['work2'])!="") {
                    $work2 = stripslashes($_POST['work2']); // removes backslashes
                    $work2 = mysqli_real_escape_string($conn, $work2); //escapes special characters in a string

                    $conn->query($wrk2 = "INSERT INTO professions (id, user_id, profession_desc, profession_privacy, updated_at) VALUES (DEFAULT, $id, '$work2', 1, now())");
                }

                if (isset($_POST['website1']) && ($_POST['website1'])!="") {
                    $website1 = stripslashes($_POST['website1']); // removes backslashes
                    $website1 = mysqli_real_escape_string($conn, $website1); //escapes special characters in a string

                    $conn->query($web1 = "INSERT INTO websites (user_id, website_link, website_privacy, updated_at) VALUES ($id, '$website1', 1, now())");

                }

                if (isset($_POST['website2']) && ($_POST['website2'])!="") {
                    $website2 = stripslashes($_POST['website2']); // removes backslashes
                    $website2 = mysqli_real_escape_string($conn, $website2); //escapes special characters in a string

                    $conn->query($web2 = "INSERT INTO websites (user_id, website_link, website_privacy, updated_at) VALUES ($id, '$website2', 1, now())");

                }

                if (isset($_POST['website3']) && ($_POST['website3'])!="") {
                    $website3 = stripslashes($_POST['website3']); // removes backslashes
                    $website3 = mysqli_real_escape_string($conn, $website3); //escapes special characters in a string

                    $conn->query($web3 = "INSERT INTO websites (user_id, website_link, website_privacy, updated_at) VALUES ($id, '$website3', 1, now())");

                }


              /*  if (isset($_POST['lname']) && ($_POST['lname'])!="") {
                    $lname = stripslashes($_POST['lname']); // removes backslashes
                    $lname = mysqli_real_escape_string($conn, $lname); //escapes special characters in a string

                    $ln = $conn->query("SELECT * FROM users WHERE id=$id");

                    if ($ln->num_rows > 0) {

                        $conn->query($lnm = "UPDATE users SET last_name='$lname', updated_at=now() WHERE id=$id");
                    }


                }

                if (isset($_POST['fname']) && ($_POST['lname'])!="") {
                    $fname = stripslashes($_POST['fname']); // removes backslashes
                    $fname = mysqli_real_escape_string($conn, $fname); //escapes special characters in a string

                    $fn = $conn->query("SELECT * FROM users WHERE id=$id");

                    if ($fn->num_rows > 0) {

                        $conn->query($fnm = "UPDATE users SET first_name='$fname', updated_at=now() WHERE id=$id");
                    }
                }

                if (isset($_POST['email'])) {
                    $email = stripslashes($_POST['email']);
                    $email = mysqli_real_escape_string($conn, $email);

                } */

                if (isset($_POST['phone']) && ($_POST['phone'])!='') {
                    $phone = stripslashes($_POST['phone']);
                    $phone = mysqli_real_escape_string($conn, $phone);

                    $ph = $conn->query("SELECT * FROM phones WHERE user_id=$id");

                    if ($ph->num_rows == 0) {

                        $conn->query($tel = "INSERT INTO phones (user_id, phone_number, phone_privacy, updated_at) VALUES ($id, '$phone', 2, now())");


                    } else if ($ph->num_rows > 0) {

                        $conn->query($tel = "UPDATE phones SET phone_number='$phone' WHERE user_id=$id");
                    }

                }

                if (isset($_POST['bday']) && ($_POST['bday'])!="") {
                    $bday = $_POST['bday'];

                    $bd = $conn->query("SELECT day_id FROM users WHERE id=$id");

                    if ($bd->num_rows > 0) {
                        while ($rowbd = $bd->fetch_assoc()) {
                            if ($rowbd['day_id'] != $bday) {

                                $conn->query($updbd = "UPDATE users SET day_id='$bday', updated_at=now() WHERE id=$id");

                            }
                        }

                    }

                }

                if (isset($_POST['bmonth']) && ($_POST['bmonth'])!="") {
                    $bmonth = $_POST['bmonth'];

                    $bm = $conn->query("SELECT month_id FROM users WHERE id=$id");

                    if ($bm->num_rows > 0) {
                        while ($rowbm = $bm->fetch_assoc()) {
                            if ($rowbm['month_id'] != $bmonth) {

                                $conn->query($updbm = "UPDATE users SET month_id='$bmonth', updated_at=now() WHERE id=$id");

                            }
                        }

                    }
                }

                if (isset($_POST['byear']) && ($_POST['byear'])!="") {
                    $byear = $_POST['byear'];

                    $by = $conn->query("SELECT year_id FROM users WHERE id=$id");

                    if ($by->num_rows > 0) {
                        while ($rowby = $by->fetch_assoc()) {
                            if ($rowby['year_id'] != $byear) {

                                $conn->query($updby = "UPDATE users SET year_id='$byear', updated_at=now() WHERE id=$id");

                            }
                        }
                    }

                }

                if (isset($_POST['sex'])) {
                    $sex = $_POST['sex'];

                    $sx = $conn->query("SELECT sex FROM users WHERE id=$id");

                    if ($sx->num_rows > 0) {
                        while ($rowsx = $sx->fetch_assoc()) {
                            if ($rowsx['sex']!=$sex) {

                    $conn->query($updsex = "UPDATE users SET sex='$sex', updated_at=now() WHERE id=$id");

                            }
                        }

                    }
                }

                if (isset($_POST['homecity']) && ($_POST['homecity'])!="") {
                    $homecity = stripslashes($_POST['homecity']);
                    $homecity = mysqli_real_escape_string($conn, $homecity);

                    $citychk = $conn->query("SELECT * FROM cities WHERE city='$homecity'");
                    if ($citychk->num_rows == 0) {

                        $conn->query($cityin = "INSERT INTO cities (id, city) VALUES (DEFAULT , '$homecity')");

                    }

                    $hc = $conn->query("SELECT cities.id AS cityid, cities.city AS cityname FROM cities INNER JOIN users ON cities.id=users.city_id WHERE city='$homecity' AND users.id=$id");
                    if ($hc->num_rows > 0) {
                        while ($rowhc = $hc->fetch_assoc()) {
                            if ($rowhc['cityname'] != '$homecity') {
                                $conn->query($cityupd = "UPDATE users SET city_id=" . $rowhc['cityid'] . ", updated_at=now() WHERE id=$id");
                            }
                        }

                    }

                }


             /*       $hc = $conn->query("SELECT cities.city AS cityname FROM cities INNER JOIN users ON users.city_id=cities.id WHERE users.id=$id");

                    if ($hc->num_rows > 0) {
                        while ($rowhc = $hc->fetch_assoc()) {
                            if ($rowhc['cityname']!='$homecity'){

                                $citychk = $conn->query("SELECT * FROM cities WHERE city='$homecity'");
                                if ($citychk->num_rows == 0) {

                                $conn->query($cityin = "INSERT INTO cities (id, city) VALUES (DEFAULT , '$homecity'");

                                }


                            }
                        }


                    } */

                }

                if (isset($_POST['homecountry'])) {
                    $homecountry = $_POST['homecountry'];

                    $hco = $conn->query("SELECT country_id FROM users WHERE id=$id");

                    if ($hco->num_rows > 0) {
                        while ($rowhco = $hco->fetch_assoc()) {
                        if ($rowhco['country_id']!=$homecountry) {
                            $conn->query($homeco = "UPDATE users SET country_id='$homecountry', updated_at=now() WHERE id=$id");
                        }
                    }
                    }

                }

                if (isset($_POST['origin']) && ($_POST['origin'])!="") {
                    $origin = stripslashes($_POST['origin']);
                    $origin = mysqli_real_escape_string($conn, $origin);

                    $citychk1 = $conn->query("SELECT * FROM cities WHERE city='$origin'");
                    if ($citychk1->num_rows == 0) {

                        $conn->query($cityin1 = "INSERT INTO cities (id, city) VALUES (DEFAULT, '$origin')");

                    }

                    $cit = $conn->query("SELECT id, city FROM cities WHERE city='$origin'");
                    if ($cit->num_rows > 0) {
                        while ($rowcit = $cit->fetch_assoc()) {

                            $bcity = $conn->query("SELECT * FROM bcity WHERE user_id=$id");
                            if ($bcity->num_rows == 0) {

                                $conn->query($cityin2 = "INSERT INTO bcity (user_id, city_id, updated_at) VALUES ($id, " . $rowcit['id'] . ", now())");

                            $bpl = $conn->query("SELECT * FROM birthplace WHERE user_id=$id");
                            if ($bpl->num_rows == 0) {
                                $conn->query($cityin3 = "INSERT INTO birthplace (user_id, birthplace_privacy, updated_at) VALUES ($id, 1, now())");

                            }



                            } else if ($bcity->num_rows > 0) {

                                    $conn->query($bcityupdate = "UPDATE bcity SET city_id=".$rowcit['id'].", updated_at=now() WHERE user_id=$id");


                            }


                        }

                    }
                }

                if (isset($_POST['origincountry'])) {
                    $origincountry = $_POST['origincountry'];

                    $bco = $conn->query("SELECT * FROM bcountry WHERE user_id=$id");

                    if ($bco->num_rows == 0) {

                        $conn->query($birthco = "INSERT INTO bcountry (user_id, country_id, updated_at) VALUES ($id, '$origincountry', now())");
                        
                        $conn->query($bcoprivacy = "INSERT INTO birthplace (user_id, birthplace_privacy, updated_at) VALUES($id, 1, now())");
                        


                    } else if ($bco->num_rows > 0) {

                        $conn->query($birthco = "UPDATE bcountry SET country_id='$origincountry', updated_at=now() WHERE user_id=$id");
                    }

                }




            }

        }

    } else { echo "0 results"; }



header("location: ../user_profile.php?url=".$id);

?>