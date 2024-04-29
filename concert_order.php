<!DOCTYPE html>
<html lang="en">
<head>
  <title>Concert Form </title>
  <link href="concert.css" type="text/css" rel="stylesheet" />
</head>
<body>
  <div class="container">
    <header class = "fctr">
	<h1 class="white">Summary of Concert Ticket Cost</h1>
    </header>
    <?php
        #Receive all input values from concert_form.html file
			$lastName = $_POST['lastName'];
			$firstName = $_POST['firstName'];
			$email = $_POST['email'];
			$adultTickets = (int)$_POST['adultTickets'];
			$childTickets = (int)$_POST['childTickets'];
			$date = $_POST['date'];
			$location = $_POST['location'];
		#Declare and define global named constants
		define ("TAX", 0.07);
		define ("ADULT_COST", 36.75);
		define ("CHILD_COST", 25.50);
		define ("MIN_FEE", 0.50);
		define ("MAX_FEE", 1.00);
		define ("ATTEND", 5);
		#declare database connection variables
			$server = "hermes.waketech.edu";
			$user = "ergunderson";
			$pw = "csc124";
			$db = "ergunderson";
		#process input data, calculate the payment results
			$totalTickets = $adultTickets + $childTickets;
				if ($totalTickets <= ATTEND){
						$fee = ($totalTickets * MAX_FEE);}
				else {
						$fee = ($totalTickets * MIN_FEE);}
				$subtotal = ($adultTickets * ADULT_COST) + ($childTickets * CHILD_COST);
				$salesTax = ($subtotal * TAX);
				$totalCost = $subtotal + $salesTax + $fee;
		 #print the invoice
		print("<p>Last Name: $lastName </p>");
		print("<p>First Name: $firstName </p>");
		print("<p>Email: $email </p>");
		print("<p>Adult Tickets: $adultTickets </p>");
		print("<p>Child Tickets: $childTickets </p>");
		print("<p>Date: $date </p>");
		print("<p>Location: $location </p>");
		print("<p>Subtotal: $subtotal </p>");
		print("<p>Tax: $salesTax </p>");
		print("<p>Fee: $fee </p>");
		print("<p>Total: $totalCost </p>");
		#Save order information in customer table in database
			  $connect = mysqli_connect($server, $user, $pw, $db);
			  if( !$connect)
			  {
				die("ERROR: Cannot connect to database $dbon server $server using name $user (".mysqli_connect_errno().")");	
			  }
			  $userQuery = "INSERT INTO customer (LastName, FirstName, Email, AdultTicket, ChildTicket, Date, Location, Subtotal, Tax, Fee, TotalCost)
				VALUES ('$lastName', '$firstName', '$email', '$adultTickets', '$childTickets', '$date', '$location', '$subtotal', '$salesTax', '$fee', '$totalCost')";
			  $result= mysqli_query($connect, $userQuery);
			  if (!$result)
			  {
				 die("Could not sucessfully run query ($userQuery) from $db: ".mysqli_error ($connect) );
			  }
			  mysqli_close($connect);

    ?>
	<br>
    <footer class = "fctr">
	<p><a class="white" href="concert_form.html">Return to Main Page</a></p>
	<p class = "white">&copy; Copyright 2024 by Team One</p>
    </footer>
  </div> 
</body>
</html>
