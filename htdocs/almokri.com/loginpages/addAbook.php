<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location:login.php");
exit(); }
require('../db.php');
@mysqli_set_charset($conn,"utf8");
if(isset($_GET["nameofauthorrr"])){
    $authoro=$_GET["nameofauthorrr"];
    $lastid=@mysqli_query($conn,"SELECT `id` FROM `authors` ORDER BY id DESC LIMIT 1");
    $lastidi=@mysqli_fetch_assoc($lastid);
    $lastidi=$lastidi['id']+1;
    @mysqli_query($conn,"INSERT INTO `authors` (`id`,`fullname`) VALUES ($lastidi,'$authoro')");
}
?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        <link rel="stylesheet" type="text/css" href="addAbook.css"></link>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="..\javascript\myJavaScript.js"></script>
        <title>almokri</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script>
            	function getCookie(name) {
                    var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
                    return v ? v[2] : null;
                }
                function setCookie(name, value, days) {
                    var d = new Date;
                    d.setTime(d.getTime() + 24*60*60*1000*days);
                    document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString();
                }
                function deleteCookie(name) { setCookie(name, '', -1); }

            window.onload=function(){
        const dropdownOpener = document.querySelector(".dropdown__button");
        const dropdownContent = document.querySelector(".dropdown__content");

            dropdownOpener.addEventListener("click", () => {
            dropdownContent.classList.toggle("show");
            });
            window.addEventListener("click", () => {
            if (!event.target.matches('.dropdown__button')) {
                if (dropdownContent.classList.contains('show')) {
                    dropdownContent.classList.remove('show');
                }
                if (event.target.matches('.item')) {
                    var ff=event.target.innerText;
                    document.getElementById("choseaauthor").innerHTML="<b>"+ff+"</b>";
                //dropdownOpener.innerText = "<b>"+ff+"</b>";
               // window.location.href=”index.php?uid=1";
//               setCookie(name, value, days);
                setCookie("theauthor", ff, 1);
                }
            }
            });
        }
            
            function checkit(){
                var nameofbook=document.getElementById("nameofthebook").value,
                    numberofpage=document.getElementById("numberofages").value,
                    yearofedition=document.getElementById("yearofedition").value,
                    description=document.getElementById("descritionofbook").value,
                    linktoaudiobook=document.getElementById("linkofbook").value,
                    keywords=document.getElementById("keywords").value,
                    catiygory=document.querySelector('input[name="radio"]:checked'),
                    filepdf=document.getElementById("upload-pdf").files[0],
                    filepic=document.getElementById("upload-photo").files[0],
                    author=(typeof  getCookie("theauthor") !== 'undefined') ? getCookie("theauthor") : null;
                    if( nameofbook==null || numberofpage==null || yearofedition==null || description==null || linktoaudiobook==null || keywords==null || catiygory==null || filepdf==null || filepic==null || author==null){
                        document.getElementById("seetheerror").innerHTML="<b>يجب ملئ جميع الفراغات</b>";
                    }else{
                        loadDoc(4);
                    }
            }
        </script>
