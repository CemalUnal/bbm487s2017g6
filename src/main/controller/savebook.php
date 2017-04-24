
<?php 
 
include("index.php");
session_start();
 

$name = $_POST['name'];
$author = $_POST['author'];
$year = $_POST['year'];
$barcode = $_POST['barcode'];




 
$result = mysqli_query($conn,"INSERT INTO books(name,author,year,available,barcode) VALUES ('$name','$author','$year',0,'$barcode') ");


    header("Location:../View/books.php");


 

?>