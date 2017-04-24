
<?php 
 
include("index.php");
ob_start();
session_start();
 

$email = $_POST['email'];
//$password = $_POST['password'];
if($email){
	$password = $_POST['password'];

}
else{
	$email = $_GET['email'];
	$password = $_GET['password'];
}

    $encrypt_method = "AES-128-CBC";
    $secret_key = 'admin';
    $secret_iv = 'admin';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $passwords = openssl_encrypt($password, $encrypt_method, $key, 0, $iv);
 
$sql_check = mysqli_query($conn,"SELECT * FROM users where email='".$email."' and password='".$passwords."' ") or die(mysql_error($conn));

if(mysqli_num_rows($sql_check))  {
    $_SESSION["login"] = "true";
    $_SESSION["user"] = $email;
    $_SESSION["pass"] = $passwords;
$row = mysqli_fetch_array($sql_check);
    $_SESSION["id"] = $row["id"];
    $_SESSION["name"] = $row["name"];
    $_SESSION["admin"] = $row["admin"];
    header("Location:../View/home.php");
}
else {
    if($email=="" or $password=="") {
        echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
    else {
        echo "<center>Kullanici Adi/Sifre Yanlis.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
}
 
ob_end_flush();
?>
