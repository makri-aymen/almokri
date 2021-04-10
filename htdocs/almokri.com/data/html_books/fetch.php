<?php
require('../../db.php');
@mysqli_set_charset($conn,"utf8");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "SELECT * FROM all_books WHERE name LIKE '".$search."%'";
//	$query = "SELECT * FROM all_books;";
}
@$result = @mysqli_query($conn, $query);
$row= @mysqli_fetch_assoc($result) ;
$lenght=0;
if($row > 0){
	do{
		$lenght++;
		if($lenght<8){
		@$output.='<a href="'.$row['name'].".php?id=".$row['id'].'"><p class="upperpofallsection" style="color:#363636;background-color:rgba(255,255,255,0.5);;"><span style="float:left;"> صفحة </span><span style="float:left;margin-right:10%;margin-left:1%;">'.$row['numberofpages'].'</span>'.$row['name'].'</p></a>';
}
}while($row =@mysqli_fetch_array($result));
	echo $output;
}
?>
