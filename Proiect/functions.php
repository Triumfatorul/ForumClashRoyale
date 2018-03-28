<?php
//	FORMULA 4 DE FACUT ULTIMA TREBUIE REFACUT SYSTEM-UL DE ADAUGAT RADICAL DIN INDEX(SINGURA CU 3 LITERE)

// Define the function for first formula
function Calculate_first_formula($first_num, $second_num)
{

 // Unset the cookies for radical symbol
	if(isset($_COOKIE['Sqrt_for_a'])){
    setcookie("Sqrt_for_a", "", time() - 3600);
}
	if(isset($_COOKIE['Sqrt_for_b'])){
    setcookie("Sqrt_for_b", "", time() - 3600);
}		
	// START Filter for letter and square root symbol and power calculation
  	
  	// Define the variables for numbers at square
	
		// Check if first number has in it a letter
		if (preg_match("/[a-z]/i", $first_num)) {
			// Split the first number in a array
			$first_num_content = str_split($first_num);
			foreach ($first_num_content as $key => $value) {
				// Check if  the value is a letter
				if (preg_match("/[a-z]/i", $value)) {
					// Delete the letter
				    $num_a_edited = str_replace($value, '', $first_num);
					// Store the deleted letter in a variable
					$del_letter_a = $value;
					$letter_a = true;
				} 
			}
		} else {
			$letter_a = false;
		}
		// Check if first number has in it a letter
		if (preg_match("/[a-z]/i", $second_num)) {
			// Split the sec number in a array
			$second_num_content = str_split($second_num);
			foreach ($second_num_content as $k => $v) {
				// Check if  the value is a letter
				if (preg_match("/[a-z]/i", $v)) {
					// Delete the letter
				    $num_b_edited = str_replace($v, '', $second_num);
				    // Store the deleted letter in a variable
					$del_letter_b = $v;
					$letter_b = true;
				} 
			}
		} else {
			$letter_b = false;
		}
		// Check if in first number was a letter
		if ($letter_a == true) {
			// Calculate the power for first number
			$num_a_power_2 = pow($num_a_edited, 2).''.$del_letter_a.'<sup>2</sup>';
			// Set root symbol variable for first number to false( Can't use both letter and radical in same number,  but we can have a number with letter and one with radical)
			$root_symbol_a = false;
		} 
		// Check if in second number was a letter
		if ($letter_b == true) {
			// Calculate the power for first number
			$num_b_power_2 = pow($num_b_edited, 2).''.$del_letter_b.'<sup>2</sup>';
			// Set root symbol variable for second number to false( Can't use both letter and radical in same number,  but we can have a number with letter and one with radical)
			$root_symbol_b = false;
		} 
		// Check if in first number && second number was a letter 
		if ($letter_a == true && $letter_b == true) {
			// Define the product
			$product = 2*$num_a_edited*$num_b_edited.''.$del_letter_a.''.$del_letter_b;
		} 



	// Check if in first number exist √ 
	if ($sqrt_root_symbol_a = strstr($first_num, "√")) {
	 		// Eliminate  the √ from the string
	 $number_a =  ltrim($sqrt_root_symbol_a, "√");

		 // Check if before the √ was a number
		$number_before_sqrt_a = str_replace($sqrt_root_symbol_a, '', $first_num);
		if ($number_before_sqrt_a != '') {
			   // Calculate the power of number before the √ symbol
				$power_number_a = pow($number_before_sqrt_a, 2);
			   // Calcutate the square root from the first number
		       $num_a_sqrt_root = sqrt($number_a);	
			   // Calculate the power for first number
			   $num_a_power_2  = $power_number_a*pow($num_a_sqrt_root, 2);
			   $root_symbol_a = true;
			   // Set a variable which store but was  or wans't a  letter before the √ symbol
			  $number_before_sqrt_a_bool = true;			
		} else {
			 // Calcutate the square root from the first number
			 $num_a_sqrt_root = sqrt($number_a);	
			 // Calculate the power for first number
			 $num_a_power_2  = pow($num_a_sqrt_root, 2);
			 $root_symbol_a = true;
			 // Set a variable which store but was  or wans't a  letter before the √ symbol
			 $number_before_sqrt_a_bool = false;
		}
	 
	} 
	elseif ($letter_a == false) {
		 $num_a_power_2  = pow($first_num, 2);	
		 $root_symbol_a = false; 
	} 
	
	// Check if in second number exist √ 
	if ($sqrt_root_symbol_b = strstr($second_num, "√")) {
	  // Eliminate  the √ from the string
	 $number_b =  ltrim($sqrt_root_symbol_b, "√");
	  // Check if before the √ was a number
		$number_before_sqrt_b = str_replace($sqrt_root_symbol_b, '', $second_num);
		if ($number_before_sqrt_b != '') {
			   // Calculate the power of number before the √ symbol
				$power_number_b = pow($number_before_sqrt_b, 2);
			   // Calcutate the square root from the second number
		       $num_b_sqrt_root = sqrt($number_b);	
			   // Calculate the power for first number
			   $num_b_power_2  = $power_number_b*pow($num_b_sqrt_root, 2);

			   // Set a variable which store but was  or wans't a  letter before the √ symbol
			  $number_before_sqrt_b_bool = true;			
		} else {
			 // Calcutate the square root from the second number
			 $num_b_sqrt_root = sqrt($number_b);	
			 // Calculate the power for first number
			 $num_b_power_2  = pow($num_b_sqrt_root, 2);
			
			 // Set a variable which store but was  or wans't a  letter before the √ symbol
			 $number_before_sqrt_b_bool = false;
		}

	 $root_symbol_b = true;
	}
	 elseif ($letter_b == false) {
		 $num_b_power_2  = pow($second_num, 2);
		 $root_symbol_b = false;
	}
	

	// START Product Calculation

	// Check if in first number was √ && in second num was √
	if ($root_symbol_a == true && $root_symbol_b == true) {
	
	// Calculate the product for the raidcals
	$radicals_product = $number_a*$number_b;
	// Check if before the both numbers was another nuumber
		if ($number_before_sqrt_a_bool == true && $number_before_sqrt_b_bool == true) {
			// Define the product variable
			$product = 2*$number_before_sqrt_a*$number_before_sqrt_b.'√'.$radicals_product;
		} 
		// Check  if ONLY in first number was a number before √
		elseif ($number_before_sqrt_a_bool == true) {
			// Define the product
			$product = 2*$number_before_sqrt_a.'√'.$number_a*$number_b;
		} // Check  if ONLY in second number was a number before √
		elseif ($number_before_sqrt_b_bool == true) {
			// Define the product
			$product = 2*$number_before_sqrt_b.'√'.$number_a*$number_b;
		}
		// Else staiment
		else {
			// Define the product variable
			$product = '2√'.$radicals_product;
		}
	} 
	
	// Check if in first number was √
	elseif ($root_symbol_a == true) {
			// Check if was a  number before the √
			if ($number_before_sqrt_a_bool ==  true) {
				// Check if was a letter in second number
				if ($letter_b == true) {
					// Define the product 
					$product = 2*$num_b_edited*$number_before_sqrt_a.$del_letter_b.'√'.$number_a;	
				} else {
					$product = 2*$second_num*$number_before_sqrt_a.'√'.$number_a;
				}
				
			}
			// Check if in second number was a letter, BUT in first number wasn't a number before √
			 elseif ($letter_b == true) {
				// Define the product 
				$product = 2*$num_b_edited.$del_letter_b.'√'.$number_a;
			} else {
				$product = 2*$second_num.'√'.$number_a;
			}
			
		
	
	} 

	// Check if in seecond number was √
	elseif ($root_symbol_b == true) {
					// Check if was a  number before the √
			if ($number_before_sqrt_b_bool ==  true) {
				// Check if was a letter in first number
				if ($letter_a == true) {
					// Define the product 
					$product = 2*$num_a_edited*$number_before_sqrt_b.$del_letter_a.'√'.$number_b;	
				} else {
					$product = 2*$first_num*$number_before_sqrt_b.'√'.$number_b;
				}
				
			}
			// Check if in first number was a letter, BUT in second number wasn't a number before √
			 elseif ($letter_a == true) {
				// Define the product 
				$product = 2*$num_a_edited.$del_letter_a.'√'.$number_b;
			} else {
				$product = 2*$first_num.'√'.$number_b;
			}
		}		

			// Check if in first number && in second number was a letter
			elseif ($letter_a == true && $letter_b == true) {
				// Define the product
				$product = 2*$num_a_edited*$num_b_edited.''.$del_letter_a.''.$del_letter_b;	
				
		}
			// Check if in first number was a letter
			elseif ($letter_a == true) {
				// Define the product
				$product = 2*$num_a_edited*$second_num.''.$del_letter_a;	
				
		} 
		
			// Check if in second number was a letter
			elseif ($letter_b == true) {
				// Define the product
				$product = 2*$num_b_edited*$first_num.''.$del_letter_b;
		}	
			// Else staiment
			else {
				// Define the product
				$product = 2*$first_num*$second_num;
	} 

	
	// STOP Product Calculation

	// Define the sum variable
	
	// Check if in first or second number was a letter
	if ($letter_a == true || $letter_b == true) {
			// Define the sum variable
	   		$sum = $num_a_power_2.'+'.$num_b_power_2;
	   } else {
	   		// Define the sum variable
	   		$sum = $num_a_power_2 + $num_b_power_2;
	   }
	// STOP Filter for letter and square root symbol and power calculation

// Echo the result
echo    $first_num.'<sup>2</sup> + '.$second_num.'<sup>2</sup> + '.'2 * '.$first_num.' * '.$second_num.' = <br />'.
		$num_a_power_2.' + '.$num_b_power_2.' + '.$product.' = <br />'.
		$sum.' + '.$product;
		;
}

