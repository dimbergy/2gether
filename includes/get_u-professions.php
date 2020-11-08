<?php


$prof = $conn->query("SELECT professions.id AS profid, user_id, profession_desc, profession_privacy FROM professions INNER JOIN users ON users.id=user_id WHERE users.email='$email'");



if ($prof->num_rows > 0) {
    $i=0;
    while($rowprof = $prof->fetch_assoc()) {
        $i++;

        echo "<div id='infoitem2' class='col-sm-8'>" .$rowprof['profession_desc']. "<span><button type='button' class='btn btn-white btn-xs pull-right webmodal' style='border-color: transparent' data-toggle='modal' data-target='#profmod".$i."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";

        if ($rowprof['profession_privacy']==0) echo "<i class='fa fa-globe' style='color: grey;'>";
        if ($rowprof['profession_privacy']==1) echo "<i class='fa fa-user' style='color: grey;'>";
        if ($rowprof['profession_privacy']==2) echo "<i class='fa fa-lock' style='color: grey;'>";
        echo "</i></button>

                </span></div><div class='col-sm-4'></div>"; ?>

        <div class="modal fade" id="profmod<?php echo $i?>" role="dialog">
            <?php

            echo "<div class='modal-dialog modal-sm' style='margin-top: 150px; min-width: 250px'>

    <!-- Modal content-->
    <div class='modal-content' style='background-color: #e6ee9c'>

        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h5 class='modal-title' style='color: #013b68'>Change privacy settings</h5>
        </div>

        <div class='modal-body'>
           <div class='panel panel-default text-center' style='background-color: #faffcd'>
           
            <form id='".$rowprof['profid']."' role='form' action='parse/get_profprivacy.php' method='post' class='priv_form'>

<div class='row'><h5 style='padding-left:8px'>" .$rowprof['profession_desc']. "</h5></div>

<div class='row text-center'>

                  <select name='selection' class='hidden'>
                  <option value='".$rowprof['profid']."' selected>".$rowprof['profid']."</option>
                    </select>
                    
                    <select name='privsel' class='privacy1 btn btn-white' style='background-color: #faffcd'>
                        <option value='0'";
            if ($rowprof['profession_privacy'] == 0) echo "selected";
            echo ">&#xf0ac; &nbsp; Public</option>
                        <option value='1'";
            if ($rowprof['profession_privacy'] == 1) echo "selected";
            echo ">&#xf007; &nbsp; Friends</option>
                        <option value='2'";
            if ($rowprof['profession_privacy'] == 2) echo "selected";
            echo ">&#xf023; &nbsp; Only me</option>
                              </select>
    <button type='submit' name='prfpr' class='btn btn-primary btnpriv1'><i class='fa fa-check-circle'></i></button>
                            </div>
                            <div class='row text-center'>
                            <span style='padding-left: 19px; font-size: 14px'>Delete record</span>
<button type='submit' name='prfrmv' class='btn btn-primary btnpriv'><i class='fa fa-trash' style='margin-left: 18px'></i></button>
</div>
        </form>


            
        </div>

          
        </div>

    </div>

</div>";

            ?>
        </div>




        <?php
    }
}


?>


