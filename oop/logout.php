<?php
session_start();
session_unset(); 
unset($_SESSION["id"]);
unset($_SESSION["email"]);
unset($_SESSION["password"]);
header("Location: index.php"); 

?>