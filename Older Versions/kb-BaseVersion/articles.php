<?php
session_start();
if($_SESSION['loggedIn']!=true)
{
    header("Location: login.php");
}

?>
<?php include "header/header.php" ?>
<?php include "pageGenerator.php" ?>
<?php include "Styles/ArticleColor.php" ?>

<html>
<title>Articles</title>
<style>
#articlesheader {
    text-align: center;
    font-size: 26px;
    font-weight: 700;
    padding: 20px 0;
    margin-top: 30px;
    margin-bottom: 30px;
    color: #000000;
    background: #FFFFFF 0% 0% no-repeat padding-box;
    box-shadow: 0px 8px 40px #00000040;
    opacity: 1;
}
</style>
<?php 


echo "<section id=articlessection>";
echo "<h1 id=articlesheader>Articles</h1>";


$dir = "/articles/";
$a=scandir("articles/");

for($i=2;$i<9999;$i++)
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
</html>


