<html>
<?php 

generatePage($fileName,$folderName);
function generatePage($fileName,$folderName)
{
	$str='Zarticle='.substr($fileName, 0,strlen($fileName)-4)."php";
	//echo $str;
	$file=fopen($str, "w");
$lines = '<?php include "header/header.php" ?>'.'<br><br><br>'.'<?php include "'.$folderName.'/'.$fileName.'" ?>'.'<?php include "footer/footer.html" ?>';
	fwrite($file, $lines);
	fclose($file);
	
	return $str;
//echo "Writing Done";


 
}

?>
</html>









