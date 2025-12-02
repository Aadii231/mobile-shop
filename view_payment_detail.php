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

<h1 class="text text-capitalize text-center text-primary">View Payment Record</h1>
<?php 
  $query="SELECT * FROM `payment`  ";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:80%;background-color: darkgrey" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightpink"><b>Detail</b></caption>
          <tr >
       <th>S.No</th>
       <th>Mobile Name</th>
       <th>Mobile Price</th>
       <th>Mobile Detail</th>
       <th>Mobile Image</th>
       <th>User Name</th>
       <th>Address</th>
       <th>contact</th>
       <th>Sender Account</th>
       <th>Reciever Account</th>
       <th>Bank</th>
       </tr>
        <?php
        $i=1;
        while($data=mysqli_fetch_assoc($run))
        { 
            $mobile_id=$data['mobile_id'];
            $query1="SELECT * FROM `mobile_ad` where id='$mobile_id' ";
            $run1=mysqli_query($con,$query1);
            $data1=mysqli_fetch_assoc($run1);
            $user_id=$data['user_id'];
            $query2="SELECT * FROM `customer` where id='$user_id' ";
            $run2=mysqli_query($con,$query2);
            $data2=mysqli_fetch_assoc($run2);
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php  
                echo $data1['company_name'];
                ?></td>
                
                <td><?php echo $data1['sale_price']."/"."Rs"; ?></td>
                <td><?php echo $data1['detail']; ?></td>
                <td><img src="<?php echo $data1['pic']; ?>" width="100px" height="100px"></td>
                <td><?php echo $data2['name']; ?></td>
                <td><?php echo $data2['address']; ?></td>
                <td><?php echo $data2['contact']; ?></td>
                <td><?php echo $data['s_account']; ?></td>
                <td><?php echo $data['r_account']; ?></td>
                <td><?php echo $data['bank']; ?></td>
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
