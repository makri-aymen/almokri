<?php
//ob_start();
if (isset($_FILES['slice'])) {
	header('content-type:application/json');
//	if (!is_dir('upload')) {
//        mkdir('upload');
//    }
    $numberOfChunks = $_POST['numberOfChunks'];
    $index = $_POST['index'];
	$start = $_POST['start'];
	// you may hash the filename
    $filename = '../data/' . $_POST['dir'] . $_POST['filename'];
    if ($start == 0) {
		$desc = fopen($filename, 'c');
        ftruncate($desc, $_POST['size']);  // make the file with this size
	} else {
        if (filesize($filename) == 0) {
//            echo json_encode(array('status' => false));    
            clearstatcache(false, $filename);
        } else {
            $desc = fopen($filename, 'r+');
        }
    }
	fseek($desc, $start);
	$src = fopen($_FILES['slice']['tmp_name'], 'r');
	while (!feof($src)) {
		$buf = fread($src,102400); //2M
		fwrite($desc, $buf);
	}
	fclose($src);
    fclose($desc);
    
    if($numberOfChunks==$index){
        echo 1;
    }else{
        echo 2;
    }
}


/*
$length = ob_get_length();
header('Content-Length: '.$length."\r\n");
header('Accept-Ranges: bytes'."\r\n");
ob_end_flush(); 
*/
?>