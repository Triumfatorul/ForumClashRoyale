<?php  
include_once 'config.php';
      //Insert the table name && id in replies table from an specified table
$sql_insert_topic = "INSERT INTO replies (topic_id, topic_name) 
                     SELECT  topic_id, topic_title FROM topicstest
                     WHERE topic_title = '"  .htmlspecialchars($_GET["TopicTitle"])." ' ";
$query_insert_topic = mysqli_query($link, $sql_insert_topic);
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
    } else {
    	echo "Please insert something in reply content.";
    }







/*$sql = "Select topic_title, topic_content FROM topicstest WHERE topic_title = '" .htmlspecialchars($_GET["TopicTitle"])." ' ";
    $result = $link->query($sql);
     if($result->num_rows > 0) {
      Print_Topic_Content($link, $sql);
     Reply();
                 //Print out the reply
            $sql_select_reply = "SELECT reply_content FROM replies WHERE topic_name = '" .htmlspecialchars($_GET["TopicTitle"])." ' ";
            $query_print_reply = mysqli_query($link, $sql_select_reply) ;
           while($row_reply = mysqli_fetch_assoc($query_print_reply)) {
                echo $row_reply['reply_content'];
                echo "<br>";
              }
      //Insert the table name && id in replies table from an specified table
$sql_insert_topic = "INSERT INTO replies (topic_id, topic_name) 
                     SELECT  topic_id, topic_title FROM topicstest
                     WHERE topic_title = '"  .htmlspecialchars($_GET["TopicTitle"])." ' ";
$query_insert_topic = mysqli_query($link, $sql_insert_topic);
 if (isset($_POST['submit']) && isset($_POST['reply_content']) != NULL ) {
            // Insert the reply content
    $last_id = mysqli_insert_id($link);
        $trn_date = date("Y-m-d H:i:s");
            $sql_insert_reply = "UPDATE  replies SET reply_content = '".$_POST['reply_content']. "', reply_date = ".$trn_date."  WHERE id = " .$last_id;
            $query_reply = mysqli_query($link, $sql_insert_reply);
    } else {
      echo "Please insert something in reply content.";
    }*/

    ?>