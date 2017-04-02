
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
            <div align="center">
            <div id="login">
               <form action = "../Controller/session.php" method = "post">
               <div style="margin-left: -15px; margin-top: 100px;">
                  <label>E-mail :</label><input type = "text" id="email" name = "email" class = "box" /><br /><br />
                  </div>
                  <label>Şifre  :</label><input type = "password" id= "password" name = "password" class = "box" /><br/><br />
                  <div style="margin-top: 20px; margin-bottom: 100px;">
                  <input type = "submit" class="button button0" style="margin-right: 467px" value = " GİRİŞ YAP "/><br />
<br /><br /><br /> <br />

                   <a href="../Controller/signup.php" style=" color: #4B3B0A;font-family: fantasy, 'Blippo', fantasy; margin-left:40px">Hesabınız Yoksa Hemen Üye Olun!</a>
                  </div>

               </form>
               </div>
               </div>
</div>

<div id="footer"></div>


</body>
</html>