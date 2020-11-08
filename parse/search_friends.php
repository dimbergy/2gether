<?php

session_start();

$email=$_SESSION['email'];

require_once ('../includes/db_connect.php');

//if ((isset($_POST['search'])) && !empty(isset($_POST['search']))) {


    $result = $conn->query("SELECT first_name, last_name, avatar FROM users WHERE first_name LIKE '%".$_POST['string']."%' OR last_name LIKE '%".$_POST['string']."%' AND email!=".$email);

if ($result->num_rows > 0) {

    while ($rows = $result->fetch_assoc()) {



        ?>

       <div id="profiles"><img src="<?php echo $rows['avatar'] ?>" width="50px" height="50px"
                                id="pic"/>&nbsp;<span><?php $rows['first_name'] ?>
                &nbsp;<?php $rows['last_name'] ?></span></div>

        <?php

    }


} else { ?>


    <div id="profiles"><span><?php echo $_POST['string'] ?></span></div>

<?php } ?>


