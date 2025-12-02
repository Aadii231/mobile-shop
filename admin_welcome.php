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

<a style="float:right;margin-top:50px;margin-right:10px;text-decoration:none;" class="btn btn-warning" href="logout.php"><b>Logout</b></a>
<h1 class="text text-capitalize text-center " style="color: black;font-family: cursive"><b>Admin welcome To The Application</b></h1>
<?php
 $query="SELECT * FROM `mobile_ad`";
$run= mysqli_query($con, $query);
if($run)
{
while($data= mysqli_fetch_assoc($run))
{
   
    
    ?>
<div style="display: flex;display: inline-block;background-color: #e0ac69;margin-left: 40px;margin-top: 20px;width: 17%;color: darkred;border: 1px solid darkkhaki;padding: 10px;box-shadow:12px whitesmoke ">
                
           
            <img style="display: inline-block; width:200px;height:200px;" src="<?php echo $data['pic']; ?>"><br>
           
            <p style="display: inline-block;">Company Name: <b><?php echo $data['company_name']; ?></b></p>
            <p style="display: inline-block;">Model: <b><?php echo $data['model']; ?></b></p><br>
            <p style="display: inline-block;">Sale Price:<b> <?php echo $data['sale_price']."Rs/Only"; ?></b></p><br>
            <p style="display: inline-block;">Color: <b><?php echo $data['color']; ?></b></p>
            <p style="display: inline-block;">Retail Price: <b><?php echo $data['retail_price']; ?></b></p><br>
               <p style="display: inline-block;">Detail: <b><?php echo $data['detail']; ?></b></p>
           
     
       </div>
             <?php 
}
}
 ?>

<?php
    include ("footer.php");

 
 ?>


