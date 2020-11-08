<!-- add album modal -->

<div class="modal fade" id="addalbum" role="dialog">

    <div class="modal-dialog" style="margin-top: 50px; min-width: 250px">


        <div class="modal-content" style="background-color: #e6ee9c">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color: #013b68">Add photo album</h4>
            </div>

            <div class="modal-body">
                <div class="panel panel-body" style="background-color: #faffcd">

                    <form role="form" name="albums_form" action="parse/upload_albums.php" method="post" id="about_form" enctype="multipart/form-data">
                        <ul class="list-unstyled profile-about margin-none">
                            <li class="padding-v-5">
                                <div class="row form-group">
                                    <div class="col-sm-4"><span class="text-muted">Album title</span></div>
                                    <div id="albumtit" class="col-sm-8"><input type="text" name="albumtit" maxlength="50" class="form-control" required></div>

                                </div>
                            </li>


                            <li class="padding-v-5">
                                <div class="row form-group">
                                    <div class="col-sm-4"><span class="text-muted">Album description</span></div>
                                    <div id="albumdesc" class="col-sm-8"><input type="text" name="albumdesc" maxlength="255" class="form-control" required></div>

                                </div>
                            </li>


                            <li class="padding-v-5">
                                <div class="row form-group">
                                    <div class="col-sm-4"><span class="text-muted">Album privacy</span></div>
                                    <div class="col-sm-8">
                                        <select name="albumprivacy" class="privacy1 btn btn-white form-control">
                                            <option value="0">&#xf0ac; &nbsp; Public</option>
                                            <option value="1" selected>&#xf007; &nbsp; Friends</option>
                                            <option value="2">&#xf023; &nbsp; Only me</option>
                                        </select>
                                    </div>
                            </li>
                            <li class="padding-v-5">
                                <div class="row form-group">
                                    <div class="col-sm-4"><span class="text-muted">Location</span></div>
                                    <div class="col-sm-4"><input type="text" name="albumcity" class="form-control" maxlength="100" placeholder="<?php include ('includes/get_city.php'); ?>" required></div>
                                    <div class="col-sm-4">

                                        <?php
                                        $getcountry = "SELECT id, country FROM countries";
                                        $rescountry= mysqli_query($conn, $getcountry);
                                        if (mysqli_num_rows($rescountry) > 0) { ?>


                                            <select name="albumcountry" id="albumcountry" class="form-control" required>

                                                <option disabled>Country</option>

                                                <?php  while($rowcountry = mysqli_fetch_assoc($rescountry)) { ?>

                                                    <option value="<?php echo $rowcountry['id'] ?>"


                                                        <?php  $getcountry1 = "SELECT countries.id AS coid, countries.country AS coname FROM countries INNER JOIN users ON users.country_id=countries.id WHERE users.email='$email'";

                                                        $rescountry1= mysqli_query($conn, $getcountry1);
                                                        if (mysqli_num_rows($rescountry1) > 0) {
                                                            while ($rowcountry1 = mysqli_fetch_assoc($rescountry1)) {

                                                                if ($rowcountry['id']==$rowcountry1['coid']) echo "selected";

                                                            }  } else { echo "0 results"; } ?>

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
                            <li class="padding-v-5" style="margin-top: 5px">
                                <div class="row form-group">
                                    <!--<div class="col-sm-4"><span class="text-muted">Select photos</span></div>-->
                                    <div id="albumdesc" class="col-sm-12">
                                        <input type="file" name="photoalbum[]" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple style="display: none"/>
                                        <label for="file-7" class="pull-right"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="10" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose photos&hellip;</strong></label>
                                        <!--<input id="choosefiles" class="form-control" type="file" name="photoalbum[]" multiple>-->
                                    </div>

                                </div>
                            </li>


                            <hr>

                            <li class="padding-v-5" style="margin-top: 10px">
                                <div class="row form-group">
                                    <div style="padding-right: 8px"><button type="button" name="cancel" id="cancel" class="btn btn-danger pull-right"><i class="fa fa-close" data-dismiss='modal'></i></button></div>
                                    <div class="pull-right">&emsp;</div>
                                    <div><button type="reset" name="reset" id="reset" class="btn btn-inverse pull-right"><i class="fa fa-refresh"></i></button></div>
                                    <div class="pull-right">&emsp;</div>
                                    <div><button type="submit" name="update" id="update" class="btn btn-success pull-right"><i class="fa fa-upload"></i></button></div>



                                </div>
                            </li>

                        </ul>
                    </form>



                </div>


            </div>

        </div>

    </div>

</div>

<!-- add album modal end -->

<!-- add video modal start -->

<div class="modal fade" id="addvideos" role="dialog">

    <div class="modal-dialog" style="margin-top: 50px; min-width: 250px">


        <div class="modal-content" style="background-color: #e6ee9c">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color: #013b68">Add videos</h4>
            </div>

            <div class="modal-body">
                <div class="panel panel-body" style="background-color: #faffcd">

                    <form role="form" name="videos_form" action="parse/upload_video.php" method="post" id="videos_form" enctype="multipart/form-data">
                        <ul class="list-unstyled profile-about margin-none">
                            <li class="padding-v-5">
                                <div class="row form-group">
                                    <div class="col-sm-4"><span class="text-muted">Video title</span></div>
                                    <div id="videotit" class="col-sm-8"><input type="text" name="videotit" maxlength="50" class="form-control" required></div>

                                </div>
                            </li>


                            <li class="padding-v-5">
                                <div class="row form-group">
                                    <div class="col-sm-4"><span class="text-muted">Video description</span></div>
                                    <div id="videodesc" class="col-sm-8"><input type="text" name="videodesc" maxlength="255" class="form-control" required></div>

                                </div>
                            </li>


                            <li class="padding-v-5">
                                <div class="row form-group">
                                    <div class="col-sm-4"><span class="text-muted">Video privacy</span></div>
                                    <div class="col-sm-8">
                                        <select name="videoprivacy" class="privacy1 btn btn-white form-control">
                                            <option value="0">&#xf0ac; &nbsp; Public</option>
                                            <option value="1" selected>&#xf007; &nbsp; Friends</option>
                                            <option value="2">&#xf023; &nbsp; Only me</option>
                                        </select>
                                    </div>
                            </li>
                            <li class="padding-v-5">
                                <div class="row form-group">
                                    <div class="col-sm-4"><span class="text-muted">Location</span></div>
                                    <div class="col-sm-4"><input type="text" name="videocity" class="form-control" maxlength="100" placeholder="<?php include ('includes/get_city.php'); ?>" required></div>
                                    <div class="col-sm-4">

                                        <?php
                                        $getcountry = "SELECT id, country FROM countries";
                                        $rescountry= mysqli_query($conn, $getcountry);
                                        if (mysqli_num_rows($rescountry) > 0) { ?>


                                            <select name="videocountry" id="videocountry" class="form-control" required>

                                                <option disabled>Country</option>

                                                <?php  while($rowcountry = mysqli_fetch_assoc($rescountry)) { ?>

                                                    <option value="<?php echo $rowcountry['id'] ?>"


                                                        <?php  $getcountry1 = "SELECT countries.id AS coid, countries.country AS coname FROM countries INNER JOIN users ON users.country_id=countries.id WHERE users.email='$email'";

                                                        $rescountry1= mysqli_query($conn, $getcountry1);
                                                        if (mysqli_num_rows($rescountry1) > 0) {
                                                            while ($rowcountry1 = mysqli_fetch_assoc($rescountry1)) {

                                                                if ($rowcountry['id']==$rowcountry1['coid']) echo "selected";

                                                            }  } else { echo "0 results"; } ?>

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
                            <li class="padding-v-5" style="margin-top: 10px">
                                <div class="row form-group">
                                    <!--<div class="col-sm-4"><span class="text-muted">Select photos</span></div>--><div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <input type="file" name="myvideo" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" style="display: none"/>
                                        <label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a video&hellip;</span></label>
                                        <!--<input id="choosefiles" class="form-control" type="file" name="photoalbum[]" multiple>-->

                                    </div>

                                </div>
                            </li>


                            <hr>

                            <li class="padding-v-5" style="margin-top: 10px">
                                <div class="row form-group">
                                    <div style="padding-right: 8px"><button type="button" name="cancel" id="cancel" class="btn btn-danger pull-right" data-dismiss='modal'><i class="fa fa-close"></i></button></div>
                                    <div class="pull-right">&emsp;</div>
                                    <div><button type="reset" name="reset" id="reset" class="btn btn-inverse pull-right"><i class="fa fa-refresh"></i></button></div>
                                    <div class="pull-right">&emsp;</div>
                                    <div><button type="submit" name="uploadvideo" id="uploadvideo" class="btn btn-success pull-right"><i class="fa fa-upload"></i></button></div>



                                </div>
                            </li>

                        </ul>
                    </form>



                </div>


            </div>

        </div>

    </div>

</div>
<!-- add video modal end -->