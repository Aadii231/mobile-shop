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
$run= mysqli_query($con, "SELECT * FROM `add_to_cart` WHERE id='$id'");
$data= mysqli_fetch_assoc($run);
$mobile_id=$data['mobile_id'];
$run1= mysqli_query($con, "SELECT * FROM `mobile_ad` WHERE id='$mobile_id'");
$data1= mysqli_fetch_assoc($run1);
$run2= mysqli_query($con, "SELECT * FROM `customer` WHERE id='$user_id'");
$data2= mysqli_fetch_assoc($run2);
$reviever_name=$data2['name'];
$receiver_contact=$data2['contact'];
$reciever_address=$data2['address'];
$mobile_model=$data1['model'];
$mobile_company=$data1['company_name'];
$amount=$data1['sale_price'];
    ?>

<h1 class="text text-capitalize text-center text-primary">Delivery Reciever Info</h1>

<form method="post" class="display">
        <table align="center" style="margin-left:0px;">
<tr>
    <td> Enter Delivery Charges:</td></tr><tr>
<td><input type="text" name="charges" required autofocus="" placeholder="Enter Delivery Charges"></td>
</tr>
<tr>
    <td> Select Delivery Date:</td></tr><tr>
<td><input type="date" name="date" required autofocus=""></td>
</tr>

<tr>
    <td  align="center" ><input type="submit" value=" Save Info" name="done" class="btn btn-success" style="margin-left: 70px"></td>
    </tr>
</table>
</div>
</form>

<?php

if(isset($_POST['done']))
{
$charges=$_POST['charges'];
$date=$_POST['date'];
$total_charges=$charges+$amount;


    
    $run=mysqli_query($con,"INSERT INTO `delivery_info`(`reciever_name`, `reciever_contact`, `address`, `amount`, `mobile_company`, `mobile_model`, `date`) 
    VALUES ('$reviever_name','$receiver_contact','$reciever_address','$total_charges','$mobile_company','$mobile_model','$date')");

if($run)
{
    $run1=mysqli_query($con,"INSERT INTO `sold_mobile`(`mobile_id`, `date`) 
    VALUES ('$mobile_id','$date')");
    
    $run2=mysqli_query($con,"DELETE FROM `add_to_cart` WHERE id=$id");
    if(($run1) AND ($run2))
    {
alert("info added Successfully!");
redirect_to("user_welcome.php");
    }
}

else
{
alert("Failed");
}

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
   