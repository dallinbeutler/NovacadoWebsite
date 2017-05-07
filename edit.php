
<?php 

function makeEdit($type, $number, $rating) {
	echo '<div class= "edit" >';
	echo "<input type=\"checkbox\" name=\"$type\">";
	echo $type;
	echo "   ";
	echo $number;
	echo ' edits';
	for ($i = 0; $i < $rating; $i++){
		echo '<img src="novacado_pit.png" alt="avacados" class="iconsize">';
	}
    echo '</div>';
}
?>

