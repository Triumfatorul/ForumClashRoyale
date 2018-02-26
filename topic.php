<?php
  include_once'header.php';
   include_once'config.php';
?>


<style type="text/css">
  .reply {
    resize: none;
    margin-left: 10%;
}
   button.reply {
    width: 12%;
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
  left: 100px;
} 
h2 {
  text-align: center;
  top: 20px;
}
</style>

<?php
echo "<br><br><br>";
// Print topic
function Print_Topic_Content($link, $sql) {
    $query = mysqli_query($link, $sql);
      $row = $query->fetch_assoc();
       if($query){
        echo "<h2>" .$row["topic_title"].'</h2><br><p>'
          . $row["topic_content"].'</p>';
      
        } else {
          echo  'Something went wrong.';

        }
} 
 
 //Reply function
function Reply($link, $sql_insert_topic) {
  ?>
<br><br><br><br><hr>
<form action="" method="POST">
<p  class="reply">Reply</p>
<textarea cols='43' rows='7' placeholder='Your reply' class="reply" name="reply_content" required></textarea>
<br>
<button type='submit' name='submit' class="reply">Reply</button>
</form>
<?php


 if (isset($_POST['submit']) && isset($_POST['reply_content']) != NULL ) {
// Insert the reply content
$last_id = mysqli_insert_id($link);
        $sql_insert_reply = "UPDATE  replies SET reply_content = '".$_POST['reply_content']. "' WHERE id = " .$last_id;
        $query_reply = mysqli_query($link, $sql_insert_reply);
        //Print out the reply
        $sql_select_reply = "SELECT reply_content FROM replies WHERE topic_name = '" .htmlspecialchars($_GET["TopicTitle"])." ' ";
        $query_print_reply = mysqli_query($link, $sql_select_reply) ;
       while($row_reply = mysqli_fetch_assoc($query_print_reply)) {
            echo $row_reply['reply_content'];
            echo "<br>";
                    } 
}
 else {
      echo "Please insert something in reply content.";
    }
}

    // See in what table the topic is it
    $sql = "Select topic_title, topic_content FROM topic2 WHERE topic_title = '" .htmlspecialchars($_GET["TopicTitle"])." ' ";
    $result = $link->query($sql);
     if($result->num_rows > 0) {
      Print_Topic_Content($link, $sql);

      //Insert the table name && id in replies table from an specified table
$sql_insert_topic = "INSERT INTO replies (topic_id, topic_name) 
                     SELECT  topic_id, topic_title FROM topic2
                     WHERE topic_title = '"  .htmlspecialchars($_GET["TopicTitle"])." ' ";
$query_insert_topic = mysqli_query($link, $sql_insert_topic);
       Reply($link, $sql_insert_topic);
    exit;
    }



    $sql = "Select topic_title, topic_content FROM topicstest WHERE topic_title = '" .htmlspecialchars($_GET["TopicTitle"])." ' ";
    $result = $link->query($sql);
     if($result->num_rows > 0) {
      Print_Topic_Content($link, $sql);
       //Insert the table name && id in replies table from an specified table
$sql_insert_topic = "INSERT INTO replies (topic_id, topic_name) 
                     SELECT  topic_id, topic_title FROM topicstest
                     WHERE topic_title = '"  .htmlspecialchars($_GET["TopicTitle"])." ' ";
$query_insert_topic = mysqli_query($link, $sql_insert_topic);
       Reply($link, $sql_insert_topic);
 

    }

    $sql = "Select topic_title, topic_content FROM topic1 WHERE topic_title = '" .htmlspecialchars($_GET["TopicTitle"])." ' ";
    $result = $link->query($sql);
     if($result->num_rows > 0) {
      Print_Topic_Content($link, $sql);
      //Chech if user press reply button
      if (isset($_POST['submit'])) {
       //Insert the table name && id in replies table from an specified table
$sql_insert_topic = "INSERT INTO replies (topic_id, topic_name) 
                     SELECT  topic_id, topic_title FROM topic1
                     WHERE topic_title = '"  .htmlspecialchars($_GET["TopicTitle"])." ' ";
$query_insert_topic = mysqli_query($link, $sql_insert_topic);
       Reply($link, $sql_insert_topic);
      exit;
    }
  } else {
    header("location: topic.php");
  }
  include_once'footer.php';
?>
