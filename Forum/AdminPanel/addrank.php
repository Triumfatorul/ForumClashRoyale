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
     <select name="AdminPanel1">
        <option value="Def">Select...</option>
         <option value="Yes">Yes</option>
         <option value="No">No</option>
     </select>      

    <p>Admin Panel rank 2</p>
    <select name="AdminPanel2">
        <option value="Def">Select...</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>

    <p>Admin Panel rank 3</p>
    <select name="AdminPanel3">
        <option value="Def">Select...</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>

    <p>Moderator rank 1</p>
    <select name="ModeratorPanel1">
        <option value="Def">Select...</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>

    <p>Moderator rank 2</p>
    <select name="ModeratorPanel2">
        <option value="Def">Select...</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>

    <p>Default</p>
    <select name="Default">
        <option value="Def">Select...</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>
    <br>

    <button type="submit" name="submit_rank">Add rank</button>
</form>

<?php





include_once 'footer.php';

?>