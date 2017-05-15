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
  $("#header").load("signed.php"); 
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
         if(isset($_GET['err']) && $_GET['err'] == 1) {
      echo "<br></br>";
   echo 'Böyle Bir Kitap Bulunmamaktadır!';
} 
    $bookId = $_GET['bookId'];
    $user = $_SESSION["id"];
if(isset($_GET['payed'])&&$_GET['payed']==1){
  $result=mysqli_query($conn,"UPDATE userbooks SET paid =1 WHERE bookid='$bookId' AND userid='$user' ")or die($result."<br/><br/>".mysqli_error($conn));
  echo "<form action = '../Controller/return.php' method = 'post'>
               <div style='margin-left: 10px; margin-top: 20px;'>
                  <label>Kitabın Barkodunu Giriniz: </label><input type = 'text' name = 'barcode' class = 'box' /><br /><br />
                  </label><input type = 'text' name = 'bookid' style='display: none;' value='".$bookId."' />
                  </div>
                
                <input type = 'submit' style='margin-right: 475px;'  class='button button0' value = ' KİTABI İADE ET '/><br />
                </form>";
  echo "<br>";
  echo "<br>";
}
else{
$result2 = mysqli_query($conn,"SELECT * FROM userbooks WHERE bookid='$bookId' AND userid='$user' ");
$row = mysqli_fetch_array($result2);
mysqli_free_result($result2);
mysqli_next_result($conn); 
  $bookids=$row['bookid'];
  $result = mysqli_query($conn,"SELECT * FROM books WHERE id='$bookids'");
  $row2 = mysqli_fetch_array($result);
  $date = date("Y-m-d");
$end = strtotime($row['returndate'])-strtotime($date);
$end = floor($end / (60 * 60 * 24));
 //if($end<0 && $row['returned']==0 ){
if($row['paid']==0){
  echo str_repeat('&nbsp;', 20);
    echo  '<font size="4.5">'."Bu kitabı iade etmek için " . -$end ." gün "."geç kaldığınız için ödemeniz gereken ceza miktarı ".'</font>'; 
echo  '<font size="5">' . -$end*1 .'</font>'; 
echo  '<font size="4.5">'." TL'dir. ".'</font>'; 
echo "<br>";
echo '<a href="payment.php?bookId='. $bookId .'"  class="button button0">CEZAYI ÖDE</a>';
echo "<br>";
}
else{

 echo "<form action = '../Controller/return.php' method = 'post'>
               <div style='margin-left: 10px; margin-top: 20px;'>
                  <label>Kitabın Barkodunu Giriniz: </label><input type = 'text' name = 'barcode' class = 'box' /><br /><br />
                  </label><input type = 'text' name = 'bookid' style='display: none;' value='".$bookId."' />
                  </div>
                
                <input type = 'submit' style='margin-right: 475px;'  class='button button0' value = ' KİTABI İADE ET '/><br />
                </form>";
/*   <!-- echo '<a href="../Controller/return.php?bookId='. $bookId .'"  class="button button0">Kitabı Barkod Kullanarak İade Et</a>';
  //echo '<a href="payment.php?bookId='. $bookId .'"  class="button button0">Kitabı Hemen İade Et</a>';
echo "<br>";
echo "<br>";
}
}
?>-->*/
} }?>
</div>
<br></br>
</div>
</div>
<div id="footer"></div>


</body>

</html>