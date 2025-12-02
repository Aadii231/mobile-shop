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
$m_id=$_GET['id'];
if(isset($_POST['done']))
{
$review=$_POST['review'];



    
    $run=mysqli_query($con,"INSERT INTO `review`(`user_id`, `mobile_id`, `review_detail`) 
    VALUES ('$user_id','$m_id','$review')");

if($run)
{
alert("Review Added Successfully!");
redirect_to("user_welcome.php");
}

else
{
alert("Failed");
}

}


?>
<?php
function alert($text)
{
    echo"<script>alert(\"$text\");</script>";
}
function redirect_to($path)
{
    echo"<script>location=\"$path\";</script>";
}
?>
   

<h1 class="text text-capitalize text-center " style="color: black;font-family: cursive"><b>View Review</b></h1>
<div style="margin-left:0px;width:1250px;">
    <form method="post" class="display">
        <table align="center" style="margin-left:0px;">
<tr>
    <td> Enter Review:</td></tr><tr>
<td><input type="text" name="review" required autofocus="" placeholder="Please Enter Review"></td>
</tr>


<tr>
    <td  align="center" ><input type="submit" value=" Add Review" name="done" class="btn btn-success" style="margin-left: 70px"></td>
    </tr>
</table>
</div>
</form>
</div>
<br>
<?php
include ("footer.php");
?>
<?php 
  $query="SELECT * FROM `review` where mobile_id='$m_id'  ";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if($row>=1)
  {
  ?>
      <table align="center" style="margin-top:10px;width:60%;background-color: darkgrey" class="table table-striped table-bordered">
          <caption style="border: 1px solid gray;background-color: lightpink"><b> Reviews</b></caption>
          <tr >
       <th>S.No</th>
       <th>User Name</th>
       <th>Review</th>
       
       
       </tr>
        <?php
        $i=1;
        while($data=mysqli_fetch_assoc($run))
        { 
            $run1=mysqli_query($con,"SELECT * FROM `customer` where id='$user_id'");
            $data1=mysqli_fetch_assoc($run1)
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td>
                <?php
                echo $data1['name'].":";;
                ?></td>
                <td>
                <?php
                echo $data['review_detail'];
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
    ?>
