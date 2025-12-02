<?php
include("header.php");
include("dbconnection.php");
if(isset($_POST['done']))
{
$name=$_POST['name'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$password=$_POST['pass'];


    
    $run=mysqli_query($con,"INSERT INTO `customer`(`name`, `email`, `address`, `contact`, `status`, `password`) 
    VALUES ('$name','$email','$address','$contact','Pending','$password')");

if($run)
{
alert("Customer Successfully Register!");
redirect_to("index.php");
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
<h1 class="text " style="margin-top: 30px;margin-left:470px;color: black;font-size: 35px;font-family: cursive"> Registration/Signup</h1>
<br>
<br>
<div style="margin-left:0px;width:1250px;">
    <form method="post" class="display">
        <table align="center" style="margin-left:0px;">
<tr>
    <td> Enter Name:</td></tr><tr>
<td><input type="text" name="name" required autofocus="" placeholder="Please Enter Name"></td>
</tr>
<tr>
<td>Enter Address:</td></tr><tr>
<td><input type="text" name="address" required placeholder="Please Enter your  Address"><td>
</tr>
<tr>
<td>Enter Email:</td></tr><tr>
<td><input type="email" name="email" required placeholder="Please Enter Email"></td>
</tr>
<tr>
<td>Enter Contact:</td></tr><tr>
    <td><input type="number" name="contact" required placeholder="Please Enter Contact No"></td>
</tr>
<tr>
    
<td>Enter Password:</td></tr><tr>
<td><input type="password" name="pass" required placeholder="Please Enter your Password"></td>

<tr>
    <td  align="center" ><input type="submit" value=" Register" name="done" class="btn btn-success" style="margin-left: 70px"></td>
    </tr>
</table>
</div>
</form>
</div>
<br>
<?php
include ("footer.php");
?>


