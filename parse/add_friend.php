<div class="container-fluid">
    <?php

    $a3 = "SELECT users.id AS userid, user2_id, status, action_id FROM relationship INNER JOIN users ON users.id=user2_id or users.id=user1_id WHERE (user1_id='$id' OR user2_id='$id') AND (user1_id='$x' OR user2_id='$x') AND users.id=".$x;

    $b3 = mysqli_query($conn, $a3);

    $c3 = mysqli_num_rows($b3);

    if($c3==0) { ?>

    <div class="panel panel-default share col-md-4" style="background-color: transparent; border-color: transparent">
        <form name="addfriends" id="addfriends" action="" method="post">
            <div class="input-group">
                <div class="input-group-btn">
                    <select name="req_to" style="display: none">
                        <option value="<?php echo $id ?>" selected></option>
                    </select>

                    <?php if (isset($_POST['request'])) { ?>
                        <button type="button"  class="btn btn-danger" style="margin-left: -15px">Friend request sent
                        </button>
                    <?php } else { ?>
                        <button type="submit" id="request" name="request" class="btn btn-success" style="margin-left: -15px"><i
                                class="fa fa-plus"></i> Add friend
                        </button>
                    <?php } ?>

                </div>



            </div>
        </form>

    </div>

            <?php  } else {


            while($c3 = mysqli_fetch_assoc($b3)) {


            if ($c3['status'] == 0) { ?>
            <div class="panel panel-default share col-md-4" style="background-color: transparent; border-color: transparent;">
                <form action="" method="post">
                    <div class="input-group">
                        <div class="input-group-btn" >
                            <select name="req_to" style="display: none">
                                <option value="<?php echo $id ?>" selected></option>
                            </select>

                            <button type="button" class="btn btn-danger" style="margin-left: -15px">Friend request sent
                            </button>

                        </div>

                    </div>


                        </form>
                    </div>



                    <?php                   } else if ($c3['status'] == 1){ ?>
                    <div class="panel panel-default share col-md-4"
                         style="background-color: transparent; border-color: transparent">
                        <form action="" method="post">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <select name="req_to" style="display: none">
                                        <option value="<?php echo $id ?>" selected></option>
                                    </select>

                                    <button type="button" class="btn btn-inverse" style="margin-left: -15px"><i class="fa-lg icon-group"></i>&nbsp;Friends
                                    </button>

                                </div>

                            </div>
                                </form>
                            </div>



                            <?php                   } else if ($c3['status'] == 2) { ?>

                            <div class="panel panel-default share"
                                 style="background-color: transparent; border-color: transparent">
                                <form name="addfriends" id="addfriends" action="" method="post">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <select name="req_to" style="display: none">
                                                <option value="<?php echo $id ?>" selected></option>
                                            </select>

                                            <?php if (isset($_POST['request'])) { ?>
                                                <button type="button"  class="btn btn-danger" style="margin-left: -15px">Friend request sent
                                                </button>
                                            <?php } else { ?>
                                                <button type="submit" id="request" name="request" class="btn btn-primary" style="margin-left: -15px"><i
                                                        class="fa fa-plus"></i> Add friend
                                                </button>
                                            <?php } ?>


                                        </div>

                                    </div>
                                        </form>
                                    </div>




                                    <?php                  }



                                    }  } ?>


                                    <?php

                                    if (isset($_POST['request'])) {

                                        $req_to = $_POST['req_to'];

                                        $sel = "SELECT id FROM users WHERE email='$email'";

                                        $res = mysqli_query($conn, $sel);

                                        if (mysqli_num_rows($res) > 0) {

                                            while ($row = mysqli_fetch_assoc($res)) {

                                                $sel2 = "SELECT id, req_from, req_to FROM friend_requests WHERE req_from=".$row['id']." AND req_to=" .$req_to;

                                                $res2 = mysqli_query($conn, $sel2);
                                                if (mysqli_num_rows($res2) == 0) {


                                                    $create_req = "INSERT INTO friend_requests (id, req_from, req_to, req_date) VALUES (NULL, ".$row['id'].", $req_to, now())";
                                                    $result = mysqli_query($conn, $create_req);

                                                    $build_rel = "INSERT INTO relationship (user1_id, user2_id, status, action_id, rel_date) VALUES (".$row['id'].", $req_to, 0, ".$row['id'].", now())";
                                                    $result1 = mysqli_query($conn, $build_rel);

                                                    if ($result=="" OR $result1=="") { ?>

                                                        <h5><?php echo "Your friend request has NOT been sent!"; ?></h5>
                                                    <?php }
                                                } else { ?>
                                                    <h5><?php echo "A friend request has been already sent!"; ?></h5>
                                                <?php }
                                            }
                                        }
                                    }


                                    ?>


