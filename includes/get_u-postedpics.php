<?php

$postpic = $conn->query("SELECT id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id FROM photos WHERE album_id=2 AND uploaded_by=$frindex");

if ($postpic->num_rows > 0) {

    while ($rowpostpic = $postpic->fetch_assoc()) {

        ?>

        <div class="item col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive"
                     src="<?php echo $rowpostpic['img_thumb'] ?>"
                     alt="" width="300px" data-toggle="modal" data-target="#postPics<?php echo $i ?>">
            </a>
        </div>

        <div class="modal fade modal-fullscreen footer-to-bottom" id="postPics<?php echo $i ?>" role="dialog"  tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog animated zoomInLeft">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <?php
                        $alb = $conn->query("SELECT album_title FROM albums INNER JOIN photos ON albums.id=photos.album_id WHERE photos.id=".$rowpostpic['id']."");
                        if ($alb->num_rows > 0) {
                            while ($rowalb = $alb->fetch_assoc()){

                                ?>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <?php if ($rowpostpic['img_title']== "") { ?>
                                    <h4 class="modal-title"><?php echo $rowalb['album_title'] ?></h4>
                                <?php } else { ?>
                                    <h4 class="modal-title"><?php echo $rowpostpic['img_title'] ?></h4>
                                <?php }    }
                        } ?>
                    </div>


                    <div class="modal-body">


                        <div class="col-md-8 col-sm-12 col-xs-12 mediacol">

                            <img class="img-responsive" src="<?php echo $rowpostpic['img_src'] ?>" alt=""/>

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

                            <h4><img src="<?php echo $row['avatar'] ?>" alt="" class="img-circle" width="40px"/> <?php echo "&nbsp;"; echo $row['first_name']; echo " "; echo $row['last_name'] ?></h4>

                            <div class="meta"><p><span><i class="fa fa-calendar-o fa-fw"></i> 31 Oct 2014 </span><span><i class="fa fa-map-marker fa-fw"></i>Amsterdam, NL </span><span><i class="fa fa-globe fa-fw"></i></span>
                                    <a href="#" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></a>
                                </p>
                                <p>Description</p></div>


                            <div class="panel panel-default">
                                <div class="view-all-comments">
                                    <a href="#">
                                        <i class="fa fa-comments-o"></i> View all
                                    </a>
                                    <span>10 comments</span>

                                </div>
                                <ul class="comments">
                                    <li class="media">
                                        <div class="media-left">
                                            <a href="">
                                                <img src="images/people/50/guy-5.jpg" class="media-object">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="pull-right dropdown" data-show-hover="li">
                                                <a href="#" data-toggle="dropdown" class="toggle-button">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Edit</a></li>
                                                    <li><a href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                            <a href="" class="comment-author pull-left">Bill D.</a>
                                            <span>Hi Mary, Nice Party</span>
                                            <div class="comment-date"><a><i class="fa fa-thumbs-up fa-fw"></i></a>&emsp;<a><i class="fa fa-comment fa-fw"></i></a>&emsp;<i class="fa fa-thumbs-o-up fa-lg"></i>&ensp;3<span class="pull-right">21st September at 21:00</span></div>
                                            <ul class="comments">
                                                <li class="media">
                                                    <div class="media-left">
                                                        <a href="">
                                                            <img src="images/people/50/guy-5.jpg" class="media-object" style="width:30px">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="pull-right dropdown" data-show-hover="li">
                                                            <a href="#" data-toggle="dropdown" class="toggle-button">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">Edit</a></li>
                                                                <li><a href="#">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                        <a href="" class="comment-author pull-left">Bill D.</a>
                                                        <span>Hi Mary, Nice Party</span>
                                                        <div class="comment-date"><a><i class="fa fa-thumbs-up fa-fw"></i></a>&emsp;<i class="fa fa-thumbs-o-up fa-lg"></i>&ensp;3<span class="pull-right">21st September at 21:00</span></div>


                                                    </div>


                                                </li>
                                                <li class="media">
                                                    <div class="media-left">

                                                        <a href=""><img src="<?php echo $row['avatar'] ?>" class="media-object" width="30px"/></a>

                                                    </div>
                                                    <div class="media-body">
                                                        <input type="text" class="form-control" placeholder="Write a comment"/>

                                                    </div>

                                                </li>


                                            </ul>






                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-left">
                                            <a href="">
                                                <img src="images/people/50/woman-5.jpg" class="media-object">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="pull-right dropdown" data-show-hover="li">
                                                <a href="#" data-toggle="dropdown" class="toggle-button">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Edit</a></li>
                                                    <li><a href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                            <a href="" class="comment-author pull-left">Mary</a>
                                            <span>Thanks Bill</span>
                                            <div class="comment-date">2 days</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-left">
                                            <a href="">
                                                <img src="images/people/50/guy-5.jpg" class="media-object">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="pull-right dropdown" data-show-hover="li">
                                                <a href="#" data-toggle="dropdown" class="toggle-button">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Edit</a></li>
                                                    <li><a href="#">Delete</a></li>
                                                </ul>
                                            </div>
                                            <a href="" class="comment-author pull-left">Bill D.</a>
                                            <span>What time did it finish?</span>
                                            <div class="comment-date">14 min</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-left">

                                            <a href=""><img src="<?php echo $row['avatar'] ?>" class="media-object" width="50px"/></a>

                                        </div>
                                        <div class="media-body">
                                            <input type="text" class="form-control" placeholder="Write a comment"/>

                                        </div>

                                    </li>
                                </ul>
                            </div>






                        </div>




                    </div>


                </div>

            </div>
        </div>


        <?php
    }

    echo "</div>";
}
?>