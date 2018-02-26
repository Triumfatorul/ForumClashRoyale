<?php

// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

require "config.php";
include_once 'header.php';


$sql = "SELECT username, user_level FROM users WHERE username = '".htmlspecialchars($_SESSION['username'])."'";
 $query = mysqli_query($link, $sql);
  $row = $query->fetch_assoc();      


       if($query){
        echo 'Username: ' . $row["username"]. '<br>'; 
        echo 'Rank: ' . $row["user_level"];
        } else {
          echo  'Something went wrong.';
        }

include_once 'footer.php';
