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
            <option value="Admin">Admin</option>
            <option value="Leader">Leader</option>
            <option value="Moderator">Moderator</option>
            <option value="Member">Member</option>
        </select>
    </div>

 <br>

 <button type=submit name=submit>Submit</button>

 </form>

<?php
  include_once 'footer.php';
?>