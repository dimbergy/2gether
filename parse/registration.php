<?php
	require('../includes/db_connect.php');
    session_start();
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['registration'])){
        
        if($_REQUEST['password']!=$_REQUEST['confirm']) {


   header("location: ../index.php?mssg=".urlencode("Οι κωδικοί που έδωσες είναι ανόμοιοι. Επανάλαβε τη διαδικασία εγγραφής."));         
            

            
        } else {
            
  
        $lname = stripslashes($_REQUEST['lname']); // removes backslashes
		$lname = mysqli_real_escape_string($conn,$lname); //escapes special characters in a string 
        $fname = stripslashes($_REQUEST['fname']); // removes backslashes
		$fname = mysqli_real_escape_string($conn,$fname); //escapes special characters in a string		
        $email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($conn,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn,$password);
        $day = $_REQUEST['day'];
        $month = $_REQUEST['month'];
        $year = $_REQUEST['year'];
        $sex = $_REQUEST['sex'];
        $city = stripslashes($_REQUEST['city']);
        $city = mysqli_real_escape_string($conn,$city);
        $country = $_REQUEST['country'];


        $email_check = "SELECT email FROM users WHERE email='$email'";
        $res_emailcheck = mysqli_query($conn,$email_check);
            if (mysqli_num_rows($res_emailcheck)>0) {    
                 
            header("location: ../index.php?mssg=".urlencode("Το email που έδωσες χρησιμοποιείται. "));
            
        } else {
            
        $city_check = "SELECT * FROM cities WHERE city='$city'";
        $res_citycheck = mysqli_query($conn, $city_check);
        

       if (mysqli_num_rows($res_citycheck)==0) {



            $query_city = "INSERT INTO cities (id, city) VALUES (DEFAULT, '$city')";
            $result_city = mysqli_query($conn, $query_city);
                if(!$result_city) {
                    header("location: ../index.php?mssg=".urlencode("Η καταχώριση της πόλης αντιμετώπισε πρόβλημα. Ξαναπροσπάθησε!"));
                } else {

                   $city_check = "SELECT * FROM cities WHERE city='$city'";
                    $res_citycheck = mysqli_query($conn, $city_check);  
                  $row_city = mysqli_fetch_assoc($res_citycheck);

            $passwordmd5 = md5($password);


           $query = "INSERT INTO users (id, role_id, last_name, first_name, email, password, day_id, month_id, year_id, sex, city_id, country_id, avatar, created_at, updated_at) VALUES (DEFAULT, DEFAULT, '$lname', '$fname', '$email', '$passwordmd5', $day, $month, $year, $sex, ".$row_city['id'].", $country, '$avatar', now(), now()";

        $result = mysqli_query($conn,$query);


        if($result){

            $sql1 = $conn->query("SELECT id FROM users WHERE email='$email'");
            if ($sql1->num_rows > 0) {
                while ($row1 = $sql1->fetch_assoc()) {
                    
            $conn->query($sql2 = "INSERT INTO mailprivacy (user_id, email_privacy, updated_at) VALUES (" . $row1['id'] . ", 2, now())");
            $conn->query($sql3 = "INSERT INTO homeplace (user_id, homeplace_privacy, updated_at) VALUES (" . $row1['id'] . ", 0, now())");
            $conn->query($sql4 = "INSERT INTO bdaymonthprivacy (user_id, bdaymonth_privacy, updated_at) VALUES (" . $row1['id'] . ", 1, now())");
            $conn->query($sql5 = "INSERT INTO byearprivacy (user_id, byear_privacy, updated_at) VALUES (" . $row1['id'] . ", 1, now())");
            $conn->query($sql6 = "INSERT INTO sexprivacy (user_id, sex_privacy, updated_at) VALUES (" . $row1['id'] . ", 0, now())");
                }
            }   
                
            
            header("location: ../index.php?mssg=".urlencode("Η εγγραφή σσυ πραγματοποιήθηκε με επιτυχία. Συνδέσου τώρα!"));
        
        } else {

        header("location: ../index.php?mssg=".urlencode("Η εγγραφή σου δεν μπόρεσε να ολοκληρωθεί. Δοκίμασε ξανά."));                  
        }

                }


        } else {


            $row_city = mysqli_fetch_assoc($res_citycheck);

            $passwordmd5 = md5($password);

           if($sex==1) {

               $avatar='images/male.png';

           } else {

               $avatar='images/female.png';
           }

           $query = "INSERT INTO users (id, role_id, last_name, first_name, email, password, day_id, month_id, year_id, sex, city_id, country_id, avatar, created_at, updated_at) VALUES (DEFAULT, DEFAULT, '$lname', '$fname', '$email', '$passwordmd5', $day, $month,  $year, $sex, ".$row_city['id'].", $country, '$avatar', now(), now())";
        $result = mysqli_query($conn,$query);
        if($result){

            $sql1 = $conn->query("SELECT id FROM users WHERE email='$email'");
            if ($sql1->num_rows > 0) {
                while ($row1 = $sql1->fetch_assoc()) {

            $conn->query($sql2 = "INSERT INTO mailprivacy (user_id, email_privacy, updated_at) VALUES (" . $row1['id'] . ", 2, now())");
            $conn->query($sql3 = "INSERT INTO homeplace (user_id, homeplace_privacy, updated_at) VALUES (" . $row1['id'] . ", 0, now())");
            $conn->query($sql4 = "INSERT INTO bdaymonthprivacy (user_id, bdaymonth_privacy, updated_at) VALUES (" . $row1['id'] . ", 1, now())");
            $conn->query($sql5 = "INSERT INTO byearprivacy (user_id, byear_privacy, updated_at) VALUES (" . $row1['id'] . ", 1, now())");
            $conn->query($sql6 = "INSERT INTO sexprivacy (user_id, sex_privacy, updated_at) VALUES (" . $row1['id'] . ", 0, now())");
                }
            }

            header("location: ../index.php?mssg=".urlencode("Η εγγραφή σας πραγματοποιήθηκε με επιτυχία. "));
        
        } else {

        header("location: ../index.php?mssg=".urlencode("Η εγγραφή σας δεν μπόρεσε να ολοκληρωθεί. Παρακαλώ, προσπαθήστε ξανά."));                  
        }


        }

        }

    }

}
    ?>