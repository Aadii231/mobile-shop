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
    ?>
<h1 class="text text-capitalize text-center " style="color: black;font-family: cursive"><b>Add New Mobile Ad</b></h1>
<div >
    <form method="post" class="display" enctype="multipart/form-data" style="width:680px;">
        <table align="center" style="margin-left:0px;">
<tr>
    <td> Enter Company Name:</td></tr><tr>
<td><input type="text" name="c_name" required autofocus="" placeholder="Please Enter Company Name"></td>
</tr>
<tr>
<td>Enter Model:</td></tr><tr>
<td><input type="text" name="model" required placeholder="Please Enter model"><td>
</tr>
<tr>
<td>Enter Color:</td></tr><tr>
<td><input type="text" name="color" required placeholder="Please Enter Color"></td>
</tr>
<tr>
<td>Enter Detail:</td></tr><tr>
    <td><input type="text" name="detail" required placeholder="Please Enter Mobile Details"></td>
</tr>
<tr>
    
<td>Enter Retail Price:</td></tr><tr>
<td><input type="number" name="r_price" required placeholder="Please Enter Retail Price"></td>
</tr>
<tr>
    
<td>Enter Sale Price:</td></tr><tr>
<td><input type="number" name="s_price" required placeholder="Please Enter Sale Price"></td>
</tr>
<tr>
    
<td>Select Mobile Picture:</td></tr><tr>
<td><input type="file" name="pic" required ></td>
</tr>
<tr>
    <td  align="center" ><input type="submit" value=" Add New Mobile Record" name="done" class="btn btn-success" style="margin-left: 70px"></td>
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
    $filename=$_FILES["pic"]["name"];
    $tempname=$_FILES["pic"]["tmp_name"];
    $folder="mobile_img/".$filename;
    move_uploaded_file($tempname,$folder);
    $run= mysqli_query($con, "INSERT INTO `mobile_ad`(`company_name`, `model`, `sale_price`, `color`, `retail_price`, `detail`, `pic`) 
    VALUES ('$c_name','$model','$s_price','$color','$r_price','$detail','$folder')");
    if($run)
    {
    alert("Successfully New Mobile is Added!");
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