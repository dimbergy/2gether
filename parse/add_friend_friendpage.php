<?php
if($u=='user') {

$rel1 = $conn->query("SELECT status FROM relationship WHERE ((user1_id=".$c['userid']." OR user1_id=$frindex) AND (user2_id=$frindex OR user2_id=".$c['userid']."))");

    if($rel1->num_rows == 0) {

        if($frindex!=$c['userid']) {

            $request_to = $c['userid']; ?>

            <div class="panel-footer">

                <form name="" action="" method="post">

                    <select name="req_to" style="display: none">
                        <option value="<?php echo $request_to ?>" selected></option>
                    </select>

                    <?php if (isset($_POST['request'])) { ?>
                        <button type="button"  class="btn btn-danger">Friend request sent
                        </button>
                    <?php } else { ?>
                        <button type="submit" id="request" name="request" class="btn btn-primary btn-sm" style="color:black">Add friend&emsp;<i class="fa fa-plus"></i>
                        </button>
                    <?php } ?>

                </form>
            </div>

            <?php
        }
    } else {

        while ($rowrel1 = $rel1->fetch_assoc()) {

            if($rowrel1['status']==0) { ?>

                <div class="panel-footer">
                    <button type="button"  class="btn btn-danger">Friend request sent</button>

                </div>
            <?php }


        }

    }
    if (isset($_POST['request'])) {

        $req_to = $_POST['req_to'];

        $sel2 = $conn->query("SELECT id, req_from, req_to FROM friend_request WHERE req_from=$frinex AND req_to=$req_to");
        if($sel2->num_rows == 0) {

            $conn->query("INSERT INTO friend_requests (id, req_from, req_to, req_date) VALUES (DEFAULT, $frindex, $req_to,now())");
            $conn->query("INSERT INTO relationship (user1_id, user2_id, status, action_id, rel_date) VALUES ($frindex, $req_to, 0, $owner, now())");

        }


    }



} else if ($u=='friend'){

    $rel1 = $conn->query("SELECT status FROM relationship WHERE ((user1_id=".$c['userid']." OR user1_id=$owner) AND (user2_id=$owner OR user2_id=".$c['userid'].")) ");

    if($rel1->num_rows == 0) {

        if($owner!=$c['userid']){

            $request_to = $c['userid']; ?>

            <div class="panel-footer">

                <form name="" action="" method="post">

                <select name="req_to" style="display: none">
                    <option value="<?php echo $request_to ?>" selected></option>
                </select>

            <?php if (isset($_POST['request'])) { ?>
                <button type="button"  class="btn btn-danger">Friend request sent
                </button>
            <?php } else { ?>
                <button type="submit" id="request" name="request" class="btn btn-primary btn-sm" style="color:black">Add friend&emsp;<i class="fa fa-plus"></i>
                </button>
            <?php } ?>

                </form>
            </div>

 <?php
        }
    } else {

while ($rowrel1 = $rel1->fetch_assoc()) {

    if($rowrel1['status']==0) { ?>

        <div class="panel-footer">
            <button type="button"  class="btn btn-danger">Friend request sent</button>

        </div>
   <?php }



}



    }

    if (isset($_POST['request'])) {

        $req_to = $_POST['req_to'];

        $sel2 = $conn->query("SELECT id, req_from, req_to FROM friend_requests WHERE req_from=$owner AND req_to=$req_to");
        if($sel2->num_rows == 0) {

            $conn->query("INSERT INTO friend_requests (id, req_from, req_to, req_date) VALUES (DEFAULT, $owner, $req_to,now())");
            $conn->query("INSERT INTO relationship (user1_id, user2_id, status, action_id, rel_date) VALUES ($owner, $req_to, 0, $owner, now())");

        }



    }


 }

?>