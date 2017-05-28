<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
	$q = intval($_GET['q']);

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
	
	$sql = 'SELECT count(*) FROM movieeditsetreview WHERE movieeditset_id ='.$q; 
	$result = $db->prepare($sql); 
	$result->execute(); 
	$number_of_rows = $result->fetchColumn(); 
	echo "first query <br>";
	if($$number_of_rows == 0){
		echo "no reviews yet!";		
	}		
	else{
		$query = 'SELECT mesr.creationdate, mesr.lasteditdate, mesr.title, mesr.stars,mesr.description, acc.accountname FROM movieeditsetreview  mesr INNER JOIN account acc ON acc.id = mesr.account_id WHERE mesr.movieeditset_id ='.$q;
		$statement = $db->prepare($query);

		$statement->execute();
		$results = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		$count = $results->rowCount();
	
		echo '<table class="review">
		<tr>
		<th>title</th>
		<th>reviewer</th>
		<th>rating</th>
		<th>last edit date</th>
		<th>description</th>
		</tr>';
		foreach ($results as $row) {
			echo '<tr class="edit">';
			echo "<td>" . $row['title'] . "</td>";
		echo "<td>" . $row['accountname'] . "</td>";
		echo "<td>";
			for ($i = 0; $i < $row['stars']; $i++){
			echo '<img src="novacado_pit.png" alt="avacados" class="iconsize">';
		}
		echo "</td>";
		echo "<td>" . $row['lasteditdate'] . "</td>";
		echo "<td>" . $row['description'] . "</td>";
		echo "</tr>";
		}
		echo "</table>";
}
?>
</body>
</html>