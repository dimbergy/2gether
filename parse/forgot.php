<?php
	require('../includes/db_connect.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['forgot'])){
		
    	

	$email = $conn->real_escape_string($_POST['email']);


		$data = $conn->query("SELECT id FROM users WHERE email='$email'");

		if ($data->num_rows > 0) {
			$str = "0123$4alo!t5678@9hg&nvdkescoyqxfwudlbo";
			$str = str_shuffle($str);
			$str = substr($str, 3,10);
			$token = $str;

			$conn->query("UPDATE users SET token='$token', updated_at=now() WHERE email='$email'");

			header("location: ../reset_pass.php?mssg=".urlencode("To προσωρινό σου password είναι: ".$token));


		} else {

			header("location: ../forgot_pass.php?mssg=".urlencode("To email που έδωσες είναι λανθασμένο."));
		}




        }



		
    
    


?>
