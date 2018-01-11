<!DOCTYPE html>
<html>
<head>
	<title>SoomStrom Theatre</title>
	<meta charset="utf-8"/>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	 <link rel="stylesheet" type="text/css" href="Booking.css">
     <script src='main.js'></script>
             
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


<div class ="container">

<!------ Shows the schedule of available shows ---->

<div class="row">
    <div class="col-sm-3">
<?php

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

        require 'connect.php';
		$conn=connect();
		$sql = "SELECT DISTINCT Production.title, PerfDate, PerfTime, BasicTicketPrice
                FROM Performance, Production
                WHERE Performance.title=Production.title";
		$handle = $conn->prepare($sql);
		$handle->execute();
		$res = $handle->setFetchMode(PDO::FETCH_ASSOC); 
		
		echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Title</th><th>Performance Date</th><th>Performance Time</th><th>Basic Ticket Price</th></tr>";
		foreach(new TableRows(new RecursiveArrayIterator($handle->fetchAll())) as $k=>$v) { 
        echo $v;
          }
        
     
           echo "</table>";
		
    ?>

</div>

<div class="col-sm-3">

    <?php


    class Table extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 
    
    $sql = "SELECT * FROM Zone";
    $handle = $conn->prepare($sql);
    $handle->execute();
    $conn = null;
    $res = $handle->setFetchMode(PDO::FETCH_ASSOC); 
    
    echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Seat Zone Name</th><th>Price Multiplier</th></tr>";
    foreach(new TableRows(new RecursiveArrayIterator($handle->fetchAll())) as $k=>$v) { 
        echo $v;
          }
        
          $conn = null;
           echo "</table>";
?>

</div>





<!----  Where the details are entere to make a booking ---->
<div2 class="col-md-6" style="background-color:pink;"">
<h4> Place your order below</h4>
<form action="processBooking.php" method="GET" class="form-inline">
   Name:<br>
  <input id="name" name="Name" type="text" required Onchange = '
    var name = this.value
  if(name.length === 1) {
    alert( "please enter your first name");
    this.value=""; //clears the text box
  }'><br>
  Surname:<br>
  <input id="surname" name="Surname" type="text" Onchange = '
  var surname = this.value
  if(surname.length === 1) {
    alert( "please enter your surname");
    this.value=""; //clears the text box
  }'><br>
    Email Address:<br>
  <input id="email" name="EmailAddress" type="text" Onchange = '
     var email = this.value
     var characters = ["@"]
  if( !email.includes(characters) ) {
    alert( "please enter a valid email address");
    this.value=""; //clears the text box
  }'><br>
      Number of Tickets:<br>
  <input id="num" type="qty" name="NumberOfTickets" Onchange = '
   if(isNaN(this.value)) {
    alert( "please enter a number greater than 1");
    this.value=""; //clears the text box
  }'><br>
  Ticket Type:<br>
    <select name="TicketType" id="tictype">
       <option value=" "></option>
       <option value="Balcony">balcony</option>
       <option value="Box 1">box1</option>
       <option value="Box 2">box2</option>
       <option value="Box 3">box3</option>
       <option value="Box 4">box4</option>
       <option value="Front Stalls">front</option>
       <option value="Rear Stalls">rear</option>
     </select><br>
     Production:<br>
    <select name="Production" id="production" Onchange= dateANDtime()>
       <option value=" "></option>
       <option value="Avatar">Avatar</option>
       <option value="Rapunel">Rapunel</option>
       <option value="Othello">Othello</option>
</select> <br> 
  <input class="mybutton" name="Order Total" value="Calculate the total" onclick="orderTotal();"> 
   </br>
   <input name="submit" type="submit" value="Submit" onclick="receipt();">                     
</form>
</div2>


</div>
</div>
</body>
</html>







