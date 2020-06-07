<?php
if(isset($_POST['adminpwd']))
{
$Username1=$_POST['userId'];
$password1=$_POST['pwd'];
$adminpwd1=$_POST['adminpwd'];

if ($adminpwd1=="pwd") 
{
	$file=fopen("authDB.txt", "r");
	while (($line = fgets($file)) !== false)
	{
		//echo $line;
		$userDetails= explode(":", $line);
		//echo $userDetails[0]."l";
		if($userDetails[0]== $Username1)
		{
			echo "<h2>username already exists. Try different username.</h2>";
		}
		else
		{
			fclose($file);
			$hashedPassword=md5($password1);
			$newestFile=fopen("authDB.txt", "a");
			//fwrite($newestFile, $existingStuff."\n");
			fwrite($newestFile, PHP_EOL.$Username1.":".$hashedPassword.":");
			fclose($newestFile);
			echo "<h2>Account Created Successfully.</h2>";
			break;
		}
	}

}
else
{
	echo "<h2>Admin Password Missing.</h2>";
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>New Account</title>
</head>
<body>
<form method="POST" class="loginbox" >
	<br>
	<h2>Create Account</h2>
	<p>Enter Email: <input type="text" name="userId"></p>
	<p>Enter Password :  <input type="password" name="pwd"></p>
	<p>Admin Password :  <input type="password" name="adminpwd"></p>
	<input type="submit" name="submit" value="Create Account">
</form>
</body>
</html>

<style type="text/css">
	.loginbox
	{
		border: 2px dotted black;
		display: inline-block;
		margin: 10px;
	}
	form
	{
		padding: 10px;
		margin-left: 10%;
		margin-right: 10%;
		width: 90%;
	}
	h2
	{
		background-color: black;
		padding: 20px;
		color: white;
	}
</style>