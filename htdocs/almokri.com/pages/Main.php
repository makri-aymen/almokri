<?php
require('../db.php');
@mysqli_set_charset($conn,"utf8");
if(isset($_POST['upload'])){
  
  //get image file
  $file_name = $_FILES['myphoto']['name'];
  $file_size = $_FILES['myphoto']['size'];
  $file_tmp = $_FILES['myphoto']['tmp_name'];
  $file_ext = @strtolower(end(explode('.', $_FILES['myphoto']['name'])));
  $target_dir = '..\images_books\\';
  $target_file = $target_dir . $file_name;
  //get pdf file
  $file_nameP = $_FILES['mypdf']['name'];
  $file_sizeP = $_FILES['mypdf']['size'];
  $file_tmpP = $_FILES['mypdf']['tmp_name'];
  $file_extP = @strtolower(end(explode('.', $_FILES['mypdf']['name'])));
  $target_dirP = '..\pdf_books\\';
  $target_fileP = $target_dirP . $file_nameP;

  @$nameOfBook=$_POST['nameOfBook'];
  @$numberOfPages=$_POST['numberOfPages'];
  @$yearOfEdition=$_POST['yearOfEdition'];
  @$catygory=$_POST['catygory'];

  $errorstr="";
  if($file_size==0 && $file_sizeP==0 && $nameOfBook==0 && $numberOfPages==0 && $yearOfEdition==0 && $catygory==0){
    $errorstr=" اجباري ملئ جميع الخانات ";
  }else if($file_size>3097152 && $file_sizeP>20097152){
    $errorstr =" حجم الملف كبير جدا ";
  }else{
  $insert=  "INSERT INTO `all_books`( `name`, `numberofpages`, `yearofedition`, `category`, `imglink`, `pdflink`) VALUES ('$nameOfBook','$numberOfPages','$yearOfEdition','$catygory','$file_name','$file_nameP')";
  @mysqli_query($conn, $insert);
  @move_uploaded_file($file_tmp, $target_file);
  @move_uploaded_file($file_tmpP, $target_fileP);
  @mysqli_close($conn);
 }
}
?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        <link rel="stylesheet" type="text/css" href="..\css\mycss.css"></link>
        <link rel="stylesheet" type="text/css" href="..\css\cssOfPopup.css"></link>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="jsjsjquery.js"></script>
        <link rel="stylesheet" type="text/css" href="..\css\cssOfIDK.css"></link>
        <script src="..\javascript\myJavaScript.js"></script>
        <title>almokri</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/vnd.microsoft.icon" href="http://almokri.ga/favicon.ico" />
