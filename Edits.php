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
	  $_SESSION['cart']=array();
	  $nudity = $violence = $language = "";
	  ?>
	  <div id="centerArea">
	     <div id="mainArea">
			<form action="submitted.php" method="post">
            <br/>			
            <?php makeEdit("nudity",3,5);?>
            <?php makeEdit("violence",3,2);?>
            <?php makeEdit("language",15,3);?>			
			<input type="submit" value="compile edits"/>
			</form>
		 </div>
	  </div>
	  
   </body>
</HTML>