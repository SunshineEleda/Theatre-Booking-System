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
        <a class="btn btn-primary" href="managebookings.php" role="button">Manage Bookings</a>
        <a class="btn btn-primary" href="adminPage.php" role="button">Admin Page</a>
      </div>
    </div>
  </section>
		
<div class= "content">


<?php


    if($_GET['bookingid']==NULL){
    echo 'We are unable to process your booking due to missing fields, please try again<a href="managebookins.html">Try again</a>';
    }else {
      $bookingid = $_GET['bookingid'];

require 'connect.php';
    $conn=connect();
    $sql = "DELETE FROM Booking WHERE BookingId = :bookingid";
    $hand = $conn->prepare($sql);
    $hand->bindParam(':bookingid', $bookingid);
    $hand->execute() or die(print_r($hand->errorInfo(), true));
    $res = $hand->setFetchMode(PDO::FETCH_ASSOC); 
    $conn = null;

}
?>

</div>
			

 <div class="adelek">
    <li> &copy; An original design by Adele Kufour </li>
      </div>
      
</body>
</html>