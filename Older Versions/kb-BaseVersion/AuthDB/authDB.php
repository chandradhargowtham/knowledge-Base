<?php


function getAuthData($user,$pwd)
{
$submittedUserName=$user;
$submittedPwd =$pwd;

$file=fopen("AuthDB/authDB.txt", "r");

 while (($line = fgets($file)) !== false)
 {
 	
 	$userDetails= explode(":", $line);
 	//echo "submi: ".$submittedUserName." and ".$submittedPwd;
 	//echo "DB: ".$userDetails[0]." and ".$userDetails[1]."|";

 	if($userDetails[0]==$submittedUserName && $userDetails[1]==md5($submittedPwd))
 	{
 		//echo "ok";
 		$auth=true;
 	}
}
fclose($file);
return $auth;
}
?>