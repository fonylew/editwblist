<?php
	include('connection.php');
	$rid = $_GET[ "rid"];
	$sid = $_GET[ "sid"];

	$sqldelete= "DELETE FROM wblist WHERE wblist.rid=$rid AND wblist.sid=$sid"; 

	$db->query($sqldelete);
	header("Location: http://10.10.6.91/wbl");
	
?>