// Define the function for second formula
function Calculate_second_formula($first_num, $second_num)
{
	// Unset the cookies for radical symbol
	if(isset($_COOKIE['Sqrt_for_a'])){
    setcookie("Sqrt_for_a", "", time() - 3600);
}
	if(isset($_COOKIE['Sqrt_for_b'])){
    setcookie("Sqrt_for_b", "", time() - 3600);
}		
	// START Filter for letter and square root symbol and power calculation
  	
  	// Define the variables for numbers at square
	
		// Check if first number has in it a letter
		if (preg_match("/[a-z]/i", $first_num)) {
			// Split the first number in a array
			$first_num_content = str_split($first_num);
			foreach ($first_num_content as $key => $value) {
				// Check if  the value is a letter
				if (preg_match("/[a-z]/i", $value)) {
					// Delete the letter
				    $num_a_edited = str_replace($value, '', $first_num);
					// Store the deleted letter in a variable
					$del_letter_a = $value;
					$letter_a = true;
				} 
			}
		} else {
			$letter_a = false;
		}
		// Check if first number has in it a letter
		if (preg_match("/[a-z]/i", $second_num)) {
			// Split the sec number in a array
			$second_num_content = str_split($second_num);
			foreach ($second_num_content as $k => $v) {
				// Check if  the value is a letter
				if (preg_match("/[a-z]/i", $v)) {
					// Delete the letter
				    $num_b_edited = str_replace($v, '', $second_num);
				    // Store the deleted letter in a variable
					$del_letter_b = $v;
					$letter_b = true;
				} 
			}
		} else {
			$letter_b = false;
		}
		// Check if in first number was a letter
		if ($letter_a == true) {
			// Calculate the power for first number
			$num_a_power_2 = pow($num_a_edited, 2).''.$del_letter_a.'<sup>2</sup>';
			// Set root symbol variable for first number to false( Can't use both letter and radical in same number,  but we can have a number with letter and one with radical)
			$root_symbol_a = false;
		} 
		// Check if in second number was a letter
		if ($letter_b == true) {
			// Calculate the power for first number
			$num_b_power_2 = pow($num_b_edited, 2).''.$del_letter_b.'<sup>2</sup>';
			// Set root symbol variable for second number to false( Can't use both letter and radical in same number,  but we can have a number with letter and one with radical)
			$root_symbol_b = false;
		} 
		// Check if in first number && second number was a letter 
		if ($letter_a == true && $letter_b == true) {
			// Define the product
			$product = 2*$num_a_edited*$num_b_edited.''.$del_letter_a.''.$del_letter_b;
		} 



	// Check if in first number exist √ 
	if ($sqrt_root_symbol_a = strstr($first_num, "√")) {
	 		// Eliminate  the √ from the string
	 $number_a =  ltrim($sqrt_root_symbol_a, "√");

		 // Check if before the √ was a number
		$number_before_sqrt_a = str_replace($sqrt_root_symbol_a, '', $first_num);
		if ($number_before_sqrt_a != '') {
			   // Calculate the power of number before the √ symbol
				$power_number_a = pow($number_before_sqrt_a, 2);
			   // Calcutate the square root from the first number
		       $num_a_sqrt_root = sqrt($number_a);	
			   // Calculate the power for first number
			   $num_a_power_2  = $power_number_a*pow($num_a_sqrt_root, 2);
			   $root_symbol_a = true;
			   // Set a variable which store but was  or wans't a  letter before the √ symbol
			  $number_before_sqrt_a_bool = true;			
		} else {
			 // Calcutate the square root from the first number
			 $num_a_sqrt_root = sqrt($number_a);	
			 // Calculate the power for first number
			 $num_a_power_2  = pow($num_a_sqrt_root, 2);
			 $root_symbol_a = true;
			 // Set a variable which store but was  or wans't a  letter before the √ symbol
			 $number_before_sqrt_a_bool = false;
		}
	 
	} 
	elseif ($letter_a == false) {
		 $num_a_power_2  = pow($first_num, 2);	
		 $root_symbol_a = false; 
	} 
	
	// Check if in second number exist √ 
	if ($sqrt_root_symbol_b = strstr($second_num, "√")) {
	  // Eliminate  the √ from the string
	 $number_b =  ltrim($sqrt_root_symbol_b, "√");
	  // Check if before the √ was a number
		$number_before_sqrt_b = str_replace($sqrt_root_symbol_b, '', $second_num);
		if ($number_before_sqrt_b != '') {
			   // Calculate the power of number before the √ symbol
				$power_number_b = pow($number_before_sqrt_b, 2);
			   // Calcutate the square root from the second number
		       $num_b_sqrt_root = sqrt($number_b);	
			   // Calculate the power for first number
			   $num_b_power_2  = $power_number_b*pow($num_b_sqrt_root, 2);

			   // Set a variable which store but was  or wans't a  letter before the √ symbol
			  $number_before_sqrt_b_bool = true;			
		} else {
			 // Calcutate the square root from the second number
			 $num_b_sqrt_root = sqrt($number_b);	
			 // Calculate the power for first number
			 $num_b_power_2  = pow($num_b_sqrt_root, 2);
			
			 // Set a variable which store but was  or wans't a  letter before the √ symbol
			 $number_before_sqrt_b_bool = false;
		}

	 $root_symbol_b = true;
	}
	 elseif ($letter_b == false) {
		 $num_b_power_2  = pow($second_num, 2);
		 $root_symbol_b = false;
	}
	

	// START Product Calculation

	// Check if in first number was √ && in second num was √
	if ($root_symbol_a == true && $root_symbol_b == true) {
	
	// Calculate the product for the raidcals
	$radicals_product = $number_a*$number_b;
	// Check if before the both numbers was another nuumber
		if ($number_before_sqrt_a_bool == true && $number_before_sqrt_b_bool == true) {
			// Define the product variable
			$product = 2*$number_before_sqrt_a*$number_before_sqrt_b.'√'.$radicals_product;
		} 
		// Check  if ONLY in first number was a number before √
		elseif ($number_before_sqrt_a_bool == true) {
			// Define the product
			$product = 2*$number_before_sqrt_a.'√'.$number_a*$number_b;
		} // Check  if ONLY in second number was a number before √
		elseif ($number_before_sqrt_b_bool == true) {
			// Define the product
			$product = 2*$number_before_sqrt_b.'√'.$number_a*$number_b;
		}
		// Else staiment
		else {
			// Define the product variable
			$product = '2√'.$radicals_product;
		}
	} 
	
	// Check if in first number was √
	elseif ($root_symbol_a == true) {
			// Check if was a  number before the √
			if ($number_before_sqrt_a_bool ==  true) {
				// Check if was a letter in second number
				if ($letter_b == true) {
					// Define the product 
					$product = 2*$num_b_edited*$number_before_sqrt_a.$del_letter_b.'√'.$number_a;	
				} else {
					$product = 2*$second_num*$number_before_sqrt_a.'√'.$number_a;
				}
				
			}
			// Check if in second number was a letter, BUT in first number wasn't a number before √
			 elseif ($letter_b == true) {
				// Define the product 
				$product = 2*$num_b_edited.$del_letter_b.'√'.$number_a;
			} else {
				$product = 2*$second_num.'√'.$number_a;
			}
			
		
	
	} 

	// Check if in seecond number was √
	elseif ($root_symbol_b == true) {
					// Check if was a  number before the √
			if ($number_before_sqrt_b_bool ==  true) {
				// Check if was a letter in first number
				if ($letter_a == true) {
					// Define the product 
					$product = 2*$num_a_edited*$number_before_sqrt_b.$del_letter_a.'√'.$number_b;	
				} else {
					$product = 2*$first_num*$number_before_sqrt_b.'√'.$number_b;
				}
				
			}
			// Check if in first number was a letter, BUT in second number wasn't a number before √
			 elseif ($letter_a == true) {
				// Define the product 
				$product = 2*$num_a_edited.$del_letter_a.'√'.$number_b;
			} else {
				$product = 2*$first_num.'√'.$number_b;
			}
		}		

			// Check if in first number && in second number was a letter
			elseif ($letter_a == true && $letter_b == true) {
				// Define the product
				$product = 2*$num_a_edited*$num_b_edited.''.$del_letter_a.''.$del_letter_b;	
				
		}
			// Check if in first number was a letter
			elseif ($letter_a == true) {
				// Define the product
				$product = 2*$num_a_edited*$second_num.''.$del_letter_a;	
				
		} 
		
			// Check if in second number was a letter
			elseif ($letter_b == true) {
				// Define the product
				$product = 2*$num_b_edited*$first_num.''.$del_letter_b;
		}	
			// Else staiment
			else {
				// Define the product
				$product = 2*$first_num*$second_num;
	} 

	
	// STOP Product Calculation

	// Define the dif variable
	// Check if in first or second number was a letter
	if ($letter_a == true || $letter_b == true) {
			// Define the sum variable
	   		$dif = $num_a_power_2.'-'.$num_b_power_2;
	   } else {
	   		// Define the dif variable
	   		$dif = $num_a_power_2 - $num_b_power_2;
	   }
	   // STOP Filter for letter and square root symbol and power calculation

// Echo the result
echo    $first_num.'<sup>2</sup> -  '.$second_num.'<sup>2</sup> +  '.'2 * '.$first_num.' * '.$second_num.' = <br />'.
		$num_a_power_2.' - '.$num_b_power_2.' + '.$product.' = <br />'.
		$dif.' + '.$product;
		;
}


