<?php

if ($u=='friend') {

    $cov = $conn->query("SELECT img_src FROM photos INNER JOIN albums ON album_id=albums.id WHERE photos.uploaded_by=" . $rows['id'] . " AND img_thumb=album_thumb AND album_cat=1");

} else if ($u=='user') {

    $cov = $conn->query("SELECT img_src FROM photos INNER JOIN albums ON album_id=albums.id WHERE photos.uploaded_by=" . $row['id'] . " AND img_thumb=album_thumb AND album_cat=1");

}


if ($cov->num_rows > 0) {
    while($rowcov = $cov->fetch_assoc()) {

        echo "<img src='".$rowcov['img_src']."' alt='cover'/>";

    }

} else {

    echo "<img src='images/cover.jpg' alt='cover' />";
}


?>