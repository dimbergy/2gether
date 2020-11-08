<?php



    $a = "SELECT users.id AS userid, last_name, first_name, avatar FROM users INNER JOIN relationship ON users.id=user1_id or users.id=user2_id WHERE (user1_id=".$row['id']." OR user2_id=".$row['id'].") AND email!='$email' AND status=1";





$b = mysqli_query($conn, $a);

$c = mysqli_num_rows($b);

if($c>0){

    while($c = mysqli_fetch_assoc($b)) { ?>

        <li>
            <a href="friend_profile.php?u=<?php echo $c['userid'] ?>">
                <img src="<?php echo $c['avatar'] ?>" alt="people" />

            </a>
        </li>


        <?php

    } } else { ?>

    <li>

        <p class="text-center" style="color:firebrick">You have no friends</p>

    </li>

<?php } ?>
