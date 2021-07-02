<?php
require_once 'database.php';
$db = new Database();
if(isset($_POST["email"])){
    $email = $_POST["email"];
    $query = "SELECT * FROM `signup` WHERE `email` = '$email'";
    $result = mysqli_query($db->connection,$query);
    if(mysqli_num_rows($result)>0){
        echo "<span>Email Already Taken</span>";
    }
    else{
        echo "<span>Email available</span>";
    }
}

?>