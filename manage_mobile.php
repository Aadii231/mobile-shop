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
<h1 class="text text-capitalize text-center " style="color: black;font-family: cursive"><b>Manage Mobile Ad</b></h1>
<a href="add_new_mobile.php" class="btn btn-warning" style="margin-left:300px;">Add New Mobile</a>
<?php 
  $query="SELECT * FROM `mobile_ad`  ";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:100%;background-color: darkgrey" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightpink"><b> Mobile Ad Detail</b></caption>
          <tr >
       <th>S.No</th>
       <th>Mobile Company Name</th>
       <th>Mobile Model</th>
       <th>Sale Price</th>
       <th>Color</th>
       <th>Detail</th>
       <th>Retail Price</th>
       <th>Picture</th>
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
                echo $data['company_name'];
                ?></td>
                <td>
                <?php
                echo $data['model'];
                ?></td>
                <td>
                <?php
                echo $data['sale_price'];
                ?></td>
                <td>
                <?php
                echo $data['color'];
                ?></td>
               <td>
                <?php
                echo $data['detail'];
                ?></td>
                <td>
                <?php
                echo $data['retail_price'];
                ?></td>
                 <td><img src="<?php echo $data['pic']; ?>" height="60px" width="60px"></td>
               <td> <a href="remove.php?id=<?php echo $data['id'];?>" class="btn btn-primary" style="margin-left:px;" >Remove Mobile</a>
                <a href="update.php?id=<?php echo $data['id'];?>" class="btn btn-primary" style="margin-left:px;" >Update Mobile</a></td>
               
                
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
