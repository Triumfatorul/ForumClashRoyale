<?php
  include_once'header.php';
   include_once'config.php';

?>





<h1>Search page</h1>


<?php
  if (isset($_POST['submit-search'])) {
  	$Search = mysqli_real_escape_string($link, $_POST['search']);
    $sql = "Select username FROM users WHERE username LIKE '%$Search%'";
    $query = mysqli_query($link, $sql);
    $query_result = mysqli_num_rows($query);
  

  if ($query_result > 0) {
  	while($row = mysqli_fetch_assoc($query)){
  		echo "<a href='users.php?username=".$row['username']."'><p>".$row['username']. "</p></a>";
  	}
  } else{
  	echo "There are no users with that name.";
  }
  }

?>

<?php
  include_once'footer.php';
?>