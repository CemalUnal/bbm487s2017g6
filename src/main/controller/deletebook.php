<?php
include('index.php');
session_start();

    $bookid = ($_GET['bookid']);
    $result=mysqli_query($conn,"SELECT * FROM books WHERE id='$bookid'")or die($result."<br/><br/>".mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    if($row["available"]==0){
    	 mysqli_free_result($result);
            mysqli_next_result($conn); 
    $result=mysqli_query($conn,"DELETE FROM books WHERE id='$bookid'")or die($result."<br/><br/>".mysqli_error($conn));

    header("Location: ../View/books.php");
}
else{
	 header("Location: ../View/changebook.php?bookId=$bookid&err=1");
}


 ?>