
<?php 

function makeEdit($type, $number, $rating) {
	echo '<div class= "edit" >';
	echo '<input type="checkbox"  class="squaredOne" name="';
	echo $type;
	echo '" />';
	echo $type;
	echo '<p style="margin:auto">';
	echo $number;
	echo ' edits';
	echo '</p>';
	for ($i = 0; $i < $rating; $i++){
		echo '<img src="novacado_pit.png" alt="avacados" class="iconsize">';
	}
    echo '</div>';
}
?>

