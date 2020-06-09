<?php
session_start();
if($_SESSION['loggedIn']!=true)
{
    header("Location: login.php");
}

?>
<?php include "header/header.php" ?>
<?php

$newContent = $_POST['content'];
	$fileRead=fopen("notes/notes.txt", "r");

	while (($line = fgets($fileRead))!== false)
	{
		$buffer .= $line;
	}
	fclose($fileRead);
	

if (isset($_POST['submit'])) 
{

	$fileWrite=fopen("notes/notes.txt", "w");

	//$finalContent = $buffer.PHP_EOL.$newContent;
	$finalContent = $newContent;
	//echo $finalContent;
	fwrite($fileWrite, $finalContent);
	fclose($fileWrite);
	//echo '<script>location.reload();</script>';
	echo '<meta http-equiv="refresh" content="1">';

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Notes</title>
</head>
<body>
<form action="" method="POST">
	<textarea name="content" id="content" rows ="20"><?php echo $buffer; ?></textarea>
	<br><input type="submit" name="submit" value="Save Note!">
</form>
</body>
</html>

<style type="text/css">
	form
	{
		margin-top: 2%;
		margin-left: 2.5%;
		margin-right: 2.5%;

	}
	textarea
	{
		width: 95%;
	}
</style>
<?php include "footer/footer.html" ?>

