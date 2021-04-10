<?php

require('../../db.php');
@mysqli_set_charset($conn,"utf8");
 $id=@$_GET['id'];
 $result =mysqli_query($conn,"SELECT * FROM `all_books` WHERE id='$id'");
 $row=@mysqli_fetch_assoc($result);

 @$name=$row['name'];
 @$numberofpages=$row['numberofpages'];
 @$numberofdownloads=$row['numberofdownloads'];
 @$yearofedition=$row['yearofedition'];
 @$category=$row['category'];
 @$imglink=$row['imglink'];
 @$pdflink=$row['pdflink'];
 @$aboutTheBook=$row['aboutTheBook'];
 @$audiolink=$row['audiolink'];
 @$author=$row['author'];
 @$authorofthis=@mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `authors` WHERE id='$author'"));
 @$size=number_format(@filesize($pdflink) / 1048576 ,2) .' MB';
////////////////'http://almokri.ga/almokri.com/data/pdf_books/الرحيق المختوم.pdf' new code for get the work of filesize() in live server instead of localhost
$ch = curl_init();
$urll='http://almokri.ga/almokri.com/data/pdf_books'.$pdflink;
curl_setopt($ch, CURLOPT_URL, $urll);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_exec($ch);
$sizeeeee = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
@$size=number_format($sizeeeee / 1048576 ,2) .' MB';
////////////////////////////////////////////////
switch(@$category){
  case 1:
  @$category="روايات";
  break;
  case 2:
  @$category="دينية";
  break;
  case 3:
  @$category="ادب";
  break;
  case 4:
  @$category="فكر و تنمية بشرية";
  break;
  case 5:
  @$category="علمي";
  break;
  case 6:
  @$category="تعليمي";
  break;
  case 7:
  @$category="سير ذاتية";
  break;
}
 @mysqli_free_result($row);

 if(isset($_POST['downloadn'])){
  @$numberofdownloads=$numberofdownloads+1;
  @mysqli_query($conn,"UPDATE `all_books` SET `numberofdownloads`='$numberofdownloads' WHERE `id`='$id'");
header("Content-disposition: attachment; filename=$name.pdf");
header("Content-type: application/pdf");
header("Content-Length: ".$sizeeeee);
readfile($urll);
}
if(isset($_POST['comment'])){
  $thecomment=$_POST['comment'];
    @mysqli_query($conn,"INSERT INTO `comments` (`id`, `comment`) VALUES ('$id','$thecomment')");
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <link rel="stylesheet" type="text/css" href="..\..\css\mycss.css"></link>
  <link rel="stylesheet" type="text/css" href="..\..\css\cssOfPopup.css"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="..\..\css\cssOfIDK.css"></link>
  <script src="myJavaScript.js"></script>
<title>هوس العبقرية - المقرئ</title>
<meta charset="UTF-8">
<meta name="description" content="الكتاب الكامل تحميل الكتب احسن الكتب">
<meta name="keywords" content="تحميل كتاب هوس العبقرية,هوس العبقرية,قصة ماري كوري">
<meta name="author" content="باربارا جولدسميث">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body  style="padding:3%;width:100%;background-image: linear-gradient(to bottom right, #c6afe8,#e7b3c0,#e8b6c2);background-repeat: no-repeat ;background-size: cover ;">

<a href="..\..\loginpages\login.php"><div class="radialbutton" style="background-image:url('../images_pages/plusAcount.png');background-repeat: no-repeat;background-size: cover;"></div></a>

        <div id="my-modal" class="modal">
          <div class="modal-content" id="thecontent">
        </div>
        </div>

        <div class="divcenter">
        <a href="../../pages/Main.php"><img  class="center" src="../images_pages/Layer 1 copy.png" alt="logo" width="35%" height="auto"></img><a/>
        </div>

         <div class="buttom"></div>
         <div class="input">
          <form type="hidden" method="get" enctype="multipart/form-data" action="../../pages/resaultOfSearch.php">
          <input type="text" style="width:90%;"name="search_text" id="search_text" autocomplete="off" placeholder="....اسم الكتاب"></input>
          <button class="buttono" type="submit"></button>
          </form>
          <div id="result" style="width:100%;height:auto;clear:both;float:right;"></div>
        </div>


        <div class="buttom"></div>


    <div class="rightones">
      <div style="background-color:rgba(255,255,255,0.5);" class="alldivleft">
      <div class="aboveanysection"><p class="upperpofallsection"><b>كتابك</b></p></div>

<img src="..\images_books<?php echo $imglink ;?>" style="height:auto; width:50%; float:right; padding:5%;"></img>


<div style="padding:5%;float:right;width:45%;">
<p style="padding:1%;float:right;" class="fontsizee"><b>: الكاتب</b></p>
<p style="padding:1%; float:right;color:#08b698;" class="fontsizee"><b><?php echo $authorofthis['fullname']; ?></b></p>

<p style="padding:1%; clear: both;float:right;" class="fontsizee"><b>: التصنيف</b></p>
<p style="padding:1%; float:right;color:#08b698;" class="fontsizee"><b><?php echo $category; ?></b></p>


<p style="padding:1%;clear: both;float:right;" class="fontsizee"><b>: تاريخ الاصدار</b></p>
<p style="padding:1%; float:right;color:#08b698;" class="fontsizee"><b><?php echo $yearofedition; ?></b></p>


<p style="padding:1%;clear: both; float:right;" class="fontsizee"><b>: عدد الصفحات</b></p>
<p style="padding:1%; float:right;color:#08b698;"class="fontsizee" ><b><?php echo $numberofpages; ?></b></p>


<p style="padding:1%;clear: both;float:right;" class="fontsizee"><b>: حجم الكتاب</b></p>
<p style="padding:1%; float:right;color:#08b698;" class="fontsizee"><b><?php echo $size; ?></b></p>


<p style="padding:1%;clear: both;float:right;" class="fontsizee"><b>: عدد التحميلات</b></p>
<p style="padding:1%; float:right;color:#08b698;" class="fontsizee"><b><?php echo $numberofdownloads; ?></b></p>

</div>

<div style="clear:both;"></div>

<div style="margin:0% 10% 10% 10%;overflow:hidden;">
<p style="padding:10px 0px 0px 0px;float:right;clear:both;" class="fontsizee"><b>: نبذة عن الكتاب</b></p>
<p style="float:right; direction:rtl;" class="fontsizee"><?php echo $aboutTheBook ;?></p>
</div>



<div style="width:80%; height:4px; border-radius:15px;margin-top:1%;background-color:rgba(8,182,152,0.6);" class="center"></div>
<div style="margin-top:30px;margin-bottom:30px;display:flex;justify-content:center;align-items:center;">
  <form method="post" type="hidden">
<button type="submit" name="downloadn" style="cursor:pointer;margin-right:12px ;float:right;background-color:#363636;padding:8px 8px 8px 8px;border-radius:15px;border:0px;overflow:hidden;"><p class="fontsize"style="color:#08b698;"><b>تحميل</b></p></button>
  </form>
<button  style="cursor:pointer;margin-right:12px;float:right;background-color:#363636;padding:8px 8px 8px 8px;border-radius:15px;border:0px;overflow:hidden;"><a href="../../pages/toreadthebook.php?id=<?php echo $id;?>" ><p class="fontsize"style="color:#08b698;"><b>قرائة</b></p></a></button>
<div onclick="loadDoc(3)" style="cursor:pointer;margin-right:12px;float:right;background-color:#363636;padding:8px 8px 8px 8px;border-radius:15px;border:0px;"><p class="fontsize"style="color:#08b698;"><b>تعليق</b></p></div>
<?php 
if($audiolink==-1){
echo '<div style="float:right;background-color:#626060;padding:8px 8px 8px 8px;border-radius:15px;border:0px;" ><p class="fontsize"style="color:#08b698;"><b>كتاب صوتي</b></p></div>' ;
}else{
echo '<a style="cursor:pointer;float:right;background-color:#363636;padding:8px 8px 8px 8px;border-radius:15px;border:0px;" href="'.$audiolink.'"><p class="fontsize"style="color:#08b698;"><b>كتاب صوتي</b></p></a>' ;
}
?>
</div>

</div>


<div style="margin-top:30px;background-color:rgba(255,255,255,0.5);" class="alldivleft">
<div class="aboveanysection"><p class="upperpofallsection"><b>من مؤلفاته ايضا</b></p></div>

  <?php
    $ok=0;
     @$result =@mysqli_query($conn,"SELECT * FROM all_books WHERE author='$author'");
     $row=@mysqli_fetch_assoc($result);

     do{
       if($row['id']!=$id){
         $ok=1;
       }
     }while($row =@mysqli_fetch_array($result));
       @mysqli_free_result($row);
     @$result =@mysqli_query($conn,"SELECT * FROM all_books WHERE author='$author'");
     $row=@mysqli_fetch_assoc($result);
    if ( $row>0 && $ok==1 ) {
       $intspot=1;
       $spot="spot";
      do{
        if($row['id']!=$id){
          echo '<a href="'.$row['name'].".php?id=".$row['id'].'" methode="post">';
          echo '<div class="'.$spot.$intspot.'" style="padding:1%";>';
          echo '<img src="..\images_books'.$row['imglink'].'" style="height:auto; width:100%;"></img>';
          echo '<div style=" width:100%;"><b><p style="color:#363636;float:right;width:100%;text-align:center; font-size:1.5vw;">'.$row['name'].'</p></b></div>';
          echo '</div>';
          echo '</a>';
    $intspot++;
    if ($intspot==5) {
      $intspot=1;
    }}
    }while($row =@mysqli_fetch_array($result));
  }else{
    echo '<p style="padding:1%; float:right;"class="fontsize"><b>لا يوجد كتب اخرى لهاذا المؤلف عندنا</b></p>';
  }
    @mysqli_free_result($row);
  ?>

</div>
</div>

<div class="leftones">
<div class="alldivright" style="overflow:hidden;">
<div class="aboveanysection"><p class="upperpofallsection"><b>التعليقات</b></p></div>
<!-- <div class="motatafat" style="height:50px;width:100%;"><p style="float:right; padding:16px 20px 20px 0px;"><b>   </b></p></div> -->
<?php
$i=0;
@$result =@mysqli_query($conn,"SELECT * FROM comments WHERE id='$id'");
$row=@mysqli_fetch_assoc($result);
do{
  echo '<div class="thesections" style="overflow:hidden;"><p class="thepinsections">'.$row['comment'].'</p></div>';
  $i++;
  $row =@mysqli_fetch_array($result);
}while($i<15);
?>
</div>
</div>


<div class="buttom"></div>
<?php
        require('../../footer.php');
         ?>
</body>
</html>