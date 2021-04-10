<!DOCTYPE html>
<html lang="ar">
    <head>
        <link rel="stylesheet" type="text/css" href="..\css\mycss.css"></link>
        <link rel="stylesheet" type="text/css" href="..\css\cssOfPopup.css"></link>
        <link rel="stylesheet" type="text/css" href="..\css\cssOfIDK.css"></link>
        <title>almokri</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .progressbar{
                width: 50%;
                height: 20px;
                border-radius: 40px;
                border: solid #363636 4px;
                overflow: hidden;
                position: relative;
            }
            .insideprogressbar{
                border-radius: 40px;
                width: 97%;
                height:80%;
                background-color: transparent;
                margin: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                overflow: hidden;
            }
            .ok{
                width:0%;
                height:100%;
                background-color:#363636;
                float:left;
            }
        </style>
    </head>
    <body>
        <div style="background-image: linear-gradient(to bottom right, #c6afe8,#e7b3c0,#e8b6c2);background-repeat: no-repeat; background-size: cover ;border-radius:15px;" class="main">
            <center>
            <p  class="addabook"><b>تحميل</b></p>
            <div style="padding-top:8%;padding-bottom:50px;width:100%;">
                <p id="nameofuploadedfile" style="font-size:20px;color:#363636;"></p>
                    <div class="progressbar">
                        <div class="insideprogressbar">
                            <div class="ok" id="thebar"></div>
                        </div>
                    </div>
                    <div class="center lastbutton" id="closeitit"><p id="pcloseitit" style="color:white;font-size:15px;display:flex;align-items: center;width:100%;height:100%;justify-content: center;">انتضر حتي نهاية التحميل</p></div>
            </div>
        </div>
    </body>
</html>