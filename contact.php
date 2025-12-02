<?php
include("header.php");
include("dbconnection.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<h3>Contact Form</h3>

<div class="container">
  <form method="post" action="">
    <label for="Email">Email</label>
    <input type="text" id="email" name="email" placeholder="Your email..">

    
    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
      <option value="canada">Pakistan</option>
      <option value="usa">India</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" name="done" value="Submit">
  </form>
</div>

</body>
</html>
<?php

if(isset($_POST['done']))
{

$email=$_POST['email'];
$country=$_POST['country'];
$subject=$_POST['subject'];

    
    $run=mysqli_query($con,"INSERT INTO `contact`(`email`, `country`, `subject`) 
    VALUES ('$email','$country','$subject')");

if($run)
{
alert("Information saved !");
redirect_to("index.php");
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