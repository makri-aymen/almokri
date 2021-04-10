<!DOCTYPE html>
<html lang="ar">
    <head>
        <link rel="stylesheet" type="text/css" href="..\css\cssOfPopup.css"></link>
        <link rel="stylesheet" type="text/css" href="..\css\cssOfIDK.css"></link>
        <script src="..\javascript\myJavaScript.js"></script>
        <title>almokri</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>




<div id="my-modal" class="modal">
  <div class="modal-content">
  <div style="background-image: linear-gradient(to bottom right, #c6afe8,#e7b3c0,#e8b6c2); background-repeat: no-repeat; background-size: cover ;border-radius:15px;" class="main">
  <span class="close" onclick="closemethode()">&times;</span>

  <script>
  function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("demo").innerHTML = this.responseText;
      }
    }
    xhttp.open("GET", "ajax_info.txt", true);
    xhttp.send();
  }
  </script>

  <p id="errorMessage" style=" color:red; margin-top:15px; text-align:center; font-size:15px; "><?php echo  @$errorstr; ?></p>
  </div>
</div>
</div>





</body>
</html>
