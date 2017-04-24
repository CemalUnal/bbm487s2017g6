
<?php
include('../Controller/index.php');
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
  $("#header").load("signed.php"); 
  $("#footer").load("footer.html");
  });
</script> 
</head>
<body>
<div id="header"></div>
<div class="container"> 

<div align="center">
<div class="fonts">
<?php

     if(isset($_GET['err']) && $_GET['err'] == 1) {
      echo "<br></br>";
   echo 'Seçtiğiniz Kitap Bir Kullanıcı Tarafında Ödünç Alındığı İçin Silme İşlemi Yapamazsınız.';
}
 ?>
 </div>
<?php
        
$bookId = $_GET["bookId"];
//$sql = "SELECT * FROM users WHERE user_id=$userId ";
$result = mysqli_query($conn,"SELECT * FROM books WHERE id='$bookId'");
$row = mysqli_fetch_array($result);
//echo $row["username"]; ?>
<div class="fonts">
               <form action = "../Controller/updatebook.php" method = "post">
               <div style="margin-left: 0px; margin-top: 20px;">
                  <label>Adı :</label><input type = "text" name = "name" value="<?php echo $row["name"]; ?>" class = "box" /><br /><br />
                  </div>
                   <div style="margin-left: -17px;">
                  <label>Yazarı :</label><input type = "text" name = "author" value="<?php echo $row["author"]; ?>" class = "box" /><br /><br />
                 </div>
                  <div style="margin-left: -50px;">
                  <label>Basım Yılı  :</label><input type = "text" name = "year" value="<?php echo $row["year"]; ?>" class = "box" /><br/><br />
                  </div>
                    <div style="margin-left: -25px;">
                  <label>Barkod  :</label><input type = "text" name = "barcode" value="<?php echo $row["barcode"]; ?>" class = "box" /><br/><br />
                  </div>
                  <input type = "hidden" name = "id" value="<?php echo $row["id"]; ?>" class = "box" />
                  <label>Uygunluk Durumu  :</label>
                  <?php 
                  if($row["available"]==0){
                  echo " <label for='public0'><input type='radio' checked='checked' name='available'  value=0 />UYGUN  </label>";
                  echo str_repeat('&nbsp;', 5);
                  echo "<label for='public1'><input type='radio' name='available'  value=1 /> UYGUN DEĞİL</label>";
                }
                  else{
                    echo "<label for='public0'><input type='radio'  name='available'  value=0 /> UYGUN</label>";
                    echo str_repeat('&nbsp;', 5);
                  echo "<label for='public1'><input type='radio' checked='checked' name='available' value=1 /> UYGUN DEĞİL</label>";
                  }

                  ?>
              </div>    


</div> 
                                    <div style="margin-left: 20px; margin-bottom: 100px;">
                              <?php
              echo '<a href="../Controller/deletebook.php?bookid='. $bookId .'"  class="button button0">KİTABI SİL </a>';
                ?>
                
                <!--  <div style="margin-left: 20px; margin-bottom: 100px;">-->

                  <input type = "submit" class="button button0" value = "KİTAP BİLGİLERİNİ DEĞİŞTİR "/><br />
                  </div>
               </form>
</div></div>
<div id="footer"></div>


</body>
</html>