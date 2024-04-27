<!DOCTYPE html>
<html lang="en">
<head>
   <title>View Order</title>
   <link href="concert.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div class="container">
    <header class = "fctr">
	<h1 class="white">View My Concert Ticket Order</h1>
    </header>
    <?php	
      #Receive inputs values from HTML form
          $email = $_POST['email'];
		 
	  #declare database connection variables 
		  $server = "hermes.waketech.edu";
		  $user =  "ergunderson";
		  $pw = "csc124";
		  $db = "ergunderson";
      #Connect to database 
		  $connect = mysqli_connect($server, $user, $pw, $db);
		  if( !$connect)
		  {
			die("ERROR: Cannot connect to database $dbon server $server using name $user (".mysqli_connect_errno().")");	
		  }
	  #view order
		 $userQuery = "SELECT * FROM customer WHERE Email='$email'";
		 $result= mysqli_query($connect, $userQuery);
		 if (!$result)
		{
			die("Could not sucessfully run query ($userQuery) from $db: ".mysqli_error ($connect) );
		}
				
		if (mysqli_num_rows($result) == 0)
		{
		print("No records found with email $email");
		}
		else
	   {
		while($row = mysqli_fetch_assoc($result))
		{
		print ("<p>Name: ".$row['FirstName']." ".$row['LastName']."</p>"); 
		print ("<ul><li># of Tickets:</li>");
		print ("<li>Adult: ".$row['AdultTicket']."</li>");
		print ("<li>Child: ".$row['ChildTicket']."</li></ul>");
		print ("<p>Date: ".$row['Date']."</p>");
		print ("<p>Location:  ".$row['Location']."</p>");
		print ("<ul><li>Sub-total: ".$row['Subtotal']." </li>");
		print ("<li>Sales Tax: ".$row['Tax']." </li>");
		print ("<li>Fee: ".$row['Fee']."</li></ul>");
		print ("<ul><li><b>TOTAL:</b><b> ".$row['TotalCost']."</b></li></ul");
       }
    }
    ?>
    <footer class = "fctr">
        <a class = "white" href="concert_lp.html">Return to Main page</a>
        <p class = "white">&copy; Copyright 2024 by E.R. Gunderson</p>
    </footer>
  </div> 
</body>
</html>

