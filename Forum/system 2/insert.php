<?php 
require "connection/connection.php";
require "class/main.class.php";
$obj = new Schedule($conn);
?>
<!doctype html>
<html>
<head>
<title>POST-Schedule System</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>
<div id="area">
<form method="POST" action="insert.php">
<fieldset>
<legend>Insert a new post</legend>
<textarea name="content" style="width:98%;height:300px;" placeholder="Enter your post..."></textarea>
<label>Schedule your post</label><br />
<input type="datetime-local" name="scheduleddate" value="<?php echo date('Y-m-d').'T'.date('H:i'); ?>"/><br /><br />
<input type="submit" name="post" value="publish" />

</fieldset>

</form>

</div>
</body>

</html>
<?php
if(isset($_POST['post'])){
    $content = $_POST['content'];
    $time = $_POST['scheduleddate'];
    $time = str_replace("T"," ",$time);
    $time = $time.":00";
    $obj->insert_data($content,$time);
}
?>