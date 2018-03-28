<b>Select formula</b><br />
<form method="POST">
       <select name="Formula">
		<option value="1"><p>(a+b)<sup>2</sup></p></option>
		<option value="2"><p>(a-b)<sup>2</sup></p></option>
		<option value="3"><p>(a-b)(a+b)</p></option>
 	   	<option value="4"><p>(a+b+c)<sup>2</sup></p></option>
 	   	<option value="5"><p>(a+b)<sup>3</sup></p></option>
 	   	<option value="6"><p>(a-b)<sup>3</sup></p></option>
 	   </select>
 	   <button name="submit" type="submit">Submit</button>
</form>



<?php

// REFA TOTUL CU IF / ELSEIF IN FUNCTIE DE COOKIE-URI

// Check if user press the submit button for select the formula

   if (isset($_POST['submit'])) {
	// Make a switch loop for see what formula user chose

	switch ($_POST['Formula']) {
		case '1':
			setcookie('Formula', '1');
		break;
	
		case '2':
			setcookie('Formula', '2');
		break;
		case '3':
			setcookie('Formula', '3');
		break;
		case '4':
			setcookie('Formula', '4');
		break;
		case '5':
			setcookie('Formula', '5');
		break;
		case '6':
			setcookie('Formula', '6');
		break;
	}
	  // Check if user chose first or second formula

	  	echo " <form method='POST' action ='calcul_power.php'>
	    	<input type='text' name='number_a' placeholder='Introduceti termenul a' />
	    	<br />  
	 		<input type='text' name='number_b' placeholder='Introduceti termenul b' />
	 		<button name='submit_calcul' type='submit'>Submit</button>
	</form> 
	<form method='POST'>
	 		<button type='submit' name='sqrt_root_a' >&radic;</button>
 	</form>
	<form method='POST'>
 		<button type='submit' name='sqrt_root_b' >&radic;</button>
 	</form> ";
	  } elseif ($_POST['Formula'] == '4') {
	  	echo " <form method='POST' action ='calcul_power.php'>
	    	<input type='text' name='number_a' placeholder='Introduceti termenul a' />
	    	<br />  
	 		<input type='text' name='number_b' placeholder='Introduceti termenul b' />
	 		<br />
	 		<input type='text' name='number_c' placeholder='Introduceti termenul c' />
	 		<button name='submit_calcul' type='submit'>Submit</button>
	</form> 
	<form method='POST'>
	 		<button type='submit' name='sqrt_root_a' >&radic;</button>
 	</form>
	<form method='POST'>
 		<button type='submit' name='sqrt_root_b' >&radic;</button>
 	</form> 
 	<form method='POST'>
 		<button type='submit' name='sqrt_root_c' >&radic;</button>
 	</form> ";
	  }
	  


  






if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	

// Check if user press the submit button for the radical symbol for first input	  	
	 if (isset($_POST['sqrt_root_a'])) {
	  	// Set a cookie for first radical
	  	setcookie('Sqrt_for_a', 'True');
    // Check if user already press the button for radical symbol for second input
    if (isset($_COOKIE['Sqrt_for_b'])) {
    	// Echo a form with radcial symobol in inputs for both numbers
	 	echo " <form method='POST' action ='calcul_power.php'>
    	<input type='text' name='number_a' value=\"&radic;\" />
    	<br />  
 		<input type='text' name='number_b' value=\"&radic;\"  />
 		<button name='submit_calcul' type='submit'>Submit</button>
    </form> 
	 <form method='POST'>
 		<button type='submit' name='sqrt_root_a' >&radic;</button>
 	</form>
	 <form method='POST'>
 		<button type='submit' name='sqrt_root_b' >&radic;</button>
 	</form>" ;
	 } else {	
	 	// Echo a form with radcial symobol in inputs for first numbers  
	  echo " <form method='POST' action ='calcul_power.php'>
    	<input type='text' name='number_a' value=\"&radic;\"  />
    	<br />  
 		<input type='text' name='number_b' placeholder='Introduceti termenul b' />
 		<button name='submit_calcul' type='submit'>Submit</button>
    </form> 
     <form method='POST'>
 		<button type='submit' name='sqrt_root_a' >&radic;</button>
 	</form>
 	 <form method='POST'>
 		<button type='submit' name='sqrt_root_b' >&radic;</button>
 	</form>" ;
  }
	  } 
	  // Check if user press the submit button for the radical symbol for second input
	  elseif (isset($_POST['sqrt_root_b'])) {
	  	// Set cookie for second radical
	  	setcookie('Sqrt_for_b', 'True');
	  		
	  // Check if user already press the button for radical symbol for first input		
	 if (isset($_COOKIE['Sqrt_for_a'])) {
	 	// Echo a form with radcial symobol in inputs for both numbers
		echo " <form method='POST' action ='calcul_power.php'>
    	<input type='text' name='number_a' value=\"&radic;\" />
    	<br />  
 		<input type='text' name='number_b' value=\"&radic;\"  />
 		<button name='submit_calcul' type='submit'>Submit</button>
    </form> 
	 <form method='POST'>
 		<button type='submit' name='sqrt_root_a' >&radic;</button>
	</form>
 	<form method='POST'>
 		<button type='submit' name='sqrt_root_b' >&radic;</button>
 	</form>" ;
	 } else {
	 	// Echo a form with radcial symobol in inputs for second numbers
	  echo " <form method='POST' action ='calcul_power.php'>
    	<input type='text' name='number_a' placeholder='Introduceti termenul a' />
    	<br />  
 		<input type='text' name='number_b' value=\"&radic;\"  />
 		<button name='submit_calcul' type='submit'>Submit</button>
    </form> 
    <form method='POST'>
 		<button type='submit' name='sqrt_root_a' >&radic;</button>
 	</form><form method='POST'>
 		<button type='submit' name='sqrt_root_b' >&radic;</button>
	</form>" ;
	  	}
	  }
	  
   } 
 
?>