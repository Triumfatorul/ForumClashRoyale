<?php

include_once 'config.php';

// Array cu values True/False de la form addrank

$Rank_Name = $_POST['Rank_Name'];
$Desc = $_POST['Description'];

switch ($_POST['AdminPanel1']) {
  case 'Yes':
    $AdminPanel1 = True;
    break;
  
  case 'No':
    $AdminPanel1 = False;
    break;
}

switch ($_POST['AdminPanel2']) {
  case 'Yes':
    $AdminPanel2 = True;
    break;
  
  case 'No':
    $AdminPanel2 = False;
    break;
}

switch ($_POST['AdminPanel3']) {
  case 'Yes':
    $AdminPanel3 = True;
    break;
  
  case 'No':
    $AdminPanel3 = False;
    break;
}

switch ($_POST['ModeratorPanel1']) {
  case 'Yes':
    $ModeratorPanel1 = True;
    break;
  
  case 'No':
    $ModeratorPanel1 = False;
    break;
}

switch ($_POST['ModeratorPanel2']) {
  case 'Yes':
    $ModeratorPanel2 = True;
    break;
  
  case 'No':
    $ModeratorPanel2= False;
    break;
}

switch ($_POST['Default']) {
  case 'Yes':
    $Default = True;
    break;
  
  case 'No':
    $Default = False;  
     break;
}


$values = array($Default, $AdminPanel1, $AdminPanel2, $AdminPanel3, $ModeratorPanel1, $ModeratorPanel2);
$columns = array();

$sql_addrank = "INSERT INTO ranks (Rank_name, Rank_desc)
                VALUES ('$Rank_Name', '$Desc')";
$query_rank = mysqli_query($link, $sql_addrank);
$last_id = mysqli_insert_id($link);

      $sql_rank = "select column_name from information_schema.columns where table_name='ranks'";
      $result_rank = $link->query($sql_rank);

if ($result_rank->num_rows > 0) {
    // output data of each row
  while ($row_columns = $result_rank->fetch_assoc()) {
         foreach ($row_columns as $key => $value1) {
             array_push($columns, $value1);
  

         }
       }
    }


if (($key = array_search('Rank_name', $columns)) !== false) {
    unset($columns[$key]);
}

if (($key = array_search('Rank_desc', $columns)) !== false) {
    unset($columns[$key]);
}

if (($key = array_search('id', $columns)) !== false) {
    unset($columns[$key]);
} 

echo "<br />";
$final = array_combine($columns, $values);
foreach ($final as $key => $value) {
    $sql_addrank = "UPDATE  ranks SET $key = $value WHERE id = $last_id";
    var_dump($sql_addrank);
    echo "<br />";
    $query_rank = mysqli_query($link, $sql_addrank);
}

header("location: index.php");
  





?>
