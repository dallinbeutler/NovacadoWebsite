<HTML>
	<head>
		<script>
			// Get the modal
			var modal = document.getElementById('id01');

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}

			function login(){
				var str = document.getElementById("username").value;
				var pwd = document.getElementById("loginpass").value;
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("usernamecheck").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "checkuser.php?accname=" + str + ";password=" + pwd, true);
				xmlhttp.send();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("txtHint").innerHTML = this.responseText;
					}
				};
			}
		};
		</script>

	</head>
	<body>
		<?php 
			session_start();
			if( isset($_SESSION['accname']) and isset($_SESSION['phash'])){
				$accname = $_SESSION['accname'];
				$phash = $_SESSION['phash'];
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
				$query = "select COUNT(*) FROM account WHERE accname = ? AND passhash = ? LIMIT 1";
				$statement = $db->prepare($query);
				$statement->bindValue(1, $accname);
				$statement->bindValue(2, $phash);
				try{
				$statement->execute();
					if($stmt->fetchColumn())
						echo $accname;
					else
						echo "baddd stuff!";
				}
				catch(PDOException $ex){
					echo "bad statement";
				}
			}
			else
				echo'<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Login</button>';
		?>

		<div id="id02" class="modal">
		  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">x</span>
		  <form class="modal-content animate" >
			<div class="container">
			  <label><b>Username</b></label>
			  <input id="username" type="text" placeholder="Enter user name" name="username" required>

			  <label><b>Password</b></label>
			  <input id="loginpass" type="password" placeholder="Enter Password" name="psw" required>

			  <input type="checkbox" checked="checked"> Remember me
			  <div class="clearfix">
				<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
				<button type="submit" class="signupbtn" onclick="login()">Login</button>
			  </div>
			</div>
		  </form>
		</div>
	</body>
</HTML>