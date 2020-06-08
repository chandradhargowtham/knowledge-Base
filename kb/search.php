<?php
session_start();
if($_SESSION['loggedIn']!=true)
{
    header("Location: login.php");
}

?>
<?php include "header/header.php" ?>
<?php include "pageGenerator.php" ?>
<?php
echo "Click on the Search Symbol and press enter to search";
?>
<html>
    <link rel="stylesheet" href="search.css">
</html>



<div id="wrap">
  <form action="" autocomplete="on">
  <input id="search" name="search" type="text" placeholder="What are we looking for ?"><input id="search_submit" value="Search" type="submit">
  </form>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php

$category = $_GET["category"];
$searchQuery = $_GET["search"];
$folderName = "articles";
if(isset($searchQuery)){
$a=scandir($folderName."/");


for($i=2;$i<9999;$i++)
{
	
	if($a[$i]=="")
{
	break;
}


$str=generatePage($a[$i],$folderName);


if(stripos($str, $searchQuery))
	{
	$path= "codesnippets/$a[$i]";
	echo "<div class=container-fluid>";
      echo "<div class=row>";
       echo "<div class=col-md-4 col-xs-12>";
            echo"<div class=card flex-md-row mb-4 box-shadow h-md-250>";
               echo "<div class=card-body d-flex flex-column align-items-start>";
	//echo "<div class = article>";
	//echo '<p class="category">'
             echo" <strong class=d-inline-block mb-2 text-primary>".substr($a[$i], 0,strpos($a[$i], "-")).'</p>';
//echo "<p>"
echo"<h3 class=mb-0><p class=text-dark>".substr($a[$i], 0,strlen($a[$i])-5)."</p>";


echo '<a href="'.$str.'">'."Go to Article".'</a>';
echo"<div class=codesnippetscontent>";
                echo"<p class=card-text mb-auto>"; 
                echo "</p>";

echo "</div>";
echo"</div>";
  echo"</div>";
echo"</div>";
echo"</div>";
echo" </div>";
echo"</section>";
	if($i%4==0)
	{
		echo "<br>";
	}
}
}

echo "<br>End of results<br>";
}

?>


