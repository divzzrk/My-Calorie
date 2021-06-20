<?php 
    session_start();
    include_once 'include/Class_User.php';
    $user = new User();

    $uid = $_SESSION['uid'];

    if (!$user->get_session()){
       header("location:index.php");
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:index.php");
    }
?>
<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>ADD ITEMS</title><link rel="icon" href="images/mycal.png" type="image/x-icon">
    <link rel="stylesheet" href="formstyle.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="formstyle.css">		
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <style>
        .search_categories{
            width:100%;
        }
        .search_categories select{
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
            -webkit-appearance: button; 
            outline:none;
        }
    </style>
  </head>
  <body>
      <?php 
        include_once 'include/Class_User.php';
        $user = new User();
        if (isset($_REQUEST['submit'])){

            // extract($_POST);
            $foodname = $_POST['food'];
            $category = $_POST['category'];
            $calorie = $_POST['calorie'];
            $foodname = ucwords($foodname," ");
            $itemexixts = $user->isItemexists($foodname,$category);
            if($itemexixts){
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { Swal.fire({ title: \'Error!\', text: \'Sorry!!! Food item already exists!\', type: \'warning\', confirmButtonText: \'OK\'})';
                echo '}, 0);</script>';
            }else{
                $additem = $user->addItem($foodname, $category, $calorie);
                if ($additem) {
                    // Insert Success
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { Swal.fire({ title: \'Success!\', text: \'New Item Inserted successfull!\', type: \'success\', confirmButtonText: \'OK\'})';
                    echo '}, 0);</script>';
                } else {
                    // insert Failed
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { Swal.fire({ title: \'Error!\', text: \'Sorry!!! Food item already exists!\', type: \'warning\', confirmButtonText: \'OK\'})';
                    echo '}, 0);</script>';
                }
            }
            
            }
        ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#CD1E79;">
        <a class="navbar-brand " href="#" style="color:#ffffff;">MyCalorie</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="adminhome.php" style="color:#ffffff;">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ListofFoods.php" style="color:#ffffff;">FOOD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ListofDrinks.php" style="color:#ffffff;">DRINKS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ListofGlucose.php" style="color:#ffffff;">GLUCOSE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ListofCalories.php" style="color:#ffffff;">CALORIES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Register_Admin.php" style="color:#ffffff;">ADD NEW ADMIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addcalorie.php" style="color:#ffffff;">ADD NEW CALORIE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminhome.php?q=logout" style="color:#ffffff;">LOGOUT</a>
                </li>
            </ul>
        </div>
        </nav>
    </header>
    <div class="login-page">
        <div class="form">
            <form class="login-form" action="" method="POST" name="additem">
                <h3>ADD CALORIES</h3><br>
                <input type="text" placeholder="Enter food or drink" name="food" required=""/>
                <div class="search_categories">
                    <select  name="category" id="search_categories" required>
                        <option selected="true" disabled ="disabled" value="">Select Category</option>
                        <option value="Drink">Drink</option>
                        <option value="Fruit">Fruit</option>
                        <option value="Grains">Grains</option>
                        <option value="Vegetables">Vegetables</option>
                        <option value="Dessert">Dessert</option>
                        <option value="Continental">Continental</option>
                        <option value="Fried">Fried</option>
                        <option value="Indian">Indian</option>
                    </select>
                </div>
                <input type="text" placeholder="Enter Calories per gm" name="calorie" required=""/>
                <input onclick="return submititem()" type="submit" name="submit" value="ADD ITEM" class="btnlogin" />
            </form>
        </div>  
    </div>
    <script>
    function submititem() {
        var search_categories = document.getElementById("search_categories");
        if (search_categories.value == "") {
            //If the "Please Select" option is selected display error.
            alert("Please select a Category!");
            return false;
        }
        return true;
    }
    </script>
  </body>

  </html>