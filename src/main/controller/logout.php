<?php
session_start();
ob_start();
session_destroy();
echo "<center>ÇIKIŞ YAPTINIZ. ANA SAYFAYA YÖNLENDİRİLİYORSUNUZ.</center>";
header("Refresh: 2; url=../View/home.php");
ob_end_flush();
?>