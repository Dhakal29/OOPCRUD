<?php
require_once ('database.php');
$db = new Database();
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `signup` WHERE `id` = $id";
    $result = mysqli_query($db->connection,$sql);
    if($result){
        echo "Deleted Successfully";
        header("Location: profile.php");
    }
    else{
        die(mysqli_error($db));
    }
}
?>