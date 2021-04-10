<?php
 $id=@$_GET['id'];

 switch(@$id){
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
          <div class="modal-content" id="thecontent"></div>
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
          <div class="aboveanysection"><p class="upperpofallsection"><b><?php echo @$category; ?></b></p></div>
          <div style="height:100%;width:100%;" id="booksofcategory">
            <?php
            require('../db.php');
            @mysqli_set_charset($conn,"utf8");
            $result =mysqli_query($conn,"SELECT * FROM `all_books` WHERE category='$id'");

                  $length=0;
                  $intspot=1;
                  $spot="spot";
                  while($length<8){
                      $row =@mysqli_fetch_array($result);
                      echo '<a href="'.$row['htmllink']."?id=".$row['id'].'" methode="post">';
                      echo  '<div class="'.$spot.$intspot.'" style="padding:1%;overflow:hidden;" >';
                      echo  '<img src="..\data\images_books'.$row['imglink'].'" style="height:auto; width:100%;"></img>';
                      echo  '<div style=" width:100%;"><b><p style="color:#363636;float:right;width:100%;text-align:center; font-size:1.5vw;overflow:hidden;">'.$row['name'].'</p></div>';
                      echo  '</div>';
                      echo  '</a>';
                      $intspot++;
                      $length++;
                      if ($intspot==5) {
                        $intspot=1;
                        echo '<div style="clear: both;"></div>';
                      }
            }      ?>
            <script>
            $(document).ready(function(){
              $('#seemore').click(function(){
                var aymen=+$("#numberofrows").val();
                var ide=+$("#ididi").val();
                var dataa="idi="+ide+"&number="+aymen;
                $.ajax({
                  url:"fetchforcetegory.php",
                  data:dataa,
                  datatype:"html",
                  type:"POST",
                  success:function(response){
                    var numm=+aymen  +   +8;
                    $("#numberofrows").val(numm);
                    $('#booksofcategory').append(response);
                  }
                });
              });
              });
            </script>

            </div>
              <div id="seemore" class="center lastbutton" style="cursor: pointer;width:95%;margin-bottom:4%;margin-top:4%;"><p style="color:white;font-size:15px;display:flex;align-items: center;width:100%;height:100%;justify-content: center;"><b>اضافة</b></p></div>
              <input type="hidden" id="numberofrows" style="width:100%;height:100px;background-color:red;" value="8"></input>
              <input type="hidden" id="ididi" style="width:100%;height:100px;background-color:red;" value="<?php echo @$id;?>"></input>
        </div>



        </div>


        <div class="leftones">
        <div class="alldivright" style="overflow:hidden;">
        <div class="aboveanysection" ><p class="upperpofallsection"><b>الاكثر تحميلا</b></p></div>

        <?php
              $db = mysqli_connect("localhost","root","","books");
              @mysqli_set_charset($db,"utf8");
               $result =mysqli_query($db,"SELECT * FROM `all_books` WHERE category='$id' ORDER BY numberofdownloads DESC;");
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
              @mysqli_close($db);
        ?>
        </div>
        </div>




        <div class="buttom"></div>
        <?php
        require('../footer.php');
         ?>

    </body>
</html>
