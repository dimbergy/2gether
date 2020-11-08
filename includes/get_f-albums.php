<?php

$cover = $conn->query("SELECT id, album_title, album_desc, album_city, album_country, created_at, created_by, album_thumb, album_cat, album_privacy FROM albums WHERE created_by=$id AND album_privacy!=2 ORDER BY album_cat ASC");

if ($cover->num_rows > 0) {
    $i=0;
    while ($rowcover = $cover->fetch_assoc()) {
        $i++;

        if ($rowcover['album_privacy']==0) {
            ?>
            <div class="item">
                <div class="media media-clearfix-xs-min">
                    <div class="media-left">
                        <a href="#albums<?php echo $i ?>" data-toggle="collapse"><img
                                    src="<?php echo $rowcover['album_thumb'] ?>" alt="" class="media-object"/></a>
                    </div>

                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $rowcover['album_title'] ?></h4>


                        <div class="meta"><span><i
                                        class="fa fa-calendar-o fa-fw"></i> <?php echo $rowcover['created_at'] ?> </span>

                            <span>

     <i class="fa fa-map-marker fa-fw"></i><span><?php include('includes/get_albumcity.php');
                                    include('includes/get_albumcountry.php'); ?></span>

 </span>

                            <span>
 <?php
 if ($rowcover['album_privacy'] == 0) echo "<i class='fa fa-globe fa-fw'></i>";
 if ($rowcover['album_privacy'] == 1) echo "<i class='fa fa-user fa-fw'></i>";
 if ($rowcover['album_privacy'] == 2) echo "<i class='fa fa-lock fa-fw'></i>";
 ?>
 </span>

                        </div>
                        <p><?php echo $rowcover['album_desc'] ?></p>

                    </div>
                </div>
            </div>


            <?php
        } else {

            if ($status==1) { ?>

                <div class="item">
                    <div class="media media-clearfix-xs-min">
                        <div class="media-left">
                            <a href="#albums<?php echo $i ?>" data-toggle="collapse"><img
                                        src="<?php echo $rowcover['album_thumb'] ?>" alt="" class="media-object"/></a>
                        </div>

                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $rowcover['album_title'] ?></h4>


                            <div class="meta"><span><i
                                            class="fa fa-calendar-o fa-fw"></i> <?php echo $rowcover['created_at'] ?> </span>

                                <span>

     <i class="fa fa-map-marker fa-fw"></i><span><?php include('includes/get_albumcity.php');
                                        include('includes/get_albumcountry.php'); ?></span>

 </span>

                                <span>
 <?php
 if ($rowcover['album_privacy'] == 0) echo "<i class='fa fa-globe fa-fw'></i>";
 if ($rowcover['album_privacy'] == 1) echo "<i class='fa fa-user fa-fw'></i>";
 if ($rowcover['album_privacy'] == 2) echo "<i class='fa fa-lock fa-fw'></i>";
 ?>
 </span>

                            </div>
                            <p><?php echo $rowcover['album_desc'] ?></p>

                        </div>
                    </div>
                </div>





   <?php         }

        }
    }
}

?>
