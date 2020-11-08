<?php

$cover = $conn->query("SELECT id, album_title, album_desc, album_city, album_country, created_at, created_by, album_thumb, album_cat, album_privacy FROM albums WHERE created_by=$frindex ORDER BY album_cat ASC");

if ($cover->num_rows > 0) {
$i=0;
    while ($rowcover = $cover->fetch_assoc()) {
$i++;

?>
<div class="item">
                                        <div class="media media-clearfix-xs-min">
                                            <div class="media-left">
                                                <a href="#albums<?php echo $i ?>" data-toggle="collapse"><img src="<?php echo $rowcover['album_thumb'] ?>" alt="" class="media-object" /></a>
                                            </div>

                                            <div class="media-body">
                                                <h4 class="media-heading"><?php echo $rowcover['album_title'] ?>
   <label for="addphotos<?php echo $rowcover['id'] ?>" class="btn btn-white btn-xs pull-right">
   <i class="fa fa-plus"></i>
   </label>

 <button class="btn btn-white btn-xs pull-right" data-toggle="modal" data-target="#editalbum<?php echo $rowcover['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><i class="fa fa-pencil"></i></button></h4>

 <form id="addphotos_form" name="addphotos_form" action="parse/add_photos.php" method="post" enctype="multipart/form-data">
     <select name="albumid" class="hidden"><option value="<?php echo $rowcover['id'] ?>"></option></select>
<input id="addphotos<?php echo $rowcover['id'] ?>" name="addphotos[]" type="file" style="display: none" onchange="this.form.submit()" multiple/>
 </form>


   <div class="meta"><span><i class="fa fa-calendar-o fa-fw"></i> <?php echo $rowcover['created_at'] ?> </span>

 <span>

     <i class="fa fa-map-marker fa-fw"></i><span><?php include ('includes/get_albumcity.php'); include ('includes/get_albumcountry.php'); ?></span>

 </span>

 <span>
 <?php
 if ($rowcover['album_privacy'] == 0)  echo "<i class='fa fa-globe fa-fw'></i>";
 if ($rowcover['album_privacy'] == 1)  echo "<i class='fa fa-user fa-fw'></i>";
 if ($rowcover['album_privacy'] == 2)  echo "<i class='fa fa-lock fa-fw'></i>";
 ?>
 </span>

                                                </div>
                                                <p><?php echo $rowcover['album_desc'] ?></p>

                                            </div>
                                        </div>
                                    </div>





        <?php
    }

}

?>
