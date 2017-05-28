<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
hello
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
	$query = 'SELECT mesr.creationdate, mesr.lasteditdate, mesr.title, mesr.stars,mesr.description, acc.accountname FROM movieeditsetreview  mesr INNER JOIN account acc ON acc.id = mesr.account_id WHERE mes.id ='.$q;
	$statement = $db->prepare($query);

	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);

	echo "<table>
	<tr>
	<th>title</th>
	<th>reviewer</th>
	<th>rating</th>
	<th>lasteditdate</th>
	<th>description</th>
	</tr>";
	foreach ($results as $row) {
		echo "<tr>";
		echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['accountname'] . "</td>";
    echo "<td>" . $row['stars'] . "</td>";
    echo "<td>" . $row['lasteditdate'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "</tr>";
}
	echo "</table>";
?>
</body>
</html>