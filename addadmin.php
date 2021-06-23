<?php
    session_start();
    include_once 'include/Class_User.php';
    $user = new User();
    $uid = $_SESSION['uid'];
    if (!$user->get_session()){
       header("location:index.php");
    }
    include_once 'include/Class_User.php';
    $user = new User();
?>
<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MyCalorie Admin</title><link rel="icon" href="images/mycal.png" type="image/x-icon">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles/formstyle.css">
        <script src="script.js"></script>
    </head>
    <body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><span class="glyphicon glyphicon-arrow-up"></span></button>
        <header>
        <nav class="navbar navbar-inverse" style=" margin:0%; background-color: #CD1E79; border: 0%; border-radius:0%;">
            <div class="container-fluid">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="color:white;">MyCalorie</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="admindashboard.php" ><span class="glyphicon glyphicon-home"></span> Home</a></li-->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="addadmin.php" style="color:white;">Add new Admin</a></li>  
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">Items <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="managecalorie.php">Manage Items</a></li>  
                            <li><a href="addCalorie.php">Add new Item</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">View <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="admincard.php?name=totalUsers">Users</a></li>
                            <li><a href="admincard.php?name=food">User food consumed</a></li>
                            <li><a href="admincard.php?name=drink">User drink consumed</a></li>
                            <li><a href="admincard.php?name=glucose">User glucose levels</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">My Account <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="voledit.php">Change Password</a></li>
                            <li><a href="volchangepass.php">Edit your account</a></li>
                        </ul>
                    </li>
                    <li><a href="logout.php" style="color:white;">Log out <span class="glyphicon glyphicon-log-out"></span></a></li>
                </ul>
                </div>
            </div>
        </nav>
        </header>
        <div class="container-fluid" style="text-align:center; padding-top:50px; color: #CD1E79;">
            <h3>Add New Admin</h3>
            <form action="addadmin.php" method="POST" enctype="multipart/form-data" >
                <input type="text" placeholder="Enter username" name="user_name" required><br>
                <input type="text" placeholder="Enter admin name" name="name" required><br>
                <input type="email" placeholder="Enter admin email" name="user_email" required><br>
                <input type="password" placeholder="Enter admin password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="user_pass" required><br>
                <br/>
                <br><button type="submit" name='btnSubmit' class="mybtn">ADD ADMIN</button><br/><br/>
            </form>
        </div>
        <?php
            if(isset($_POST['btnSubmit'])){
                $name = $_POST["name"];
                $username =  $_POST['user_name'];
                $useremail = $_POST['user_email'];
                $userpass = $_POST['user_pass'];
                if($user->reg_user($name, $username, $userpass, $useremail)){
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal("Success!","New Admin Added Successfully","success");';
                    echo '}, 0);</script>';
                    echo "<meta http-equiv=Refresh content=1.5;url=admindashboard.php>";
                }else{
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal("Error!","Please try again after sometime","error");';
                    echo '}, 0);</script>';
                }
            }
        ?>
    </body>
</html>