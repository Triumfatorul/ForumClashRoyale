<?php
include_once 'config.php';
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
<link rel="stylesheet" type="text/css" href="style2.css">

<body>




<section class="all-chat">

<div class="senders">

     <?php
// Printeaza toti oamenii care ti-au dat mesaj
     $sql_senders = "SELECT DISTINCT Sender from Chat WHERE Reciver = '".htmlspecialchars($_SESSION['username'])."'";
     $result1 = $link->query($sql_senders);

if ($result1->num_rows > 0 ) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        echo "<a href='?Sender=".$row['Sender']."'><tr>".$row['Sender']."</tr></a> <br>"  ;  
    }
  }

// Printeaza toti oameni carora le-ai trimis mesaj
       $sql_recivers = "SELECT DISTINCT Reciver from Chat WHERE Sender = '".htmlspecialchars($_SESSION['username'])."'";
     $result_recivers = $link->query($sql_recivers);

if ($result1->num_rows > 0 ) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        echo "<a href='?Sender=".$row['Sender']."'>".$row['Sender']."</a> <br>"  ;  
    }
  }
     ?>
   <form method="POST">
    <input type="text" name="search_user" class="search_user" placeholder="New conversation">
    <button type="submit" class="search_user_button" name="submit-search">Search</button>
    </form>


<?php 
// Creare script search user pentru o noua conversatie
if (isset($_POST['submit-search'])) {
    $Search = mysqli_real_escape_string($link, $_POST['search_user']);
    $sql_new_conversation = "Select username FROM users WHERE username LIKE '%$Search%'";
    $result_player = $link->query($sql_new_conversation);
  

  if ($result_player->num_rows > 0 ) {
    while($row = $result_player->fetch_assoc()){
      echo "<a href='?Sender=".$row['username']."'><tr>".$row['username']."</tr></a> <br>";
    }
  } else{
    echo "There are no users with that name.";
  }
  }
?>
</div>

<div class="Message_sent">

  <form method="POST">
  <input type="text" name="Message:" id="Message" placeholder="Message:">
  <button type="submit" name="submit_send">Send</button>

</form>
  
</div>


<div class="chat-box">

<?php
//Verificare daca user-ul a selectat cu cine vorbeste
if (isset($_GET['Sender'])) {
  if ($_GET['Sender'] != NULL) {

  //Verificare daca user a bagat un mesaj si a dat click pe send
  if (isset($_POST['submit_send']) && $_POST['Message:'] != NULL) {
    // Trimitere mesaj
    $trn_date = date("Y-m-d H:i:s");
       $sql_send_msg = "INSERT INTO Chat (Reciver, Sender, Message)
    VALUES ('".$_GET['Sender']."', '".htmlspecialchars($_SESSION['username'])."', '".$_POST['Message:']."' )";
       $send_message = mysqli_query($link, $sql_send_msg);
    }

?>
   
 
 <?php    
     // Selectare  id mesaj primit
     $sql_select_id_recived = "SELECT  id from Chat WHERE Reciver = '".htmlspecialchars($_SESSION['username'])."' 
     && Sender = '".$_GET['Sender']."'";
    $result = $link->query($sql_select_id_recived);
        // Selectare   mesaj trimis
   $sql_select_id_sent = "SELECT  id from Chat WHERE Sender = '".htmlspecialchars($_SESSION['username'])."' 
     && Reciver = '".$_GET['Sender']."'";
    $result_msg_sent_id = $link->query($sql_select_id_sent);
    if ($result->num_rows > 0  || $result_msg_sent_id->num_rows > 0){
       $messages = array();
       $id_messages = array();
       $msg = array();
       $id_messages_sent = array();
       $msg_sent = array();
       $final_sent = array();

    if ($result->num_rows > 0) {
       
             // Selectare mesaj primit
             $sql_receive_msg = "SELECT  Message from Chat WHERE Reciver = '".htmlspecialchars($_SESSION['username'])."' 
             && Sender = '".$_GET['Sender']."'";
            $result_msg_receive = $link->query($sql_receive_msg);
              // Insereaza intr_un  array id(index) si msg(value) primite
         while($row_id_recived = $result->fetch_assoc()) {
          $string_row_id_received = implode('', $row_id_recived);
             while($row_msg_receive = $result_msg_receive->fetch_assoc()) {
              $string_row_msg_received = implode('', $row_msg_receive);
                     array_push($msg_sent, $string_row_msg_received);
                     array_push($id_messages_sent, $string_row_id_received);
                 $final1 = array_combine($id_messages_sent, $msg_sent);
                     array_push($msg, $string_row_msg_received);
                     array_push($id_messages, $string_row_id_received);
                 $final = array_combine($id_messages, $msg);
                break;
           
      }              
      }


}  


if ($result_msg_sent_id->num_rows > 0)

 // Selectare   mesaj trimis
   $sql_recive_msg_sent = "SELECT  Message from Chat WHERE Sender = '".htmlspecialchars($_SESSION['username'])."' 
     && Reciver = '".$_GET['Sender']."'";
    $result_msg_sent = $link->query($sql_recive_msg_sent);
if ($result_msg_sent->num_rows > 0 ) {



        
 // Insereaza intr_un  array id(index) si msg(value) trimise  
               while($row_id_sent = $result_msg_sent_id->fetch_assoc()) {
          $string_row_id_sent = implode('', $row_id_sent);
            
             while($row_msg_sent = $result_msg_sent->fetch_assoc()) {
              $string_row_msg_sent = implode('', $row_msg_sent);
                     array_push($msg_sent, $string_row_msg_sent);
                     array_push($id_messages_sent, $string_row_id_sent);
                 $final_sent = array_combine($id_messages_sent, $msg_sent);
                     array_push($msg, $string_row_msg_sent);
                     array_push($id_messages, $string_row_id_sent);
                 $final = array_combine($id_messages, $msg);
                break;
           
      }              
      }
         ksort($final);

 foreach($final as $x => $x_value) {
    if (in_array($x_value, $final_sent)) {
    echo  '<span class = "sent_msg">'.$x_value.'<span>';
    echo "<br><br>"; 
    }
    else {
    echo  '<span class = "rcv_msg">'.$x_value.'</span>';
    echo "<br><br>";
    }
   

}

          }
    }    
  }
}

 else {
   echo "Select a user";
}


  ?>

</div>
</section>
</body>