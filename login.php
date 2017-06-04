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
		</script>

	</head>
	<body>
		<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>

		<div id="id01" class="modal">
		  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
		  <form class="modal-content animate" action="/action_page.php">
			<div class="container">
			  <label><b>Email</b></label>
			  <input type="text" placeholder="Enter Email" name="email" required>

			  <label><b>Password</b></label>
			  <input type="password" placeholder="Enter Password" name="psw" required>

			  <input type="checkbox" checked="checked"> Remember me
			  <div class="clearfix">
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				<button type="submit" class="signupbtn">Login</button>
			  </div>
			</div>
		  </form>
		</div>
	</body>
</HTML>