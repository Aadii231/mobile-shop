<?php
session_start();
include("dbconnection.php");

$user_id=$_SESSION["user_id"];
if(isset($user_id))
{

}
else{
    header("location:index.php");
    exit();
}
$id=$_GET['id'];
$run= mysqli_query($con, "SELECT * FROM `add_to_cart` WHERE mobile_id='$id' AND customer_id='$user_id'");
$row= mysqli_num_rows($run);
if($row>=1)
{
        alert("Already this Mobile Add to Cart");
        redirect_to("user_welcome.php");
}
 else
{
$run1= mysqli_query($con, "INSERT INTO `add_to_cart`(`customer_id`, `mobile_id`) VALUES ('$user_id','$id')");
if($run1)
{
        alert("Successfully Add to Cart");
        redirect_to("user_welcome.php");
}
 else {
    alert("error");
}
}
?>
<?php
//to get js alert
function alert($text){
    echo "<script>alert(\"$text\");</script>";
}
//to go to locaton
function redirect_to($path){
    echo "<script>location=\"$path\";</script>";
}
?>



