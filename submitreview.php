<?php
	$editset = intval($_GET['q']);
	$title = htmlspecialchars($_GET["title"]);
	$rating = intval($_GET['selector']);
	$description = htmlspecialchars($_GET["comment"]);
	if(!is_int($q))
		die('invalid request');
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
?>