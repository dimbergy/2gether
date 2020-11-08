<?php

include ('time_ago.php');

$reqs = "SELECT DISTINCT id, first_name, last_name, avatar, user1_id, user2_id, rel_date FROM users INNER JOIN relationship ON users.id=user1_id OR users.id=user2_id WHERE user2_id=".$user." AND status=0 AND id!=".$user."";

$data = mysqli_query($conn, $reqs);

if (mysqli_num_rows($data) > 0) { ?>

    <li class="media">


        <?php

        while ($key = mysqli_fetch_assoc($data)) {

            $time_ago= timeago($key['rel_date']);
            ?>



            <div <?php if (isset($_POST['accept']) || isset($_POST['ignore'])) echo " style='display:none'"  ?>>
            <div class="media-left">
                <img src="<?php echo $key['avatar'] ?>" alt="people" class="img-circle"
                     width="30">
            </div>

            <div class="media-body">
                <a href="friend_profile.php?u=<?php echo $key['id'] ?>"><?php echo $key['first_name'] ?>
                    &nbsp;<?php echo $key['last_name'] ?></a> sent you a friend request.
                <br/>

                <span class="text-caption text-muted"><?php echo $time_ago ?></span>
                <form name="respond" action="" method="post">
                    <div class="pull-right" style="margin-top:-30px;">
                        <button type="submit" name="accept" class="btn btn-success" style="padding-left: 8px; padding-right:10px;"><i class="md-person-add"></i></button>
                        <button type="submit" name="ignore" class="btn btn-danger"><i class="fa fa-minus-square-o"></i></button>
                    </div>
                </form>

            </div>


            </div>
            
            <?php
            $user1=$key['user1_id'];
            $actor=$key['user2_id'];



            if(isset($_POST['accept'])) {

                $acc = "UPDATE relationship SET status=1, action_id=$actor, rel_date=now() WHERE user1_id=$user1 AND user2_id=$actor";

                if ($conn->query($acc) === TRUE)


                {   } else {    }


            }   else if (isset($_POST['ignore'])) {

                $ign1 = "DELETE FROM relationship WHERE user1_id=$user1 AND user2_id=$actor";
                $ing2 = "DELETE FROM friend_requests WHERE req_from=$user AND req_to=$actor";
                if (($conn->query($ign1) === TRUE) && ($conn->query($ign2) === TRUE))


                {   } else {    }






            }




        } ?>

    </li>

<?php } else { ?>

    <li class="media">


        <div class="media-body">
            You have no friend requests at this time.
        </div>
    </li>

<?php }



$show1 = "SELECT DISTINCT first_name, avatar, rel_date FROM users INNER JOIN relationship ON users.id=user1_id OR user2_id=users.id WHERE (user1_id=".$user." OR user2_id=".$user.") AND status=1 AND users.id=".$user."";
$show2 = "SELECT users.id AS userid, first_name, avatar, rel_date FROM users INNER JOIN relationship ON users.id=user1_id OR users.id=user2_id WHERE (user1_id=".$user." OR user2_id=".$user.") AND status=1 AND users.id!=".$user." ORDER BY rel_date DESC";
$showres1= mysqli_query($conn, $show1);
$showres2= mysqli_query($conn, $show2);

if (mysqli_num_rows($showres1) || mysqli_num_rows($showres2) > 0) {


    while ($sh1 = mysqli_fetch_assoc($showres1))  {
        while ($sh2 = mysqli_fetch_assoc($showres2))  {

            $new_datetime = DateTime::createFromFormat ( "Y-m-d H:i:s", $sh2['rel_date'] );
            ?>



            <li class="media">
                <div class="media-left">
                    <span class="icon-block s30 bg-grey-200"><i class="fa fa-plus"></i></span>
                </div>
                <div class="media-body">
                    <a href="user_timeline.php?u=<?php echo $sh1['id'] ?>"><?php echo $sh1['first_name']; ?></a> and <a href="friend_profile.php?u=<?php echo $sh2['userid'] ?>"><?php echo $sh2['first_name'] ?></a> are now friends.
                    <p>
                        <span class="text-caption text-muted">From&nbsp;<?php echo $new_datetime->format('d-m-Y, H:i') ?></span>
                    </p>
                    <a href="user_timeline.php?u=<?php echo $sh1['id'] ?>">
                        <img class="width-30 img-circle" src="<?php echo $sh1['avatar'] ?>"
                             alt="people">
                    </a>
                    <a href="friend_profile.php?u=<?php echo $sh2['userid'] ?>">
                        <img class="width-30 img-circle" src="<?php echo $sh2['avatar'] ?>"
                             alt="people">
                    </a>
                </div>
            </li>
        <?php } } }?>