// Calculate third formula
function Calculate_third_formula($first_num, $second_num)
{
	// Unset the cookies for radical symbol
	if(isset($_COOKIE['Sqrt_for_a'])){
    setcookie("Sqrt_for_a", "", time() - 3600);
}
	if(isset($_COOKIE['Sqrt_for_b'])){
    setcookie("Sqrt_for_b", "", time() - 3600);
}		
	// START Filter for letter and square root symbol and power calculation
  	
  	// Define the variables for numbers at square
	
		// Check if first number has in it a letter
		if (preg_match("/[a-z]/i", $first_num)) {
			// Split the first number in a array
			$first_num_content = str_split($first_num);
			foreach ($first_num_content as $key => $value) {
				// Check if  the value is a letter
				if (preg_match("/[a-z]/i", $value)) {
					// Delete the letter
				    $num_a_edited = str_replace($value, '', $first_num);
					// Store the deleted letter in a variable
					$del_letter_a = $value;
					$letter_a = true;
				} 
			}
		} else {
			$letter_a = false;
		}
		// Check if first number has in it a letter
		if (preg_match("/[a-z]/i", $second_num)) {
			// Split the sec number in a array
			$second_num_content = str_split($second_num);
			foreach ($second_num_content as $k => $v) {
				// Check if  the value is a letter
				if (preg_match("/[a-z]/i", $v)) {
					// Delete the letter
				    $num_b_edited = str_replace($v, '', $second_num);
				    // Store the deleted letter in a variable
					$del_letter_b = $v;
					$letter_b = true;
				} 
			}
		} else {
			$letter_b = false;
		}

		// Check if in first number was √(Again the user can insert in same number a letter and √, but can have a number with letter and one with √)
		if ($sqrt_root_symbol_a = strstr($first_num, '√')) {
			// Eliminate √ from number
			$number_sqrt_a = ltrim($sqrt_root_symbol_a ,'√');
			//Check if was a number beore the  √
			$number_before_sqrt_a = str_replace($sqrt_root_symbol_a, '', $first_num);
			if ($number_before_sqrt_a != '') {
				//Calculate the square root of first number
				$sqrt_for_a = sqrt($number_sqrt_a);
				// Calculate the power 
				$num_a_power_2 = pow($number_before_sqrt_a, 2)*pow($sqrt_for_a, 2);
			} 
			else {
				//Calculate the square root of first number
				$sqrt_for_a = sqrt($number_sqrt_a);
				// Calculate the power 
				$num_a_power_2 = pow($sqrt_for_a, 2);	
			}	
		}
		// Check if in first number was a letter 
		elseif ($letter_a == true) {
			$num_a_power_2 = pow($num_a_edited, 2).$del_letter_a.'<sup>2</sup>';
		} else {
			$num_a_power_2 = pow($first_num, 2);
		}


		// Check if in second number was √(Again the user can insert in same number a letter and √, but can have a number with letter and one with √)
		if ($sqrt_root_symbol_b = strstr($second_num, '√')) {
			// Eliminate √ from number
			$number_sqrt_b = ltrim($sqrt_root_symbol_b ,'√');
			//Check if was a number beore the  √
			$number_before_sqrt_b = str_replace($sqrt_root_symbol_b, '', $second_num);
			if ($number_before_sqrt_b != '') {
				//Calculate the square root of second number
				$sqrt_for_b = sqrt($number_sqrt_b);
				// Calculate the power 
				$num_b_power_2 = pow($number_before_sqrt_b, 2)*pow($sqrt_for_b, 2);
			} 
			else {
				//Calculate the square root of second number
				$sqrt_for_b = sqrt($number_sqrt_b);
				// Calculate the power 
				$num_b_power_2 = pow($sqrt_for_b, 2);	
			}	
		}
		// Check if in second number was a letter 
		elseif ($letter_b == true) {
			$num_b_power_2 = pow($num_b_edited, 2).$del_letter_b.'<sup>2</sup>';
		} else {
			$num_b_power_2 = pow($second_num, 2);
		}
		// STOP Filter for letter and square root symbol and power calculation

   // Echo out the result
    	echo '('.$first_num.'-'.$second_num.')('.$first_num.'+'.$second_num.') = <br />
    			('.$first_num.') <sup>2</sup> - ('.$second_num.') <sup>2</sup> = <br />'
    			.$num_a_power_2.'-'.$num_b_power_2;
}

