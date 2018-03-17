<?php
class Schedule{
    private $my_result;
    private $conn;
    function __construct($connection){
        $this->conn = $connection;
    }
    function check_schedule($time){
        date_default_timezone_set('Asia/Kolkata');
        $today = date('Y-m-d H:i:s');
        if($time > $today){
            return false;
        }
        else{
            return true;
        }
    }
    function show_data(){
        $i = 0;
        $sql = "select * from posts ORDER BY id DESC";
        $result = $this->conn->query($sql);
        while($row = $result->fetch_assoc()){
           if($this->check_schedule($row['posted_on'])){
                $this->my_result['post'][$i] = $row['content'];
                $this->my_result['time'][$i] = $row['posted_on'];
                $i++;
           }     
        }
        return $this->my_result;
    }
    function insert_data($content,$time=""){
        $time = ($time=="")?(null):($time);
        $sql = "insert into posts values(null,?,?)";
        $stmt = $this->conn->stmt_init();
        if($stmt->prepare($sql)){
            $stmt->bind_param("ss",$content,$time);
            if($stmt->execute()){
                echo "<script>alert('success');</script>";
            }
        }

    }
}

?>