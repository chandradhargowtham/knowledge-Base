<?php 
session_start();
if($_SESSION['loggedIn']!=true)
{
    header("Location: login.php");
}
?>
<?php include "header/header.php" ?>

<html>
<body>
  <form method="POST" action="admintools.php">

  </form>
  


 <div>
  <h2>Add content!</h2>
   <form action="admintools.php" method="POST">
     <div>
      
      <br><br>
       Enter Page Title: <input type="text" placeholder="Page Title" name="title">

     </div>
     <div>
         <select name="type">
             <option value="BigWiki">Wiki</option>
             
         </select>
         <select name="ArticleCategory">
    <option>Wiki</option>
    <option>Books</option>
    <option>Movies</option>
    <option>GeneralTech</option>
    <option>Programming</option>
    <option>Science</option>
    <option>Medicine</option>
    <option>Dictionary</option>
  </select><br>
     </div>
     <div>
       <textarea cols="50" rows="10" name="content">

       </textarea>
     </div>
     <input type="submit" value="Publish">
  </form>
  <p><br><br><a href="image.php" target="_blank">Click here </a>to upload and add an image.</p>

 </div>
</body>
</html>

<?php 

if(isset($_POST["title"]))
{

  extract($_REQUEST);
    $type=$_POST["type"];
    $title=$_POST["title"];
    
    $ArticleCategory = $_POST["ArticleCategory"];
    $articleContent=$_POST["content"];

    $headingPartStart = "<h1>";
    $headingPartEnd = "</h1>";
       
    $bodyPartStart= "<p>";
    $bodyPartEnd= "</p>";


  
  if($type=="BigWiki")
  {
  
    $articleName= $ArticleCategory." - ".$title;
    $content=fopen("articles/$articleName.html","w");

    $pageTitle='<head><title>'.'$title'.'</title></head>';
    $headingVar= $headingPartStart.$title.$headingPartEnd;
    $bodyVar = $bodyPartStart.$articleContent.$bodyPartEnd;
    $cssVar =   '<link href="articlesStyle.css" type = "text/css" rel="stylesheet">';

if(strpos($articleContent, "\n"))
        {
          $newBody=str_replace("\n","<br>",$articleContent);    
        }
    $bodyVar = $bodyPartStart.$newBody.$bodyPartEnd;
    fwrite($content, "<html>");
    fwrite($content, $pageTitle);
    fwrite($content,  $cssVar );
    fwrite($content, $headingVar);
    fwrite($content, $bodyVar);
    fwrite($content, "</html>");
    fclose($content);
    echo "Article published.";
  }
}


?>


<style type="text/css">
  p,form,h2
  {
    margin-left: 20%;
    margin-right: 20%;
  }
  textarea
  {
    width:95%;
  }
  
</style>