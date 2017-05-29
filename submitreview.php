<?php
	$editset = intval($_GET['editset']);
	$title = htmlspecialchars($_GET['title']);
	$rating = intval($_GET['selector']);
	$description = htmlspecialchars($_GET["comment"]);
	
	$servername = "ec2-23-21-169-238.compute-1.amazonaws.com";
	$username = "fmtextbjvwjlcy";
	$password = "6ac6980946253a82ad6759afe6c2828659ca889e406e9afeeacd53d34283a17c";
	$dbname = "dmns5jadj6q0l";	

	try {
		$db = new PDO("pgsql:host=$servername;port=5432;dbname=$dbname", $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		} 	
	catch (PDOException $ex) {
		echo "Error connecting to the db. Details: $ex";
		die();
	}
	$query = "INSERT INTO movieeditsetreview (account_id, movieeditset_id, creationdate, lasteditdate, title, stars, description)
VALUES ('6',?, '2012-08-06', '2012-08-06',?,?,?)";
	$statement = $db->prepare($query);
	$statement->bindValue(1, $editset);
	$statement->bindValue(2, $title);
	$statement->bindValue(3, $rating);
	$statement->bindValue(4, $description);
	
	$statement->execute();
?>
<html>
    <head>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
		<link rel="stylesheet" type="text/css" href="altstyle.css">
        <meta http-equiv="refresh" content="3;url=https://secure-tor-23408.herokuapp.com/assign5.php" />
    </head>
    <body>
        <h1>Successfully added! Redirecting in 3 seconds...</h1>
    </body>
</html>