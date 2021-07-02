
<?php
require_once ('database.php');
 $db = new Database();
class Operations{
    public function Store_Record(){
        global $db;
        if(isset($_POST['signup']) || (isset($_POST['addnew']))){
            if(isset($_POST['email']) && isset($_POST['psw']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phone'])){
                if(!empty($_POST['email']) && !empty($_POST['psw']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['phone']) ){  
                    $firstname = $db->check($_POST['firstname']);
                    $lastname = $db->check($_POST['lastname']);                  
                    $phone = $db->check($_POST['phone']);                  
                    $email = $db->check($_POST['email']);
                    $password = $db->check($_POST['psw']);
                    if($this->Check_Record($email)){
                        if($this->Insert_Record($firstname,$lastname,$phone,$email,$password)){
                            header("Location:index.php?signupcomplete=1");
                        
                        }                    
                        else{
                            return false;
                            echo "Not recorded";
                        }
                    }
                    else{
                        header("Location:index.php?signuperror=1");
                        echo "Email already taken";
                        
                    }
                }
            }
        }
    }
    public function SignIn_Function(){
        global $db;
        if(isset($_POST['signin'])){
            if(isset($_POST['email_signin']) && isset($_POST['psw_signin'])){
                if(!empty($_POST['email_signin']) && !empty($_POST['psw_signin'])){
                    $password_signin = $db->check($_REQUEST['psw_signin']);
                    $email_signin = $db->check($_REQUEST['email_signin']);                      
                    $signin_query = "SELECT * FROM `signup` WHERE `email` = '$email_signin' AND `password` = '$password_signin'";
                    $check_result = mysqli_query($db->connection,$signin_query);
                    $count = mysqli_num_rows($check_result);
                    echo "Count" . $count;
                    if($count == 1){
                        $_SESSION["email_signin"] = $email_signin;
                        $_SESSION["status"] = true;
                        $_SESSION["psw_signin"] = $password_signin;
                        echo "Matched";
                        header("Location:profile.php");
                    }
                    else{
                        echo "Not matched";
                        header("Location:index.php?signinerror=1");
                        
                    }
                                                              
                }
            }
        }        
    }
    function Insert_Record($a,$b,$c,$d,$e){
        global $db;        
        $sql = "INSERT INTO `signup` ( `Firstname`, `Lastname` , `Phone`, `email`, `password`) VALUES ( '$a', '$b','$c','$d','$e');";
        $result_signup = mysqli_query($db->connection,$sql);
        if($result_signup){ echo "success";return true;}
        else{ return false;}   
    }
     function Check_Record($a){
       global $db;
        $query = "SELECT * FROM `signup` WHERE `email`= '$a';";
        $check_result = mysqli_query($db->connection,$query);
        $count = mysqli_num_rows($check_result);
        if($count == 0){
            return true;            
        }
        else{
            return false;
            die("Email taken");
        }
    }
}
?>
