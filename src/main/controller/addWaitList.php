
<?php 
 
include("index.php");
session_start();
 
$bookId = $_GET['bookId'];
$date = date("Y-m-d");
$id=$_SESSION["id"];
$result = mysqli_query($conn,"INSERT INTO waitlist(userid,bookid,waitdate) VALUES ('$id','$bookId','$date') ");
//$row = mysqli_fetch_array($result);
mysqli_free_result($result);
mysqli_next_result($conn); 
$result = mysqli_query($conn,"SELECT count(*) FROM waitlist WHERE bookid='$bookId' ORDER BY $date ASC");
$line=mysqli_fetch_row ($result);
    header("Location:../View/bookinfo.php?bookId=$bookId&line=$line[0]");


 

?>