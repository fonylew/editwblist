<?php
	include('connection.php');
	$id = $_GET[ "id"];

	$sqldelete= "DELETE FROM users WHERE users.id=$id"; 

	$db->query($sqldelete);
	header("Location: http://10.10.6.91/wbl");
	
?>
