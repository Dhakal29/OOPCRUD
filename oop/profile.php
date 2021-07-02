<?php
require_once 'view.php';
require_once 'update.php';
require_once 'operations.php';
$op = new Operations();
$update = new UpdateData();
$view = new ViewData(); 
 session_start();
if($_SESSION["status"] != true){
    header("Location: index.php");
} 
if(isset($_POST["update"])){
    $update->updateRecord($_POST);
}
if(isset($_POST["addnew"])){
    $op->Store_Record($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css?v= <?php echo time(); ?>"> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profile</title>
</head>
<body>

    <div class = "profile_page">
        <div class = "container">
            <h1 style="text-align:center;"> Profile </h1>
            <?php 
                if(isset($_GET['msg']) AND $_GET['msg'] == 'updated'){
                    echo '<div class="updatemsg"><h1>Updated Successfully</h1></div>';
                }
            ?>
            <div class="logged_in_person">
                <?php echo $_SESSION["email_signin"];
                $loggedata= $view -> loggedin_person_data();                 
                ?>
                <h1> Hello</h1><h2><?php echo $loggedata['Firstname'];?> <?php echo $loggedata['Lastname']; ?></h2>         
               <a href="logout.php"><button type="submit" name="logout" value="logout" >Logout</button></a>
            </div>
            <p class="paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam quibusdam, tempore labore debitis maxime est reiciendis.
                Doloremque tempore harum, corrupti dolore corporis,Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, iusto! perspiciatis delectus nesciunt molestias assumenda ut minus cumque.</p>
            <?php 
            if(isset($_GET['editid'])){
                $editid = $_GET['editid'];
                $displayResult = ($update->displayRecordById($editid));
                ?>
            <form class="formsignin" method="POST">
                <div class="add_or_update"><h1>Update</h1></div>
                <div class="mb-1">
                    <input type="hidden" name="hid" value="<?php echo $displayResult['id'];?>">
                </div>
                <div class="mb-1">
                    <input type="text " placeholder="FirstName" name="firstname" value="<?php echo $displayResult['Firstname']; ?>"/>
                </div>
                <div class="mb-1">
                    <input type="text " placeholder="LastName" name="lastname" value="<?php echo $displayResult['Lastname']; ?>" required/>                    
                </div>
                <div class="mb-1">
                    <input type="tel " placeholder="Mobile No." name="phone" value="<?php echo $displayResult['Phone']; ?>" required/>
                </div>
                <div class="mb-1">
                    <input type="text" name="email" value= "<?php echo $displayResult['email']; ?>">

                </div>
                <button type="submit" name="update" >Update</button>
            </form>
                <?php }else{
                ?>
            <form class="formsignup" method="POST">
            <div class="add_or_update"><h1>Add</h1></div>
                <input type="hidden" value="">
                <input type="text " placeholder="FirstName" name="firstname" required/>
                <input type="text " placeholder="LastName" name="lastname" required/>                    
                <input type="tel " placeholder="Mobile No." name="phone" required/>
                <input type="email" placeholder="Enter Email" id="email" name="email" required />
               
                <input type="password" id="psw" placeholder="Enter Password" name="psw" required />    
                <input type="password" id="psw-repeat" placeholder="Repeat Password" name="psw-repeat" required/>
           
                <button type="submit" name="addnew" >Add</button>
            </form>
            <?php 
            }?>
            <div class= "users">

                <?php $data = $view -> viewData(); $sno = 1;
                foreach ($data as $value){                    
                ?>
                <div class="table">
                    <div class="table-item"> 
                        <h1><?php echo "<br>" .$sno ++?>
                        <?php echo "" . $value['firstname']; ?>
                        <?php echo "" . $value['lastname']; ?> </h1> 
                    </div>   
                    <div class="phonenum"><p><?php echo "Phone:-" .$value['phone']; ?></p></div>    
                    <div class="add_del_btn">
                        <a class="btn btn-outline-success" href="profile.php?editid=<?php echo $value['id'];?>">Edit</a>
                        <a class="btn btn-outline-warning" href="delete.php?deleteid=<?php echo $value['id'];?>">Delete</a> 
                    </div>              
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>


