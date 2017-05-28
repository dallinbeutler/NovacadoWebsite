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
				<form id="form" action="submitreview.php">
					<input type="text" name="editset" value="<?php echo $q?>" readonly hidden><br>
					Title:<br>
					<input type="text" name="title"><br>

					
					<h2>Rate the edit:</h2>
					<rad>
						<input type="radio" id="option1" name="selector" value ="1" required>
						<label for="option1">rotten</label>
						<div class="check"></div>
					</rad>
				  
					<rad>
						<input type="radio" id="option2" name="selector" value ="2" required>
						<label for="option2">lacking</label>
						<div class="check"><div class="inside"></div></div>
					</rad>
					  
					<rad>
						<input type="radio" id="option3" name="selector" value ="3" required>
						<label for="option3">average</label>
						<div class="check"><div class="inside"></div></div>
					</rad>
					<rad>
						<input type="radio" id="option4" name="selector" value ="4" required>
						<label for="option4">ripe</label>
						<div class="check"><div class="inside"></div></div>
					</rad>
					<rad>
						<input type="radio" id="option5" name="selector" value ="5" required>
						<label for="option5">excellent</label>
						<div class="check"><div class="inside"></div></div>
					</rad>
					<br>
					<br>

					comments:<br>
					<textarea rows="4" cols="50" name="comment" form="form">How well did the edit serve your needs?</textarea>
				<br>
				<input type="reset">   <input type="submit">
				</form>
			</div>		
		</div>
	  </div>	  
   </body>
</HTML>