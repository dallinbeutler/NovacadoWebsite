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
			$username = htmlspecialchars($_POST['username']);
			$msg = 'Hello, ' . $username . '! Please click the following link to validate your account:
			 <a href="assign5.php">Edits list.</a>';
			mail($email,"Novacado Email Confirmation",$msg);
			echo $email;
			?>
 for confirmation!</h2></myp>	
	</body>
</HTML>