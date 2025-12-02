<html>
    <head>
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <style>
              ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: silver;
}

li {
  float: left;
  margin-left:30px;
}

li a {
  display: block;
  color: black;
  text-align: center;
 
  padding: 14px 15px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color:greenyellow;
}

.active {
 color: black;
  font-size: 20px;
}
    input[type=text], input[type=number],select,input[type=email],input[type=password],input[type=tel] {
      width: 170%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type=date] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    .display {
      border-radius: 5px;
      background-color: silver;
      padding: 20px;
      padding-left:50px;
      width:40%;
      margin-left:400px;
    }
       input[type=submit]{
        width: 100%;
        background-color: #555555;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;                
      }
      .btn1 {width:30%;}
      .heading {text-align:center;color:royalblue;margin-top:40px;margin-left:-100px;}
     
a{
    text-decoration: none;
}
body{
        background-image:url("admin.jpg");
        background-repeat:no-repeat;
        background-size:cover;

      }
        </style>
    </head>
	<body>
    <div style="margin-top:20px;margin-left:150px">
        <img src="logo.jpg" width=70px height=70px style="border:1px solid white;border-radius:20px" >  </div> 
        <h1 class="text text-center text-capitalize text-primary" style="font-size:45px;margin-top:-50px;color:black;font-family: cursive">Online Mobile Shop </h1>
    
     
          <div style="margin-top:10px;font-family: cursive">
        <ul>
            <li><a class="active" href="admin_welcome.php" style="font-size:16">Home</a></li>
            <li><a  href="manage_user.php" style="font-size:16">Manage User Registration Request</a></li>
            <li><a  href="manage_mobile.php" style="font-size:16">Manage Mobile Ad</a></li>
            <li><a  href="view_payment_detail.php" style="font-size:16">View Payment Detail</a></li>
            <li><a  href="view_delivery_detail.php" style="font-size:16">View Delivery Detail</a></li>
            <li><a  href="report.php" style="font-size:16">View Reports</a></li>
                </ul>
        </div>
