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
$run= mysqli_query($con, "SELECT * FROM `mobile_ad` WHERE id='$id'");
$data= mysqli_fetch_assoc($run);
    ?>
<h1 class="text text-capitalize text-center " style="color: black;font-family: cursive"><b>Update Mobile Ad</b></h1>
<div >
    <form method="post" class="display" enctype="multipart/form-data" style="width:680px;">
        <table align="center" style="margin-left:0px;">
<tr>
    <td> Enter Company Name:</td></tr><tr>
<td><input type="text" name="c_name" value="<?php echo $data['company_name'];?>"></td>
</tr>
<tr>
<td>Enter Model:</td></tr><tr>
<td><input type="text" name="model" value="<?php echo $data['model'];?>"><td>
</tr>
<tr>
<td>Enter Color:</td></tr><tr>
<td><input type="text" name="color" value="<?php echo $data['color'];?>"></td>
</tr>
<tr>
<td>Enter Detail:</td></tr><tr>
    <td><input type="text" name="detail" value="<?php echo $data['detail'];?>"></td>
</tr>
<tr>
    
<td>Enter Retail Price:</td></tr><tr>
<td><input type="number" name="r_price" value="<?php echo $data['retail_price'];?>"></td>
</tr>
<tr>
    
<td>Enter Sale Price:</td></tr><tr>
<td><input type="number" name="s_price" value="<?php echo $data['sale_price'];?>"></td>
</tr>

<tr>
    <td  align="center" ><input type="submit" value=" Update Mobile Record" name="done" class="btn btn-success" style="margin-left: 70px"></td>
    </tr>
</table>
</div>
</form>
</div>
<?php
if(isset($_POST['done']))
{
    $c_name=$_POST['c_name'];
    $s_price=$_POST['s_price'];
    $detail=$_POST['detail'];
    $r_price=$_POST['r_price'];
    $color=$_POST['color'];
    $model=$_POST['model'];
    
    $run= mysqli_query($con, "UPDATE `mobile_ad` SET `company_name`='$c_name',`model`='$model',`sale_price`='$s_price',`color`='$color',`retail_price`='$r_price',`detail`='$detail' WHERE id='$id'");
    if($run)
    {
    alert("Successfully New Mobile is Updated!");
    redirect_to("manage_mobile.php");
    }
    else
    {
         alert("Failed");
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