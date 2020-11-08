<?php
	require('../includes/db_connect.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['reset'])){
		
   
	$email = $conn->real_escape_string($_POST['email']);
	$token = $conn->real_escape_string($_POST['token']);
	$password = $conn->real_escape_string($_POST['password']);

		$data = $conn->query("SELECT id FROM users WHERE email='$email' AND token='$token'");

		if ($data->num_rows > 0) {
			
			$passwordmd5 = md5($password);

			$conn->query("UPDATE users SET password='$passwordmd5', updated_at=now(), token='' WHERE email='$email'");

				header("location: ../index.php?mssg=".urlencode("Η αλλαγή του password ολοκληρώθηκε με επιτυχία. Μπορείς τώρα να συνδεθείς."));
			} else {

				header("location: ../forgot_pass.php?mssg=".urlencode("Παρουσιάστηκε πρόβλημα στη διαδικασία ανανέωσης του password. Δοκίμασε ξανά."));

			} 


		} else {

			header("location: ../forgot_pass.php?mssg=".urlencode("Παρουσιάστηκε πρόβλημα στη διαδικασία ανανέωσης του password. Δοκίμασε ξανά."));
		}




?>
