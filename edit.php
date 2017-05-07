
<?php 

function makeEdit($type, $number, $rating) {
	echo '<div class= "row" >';
	echo "input type=\"checkbox\" name=\"$type\"";
	echo $type;
	echo "   ";
	echo $number;
	echo ' edits';
	for ($i = 0; $i <= rating; $i++){
		echo " ! ";
	}
    echo '</div><br/>';
}
?>

