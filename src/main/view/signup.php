
<?php
include('../Controller/index.php');
?>
<html>
<head>
<title></title>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script> 
$(function(){
  $("#header").load("library.html"); 
  $("#footer").load("footer.html");
  });
</script> 
</head>
<body>
<div id="header"></div>
<div class="container">
<div class="fonts">
            <div align="center">
               <form action = "../Controller/saveuser.php" method = "post">
               <div style="margin-left: 10px; margin-top: 20px;">
                  <label>Ad :</label><input type = "text" name = "name" class = "box" /><br /><br />
                  </div>
                    <div style="margin-left: -15px; ">
                   <label>Soyad :</label><input type = "text" name = "surname" class = "box" /><br /><br /></div>
                  <label>Şifre  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <div style="margin-left: -15px;">
                  <label>E-Mail  :</label><input type = "text" name = "email" class = "box" /><br/><br />
                  </div>

                  <div style=" margin-top: 20px; margin-bottom: 200px;">

                  <input type = "submit" style="margin-right: 475px;"  class="button button0" value = " KAYIT OL "/><br />
                  </div>
               </form>
               </div>
              </div>
</div>

<div id="footer"></div>


</body>
</html>
