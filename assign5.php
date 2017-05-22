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
				//$conn = new mysqli($servername, $username, $password, $dbname);
				$conn = pg_connect( "host=http://ec2-23-21-169-238.compute-1.amazonaws.com port=5432 dbname=dmns5jadj6q0l user=fmtextbjvwjlcy password= 6ac6980946253a82ad6759afe6c2828659ca889e406e9afeeacd53d34283a17c");
				// Check connection
				
				$query = 'SELECT * FROM account';
				$result = pg_query($query) or die('Query failed: ' . pg_last_error());
				
				// Printing results in HTML
				echo "<table>\n";
				while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
					echo "\t<tr>\n";
					foreach ($line as $col_value) {
						echo "\t\t<td>$col_value</td>\n";
					}
					echo "\t</tr>\n";
				}
				echo "</table>\n";

				// Free resultset
				pg_free_result($result);

				
				
				$conn->close();
			?>
		 </div>
	  </div>
	  
   </body>
<?php?>
</HTML>