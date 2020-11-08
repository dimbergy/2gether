<?php



$sex = $conn->query("SELECT id, sex, sex_privacy FROM users INNER JOIN sexprivacy ON id=user_id WHERE email='$email'");



if ($sex->num_rows > 0) {
    while($rowsex = $sex->fetch_assoc()) { ?>

        <div id='infoitem3' class="col-sm-8"><?php if ($rowsex['sex']==1) echo "Άντρας"; else echo "Γυναίκα"; ?><span><button type="button" class="btn btn-white btn-xs pull-right" style="border-color: transparent" data-toggle="modal" data-target="#sexmod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <?php
        if ($rowsex['sex_privacy']==0) echo "<i class='fa fa-globe' style='color: grey;'>";
        if ($rowsex['sex_privacy']==1) echo "<i class='fa fa-user' style='color: grey;'>";
        if ($rowsex['sex_privacy']==2) echo "<i class='fa fa-lock' style='color: grey;'>";
        echo "</i></button>

                </span></div><div class='col-sm-4'></div>"; ?>

        <div class="modal fade" id="sexmod" role="dialog">
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
           
            <form name='sexform' role='form' action='parse/get_sexprivacy.php' method='post' class='priv_form'>

<div class='row'><h5 style='padding-left:8px'>"; if ($rowsex['sex']==1) echo "Άντρας"; else echo "Γυναίκα"; echo "</h5></div>

<div class='row text-center'>
                    
                    <select name='privsel' class='privacy1 btn btn-white' style='background-color: #faffcd'>
                        <option value='0'";
            if ($rowsex['sex_privacy'] == 0) echo "selected";
            echo ">&#xf0ac; &nbsp; Public</option>
                        <option value='1'";
            if ($rowsex['sex_privacy'] == 1) echo "selected";
            echo ">&#xf007; &nbsp; Friends</option>
                        <option value='2'";
            if ($rowsex['sex_privacy'] == 2) echo "selected";
            echo ">&#xf023; &nbsp; Only me</option>
                              </select>
    <button type='submit' name='sexpr' class='btn btn-primary btnpriv1'><i class='fa fa-check-circle'></i></button>
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