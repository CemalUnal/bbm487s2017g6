
<?php
include("../Controller/index.php");
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<style>
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

  div.fonts {
    font-weight: bold;
    color: #4B3B0A;
      font-family: fantasy, 'Blippo', fantasy;
      font-size: 101%;
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
/*nav {
    float: left;
    max-width: 160px;
    margin: 0;
    padding: 1em;
}

nav ul {
    list-style-type: none;
    padding: 0;
}
   
nav ul a {
    text-decoration: none;
}

article {
    margin-left: 10px;
    padding: 1em;
    overflow: hidden;
}*/

</style>
</head>
<body>

<div class="container" style="background: #C9BD97">

<header style="text-align: left; background: #C9BD97"> 
<div class="img">
  
    <img src="books.jpg" width="100" height="150">

</div>

<a href="../Controller/logout.php" class="button button0" >ÇIKIŞ YAP</a>
<a href="mybooks.php" class="button button0" >KİTAPLARIMI GÖRÜNTÜLE</a>
<a href="userinfo.php" class="button button0" >BİLGİLERİMİ GÖRÜNTÜLE</a>
        <?php    if($_SESSION["admin"]==1){ ?>
 <a href="adminuser.php" class="button button0" >KULLANICILAR</a>
 <?php } ?>
        <?php    if($_SESSION["admin"]==1){ ?>
 <a href="books.php" class="button button0" >KİTAPLAR</a>
 <?php } ?>

   <h1 style="text-align: center;">KÜTÜPHANE SİSTEMİ</h1>
    </header>
        <div align="center">
       <a href="home.php" style=" font-weight: bold; color: #4B3B0A;font-family: fantasy, 'Blippo', fantasy; margin-left:20px;">ANA SAYFA</a>
       <br/>
       <?php
        $id = $_SESSION["id"];
        $result = mysqli_query($conn,"SELECT * FROM messages WHERE userid='$id' AND alreadyread=0");
        $row = mysqli_fetch_array($result);
          if(sizeof($row)>0)
            echo "<a href='borrowfromwait.php' style=' font-weight: bold; color: #4B3B0A;font-family: fantasy, 'Blippo', fantasy; margin-left:20px;''>Bekleme Listesinde Olduğunuz Bir 
          Kitap Uygun Durumdadır. Lütfen Almak İçin Bu Sayfayı Görüntüleyin!</a>";
        ?>
       </div>

<br></br>
<div class="fonts">
<?php 
//include("session.php");
//session_start();
 if (isset($_SESSION["user"])) {
         $loggenOnUser = strtoupper($_SESSION["name"]);
         echo "HOŞGELDİN ", $loggenOnUser, "<br />";
     }

 ?>
 </div>
<article>
  
</article>


</div>

</body>
</html>
