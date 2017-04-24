<?php
include('index.php');
session_start();

    $oldpass = ($_POST['oldpassword']);
    $newpass = ($_POST['newpassword']);
    $cnewpass = ($_POST['new2password']);
    $userId = $_SESSION["id"];
  $encrypt_method = "AES-128-CBC";
    $secret_key = 'admin';
    $secret_iv = 'admin';

    // hash
    $key = hash('sha256', $secret_key);

    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    
        $oldpassword = openssl_encrypt($oldpass, $encrypt_method, $key, 0, $iv);

    $result=mysqli_query($conn,"SELECT * FROM users WHERE id='$userId'")or die($result."<br/><br/>".mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    if($row["password"]==$oldpassword && $newpass==$cnewpass){
            mysqli_free_result($result);
            mysqli_next_result($conn); 
             $newpasswords = openssl_encrypt($newpass, $encrypt_method, $key, 0, $iv);
            $result=mysqli_query($conn,"UPDATE users SET password ='$newpasswords' WHERE id='$userId' ")or die($result."<br/><br/>".mysqli_error($conn));
             header("Location: ../View/home.php");

} 

    else{
    echo "<center>Lutfen tekrar kontrol ediniz! <a href=javascript:history.back(-1)>Geri Don</a></center>";
}



 ?>