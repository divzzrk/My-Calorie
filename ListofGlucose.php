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
<html>
    <head>
         <title>GLUCOSE LIST</title><link rel="icon" href="images/mycal.png" type="image/x-icon">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>		    
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>    
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatabl es.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>		
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">	    
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">					    

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        
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
                    text-transform: uppercase;
                }
                .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                    vertical-align: baseline;
                    white-space: nowrap;
                }
                .styletable{
                    font-color : white;
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
            .footer_bottom{
                background-color: #ff1a75;
            }
            footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                background-color: #ff1a75;
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
                        font-size: 12px;    
                        text-align:center;
                        
                    }
                }
                @media screen and (min-width: 600px){
                    .centerbox{
                        font-size: 15px;
                        max-width: 90%;        
                    }
                }
                @media screen and (min-width: 1050px){
                    .centerbox{
                        max-width: 90%;    
                    }
                }
            </style>
    </head>
    <body>
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
        <div class="centerbox">
            <div style="overflow-x:auto; " id="register_table">
            <h3 style="color:#CD1E79; font-style:bold;"><b>TABLE OF GLUCOSE READING</b></h3>
            <br>
            <table id="example" class="table table-striped table-bordered stlytable" style="overflow-x:auto; width:100%">
        
            <thead>  
                <tr>
                    <th>SL. NO.</td>  
                    <th>IP_NUMBER</td>  
                    <th>GLUCOSE READING</td>  
                    <th>DATE OF ENTRY</td>  
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
                    <td><?php echo $count; ?></td>  
                    <td><?php echo $post["ip_number"]; ?></td>
                    <td><?php echo $post["glucose_reading"]; ?></td>  
                    <td><?php echo $post["sysdatetime"]; ?></td>
                    
                </tr>  
                <?php 
                $count++;
                }  
                ?>
                </tbody> 
                </table>
            </div>
        </div>
        
        
        <footer class="container-fluid text-center" style="float:bottom; background-color:#CD1E79;">
            <div style="color: #ffffff;">
            <p>Copyright 2020 © MyCalorie</p>
            </div>
        </footer>   
        
        <script>
            $(document).ready(function() {
            $('#example').DataTable({		
                dom: 'lBfrtip',
                buttons: [                                                        
                            {
                                extend: 'excel',
                                text: 'Export to Excel',
                                className: 'btn btn-success btnexcel',
                                title: "List of Glucose - MyCalorie"
                            }
                        ]
                });
            } );
        </script>  
    </body>
</html>
