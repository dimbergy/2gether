<?php
$user = $conn->query("SELECT id FROM users WHERE email='$email'");
if($user->num_rows > 0){
    while($rowuser=$user->fetch_assoc()){

        $prof = $rowuser['id'];
?>


        <div class="sidebar-block">
            <div class="sidebar-photos">
                <ul>

                    <?php

                    $allpic = $conn->query("SELECT id, img_thumb, img_src, img_title, img_desc, uploaded_by, uploaded_at, img_privacy, album_id FROM photos WHERE uploaded_by=$prof");

                    if ($allpic->num_rows > 0) {
                $i=0;
                    while ($rowallpic = $allpic->fetch_assoc()) {
                $i++;

                    ?>

                    <li>
                        <a href="" data-toggle="modal" data-target="#allsidePics<?php echo $i ?>">
                            <img src="<?php echo $rowallpic['img_thumb'] ?>" alt="<?php echo $rowallpic['id'] ?>"/>
                        </a>
                    </li>

                        <?php
                    }

                    }

                    ?>


                </ul>

                <a href="user_photos.php?u<?php echo $row['id'] ?>" class="btn btn-inverse btn-xs">view all</a>
            </div>
        </div>





        <?php


    }
}



?>



