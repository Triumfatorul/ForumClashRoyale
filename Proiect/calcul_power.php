<?php


require_once ('functions.php');
// See what formula user choice
switch ($_COOKIE['Formula']) {
	case '1':
		Calculate_first_formula($_POST['number_a'], $_POST['number_b']);
		break;
	
	case '2':
		Calculate_second_formula($_POST['number_a'], $_POST['number_b']);
		break;

	case '3':
		Calculate_third_formula($_POST['number_a'], $_POST['number_b']);
		break;
	case '4':
		Calculate_fourth_formula($_POST['number_a'], $_POST['number_b'], $_POST['number_c']);
		break;
	case '5':
		Calculate_fifth_formula($_POST['number_a'], $_POST['number_b']);
		break;
	case '6':
		Calculate_sixth_formula($_POST['number_a'], $_POST['number_b']);
		break;
}







?>
<br />
<a href="index.php">Back</a>