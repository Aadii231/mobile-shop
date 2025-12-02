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
<h1 class="text text-capitalize text-center " style="color: black;font-family: cursive"><b>View Reports</b></h1>
<div style="margin-left:250px;margin-top:200px">
<a href="daily_report.php" class="btn btn-warning">Daily Report</a>
<a href="weekly_report.php" class="btn btn-warning">Weekly Report</a>
<a href="monthly_report.php" class="btn btn-warning" >Monthly Report</a>
<a href="yearly_report.php" class="btn btn-warning" >Yearly Report</a>
</div>
