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

<h1 class="text text-capitalize text-center text-primary">View Delivery Record</h1>
<?php 
  $query="SELECT * FROM `delivery_info`  ";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:100%;background-color: darkgrey" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightpink"><b>Detail</b></caption>
          <tr >
       <th>S.No</th>
       <th>Reciever Name</th>
       <th>Reciever Contact</th>
       <th>Reciever Address</th>
       <th>Price</th>
       
       <th>Company </th>
       <th>Model</th>
       <th>Date</th>
       
       </tr>
        <?php
        $i=1;
        while($data=mysqli_fetch_assoc($run))
        { 
            
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php  
                echo $data['reciever_name'];
                ?></td>
                
                <td><?php echo $data['reciever_contact']; ?></td>
                <td><?php echo $data['address']; ?></td>
            
                <td><?php echo $data['amount']; ?></td>
                <td><?php echo $data['mobile_company']; ?></td>
                <td><?php echo $data['mobile_model']; ?></td>
                <td><?php echo $data['date']; ?></td>
                
              
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
