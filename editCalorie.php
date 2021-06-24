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
    $id = $_GET["id"];
    $row = $user->getCalorie($id);
    $item_name = $row["item_name"];
    $category = $row["category"];
    if($category != 'Drink' || $category != 'drink'){
        $category = 'Food';
    }
    $calories = $row["calories"];
    $proteins = $row["proteins"];
    $carbohydrates = $row["carbohydrates"];
    $fats = $row["fats"];
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
                            <li><a href="adminchangepass.php">Change Password</a></li>
                            <li><a href="adminedit.php">Edit your account</a></li>
                        </ul>
                    </li>
                    <li><a href="logout.php" style="color:white;">Log out <span class="glyphicon glyphicon-log-out"></span></a></li>
                </ul>
                </div>
            </div>
        </nav>
        </header>
        <div class="container-fluid" style="text-align:center; padding-top:50px; color: #CD1E79;">
            <h3>Edit Calorie</h3>
            <form action="editCalorie.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data" >
                <input type="text" placeholder="Food item name" name="item_name" value = "<?php echo $item_name;?>" required><br>
                <select name="category" id="category" class="category">
                    <option value="Food" <?php echo ($category == 'Food') ? 'selected' : '' ?>>Food</option>
                    <option value="Drink" <?php echo ($category == 'Drink') ? 'selected' : '' ?>>Drink</option>
                </select><br/>
                <input type="text" placeholder="Calories" name="calories" required value = "<?php echo $calories;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"><br>
                <input type="text" placeholder="Proteins" name="proteins" required value = "<?php echo $proteins;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"><br>
                <input type="text" placeholder="Carbohydrates" name="carbohydrates" value = "<?php echo $carbohydrates;?>" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"><br>
                <input type="text" placeholder="Fats" name="fats" required value = "<?php echo $fats;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"><br>
                <br><button type="submit" name='btnCalorie' class="mybtn">UPDATE ITEM</button><br/><br/>
            </form>
        </div>
        <?php
            if(isset($_POST['btnCalorie'])){
                $itemname =  $_POST['item_name'];
                $category = $_POST['category'];
                $calories = $_POST['calories'];
                $proteins = $_POST['proteins'];
                $carbohydrates = $_POST['carbohydrates'];
                $fats = $_POST['fats'];
                if($user->updateCalorie($id, $itemname, $category, $calories, $proteins, $carbohydrates, $fats)){
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal("Success!","Item Updated Successfully","success");';
                    echo '}, 0);</script>';
                    echo "<meta http-equiv=Refresh content=1.5;url=managecalorie.php>";
                }else{
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal("Error!","Please try again after sometime","error");';
                    echo '}, 0);</script>';
                }
            }
        ?>
    </body>
</html>