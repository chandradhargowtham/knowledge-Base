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
  <title>Upload your files</title>
</head>
<body>
  <form enctype="multipart/form-data" action="image.php" method="POST">
    <p>Upload your file (max file size is 2MB)</p>
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Upload"></input>
  </form>
</body>
</html>
<?PHP
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "customImages/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    $fileName=$_FILES['uploaded_file']['name'];
    $userfile_extn = strtolower(substr($fileName, strlen($fileName)-3));

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      if($_FILES['uploaded_file']['size']<2*1048576){
        if($userfile_extn == 'png' || $userfile_extn == 'jpg' || $userfile_extn == 'gif' || $userfile_extn == 'peg')
        {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";

      $string='<img src="'.$path.'" width="500" height="400"><br>';
      echo "<input type='text' value='$string''>";
    }else
    {
      echo "Wrong format - Only Jpg,Jpeg,png and gif formats are supported.";
    }
    }else
    {
      echo "size".$_FILES['uploaded_file']['size'];
    }
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>