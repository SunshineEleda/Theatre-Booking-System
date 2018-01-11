 function receipt() {
               var ask = window.confirm("Are you sure you want to proceed with this booking?");
                    if (ask) {
                    var type = document.getElementById("tictype").value
	                var ticqty = document.getElementById("num").value
	                var prod = document.getElementById("production").value
	                var name = document.getElementById("name").value
	                var email = document.getElementById("email").value
	               
	                var msg = "<h2>Your Booking Has Been Confirmed!</h2>";   
  			        msg += "<h4>Name: " + name + "<br>";   
 			        msg += "Production: " + prod + "<br>";   
  			        msg += "Quantity of Tickets: " + ticqty + "<br>";   
  			        msg += "Seat Types: " + type + "<br>";
  			        msg += "Confirmation will be ent to the email: " + email + "</h4>";
			
  			        var msgWindow = window.open('', 'Message');
                    msgWindow.document.write(msg);
  			        msgWindow.document.close();
  			        msgWindow.focus();
  			   
		           }
               }
                 
	        function orderTotal() {
	          var type = document.getElementById("tictype").value
	          var ticqty = document.getElementById("num").value
	          var prod = document.getElementById("production").value
	          var balcony = 1.80
	          var box1 = 5.00
	          var box2 = 5.00
	          var box3 = 4.00
	          var box4 = 4.00
	               if (prod=="balcony") {
	                   total = (15.00*balcony) * ticqty;
	               } else if (prod=="box 1") {
	                   total = (15.00*box1) * ticqty;
	               } else if (prod=="box 2") {
	                   total = (15.00*box2) * ticqty; 
	               } else if (prod=="box 3") {
	                   total = (15.00*box3) * ticqty;
	               } else {
	                   total = (15.00*box3) * ticqty;
	                }
	              alert('Order total =' + total);
	        }





