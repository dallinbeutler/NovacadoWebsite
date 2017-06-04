<?php
 
?>

<HTML>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
			// Get the modal
			var modal = document.getElementById('id01');

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
		
		function checkName(){
			var str = document.getElementById("usrnameinput").value;
			if (str.length == 0) { 
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("usernamecheck").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "validate.php?q=" + str, true);
				xmlhttp.send();
			}
		};

		function checkpasswords(){
			if (document.getElementById("pwd1").value === document.getElementById("pwd2").value){
				document.getElementById("submitbutton").disabled = false;
				}
			else{
				document.getElementById("submitbutton").disabled = true;
				}
		}
		$('#regform').submit(function() {
			alert('Handler for .submit() called.');
			return false;
		});
		</script>

	</head>
	<body>
		<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>

		<div id="id01" class="modal">
			<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">X</span>
			<form class="modal-content animate" id="regform" action="submitSignUp.php" method="post">
				<div class="container">
					<label ><b>Username</b></label>
					<input id="usrnameinput" type="text" placeholder="Username" name="username" onchange="checkName()" required>
					<label id="usernamecheck"> .</label>
					<label><b>Email</b></label>
					<input type="email" placeholder="Enter Email" name="email" required>
					
					<label><b>Password</b></label>
					<input id ="pwd1" type="password" placeholder="Enter Password" name="psw" required>

					<label><b>Repeat Password</b></label>
					<input id="pwd2" type="password" placeholder="Repeat Password" name="psw-repeat" onchange="checkpasswords()" required>
					<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

					<div class="clearfix">
						<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
						<button type="submit" id="submitbutton" class="signupbtn">Sign Up</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</HTML>