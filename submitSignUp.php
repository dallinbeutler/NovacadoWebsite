<HTML>
	<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
	<link rel="icon" href="novacado_pit.png">
    <title> assignment 5 </title>
	</head>
	<body>
		<?php include 'headbar.php'; ?>
	    <div id="centerArea">
	    <div id="mainArea">
        <myp class="center"><h2>Check 

			<?php 
			$email = htmlspecialchars($_POST['email']);
			$accname = htmlspecialchars($_POST['username']);
			$password = htmlspecialchars($_POST['psw']);
			$msg = 'Hello, ' . $username . '! Please click the following link to validate your account:
			 <a href="assign5.php">Edits list.</a>';
			mail($email,"Novacado Email Confirmation",$msg);
			echo $email;
			
			$hash = password_hash($password, PASSWORD_DEFAULT);
			
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
			$query = "INSERT INTO account (accountname, passhash, email)
		VALUES (?,?,?)";
			$statement = $db->prepare($query);
			$statement->bindValue(1, $accname);
			$statement->bindValue(2, $hash);
			$statement->bindValue(3, $email);
			
			$statement->execute();
			
			?>
 for confirmation!</h2></myp>	
	</body>
</HTML>