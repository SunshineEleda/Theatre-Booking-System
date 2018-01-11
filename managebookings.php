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
    
  <div class="content">

                <?php


if($_GET['Email']==NULL){
    echo 'We are unable to process your booking due to missing fields, please try again<a href="managebookings.html">Try again</a>';
  }else {
      $email = $_GET['Email'];

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
    $sql = "SELECT * FROM Booking WHERE Email = :Email";
    $handle = $conn->prepare($sql);
    $handle->bindParam(':Email', $email);
    $handle->execute() or die(print_r($handle->errorInfo(), true));
    $conn = null;
    $res = $handle->setFetchMode(PDO::FETCH_ASSOC); 
    
    echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Booking ID</th><th>Performance Date</th><th>Performance Time</th><th>Customer Name</th>
              <th>Email</th><th>Row Number</th></tr>";
    foreach(new TableRows(new RecursiveArrayIterator($handle->fetchAll())) as $k=>$v) { 
        echo $v;
          }
        
          $conn = null;
           echo "</table>";
    }
?>


<form action="bookinginDatabase.php" method="GET">

 To delete a booking please enter the booking ID:<br>
  <input id="bookingID" name="bookingid" type="text" Onchange = '
     var id = this.value
  if(id.length === 1) {
    alert( "please enter your Booking ID");
    this.value=""; //clears the text box
  }'><br>
  <input name="submit" type="submit" value="Submit";> 

</form>




    </div>
      

 <div class="adelek">
    <li> &copy; An original design by Adele Kufour </li>
      </div>
      
</body>
</html>