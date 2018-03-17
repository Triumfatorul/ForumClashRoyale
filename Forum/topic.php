<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
  include_once'header.php';
   include_once'config.php';
?>


<style type="text/css">
   textarea {
    resize: none;
    margin-left: 10%;

}
   .submit {
    width: 7%;
    margin-left: 26%;
 }
hr {
   display:block;
    height:1px;
    border:0;   
    border-top:1px solid #000;
    margin:1em 0;
    padding:0;
}
p {
  top: 50px;
  margin-left: 80px;
} 
h2 {
  text-align: center;
  top: 20px;
}
</style>

<?php
//Define the function for printing out the topic title and content
function Topic($link, $row)
{
   echo '<h2>'.$row['topic_title'].'</h2><br /><br />
         <p>'.$row['topic_content'].'</p><br>' ;
}

// Denfine the function for the space where you insert the reply
function Reply() {
  ?>
  <br /><br /><br /><br /><hr />
 <form method="POST">
   <textarea rows="7" cols="43" name="reply_content" required placeholder="Insert your reply"></textarea> 
   <br>
   <button type="submit" name="submit" class="submit">Submit</button>
 </form>
  <?php

}



echo "<a href='reply.php?Topic=".$_GET['TopicTitle']."'>Reply</a>";

// See  in what table are functions
$sql_sel_topic1 = "SELECT topic_title, topic_content FROM topic1 WHERE topic_title = '".$_GET['TopicTitle']."' ";
$result_sel_topic1 = mysqli_query($link, $sql_sel_topic1);
$sql_sel_topic2 = "SELECT topic_title, topic_content FROM topic2 WHERE topic_title = '".$_GET['TopicTitle']."' ";
$result_sel_topic2 = mysqli_query($link, $sql_sel_topic2);
$sql_sel_topicstest = "SELECT topic_title, topic_content FROM topicstest WHERE topic_title = '".$_GET['TopicTitle']."' ";
$result_sel_topicstest = mysqli_query($link, $sql_sel_topicstest);

  if ($result_sel_topic1->num_rows > 0) {
     $row = $result_sel_topic1->fetch_assoc();
     Topic($link, $row);

                     
         }
 elseif ($result_sel_topic2->num_rows > 0) {
    $row = $result_sel_topic2->fetch_assoc();
    Topic($link, $row);
 
      } elseif ($result_sel_topicstest->num_rows > 0) {
    $row = $result_sel_topicstest->fetch_assoc();
    Topic($link, $row);

    

  }
  
  echo "<hr>";
  $sql_print_replies = "SELECT reply_content, reply_by FROM replies WHERE topic_name = '".$_GET['TopicTitle']."'";
  $query = mysqli_query($link, $sql_print_replies);
  while ($rows = $query->fetch_assoc()) {

    echo"<div class = 'reply_box'>". 
         nl2br($rows['reply_content'])."<br>       By:".$rows['reply_by'] ; 

                
      echo "      <form method='POST' action='del-comm.php'>
                   <button name='delete'>Delete</button>
                 </form> ";
      
       echo "     <form method='POST' action='edit-comm.php'>
                   <button name='edit'>Edit</button>
                 </form> </div>";         

?>
                <?php


     
  
 
  }
  

include_once 'footer.php';
?>