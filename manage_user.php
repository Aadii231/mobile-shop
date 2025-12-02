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
<h1 class="text text-capitalize text-center " style="color: black;font-family: cursive"><b>Manage User Registration Request</b></h1>
<?php 
  $query="SELECT * FROM `customer`  where status='Pending' ";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:90%;background-color: darkgrey" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightpink"><b> User Detail</b></caption>
          <tr >
       <th>S.No</th>
       <th>Name</th>
       <th>Email</th>
       <th>Address</th>
       <th>Contact</th>
       <th>Status</th>
       <th>Action</th>
       </tr>
        <?php
        $i=1;
        while($data=mysqli_fetch_assoc($run))
        { 
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td>
                <?php
                echo $data['name'];
                ?></td>
                <td>
                <?php
                echo $data['email'];
                ?></td>
                <td>
                <?php
                echo $data['address'];
                ?></td>
                <td>
                <?php
                echo $data['contact'];
                ?></td>
               <td>
                <?php
                echo $data['status'];
                ?></td>
               <td> <a href="approve.php?id=<?php echo $data['id'];?>" class="btn btn-primary" style="margin-left:px;" >Approve</a></td>
            
               
                
             </tr>
        <?php
        }?>
        </table>
    <?php 
    }
	else
	{
		echo "<h1 class=heading>No Record is Found</h1>";
		
	}
    ?>
