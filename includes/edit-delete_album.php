
<!-- start modal edit album-->

<?php               $cover = $conn->query("SELECT id, album_title, album_desc, album_city, album_country, created_at, created_by, album_thumb, album_path, album_cat, album_privacy FROM albums WHERE created_by=$frindex ORDER BY album_cat ASC");

if ($cover->num_rows > 0) {
    $i = 0;
    while ($rowcover = $cover->fetch_assoc()) {
        $i++;

        ?>


        <div class="modal fade" id="editalbum<?php echo $rowcover['id'] ?>" role="dialog">

            <div class="modal-dialog" style="margin-top: 50px; min-width: 250px">


                <div class="modal-content" style="background-color: #e6ee9c">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;
                        </button>
                        <h4 class="modal-title" style="color: #013b68">Edit "<?php echo $rowcover['album_title'] ?>"</h4>
                    </div>

                    <div class="modal-body">
                        <div class="panel panel-body" style="background-color: #faffcd">

                            <form role="form" name="editalbums_form" action="parse/edit_albums.php" method="post" id="editalbums_form">
                                <ul class="list-unstyled profile-about margin-none">
                                    <li class="padding-v-5">
                                        <div class="row form-group">
                                            <div class="col-sm-4"><span class="text-muted">Album title</span>
                                            </div>
                                            <div id="albumtit" class="col-sm-8"><input
                                                    type="text" name="albumtit"
                                                    maxlength="50" class="form-control" placeholder="<?php echo $rowcover['album_title'] ?>"<?php if ($rowcover['album_cat']!=5) echo "disabled"; ?>></div>

                                        </div>
                                    </li>


                                    <li class="padding-v-5">
                                        <div class="row form-group">
                                            <div class="col-sm-4"><span class="text-muted">Album description</span>
                                            </div>
                                            <div id="albumdesc" class="col-sm-8"><input type="text" name="albumdesc" maxlength="255" class="form-control" placeholder="<?php echo $rowcover['album_desc'] ?>"></div>

                                        </div>
                                    </li>


                                    <li class="padding-v-5">
                                        <div class="row form-group">
                                            <div class="col-sm-4"><span class="text-muted">Album privacy</span>
                                            </div>
                                            <div class="col-sm-8">
                                                <select name="albumprivacy"
                                                        class="privacy1 btn btn-white form-control">
                                                    <option value="0"
                                                        <?php if ($rowcover['album_privacy']==0) echo "selected"; ?>>&#xf0ac; &nbsp; Public
                                                    </option>
                                                    <option value="1"
                                                        <?php if ($rowcover['album_privacy']==1) echo "selected"; ?>>&#xf007;&nbsp;Friends
                                                    </option>
                                                    <option value="2"
                                                        <?php if ($rowcover['album_privacy']==2) echo "selected"; ?>>&#xf023; &nbsp; Only me</option>
                                                </select>
                                            </div>
                                    </li>

                                    <select name="albumid" class="hidden"><option value="<?php echo $rowcover['id'] ?>" selected></option></select>

                                    <li class="padding-v-5">
                                        <div class="row form-group"><div class="col-sm-4"><span class="text-muted">Location</span></div>
                                            <div class="col-sm-4"><input type="text" name="albumcity" class="form-control" maxlength="100" placeholder="<?php include('includes/get_albumcity.php'); ?>"></div>
                                            <div class="col-sm-4">

                                                <?php
                                                $getcountry = "SELECT id, country FROM countries";
                                                $rescountry = mysqli_query($conn, $getcountry);
                                                if (mysqli_num_rows($rescountry) > 0) { ?>

                                                    <select name="albumcountry" id="albumcountry" class="form-control">

                                                        <option disabled>Country</option>

                                                        <?php while ($rowcountry = mysqli_fetch_assoc($rescountry)) { ?>

                                                            <option value="<?php echo $rowcountry['id'] ?>"

                                                                <?php if ($rowcountry['id'] == $rowcover['album_country']) echo "selected";
                                                                ?>

                                                            >
                                                                <?php echo $rowcountry['country'] ?>

                                                            </option>


                                                        <?php } ?>

                                                    </select>

                                                    <?php
                                                } else {

                                                    echo "<p>0 αποτελέσματα</p>";

                                                }

                                                ?>

                                            </div>
                                        </div>
                                    </li>


                                    <hr>

                                    <li class="padding-v-5" style="margin-top: 10px">
                                        <div class="row form-group">
                                            <div style="padding-right: 8px">
                                                <button type="button" name="cancel" id="cancel" class="btn btn-warning pull-right" data-dismiss='modal'><i class="fa fa-ban" style="color: white"></i></button></div>
                                            <div class="pull-right">&emsp;</div>
                                            <div><button type="button" name="delete" id="delete" class="btn btn-danger pull-right" data-toggle="modal" data-target="#delalbum<?php echo $rowcover['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><i class="fa fa-trash" style="color: white"></i></button>
                                            </div>
                                            <div class="pull-right">&emsp;</div>
                                            <div>
                                                <button type="reset" name="reset" id="reset" class="btn btn-inverse pull-right"><i class="fa fa-refresh"></i></button>
                                            </div>
                                            <div class="pull-right">&emsp;</div>
                                            <div>
                                                <button type="submit" name="update" id="update" class="btn btn-success pull-right"><i class="fa fa-check"></i></button>
                                            </div>


                                        </div>
                                    </li>

                                </ul>
                            </form>


                        </div>


                    </div>

                </div>

            </div>

        </div>
        <!-- end modal edit album -->

        <!-- start modal delete album -->

        <div class="modal fade" id="delalbum<?php echo $rowcover['id'] ?>" role="dialog">
            <?php

            echo "<div class='modal-dialog modal-sm' style='margin-top: 150px; min-width: 250px'>

    <!-- Modal content-->
    <div class='modal-content' style='background-color: #d3a6b4'>

        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h5 class='modal-title' style='color: #013b68'>Delete ".$rowcover['album_title']."</h5>
        </div>

         <div class='modal-body'>
           <div class='panel panel-default text-center' style='background-color: #faffcd'>
           
            <form name='delalbum_form' role='form' action='parse/delete_albums.php' method='post' class='priv_form'>

<div class='row'><h5 style='padding-left:8px'>Are you sure you want to delete<br />".$rowcover['album_title']." ?</h5></div>

<div class='row text-center'>
            <select class='hidden' name='albumid'><option value='".$rowcover['id']."' selected></option></select>        
      <button type='button' name='cancel' class='btn btn-primary btnpriv1' data-dismiss='modal'><i class='fa fa-ban fa-lg' style='color:grey'></i></button>              
    <button type='submit' name='delete' class='btn btn-primary btnpriv1'><i class='fa fa-trash fa-lg'></i></button>
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
<!-- delete album modal end -->