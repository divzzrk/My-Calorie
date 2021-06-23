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
    if($_GET["name"] == ""){

    }else{
        $name = $_GET["name"];
        $title = "";
        if($name == "totalUsers"){
            $title = "Total Users";
        }elseif($name == "totalAdmins"){
            $title = "Total Admins";
        }elseif($name == "totalUserSuggestions"){
            $title = "All User Suggestions";
        }elseif($name == "totalRejectedSuggestions"){
            $title = "Total Rejected Suggestions";
        }elseif($name == "food"){
            $title = "Food Consumption Details";
        }elseif($name == "drink"){
            $title = "Drink Consumption Details";
        }elseif($name == "glucose"){
            $title = "User Glucose Readings";
        }
        else{
            header("location:admindashboard.php");
        }
    }
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
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>		    
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>    
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>		
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">					    
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <link rel="stylesheet" href="styles/formstyle.css">
        <script src="script.js"></script>
        <style>
            table {
                border-collapse: collapse;
                border-spacing: 0;
                width: 100%;
                border: 2px solid  #ff1a75;
            }
            th, td {
                text-align: center;
                padding: 8px;
            }
            th{
                /* text-transform: uppercase; */
            }
            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                vertical-align: baseline;
                white-space: nowrap;
            }
            .styletable{
                color : white;
            }
            .btnexcel{
                color:#CD1E79;
                background-color:#ffffff;
                border-color:#CD1E79;
            }.btnexcel:hover {
                background-color: #CD1E79;
                border-color:#ffffff;
            }
            .page-item.active .page-link {
                z-index: 1;
                color: #fff;
                background-color:#CD1E79 ;
                border-color: #CD1E79;
            }
            @media screen and (min-width: 320px){
                .btn{
                    margin-bottom: 2%;
                }
                .centerbox{
                    position: relative;
                    margin:1% auto;
                    max-width: 94%;
                    padding: 5px;
                    background-color: #ffffff;
                    opacity: 0.95;
                    /* font-size: 12px;     */
                    text-align:center;
                }
            }
            @media screen and (min-width: 600px){
                .centerbox{
                    /* font-size: 15px; */
                    max-width: 90%;        
                }
            }
            @media screen and (min-width: 1050px){
                .centerbox{
                    max-width: 90%;    
                }
            }
        </style>
        </style>
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
                    <li><a href="signupform.php" style="color:white;">Add new Admin</a></li>  
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
    <div class="jumbotron text-center" style="margin-bottom: 0%;">
        <h2 style="color:#CD1E79; font-style:bold;"><?php echo $title; ?></h2>
    </div>
    <div class="centerbox">
        <div style="overflow-x:auto; " id="register_table">
            <br>
            <table id="example" class="table table-striped table-bordered stlytable" style="overflow-x:auto; width:100%">
            <?php
                if($name == "totalUsers"){
            ?>
            <thead>  
                <tr>
                    <th>Sl No.</th>  
                    <th>User Name</th>  
                    <th>Name</th>  
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Occupation</th>
                    <th>Phone number</th>
                    <th>Created at</th>
                    <th>Date of Birth</th>
                    <th>Weight in kg</th>
                    <th>Height in cm</th>
                </tr>
            </thead>
            <tbody>  
                <?php  
                $post_data = $user->select('tbuser'); 
                $count=1; 
                foreach($post_data as $post)  
                {  
                ?>  
                <tr>  
                    <?php 
                    $date = date('d/m/y', strtotime($post["created_at"])); 
                    $dob = date('d/m/y', strtotime($post["date_of_birth"])); 
                    ?>
                    <td><?php echo $count ?></td>  
                    <td><?php echo $post["ip_number"]; ?></td>
                    <td><?php echo $post["user_name"]; ?></td>
                    <td><?php echo $post["user_age"]; ?></td> 
                    <td><?php echo $post["user_sex"]; ?></td>
                    <td><?php echo $post["user_occupation"]; ?></td>
                    <td><?php echo $post["phone_number"]; ?></td>
                    <td><?php echo  $date; ?></td>
                    <td><?php echo $dob; ?></td>
                    <td><?php echo $post["weight_in_kg"]; ?></td>
                    <td><?php echo $post["height_in_cm"]; ?></td>
                </tr>  
                <?php  
                $count++;
                }  
                ?>
            </tbody> 
            <?php
                }elseif($name == "totalAdmins"){
            ?>
            <thead>  
                <tr>
                    <th>Sl No.</th>  
                    <th>User Name</th>  
                    <th>Name</th>  
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>  
                <?php  
                $post_data = $user->select('adminusers'); 
                $count=1; 
                foreach($post_data as $post)  
                {  
                ?>  
                <tr>  
                    <td><?php echo $count ?></td>  
                    <td><?php echo $post["u_name"]; ?></td>
                    <td><?php echo $post["fullname"]; ?></td>
                    <td><?php echo $post["user_email"]; ?></td>
                </tr>  
                <?php  
                $count++;
                }  
                ?>
            </tbody> 
            <?php
                }elseif($name == "totalUserSuggestions"){
            ?>
            <thead>  
                <tr>
                    <th>Sl No.</th>  
                    <th>User Name</th>  
                    <th>Item Name</th>  
                    <th>Category</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>  
                <?php  
                $post_data = $user->select('tbSuggestion'); 
                $count=1; 
                foreach($post_data as $post)  
                {  
                ?>  
                <tr>  
                    <?php 
                        $date = date('d/m/y', strtotime($post["dop"])); 
                        if($post["status"]==0){
                            $status = "Pending";
                        }elseif($post["status"]==1){
                            $status = "Added to table";
                        }elseif($post["status"]==2){
                            $status = "Rejected";
                        }
                    ?>
                    <td><?php echo $count ?></td>  
                    <td><?php echo $post["user_name"]; ?></td>
                    <td><?php echo $post["item_name"]; ?></td>
                    <td><?php echo $post["category"]; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $status; ?></td>
                </tr>  
                <?php  
                $count++;
                }  
                ?>
            </tbody> 
            <?php
                }elseif($name=="totalRejectedSuggestions"){
            ?>
            <thead>  
                <tr>
                    <th>Sl No.</th>  
                    <th>User Name</th>  
                    <th>Item Name</th>  
                    <th>Category</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>  
                <?php  
                $post_data = $user->selectRejectedSuggestion(); 
                $count=1; 
                foreach($post_data as $post)  
                {  
                ?>  
                <tr>  
                    <?php 
                        $date = date('d/m/y', strtotime($post["dop"])); 
                    ?>
                    <td><?php echo $count ?></td>  
                    <td><?php echo $post["user_name"]; ?></td>
                    <td><?php echo $post["item_name"]; ?></td>
                    <td><?php echo $post["category"]; ?></td>
                    <td><?php echo $date; ?></td>
                </tr>  
                <?php  
                $count++;
                }  
                ?>
            </tbody> 
            <?php
                }elseif($name=="food"){
            ?>
            <thead>  
                <tr>
                    <th>Sl No.</th>  
                    <th>User Name</th>  
                    <th>Food Name</th>  
                    <th>Quantity</th>
                    <th>System Datetime</th>
                    <th>User Datetime</th>
                </tr>
            </thead>
            <tbody>  
                <?php  
                $post_data = $user->select('tbfood');  
                $count=1; 
                foreach($post_data as $post)  
                {  
                ?>  
                <tr>  
                    <?php 
                        $sysdate = date('d/m/y h:m:s', strtotime($post["sysdatetime"])); 
                        $userdate = date('d/m/y h:m:s', strtotime($post["user_datetime"])); 
                    ?>
                    <td><?php echo $count ?></td>  
                    <td><?php echo $post["ip_number"]; ?></td>
                    <td><?php echo $post["food_name"]; ?></td>
                    <td><?php echo $post["food_qty"]; ?></td>
                    <td><?php echo $sysdate; ?></td>
                    <td><?php echo $userdate; ?></td>
                </tr>  
                <?php  
                $count++;
                }  
                ?>
            </tbody> 
            <?php
                }elseif($name=="drink"){
            ?>
            <thead>  
                <tr>
                    <th>Sl No.</th>  
                    <th>User Name</th>  
                    <th>Drink Name</th>  
                    <th>Quantity</th>
                    <th>Sugar</th>
                    <th>System Datetime</th>
                    <th>User Datetime</th>
                </tr>
            </thead>
            <tbody>  
                <?php  
                $post_data = $user->select('tbdrink');  
                $count=1; 
                foreach($post_data as $post)  
                {  
                ?>  
                <tr>  
                    <?php 
                        $sysdate = date('d/m/y h:m:s', strtotime($post["sysdatetime"])); 
                        $userdate = date('d/m/y h:m:s', strtotime($post["user_datetime"])); 
                    ?>
                    <td><?php echo $count ?></td>  
                    <td><?php echo $post["ip_number"]; ?></td>
                    <td><?php echo $post["drink_name"]; ?></td>
                    <td><?php echo $post["drink_qty"]; ?></td>
                    <td><?php echo $post["food_sugar"]; ?></td>
                    <td><?php echo $sysdate; ?></td>
                    <td><?php echo $userdate; ?></td>
                </tr>  
                <?php  
                $count++;
                }  
                ?>
            </tbody> 
            <?php
                }elseif($name=="glucose"){
            ?>
            <thead>  
                <tr>
                    <th>Sl No.</th>  
                    <th>User Name</th>  
                    <th>Glucose Reading</th>  
                    <th>System Datetime</th>
                </tr>
            </thead>
            <tbody>  
                <?php  
                $post_data = $user->select('tbglucose');  
                $count=1; 
                foreach($post_data as $post)  
                {  
                ?>  
                <tr>  
                    <?php 
                        $sysdate = date('d/m/y h:m:s', strtotime($post["sysdatetime"])); 
                    ?>
                    <td><?php echo $count ?></td>  
                    <td><?php echo $post["ip_number"]; ?></td>
                    <td><?php echo $post["glucose_reading"]; ?></td>
                    <td><?php echo $sysdate; ?></td>
                </tr>  
                <?php  
                $count++;
                }  
                ?>
            </tbody> 
            <?php
                }
            ?>
                </table>
            </div>
        </div>

        <script>
            $(document).ready(function() {
            $('#example').DataTable({		
                dom: 'lBfrtip',
                buttons: [                                                        
                            {
                                extend: 'excel',
                                text: 'Export to Excel',
                                className: 'btn btn-success btnexcel',
                                title: "MyCalorie"
                            }
                        ]
                });
            } );
        </script>  

    </body>
</html>