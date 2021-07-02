<?php
require_once ('database.php');
$db = new Database();
class UpdateData{
    public function displayRecordById($c){
        global $db;
        $sql = "SELECT * FROM `signup`  WHERE id='$c' ";
        $result = mysqli_query($db->connection,$sql);
        if($result->num_rows==1){
            $row = $result->fetch_assoc();    
            return $row;            
        }
    }
    public function updateRecord(){
        global $db;    
        $email = $_POST['email'];
        $editid = $_POST['hid']; 
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];  
        $phone = $_POST['phone'];  

        $sql = "UPDATE `signup` SET `email` = '$email', `firstname`='$fname', `lastname`='$lname',`phone`='$phone' WHERE `signup`.`id` = $editid ";
        $result_update = mysqli_query($db->connection,$sql);
        if($result_update){ 
            header("Location:profile.php?msg=updated");
            
        }
        else{ 
            echo "Not updated";
           
        }   
    }
}
?>