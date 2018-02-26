<?php
  include_once'header.php';
   include_once'config.php';
?>


<style type="text/css">
  .Mod_buttons {
    position: fixed;
    left: 80%;
    top: 45px;
  }
  .Mod_buttons #Warn  {
    width: 150px;
    margin:5px;
    border: none;
    color: black;
    background-color: #ff0000;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  }
  .Mod_buttons #Ch_user  {
    width: 150px;
    margin:5px;
    border: none;
    color: black;
    background-color: #ffff00;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  }
  .Mod_buttons #Susp_topic {
    width: 150px;
    margin:5px;
    border: none;
    color: black;
    background-color: #0000ff;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  }
  .Mod_buttons #Ban  {
    width: 150px;
    margin:5px;
    border: none;
    color: black;
    background-color: #00ff00;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  }
  .Mod_buttons #Mute {
    width: 150px;
    margin:5px;
    border: none;
    color: black;
    background-color: #ff0000;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
  }
</style>

<h1><?php echo htmlspecialchars($_GET["username"])?>'s profile</h1>

  
<?php

  
    $sql = "Select username, user_level FROM users WHERE username = '" .htmlspecialchars($_GET["username"])." ' ";
 $query = mysqli_query($link, $sql);
  $row = $query->fetch_assoc();

  echo "<br>";    


       if($query){
        echo 'Username: ' . $row["username"]. '<br>', 
         'Rank: ' . $row["user_level"];
        } else {
          echo  'Something went wrong.';
        }

        ?>
<div class="Mod_buttons">
  <button type="submit" name="submit_warn" onclick="Warn()" id="Warn">Warn 1/3</button><br>
  <button type="submit" name="submit_ch_username" id="Ch_user">Change username</button><br>
  <button type="submit" name="submit_suspend" id="Susp_topic">Suspend topic post</button><br>
  <button type="submit" name="submit_ban" id="Ban">Ban</button><br>
  <button type="submit" name="submit_mute " id="Mute">Mute</button><br>
</div>
<P id="demo"></P>
<script type="text/javascript">
  function Warn() {
     var txt;
    var name = prompt("The new name is:", "");
    if (name == null || name == "") {
        txt = "User cancelled the prompt.";
    } else {
        txt = "The new name is: " + name + "!";
    }
    document.getElementById("demo").innerHTML = txt;
}
</script>


<?php
  include_once'footer.php';
?>