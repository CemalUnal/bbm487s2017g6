<?php
include('index.php');
session_start();

    $name = ($_POST['name']);
    $surname = ($_POST['surname']);
    $email = ($_POST['email']);
    $userId = ($_POST['id']);
    $admin = ($_POST['admin']);
    

    $result=mysqli_query($conn,"SELECT * FROM users WHERE id='$userId'")or die($result."<br/><br/>".mysqli_error($conn));
   
    if($result){
         $row = mysqli_fetch_array($result);
            mysqli_free_result($result);
            mysqli_next_result($conn); 
            $result=mysqli_query($conn,"UPDATE users SET name='$name',surname='$surname',email='$email',admin='$admin' WHERE id='$userId' ")or die($result."<br/><br/>".mysqli_error($conn));
            header("Location: ../View/adminuser.php");

} 

    else{
    echo "<center>Lutfen tekrar kontrol ediniz! <a href=javascript:history.back(-1)>Geri Don</a></center>";
}



 ?>