<?php
$conn = new mysqli("localhost","sporttn_sport216","a28432899","sporttn_sport216");
if($conn->connect_error) {
	die("error while trying to establish a connection with the database...");
} else {
	$conn->set_charset("utf8");
}
  $mypath = "http://www.sport216.tn/ar/";
?>
