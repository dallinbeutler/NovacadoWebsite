<HTML>
	<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
	<link rel="icon" href="novacado_pit.png">
    <title> assignment 5 </title>
	<script>
		function showreviews(str) {
			if (str == "") {
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("ins" + str ).innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET","getmovieinfo.php?q="+str,true);
			xmlhttp.send();
		}
	}
	</script>
   </head>
   <body>
      <?php include 'headbar.php'; ?>
	  <div id="centerArea">
	     <div id="mainArea">
            <myp class="center"><h2>Uploads</h2></myp>		
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

				//$query = 'SELECT * FROM account';
				//$query = 'SELECT name, birthday, pictureUrl FROM actor a INNER JOIN movieActor ma ON a.id = ma.actorId INNER JOIN movie m ON m.id = ma.movieId WHERE m.title = :movie_title';
				$query = 'SELECT mes.id, mes.moviedbnumber, mes.creationdate, mes.lasteditdate, mes.moviedbnumber, acc.accountname FROM movieeditset  mes INNER JOIN account acc ON acc.id = mes.account_id';
				$statement = $db->prepare($query);

				$statement->execute();
				$results = $statement->fetchAll(PDO::FETCH_ASSOC);

				// Printing results in HTML
				echo '<div id ="dblist">';
				echo '<table id="dblist"><th>movie (placeholder id)</th><th>creation date</th><th>last modified</th><th>author</th>';
				foreach ($results as $row) {
					echo '<tr><td>'. $row[moviedbnumber] 
					. '</td><td>'. $row[creationdate] 
					. '</td><td>'. $row[lasteditdate]
					. '</td><td>'. $row[accountname] 
					. '</td><td><button type="button" onclick=showreviews('. $row[id]. ')>show edits</button>'
					. '</td></tr><tr><td colspan=5><div id=ins'.$row[id].'></div></td></tr>';
				
				}	
				echo "</table>";
				echo '</div>';
			?>
		 </div>
	  </div>
	  
   </body>
<?php?>
</HTML>