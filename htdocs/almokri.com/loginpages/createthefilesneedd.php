<?php
    require('../db.php');
    @mysqli_set_charset($conn,"utf8");
    $author=$_COOKIE['theauthor'];
    $nameofbook=$_POST["name"];
    $numberofpages=$_POST["number"];
    $yearofedition=$_POST["year"];
    $descritionofbook=$_POST["description"];
    $linkofbook=$_POST["linlk"];
    $keywords=$_POST["key"];   
     $catygory=$_POST["catygory"];

    $inserte=  "SELECT `id` FROM `authors` WHERE fullname LIKE '%".$author."%' ";
    $intofauthoro=@mysqli_query($conn, $inserte);
    $intofauthor=@mysqli_fetch_assoc($intofauthoro);
    $intofauthor=$intofauthor['id'];

    /*
    //get image file
    $file_name = $_FILES['myphoto']['name'];
    $file_size = $_FILES['myphoto']['size'];
    $file_tmp = $_FILES['myphoto']['tmp_name'];
    $file_ext = @strtolower(end(explode('.', $_FILES['myphoto']['name'])));
    $target_dir = '..\data\images_books\\';
    $target_file = $target_dir . $nameofbook.".".$file_ext;
    //get pdf file
    $file_nameP = $_FILES['mypdf']['name'];
    $file_sizeP = $_FILES['mypdf']['size'];
    $file_tmpP = $_FILES['mypdf']['tmp_name'];
    $file_extP = @strtolower(end(explode('.', $_FILES['mypdf']['name'])));
    $target_dirP = '..\data\pdf_books\\';
    $target_fileP = $target_dirP . $nameofbook.".".$file_extP;
*/
        $content='
        <title>'.$nameofbook.' - المقرئ</title>
        <meta name="description" content="الكتاب الكامل تحميل الكتب احسن الكتب">
        <meta name=keywords" content="'.$keywords.'">
        <meta name="author" content="'.$author.'">
        ';
        $allcontent="";
        $fp = fopen( "../data/modelhtml.txt","r");

//        while(!feof($fp)){
            $line=fread($fp,filesize("../data/modelhtml.txt"));
//            if($line=="******************************************"){
//                $allcontent+=$content;
//            }else{
//                $allcontent+=$line;
//            }
//        }
        $line=explode("\n", $line);
        $line[80]=$content;
        for($i=0;$i<count($line);$i++){
                $line[$i]=$line[$i]."\r\n";
            } 
        $line=implode($line); 

        $fp2 = fopen( "../data/html_books/$nameofbook.php","w+");
        fwrite($fp2,$line);
        fclose($fp2);
        fclose($fp);
        $htmllink="../data/html_books/$nameofbook.php";
        $idofbook=@mysqli_query($conn,"SELECT `id` FROM `all_books` ORDER BY id DESC LIMIT 1");
        $idofbooki=@mysqli_fetch_assoc($idofbook);
        $idofbooki=$idofbooki['id']+1;

        $imglink="/".$_POST["img"];
        $pdflink="/".$_POST["pdf"];
        $inserti="INSERT INTO `all_books`(`id`, `name` , `numberofpages` , `numberofdownloads` , `yearofedition` , `category` , `imglink` , `pdflink`  , `aboutTheBook`, `audiolink`, `author`, `htmllink`) VALUES ($idofbooki,'$nameofbook',$numberofpages,0,$yearofedition,$catygory,'$imglink','$pdflink','$descritionofbook','$linkofbook',$intofauthor,'$htmllink')";
        @mysqli_query($conn, $inserti);
        echo true;
  ?>