
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
 <div align="center">
            <h2 style="color: #4B3B0A">KİTAPLAR</h2>
<div align="right">
<input type="text" id="search"  placeholder="Kitap Ara">
</div>
<?php
$result = mysqli_query($conn,"SELECT * FROM books");

echo "<table id='table' border='1'>
<tr>
<th>Kitabın Adı</th>
<th>Yazarı</th>
<th>Basım Yılı</th>
<th>Uygunluk Durumu</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";

echo "<td>"  ;
echo $row['name'] ;
echo '<a href="bookinfo.php?bookId='. $row['id'] .'"/>';
echo "</td>";
echo "<td>" . $row['author'] . "</td>";
echo "<td>". $row['year'] . "</td>";
if ( $row['available']==0 )
echo "<td> Uygun </td>";
else 
echo "<td> Uygun Değil </td>";
//echo '</a>';
echo "</tr>";
}
echo "</table>";

//mysqli_close($con);
?>
<script type="text/javascript">
  var $rows = $('#table tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
</script>
<script type="text/javascript">
  $('tr').click( function() {
    window.location = $(this).find('a').attr('href');
}).hover( function() {
    $(this).toggleClass('hover');
});
</script>
<!--<?php/*
$result=mysqli_query($conn,"SELECT * FROM (
    SELECT * FROM lastevents ORDER BY lastid DESC LIMIT 10
) sub
ORDER BY lastid ASC");
echo "<table id='table' border='1' class='table2' >

<tr>
<th >SON EKLENEN ETKİNLİKLER</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";

echo "<td>"  ;
echo $row['event_calendarname'] ;
echo '<a href="user.php?userId='. $row['event_calendarname'] .'"/>';
echo "</td>";
echo "</tr>";
}
echo "</table>";*/
 ?>-->
</div>


</div>

<div id="footer"></div>


</body>
</html>