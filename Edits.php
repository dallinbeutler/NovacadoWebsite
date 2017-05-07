<HTML>
   <head>
      <link rel="stylesheet" type="text/css" href="mystyle.css">
	  <link rel="icon" href="novacado_pit.png">
      <title> Assignment List </title>
   </head>
   <body>
      <?php 
	  include 'headbar.php';
	  include 'edit.php';
	  session_start();
	  ?>
	  <div id="centerArea">
	     <div id="mainArea">
			<form action="submitted.php" method="post">
            <br/>			
			<?php 
			makeEdit("nudity",3,4);
			?>			
			<div class= "row">dos</div><br/>			
			<div class= "row">tres</div>
			<input type="submit"/>
			</form>
		 </div>
	  </div>
	  
   </body>
<?php?>
</HTML>