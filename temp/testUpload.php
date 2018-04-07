
<?php
include 'class/fileUploader.class.php';
?>
<!DOCTYPE html>
<html>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="images" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>


<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$test = new fileUploader("uploads/","images");
		print_r($test->getErrors());
		$test->upload();
	}
?>