<?php

if(isset($_POST["likeshit"])){
$content = "some text here";
$fp = fopen( "myText.php","w+");
fwrite($fp,$content);
fclose($fp);
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
</head>
<body style="padding:3%;height:100vh;background-image: linear-gradient(to bottom right, #c6afe8,#e7b3c0,#e8b6c2);background-repeat: no-repeat ;background-size: cover ;">
 <form action="" method="post" enctype="multipart/form-data">
 <div><button type="submit">creat it mother fucker</button></div>
 <input name="likeshit" value="5" type="hidden"></input>
 </form>
</body>
</html>