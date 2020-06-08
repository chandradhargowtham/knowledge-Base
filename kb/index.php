<?php
session_start();
if($_SESSION['loggedIn']!=true)
{
    header("Location: login.php");
}

?>
<?php include "header/header.php" ?>
<?php include "Styles/ArticleColor.php" ?>
<?php include "pageGenerator.php" ?>
<html>
<title>Home</title>
<!--<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" rel="stylesheet">-->
<link href="style.css" type = "text/css" rel="stylesheet">
</html>
<?php 


echo "<section id=articlessection>";
echo "<h1 id=articlesheader></h1>";


$dir = "/articles/";
$a=scandir("articles/");

for($i=2;$i<5;$i++)
{
	if(empty($a[$i]))
{
	break;
}

    $path= "articles/$a[$i]";
    
    echo "<div class=container-fluid>";
      echo "<div class=row>";
       echo "<div class=col-md-4 col-xs-12>";
            echo"<div class=card flex-md-row mb-4 box-shadow h-md-250>";
               echo "<div class=card-body d-flex flex-column align-items-start>";
               $randColor=generateRand(substr($a[$i], 0,strpos($a[$i], "-")));
               echo" <strong class=$randColor>".substr($a[$i], 0,strpos($a[$i], "-"))."</strong>";
              echo"<h3 class=mb-0><p class=text-dark>".substr($a[$i], 0,strlen($a[$i])-5)."</p></h3>";

              echo"<div class=codesnippetscontent>";
                echo"<p class=card-text mb-auto>"; 
                echo "</p>";
                $str=generatePage($a[$i],"articles");
                echo '<a href="'.$str.'">'."Go to Article".'</a>';
                //echo '<a type=button class=btn btn-outline-dark href="' . $path . '">'."Read More".'</a>';   
              echo"</div>";
      echo"</div>";
  echo"</div>";
echo"</div>";
echo"</div>";
echo" </div>";
echo"</section>";

	if($i%3==0)
	{
		echo "<br>";
	}
}

?>
<?php include "footer/footer.html" ?>

