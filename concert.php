<!DOCTYPE html>
<html lang="en">
<head>
  <title>Concert Form</title>
  <link href="Lab14_concert.css" type="text/css" rel="stylesheet" />
</head>
<body>
  <div class="container">
    <header class = "fctr">
	<h1 class="white">Summary of Concert Ticket Cost</h1>
    </header>
    <?php
	#Receive inputs values from HTML Form
		$name = $_POST['name'];
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
	#Calculate the transaction fee, subtotal, tax and total cost
		$totalTickets = $adultTickets + $childTickets;
		if ($totalTickets <= ATTEND){
				$fee = ($totalTickets * MAX_FEE);}
		else {
				$fee = ($totalTickets * MIN_FEE);}
		$subtotal = ($adultTickets * ADULT_COST) + ($childTickets * CHILD_COST);
		$salesTax = ($subtotal * TAX);
		$totalCost = $subtotal + $salesTax + $fee;
	#Show final results
		print ("<p>Thank you <b>".$name."</b> at <b>".$email."</b>. Details of
		your total cost <b>$".number_format($totalCost, 2)."</b> are shown below:
		</p>");
		print ("<ul><li>Adult Tickets: ".$adultTickets." </li>");
		print ("<li>Child Tickets: ".$childTickets." </li>");
		print ("<li>Date: ".$date." </li>");
		print ("<li>Location: ".$location." </li>");
		print ("<li>Sub-total: $".number_format($subtotal, 2)." </li>");
		print ("<li>Sales Tax: $".number_format($salesTax, 2)." </li>");
		print ("<li>Fee: $".number_format($fee, 2)."</li></ul>");
		print ("<ul><li><b>TOTAL:</b><b>$".number_format($totalCost, 2)."</b></li></ul");
		print ("<h3>Thank you for using this program!</h3>");
	?>
	<br>
	<br>
    <footer class = "fctr">
        <a class="white" href="Lab14_concert_form.html">Return to Form Entry To Continue</a>
		 <p class = "white">&copy; Copyright 2024 by E.R. Gunderson</p>
    </footer>
  </div> 
</body>
</html>