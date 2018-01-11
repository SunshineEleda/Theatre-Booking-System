<?php

function getBalconySeats(){
require 'connect.php';
		$conn=connect();
               $sql = "SELECT RowNumber FROM Seat WHERE Zone = 'balcony'";
               $result = $conn->prepare($sql);
               $row = $result->fetch(\PDO::FETCH_ASSOC);
               $rowNumber = $row[0];


           }

	?>		
	- select prouction- auto fill the date and time fixed
	-sort out tic type and price

 if ($ticType == 'balcony') {
         	$rowNumber = 'U01';
         } else if ($ticType == 'box 1') {
            $rowNumber = 'Z01';
         } else if ($ticType == 'box 2') {
            $rowNumber = 'Z05';
         } else if ($ticType == 'box 3') {
            $rowNumber = 'Z09';
         } else if ($ticType == 'box 4') {
            $rowNumber = 'Z15';
         } else if ($ticType == 'front stalls') {
            $rowNumber = 'K01';
         } else if ($ticType == 'rear stalls') {
            $rowNumber = 'A01';
         }