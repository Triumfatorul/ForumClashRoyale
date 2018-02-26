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


<form method="POST">
	<input type="text" name="To:" placeholder="To:">
	<input type="text" name="Message:" placeholder="Message:">
	<button type="submit" name="submit_send">Send</button>

</form>

<?php
// Trimitere mesaj
   $sql_send_msg = "INSERT INTO Chat (Reciver, Sender, Message)
VALUES ('".$_POST['To:']."', '".htmlspecialchars($_SESSION['username'])."', '".$_POST['Message:']."' )";
   $send_message = mysqli_query($link, $sql_send_msg);
 
 
 // Printare mesaj
 $sql_recive_msg = "SELECT Sender, Message from Chat WHERE Reciver = '".htmlspecialchars($_SESSION['username'])."'";
$result = $link->query($sql_recive_msg);

if ($result->num_rows > 0 ) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<p>Recived<p>";
        echo "From:".$row['Sender']."<p>".$row['Message']."</p></a> <br>"  ;  
    }

} else {
    echo "0 results";
}
?>