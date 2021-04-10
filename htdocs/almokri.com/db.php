<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$conn = mysqli_connect("sql109.epizy.com","epiz_23699101","onakize98","epiz_23699101_books");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>