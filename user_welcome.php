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
    ?>

<a style="float:right;margin-top:50px;margin-right:20px;text-decoration:none;" class="btn btn-danger" href="logout.php"><b>Logout</b></a>
<h1 class="text text-capitalize text-center " style="color: black;font-family: cursive"><b>User welcome To The Application</b></h1>
<form method="post" class="display">
    <div style="padding-right:930px;margin-top: 10px" >
   
<table align="center"  style="margin-left:70px">
<tr>
    <td>
        Search :
</td>
<td>
    <input type="text" name="search" placeholder="Enter key word for search" autofocus style="margin-bottom: 20px;width:300px;">
</td>
</tr>
<tr>
<td>

<input type="submit" name="done" value="Search">
</td>

</tr>
</table>
    </div>
</form>
<?php
if(isset($_POST['done']))
{
$search=$_POST['search'];


 $query1="SELECT * FROM `mobile_ad` where company_name LIKE '%$search%' OR sale_price LIKE '%$search%' OR model LIKE '%$search%' OR color LIKE '%$search%'";
$run1= mysqli_query($con, $query1);
if($run1)
{
while($data1= mysqli_fetch_assoc($run1))
{
     ?>
<div style="display: flex;display: inline-block;background-color:palevioletred;margin-left: 40px;margin-top: 20px;width: 17%;color: darkred;border: 1px solid darkkhaki;padding: 10px;box-shadow:12px whitesmoke ">
<img style="display: inline-block;" src="<?php echo $data1['pic'] ; ?>" width="150px" height="150px" >
            <p style="display: inline-block;">Name: <b><?php echo $data1['company_name']; ?></b></p><br>
            
            <p style="display: inline-block;">Price:<b> <?php echo $data1['sale_price']; ?></b></p><br>
           <p style="display: inline-block;">Detail:<b> <?php echo $data1['detail']; ?></b></p><br>
           <p style="display: inline-block;">Color:<b> <?php echo $data1['color']; ?></b></p><br>
            <p style="display: inline-block;">Model:<b> <?php echo $data1['model']; ?></b></p><br>
          
          <a href="add_to_cart.php?id=<?php echo $data1['id'];?>" class="btn btn-primary">Add To Cart </a>
          <a href="view_review.php?id=<?php echo $data1['id'];?>" class="btn btn-primary">Review </a>
          
       
       </div>
             <?php 
}
}
}
 ?>
 <br>
 <h1 class="text text-center">All Available Mobiles</h1>
<?php
 $query="SELECT * FROM `mobile_ad` ";
$run= mysqli_query($con, $query);
if($run)
{
while($data= mysqli_fetch_assoc($run))
{
    
    ?>
<div style="display: flex;display: inline-block;background-color:palevioletred;margin-left: 40px;margin-top: 20px;width: 17%;color: darkred;border: 1px solid darkkhaki;padding: 10px;box-shadow:12px whitesmoke ">
                
          
           
    <img style="display: inline-block;" src="<?php echo $data['pic'] ; ?>" width="150px" height="150px" >
            <p style="display: inline-block;">Name: <b><?php echo $data['company_name']; ?></b></p><br>
            
            <p style="display: inline-block;">Price:<b> <?php echo $data['sale_price']; ?></b></p><br>
           <p style="display: inline-block;">Detail:<b> <?php echo $data['detail']; ?></b></p><br>
           <p style="display: inline-block;">Color:<b> <?php echo $data['color']; ?></b></p><br>
            <p style="display: inline-block;">Model:<b> <?php echo $data['model']; ?></b></p><br>
          
          <a href="add_to_cart.php?id=<?php echo $data['id'];?>" class="btn btn-primary">Add To Cart </a>
          <a href="view_review.php?id=<?php echo $data['id'];?>" class="btn btn-primary">Review </a>
     
       </div>
             <?php 
}
}
 ?>
