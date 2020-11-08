<?php

$allpic = $conn->query("SELECT id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id FROM photos WHERE uploaded_by=$prof");

if ($allpic->num_rows > 0) {
    $i = 0;
    while ($rowallpic = $allpic->fetch_assoc()) {
        $i++;
        $picid = $rowallpic['id'];
        ?>


        <div class="modal fade modal-fullscreen footer-to-bottom" id="allsidePics<?php echo $i ?>" role="dialog"
             tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog animated zoomInLeft">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <?php
                        $alb = $conn->query("SELECT album_title FROM albums INNER JOIN photos ON albums.id=photos.album_id WHERE photos.id=" . $rowallpic['id'] . "");
                        if ($alb->num_rows > 0) {
                            while ($rowalb = $alb->fetch_assoc()) {

                                ?>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <?php if ($rowallpic['img_title'] == "") { ?>
                                    <h4 class="modal-title"><?php echo $rowalb['album_title'] ?></h4>
                                <?php } else { ?>
                                    <h4 class="modal-title"><?php echo $rowallpic['img_title'] ?></h4>
                                <?php }
                            }
                        } ?>
                    </div>


                    <div class="modal-body">


                        <div class="col-md-8 col-sm-12 col-xs-12 mediacol">

                            <img class="img-responsive" src="<?php echo $rowallpic['img_src'] ?>" alt=""/>

                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>


                        <div class="col-md-3 col-sm-12 col-xs-12 infocol">

                            <a href="user_timeline.php?u=<?php echo $row['id'] ?>"><h4><img src="<?php echo $row['avatar'] ?>" alt="Bill" class="img-circle"
                                     width="40px"/> <?php echo "&nbsp;";
                                echo $row['first_name'];
                                echo " ";
                                echo $row['last_name'] ?></h4></a>

                            <div class="meta"><p><span><i class="fa fa-calendar-o fa-fw"></i> <?php echo $rowallpic['uploaded_at'] ?> </span><span><i class="fa fa-map-marker fa-fw"></i>
                                        <?php
                                        $allcity = $conn->query("SELECT city FROM cities INNER JOIN albums ON cities.id=album_city WHERE albums.id=".$rowallpic['album_id']."");
                                        if ($allcity->num_rows > 0){
                                            while($rowallcity = $allcity->fetch_assoc()){
                                                $photocity = $rowallcity['city'];
                                                echo $rowallcity['city'];
                                            }
                                        } ?>,
                                        <?php
                                        $allcoun = $conn->query("SELECT countries.id AS coid, country FROM countries INNER JOIN albums ON countries.id=album_country WHERE albums.id=".$rowallpic['album_id']."");
                                        if ($allcoun->num_rows > 0){
                                            while($rowallcoun = $allcoun->fetch_assoc()){
                                                $photocountry = $rowallcoun['coid'];
                                                echo $rowallcoun['country'];
                                            }
                                        } ?>

                                    </span>
                                    <span>
<?php if ($rowallpic['img_privacy']==0) { ?>
    <i class="fa fa-globe fa-fw"></i>
<?php } else if ($rowallpic['img_privacy']==1) {?>
    <i class="fa fa-user fa-fw"></i>
<?php } else if ($rowallpic['img_privacy']==2) {?>
    <i class="fa fa-lock fa-fw"></i>
<?php } ?>
                                    </span>
                                    <button class="btn btn-white btn-xs pull-right"  data-toggle="modal" data-target="#editpics<?php echo $picid ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><i class="fa fa-pencil"></i></button>
                                </p>
                                <p><?php echo $rowallpic['img_desc'] ?></p></div>


                            <div class="panel panel-default">
                                <div class="view-all-comments">

                                        <button id="<?php echo $picid ?>" type="button" class="likephoto btn btn-white btn-sm">
                                            <i class="fa fa-thumbs-o-up fa-lg"></i>
                                        </button>

                                        <span class="likes pull-right padding-v-5-1"><i class="likephoto fa fa-thumbs-up fa-lg"></i>&emsp;10 likes</span>

                                </div>
                                <ul class="comments">

                                    <div style="max-height:200px; overflow-y: scroll;">

                                        <?php
                                        $phcom = $conn->query("SELECT comments_photos.id AS photocomid, photo_comment, photocom_at, photocom_by, photo_id, users.id AS userid, first_name, last_name, avatar FROM comments_photos INNER JOIN users ON photocom_by=users.id WHERE photo_id=$picid");
                                        if($phcom->num_rows > 0) {
                                            while($rowphcom=$phcom->fetch_assoc()) { ?>

                                                <li class="media">
                                                    <div class="media-left">
                                                        <?php if($rowphcom['photocom_by']==$row['id']) {?>
                                                        <a href="user_timeline.php?u=<?php echo $row['id'] ?>">
                                                            <?php } else { ?>
                                                            <a href="friend_profile.php?u=<?php echo $rowphcom['photocom_by'] ?>">
                                                                <?php }  ?>
                                                                <img src="<?php echo $rowphcom['avatar'] ?>" class="media-object" width="45">
                                                            </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <?php if ($rowphcom['photocom_by']==$row['id']) { ?>
                                                            <div class="pull-right dropdown" data-show-hover="li">
                                                                <a href="#" data-toggle="dropdown" class="toggle-button">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </a>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li><a href="#" onclick="document.getElementById('deletecom4').submit();">Delete</a></li>
                                                                </ul>
                                                            </div>
                                                            <form id="deletecom4" action="parse/delete_photocomments.php" method="post" class="hidden">
                                                                <input type="text" name="photoid" value="<?php echo $picid ?>">
                                                                <input type="text" name="photocomid" value="<?php echo $rowphcom['photocomid'] ?>">
                                                            </form>
                                                        <?php } ?>
                                                        <?php if($rowphcom['photocom_by']==$row['id']) {?>
                                                        <a href="user_timeline.php?u=<?php echo $row['id'] ?>"  class="comment-author pull-left">
                                                            <?php } else { ?>
                                                            <a href="friend_photos.php?u=<?php echo $rowphcom['photocom_by']; ?>"  class="comment-author pull-left">
                                                                <?php }

                                                                echo "<span>".$rowphcom['first_name']."</span>"; ?></a>
                                                            <span><?php echo $rowphcom['photo_comment'] ?></span>

                                                            <div class="comment-date">

                      <button id="<?php echo $rowphcom['photocomid'] ?>" type="button" class="likecompic btn btn-white btn-sm"><i class="fa fa-thumbs-o-up fa-lg"></i></button>

                                                                &emsp;&emsp;<span class="likes padding-v-5-1 pull-right"><i class="fa fa-thumbs-up fa-lg"></i>&ensp;3</span>
                                                                <span class="padding-v-5-1 pull-left"><?php echo $rowphcom['photocom_at'] ?></span></div>
                                                    </div>
                                                </li>



                                            <?php  }
                                        }



                                        ?>





                                    </div>



                                    <li class="comment-form">
                                        <form id="makecomment" name="makecomment" action="parse/comments_on_photos.php" method="post">
                                            <div class="input-group">

                          <span class="input-group-btn">
                   <img src="<?php echo $row['avatar'] ?>" width="35" class="media-object"/>
                </span>
                                                <select id="photopostid2" name="photoid" class="hidden"><option value="<?php echo $picid ?>"></option></select>
                                                <input id="photocomment2" type="text" name="phcomment" class="form-control" />

                                            </div>
                                        </form>
                                    </li>





                                </ul>
                            </div>


                        </div>


                    </div>


                </div>

            </div>
        </div>

        <!-- show all photos in the sidebar modal END -->

        <!-- edit/delete photos modal START -->


        <div class="modal fade" id="editpics<?php echo $picid ?>" role="dialog">

            <div class="modal-dialog" style="margin-top: 50px; min-width: 250px">


                <div class="modal-content" style="background-color: #e6ee9c">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;
                        </button>
                        <h4 class="modal-title" style="color: #013b68">Edit image <?php echo $rowallpic['img_title'] ?></h4>
                    </div>

                    <div class="modal-body">
                        <div class="panel panel-body" style="background-color: #faffcd">

                            <form role="form" name="editpics_form" action="parse/edit_photos.php" method="post" id="editpics_form">
                                <ul class="list-unstyled profile-about margin-none">
                                    <li class="padding-v-5">
                                        <div class="row form-group">
                                            <div class="col-sm-4"><span class="text-muted">Image title</span>
                                            </div>
                                            <div id="phototit" class="col-sm-8"><input
                                                        type="text" name="phototit"
                                                        maxlength="50" class="form-control" placeholder="<?php echo $rowallpic['img_title'] ?>"></div>

                                        </div>
                                    </li>


                                    <li class="padding-v-5">
                                        <div class="row form-group">
                                            <div class="col-sm-4"><span class="text-muted">Image description</span>
                                            </div>
                                            <div id="photodesc" class="col-sm-8"><input type="text" name="photodesc" maxlength="255" class="form-control" placeholder="<?php echo $rowallpic['img_desc'] ?>"></div>

                                        </div>
                                    </li>


                                    <li class="padding-v-5">
                                        <div class="row form-group">
                                            <div class="col-sm-4"><span class="text-muted">Image privacy</span>
                                            </div>
                                            <div class="col-sm-8">
                                                <select name="photoprivacy"
                                                        class="privacy1 btn btn-white form-control">
                                                    <option value="0"
                                                        <?php if ($rowallpic['img_privacy']==0) echo "selected"; ?>>&#xf0ac; &nbsp; Public
                                                    </option>
                                                    <option value="1"
                                                        <?php if ($rowallpic['img_privacy']==1) echo "selected"; ?>>&#xf007;&nbsp;Friends
                                                    </option>
                                                    <option value="2"
                                                        <?php if ($rowallpic['img_privacy']==2) echo "selected"; ?>>&#xf023; &nbsp; Only me</option>
                                                </select>
                                            </div>
                                    </li>


                                    <li class="padding-v-5">
                                        <div class="row form-group"><div class="col-sm-4"><span class="text-muted">Location</span></div>
                                            <div class="col-sm-4"><input type="text" name="photocity" class="form-control" maxlength="100" placeholder="<?php echo $photocity ?>"></div>
                                            <div class="col-sm-4">

                                                <?php
                                                $getcountry = "SELECT id, country FROM countries";
                                                $rescountry = mysqli_query($conn, $getcountry);
                                                if (mysqli_num_rows($rescountry) > 0) { ?>

                                                    <select name="photocountry" id="photocountry" class="form-control">

                                                        <option disabled>Country</option>

                                                        <?php while ($rowcountry = mysqli_fetch_assoc($rescountry)) { ?>

                                                            <option value="<?php echo $rowcountry['id'] ?>"

                                                                <?php if ($rowcountry['id'] == $photocountry) echo "selected";
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
<select name="picid" class="hidden"><option value="<?php echo $picid ?>"></option></select>

                                    <hr>

                                    <li class="padding-v-5" style="margin-top: 10px">
                                        <div class="row form-group">
                                            <div style="padding-right: 8px">
                                                <button type="button" name="cancel" id="cancel" class="btn btn-warning pull-right" data-dismiss='modal'><i class="fa fa-ban" style="color: white"></i></button></div>
                                            <div class="pull-right">&emsp;</div>
                                            <div><button type="button" name="delete" id="delete" class="btn btn-danger pull-right" data-toggle="modal" data-target="#delpics<?php echo $picid ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><i class="fa fa-trash" style="color: white"></i></button>
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

        <div class="modal fade" id="delpics<?php echo $picid ?>" role="dialog">
            <?php

            echo "<div class='modal-dialog modal-sm' style='margin-top: 150px; min-width: 250px'>

    <!-- Modal content-->
    <div class='modal-content' style='background-color: #d3a6b4'>

        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h5 class='modal-title' style='color: #013b68'>Delete image ".$rowallpic['img_title']."</h5>
        </div>

         <div class='modal-body'>
           <div class='panel panel-default text-center' style='background-color: #faffcd'>
           
            <form name='delpics_form' role='form' action='parse/delete_photos.php' method='post' class='priv_form'>

<div class='row'><h5 style='padding-left:8px'>Are you sure you want to delete image<br />".$rowallpic['img_title']."?</h5></div>

<div class='row text-center'>
       <select class='hidden' name='picid'><option value='".$picid."' selected></option></select>            
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


        <!-- edit/delete photos modal END -->



    <?php } } ?>