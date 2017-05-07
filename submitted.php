<HTML>
   <head>
      <link rel="stylesheet" type="text/css" href="mystyle.css">
	  <link rel="icon" href="novacado_pit.png">
      <title> Order Submission </title>
   </head>
   <body>
      <?php 
	  include 'headbar.php'; ?>
      <div id="centerArea">
	     <div id="mainArea">
            <h2> Confirmation </h2>
			<?php 
				if (isset($nudity)) echo "filtering nudity <br>";
				if (isset($violence)) echo "filtering violence <br>";
				if (isset($language)) echo "filtering nudity <br>";
				echo "butts";
				echo $nudity;
				echo $violence;
				echo $language;
			?>
			<form action="confirmation.php">
			Address <input type = "text" name = "address">
			<input type="submit">
			</form>
		 </div>
	  </div>
	</body>
</HTML>