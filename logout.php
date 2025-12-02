<?php 
session_start();
$user_id=$_SESSION["user_id"];

$admin_id=$_SESSION["admin_id"];
if((isset($user_id)) OR (isset($admin_id)))
{
   session_destroy();
   header("location:index.php");
}
else{
    header("location:index.php");
    exit();
}

 ?>
