<!DOCTYPE html>
<html>
<head>
	<title>SoomStrom Theatre</title>
	<meta charset="utf-8"/>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	 <link rel="stylesheet" type="text/css" href="Booking.css">
     <script src="scripts/main.js"></script>
</head>
<body>

<section class="jumbotron">
    <div class="container">
      <div class ="row text-center">
        <h1>SoomStrom Theatre</h1>
        <a class="btn btn-primary" href="index.html" role="button">Home</a>
        <a class="btn btn-primary" href="schedule.php" role="button">Schedule</a>
        <a class="btn btn-primary" href="managebookings.html" role="button">Manage Bookings</a>
        <a class="btn btn-primary" href="adminPage.php" role="button">Admin Page</a>
      </div>
    </div>
  </section>

		
		
		<div class="content">
<?php
	
	set_time_limit(60);
	
//gotten rid of the time and date variabes, need to bring back somehow!!


	if($_GET['Name']==NULL || $_GET['Surname']== NULL || $_GET['EmailAddress']== NULL
	    || $_GET['NumberOfTickets']== NULL || $_GET['TicketType']== NULL || $_GET['Production']== NULL){
		echo 'We are unable to process your booking due to missing fields, please try again<a href="schedule.php">Try again</a>';
	}else {
	    $balcony = 1.80;
	    $front = 1.50;
	    $rear = 1.00;
	    $box1 = 5.00;
	    $box2 = 5.00;
	    $box3 = 4.00;
	    $box4 = 4.00;
	    
	    $email = $_GET['EmailAddress'];
	    $ticType = $_GET['TicketType'];
	    $Name = $_GET['Name'];
	    $Surname = $_GET['Surname'];
	    $customerName = $Surname;
	    $number = $_GET['NumberOfTickets']; //from the page were input of the number of tickets is entered



	        $price = 15.00*$balcony;
	 

	    
		
        $total = $price * $number;
        $count = 1;
// insert order into the database
       try {
        require 'connect.php';
	    $conn=connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);

		while ($count <= $number) { 

         $randNum = rand();
	     $BookingId = $randNum;

        //INSERT INTO THE BOOKING TABLE

         
    
         $rowNumber = 'U01';
         $date = '2016-12-20';
         $time = '17:00:00';



		$handle= $conn->prepare("INSERT INTO Booking VALUES
			                      (:BookingId, :date, :time, :customerName, :email, :rowNumber)");
        $handle->bindParam(':BookingId', $BookingId);
        $handle->bindParam(':date', $date);
        $handle->bindParam(':time', $time);
        $handle->bindParam(':customerName', $customerName);
        $handle->bindParam(':email', $email);
        $handle->bindParam(':rowNumber', $rowNumber);
		$handle->execute() or die(print_r($handle->errorInfo(), true));


         $count++;
         echo 'Congratulations that was inputted';
        //end of if statement to get the row
        
                 
        //end of while loop
	    }

		$conn = null;
         echo 'sorry that was not successful';
        //end of try catch

       } catch (PDOException $ex) {
        echo  $ex->getMessage();
       }
        
       


  //end of first if statement
   }     


?>
					
			
		</div>
	</body>
</html>