<!-- onmouseover="mOver(this)" onmouseout="mOut(this)"  onmousedown, onmouseup-->
    </head>
    <body style="padding:3%;width:100%;background-image: linear-gradient(to bottom right, #c6afe8,#e7b3c0,#e8b6c2);background-repeat: no-repeat ;background-size: cover ;">
        
        <div id="my-modal" class="modal">
          <div class="modal-content" id="thecontent">
          </div>
        </div>

        <div class="imagesave">
            <center>
        <a href="..\pages\Main.php" style="width:auto;height:auto;"><img style="width:40%;height:auto;display:flex;justify-content: center;" src="../data/images_pages/Layer 1 copy.png" alt="logo"></img></a>
        </center>
        </div>

        <form type="hidden" method="post" enctype="multipart/form-data" id="form1">
        <div style="background-color:rgba(255,255,255,0.5);margin-top:90px;" class="alldivlefta">
        <div class="aboveanysection" style="overflow:hidden;"><a style="width:10%;height:100%;float:left;text-decoration:none;" href="logout.php"><p class="upperpofallsectionnnnnnn" ><b>خروج</b></p></a><div style="width:30%; float:right; height:100%;"><p class="upperpofallsection"><b>اضف كتاب</b></p></div></div>

            <div class="right">
                <p class="pforsection"><b>اسم الكتاب</b></p>
                <div class="divofinput"><input type="text" id="nameofthebook"></input></div>
                <p class="pforsection"><b>عدد الصفحات</b></p>
                <div class="divofinput"><input type="number" id="numberofages"></input></div>
                <p class="pforsection"><b>سنة الاصدار</b></p>
                <div class="divofinput"><input type="text" id="yearofedition"></input></div>
                <p class="pforsection"><b>وصف الكتاب</b></p>
                <div class="divofinput"><input type="text" id="descritionofbook"></input></div>
                <p class="pforsection"><b>رابط الكتاب الصوتي</b></p>
                <div class="divofinput"><input type="text" id="linkofbook"></input></div>
                <p class="pforsection"><b>الكلمات المفتاحية</b></p>
                <div class="divofinput" style="margin-bottom:16px;"><input type="text" id="keywords"></input></div>
            </div>
            
            
        <div class="left">
            <div style="float:right;width:100%;padding:40px;">
                    <label class="container spt1">
                        <p class="pofradio"><b>روايات</b></p>
                        <input type="radio"   value="1" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container spt2">
                        <p class="pofradio"><b>دينية</b></p>
                        <input type="radio"  value="2" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container spt1">
                        <p class="pofradio"><b>ادب</b></p>
                        <input type="radio"   value="3" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container spt2">
                        <p class="pofradio"><b>فكر و تنمية بشرية</b></p>
                        <input type="radio"  value="4" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container spt1">
                        <p class="pofradio"><b>علمي</b></p>
                        <input type="radio"  value="5" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container spt2">
                        <p class="pofradio"><b>تعليمي</b></p>
                        <input type="radio"  value="6" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container spt1">
                        <p class="pofradio"><b>سير ذاتية</b></p>
                        <input type="radio"  value="7" name="radio">
                        <span class="checkmark"></span>
                    </label>
            </div>
            
                    <div style="margin:20px;width:100%;height:auto;overflow:hidden;">
                        <label  for="upload-photo" class="buttonleft" type="file" style="width:47%; float:right; cursor: pointer;"><p style="display:flex;align-items: center;width:100%;height:100%;justify-content: center;color:white;font-size:1vw;"><b>اختر الغلاف</b></p></label>
                        <input type="file" name="myphoto" style="display:none;" accept="image/*" id="upload-photo" />
                        <label  for="upload-pdf" class="buttonright" type="file" style="width:47%; float:left; cursor: pointer;"><p style="display:flex;align-items: center;width:100%;height:100%;justify-content: center;color:white;font-size:1vw;"><b>اختر الملف</b></p></label>
                        <input type="file" name="mypdf" style="display:none;" accept="application/pdf" id="upload-pdf" />
                    </div>
            
                    <div class="dropdown">
                        <div class="dropdown__button" id="choseaauthor">
                            <b>اختر المؤلف</b>
                        </div>
                        <ul class="dropdown__content">
                        <?php
                            @mysqli_set_charset($conn,"utf8");
                            $result =mysqli_query($conn,"SELECT * FROM `authors` ORDER BY fullname;");
                            while($row= mysqli_fetch_array($result)){
                                echo '<li class="item"><b>'.$row['fullname'].'</b></li>' ;
                            }
                        ?>
                        </ul>
                    </div>
                    <p id="seetheerror" style="desplay:flex;align-items:center;justify-content:center;color:red;font-size:20px;width:100%;text-align:center;margin-top:30px;"><b></b></p>
        </div>
        <div style="display:flex;align-items:center;justify-content:center;clear:both;">
        <div style="width:90%;height:auto;border:6px solid #363636;border-radius: 15px;height:42px;background-color:#363636;margin:25px 25px 25px 25px;"><p onclick="checkit()" style="display:flex;align-items:center;justify-content:center;font-size:20px;color:#08b698;height:100%;width:100%;cursor:pointer;"><b>اضافة</b></p></div>
        </div>
        </div>
        </form>
<!--           
        <script>
        submitForms = function(){
            setTimeout(function(){ document.getElementById("form1").submit();}, 300); 
            setTimeout(function(){ document.getElementById("form2").submit();}, 600); 
            setTimeout(function(){ document.getElementById("form3").submit();}, 900); 
     //       document.getElementById("form1").submit();
     //       document.getElementById("form2").submit();
     //       document.getElementById("form3").submit();
        }
        </script>
-->
        <div style="background-color:rgba(255,255,255,0.5);margin-top:30px;margin-bottom:40px;" class="alldivlefta">
        <div class="aboveanysection" style="overflow:hidden;"><div style="width:30%; float:right; height:100%;"><p class="upperpofallsection"><b>اضف مؤلف</b></p></div></div>
        <div style="margin-top:25px;margin-bottom:25px;">
        <form type="hidden" method="get" enctype="multipart/form-data">
        <div style="float:left;width:60%;height:auto;border: 6px solid #363636;border-radius: 15px;margin-left:25px;margin-bottom:25px;"><input type="text" name="nameofauthorrr"  style="height:30px;"></input></div>
        <button type="submit" style="float:right;width:30%;height:auto;border: 6px solid #363636;border-radius: 15px;height:42px;background-color:#363636;margin-right:25px;margin-bottom:25px;"><p style="display:flex;align-items:center;justify-content:center;font-size:20px;color:#08b698;height:100%;cursor:pointer;"><b>اضافة</b></p></button>
        </form>
        </div>
        </div>
    </body>
</html>