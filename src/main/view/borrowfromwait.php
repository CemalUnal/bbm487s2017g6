
<?php
include("../Controller/index.php");
session_start();
 ?>
<html>
<head>
<title></title>
<style type="text/css">
  table {
  margin-top: 10px;
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #C9BD97}

th {
    background-color: #4B3B0A;
    color: white;
}
tr.hover {
   cursor: pointer;
   /* whatever other hover styles you want */
}
</style>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script> 
$(function(){
  $("#header").load("signed.php"); 
  $("#footer").load("footer.html");
  });
</script> 
</head>
<body>
<div id="header"></div>
<div class="fonts">
<div class="container">
            <div align="center">
            <div align="right">
            
            
<?php
if(isset($_GET['err'])&&$_GET['err']==1){
   echo "<br></br>";
  echo "Şuanda elinizde olan kitap sayısı sınırdadır. Lütfen kitap iade edip tekrar deneyiniz!";
  echo "<br></br>";
}
$id=$_SESSION["id"];
$result = mysqli_query($conn,"SELECT * FROM messages WHERE userid='$id' AND alreadyread=0");
$row = mysqli_fetch_array($result);
//$row = mysqli_fetch_array($result);
$date = date("Y-m-d");
mysqli_free_result($result);
mysqli_next_result($conn);

//$result = mysqli_query($conn,"SELECT * FROM userbooks WHERE userid='$id'");

  $book = (int)$row['message'];

  //$bookids=$row['bookid'];
  $result2 = mysqli_query($conn,"SELECT * FROM books WHERE id='$book'");
  $row2 = mysqli_fetch_array($result2);
   echo "<br>";
  echo "<br>";
  echo "<div align='center'>";
  echo "UYARI: Eğer elinizde bulunan kitap sayısı 4 ise kitabı ödünç alamazsınız. Lütfen kitaplardan birini iade ettikten sonra alınız.";
 
  echo "<br>";
  echo "<br>";
  echo "Bekleme listesinde olduğunuz ".$row2['name']." kitabı şuanda müsaittir. Kitabı ödünç almak istiyor musunuz?";
 echo "</div>";
  echo "<br>";
//mysqli_close($con);

 echo "<div style='margin-bottom: 75px; margin-right: 350px;'><a href='../Controller/borrowBook.php?book=".$book."' class='button button0' >KİTABI AL</a>";
 echo "<a href='../Controller/leavebook.php?book=".$book."' class='button button0' >BU KİTABI ALMAK İSTEMİYORUM</a>";
 ?>
<!--<a href="../Controller/leavebook.php" class="button button0" >BU KİTABI ALMAK İSTEMİYORUM</a></div>-->
</div>
</div>


</div>
</div>
<div id="footer"></div>


</body>
</html>
