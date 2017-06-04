<?php 
	session_start();
	$accname = htmlspecialchars($_GET['accname']);
	$password = htmlspecialchars($_GET['password']);
	
	if(password_verify($password, PASSWORD_DEFAULT);

	$servername = "ec2-23-21-169-238.compute-1.amazonaws.com";
	$username = "fmtextbjvwjlcy";
	$password = "6ac6980946253a82ad6759afe6c2828659ca889e406e9afeeacd53d34283a17c";
	$dbname = "dmns5jadj6q0l";	

	try {
		$db = new PDO("pgsql:host=$servername;port=5432;dbname=$dbname", $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = "SELECT passhash FROM account WHERE username=?";
		$statement = $db->prepare($query);
		$statement->bindValue(1, $accname);
		$statement->execute();
		foreach ($results as $row)
			if (password_verify($password, $row){

				$_SESSION['accname'] = $accname;
				$_SESSION['phash'] = $row;
			}
		} 	
	catch (PDOException $ex) {
		echo "Error connecting to the db. Details: $ex";
	}



?>