// Calculate fourth formula
 function Calculate_fourth_formula($first_num, $second_num, $third_num)
 {
 	# code...
 }

// Calculate fifth formula
  function Calculate_fifth_formula($first_num, $second_num)
 {
 		// Unset the cookies for radical symbol
	if(isset($_COOKIE['Sqrt_for_a'])){
    setcookie("Sqrt_for_a", "", time() - 3600);
}
	if(isset($_COOKIE['Sqrt_for_b'])){
    setcookie("Sqrt_for_b", "", time() - 3600);
}		
	// START Filter for letter and square root symbol and power calculation
  	
  	// Define the variables for numbers at square
	
		// Check if first number has in it a letter
		if (preg_match("/[a-z]/i", $first_num)) {
			// Split the first number in a array
			$first_num_content = str_split($first_num);
			foreach ($first_num_content as $key => $value) {
				// Check if  the value is a letter
				if (preg_match("/[a-z]/i", $value)) {
					// Delete the letter
				    $num_a_edited = str_replace($value, '', $first_num);
					// Store the deleted letter in a variable
					$del_letter_a = $value;
					$letter_a = true;
				} 
			}
		} else {
			$letter_a = false;
		}
		// Check if first number has in it a letter
		if (preg_match("/[a-z]/i", $second_num)) {
			// Split the sec number in a array
			$second_num_content = str_split($second_num);
			foreach ($second_num_content as $k => $v) {
				// Check if  the value is a letter
				if (preg_match("/[a-z]/i", $v)) {
					// Delete the letter
				    $num_b_edited = str_replace($v, '', $second_num);
				    // Store the deleted letter in a variable
					$del_letter_b = $v;
					$letter_b = true;
				} 
			}
		} else {
			$letter_b = false;
		}
 

		// Check if in first number was √(Again the user can insert in same number a letter and √, but can have a number with letter and one with √)
		if ($sqrt_root_symbol_a = strstr($first_num, '√')) {
			// Eliminate √ from number
			$number_sqrt_a = ltrim($sqrt_root_symbol_a ,'√');
			//Check if was a number beore the  √
			$number_before_sqrt_a = str_replace($sqrt_root_symbol_a, '', $first_num);
			if ($number_before_sqrt_a != '') {
				//Calculate the square root of first number
				$sqrt_for_a = sqrt($number_sqrt_a);
				// Calculate the power 
				$num_a_power_2 = pow($number_before_sqrt_a, 2)*pow($sqrt_for_a, 2);
				$number_before_sqrt_a_bool = true;
				$root_symbol_a = true;
			} 
			else {
				//Calculate the square root of first number
				$sqrt_for_a = sqrt($number_sqrt_a);
				// Calculate the power 
				$num_a_power_2 = pow($sqrt_for_a, 2);	
				$number_before_sqrt_a_bool = false;
			}	
		}
		// Check if in first number was a letter 
		elseif ($letter_a == true) {
			$num_a_power_2 = pow($num_a_edited, 2).$del_letter_a.'<sup>2</sup>';
			$root_symbol_a = false;
		} else {
			$num_a_power_2 = pow($first_num, 2);
			$root_symbol_a = false;
		}


		// Check if in second number was √(Again the user can insert in same number a letter and √, but can have a number with letter and one with √)
		if ($sqrt_root_symbol_b = strstr($second_num, '√')) {

			// Eliminate √ from number
			$number_sqrt_b = ltrim($sqrt_root_symbol_b ,'√');
			//Check if was a number beore the  √
			$number_before_sqrt_b = str_replace($sqrt_root_symbol_b, '', $second_num);
			if ($number_before_sqrt_b != '') {
				//Calculate the square root of second number
				$sqrt_for_b = sqrt($number_sqrt_b);
				// Calculate the power 
				$num_b_power_2 = pow($number_before_sqrt_b, 2)*pow($sqrt_for_b, 2);
				$number_before_sqrt_b_bool = true;
				$root_symbol_b = true;
			} 
			else {
				//Calculate the square root of second number
				$sqrt_for_b = sqrt($number_sqrt_b);
				// Calculate the power 
				$num_b_power_2 = pow($sqrt_for_b, 2);	
				$number_before_sqrt_b_bool = false;
			}

		}
		// Check if in second number was a letter 
		elseif ($letter_b == true) {
			$num_b_power_2 = pow($num_b_edited, 2).$del_letter_b.'<sup>2</sup>';
			$root_symbol_b = false;
		} else {
			$num_b_power_2 = pow($second_num, 2);
			$root_symbol_b = false;
		}
		
 		// Calculate the numbers at  the power of 3
 		// Check if user insert radical in first number
 		if ($sqrt_root_symbol_a) {
 			// Check if user insert a number before the first number(For calculation I use the variables already defined at calculation of the numbers at the power of 2)
 			if ($number_before_sqrt_a) {
 				// Calculate the power
 				$num_a_power_3 = pow($number_before_sqrt_a, 3)*$num_a_power_2.'√'.$number_sqrt_a;
 			} else {
 				$num_a_power_3 = $num_a_power_2.$first_num;
 			}
 		} elseif ($letter_a == true) {
 			$num_a_power_3 = pow($num_a_edited, 3).$del_letter_a.'<sup>3</sup>';
 		} else {
 			$num_a_power_3 = pow($first_num, 3);
 		}

 		// Calculate the numbers at  the power of 3
 		// Check if user insert radical in second number
 		if ($sqrt_root_symbol_b) {
 			// Check if user insert a number before the second number(For calculation I use the variables already defined at calculation of the numbers at the power of 2)
 			if ($number_before_sqrt_b) {
 				// Calculate the power
 				$num_b_power_3 = pow($number_before_sqrt_b, 3)*$num_b_power_2.'√'.$number_sqrt_b;
 			} else {
 				$num_b_power_3 = $num_b_power_2.$second_num;
 			}
 		} elseif ($letter_b == true) {
 			$num_b_power_3 = pow($num_b_edited, 3).$del_letter_b.'<sup>3</sup>';
 		} else {
 			$num_b_power_3 = pow($second_num, 3);
 		}




		// STOP Filter for letter and square root symbol and power calculation

 		// START Calculate  the products (First and second)



	// Check if in first number was √ && in second num was √
	if ($sqrt_root_symbol_a && $sqrt_root_symbol_b) {

		// Check if before the both numbers was another nuumber
			if ($number_before_sqrt_a_bool == true && $number_before_sqrt_b_bool == true) {
				// Define the first product variable
				$product_1 = 3*$num_a_power_2*$number_before_sqrt_b.'√'.$number_sqrt_b;
				// Define the second product
				$product_2 = 3*$num_b_power_2*$number_before_sqrt_a.'√'.$number_sqrt_a;
			} 
			// Check  if ONLY in first number was a number before √
			elseif ($number_before_sqrt_a_bool == true) {
				// Define the first product
				$product_1 = 3*$num_a_power_2.$second_num;
				// Define the second product
				$product_2 = 3*$num_b_power_2*$number_before_sqrt_a.'√'.$number_sqrt_a;
			} // Check  if ONLY in second number was a number before √
			elseif ($number_before_sqrt_b_bool == true) {
				// Define the first product
				$product_1 = 3*$num_b_power_2.$first_num;
				// Define the second product
				$product_2 = 3*$num_a_power_2*$number_before_sqrt_b.'√'.$number_sqrt_b;
			}
			// Else staiment
			else {
				// Define the first product
				$product_1 = 3*$num_a_power_2.$second_num;
				// Define the second product
				$product_2 = 3*$num_b_power_2.$first_num;
		}
	} 
	
	// Check if in first number was √
	elseif ($sqrt_root_symbol_a) {
			// Check if was a  number before the √
			if ($number_before_sqrt_a_bool ==  true) {
				// Check if was a letter in second number
				if ($letter_b == true) {
					// Define the first product 
					$product_1 = 3*$number_before_sqrt_a*pow($num_b_edited, 2).$del_letter_b.'<sup>2</sup>√'.$number_sqrt_a;
					// Define the second product
					$product_2 = 3*$num_a_power_2*$num_b_edited.$del_letter_b.'√'.$number_sqrt_a;	
				} else {
					// Define the first product
					$product_1 = 3*$second_num*$num_a_power_2;
					// Define the second product
					$product_2 = 3*$num_b_power_2*$number_before_sqrt_a.'√'.$number_sqrt_a;
				}
				
			}
			// Check if in second number was a letter, BUT in first number wasn't a number before √
			 elseif ($letter_b == true) {
				// Define the first product 
				$product_1 = 3*pow($num_b_edited, 2).$del_letter_b.'<sup>2</sup>'.$first_num;
				// Define the second product
				$product_2 = 3*$num_a_power_2*$num_b_edited.$del_letter_b;
			} 
			// Else staiment
			else {
				// Define the first product
				$product_1 = 3*$second_num*$num_a_power_2;
				// Define the second product
				$product_2 = 3*$num_b_power_2.$first_num;
			}	
	} 

	// Check if in second number was √
	elseif ($sqrt_root_symbol_b) {
		// Check if was a  number before the √
			if ($number_before_sqrt_b_bool ==  true) {
				// Check if was a letter in first number
				if ($letter_a == true) {
					// Define the first product 
					$product_1 = 3*$number_before_sqrt_b*pow($num_a_edited, 2).$del_letter_a.'<sup>2</sup>√'.$number_sqrt_b;
					// Define the second product
					$product_2 = 3*$num_b_power_2*$num_a_edited.$del_letter_a.'√'.$number_sqrt_b;
				} else {
					// Define the first product
					$product_1 = 3*$first_num*$num_b_power_2;
					// Define the second product
					$product_2 = 3*$num_a_power_2*$number_before_sqrt_b.'√'.$number_sqrt_b;
				}
				
			}
			// Check if in first number was a letter, BUT in second number wasn't a number before √
			 elseif ($letter_a == true) {
				// Define the first product 
				$product_1 = 3*pow($num_a_edited, 2).$del_letter_a.'<sup>2</sup>'.$second_num;
				// Define the second product
				$product_2 = 3*$num_b_power_2*$num_a_edited.$del_letter_a;
			} else {
				// Define the first product
				$product_1 = 3*$first_num*$num_b_power_2;
				// Define the second product
				$product_2 = 3*$num_a_power_2.$second_num;
			}
		
		}		


			// Check if in first number && in second number was a letter
			elseif ($letter_a == true && $letter_b == true) {
				// Define the first product
				$product_1 = 3*pow($num_a_edited, 2)*$num_b_edited.$del_letter_b.$del_letter_a.'<sup>2</sup>';
				// Define the second product
				$product_2 = 3*pow($num_b_edited, 2)*$num_a_edited.$del_letter_a.$del_letter_b.'<sup>2</sup>';
				
		}
			// Check if in first number was a letter
			elseif ($letter_a == true) {
				// Define the first product
				$product_1 = 3*pow($num_a_edited, 2)*$second_num.$del_letter_a.'<sup>2</sup>';
				// Define the second product
				$product_2 = 3*$num_b_power_2*$num_a_edited.$del_letter_a;		
				
		} 
		
			// Check if in second number was a letter
			elseif ($letter_b == true) {
				// Define the first product
				$product_1 = 3*$num_a_power_2*$num_b_edited.$del_letter_b;	
				// Define the second product
				$product_2 = 3*pow($num_b_edited, 2)*$first_num.$del_letter_b.'<sup>2</sup>';					
		}	
			// Else staiment
			else {
				// Define the first product
				$product_1 = 3*$num_a_power_2*$second_num;
				$product_2 = 3*$first_num*$num_b_power_2;
	} 
	// STOP Product Calculation

	// Echo the result
	echo $first_num.'<sup>3</sup> + '.$_POST['number_b'].'<sup>3</sup> + 3*('.$first_num.')<sup>2</sup>*'.$second_num.' + 3*'.$first_num.'*('.$second_num.')<sup>2</sup> = <br />'.$num_a_power_3.' + '.$num_b_power_3.' + '.$product_1.' + '.$product_2;

}	

