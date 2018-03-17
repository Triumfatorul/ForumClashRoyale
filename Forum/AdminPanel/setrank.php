<?php
  include_once 'header.php';
  include_once 'config.php';

  ?>
<h1> Set rank </h1>
    <p>Select id</p>
    <form action="update_rank.php" method="POST">
     <div>
        <input type="text" name="uid" placeholder="Id">
    </div>

<br>

<p>Select rank</p>
    <div>
        <select class="select" name = "ranks">
<?php

// Ranks din table rank
      $sql_rank = "Select rank_name from ranks";
      $result_rank = $link->query($sql_rank);

if ($result_rank->num_rows > 0) {
    // output data of each row
    while($row = $result_rank->fetch_assoc()) {
        foreach ($row as  $value) {
          echo "<option>".$value."</option>" ;
        }  
    }
  }
?>
        </select>
    </div>

 <br>

 <button type=submit name=submit>Submit</button>

 </form>

<?php
  include_once 'footer.php';
?>