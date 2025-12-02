<?php
session_start();
include("dbconnection.php");
$admin_id=$_SESSION["admin_id"];
if(isset($admin_id))
{

}
else{
    header("location:index.php");
    exit();
}
$id=$_GET['id'];
$run= mysqli_query($con, "DELETE FROM `mobile_ad` WHERE id='$id'");
if($run)
{
    alert("Mobile Delete Successfully");
   redirect_to("manage_mobile.php");
}
 else {
    alert("Error");    
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