// Calculate the sixth formula

  function Calculate_sixth_formula($first_num, $second_num)
 {
 		// Unset the cookies for radical symbol
	if(isset($_COOKIE['Sqrt_for_a'])){
    setcookie("Sqrt_for_a", "", time() - 3600);
}
	if(isset($_COOKIE['Sqrt_for_b'])){
    setcookie("Sqrt_for_b", "", time() - 3600);
}		
	// START Filter for letter and square root symbol and power calculation
  	
  	// Define the variables for numbers at square
	
		// Check if first number has in it a letter
		if (preg_match("/[a-z]/i", $first_num)) {
			// Split the first number in a array
			$first_num_content = str_split($first_num);
			foreach ($first_num_content as $key => $value) {
				// Check if  the value is a letter
				if (preg_match("/[a-z]/i", $value)) {
					// Delete the letter
				    $num_a_edited = str_replace($value, '', $first_num);
					// Store the deleted letter in a variable
					$del_letter_a = $value;
					$letter_a = true;
				} 
			}
		} else {
			$letter_a = false;
		}
		// Check if first number has in it a letter
		if (preg_match("/[a-z]/i", $second_num)) {
			// Split the sec number in a array
			$second_num_content = str_split($second_num);
			foreach ($second_num_content as $k => $v) {
				// Check if  the value is a letter
				if (preg_match("/[a-z]/i", $v)) {
					// Delete the letter
				    $num_b_edited = str_replace($v, '', $second_num);
				    // Store the deleted letter in a variable
					$del_letter_b = $v;
					$letter_b = true;
				} 
			}
		} else {
			$letter_b = false;
		}
 

		// Check if in first number was √(Again the user can insert in same number a letter and √, but can have a number with letter and one with √)
		if ($sqrt_root_symbol_a = strstr($first_num, '√')) {
			// Eliminate √ from number
			$number_sqrt_a = ltrim($sqrt_root_symbol_a ,'√');
			//Check if was a number beore the  √
			$number_before_sqrt_a = str_replace($sqrt_root_symbol_a, '', $first_num);
			if ($number_before_sqrt_a != '') {
				//Calculate the square root of first number
				$sqrt_for_a = sqrt($number_sqrt_a);
				// Calculate the power 
				$num_a_power_2 = pow($number_before_sqrt_a, 2)*pow($sqrt_for_a, 2);
				$number_before_sqrt_a_bool = true;
				$root_symbol_a = true;
			} 
			else {
				//Calculate the square root of first number
				$sqrt_for_a = sqrt($number_sqrt_a);
				// Calculate the power 
				$num_a_power_2 = pow($sqrt_for_a, 2);	
				$number_before_sqrt_a_bool = false;
			}	
		}
		// Check if in first number was a letter 
		elseif ($letter_a == true) {
			$num_a_power_2 = pow($num_a_edited, 2).$del_letter_a.'<sup>2</sup>';
			$root_symbol_a = false;
		} else {
			$num_a_power_2 = pow($first_num, 2);
			$root_symbol_a = false;
		}


		// Check if in second number was √(Again the user can insert in same number a letter and √, but can have a number with letter and one with √)
		if ($sqrt_root_symbol_b = strstr($second_num, '√')) {

			// Eliminate √ from number
			$number_sqrt_b = ltrim($sqrt_root_symbol_b ,'√');
			//Check if was a number beore the  √
			$number_before_sqrt_b = str_replace($sqrt_root_symbol_b, '', $second_num);
			if ($number_before_sqrt_b != '') {
				//Calculate the square root of second number
				$sqrt_for_b = sqrt($number_sqrt_b);
				// Calculate the power 
				$num_b_power_2 = pow($number_before_sqrt_b, 2)*pow($sqrt_for_b, 2);
				$number_before_sqrt_b_bool = true;
				$root_symbol_b = true;
			} 
			else {
				//Calculate the square root of second number
				$sqrt_for_b = sqrt($number_sqrt_b);
				// Calculate the power 
				$num_b_power_2 = pow($sqrt_for_b, 2);	
				$number_before_sqrt_b_bool = false;
			}

		}
		// Check if in second number was a letter 
		elseif ($letter_b == true) {
			$num_b_power_2 = pow($num_b_edited, 2).$del_letter_b.'<sup>2</sup>';
			$root_symbol_b = false;
		} else {
			$num_b_power_2 = pow($second_num, 2);
			$root_symbol_b = false;
		}
		
 		// Calculate the numbers at  the power of 3
 		// Check if user insert radical in first number
 		if ($sqrt_root_symbol_a) {
 			// Check if user insert a number before the first number(For calculation I use the variables already defined at calculation of the numbers at the power of 2)
 			if ($number_before_sqrt_a) {
 				// Calculate the power
 				$num_a_power_3 = pow($number_before_sqrt_a, 3)*$num_a_power_2.'√'.$number_sqrt_a;
 			} else {
 				$num_a_power_3 = $num_a_power_2.$first_num;
 			}
 		} elseif ($letter_a == true) {
 			$num_a_power_3 = pow($num_a_edited, 3).$del_letter_a.'<sup>3</sup>';
 		} else {
 			$num_a_power_3 = pow($first_num, 3);
 		}

 		// Calculate the numbers at  the power of 3
 		// Check if user insert radical in second number
 		if ($sqrt_root_symbol_b) {
 			// Check if user insert a number before the second number(For calculation I use the variables already defined at calculation of the numbers at the power of 2)
 			if ($number_before_sqrt_b) {
 				// Calculate the power
 				$num_b_power_3 = pow($number_before_sqrt_b, 3)*$num_b_power_2.'√'.$number_sqrt_b;
 			} else {
 				$num_b_power_3 = $num_b_power_2.$second_num;
 			}
 		} elseif ($letter_b == true) {
 			$num_b_power_3 = pow($num_b_edited, 3).$del_letter_b.'<sup>3</sup>';
 		} else {
 			$num_b_power_3 = pow($second_num, 3);
 		}




		// STOP Filter for letter and square root symbol and power calculation

 		// START Calculate  the products (First and second)



	// Check if in first number was √ && in second num was √
	if ($sqrt_root_symbol_a && $sqrt_root_symbol_b) {

		// Check if before the both numbers was another nuumber
			if ($number_before_sqrt_a_bool == true && $number_before_sqrt_b_bool == true) {
				// Define the first product variable
				$product_1 = 3*$num_a_power_2*$number_before_sqrt_b.'√'.$number_sqrt_b;
				// Define the second product
				$product_2 = 3*$num_b_power_2*$number_before_sqrt_a.'√'.$number_sqrt_a;
			} 
			// Check  if ONLY in first number was a number before √
			elseif ($number_before_sqrt_a_bool == true) {
				// Define the first product
				$product_1 = 3*$num_a_power_2.$second_num;
				// Define the second product
				$product_2 = 3*$num_b_power_2*$number_before_sqrt_a.'√'.$number_sqrt_a;
			} // Check  if ONLY in second number was a number before √
			elseif ($number_before_sqrt_b_bool == true) {
				// Define the first product
				$product_1 = 3*$num_b_power_2.$first_num;
				// Define the second product
				$product_2 = 3*$num_a_power_2*$number_before_sqrt_b.'√'.$number_sqrt_b;
			}
			// Else staiment
			else {
				// Define the first product
				$product_1 = 3*$num_a_power_2.$second_num;
				// Define the second product
				$product_2 = 3*$num_b_power_2.$first_num;
		}
	} 
	
	// Check if in first number was √
	elseif ($sqrt_root_symbol_a) {
			// Check if was a  number before the √
			if ($number_before_sqrt_a_bool ==  true) {
				// Check if was a letter in second number
				if ($letter_b == true) {
					// Define the first product 
					$product_1 = 3*$number_before_sqrt_a*pow($num_b_edited, 2).$del_letter_b.'<sup>2</sup>√'.$number_sqrt_a;
					// Define the second product
					$product_2 = 3*$num_a_power_2*$num_b_edited.$del_letter_b.'√'.$number_sqrt_a;	
				} else {
					// Define the first product
					$product_1 = 3*$second_num*$num_a_power_2;
					// Define the second product
					$product_2 = 3*$num_b_power_2*$number_before_sqrt_a.'√'.$number_sqrt_a;
				}
				
			}
			// Check if in second number was a letter, BUT in first number wasn't a number before √
			 elseif ($letter_b == true) {
				// Define the first product 
				$product_1 = 3*pow($num_b_edited, 2).$del_letter_b.'<sup>2</sup>'.$first_num;
				// Define the second product
				$product_2 = 3*$num_a_power_2*$num_b_edited.$del_letter_b;
			} 
			// Else staiment
			else {
				// Define the first product
				$product_1 = 3*$second_num*$num_a_power_2;
				// Define the second product
				$product_2 = 3*$num_b_power_2.$first_num;
			}	
	} 

	// Check if in second number was √
	elseif ($sqrt_root_symbol_b) {
		// Check if was a  number before the √
			if ($number_before_sqrt_b_bool ==  true) {
				// Check if was a letter in first number
				if ($letter_a == true) {
					// Define the first product 
					$product_1 = 3*$number_before_sqrt_b*pow($num_a_edited, 2).$del_letter_a.'<sup>2</sup>√'.$number_sqrt_b;
					// Define the second product
					$product_2 = 3*$num_b_power_2*$num_a_edited.$del_letter_a.'√'.$number_sqrt_b;
				} else {
					// Define the first product
					$product_1 = 3*$first_num*$num_b_power_2;
					// Define the second product
					$product_2 = 3*$num_a_power_2*$number_before_sqrt_b.'√'.$number_sqrt_b;
				}
				
			}
			// Check if in first number was a letter, BUT in second number wasn't a number before √
			 elseif ($letter_a == true) {
				// Define the first product 
				$product_1 = 3*pow($num_a_edited, 2).$del_letter_a.'<sup>2</sup>'.$second_num;
				// Define the second product
				$product_2 = 3*$num_b_power_2*$num_a_edited.$del_letter_a;
			} else {
				// Define the first product
				$product_1 = 3*$first_num*$num_b_power_2;
				// Define the second product
				$product_2 = 3*$num_a_power_2.$second_num;
			}
		
		}		


			// Check if in first number && in second number was a letter
			elseif ($letter_a == true && $letter_b == true) {
				// Define the first product
				$product_1 = 3*pow($num_a_edited, 2)*$num_b_edited.$del_letter_b.$del_letter_a.'<sup>2</sup>';
				// Define the second product
				$product_2 = 3*pow($num_b_edited, 2)*$num_a_edited.$del_letter_a.$del_letter_b.'<sup>2</sup>';
				
		}
			// Check if in first number was a letter
			elseif ($letter_a == true) {
				// Define the first product
				$product_1 = 3*pow($num_a_edited, 2)*$second_num.$del_letter_a.'<sup>2</sup>';
				// Define the second product
				$product_2 = 3*$num_b_power_2*$num_a_edited.$del_letter_a;		
				
		} 
		
			// Check if in second number was a letter
			elseif ($letter_b == true) {
				// Define the first product
				$product_1 = 3*$num_a_power_2*$num_b_edited.$del_letter_b;	
				// Define the second product
				$product_2 = 3*pow($num_b_edited, 2)*$first_num.$del_letter_b.'<sup>2</sup>';					
		}	
			// Else staiment
			else {
				// Define the first product
				$product_1 = 3*$num_a_power_2*$second_num;
				$product_2 = 3*$first_num*$num_b_power_2;
	} 
	// STOP Product Calculation

	// Echo the result
	echo $first_num.'<sup>3</sup> - '.$_POST['number_b'].'<sup>3</sup> - 3*('.$first_num.')<sup>2</sup>*'.$second_num.' + 3*'.$first_num.'*('.$second_num.')<sup>2</sup> = <br />'.$num_a_power_3.' - '.$num_b_power_3.' - '.$product_1.' + '.$product_2;

}


?>