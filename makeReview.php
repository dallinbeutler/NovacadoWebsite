<HTML>
	<head>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
		<link rel="stylesheet" type="text/css" href="altstyle.css">
		<link rel="icon" href="novacado_pit.png">
		<title> assignment 5 </title>
	</head>
	<body>
		<?php include 'headbar.php'; ?>
		<div id="centerArea">
	    <div id="mainArea">
            <myp class="center"><h2>Add a review for movie edit set 
			<?php $q = intval($_GET['q']);
			echo $q; ?>
			</h2>
			</myp>
			<div class="container">
				<form id="form" action="submitReview.php">
					Title:<br>
					<input type="text" name="title"><br>

					
					<h2>Tomorrow I want some:</h2>
				  <rad>
					<input type="radio" id="f-option" name="selector">
					<label for="f-option">Pizza</label>
					<div class="check"></div>
					</rad>
				  
				  <rad>
					<input type="radio" id="s-option" name="selector">
					<label for="s-option">Bacon</label>
					<div class="check"><div class="inside"></div></div>
				  </rad>
				  
				  <rad>
					<input type="radio" id="t-option" name="selector">
					<label for="t-option">Cats</label>
					<div class="check"><div class="inside"></div></div>
				  </rad>

				
					review:<br>
					<textarea rows="4" cols="50" name="comment" form="form">
					Enter text here...</textarea>
				</form>
			</div>
			<?php /*$servername = "ec2-23-21-169-238.compute-1.amazonaws.com";
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
				*/?>
		</div>
	  </div>	  
   </body>
</HTML>