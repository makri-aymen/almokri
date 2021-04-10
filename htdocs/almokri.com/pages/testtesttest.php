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


    <div class="rightones">

      <div style="background-color:rgba(255,255,255,0.5);" class="alldivleft">
      <div class="aboveanysection"><p class="upperpofallsection"><b><?php echo @$category; ?></b></p></div>
      <div style="height:100%;width:100%;" id="booksofcategory">
<script>
      $(document).ready(function(){
        $('#seemore').click(function(){
          $.ajax({
            url:"fetchforcetegory.php",
            datatype:"html",
            success:function(response){
                $('#booksofcategory').append(response);
            }
          });
        });
        });
</script>

      </div>
        <div id="seemore" class="center lastbutton" style="cursor: pointer;width:95%;margin-bottom:4%;margin-top:4%;"><p style="color:white;font-size:15px;display:flex;align-items: center;width:100%;height:100%;justify-content: center;"><b>+</b></p></div>
    </div>



    </body>
</html>
