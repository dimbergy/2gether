<?php



$mail = $conn->query("SELECT email_privacy FROM mailprivacy INNER JOIN users ON users.id=user_id WHERE email='$email'");



if ($mail->num_rows > 0) {
    while($rowmail = $mail->fetch_assoc()) { ?>

        <div id='infoitem8' class="col-sm-8 mailink"><a href="mailto:<?php echo $email ?> "> <?php echo $email ?> </a><span><button type="button" class="btn btn-white btn-xs pull-right" style="border-color: transparent" data-toggle="modal" data-target="#mailmod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<?php
        if ($rowmail['email_privacy']==0) echo "<i class='fa fa-globe' style='color: grey;'>";
        if ($rowmail['email_privacy']==1) echo "<i class='fa fa-user' style='color: grey;'>";
        if ($rowmail['email_privacy']==2) echo "<i class='fa fa-lock' style='color: grey;'>";
        echo "</i></button>

                </span></div><div class='col-sm-4'></div>"; ?>

        <div class="modal fade" id="mailmod" role="dialog">
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
           
            <form name='mailform' role='form' action='parse/get_mailprivacy.php' method='post' class='priv_form'>

<div class='row'><h5 style='padding-left:8px'>" .$email. "</h5></div>

<div class='row text-center'>
                    
                    <select name='privsel' class='privacy1 btn btn-white' style='background-color: #faffcd'>
                        <option value='0'";
            if ($rowmail['email_privacy'] == 0) echo "selected";
            echo ">&#xf0ac; &nbsp; Public</option>
                        <option value='1'";
            if ($rowmail['email_privacy'] == 1) echo "selected";
            echo ">&#xf007; &nbsp; Friends</option>
                        <option value='2'";
            if ($rowmail['email_privacy'] == 2) echo "selected";
            echo ">&#xf023; &nbsp; Only me</option>
                              </select>
    <button type='submit' name='mailpr' class='btn btn-primary btnpriv1'><i class='fa fa-check-circle'></i></button>
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