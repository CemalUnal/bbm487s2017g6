
<?php 
 
include("index.php");
session_start();
 

$search = $_POST['search'];

 
$result = mysqli_query($conn,"SELECT * FROM books WHERE name LIKE '$search%%'");
 //$row = mysqli_fetch_array($result);
$searchresult = array();
//for($i=0;$i<sizeof($row);$i++){
while($row = mysqli_fetch_array($result))
{
	array_push($searchresult,$row['id']);
	
}
	$_SESSION['searcharray'] = $searchresult;
	
	if(sizeof($_SESSION['searcharray'])>0)
    	header("Location:../View/findBook.php");
	else
		header("Location:../View/findBook.php?err=1");

 

?>