<?php

$adm = $conn->query("SELECT id FROM users WHERE email='$email'");
if($adm->num_rows > 0) {
    while ($rowadm = $adm->fetch_assoc()){
        $admin = $rowadm['id'];
    }
}

if ($u=='friend') {

$bdaypr = $conn->query("SELECT bdaymonth_privacy FROM bdaymonthprivacy WHERE user_id=$id");
if($bdaypr->num_rows > 0){
    while($rowbday = $bdaypr->fetch_assoc()){
        $bdaymonth_privacy = $rowbday['bdaymonth_privacy'];
    }
}

    $byearpr = $conn->query("SELECT byear_privacy FROM byearprivacy WHERE user_id=$id");
    if($byearpr->num_rows > 0){
        while($rowbyear = $byearpr->fetch_assoc()){
            $byear_privacy = $rowbyear['byear_privacy'];
        }
    }

    $bdate = $conn->query("SELECT day_id, month, year FROM months INNER JOIN users ON months.id=month_id INNER JOIN years ON years.id=year_id WHERE users.id=$id");
    if($bdate->num_rows > 0) {
        while ($rowbdate=$bdate->fetch_assoc()) {
$bday = $rowbdate['day_id'];
$bmonth = $rowbdate['month'];
$year = $rowbdate['year'];
        }

    }


if($status==0) {
        if ($bdaymonth_privacy==0 && $byear_privacy==0){ ?>

            <li><i class="icon-cake"></i> <?php echo $bday ?>&nbsp<?php echo $bmonth ?>&nbsp<?php echo $byear?></li>

     <?php   } else if ($bdaymonth_privacy==0 && $byear_privacy==1) { ?>

            <li><i class="icon-cake"></i> <?php echo $bday ?>&nbsp<?php echo $bmonth ?></li>

    <?php    } else if ($bdaymonth_privacy==1 && $byear_privacy==0) { ?>

            <li><i class="icon-cake"></i> <?php echo $byear?></li>

   <?php     }


} else if ($status==1) {

        if ($bdaymonth_privacy!=2 && $byear_privacy==2) { ?>

    <li><i class="icon-cake"></i> <?php echo $bday ?>&nbsp<?php echo $bmonth ?>&nbsp<?php echo $byear?></li>

  <?php  } else if ($bdaymonth_privacy==1 && $byear_privacy==0) {


        }



    }


} else if ($u=='user') {

    $bdate = $conn->query("SELECT day_id, month, year FROM months INNER JOIN users ON months.id=month_id INNER JOIN years ON years.id=year_id WHERE users.id=$admin");
    if($bdate->num_rows > 0) {
        while ($rowbdate=$bdate->fetch_assoc()) {
            $bday = $rowbdate['day_id'];
            $bmonth = $rowbdate['month'];
            $byear = $rowbdate['year'];
        }

    } ?>

    <li><i class="icon-cake"></i> <?php echo $bday ?>&nbsp<?php echo $bmonth ?>&nbsp<?php echo $byear?></li>

<?php } ?>