<!DOCTYPE html>
<html lang="ar">
    <head>
        <link rel="stylesheet" type="text/css" href="..\css\mycss.css"></link>
        <link rel="stylesheet" type="text/css" href="..\css\cssOfPopup.css"></link>
        <link rel="stylesheet" type="text/css" href="..\css\cssOfIDK.css"></link>
        <script src="..\javascript\myJavaScript.js"></script>
        <title>almokri</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

          <div style="background-image: linear-gradient(to bottom right, #c6afe8,#e7b3c0,#e8b6c2); background-repeat: no-repeat; background-size: cover ;border-radius:15px;" class="main">
          <span class="close" onclick="closemethode()">&times;</span>
          <form class="" method="post" enctype="multipart/form-data">
            <p class="addabook"><b>اضف كتابا</b></p>
            <div class="input" style="overflow:hidden;"><input type="text" style="text-align:center;height:100%;background:transparent;border:0px;"name="nameOfBook" placeholder="اسم الكتاب"></input></div>
            <div class="input" style="overflow:hidden;margin-top:3%;" ><input type="number" style="text-align:center;height:100%;background:transparent;border:0px;"name="numberOfPages" placeholder="عدد صفحات الكتاب"></input></div>
            <div class="input"  style="overflow:hidden;margin-top:3%;"><input type="number" style="text-align:center;height:100%;background:transparent;border:0px;"name="yearOfEdition" placeholder="سنة الاصدار"></input></div>
            <div class="input"  style="overflow:hidden;margin-top:3%;"><input type="number" style="text-align:center;height:100%;background:transparent;border:0px;"name="catygory" placeholder="التصنيف"></input></div>
            <div class="inputpop">
              <label  for="upload-photo" class="popbutton" type="file" style="background:#363636; width:47%; float:right;"><p style="display:flex;align-items: center;width:100%;height:100%;justify-content: center;color:white;font-size:1vw;"><b>اختر الغلاف</b></p></label>
              <input type="file" name="myphoto"accept="image/*" id="upload-photo" />
              <label  for="upload-pdf" class="popbutton" type="file" style="background:#363636; width:47%; float:left;"><p style="display:flex;align-items: center;width:100%;height:100%;justify-content: center;color:white;font-size:1vw;"><b>اختر الملف</b></p></label>
              <input type="file" name="mypdf" accept="application/pdf" id="upload-pdf" />
            </div>
            <button type="submit" name="upload" class="center lastbutton"><p style="color:white;font-size:15px;display:flex;align-items: center;width:100%;height:100%;justify-content: center;"><b>+</b></p></button>
          </form>
          <p id="errorMessage" style=" color:red; margin-top:15px;padding-bottom: 40px;text-align:center; font-size:15px; "><?php echo  @$errorstr; ?></p>
          </div>

        </body>
</html>
