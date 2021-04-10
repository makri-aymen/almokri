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
          <form type="hidden" method="get" enctype="multipart/form-data" action="resaultOfSearch.php" >
          <input type="text" style="width:85%;"name="search_text" id="search_text" autocomplete="off" placeholder="....اسم الكتاب"></input>
          <div class="buttono" type="submit"></div>
          </form>
          <div id="result" style="width:100%;height:auto;clear:both;float:right;"></div>
        </div>


        <div class="buttom"></div>


        <div class="rightones">

        <div style="background-color:rgba(255,255,255,0.5);overflow:hidden;" class="alldivleft">
        <div class="aboveanysection"><p class="upperpofallsection"><b>نتائج البحث</b></p></div>

        <?php
        require('../db.php');
        @mysqli_set_charset($conn,"utf8");
        $strofsearch=$_GET['search_text'];

        $search = mysqli_real_escape_string($conn, $strofsearch);
        $query = "SELECT * FROM all_books WHERE name LIKE '%".$search."%'";
        
        @$result = @mysqli_query($conn, $query);
        $row= @mysqli_fetch_assoc($result) ;
        $lenght=0;
        if($row > 0){
            do{
                $lenght++;
                if($lenght<40){
                @$output.='<a href="Download.php?id='.$row['id'].'"><p class="upperpofallsection" style="color:#363636;background-color:rgba(255,255,255,0.5);;"><span style="float:left;"> صفحة </span><span style="float:left;margin-right:10%;margin-left:1%;">'.$row['numberofpages'].'</span>'.$row['name'].'</p></a>';
                    if($lenght<39){
                @$output.='<div style="height:3px;background-color:#363636;width:100%;"></div>';
            }}
        }while($row =@mysqli_fetch_array($result));
            echo $output;
        }

         ?>

        </div>


        <div class="leftones"></div>
        </div>

        <div class="buttom"></div>
        <?php
        require('../footer.php');
         ?>

    </body>
</html>