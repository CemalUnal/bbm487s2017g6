<?php
include('index.php');


    $name = ($_POST['name']);
    $surname = ($_POST['surname']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    


    $encrypt_method = "AES-128-CBC";
    $secret_key = 'admin';
    $secret_iv = 'admin';

    // hash
    $key = hash('sha256', $secret_key);

    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    
        $passwords = openssl_encrypt($password, $encrypt_method, $key, 0, $iv);
  

    $result=mysqli_query($conn,"INSERT INTO users(name,surname,email,password) VALUES ('$name','$surname','$email','$passwords')")or die($sql2."<br/><br/>".mysqli_error($conn));
    if($result){
    header("Location: session.php?email=$email&password=$password");

} 

    else{
    echo "ERROR: Could not able to execute $sql. " ;
}



 ?>