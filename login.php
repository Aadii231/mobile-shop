<?php
include("header.php");
include("dbconnection.php"); 
error_reporting(0);
session_start();
if(isset($_SESSION['user_id']))
{
    header("location:user_welcome.php");
    exit();
}
if(isset($_SESSION['admin_id']))
{
    header("location:admin_welcome.php");
    exit();
}

?>

<h1 class="text text-center " style="font-size:40px;margin-top:20px;color:black;font-family: cursive"> Login </h1>
<br>
<form method="post" class="display">
    <div style="padding-right:930px;margin-top: 10px" >
    <table align="center"  style="margin-left:70px">
    <tr><td>Enter Email ID:</td></tr><tr>
        <td><input type="email" name="email" required placeholder=" enetr email" style="margin-bottom: 20px" ></td></tr>
    <tr><td>Enter Password:</td></tr><tr></tr><td>
        <input type="password" name="pass" required placeholder="Please Enter Your Password"  style="margin-bottom: 20px" ></td></tr>
    <tr><td>Login As:</td></trr><tr>
    <td>
        <select name="type" ><option value="User">User</option>
    <option value="Admin">Admin</option>
 </select></td>
</tr>
    <tr></tr><tr>
    <td style="padding-left: 90px" colspan="2"><input type="submit" name="login" value="Sign in"  >
       
    </td></tr>
</table>
    </div>
</form>
</body>
</html>
<?php 
$username=0;
$email=0;
if(isset($_POST["login"]))
{
    $email=$_POST["email"];
    $pass=$_POST["pass"];
   
    $type=$_POST["type"];
    if($type=="User")
    {
    $query="SELECT * FROM `customer` WHERE email='$email' AND password='$pass' AND status='Approve'";
    $run=mysqli_query($con,$query);
    $row=mysqli_num_rows($run);
    
if($row>0)
    {
        $data=mysqli_fetch_assoc($run);
        echo $id=$data['id'];
        echo $_SESSION['user_id']=$id;
       
        redirect_to("user_welcome.php");
       
		}
    
else
{
    alert("email or password is not correct");
}
    }
        if($type=="Admin")
    {
    $query1="SELECT * FROM `admin` WHERE email='$email' AND password='$pass';";
    $run1=mysqli_query($con,$query1);
    $row1=mysqli_num_rows($run1);
   
    if($row1<0)
    {

        alert("Email and Password is not Correct");
        

    }
    else
    {
        $data1=mysqli_fetch_assoc($run1);
        $id1=$data1['id'];
        $_SESSION['admin_id']=$id1;
       
        redirect_to("admin_welcome.php");
                        
		}
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