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



// Denfine the function for the space where you insert the reply
?>
<br><br>
 <form method="POST">
   <textarea rows="7" cols="43" name="reply_content" required placeholder="Insert your reply"></textarea> 
   <br>
   <button type="submit" name="submit" class="submit">Submit</button>
 </form>
  <?php
  echo htmlspecialchars($_SESSION['username']);

if (isset($_POST['submit'])) {
            // See  in what table the topic is
        $sql_sel_topic1 = "SELECT topic_title, topic_id FROM topic1 WHERE topic_title = '".$_GET['Topic']."' ";
        $result_sel_topic1 = mysqli_query($link, $sql_sel_topic1);
        $sql_sel_topic2 = "SELECT topic_title, topic_id FROM topic2 WHERE topic_title = '".$_GET['Topic']."' ";
        $result_sel_topic2 = mysqli_query($link, $sql_sel_topic2);
        $sql_sel_topicstest = "SELECT topic_title, topic_id FROM topicstest WHERE topic_title = '".$_GET['Topic']."' ";
        $result_sel_topicstest = mysqli_query($link, $sql_sel_topicstest);
          
          if ($result_sel_topic1->num_rows > 0) {
             $rows = $result_sel_topic1->fetch_assoc();
             foreach ($rows as $k => $v) {
                    // Insert the topic name and id 
                    if ($k == 'topic_title') {
                        $query = "INSERT into replies (topic_name)
                       VALUES ('".$v."')";
                        $query_insert_topic_title = mysqli_query($link, $query);
                        $last_id = mysqli_insert_id($link);
                    } else {
                        $query_id = "UPDATE replies set topic_id = '".$v."' WHERE id =".$last_id."";
                        $query_insert_topic_id = mysqli_query($link, $query_id);

                    }   
               }
  
                    $query_content = "UPDATE replies SET reply_content  = '".$_POST['reply_content']."', reply_by = '".htmlspecialchars($_SESSION['username']) 
."' WHERE id =".$last_id."";
                  $query_insert_content = mysqli_query($link, $query_content);
             
               


         }    elseif ($result_sel_topic2->num_rows > 0) {
                 $rows = $result_sel_topic2->fetch_assoc();
        foreach ($rows as $k => $v) {
                    // Insert the topic name and id 
                    if ($k == 'topic_title') {
                        $query = "INSERT into replies (topic_name)
                       VALUES ('".$v."')";
                        $query_insert_topic_title = mysqli_query($link, $query);
                        $last_id = mysqli_insert_id($link);
                    } else {
                        $query_id = "UPDATE replies set topic_id = '".$v."' WHERE id =".$last_id."";
                        $query_insert_topic_id = mysqli_query($link, $query_id);

                    }   
               }
  
                     $query_content = "UPDATE replies SET reply_content  = '".$_POST['reply_content']."', reply_by = '".htmlspecialchars($_SESSION['username']) 
."' WHERE id =".$last_id."";
                  $query_insert_content = mysqli_query($link, $query_content);

              } elseif ($result_sel_topicstest->num_rows > 0) {



                  $rows = $result_sel_topicstest->fetch_assoc();
                 foreach ($rows as $k => $v) {
                    // Insert the topic name and id 
                    if ($k == 'topic_title') {
                        $query = "INSERT into replies (topic_name)
                       VALUES ('".$v."')";
                        $query_insert_topic_title = mysqli_query($link, $query);
                        $last_id = mysqli_insert_id($link);
                    } else {
                        $query_id = "UPDATE replies set topic_id = '".$v."' WHERE id =".$last_id."";
                        $query_insert_topic_id = mysqli_query($link, $query_id);

                    }   
               }
                   

                  $query_content = "UPDATE replies SET reply_content  = '".$_POST['reply_content']."', reply_by = '".htmlspecialchars($_SESSION['username']) 
."' WHERE id =".$last_id."";
                  $query_insert_content = mysqli_query($link, $query_content);
            
                  



          }
      }
    


    ?>