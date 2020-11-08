<?php



$bdate = $conn->query("SELECT day_id, month, year, bdaymonth_privacy, byear_privacy FROM users INNER JOIN months ON months.id=users.month_id INNER JOIN bdaymonthprivacy ON bdaymonthprivacy.user_id=users.id INNER JOIN byearprivacy ON byearprivacy.user_id=users.id INNER JOIN years ON years.id=users.year_id WHERE users.email='$email'");


if ($bdate->num_rows > 0) {
    while($rowbdate = $bdate->fetch_assoc()) {


                        echo "<div id='infoitem6' class='col-sm-8'>" . $rowbdate['day_id']. ", ". $rowbdate['month'] . " ".$rowbdate['year']. "<span><button type='button' class='btn btn-white btn-xs pull-right' style='border-color: transparent' data-toggle='modal' data-target='#bdatemod' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <i class='fa fa-pencil' style='color: grey;'></i></button></span></div>
                    
                    <div class='col-sm-4'></div>"; ?>

                        <div class="modal fade" id="bdatemod" role="dialog">
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
           
            <form name='bdateform' role='form' action='parse/get_bdateprivacy.php' method='post' class='priv_form'>

<div class='row'><h5>" . $rowbdate['day_id']. ", ". $rowbdate['month'] . "</h5></div>

<div class='row text-center'>
                   
                    <select name='privsel1' class='privacy1 btn btn-white' style='background-color: #faffcd'>
                        <option value='0'";
                            if ($rowbdate['bdaymonth_privacy'] == 0) echo "selected";
                            echo ">&#xf0ac; &nbsp; Public</option>
                        <option value='1'";
                            if ($rowbdate['bdaymonth_privacy'] == 1) echo "selected";
                            echo ">&#xf007; &nbsp; Friends</option>
                        <option value='2'";
                            if ($rowbdate['bdaymonth_privacy'] == 2) echo "selected";
                            echo ">&#xf023; &nbsp; Only me</option>
                              </select>
    <button type='submit' name='bdaymopr' class='btn btn-primary btnpriv1'><i class='fa fa-check-circle'></i></button>
                            </div>
 
                            <div class='row'><h5>" .$rowbdate['year']. "</h5></div>
                            
                            <div class='row text-center'>
                   
                    <select name='privsel2' class='privacy1 btn btn-white' style='background-color: #faffcd'>
                        <option value='0'";
                            if ($rowbdate['byear_privacy'] == 0) echo "selected";
                            echo ">&#xf0ac; &nbsp; Public</option>
                        <option value='1'";
                            if ($rowbdate['byear_privacy'] == 1) echo "selected";
                            echo ">&#xf007; &nbsp; Friends</option>
                        <option value='2'";
                            if ($rowbdate['byear_privacy'] == 2) echo "selected";
                            echo ">&#xf023; &nbsp; Only me</option>
                              </select>
    <button type='submit' name='byearpr' class='btn btn-primary btnpriv1'><i class='fa fa-check-circle'></i></button>
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




