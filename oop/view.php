<?php
require_once ('database.php');
$db = new Database();
class ViewData
{
    public function viewData(){
        global $db;
        $sql = "SELECT `firstname`,`id`, `lastname`, `phone` FROM `signup`;";
        $result = $db->connection->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }
    public function loggedin_person_data(){
        global $db;
        $email = $_SESSION['email_signin'];
        $sql = "SELECT * FROM `signup` WHERE `email` = '$email' ";
        $result = mysqli_query($db->connection,$sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $loggedata = $row;

            }
            return $loggedata;
        }
        else{
            echo "Something is wrong";
        }
        if($result == true){
            echo "Login Success";
        }
    }
}
?>