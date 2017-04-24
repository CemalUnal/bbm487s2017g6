<?php
include('index.php');
session_start();

    $userid = ($_GET['userid']);
    $result=mysqli_query($conn,"DELETE FROM users WHERE id='$userid'")or die($result."<br/><br/>".mysqli_error($conn));

    header("Location: ../View/adminuser.php");



 ?>