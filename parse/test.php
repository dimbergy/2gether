<?php

$name = "image.jpg";
$random_name = rand();

$path = "../users/$random_name";
$path = $path .basename($name);
echo $path;

 ?>

    <script language="javascript" type="text/javascript">
        alert('<?php echo $path ?>');
		window.location = '../user_photos.php';
	</script>
