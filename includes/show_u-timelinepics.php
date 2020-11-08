
<div class="modal fade modal-fullscreen footer-to-bottom" id="postPics<?php echo $i ?>" role="dialog"  tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog animated zoomInLeft">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">



                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <?php if ($rowpostpic['photopost_title']== "") { ?>
    <h4 class="modal-title">Timeline photos</h4>
<?php } else { ?>
    <h4 class="modal-title"><?php echo $rowpostpic['photopost_title'] ?></h4>
<?php }  ?>
</div>


<div class="modal-body">


    <div class="col-md-8 col-sm-12 col-xs-12 mediacol">

        <img class="img-responsive" src="<?php echo $rowpostpic['photopost_src'] ?>" alt=""/>

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

        <a href="user_timeline.php?u=<?php echo $row['id'] ?>"><h4><img src="<?php echo $row['avatar'] ?>" alt="" class="img-circle" width="40px"/> <?php echo "&nbsp;"; echo $row['first_name']; echo " "; echo $row['last_name'] ?></h4></a>

        <div class="meta"><p><span><i class="fa fa-calendar-o fa-fw"></i><?php echo $rowpostpic['added_at'] ?></span>

                <?php
                $city = $conn->query("SELECT city FROM cities INNER JOIN posts ON cities.id=post_city WHERE posts.id=".$rowpostpic['postid']."");
                if($city->num_rows > 0){
                    while($rowcity = $city->fetch_assoc()){
                        $cityname=$rowcity['city'];
                    }
                }

                $country = $conn->query("SELECT country FROM ccountries INNER JOIN posts ON countries.id=post_ccountry WHERE posts.id=".$rowpostpic['postid']."");
                if($city->num_rows > 0){
                    while($rowcountry = $country->fetch_assoc()){
                        $countryname=$rowcountry['country'];
                    }
                }
                ?>



                <span><i class="fa fa-map-marker fa-fw"></i><?php $cityname.", ".$countryname ?></span>

                <?php if($rowpostpic['post_privacy']==0) { ?>
                    <span><i class="fa fa-globe fa-fw"></i></span>
                <?php } else if ($rowpostpic['post_privacy']==1) { ?>
                    <span><i class="fa fa-user fa-fw"></i></span>
                <?php } else if ($rowpostpic['post_privacy']==2) { ?>
                    <span><i class="fa fa-lock fa-fw"></i></span>
                <?php } ?>
                <a href="#" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></a>
            </p>
            <p><?php echo $rowpostpic['body'] ?></p></div>


        <div class="panel panel-default">

            <div class="view-all-comments">
                <a href="#">
                    <i class="fa fa-comments-o"></i> View all
                </a>
                <span>10 comments</span>

            </div>


            <ul class="comments">




            </ul>
        </div> <!-- panel default -->



    </div> <!-- infocolon -->




</div> <!-- modal body -->


</div> <!-- modal content -->
</div> <!--modal dialog -->
</div> <!-- modal fade -->

