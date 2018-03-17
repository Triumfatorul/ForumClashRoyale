<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	            <style type="text/css">
  nav {
    position: fixed;
    top: 0px;
    left: 0px;
    bottom: 0px;
    width : 125px;
    background-color: #F0F0E2;
    transition: all ease-in-out 200ms;
  }
  nav div {
    position: fixed;
    top: 5px;
    left: 30px;

  }
  #search {
  	width: 80px;
  	left: 0px;
  }
</style>
	<title>Forum</title>
</head>
<body>
		<nav class="main" id="closenav">
		   <div>
		   	<button  onclick="toggleNav()">Menu</button><br><br>
		   </div>
		    <ul>
		    	<br><br><li><a href="logout.php">Log out</a></li>
		        <li><a href="index.php">Home</a></li>
		        <li><a href="profile.php">My profile</a></li>
		        <li><a href="post-topicscript.php">Add topic</a></li>
		       <?php
      
           if ($_SESSION['admin_1'] == true) {
           echo "<li><a href='AdminPanel/index.php'>Admin Panel</a></li>";
		        }
            ?>

            <li><a href="TestChat.php?Sender">Chat</a></li>
		   
              <form action="search.php" method="POST">
  <input type="text" name="search" placeholder="Search" id="search"> <br>
  <button type="submit" name="submit-search">Search</button>
</form>
		    </ul>	
	    </nav>    	
   
    <script>
  var  navStatus = true;
  function toggleNav() {
    if (navStatus == true) {
      document.getElementById("closenav").style.left = "-300px";
      navStatus = false;
    }
    else if (navStatus == false) {
      document.getElementById("closenav").style.left = "0px";
      navStatus = true; 
    }
  }
</script>


    <?php /*switch ($_POST['Cat']) {
        case $_POST['Cat']=1:
            $query = "INSERT into topic1 topic_title= '$topic_title', topic_content= '$topic_content',  topic_date= '$trn_date', topic_owner= '".htmlspecialchars($_SESSION['username'])."' ";
                 break;
        case $_POST['Cat']=2:
            $query = "INSERT into topicstest topic_title='$topic_title', topic_content='$topic_content', topic_date='$trn_date', topic_owner= '".htmlspecialchars($_SESSION['username'])."  ' ";
                 break;
        case $_POST['Cat']=3:
             $query = "INSERT INTO topic2 topic_title='$topic_title', topic_content='$topic_content', topic_date='$trn_date', topic_owner='".htmlspecialchars($_SESSION['username'])."' ";
                 break;
        default:
            echo "Please select a category." ;
            break;--  */
            ?>


