<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style2.css">
	<title>Admin Panel</title>
</head>
<body>

<?php
  session_start();

  if ($_SESSION['admin_1'] == true) {
    	echo "<header>
		<nav class='main-header'>
		    <ul>
		        <li><a href='index.php'>Home</a></li>
		        <li><a href='usersprofiles.php'>Users</a></li>
		        <li><a href='setrank.php'>Set ranks</a></li>
		        <li><a href='addrank.php'>Add ranks</a></li>
                <li><a href='/Forum/index.php'>Main page</a></li>
		    </ul>	
	    </nav>    	
    </header>";
    }  else {
    	echo "You are not allowed to be here.<br>
    	      <a href = '../index.php'>Back</a>";
    }
    


?>