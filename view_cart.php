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

<h1 class="text text-capitalize text-center text-primary">View Cart Panel</h1>
<a href="user_welcome.php" class="btn btn-success" style="margin-left: 200px">Edit Cart</a>
<?php 
  $query="SELECT * FROM `add_to_cart` where customer_id='$user_id' ";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:80%;background-color: darkgrey" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightpink"><b>Cart Product List</b></caption>
          <tr >
       <th>S.No</th>
       <th>Product Name</th>
       <th>Product Price</th>
       <th>Product Detail</th>
       <th>Product Image</th>
       <th style="text-align:center">Action</th>
       </tr>
        <?php
        $i=1;
        while($data=mysqli_fetch_assoc($run))
        { 
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php  $mobile_id=$data['mobile_id']; 
                $run1= mysqli_query($con, "SELECT * FROM `mobile_ad` where id='$mobile_id' ");
                $data1= mysqli_fetch_assoc($run1);
                echo $data1['company_name'];
                ?></td>
                
                <td><?php echo $data1['sale_price']."/"."Rs"; ?></td>
                <td><?php echo $data1['detail']; ?></td>
                <td><img src="<?php echo $data1['pic']; ?>" width="100px" height="100px"></td>
                
               
                <td> <a href="buy_mobile.php?id=<?php echo $data['id'];?>" class="btn btn-primary">Buy Item </a></td>
             </tr>
        <?php
        }?>
        </table>
    <?php 
    }
	else
	{
		echo "<h1 class=heading>No Item is Found</h1>";
		
	}
    ?>
