<?php
session_start();
if($_SESSION['loggedIn']!=true)
{
    header("Location: login.php");
}

?>
<?php include "header/header.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload Files</title>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
	<input type="file" name="upload">
	<input type="submit" name="submit" value="Upload">
</form>
</body>
</html>
<?php
if (isset($_POST['submit']))
{
	$file=$_FILES['upload']['name'];

	if(move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/".$file))
	{
		echo "success<br>";
	}
	else
	{
		echo "failed<br>";
	}
}
?>
<?php include "displayUploads.php" ?>
<?php include "footer/footer.html" ?>
<style type="text/css">
	form
	{
		margin:5%;
	}
</style>