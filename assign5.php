<HTML>
	<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
	<link rel="icon" href="novacado_pit.png">
    <title> Edits </title>
	<script src="themoviedb.js"></script>
	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script>
	
		function showreviews(str) {
			if (str == "") {
				document.getElementById("txtHint").innerHTML = "";
				return;
			} 
			else if (!document.getElementById("checkbox" + str).checked){
				document.getElementById("ins" + str ).innerHTML = "";
			}
			else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("ins" + str ).innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET","getmovieinfo.php?q="+str,true);
			xmlhttp.send();
		}
	}
	</script>
	<script type="text/javascript">
		var asker = "none";
        // callback for successful getConfiguration call
        function configSuccessCallback(data) {
            'use strict';
            // Set the base image url to the returned base_url value plus w185, shows posters with a width of 185 pixels.
            // Store it in localStorage so we don't make the configuration call every time.
            localStorage.setItem('tmdbImageUrlBase', JSON.parse(data).images.base_url + 'w185');
            document.getElementById("title").innerHTML = "tmdbImageUrlBase downloaded from themoviedb.org: " + localStorage.getItem('tmdbImageUrlBase'))";
        }
        // callback for getConfiguration call error
        function configErrorCallback(data) {
            'use strict';
            document.getElementById("title").text('Error getting TMDb configuration! ' + JSON.parse(data).status_message);
        }
        // check localStorage for imageBaseUrl, download from TMDb if not found
        if (localStorage.getItem('tmdbImageUrlBase')) {
            $('#title').text('tmdbImageUrlBase retrieved from localstorage: ' + localStorage.getItem('tmdbImageUrlBase'));
        } else {
            theMovieDb.configurations.getConfiguration(configSuccessCallback, configErrorCallback);
        }

        // callback for successful movie search
        function successCallback(data) {
            'use strict';
            document.getElementById("title").text('');
            data = JSON.parse(data);
            //console.log(data);
            // we just take the first result and display it
            if (data.results && data.results.length > 0) {
                var imageUrl = localStorage.getItem('tmdbImageUrlBase') + data.results[0].poster_path;
                document.getElementByID("movietab5").innerHTML = 'Title: <b>' + data.results[0].title + '</b><br />';
                document.getElementById(asker).innerHTML += '<img src="' + imageUrl + '" />';
            } else {
                document.getElementByID(asker).text('Nothing found');
                console.log('Nothing found');
            }
        }
        // callback for movie search error
        function errorCallback(data) {
            'use strict';
            //console.log('error: \n' + data);
            document.getElementById("title").text('Error searching. ' + JSON.parse(data).status_message);
        }

        // search button click event handler
        function searchMovie(inID, inAsker) {
			asker = inAsker;
            theMovieDb.search.getById(inID, successCallback, errorCallback);
			alert("called!");
        }

    </script>
   </head>
   <body>
      <?php include 'headbar.php'; ?>
	  <div id="centerArea">
	     <div id="mainArea">
            <myp id="title" class="center"><h2>Uploads</h2></myp>		
			<?php
				$servername = "ec2-23-21-169-238.compute-1.amazonaws.com";
				$username = "fmtextbjvwjlcy";
				$password = "6ac6980946253a82ad6759afe6c2828659ca889e406e9afeeacd53d34283a17c";
				$dbname = "dmns5jadj6q0l";

				//$dbconn = pg_connect("host=ec2-23-21-169-238.compute-1.amazonaws.com port=5432 dbname=dmns5jadj6q0l user=fmtextbjvwjlcy password=6ac6980946253a82ad6759afe6c2828659ca889e406e9afeeacd53d34283a17c") or die ("Try, and therefore sadness");
				try {
					$db = new PDO("pgsql:host=$servername;port=5432;dbname=$dbname", $username, $password);
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
				} 	
					catch (PDOException $ex) {
					echo "Error connecting to the db. Details: $ex";
					die();
				}

				//$query = 'SELECT * FROM account';
				//$query = 'SELECT name, birthday, pictureUrl FROM actor a INNER JOIN movieActor ma ON a.id = ma.actorId INNER JOIN movie m ON m.id = ma.movieId WHERE m.title = :movie_title';
				$query = 'SELECT mes.id, mes.moviedbnumber, mes.creationdate, mes.lasteditdate, mes.moviedbnumber, acc.accountname FROM movieeditset  mes INNER JOIN account acc ON acc.id = mes.account_id';
				$statement = $db->prepare($query);

				$statement->execute();
				$results = $statement->fetchAll(PDO::FETCH_ASSOC);

				// Printing results in HTML
				echo '<div id ="dblist">';
				echo '<table id="dblist">
						<th> Download  </td>
						<th>movie </th>
						<th>creation date</th>
						<th>last modified</th>
						<th>author</th>
						<th>Reviews toggle</th>';
				foreach ($results as $row) {
					echo '<tr>'
					. '<td><a href="error.php"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Download_alt_font_awesome.svg/768px-Download_alt_font_awesome.svg.png" alt="Download" style="width:32px;height:32px;"> </a>'
					. '</td><td id="movietab'.$row[id]. '" onload="searchMovie('.$row[moviedbnumber] . ',movietab'.$row[id].')">'. $row[moviedbnumber] 
					. '</td><td>'. $row[creationdate] 
					. '</td><td>'. $row[lasteditdate]
					. '</td><td>'. $row[accountname] 
					. '</td><td>'
					//.'reviews '
					.'<label class="switch">'
					.'<input type="checkbox" id=checkbox'.$row[id].' onclick=showreviews('. $row[id]. ')>'
					.' <div class="slider round"></div>'
					.'</label>'
					. '</td></tr><tr><td colspan=5><div id=ins'.$row[id].'></div></td></tr>';
				
				}	
				echo "</table>";
				echo '</div>';
			?>
		 </div>
	  </div>

   </body>

</HTML>