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
<h1 class="text text-capitalize text-center " style="color: black;font-family: cursive"><b>View monthly Reports</b></h1>
<a href="report.php" class="btn btn-danger">Back</a>
<form method="post" class="display">
        <table align="center" style="margin-left:0px;">

<tr>
    <td> Select Start Date:</td></tr><tr>
<td><input type="date" name="sdate" required autofocus=""></td>
</tr>
<tr>
    <td> Select End Date:</td></tr><tr>
<td><input type="date" name="edate" required autofocus=""></td>
</tr>
<tr>
    <td  align="center" ><input type="submit" value=" View Report" name="done" class="btn btn-success" style="margin-left: 70px"></td>
    </tr>
</table>
</div>
</form>
<?php 
if(isset($_POST['done']))
{
    $edate=$_POST['edate'];
    $sdate=$_POST['sdate'];
  $query="SELECT * FROM `sold_mobile` where date>='$sdate' AND date<='$edate'";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:100%;background-color: darkgrey" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightpink"><b>Profit report</b></caption>
          <tr >
       <th>S.No</th>
       <th>Mobile Company Name</th>
       <th>Mobile Model</th>
      
       <th>Color</th>
       <th>Detail</th>
       <th>Picture</th>
       <th>Retail Price</th>
       
       <th>Sale Price</th>
       <th>Profit</th>
       <th>Date</th>
       </tr>
        <?php
        $i=1;
        while($data=mysqli_fetch_assoc($run))
        { 
            $mobile_id=$data['mobile_id'];
            $run1=mysqli_query($con, "SELECT * FROM `mobile_ad` where id='$mobile_id' ");
            $data1=mysqli_fetch_assoc($run1);
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td>
                <?php
                echo $data1['company_name'];
                ?></td>
                <td>
                <?php
                echo $data1['model'];
                ?></td>
                
                <td>
                <?php
                echo $data1['color'];
                ?></td>
               <td>
                <?php
                echo $data1['detail'];
                ?></td>
                <td><img src="<?php echo $data1['pic']; ?>" height="60px" width="60px"></td>
               
                <td>
                <?php
                echo $data1['retail_price'];
                ?></td>
                <td>
                <?php
                echo $data1['sale_price'];
                ?></td>
                <td>
                <?php
                echo $data1['sale_price']-$data1['retail_price'];
                ?></td>
                 <td>
                <?php
                echo $data['date'];
                ?></td>
                
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
}
    ?>
