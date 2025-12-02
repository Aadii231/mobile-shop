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
if(isset($_POST['done']))
{      
$charges=$_POST['amount'];
$saccount=$_POST['saccount']; 
$raccount=$_POST['raccount'];
$date=$_POST['date'];
$bname=$_POST['bname'];
  
    $run=mysqli_query($con,"INSERT INTO `payment`(`user_id`, `mobile_id`, `s_account`, `r_account`, `amount`, `bank`, `date`)
     VALUES ('$user_id','$mobile_id','$saccount','$raccount','$amount','$bname','$date')");
if($run)
{
    $run1=mysqli_query($con,"INSERT INTO `sold_mobile`(`mobile_id`, `date`) 
    VALUES ('$mobile_id','$date')");
    
    $run2=mysqli_query($con,"DELETE FROM `add_to_cart` WHERE id=$id");
    if(($run1) AND ($run2))
    {
alert("User Do Payment!");
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

<h1 class="text text-capitalize text-center " style="color: black;font-family: cursive"><b>Payment</b></h1>
<div style="margin-left:0px;width:1250px;">
    <form method="post" class="display">
        <table align="center" style="margin-left:0px;">


<tr>
<td>Enter Bank Name:</td></tr><tr>
<td><input type="text" name="bname" required placeholder="Please Enter Bank Name"><td>
</tr>
<tr>
<td>Enter Sender Account:</td></tr><tr>
<td><input type="number" name="saccount" required></td>
</tr>
<tr>
<td>Enter Receiver Account:</td></tr><tr>
    <td><input type="number" name="raccount" required></td>
</tr>

<tr>
    
<td>Select Date:</td></tr><tr>
<td><input type="date" name="date" required></td>
</tr>
<tr>
    
<td>Enter Amount:</td></tr><tr>
<td><input type="number" name="amount" value="<?php echo $amount;?>"></td>
</tr>
<tr>
    <td  align="center" ><input type="submit" value="Payment" name="done" class="btn btn-success" style="margin-left: 70px"></td>
    </tr>
</table>
</div>
</form>
</div>
<br>
<?php
include ("footer.php");
?>