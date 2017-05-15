
<?php 
 
include("index.php");
session_start();

 
if(isset($_GET['bookId'])){
$bookId = $_GET['bookId'];
$loandate = date("Y-m-d");
$id=$_SESSION["id"];
$result = mysqli_query($conn,"SELECT * FROM userbooks WHERE userid=$id AND returned=0");
//$row = mysqli_fetch_array($result);
$lines=mysqli_num_rows($result);
mysqli_free_result($result);
mysqli_next_result($conn); 
if($lines<4){
$returndate = date('Y-m-d', strtotime($loandate. ' + 14 days'));
$result = mysqli_query($conn,"INSERT INTO userbooks(userid,bookid,loandate,returndate,returned,paid) VALUES ('$id','$bookId','$loandate','$returndate',0,1) ");
//$row = mysqli_fetch_array($result);
mysqli_free_result($result);
mysqli_next_result($conn); 
$result = mysqli_query($conn,"UPDATE books SET available=1 WHERE id = $bookId ");

    header("Location:../View/mybooks.php");
}
else{
	header("Location:../View/bookinfo.php?bookId=$bookId&err=1");
}
}
else if(isset($_GET['book'])){
	$bookId = $_GET['book'];
$loandate = date("Y-m-d");
$id=$_SESSION["id"];
$result = mysqli_query($conn,"SELECT * FROM userbooks WHERE userid=$id AND returned=0");
//$row = mysqli_fetch_array($result);
$lines=mysqli_num_rows($result);
mysqli_free_result($result);
mysqli_next_result($conn); 
if($lines<4){
$returndate = date('Y-m-d', strtotime($loandate. ' + 14 days'));
$result = mysqli_query($conn,"INSERT INTO userbooks(userid,bookid,loandate,returndate,returned,paid) VALUES ('$id','$bookId','$loandate','$returndate',0,1) ");
//$row = mysqli_fetch_array($result);
mysqli_free_result($result);
mysqli_next_result($conn); 
$result = mysqli_query($conn,"UPDATE books SET available=1 WHERE id = '$bookId' ");
mysqli_free_result($result);
mysqli_next_result($conn); 
$result = mysqli_query($conn,"DELETE FROM waitlist WHERE userid='$id' ");
mysqli_free_result($result);
mysqli_next_result($conn); 
  $result = mysqli_query($conn,"UPDATE messages SET alreadyread=1 WHERE message = '$bookId' AND userid='$id' AND alreadyread=0");
mysqli_free_result($result);
mysqli_next_result($conn); 
    header("Location:../View/mybooks.php");
}
else{
	header("Location:../View/borrowfromwait.php?err=1");
}
}
 

?>
