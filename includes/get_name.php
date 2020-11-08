<?php

if($u=='friend') {

    echo $rows['first_name'];
    echo "<br />";
    echo $rows['last_name'];

} else if ($u=='user') {

    echo $row['first_name'];
    echo "<br />";
    echo $row['last_name'];

}

?>