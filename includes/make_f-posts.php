<div id="posttext" class="col-xs-12 col-md-6 col-lg-4 item">
    <div class="timeline-block">
        <div class="panel panel-default share clearfix-xs">
            <div class="panel-heading panel-heading-gray title">
                Make a post to <?php echo $rows['first_name'] ?>
            </div>


            <div class="panel-body">

                <form id="postform" name="postform" action="parse/post_f-text.php" method="post">
                    <select name="posted_to" class="hidden"><option value="<?php echo $id ?>"></option></select>
                    <textarea name="postbody" class="form-control share-text" rows="3" maxlength="65535" placeholder="Share your status..."></textarea>



                    <!-- POST LOCATION COLLAPSE START -->

                    <div id="postloc" class="collapse">
                        <ul class="list-unstyled profile-about margin-none">

                            <li class="padding-v-5">
                                <div class="row form-group padding-v-0-7">
                                    <div class="col-sm-3"><span class="text-muted">Location</span></div>
                                    <div class="col-sm-4"><input type="text" name="postcity" class="form-control" maxlength="100" placeholder="<?php include('includes/get_city.php'); ?>"></div>
                                    <div class="col-sm-5">

                                        <?php
                                        $getcountry = "SELECT id, country FROM countries";
                                        $rescountry= mysqli_query($conn, $getcountry);
                                        if (mysqli_num_rows($rescountry) > 0) { ?>


                                            <select name="postcountry" id="postcountry" class="form-control">

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
                        </ul>
                    </div>

                    <!-- POST LOCATION COLLAPSE END -->




                    <div id="share-buttons" class="panel-footer share-buttons">
                        <a href="#" id="btnphoto"><i class="fa fa-photo"></i></a>
                        <a href="#" id="btnvideo"><i class="fa fa-video-camera"></i></a>
                        <a href="#" data-toggle="collapse" data-target="#postloc"><i class="fa fa-map-marker"></i></a>
                        <a href="#" id="btnyoutube"><i class="fa fa-youtube"></i></a>
                        <a href="#" id="btnvimeo"><i class="fa fa-vimeo-square"></i></a>
                        <a href="#" id="btnlink"><i class="fa fa-paperclip"></i></a>
                        <!-- <a href="#"><i class="fa fa-thumbs-up fa-fw"></i></a>-->

                        <!--<select class="privacy">
                            <option value="0">&#xf0ac; Public</option>
                            <option value="1">&#xf007; Friends</option>
                            <option value="2">&#xf023; Only me</option>
                        </select>-->
                        <button id="submitpost" type="submit" name="postatexxt" class="btn btn-inverse btn-xs pull-right display-none" href="#">Post</button>
                    </div>

                </form>

            </div>





        </div>
    </div>
</div> <!--  FORM SCOPE  -->


<!-- POST A PHOTO START -->

<div id="postphoto" class="col-xs-12 col-md-6 col-lg-4 item hidden">
    <div class="timeline-block">
        <div class="panel panel-default share clearfix-xs">
            <div class="panel-heading panel-heading-gray title">
                Post a photo to <?php echo $rows['first_name'] ?>
                <i id="photoclose" class="btn btn-white btn-xs fa fa-close pull-right" style="background-color: transparent; border-color: transparent"></i>

            </div>


            <div class="panel-body">

                <form id="postform" name="postform" action="parse/post_f-photo.php" method="post" enctype="multipart/form-data">

                    <textarea name="postbody" class="form-control share-text" rows="3" maxlength="65535" placeholder="Share your status..."></textarea>
                    <select name="posted_to" class="hidden"><option value="<?php echo $id ?>"></option></select>
                    <!-- POST A PHOTO COLLAPSE START -->

                    <ul class="list-unstyled profile-about margin-none">

                        <li class="padding-v-5">
                            <div class="row form-group">
                                <div class="col-sm-3"><span class="text-muted">Title</span></div>
                                <div class="col-sm-9"><input type="text" name="postpictit" maxlength="50" class="form-control"></div>

                            </div>
                        </li>


                        <li class="padding-v-5">
                            <div class="row form-group">
                                <div class="col-sm-3"><span class="text-muted">Location</span></div>
                                <div class="col-sm-4"><input type="text" name="postcity" class="form-control" maxlength="100" placeholder="<?php include('includes/get_city.php'); ?>"></div>
                                <div class="col-sm-5">

                                    <?php
                                    $getcountry = "SELECT id, country FROM countries";
                                    $rescountry= mysqli_query($conn, $getcountry);
                                    if (mysqli_num_rows($rescountry) > 0) { ?>


                                        <select name="postcountry" id="postcountry" class="form-control" required>

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
                                <div class="col-sm-3">&nbsp;</div>
                                <div id="postpicupl" class="col-sm-9">
                                    <input type="file" name="postpic" id="file-3" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" style="display: none" />
                                    <label for="file-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a photo&hellip;</span></label>
                                    <!--<input id="choosefiles" class="form-control" type="file" name="photoalbum[]" multiple>-->
                                </div>

                            </div>
                        </li>
                    </ul>



                    <!-- POST A PHOTO COLLAPSE END -->



                    <div id="share-buttons" class="panel-footer share-buttons">

                        <button id="submitpost" type="submit" name="postaphoto" class="btn btn-inverse btn-xs pull-right" href="#">Post</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

<!--  POST A PHOTO END  -->



<!--  POST A VIDEO START  -->
<div id="postvideo" class="col-xs-12 col-md-6 col-lg-4 item hidden">
    <div class="timeline-block">
        <div class="panel panel-default share clearfix-xs">
            <div class="panel-heading panel-heading-gray title">
                Post a video to <?php echo $rows['first_name'] ?>
                <i id="videoclose" class="btn btn-white btn-xs fa fa-close pull-right" style="background-color: transparent; border-color: transparent"></i>
            </div>


            <div class="panel-body">

                <form id="postform1" name="postform1" action="parse/post_f-video.php" method="post" enctype="multipart/form-data">

                    <textarea name="postbody" class="form-control share-text" rows="3" maxlength="65535" placeholder="Share your status..."></textarea>

                    <!-- POST A VIDEO COLLAPSE START -->

                    <ul class="list-unstyled profile-about margin-none">

                        <li class="padding-v-5">
                            <div class="row form-group">
                                <div class="col-sm-3"><span class="text-muted">Title</span></div>
                                <div class="col-sm-9"><input type="text" name="postvidtit" maxlength="50" class="form-control"></div>

                            </div>
                        </li>


                        <li class="padding-v-5">
                            <div class="row form-group">
                                <div class="col-sm-3"><span class="text-muted">Location</span></div>
                                <div class="col-sm-4"><input type="text" name="postcity" class="form-control" maxlength="100" placeholder="<?php include('includes/get_city.php'); ?>"></div>
                                <div class="col-sm-5">

                                    <?php
                                    $getcountry = "SELECT id, country FROM countries";
                                    $rescountry= mysqli_query($conn, $getcountry);
                                    if (mysqli_num_rows($rescountry) > 0) { ?>


                                        <select name="postcountry" id="postcountry" class="form-control">

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
                                <div class="col-sm-3">&nbsp;</div>
                                <div id="postvidupl" class="col-sm-9">
                                    <input type="file" name="postvid" id="file-4" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" style="display: none"/>
                                    <label for="file-4"><span>Choose a video&hellip;</span></label>
                                    <!--<input id="choosefiles" class="form-control" type="file" name="photoalbum[]" multiple>-->
                                </div>

                            </div>
                        </li>

                    </ul>

                    <!-- POST A VIDEO COLLAPSE END -->


                    <div id="share-buttons" class="panel-footer share-buttons">
                        <select name="posted_to" class="hidden"><option value="<?php echo $id ?>"></option></select>
                        <button id="submitpost" type="submit" name="postavideo" class="btn btn-inverse btn-xs pull-right" href="#">Post</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

<!--  POST A VIDEO END  -->





<!--  POST A YOUTUBE LINK START  -->
<div id="postyoutube" class="col-xs-12 col-md-6 col-lg-4 item hidden">
    <div class="timeline-block">
        <div class="panel panel-default share clearfix-xs">
            <div class="panel-heading panel-heading-gray title">
                Make a <i class="fa fa-youtube"></i> post to <?php echo $rows['first_name'] ?>
                <i id="youtubeclose" class="btn btn-white btn-xs fa fa-close pull-right" style="background-color: transparent; border-color: transparent"></i>
            </div>


            <div class="panel-body">

                <form id="postform" name="postform" action="parse/post_f-youtube.php" method="post">

                    <textarea name="postbody" class="form-control share-text" rows="3" maxlength="65535" placeholder="Share your status..."></textarea>

                    <!-- POST YOUTUBE LINK START -->

                    <ul class="list-unstyled profile-about margin-none">
                        <li class="padding-v-5">
                            <div class="row form-group">
                                <div class="col-sm-2"><span class="text-muted"><i class="fa fa-youtube fa-lg"></i></span></div>
                                <div class="col-sm-10"><input type="text" name="postyoutube" maxlength="200" class="form-control" placeholder="Insert a YouTube link"></div>

                            </div>
                        </li>

                        <li class="padding-v-5">
                            <div class="row form-group padding-v-0-7">
                                <div class="col-sm-2"><span class="text-muted">Location</span></div>
                                <div class="col-sm-5"><input type="text" name="postcity" class="form-control" maxlength="100" placeholder="<?php include('includes/get_city.php'); ?>"></div>
                                <div class="col-sm-5">

                                    <?php
                                    $getcountry = "SELECT id, country FROM countries";
                                    $rescountry= mysqli_query($conn, $getcountry);
                                    if (mysqli_num_rows($rescountry) > 0) { ?>


                                        <select name="postcountry" id="postcountry" class="form-control" required>

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

                    </ul>

                    <!-- POST YOUTUBE LINK END -->


                    <div id="share-buttons" class="panel-footer share-buttons">
                        <select name="posted_to" class="hidden"><option value="<?php echo $id ?>"></option></select>
                        <button id="submitpost" type="submit" name="postayoutube" class="btn btn-inverse btn-xs pull-right" href="#">Post</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

<!--  POST A YOUTUBE LINK END  -->



<!--  POST A VIMEO LINK START  -->
<div id="postvimeo" class="col-xs-12 col-md-6 col-lg-4 item hidden">
    <div class="timeline-block">
        <div class="panel panel-default share clearfix-xs">
            <div class="panel-heading panel-heading-gray title">
                Make a <i class="fa fa-vimeo-square"></i> post to <?php echo $rows['first_name'] ?>
                <i id="vimeoclose" class="btn btn-white btn-xs fa fa-close pull-right" style="background-color: transparent; border-color: transparent"></i>
            </div>


            <div class="panel-body">

                <form id="postform" name="postform" action="parse/post_f-vimeo.php" method="post">

                    <textarea name="postbody" class="form-control share-text" rows="3" maxlength="65535" placeholder="Share your status..."></textarea>

                    <!-- POST VIMEO LINK START -->

                    <ul class="list-unstyled profile-about margin-none">
                        <li class="padding-v-5">
                            <div class="row form-group">
                                <div class="col-sm-2"><span class="text-muted"><i class="fa fa-vimeo-square fa-lg"></i></span></div>
                                <div class="col-sm-10"><input type="text" name="postvimeo" maxlength="200" class="form-control" placeholder="Insert a Vimeo link"></div>

                            </div>
                        </li>

                        <li class="padding-v-5">
                            <div class="row form-group padding-v-0-7">
                                <div class="col-sm-2"><span class="text-muted">Location</span></div>
                                <div class="col-sm-5"><input type="text" name="postcity" class="form-control" maxlength="100" placeholder="<?php include('includes/get_city.php'); ?>"></div>
                                <div class="col-sm-5">

                                    <?php
                                    $getcountry = "SELECT id, country FROM countries";
                                    $rescountry= mysqli_query($conn, $getcountry);
                                    if (mysqli_num_rows($rescountry) > 0) { ?>


                                        <select name="postcountry" id="postcountry" class="form-control" required>

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


                    </ul>
                    <!-- POST VIMEO LINK END -->


                    <div id="share-buttons" class="panel-footer share-buttons">
                        <select name="posted_to" class="hidden"><option value="<?php echo $id ?>"></option></select>
                        <button id="submitpost" type="submit" name="postavimeo" class="btn btn-inverse btn-xs pull-right" href="#">Post</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

<!--  POST A VIMEO LINK END  -->



<!--  POST ANY LINK START  -->
<div id="postlink" class="col-xs-12 col-md-6 col-lg-4 item hidden">
    <div class="timeline-block">
        <div class="panel panel-default share clearfix-xs">
            <div class="panel-heading panel-heading-gray title">
                Post a web link to <?php echo $rows['first_name'] ?>
                <i id="linkclose" class="btn btn-white btn-xs fa fa-close pull-right" style="background-color: transparent; border-color: transparent"></i>
            </div>


            <div class="panel-body">

                <form id="postform" name="postform" action="parse/post_f-link.php" method="post">

                    <textarea name="postbody" class="form-control share-text" rows="3" maxlength="65535" placeholder="Share your status..."></textarea>

                    <!-- POST ANY LINK START -->

                    <ul class="list-unstyled profile-about margin-none">
                        <li class="padding-v-5">
                            <div class="row form-group">
                                <div class="col-sm-2"><span class="text-muted"><i class="fa fa-paperclip fa-lg"></i></span></div>
                                <div class="col-sm-10"><input type="text" name="postlink" maxlength="200" class="form-control" placeholder="Insert a web link"></div>

                            </div>
                        </li>

                        <li class="padding-v-5">
                            <div class="row form-group padding-v-0-7">
                                <div class="col-sm-2"><span class="text-muted">Location</span></div>
                                <div class="col-sm-5"><input type="text" name="postcity" class="form-control" maxlength="100" placeholder="<?php include('includes/get_city.php'); ?>"></div>
                                <div class="col-sm-5">

                                    <?php
                                    $getcountry = "SELECT id, country FROM countries";
                                    $rescountry= mysqli_query($conn, $getcountry);
                                    if (mysqli_num_rows($rescountry) > 0) { ?>


                                        <select name="postcountry" id="postcountry" class="form-control" required>

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




                    </ul>

                    <!-- POST ANY LINK END -->


                    <div id="share-buttons" class="panel-footer share-buttons">
                        <select name="posted_to" class="hidden"><option value="<?php echo $id ?>"></option></select>
                        <button id="submitpost" type="submit" name="postalink" class="btn btn-inverse btn-xs pull-right" href="#">Post</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

<!--  POST ANY LINK END  -->