   <?php


// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

include 'header.php';

?>




<?php

require('config.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['topic_title'])){
        // removes backslashes
    $topic_title = stripslashes($_REQUEST['topic_title']);
        //escapes special characters in a string
    $topic_title = mysqli_real_escape_string($link, $topic_title); 
    $topic_content = stripslashes($_REQUEST['topic_content']);
    $topic_content = mysqli_real_escape_string($link, $topic_content);
    $trn_date = date("Y-m-d H:i:s");
    switch ($_POST['Cat']) {
        case $_POST['Cat']=1:
            $query = "INSERT into `topic1` (topic_title, topic_content, topic_date, topic_owner)
                       VALUES ('$topic_title', '$topic_content', '$trn_date', '".htmlspecialchars($_SESSION['username'])."')";
                 break;
        case $_POST['Cat']=2:
             $query = "INSERT into `topic1` (topic_title, topic_content, topic_date, topic_owner)
                       VALUES ('$topic_title', '$topic_content', '$trn_date', '".htmlspecialchars($_SESSION['username'])."')";
                 break;
        case $_POST['Cat']=3:
           $query = "INSERT into `topic1` (topic_title, topic_content, topic_date, topic_owner)
                       VALUES ('$topic_title', '$topic_content', '$trn_date', '".htmlspecialchars($_SESSION['username'])."')";
                 break;
        default:
            echo "Please select a category." ;
            break;
    } $result = mysqli_query($link, $query);
    $result1 = mysqli_query($link, $query_owner);

        if($result){
header("location: index.php");
} else {
    echo "Error.";
}
}
?>

<div class="form">
<h1 id='Addtop'>Add topic</h1>
<form name="Add topic" action="" method="POST" class="Topic">
<input id='Ttit' type="text" name="topic_title" placeholder="Topic title" required /> <br>
<textarea cols="50" rows="10"  id='Tcon' type="text" name="topic_content" placeholder="Topic content" required /></textarea> <br>
<p>Select Category</p><br>
<select name="Cat">
    <option value=1>Clans</option>
    <option value=2>Applications</option>
    <option value=3>General</option> 
</select><br>
<input type="submit" name="Add topic" class="Submit" value="Add topic" />
</form>
</div>

<?php
 include 'footer.php';
?>