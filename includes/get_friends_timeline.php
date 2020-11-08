<?php

if ($u=='user') {

    $a = "SELECT users.id AS userid, last_name, first_name, avatar FROM users INNER JOIN relationship ON users.id=user1_id or users.id=user2_id WHERE (user1_id=".$row['id']." OR user2_id=".$row['id'].") AND email!='$email' AND status=1";

 } else if ($u=='friend') {

    $a = "SELECT users.id AS userid, last_name, first_name, avatar FROM users INNER JOIN relationship ON users.id=user1_id or users.id=user2_id WHERE (user1_id='$id' OR user2_id='$id') AND users.id!='$id' AND status=1";

}



$b = mysqli_query($conn, $a);

$c = mysqli_num_rows($b);

if($c>0){
$count=0;
    while($c = mysqli_fetch_assoc($b)) {
        $count++;
if ($count<7) {
        ?>

        <li style="width:130px; padding: 0 4px;">
            <?php if($row['id'] == $c['userid']) { ?>
            <a href="user_profile.php?u=<?php echo $c['userid'] ?>">
                <?php } else { ?>
            <a href="friend_profile.php?u=<?php echo $c['userid'] ?>">
            <?php } ?>
                <div class="row">
                <img src="<?php echo $c['avatar']?>" alt="people" style="padding: 0 6px;"/>
                </div>
                <div class="row">
                <p class="text-center" style="width:120px; margin: 0 5px; word-wrap: break-word;"><?php echo $c['first_name']; echo "&nbsp;"; echo $c['last_name'] ?></p>
                </div>
            </a>
        </li>


        <?php

} } if ($count > 6) { ?>
        <a href="user_friends.php?u=<?php echo $ow['id'] ?>"> <li style="width: 100%"><button class="btn btn-default btn-sm pull-right">see all</button></li></a>

<?php } } else { ?>

    <li>

        <p class="text-center" style="color:firebrick">You have no friends</p>

    </li>


    <?php } ?>