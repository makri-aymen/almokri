<?php
 require('../db.php');
 @mysqli_set_charset($conn,"utf8");
 $id=@$_GET['id'];
 $result =mysqli_query($conn,"SELECT * FROM `all_books` WHERE id='$id'");
 $row=@mysqli_fetch_assoc($result);

  @$pdflink=$row['pdflink'];
?>

<!DOCTYPE html>
<html lang="ar">
    <head>
        <link rel="stylesheet" type="text/css" href="..\css\mycss.css"></link>
        <link rel="stylesheet" type="text/css" href="..\css\cssOfPopup.css"></link>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="..\css\cssOfIDK.css"></link>
        <script src="..\javascript\myJavaScript.js"></script>
        <title>almokri</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="padding:3%;width:100%;background-image: linear-gradient(to bottom right, #c6afe8,#e7b3c0,#e8b6c2);background-repeat: no-repeat ;background-size: cover ;">




<a href="..\loginpages\login.php"><div class="radialbutton" style="background-image:url('../data/images_pages/plusAcount.png');background-repeat: no-repeat;background-size: cover;"></div></a>

        <div id="my-modal" class="modal">
          <div class="modal-content" id="thecontent">
        </div>
        </div>

        <div class="divcenter">
        <a href="Main.php"><img  class="center" src="../data/images_pages/Layer 1 copy.png" alt="logo" width="35%" height="auto"></img><a/>
        </div>

         <div class="buttom"></div>
        <div class="input">

          <input type="text" style="width:90%;"name="search_text" id="search_text" autocomplete="off" placeholder="....اسم الكتاب"></input>
          <div class="buttono"></div>

          <div id="result" style="width:100%;height:auto;clear:both;float:right;"></div>
        </div>


        <div class="buttom"></div>


        <div class="rightones">
        <div style="background-color:rgba(255,255,255,0.5);" class="alldivleft">
        <div class="aboveanysection"><p class="upperpofallsection"><b>كتابك</b></p></div>
        <div class="viewpdf">
        <embed src="../data/pdf_books/<?php echo $pdflink;?>" type="application/pdf" width="100%" height="100%"></embed>
        </div>
        </div>
        </div>



        
        <div class="leftones">
        <div class="alldivright" style="overflow:hidden;">
        </div>
        </div>



        <div class="buttom"></div>
        <?php
        require('../footer.php');
         ?>

    </body>
</html>
