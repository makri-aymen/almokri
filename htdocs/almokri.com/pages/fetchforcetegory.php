<?php
require('../db.php');
@mysqli_set_charset($conn,"utf8");
@$id=$_POST['idi'];
$result =mysqli_query($conn,"SELECT * FROM `all_books` WHERE category='$id'");

@$numberint =$_POST['number'];
$line=0;
while($line<$numberint){
$row=@mysqli_fetch_array($result);
$line++;
}

$allthings ="";
//$allthings.=  '<h6>'.$id.'gfbdfbds</h6s>';
      $length=0;
      $intspot=1;
      $spot="spot";
      while($length<8){
          $row =@mysqli_fetch_array($result);
          $allthings.= '<a href="'.$row['htmllink']."?id=".$row['id'].'" methode="post">';
          $allthings.=  '<div class="'.$spot.$intspot.'" style="padding:1%;overflow:hidden;" >';
          $allthings.=  '<img src="..\data\images_books'.$row['imglink'].'" style="height:auto; width:100%;"></img>';
          $allthings.=  '<div style=" width:100%;"><b><p style="color:#363636;float:right;width:100%;text-align:center; font-size:1.5vw;overflow:hidden;">'.$row['name'].'</p></div>';
          $allthings.=  '</div>';
          $allthings.=  '</a>';

          $intspot++;
          $length++;
          if ($intspot==5) {
            $intspot=1;
            $allthings.='<div style="clear: both;"></div>';
          }
}
echo $allthings;
?>
