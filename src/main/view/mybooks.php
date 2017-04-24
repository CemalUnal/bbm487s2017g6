
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
            <h2 style="color: #4B3B0A">KİTAPLARIM</h2>
            <div align="right">
            <input type="text" id="search"  placeholder="KİTAP ARA"></div>
            
<?php
$id=$_SESSION["id"];
$result = mysqli_query($conn,"SELECT * FROM userbooks WHERE userid='$id'");
$row = mysqli_fetch_array($result);
mysqli_free_result($result);
mysqli_next_result($conn);
$date = date("Y-m-d");
$end = strtotime($row['returndate'])-strtotime($date);
$end = floor($end / (60 * 60 * 24));
echo "<table id='table' border='1'>
<tr>
<th>Kitabın Adı</th>
<th>Yazarı</th>
<th>Alınan Tarih</th>
<th>Teslim Tarihi</th>
<th>Teslim Durumu</th>";
if($end>=0 && $row['returned']==0) 
  echo "
<th>Kalan Süre</th>
</tr>";
else if($end<0&& $row['returned']==0)
echo "
<th>Ceza Miktarı</th>
</tr>";
$result = mysqli_query($conn,"SELECT * FROM userbooks WHERE userid='$id'");
while($row = mysqli_fetch_array($result))
{
  $bookids=$row['bookid'];
  $result2 = mysqli_query($conn,"SELECT * FROM books WHERE id='$bookids'");
  $row2 = mysqli_fetch_array($result2);
echo "<tr>";

echo "<td>"  ;
echo $row2['name'] ;
echo '<a href="mybookinfo.php?bookId='. $row['bookid'] .'"/>';
echo "</td>";
echo "<td>" . $row2['author'] . "</td>";
echo "<td>". $row['loandate'] . "</td>";
echo "<td>". $row['returndate'] . "</td>";
if($row['returned']==0)
  echo "<td>Teslim Edilmedi</td>";
else
  echo "<td>Teslim Edildi</td>";
if($end>=0)
echo "<td>". $end ." Gün". "</td>";
else
echo "<td>". -$end*1 ."TL". "</td>";
//echo '</a>';
echo "</tr>";
}
echo "</table>";
echo "<br/><br/><br/><br/>"

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
</div>
<script type="text/javascript">
  $('tr').click( function() {
    window.location = $(this).find('a').attr('href');
}).hover( function() {
    $(this).toggleClass('hover');
});
</script>
       
               </div>


</div>

<div id="footer"></div>


</body>
</html>
