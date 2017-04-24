<?php
include("../Controller/index.php");
session_start();
 ?>
<html>
<head>
<title></title>
<style >
  div.container {
    width: 100%;
    border: 1px solid #073F68;
    background-color: #E7D8A8;
}

header{
    padding: 1em;
    color: #6B550F;
    background-color: white ;
    border-bottom: 1px white;
    border-top: 1px solid #6B550F;
    clear: left;
    text-align: center;
    font-family: fantasy, 'Blippo', fantasy;
    font-size: 120%;

  }
div.img {
    margin: 5px;
    border: 1px solid #C9BD97;
    float: left;
    width: 100px;
    margin-left: 20px;
    margin-top: 20px;
}

div.img:hover {
    border: 1px solid #777;
}

div.img img {
    width: 100%;
    height: auto;
}

/*div.desc {
    padding: 15px;
    text-align: center;
}.button {
    background-color: #EDF1F1;
    border: 2px solid #A0A4A5;
    color: black;
    padding: 7px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    float: right;

}
.button0 {border-radius: 8px;}
         .box {
            border:#666666 solid 1.5px;
         }----------------------*/
        div.desc {
    padding: 15px;
    text-align: center;
} .button {
  -moz-box-shadow:inset 0px 0px 0px 0px #fce5bd;
  -webkit-box-shadow:inset 0px 0px 0px 0px #fce5bd;
  box-shadow:inset 0px 0px 0px 0px #fce5bd;
  background-color:#e6e4c1;
  -moz-border-radius:7px;
  -webkit-border-radius:7px;
  border-radius:7px;
  border:1px solid #8f7c43;
  display:inline-block;
  cursor:pointer;
  color:#66411a;
  font-size:12px;
  padding:16px 31px;
  text-decoration:none;
  text-shadow:0px 1px 0px #909453;
   margin: 4px 2px;
    cursor: pointer;
    float: right;
}
.button:hover {
  background-color:#e8daa0;
}
.button:active {
  position:relative;
  top:1px;
}
</style>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script> 
$(function(){
 <?php 
     if(isset($_SESSION['login'])==true && $_SESSION['login']==true){?>
		
      $("#header").load("signed.php");
   <?php } 
else { ?>
	 $("#header").load("library.html"); 
<?php } ?>
  $("#footer").load("footer.html");
  });
</script> 
</head>
<body>
<div id="header"></div>
<div class="container">
<br></br>
 <div >
  <div class="fonts">

    <?php

$bookId = $_GET['bookId'];
 if(isset($_GET['line']) ) {
      echo "<br></br>";
   echo "Bu Kitap İçin Bekleme Listesinde ".$_GET['line'].". Sıradasınız!";
echo "<br></br>";
 }

$result2 = mysqli_query($conn,"SELECT * FROM books WHERE id='$bookId'");
$row = mysqli_fetch_array($result2);
mysqli_free_result($result2);
mysqli_next_result($conn); 




echo str_repeat('&nbsp;', 100);
//echo  '<font size="4.5">'."Kitabın Adı: ".'</font>';
echo  '<font size="6">' .$row["name"]. '</font>';
echo  "<br>"; 
echo str_repeat('&nbsp;', 90);
echo   '<font size="4.5">'." Kitabın Yazarı: ".'</font>';
echo   '<font size="4.5">' .$row["author"].'</font>';
echo  "<br>"; 
echo str_repeat('&nbsp;', 90);
echo   '<font size="4.5">'." Basım Yılı: ".'</font>';
echo  '<font size="4.5">' .$row["year"].'</font>'; 
echo  "<br>"; 
if(isset($_SESSION['login'])==true && $_SESSION['login']==true){
echo str_repeat('&nbsp;', 90);
echo  '<font size="4.5">'." Uygunluk Durumu: ".'</font>';
if($row["available"]==0)
$sit="Uygun";
else
$sit = "Uygun Değil";
echo   '<font size="4.5">' .$sit.'</font>';
echo  "<br>"; }
echo "<br>";


     if(isset($_SESSION['login'])==true && $_SESSION['login']==true){
             if($row["available"]==0)
               echo '<a href="../Controller/borrowBook.php?bookId='. $bookId .'"  class="button button0">KİTABI AL</a>';
             else{
              $id=$_SESSION["id"];
              $result = mysqli_query($conn,"SELECT * FROM waitlist WHERE userid='$id' AND bookid='$bookId'");
              $lines=mysqli_num_rows($result);
                  mysqli_free_result($result);
              mysqli_next_result($conn); 
               $result = mysqli_query($conn,"SELECT * FROM userbooks WHERE userid='$id' AND bookid='$bookId' AND returned = 0");
               $lines2=mysqli_num_rows($result);

               if($lines==0&&$lines2==0 ) {
              echo '<a href="../Controller/addWaitList.php?bookId='. $bookId .'"  class="button button0">KİTAP BEKLEME LİSTESİNE ADIMI EKLE</a>';
            }
            if($lines2==0){
              echo str_repeat('&nbsp;', 150);
               echo "Bu Kitap İçin Bekleme Listesindesiniz!";
        
               }
            }
       } 

       ?>

       <br> </br>
</div>
</div>
<br></br>
</div>

<div id="footer"></div>


</body>

</html>