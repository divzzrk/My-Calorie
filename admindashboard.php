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
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="styles/dashboard.css">
        <link rel="stylesheet/less" type="text/css" href="styles/dashboardstyle.less" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>
        <script src="scripts/scrollscript.js"></script>
        <style>
            html{
                scroll-behaviour: smooth;
            }
            .welcome{
                background-image: linear-gradient( to right, rgba(126, 26, 56, 0.7), rgba(126, 26, 101, 0.5)), url(images/caloriehome.jpg);
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                position: relative;  
            }
            .welcometext{
                color: white;
                position: absolute;
                color: white;
            }
            table {
                border-collapse: collapse;
                border-spacing: 0;
                width: 100%;
                border: 1px solid #ddd;
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
            /*tr:nth-child(even){background-color: #f2f2f2}*/
            @media screen and (min-width:320px){ 
                .welcome{
                    height: 25%;
                }
                h2{
					font-size: 18px;
                }
                h3{
					font-size: 12px;
				}
                .welcometext{
                    top: 20%;
                }
            }
            @media screen and (min-width:600px){
                .welcome{
                    height: 30%;
                }
                h2{
					font-size: 20px;
                }
                h3{
					font-size: 18px;
				}
                .welcometext{
                    top: 25%;
                }
            }
            @media screen and (min-width:1050px){
                .welcome{
                    height: 25%;
                }
                h2{
					font-size: 25px;
				} 
				h3{
					font-size: 20px;
				}
                .welcometext{
                    top: 40%;
                }
            }
            .badge {position: absolute; top: 5px; right: 2%;}
            a:hover{
                opacity: 0.8;
            }
            .modal {
                text-align: center;
            }
            @media screen and (min-width: 768px) { 
                .modal:before {
                    display: inline-block;
                    vertical-align: middle;
                    content: " ";
                    height: 100%;
                }
            }
            .modal-dialog {
                display: inline-block;
                text-align: left;
                vertical-align: middle;
            }
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
                        <li class="active"><a href="#" ><span class="glyphicon glyphicon-home"></span> Home</a></li-->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="signupform.php" style="color:white;">Add new Admin</a></li>  
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;">View <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="voledit.php">Users</a></li>
                                <li><a href="volchangepass.php">User food consumed</a></li>
                                <li><a href="volchangepass.php">User drink consumed</a></li>
                                <li><a href="volchangepass.php">User glucose levels</a></li>
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
        <?php
            
            $email = $_SESSION['uid'];
            $con = new mysqli("localhost","root","","pravathidb");
			if($con->connect_error){
				echo '<script type="text/javascript">';
				echo 'setTimeout(function () { swal("Connection Error!",$con->connect_error(),"error");';
				echo '}, 0);</script>';
			}
            $sel="select * from pravathitb where email = '$email'";
            $result=$con->query($sel);
            $row=$result->fetch_assoc();
            $name = ucwords($row["Name"]);
            $sel = "select * from reporttb where verified = 'n'";
            $result=$con->query($sel);
            $numpending=$result->num_rows;
            $doj=date("Y-m-d 00:00:00");
            $sel = "select * from reporttb where datetime >= '$doj'";
            $result=$con->query($sel);
            $numtoday=$result->num_rows;
            $sel = "select * from reporttb where verifiedby = '$email'";
            $result=$con->query($sel);
            $verifiedby=$result->num_rows;
            $sel = "select * from reporttb where verifiedby = '$email' and verified = 'f'";
            $result=$con->query($sel);
            $spam=$result->num_rows;
            $fullname = $user->get_fullname($uid);
        ?>
        <div class="container-fluid welcome">
            <div class="welcometext">
                <h2>ADMINISTRATOR DASHBOARD</h2>
                <h3>Welcome <?php echo $fullname; ?></h3>
            </div>
        </div>
        <div class="wrapper container" id="card">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="heading"></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <a class="dashboard-stat purple" href="volcard.php?name=issuever">
                        <div class="visual"><i class="fa fa-hourglass-start"></i></div>
                        <div class="details">
                            <div class="number"><span><?php echo $numpending;?></span></div>
                        <div class="desc">Issues to be verified</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <a class="dashboard-stat blue" href="volcard.php?name=issuetod">
                        <div class="visual"><i class="fa fa-line-chart"></i></div>
                        <div class="details">
                            <div class="number"><span><?php echo $numtoday;?></span></div>
                        <div class="desc">Issues Reported Today</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <a class="dashboard-stat hoki" href="volcard.php?name=issueyou">
                        <div class="visual"><i class="fa fa-thumbs-up"></i></div>
                        <div class="details">
                            <div class="number"><span><?php echo $verifiedby;?></span></div>
                        <div class="desc">Verified Issues by you</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <a class="dashboard-stat red" href="volcard.php?name=issuespam">
                        <div class="visual"><i class="fa fa-exclamation-triangle"></i></div>
                        <div class="details">
                            <div class="number"><span><?php echo $spam;?></span></div>
                        <div class="desc">Issues marked spam by you</div>
                        </div>
                    </a>
                </div>  
            </div>
        </div>
        <div class="container-fluid" style="background-color:#d3d3d3; margin-top:0%;">
			<h2 style="color:black;">Recent issues reported</h2>
		</div>
        <div style="overflow-x:auto;">
            <table class="table table-hover" id="table1">
                <tr style="background-color: #f2f2f2;">
                    <th>Name</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Details</th>
                    <th>State</th>
                    <th>Verification status</th>
                    <th>Contact</th>
                    <th>Verify</th>
                </tr>
                <?php
                    $sel="select * from reporttb ORDER BY datetime DESC";
                    $result=$con->query($sel);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            $id = $row['id'];
                            $name = $row['name'];
                            $issuecat = $row['issuecat'];
                            $title = $row['title'];
                            $state = $row['state'];
                            $phone = $row['phone'];
                            $mailid = $row['email'];
                            $verified = $row['verified'];
                            if($verified == 'y'){
                                $ver = 'Verified';
                                $rowcolor = "green";
                            }
                            else if($verified == 'n'){
                                $ver = 'Not Verified';
                                $rowcolor = "black";
                            }
                            else{
                                $ver = 'Reported Spam';
                                $rowcolor = "red";
                            }
                ?>
                <tr>
                    <td><?php echo $name ?></td>
                    <td><?php echo $issuecat ?></td>
                    <td><?php echo $title ?></td>
                    <td>
                    <a href="#myModal" class="btn btn-info" id="custId" data-toggle="modal" data-id="<?php echo $id; ?>">More Info <i class="fa fa-angle-double-right"></i></a>
                    </td>
                    <td><?php echo $state ?></td>
                    <td style="color: <?php echo $rowcolor; ?>"><?php echo $ver ?></td>
                    <td>
                        <a href="tel:+91<?php echo $phone; ?>">
                            <i class="fa fa-phone fa-lg" style="color:#004d4d;" aria-hidden="true"></i>
                        </a> 
                        <a href="mailto:<?php echo $mailid; ?>?Subject=Pravathi%20Report" target="_top">
                            <i class="fa fa-envelope fa-lg" style="color:#004d4d; margin-left:5%;" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td>
                    <div id="buttondiv">
                <?php
                            if($verified == 'n'){
                ?>
                <button name="verifybtn" class="btn btn-default btn-sm" style="border: solid 1px green;" <?php echo "onClick='verify(`$id`)'" ?>>
					VERIFY
				</button>
                <button name="spambtn" class="btn btn-default btn-sm" style="border: solid 1px red;" <?php echo "onClick='spam(`$id`)'" ?>>
					MARK SPAM
				</button>
                <?php
                            }
                            else{
                ?>
                <button name="verifybtn" class="btn btn-default btn-sm" style="background:#004d4d; color:white;" <?php echo "onClick='unverify(`$id`)'" ?>>
					CLICK TO INVALIDATE
				</button>
                <?php

                            }
                ?>
                    </div>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </div>
        <footer class="page-footer font-small " style="background-color:#004d4d; color:white;">
			<div class="footer-copyright text-center"> Copyright © <font style="color: #99ffe6;">Pravathi.</font> All Rights Reserved.   </div>
	    </footer>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">REPORTED ISSUE</h4>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data"></div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>  
        <script>
            $(document).ready(function(){
                $('#myModal').on('show.bs.modal', function (e) {
                    var rowid = $(e.relatedTarget).data('id');
                    $.ajax({
                        type : 'post',
                        url : 'fetch_record.php', //Here you will fetch records 
                        data :  'rowid='+ rowid, //Pass $id
                        success : function(data){
                            $('.fetched-data').html(data);//Show fetched data from database
                        }
                    });
                });
            });
            function verify(id){
				$.ajax({
                    url: "verify.php",
                    type: "post",
                    data: {id : id} ,
                    success : function (response) {
                        $( "#table1" ).load( "volunteer.php #table1" );
                        $( "#card" ).load( "volunteer.php #card" );
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                    
                });
			}
            function spam(id){
				$.ajax({
                    url: "verify.php",
                    type: "post",
                    data: {spid : id} ,
                    success : function (response) {
                        $( "#table1" ).load( "volunteer.php #table1" );
                        $( "#card" ).load( "volunteer.php #card" );
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                    
                });
			}
            function unverify(id){
				$.ajax({
                    url: "verify.php",
                    type: "post",
                    data: {uvid : id} ,
                    success : function (response) {
                        $( "#table1" ).load( "volunteer.php #table1" );
                        $( "#card" ).load( "volunteer.php #card" );
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                    
                });
			}
        </script>
    </body>
</html>