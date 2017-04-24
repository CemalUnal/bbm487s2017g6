<?php
include('index.php');
session_start();

    $name = ($_POST['name']);
    $author = ($_POST['author']);
    $year = ($_POST['year']);
    $barcode = ($_POST['barcode']);
    $available = ($_POST['available']);
    $bookId = ($_POST['id']);

    $result=mysqli_query($conn,"SELECT * FROM books WHERE id='$bookId'")or die($result."<br/><br/>".mysqli_error($conn));
   
    if($result){
         $row = mysqli_fetch_array($result);
            mysqli_free_result($result);
            mysqli_next_result($conn); 
            $result=mysqli_query($conn,"UPDATE books SET name='$name',author='$author',year='$year',available='$available',barcode='$barcode' WHERE id='$bookId' ")or die($result."<br/><br/>".mysqli_error($conn));
            header("Location: ../View/books.php");

} 

    else{
    echo "<center>Lutfen tekrar kontrol ediniz! <a href=javascript:history.back(-1)>Geri Don</a></center>";
}



 ?>