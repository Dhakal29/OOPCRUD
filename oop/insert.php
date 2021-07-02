<?php
include 'database.php';
// $db = new Database();
class Insert extends Database{
     public function __construct(){
       echo "Constructor called";
        parent::__construct();
    }
    public function signup(){       
      if(isset($_POST["sobmit"]) AND trim($_POST["sobmit"]) != "")
      {    
         $email = $_POST['email'];
         $password = $_POST['psw'];
         $sql = "INSERT INTO `signup` (`id`, `email`, `password`) VALUES (NULL, '$email', '$password');";
         $result_signup = mysqli_query($conn,$sql);
         if($result_signup){echo "account created";}
         else{ echo "Not created";}
      }
    }
}
?>
   