
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
<div class="container">
            <div align="center">
            <h2 style="font-weight: bold; color: #4B3B0A;font-family: fantasy, 'Blippo', fantasy;">KİTAPLAR</h2>
            <div align="right">
            <input type="text" id="search"  placeholder="KİTAP ARA"></div>
            <div class="fonts">
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
echo '<a href="changebook.php?bookId='. $row['id'] .'"/>';
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
</div>
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
       <div style="margin-bottom: 75px;"><a href="addbook.php" class="button button0" >KİTAP EKLE</a></div>
               </div>


</div>

<div id="footer"></div>


</body>
</html>
