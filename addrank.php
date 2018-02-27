<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
include_once 'config.php';
include_once 'header.php';


?>
<h2>Create rank</h2>
<form method="POST" action="script-addrank.php">
    <h3>Permissions</h3>
    <p>Rank name</p>
    <input type="text" name="Rank_Name" placeholder="Rank Name" required>
    <p>Description</p>
    <textarea cols="47" rows="8" placeholder="Rank Description" name="Description" required></textarea>   
    <p>Admin Panel rank 1</p>
    <input type="radio" name="AdminPanel1" value='True'>Yes<br>
    <input type="radio" name="AdminPanel1" value='False' >No<br>
     <p>Admin Panel rank 2</p>
    <input type="radio" name="AdminPanel2" value='True'>Yes<br>
    <input type="radio" name="AdminPanel2" value='False' >No<br>
     <p>Admin Panel rank 3</p>
    <input type="radio" name="AdminPanel3" value='True'>Yes<br>
    <input type="radio" name="AdminPanel3" value='False' >No<br>
    <p>Moderator rank 1</p>
    <input type="radio" name="ModeratorPanel1" value='True'>Yes<br>
    <input type="radio" name="ModeratorPanel1" value='False' >No<br>
    <p>Moderator rank 2</p>
    <input type="radio" name="ModeratorPanel2" value='True'>Yes<br>
    <input type="radio" name="ModeratorPanel2" value='False' >No<br>
    <button type="submit" name="submit_rank">Add rank</button>
</form>

<?php





include_once 'footer.php';

?>