<html>
	<head>
		<title>View Whitelists & Blacklists</title>
	</head>
	<body>
		<?php
	include('connection.php');

	echo "<h1>Users</h1>";
	$sqlusers = "SELECT id,policy_id,email FROM users";
	$resultusers = $db->query($sqlusers);
	if ($resultusers->num_rows > 0) {
     	echo "<table><tr><th>id</th><th>policy_id</th><th>email</th></tr>";
     	while($row = $resultusers->fetch_assoc()) {
        	echo "<tr><td>" . $row["id"]. "</td><td>" . $row["policy_id"]."</td><td>". " " . $row["email"]. "</td></tr>"; 
     	}
    	echo "</table>";
	} else {
    	echo "0 results";
	}
	
	echo "<h1>Mailaddr</h1>";
	$sqlmailaddr= "SELECT id,email FROM mailaddr";
	$resultmailaddr= $db->query($sqlmailaddr);
	if ($resultmailaddr->num_rows > 0) {
     	echo "<table><tr><th>id</th><th>email</th></tr>";
     	while($row = $resultmailaddr->fetch_assoc()) {
         	echo "<tr><td>" . $row["id"]. "</td><td>" . $row["email"]. "</td></tr>"; 
     	}
     echo "</table>";
	} else {
     	echo "0 results";
	}	

	echo "<h1>Join to the world. The Lord is come.</h1>";
	echo "<h2>User </h2>";
	$sqlinswb= "SELECT r_email, email AS s_email, wb FROM mailaddr INNER JOIN (SELECT email AS r_email, sid, wb FROM users INNER JOIN wblist ON users.id = wblist.rid)T ON mailaddr.id = T.sid";
	$resultinswb= $db->query($sqlinswb);
	if ($resultinswb->num_rows > 0) {
     	echo "<table><tr><th>r_email</th><th>s_email</th><th>wb</th></tr>";
     	while($row = $resultinswb->fetch_assoc()) {
         	echo "<tr><td>" . $row["r_email"]. "</td><td>" . $row["s_email"]. "</td><td>".$row["wb"]."</td></tr>"; 
     	}
     echo "</table>";
	} else {
     	echo "0 results";
	}
		?>
	</body>
</html>
