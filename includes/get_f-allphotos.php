<?php

$allpic = $conn->query("SELECT id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id FROM photos WHERE uploaded_by=$id AND img_privacy!=2");

if ($allpic->num_rows > 0) {
    $i=0;

    while ($rowallpic = $allpic->fetch_assoc()) {
        $i++;

        $picid = $rowallpic['id'];

        if($rowallpic['img_privacy']==0) {
        ?>

        <div class="item col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive"
                     src="<?php echo $rowallpic['img_thumb'] ?>"
                     alt="" width="300px" data-toggle="modal" data-target="#allPics<?php echo $i ?>">
            </a>
        </div>

            <?php

        } else {
            if ($status==1) { ?>



                <div class="item col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#">
                        <img class="img-responsive"
                             src="<?php echo $rowallpic['img_thumb'] ?>"
                             alt="" width="300px" data-toggle="modal" data-target="#allPics<?php echo $i ?>">
                    </a>
                </div>


  <?php          }

        }





            ?>


        <div class="modal fade modal-fullscreen footer-to-bottom" id="allPics<?php echo $i ?>" role="dialog"  tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog animated zoomInLeft">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <?php
                        $alb = $conn->query("SELECT albums.id AS albumid, album_title, album_city, album_country FROM albums INNER JOIN photos ON albums.id=photos.album_id WHERE photos.id=".$rowallpic['id']."");
                        if ($alb->num_rows > 0) {
                            while ($rowalb = $alb->fetch_assoc()){

                                ?>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <?php if ($rowallpic['img_title']== "") { ?>
                                    <h4 class="modal-title"><?php echo $rowalb['album_title'] ?></h4>
                                <?php } else { ?>
                                    <h4 class="modal-title"><?php echo $rowallpic['img_title'] ?></h4>
                                <?php }    }
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

                            <a href="friend_profile.php?u=<?php echo $id ?>"><h4><img src="<?php echo $rows['avatar'] ?>" alt="Bill" class="img-circle" width="40px"/> <?php echo "&nbsp;"; echo $rows['first_name']; echo " "; echo $rows['last_name'] ?></h4></a>

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

                                </p>
                                <p><?php echo $rowallpic['img_desc'] ?></p></div>


                            <div class="panel panel-default">
                                <div class="view-all-comments">


                                        <button id="<?php echo $picid ?>" type="button" class="likephoto btn btn-white btn-sm">
                                            <i class="fa fa-thumbs-o-up fa-lg"></i>
                                        </button>

                                        <span class="likes pull-right padding-v-5-1"><i class="fa fa-thumbs-up fa-lg"></i>&emsp;10 likes</span>



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
                                                                    <li><a href="#" onclick="document.getElementById('deletecom5').submit();">Delete</a></li>
                                                                </ul>
                                                            </div>
                                                            <form id="deletecom5" action="parse/delete_photocomments.php" method="post" class="hidden">
                                                                <input type="text" name="photoid" value="<?php echo $picid ?>">
                                                                <input type="text" name="photocomid" value="<?php echo $rowphcom['photocomid'] ?>">
                                                            </form>
                                                        <?php } ?>
                                                        <?php if($rowphcom['photocom_by']==$row['id']) {?>
                                                        <a href="user_timeline.php?u=<?php echo $row['id'] ?>"  class="comment-author pull-left">
                                                            <?php } else { ?>
                                                            <a href="friend_profile.php?u=<?php echo $rowphcom['photocom_by']; ?>"  class="comment-author pull-left">
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
                                                <select id="photopostide3" name="photoid" class="hidden"><option value="<?php echo $picid ?>"></option></select>
                                                <input id="photocomment3" type="text" name="phcomment" class="form-control" />

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

        <!-- all photos modal end -->



        <?php


    }

    echo "</div>";
}



?>