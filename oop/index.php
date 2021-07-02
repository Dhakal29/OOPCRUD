<?php
session_start();
if(isset($_SESSION['status'])){
    header("Location:profile.php");
}
include 'operations.php';
$op = new Operations();
include 'emailcheck.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<title> OOP Sign IN </title>
<body>
    <div class="index_page">
        <div class="container">
            <h1 class="lg-heading">Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <?php 
            $op->Store_Record();
            ?>
            <div class="formsignup">
                <form  method="POST">
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">First Name</label>
                        <input type="text" class="form-control" placeholder="FirstName" name="firstname" required >
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Last Name</label>
                        <input type="text" class="form-control"  placeholder="LastName" name="lastname" required>
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                        <input type="tel" class="form-control"  placeholder="Mobile No." name="phone" required>
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" id="email" name="email" required >
                    </div>
                    <span id="availability"></span>
                    <div class="mb-1">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control"id="psw" placeholder="Enter Password" name="psw" required >
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputPassword1" class="form-label">Repeat Password</label>
                        <input type="password" class="form-control"  id="psw-repeat" placeholder="Repeat Password" name="psw-repeat" required>
                    </div>
                    <div id="psd_display"></div>
                    <button type="submit" name="signup" id="submission" style="font-size:smaller;">Sign Up</button>
                </form>
                <?php if(isset($_GET["signuperror"])==true){
                    echo "Email already taken";
                }
                ?>
            </div>
            <br> <br> <br>
            <h1 class="lg-heading"> Sign In </h1>
                <?php $op->SignIn_Function();?>
            <div class="formsignin">
                <form method="POST">
                    <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" id="email" name="email_signin" required >
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control"id="psw" placeholder="Enter Password" name="psw_signin" required >
                    </div>
                    <button type="submit" name="signin" style="font-size:smaller;">Sign In</button>
                </form>
                <?php if(isset($_GET["signinerror"])==true){
                    echo "invalid Email or password";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript" src="js/script.js"></script>
