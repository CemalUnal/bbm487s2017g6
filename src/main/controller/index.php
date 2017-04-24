<?php
$host="127.0.0.1";
$db="library";
$user="root";
$pass="iremK0695";
$conn=@mysqli_connect($host,$user,$pass) or die("Mysql Baglanamadi");
 
mysqli_select_db($conn,$db) or die("Veritabanina Baglanilamadi");
mysqli_set_charset($conn,'latin5');
?>