<!--  <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
      <script src="https://cdn.jsdelivr.net/velocity/1.5/velocity.min.js"></script>
      <script async="" src="//www.google-analytics.com/analytics.js"></script>   
      <script src="/static/bundle.js"></script>  -->
    </head>
    <body style="padding:3%;width:100%;background-image: linear-gradient(to bottom right, #c6afe8,#e7b3c0,#e8b6c2);background-repeat: no-repeat ;background-size: cover ;">

      <a href="..\loginpages\auth.php"><div class="radialbutton" style="background-image:url('../data/images_pages/plusAcount.png');background-repeat: no-repeat;background-size: cover;"></div></a>

        <div id="my-modal" class="modal">
          <div class="modal-content" id="thecontent">
          </div>
        </div>
        
        
          </div>
        </div>

        <div class="divcenter">
        <a href="Main.php"><img  class="center" src="../data/images_pages/Layer 1 copy.png" alt="logo" width="35%" height="auto"></img><a/>
        </div>

         <div class="buttom"></div>
         <div class="input">
          <form type="hidden" method="get" enctype="multipart/form-data" action="resaultOfSearch.php">
          <input type="text" style="width:90%;"name="search_text" id="search_text" autocomplete="off" placeholder="....اسم الكتاب"></input>
          <button class="buttono" type="submit"></button>
          </form>
          <div id="result" style="width:100%;height:auto;clear:both;float:right;"></div>
        </div>


        <div class="buttom"></div>


        <div class="rightones">

        <div style="background-color:rgba(255,255,255,0.5);" class="alldivleft">
        <div class="aboveanysection"><p class="upperpofallsection"><b>اقتراحاتنا</b></p></div>

        <?php
         $result =mysqli_query($conn,"SELECT * FROM `our_suggestions`");
         $row=@mysqli_fetch_assoc($result);
        if ($row>0) {
           $intspot=1;
           $spot="spot";
          do{
            echo '<a href="'.$row['htmllink']."?id=".$row['id'].'" methode="post">';
            echo '<div class="'.$spot.$intspot.'" style="padding:1%;">';
            echo '<img src="..\data\images_books'.$row['imglink'].'" style="height:auto; width:100%;"></img>';
            echo '<div style=" width:100%;"><b><p style="color:#363636;float:right;width:100%;text-align:center; font-size:1.5vw;">'.$row['name'].'</p></div>';
            echo '</div>';
            echo '</a>';
        $intspot++;
        if ($intspot==5) {
          $intspot=1;
        }
        }while($row =@mysqli_fetch_array($result));
        }
        @mysqli_free_result($row);
         ?>

        </div>


        <div style="margin-top:30px;background-color:rgba(255,255,255,0.5);" class="alldivleft">
        <div class="aboveanysection"><p class="upperpofallsection"><b>المضافة حديثا</b></p></div>

        <?php
           $result =mysqli_query($conn,"SELECT * FROM `last_uploads`");
           $row=@mysqli_fetch_assoc($result);
          if ($row>0) {
             $intspot=1;
             $spot="spot";
            do{
              echo '<a href="'.$row['htmllink']."?id=".$row['id'].'" methode="post">';
              echo '<div class="'.$spot.$intspot.'" style="padding:1%";>';
              echo '<img src="..\data\images_books'.$row['imglink'].'" style="height:auto; width:100%;"></img>';
              echo '<div style=" width:100%;"><b><p style="color:#363636;float:right;width:100%;text-align:center; font-size:1.5vw;">'.$row['name'].'</p></div>';
              echo '</div>';
              echo '</a>';
          $intspot++;
          if ($intspot==5) {
            $intspot=1;
          }
          }while($row =@mysqli_fetch_array($result));
          }
          @mysqli_free_result($row);
        ?>

        </div>
        </div>



        <div class="leftones">
        <div class="alldivright"  style="overflow:hidden;">
        <div class="aboveanysection" ><p class="upperpofallsection"><b>الاكثر تحميلا</b></p></div>

        <?php
               $result =mysqli_query($conn,"SELECT * FROM `all_books` ORDER BY numberofdownloads DESC;");
               $row=@mysqli_fetch_assoc($result);
              echo '<a href="'.$row['htmllink']."?id=".$row['id'].'" methode="post"><div class="thesections"style="background-color:rgba(255, 255, 255, 0.6);"><p  class="thepinsections"style="width:30%;float:left;justify-content:left;">'.$row['numberofdownloads'].'</p><p class="thepinsections"style="width:70%;text-align:right; float:left">'.$row['name'].'</p></div></a>';
              $row =@mysqli_fetch_array($result);
              echo '<a href="'.$row['htmllink']."?id=".$row['id'].'" methode="post"><div class="thesections"style="background-color:rgba(255, 255, 255,0.5);"><p  class="thepinsections"" style="width:30%;float:left;justify-content:left;">'.$row['numberofdownloads'].'</p><p class="thepinsections"style="width:70%;text-align:right; float:left;">'.$row['name'].'</p></div></a>';
              $row =@mysqli_fetch_array($result);
              echo '<a href="'.$row['htmllink']."?id=".$row['id'].'" methode="post"><div class="thesections"style="background-color:rgba(255, 255, 255, 0.4);"><p  class="thepinsections"" style="width:30%;float:left;justify-content:left;">'.$row['numberofdownloads'].'</p><p class="thepinsections"style="width:70%;text-align:right; float:left;">'.$row['name'].'</p></div></a>';
              $row =@mysqli_fetch_array($result);
              echo '<a href="'.$row['htmllink']."?id=".$row['id'].'" methode="post"><div class="thesections"style="background-color:rgba(255, 255, 255, 0.3);"><p  class="thepinsections"" style="width:30%;float:left;justify-content:left;">'.$row['numberofdownloads'].'</p><p class="thepinsections"style="width:70%;text-align:right; float:left;">'.$row['name'].'</p></div></a>';
              $row =@mysqli_fetch_array($result);
              echo '<a href="'.$row['htmllink']."?id=".$row['id'].'" methode="post"><div class="thesections"style="background-color:rgba(255, 255, 255, 0.2);"><p  class="thepinsections" style="width:30%;float:left;justify-content:left;">'.$row['numberofdownloads'].'</p><p class="thepinsections"style="width:70%;text-align:right; float:left;">'.$row['name'].'</p></div></a>';
              @mysqli_free_result($row);
        ?>
        </div>


        <div class="alldivright"  style="overflow:hidden;margin-top:30px;">
        <div class="aboveanysection"><p class="upperpofallsection"><b>مجموعاتنا</b></p></div>
        <a href="https://www.facebook.com/groups/1298543376981686/" target="_blank"><div class="thesections"><p class="thepinsections"style="width:100%;text-align:right; float:left">المقرئ على الفيسبوك</p></div></a>
        <!--<div class="thesections"><p class="thepinsections"style="width:100%;text-align:right; float:left">المقرئ على التويتر</p></div>-->
        </div>



        <div class="alldivright"  style="overflow:hidden;margin-top:30px;">
        <div class="aboveanysection" ><p class="upperpofallsection"><b>التصنيفات</b></p></div>

        <a href="Category.php?id=1"><div class=" thesections"><p class="thepinsections"style="width:100%;">روايات</p></div></a>
        <a href="Category.php?id=2"><div class=" thesections"><p class="thepinsections"style="width:100%;">دينية</p></div></a>
        <a href="Category.php?id=3"><div class=" thesections"><p class="thepinsections"style="width:100%;">ادب</p></div></a>
        <a href="Category.php?id=4"><div class=" thesections"><p class="thepinsections"style="width:100%;">فكر و تنمية بشرية</p></div></a>
        <a href="Category.php?id=5"><div class=" thesections"><p class="thepinsections"style="width:100%;">علمي</p></div></a>
        <a href="Category.php?id=6"><div class=" thesections"><p class="thepinsections"style="width:100%;">تعليمي</p></div></a>
        <a href="Category.php?id=7"><div class=" thesections"><p class="thepinsections"style="width:100%;">سير ذاتية</p></div></a>
        </div>


        <div class="alldivright"  style="overflow:hidden;margin-top:30px;">
        <div class="aboveanysection"><p class="upperpofallsection"><b>مقتطفات</b></p></div>
        <?php
         $result =@mysqli_query($conn,"SELECT * FROM `quotes` LIMIT 10");
         $boolean=true;
         $i=0;

         do{
           $row=@mysqli_fetch_array($result);
           $i++;
           if($boolean==true){
             echo '<div class="motatafat" ><p class="thepinsections"style="width:100%;overflow:scroll;overflow-x: hidden;overflow-y: hidden;">'.$row['thequotes'].'</p></div>';
             $boolean=false;
           }else{
             echo '<div class="motatafat2"><p class="thepinsections"style="width:100%;overflow:scroll;overflow-x: hidden;overflow-y: hidden;">'.$row['thequotes'].'</p></div>';
             $boolean=true;
           }
         }while($i<10);
         @mysqli_free_result($row);
        ?>
        </div>
        </div>

        <div class="buttom"></div>
        <?php
        require('../footer.php');
         ?>
    </body>
</html>