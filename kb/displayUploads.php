<?php
session_start();
if($_SESSION['loggedIn']!=true)
{
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Show Uploads</title>
</head>
<body>
	<br>
<form action="" method="POST">
	<input type="submit" name="submit" value="Show Uploads">
</form>
</body>
</html>
<?php
if (isset($_POST['submit'])) 
{
	$a=scandir("uploads");

	for($i=2;$i<count($a);$i++) 
	{
		echo '<a href="uploads/'.$a[$i].'">'.$a[$i]."</a>"."<br>";
	}

}
?>
