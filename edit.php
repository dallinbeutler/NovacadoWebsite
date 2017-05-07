
<?php 

function makeEdit($type, $number, $rating) {
	echo '<div class= "edit" >';
	echo '<input type="checkbox"  id="slideThree" name="';
	echo $type;
	echo '" />';
	echo $type;
	echo '<myp>';
	echo $number;
	echo ' edits';
	echo '</myp>
	for ($i = 0; $i < $rating; $i++){
		echo '<img src="novacado_pit.png" alt="avacados" class="iconsize">';
	}
    echo '</div>';
}
?>

