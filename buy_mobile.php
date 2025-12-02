<?php
session_start();
include("dbconnection.php");
include("user_header.php");
$user_id=$_SESSION["user_id"];
if(isset($user_id))
{

}
else{
    header("location:index.php");
    exit();
}
$id=$_GET['id'];
    ?>

<h1 class="text text-capitalize text-center text-primary">Choose Payment method</h1>
<div style="margin-left:350px;margin-top:200px">
<a href="delivery.php?id=<?php echo $id;?>" class="btn btn-warning">Cash On Delivery</a>
<a href="credit_card.php?id=<?php echo $id;?>" class="btn btn-warning" style="margin-left:150px;">Credit Card</a>
</div>