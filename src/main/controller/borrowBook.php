
<?php 
 
include("index.php");
session_start();
 
$bookId = $_GET['bookId'];
$loandate = date("Y-m-d");
$id=$_SESSION["id"];
$returndate = date('Y-m-d', strtotime($loandate. ' + 14 days'));
$result = mysqli_query($conn,"INSERT INTO userbooks(userid,bookid,loandate,returndate,returned) VALUES ('$id','$bookId','$loandate','$returndate',0) ");
//$row = mysqli_fetch_array($result);
mysqli_free_result($result);
mysqli_next_result($conn); 
$result = mysqli_query($conn,"UPDATE books SET available=1 WHERE id = $bookId ");

    header("Location:../View/mybooks.php");


 

?>