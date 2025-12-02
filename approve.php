<?php
session_start();
include("dbconnection.php");
include("admin_header.php");
$admin_id=$_SESSION["admin_id"];
if(isset($admin_id))
{

}
else{
    header("location:index.php");
    exit();
}
$id=$_GET['id'];
$run= mysqli_query($con, "UPDATE `customer` SET `status`='Approve' WHERE id='$id'");
if($run)
{
   
    alert("Approve User request successfully");
    redirect_to("manage_user.php");
}
    ?>
    <?php
function alert($text)
{
    echo"<script>alert(\"$text\");</script>";
}
function redirect_to($path)
{
    echo"<script>location=\"$path\";</script>";
}
?>