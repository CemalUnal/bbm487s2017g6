
<?php 
 
include("index.php");
session_start();

 
	$book = $_GET['book'];
$loandate = date("Y-m-d");
$id=$_SESSION["id"];


$result = mysqli_query($conn,"DELETE FROM waitlist WHERE userid='$id' ")or die($result."<br/><br/>".mysqli_error($conn));
mysqli_free_result($result);
mysqli_next_result($conn); 

//$book=$row['id'];
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
                $result = mysqli_query($conn,"SELECT count(*) FROM waitlist WHERE bookid='$book' ORDER BY waitdate ASC");
                //mysql_data_seek($result, 0);
                 mysqli_free_result($result);
                mysqli_next_result($conn); 


                //$line=mysqli_fetch_row ($result);
                $result = mysqli_query($conn,"SELECT * FROM waitlist WHERE bookid='$book' ORDER BY waitdate ASC LIMIT 1")or die($result."<br/><br/>".mysqli_error($conn));
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
            	$result = mysqli_query($conn,"UPDATE messages SET alreadyread=1 WHERE message = $book AND userid=$id AND alreadyread=0");
                mysqli_free_result($result);
				mysqli_next_result($conn); 
    header("Location:../View/home.php");



 

?>