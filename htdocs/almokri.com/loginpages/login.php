<?php
session_start();
if(isset($_SESSION["username"])){
header("Location:../pages/Main.php");
exit();}

@$error;
require('../db.php');
@mysqli_set_charset($conn,"utf8");
if(isset($_POST['nameofuser']) && isset($_POST['password'])){

        $username = stripslashes($_REQUEST['nameofuser']);
        $username = mysqli_real_escape_string($conn,$username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn,$password);
        
        $query = "SELECT * FROM `register` WHERE username='$username' and password='".md5($password)."'";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
              if($rows==1){
            $_SESSION['username'] = $username;
            header("Location: addAbook.php");
               }else{
                $error="try again";
               }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <link rel="stylesheet" type="text/css" href="logincss.css"></link>
</head>

<body style="padding:3%;height:100vh;background-image: linear-gradient(to bottom right, #c6afe8,#e7b3c0,#e8b6c2);background-repeat: no-repeat ;background-size: cover ;">


  <div class="centerlogin">
  <div style="display:flex;align-items: center;justify-content: center;padding-top:60px;"><img  class="imgg" src="../data/images_pages/Layer 1 copy.png" alt="logo" ></img></div>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="input" style="overflow:hidden;margin-top:90px;"><input type="text" style="text-align:center;height:100%;background:transparent;border:0px;"name="nameofuser" placeholder="اسم المستخدم"></input></div>
    <div class="input" style="overflow:hidden;"><input type="password" style="text-align:center;height:100%;background:transparent;border:0px;"name="password" placeholder="كلمة السر"></input></div>
    <button type="submit" name="login" style="border:0px;display:flex;justify-content: center;align-items: center;" class="buttonsubmit"><p style="color:white;display:flex;width:100%;height:100%;justify-content: center;align-items: center;"><b>تسجيل الدخول</b></p></button>
    <p style="desplay:flex;justify-content:center;text-align:center;margin-top:10px;color:red;"><b><?php echo @$error;?></b></p>
    <br><br><br>
    </form>
  </div>


</body>
</html>
