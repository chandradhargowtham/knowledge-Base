<!DOCTYPE html>
<html>
<head>
    <link href="style.css" type = "text/css" rel="stylesheet">
    <title>Home - Learn</title>
</head>
<body>

</body>
</html>
<?php

// In the text file BannerQuotes.txt( present in banner folder), each line is a quote.
// Below code shows a random line (random quote) everytime

$file=fopen("banner/BannerQuotes.txt", "r");
$lines = file("banner/BannerQuotes.txt");
$randValue=rand(0,1);

//echo "$randValue";
//echo $lines[$randValue];
$quote = $lines[$randValue];
fclose($file)

?>
<!DOCTYPE html>
<html>
<div class="BannerContainer">
<h1 id = "bannerQuote"><?php echo "$quote"; ?></h1>
<img id="img" src="images/banner/1.jpg" alt = "Banner Image"  width=100%>
</div>

</html>

<!-- Inline CSS for easy editing-->
<style>
img
{
	max-width: 100%;
	z-index: 1;
	position: relative;
}
h1
{
	z-index: 2;
	position: absolute;
	color: white;
	font-size: 2.5em;
	width: 80%;
	top:50%;
	left:10%;
	display: block;
}


@media only screen and (max-width: 600px) {
  h1 {
    transform: scale(0.5,0.5);
    color:white;
    overflow: hidden;
    top:80%;
    left:10%;
    display: block;
  }
}
@media only screen and (max-height: 500px) , (max-width: 400px) {
  h1 {
    transform: scale(0.3,0.3);
    color:white;
    overflow: hidden;
    top:80%;
    left:10%;
    display: block;
  }
}
@media only screen and (max-height: 400px), (max-width: 200px) {
  h1 {
    transform: scale(0.3,0.3);
    color:red;
    overflow: hidden;
    top:80%;
    display: none;
  }
}
</style>
<script language="javascript">
        function autoResizeDiv()
        {
            document.getElementById('img').style.height = window.innerHeight-220 +'px';
            
            ifdocument.getElementById('h1').style.height >(document.getElementById('img').style.height)
            {
            	document.getElementById('h1').style.display = "none";
            }
        }
        window.onresize = autoResizeDiv;
        autoResizeDiv();
    </script>