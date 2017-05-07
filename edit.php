
<?php 

function makeEdit($type, $number, $rating) {
	echo '<div class= "edit" >';
	echo '<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">';
	echo '<input type="submit" value="Add to my edits" class="btnAddAction" /></div>';
	echo $type;
	echo "   ";
	echo $number;
	echo ' edits';
	for ($i = 0; $i < $rating; $i++){
		echo '<img src="novacado_pit.png" alt="avacados" class="iconsize">';
	}
    echo '</form></div>';
}
?>

