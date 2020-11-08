<?php

$reqs = "SELECT DISTINCT id, first_name, last_name, avatar, user1_id, user2_id, rel_date FROM users INNER JOIN relationship ON users.id=user1_id OR users.id=user2_id WHERE user2_id=".$user." AND status=0 AND id!=".$user."";

$data = mysqli_query($conn, $reqs);

$rowcount=mysqli_num_rows($data); ?>


<span class="badge badge-danger" <?php if ($rowcount>0) { echo "style='background-color: #bd362f; color: white'"; } else { echo "style='visibility: hidden'"; } ?> > <?php echo $rowcount ?></span>

