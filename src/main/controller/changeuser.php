<?php
include('index.php');
session_start();

    $name = ($_POST['name']);
    $surname = ($_POST['surname']);
    $email = ($_POST['email']);
    $userId = $_SESSION["id"];
  $encrypt_method = "AES-128-CBC";
    $secret_key = 'admin';
    $secret_iv = 'admin';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $result=mysqli_query($conn,"SELECT * FROM users WHERE id='$userId'")or die($result."<br/><br/>".mysqli_error($conn));
   
    if($result){
         $row = mysqli_fetch_array($result);
            mysqli_free_result($result);
            mysqli_next_result($conn); 
            $result=mysqli_query($conn,"UPDATE users SET name='$name',surname='$surname',email='$email' WHERE id='$userId' ")or die($result."<br/><br/>".mysqli_error($conn));
            $password = openssl_decrypt ( $_SESSION['pass'], $encrypt_method , $key , 0, $iv  );
            $emails = $_SESSION['email'];
            header("Location: session.php?email=$email&password=$password");

} 

    else{
    echo "<center>Lutfen tekrar kontrol ediniz! <a href=javascript:history.back(-1)>Geri Don</a></center>";
}



 ?>