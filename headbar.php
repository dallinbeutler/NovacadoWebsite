<html>
	<head>
		<link rel="stylesheet" type="text/css" href="headbar.css">
	</head>
	<body>
		<div id="header">
			<div id="left">
				<button onclick = "window.location = 'index.php'"><img src="novacado_pit.png" alt="avacados" class="iconsize"></button>
				<button onclick = "window.location = 'assignList.php'"> Assignments</button>
				<button onclick = "window.location = 'assign5.php'"> Edits</button>
				<button onclick = "window.location = 'Download.php'"> Downloads</button>
				<button onclick = "window.location = 'FAQs.php'">FAQs</button>
				<button onclick = "window.location = 'about.php'"> About</button>

			</div>
			<div id="right" align="right">
				<?php include "register.php" ?> 
				<?php include "login.php" ?> 
			</div>
		</div>
	</body>
</html>