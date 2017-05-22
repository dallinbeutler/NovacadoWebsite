<HTML>
   <head>
      <link rel="stylesheet" type="text/css" href="mystyle.css">
	  <link rel="icon" href="novacado_pit.png">
      <title> assignment 5 </title>
   </head>
   <body>
      <?php 
	  include 'headbar.php';
	  ?>
	  <div id="centerArea">
	     <div id="mainArea">
            <br/>			
			<?php
				$servername = "http://ec2-23-21-169-238.compute-1.amazonaws.com";
				$username = "fmtextbjvwjlcy";
				$password = "6ac6980946253a82ad6759afe6c2828659ca889e406e9afeeacd53d34283a17c";
				$dbname = "dmns5jadj6q0l";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				$sql = "SELECT id, accountname, email FROM account";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
					}
				} else {
					echo "0 results";
				}
				$conn->close();
			?>
		 </div>
	  </div>
	  
   </body>
<?php?>
</HTML>