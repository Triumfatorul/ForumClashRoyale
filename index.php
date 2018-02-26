<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>

<?php
  include_once 'header.php';
?>

<section>
     <div>
     	   <h2 id='Home'>Home</h2>
     </div>
</section>




<?php
require "config.php";

echo "<h2>Clans</h2>";
$sql = "SELECT topic_title, topic_content FROM topic1";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " <a href='topic.php?TopicTitle=".$row['topic_title']."'><p>".$row['topic_title']."</p></a> <br>"  ;  
    }
} else {
    echo "0 results";
}

echo "<br><h2>Aplications</h2>";
$sql = "SELECT topic_title, topic_content FROM topicstest";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " <a href='topic.php?TopicTitle=".$row['topic_title']."'><p>".$row['topic_title']."</p></a> <br>"  ;  
    }
} else {
    echo "0 results";
}

echo "<br><h2>General</h2>";
$sql = "SELECT topic_title, topic_content FROM topic2";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " <a href='topic.php?TopicTitle=".$row['topic_title']."'><p>".$row['topic_title']."</p></a> <br>"  ;  
    }
} else {
    echo "0 results";
}
$link->close();
?>

<?php
  include_once 'footer.php';
?>