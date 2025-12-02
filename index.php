<?php
include("header.php");
include("dbconnection.php");
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
          
          
     
       </div>
             <?php 
}
}
 ?>
