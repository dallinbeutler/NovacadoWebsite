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
				$servername = "ec2-23-21-169-238.compute-1.amazonaws.com";
				$username = "fmtextbjvwjlcy";
				$password = "6ac6980946253a82ad6759afe6c2828659ca889e406e9afeeacd53d34283a17c";
				$dbname = "dmns5jadj6q0l";

				//$dbconn = pg_connect("host=ec2-23-21-169-238.compute-1.amazonaws.com port=5432 dbname=dmns5jadj6q0l user=fmtextbjvwjlcy password=6ac6980946253a82ad6759afe6c2828659ca889e406e9afeeacd53d34283a17c") or die ("Try, and therefore sadness");
				try {
					$db = new PDO("pgsql:host=$servername;port=5432;dbname=$dbname", $username, $password);
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
				} 	
					catch (PDOException $ex) {
					echo "Error connecting to the db. Details: $ex";
					die();
				}
				
				echo 'connected!';
				//$query = 'SELECT * FROM account';
				//$query = 'SELECT name, birthday, pictureUrl FROM actor a INNER JOIN movieActor ma ON a.id = ma.actorId INNER JOIN movie m ON m.id = ma.movieId WHERE m.title = :movie_title';
				$query = 'SELECT mes.creationdate, mes.lasteditdate, mes.moviedbnumber, acc.accountname FROM movieeditset  mes INNER JOIN account acc ON acc.id = mes.account_id';
				
				//$result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());
				$statement = $db->prepare($query);
				//$statement->bindValue(":movie_title", $movie, PDO::PARAM_STR);
				$statement->execute();
				$results = $statement->fetchAll(PDO::FETCH_ASSOC);
				
				echo 'queried!';
				// Printing results in HTML
				echo '<table style="width:100%">';
				foreach ($results as $row) {
					echo '<tr><td>' . $row[creationdate] . '</td><td>'. $row[lasteditdate]. '</td><td>'. $row[accountname] . '</td></tr>';
				echo "</table>";
		}	
				/*echo "<table>\n";
				foreach ($results as $row) {
					echo "<li><p>" . $row['accountname'] . "</p></li>";
				}*/
				
				/*while ($line = pg_fetch_array($results, null, PGSQL_ASSOC)) {
					echo "\t<tr>\n";
					foreach ($results as $col_value) {
						echo "\t\t<td>$col_value</td>\n";
					}
					echo "\t</tr>\n";
				}
				echo "</table>\n";
				echo "made it this far!";*/
				// Free resultset
				//pg_free_result($result);

				
				
				//$conn->close();
			?>
		 </div>
	  </div>
	  
   </body>
<?php?>
</HTML>