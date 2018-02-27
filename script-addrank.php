<?php

include_once 'config.php';

$sql_insert_rank_colums = "INSERT INTO ranks (Rank_name, Rank_desc ";
$sql_insert_rank_values = "VALUES ('".$_POST['Rank_Name']. "', '".$_POST['Description']. "' ";


//Check if variables are true or false and then insert to the DB
switch ($_POST['AdminPanel1']) {
   case 'True':
     $_POST['AdminPanel1'] = True;
    $sql_insert_rank_colums .= ", admin_1"; 
     $sql_insert_rank_values .= ", ".$_POST['AdminPanel1']."";    
     break;
   

 } 

 switch ($_POST['AdminPanel2']) {
   case 'True':
     $_POST['AdminPanel2'] = True;
     $sql_insert_rank_colums .= ", admin_2"; 
     $sql_insert_rank_values .= ", ".$_POST['AdminPanel2']."";  
     break;
   

 } 

switch ($_POST['AdminPanel3']) {
   case 'True':
     $_POST['AdminPanel3'] = True;
     $sql_insert_rank_colums .= ", admin_3"; 
     $sql_insert_rank_values .= ", ".$_POST['AdminPanel3']."";    
     break;
   

 } 

switch ($_POST['ModeratorPanel1']) {
   case 'True':
     $_POST['ModeratorPanel1'] = True;
     $sql_insert_rank_colums .= ", mod_1"; 
     $sql_insert_rank_values .= ", ".$_POST['ModeratorPanel1']."";    
     break;
   

 } 

switch ($_POST['ModeratorPanel2']) {
   case 'True':
     $_POST['ModeratorPanel2'] = True;
     $sql_insert_rank_colums .= ", mod_2"; 
     $sql_insert_rank_values .= ", ".$_POST['ModeratorPanel2']."";    
     break;
   

 } 


//Insert data to database
   $sql_insert_rank_values .= ")"; 
   $sql_insert_rank_colums .= ")";
   $sql_insert_rank = $sql_insert_rank_colums.$sql_insert_rank_values;
   var_dump($sql_insert_rank);
   $query_rank = mysqli_query($link, $sql_insert_rank);
      if ($query_rank) {
   	header("location : index.php");
   }

   ?>