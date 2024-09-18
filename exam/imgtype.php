<?php
	$path="images/1.jpg";
	if(getimagesize($path))
	{
?>
	<img src="<?php echo $path?>" />
<?php
	}
	else
		echo 'No';
?>