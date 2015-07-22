<?php
	include('connection.php');
	$r_email = $_POST[ "r_email"];
	$s_email = $_POST[ "s_email"];
	$type = $_POST[ "type"];

	$sqlinsuser= "INSERT INTO users (email) VALUES ('$r_email')";
	$sqlinsmdr= "INSERT INTO mailaddr (email) VALUES ('$s_email')";
#	$sqliduser= "SELECT id FROM users WHERE users.email = '$r_email'";
#	$sqlidmdr= "SELECT id FROM mailaddr WHERE mailaddr.email = '$s_email'";
	$sqlckwb= "SELECT * FROM wblist WHERE wblist.rid = '$r_email' AND wblist.sid = '$s_email' ";
	$sqlinswb= "INSERT INTO wblist (rid,sid,wb) VALUES((SELECT id FROM users WHERE users.email = '$r_email'),(SELECT id FROM mailaddr WHERE mailaddr.email = '$s_email'),'$type')";

	$db->query($sqlinsuser);
	$db->query($sqlinsmdr);
	$resultck = $db->query($sqlckwb);
	if($resultck->num_rows == 0 ){
		$db->query($sqlinswb);
		header("Location: http://10.10.6.91/wbl");
	}
	else{
		echo "dup r_email & s_email";	
	}
	
?>
