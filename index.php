<html>
	<head>
		<title>Insert W/B list!</title>
	<style>
		a{
			text-decoration: none;	
			color: 0000FF;
		}		
		body{
			color: #333333;
			font-family: Century Gothic, sans-serif;
			margin-left: 3em;
		}
input {
    display: block;
	margin-bottom: 0.25em;
}

label {
    float: left;
    margin-right: 0.5em;
} 
	</style>
	</head>
	<body>
	<form action="submit.php" method="post">
		<label>Recipient Email : </label>
		<input type="text" name="r_email" placeholder="recipient@example.com">
		<br>
		<label>Sender Email : </label>
		<input type="text" name="s_email" placeholder="sender@example.com">
		<br>
		<label>Type : </label>
		<input type="radio" name="type" value="b" checked="checked">(b) blacklist
		<input type="radio" name="type" value="w">(w) whitelist
		<input type="submit" value="Submit">
	</form>
		<?php
	include('connection.php');

/*	
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
*/	echo "<h1>White/Black list</h1>";
	$getsort = $_GET["wborder"];
	switch($getsort){
		case '1' : $sort =" ORDER BY r_email"; break;
		case '2' : $sort =" ORDER BY s_email"; break;
		case '3' : $sort =" ORDER BY wb"; break;
		default : $sort =""; break;
	}
	$sqlinswb= "SELECT rid,sid,r_email, email AS s_email, wb FROM mailaddr INNER JOIN (SELECT email AS r_email,rid,sid, wb FROM users INNER JOIN wblist ON users.id = wblist.rid)T ON mailaddr.id = T.sid".$sort;
//	echo $sqlinswb;
	$resultinswb= $db->query($sqlinswb);
	$uni = "▼";
	if ($resultinswb->num_rows > 0) {
     	echo "<table><tr><th>recipient<a href=\"index.php?wborder=1\">".$uni."</a></th><th>sender<a href=\"index.php?wborder=2\">".$uni."</a></th><th>wb<a href=\"index.php?wborder=3\">".$uni."</a></th></tr>";
     	while($row = $resultinswb->fetch_assoc()) {
         	echo "<tr><td>" . $row["r_email"]. "</td><td>" . $row["s_email"]. "</td><td>".$row["wb"]."</td><td><a href=\"delete.php?rid=".$row["rid"]."&sid=".$row["sid"]."\">delete</a></td></tr>"; 
     	}
     echo "</table>";
	} else {
     	echo "0 results";
	}
  
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
		?>
	</body>
</html>
