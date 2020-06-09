<?php
if(isset($_POST['submit']))
{
$email=$_POST['userId'];
$password=$_POST['password'];
$resetCode=$_POST['resetCode'];
//below code is for picking up password reset code
$codeCheck=fopen("passwordResetRequest.txt", "r");
while (($lines = fgets($codeCheck)) !== false)
 {
	$userDetails= explode(":", $lines);
	if($userDetails[0]==$email && $userDetails[1]==$resetCode)
	{
		$continue=true;
	}

 }
fclose($codeCheck);
//regarding overwriting new password
if($continue)
{
$fileRead=fopen("authDB.txt", "r");
$readContent="";
while (($line = fgets($fileRead)) !== false)
 {
	$readContent .=$line;
 }
 
 fclose($fileRead);
 $fileReader=fopen("authDB.txt", "r");
 while (($liner = fgets($fileReader)) !== false)
 {
 	
	$userDetails= explode(":", $liner);
	
	if($userDetails[0]==$email)
	{
		$oldPwd=$userDetails[1];
	}
	
	break;
 }
 
	$newContent=str_replace($oldPwd, md5($password), $readContent);
 fclose($fileReader);
 
 $fileWrite=fopen("authDB.txt", "w");
 
fwrite($fileWrite, $newContent);
fclose($fileWrite);
echo "<h2>Password Changed Successfully.</h2>";
 
 // Now, it deletes the temp reset code so that  it will not work anymore.
$codeCheck=fopen("passwordResetRequest.txt", "r");
while (($lines = fgets($codeCheck)) !== false)
 {
	$userDetails= explode(":", $lines);
	if($userDetails[0]==$email)
	{
		$tempContent.=$lines;
	}

 }
 //echo "temp".$tempContent;
fclose($codeCheck);
// above lines create a copy of exisitng data- below lines only remove this entry and keep others intact.
$codeCheck=fopen("passwordResetRequest.txt", "w");
while (($lines = fgets($codeCheck)) !== false)
 {
	$userDetails= explode(":", $lines);
	if($userDetails[0]==$email)
	{
		$oldResetCode=$lines;
	}
	$newContent=str_replace($lines,"",$tempContent);
 fwrite($codeCheck, $newContent);
fclose($codeCheck);
 }
 

}
else
	{
		echo "<h2>Invalid Reset Code.</h2>";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reset password</title>
</head>
<body>
<form method="POST" class="loginbox" >
	<br>
	<h2>Reset Password</h2>
	<p>Enter Email: <input type="text" name="userId"></p>
	<p>Enter New Password: <input type="password" name="password"></p>
	<p>Enter Reset Code: <input type="text" name="resetCode"></p>
		<input type="submit" name="submit" value="Change Password">
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