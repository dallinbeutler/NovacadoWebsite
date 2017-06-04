<html>
	<head>
		<link rel="stylesheet" type="text/css" href="headbar.css">
	</head>
	<body>
		<div id="header">
			<div id="left">
				<div id = "pictureholder"><button onclick = "window.location = 'index.php'"><img src="novacado_pit.png" alt="avacados" class="iconsize2"></div></button>
			</div >
				<button onclick = "window.location = 'assignList.php'"> Assignments</button>
				<button onclick = "window.location = 'assign5.php'"> Edits</button>
				<button onclick = "window.location = 'Download.php'"> Downloads</button>
				<button onclick = "window.location = 'FAQs.php'">FAQs</button>
				<button onclick = "window.location = 'about.php'"> About</button>
			<div id="right" align="right">
				<?php include "register.php" ?> 
				<?php include "login.php" ?> 
			</div>
		</div>
	</body>
</html>