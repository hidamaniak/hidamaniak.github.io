<DOCTYPE html> <!-- specify it is HTML5 -->
<!--
File:php_project_pet.php
Purpose: MySQLExercise
-->
<html>
<head>
	<title>MySQL Query</title>
	<link rel="stylesheet" type="text/css' href="group#-project-stylesheet"/>
</head>
<body>
	<?php
	$server = "hermes.waketech.edu";
	$user =  "frank";
	$pw = "csc124";
	$db = "frank";
	$connect = mysqli_connect($server, $user, $pw, $db);
		if( !$connect) {
			die("ERROR: Cannot connect to database $dbon server $server using name  
	$user (".mysqli_connect_errno().")");	}
	$petName = $_POST["petname"];
	$userQuery = "SELECT name, owner, species, sex, birth, death FROM pet WHERE name = '".$petName."'";
	$result= mysqli_query($connect, $userQuery);
		if (!$result) {
			die("Could not sucessfully run query ($userQuery) from $db: ".mysqli_error ($connect) ); }
		if (mysqli_num_rows($result) == 0) {
			print("No records found with query $userQuery"); }
		else {
			print("<h1>".$petName."Pet Detail Information</h1>");
			print("<p>The following record was retrieved from the pet table:</p>");
			print("<table border = \"1\">");          
			print("<tr><th>Name</th><th>Owner</th><th>Species</th><th>Sex</th>
	   <th>Birth</th><th>Death</th>");
			while($row = mysqli_fetch_assoc($result))	       
				print("<tr><td>".$row['name']."</td><td>".$row['owner']."</td><td>".
				$row['species']."</td><td>".$row['sex']."</td><td>".$row['birth']."</td><td>".
				$row['death']."</td></tr>");
			print("</table>"); }
		($connect);
	?>
</body>
</html>
