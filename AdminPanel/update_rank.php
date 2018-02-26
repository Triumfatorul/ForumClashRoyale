<?php
  include_once 'config.php';
 

 $rank = $_POST["ranks"]; 
 $selected_uid = $_POST["uid"];
 $update_rank = "Update users set user_level = '"  .$rank.  
 "' WHERE id = "  .$selected_uid;

 $query = mysqli_query($link, $update_rank);


            if($query){

                header("location: index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }



?>