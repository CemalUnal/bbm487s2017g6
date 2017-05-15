<?php
include('index.php');
session_start();

    $barcode = ($_POST['barcode']);
    $bookid = ($_POST['bookid']);

    // hash

    $result=mysqli_query($conn,"SELECT * FROM books WHERE barcode='$barcode'")or die($result."<br/><br/>".mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    if(sizeof($row)>0){
            mysqli_free_result($result);
            mysqli_next_result($conn); 
            $book=$row['id'];
            $user=$_SESSION["id"];
                $result=mysqli_query($conn,"SELECT * FROM waitlist WHERE bookid='$book'")or die($result."<br/><br/>".mysqli_error($conn));
                $row2 = mysqli_fetch_array($result);
                mysqli_free_result($result);
            mysqli_next_result($conn); 
            if(sizeof($row2)<1){
            $result=mysqli_query($conn,"UPDATE books SET available =0 WHERE id='$book' ")or die($result."<br/><br/>".mysqli_error($conn));
             mysqli_free_result($result);
            mysqli_next_result($conn); }
            else{
                $result = mysqli_query($conn,"SELECT count(*) FROM waitlist WHERE bookid='$bookid' ORDER BY waitdate ASC");
                //mysql_data_seek($result, 0);
                 mysqli_free_result($result);
                mysqli_next_result($conn); 
                //$line=mysqli_fetch_row ($result);
                $result = mysqli_query($conn,"SELECT * FROM waitlist WHERE bookid='$bookid' ORDER BY waitdate ASC LIMIT 1")or die($result."<br/><br/>".mysqli_error($conn));
                //$firstrow = mysql_fetch_assoc($result);
               // mysql_data_seek($result, 0);
                mysqli_data_seek($result, 1);
                $row1 = mysqli_fetch_assoc($result);
                mysqli_free_result($result);
                mysqli_next_result($conn); 
                 $date = date("Y-m-d H:i:s");
                // $date = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
                $firstrow = (int)$row1['userid'];
                $result = mysqli_query($conn,"INSERT INTO messages(userid,message,alreadyread,messagedate) VALUES ('$firstrow','$book',0,'$date') ")or die($result."<br/><br/>".mysqli_error($conn));
                 mysqli_free_result($result);
                mysqli_next_result($conn); 
            
        }

            $date = date("Y-m-d");
              $result=mysqli_query($conn,"UPDATE userbooks SET returned =1,returndate='$date'  WHERE bookid='$book' AND userid='$user' ")or die($result."<br/><br/>".mysqli_error($conn));
             header("Location: ../View/mybooks.php");

} 

    else{
       header("Location: ../View/returnbook.php?bookId=$bookid&err=1"); 
    //echo "<center>Lutfen tekrar kontrol ediniz! <a href=javascript:history.back(-1)>Geri Don</a></center>";
}



 ?>