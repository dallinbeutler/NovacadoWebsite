
<?php 

function makeEdit($type, $number, $rating) {
	echo '<div class= "edit" ><table style="width:100%"><tr><td>';
	echo '<input type="checkbox"  class="squaredOne" name="';
	echo $type;
	echo '" /></td><td>';
	echo $type;
	echo '</td><td>';
	echo $number;
	echo ' edits';
	echo '</td><td>';
	for ($i = 0; $i < $rating; $i++){
		echo '<img src="novacado_pit.png" alt="avacados" class="iconsize">';
	}
    echo '</td></tr></table></div>';
}
?>

