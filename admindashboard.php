<?php 
    session_start();
    include_once 'include/Class_User.php';
    $user = new User();
    $uid = $_SESSION['uid'];
    if (!$user->get_session()){
       header("location:index.php");
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="styles/dashboard.css">
        <link rel="stylesheet/less" type="text/css" href="styles/dashboardstyle.less" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>
        <script src="scripts/scrollscript.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
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
                        <li><a href="signupform.php" style="color:white;">Manage Calorie</a></li>  
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
            $fullname = $user->get_fullname($uid);
            $totalUsers = $user->get_totalUsers();
            $totalAdmins = $user->get_totalAdmins();
            $totalUserSuggestions = $user->get_totalUserSuggestions();
            $totalRejectedSuggestion = $user->get_rejectedUserSuggestions();
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
                            <div class="number"><span><?php echo $totalUsers;?></span></div>
                        <div class="desc">Users</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <a class="dashboard-stat blue" href="volcard.php?name=issuetod">
                        <div class="visual"><i class="fa fa-line-chart"></i></div>
                        <div class="details">
                            <div class="number"><span><?php echo $totalAdmins;?></span></div>
                        <div class="desc">Admins</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <a class="dashboard-stat hoki" href="volcard.php?name=issueyou">
                        <div class="visual"><i class="fa fa-thumbs-up"></i></div>
                        <div class="details">
                            <div class="number"><span><?php echo $totalUserSuggestions;?></span></div>
                        <div class="desc">Total User Suggestions</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <a class="dashboard-stat red" href="volcard.php?name=issuespam">
                        <div class="visual"><i class="fa fa-exclamation-triangle"></i></div>
                        <div class="details">
                            <div class="number"><span><?php echo $totalRejectedSuggestion;?></span></div>
                        <div class="desc">Rejected User Suggestions</div>
                        </div>
                    </a>
                </div>  
            </div>
        </div>
        <div class="container-fluid" style="background-color:#d3d3d3; margin-top:0%;">
			<h2 style="color:black;">Pending user suggestions</h2>
		</div>
        <div style="overflow-x:auto;">
            <table class="table table-hover" id="table1">
                <tr style="background-color: #f2f2f2;">
                    <th>User Name</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Date & Time</th>
                    <th>Click to add</th>
                </tr>
                <?php
                    $suggestions =  $user->getPendingSuggestions();
                    if(count($suggestions) > 0){
                        foreach($suggestions as $value){
                            $uid = $value["id"];
                            $user_name =  $value["user_name"];
                            $item_name = $value["item_name"];
                            $category = $value["category"];
                            $dop = $value["dop"];
                            $dop = strtotime($dop);
                            $datestring = date('d-M-Y H:i:s', $dop);   
                ?>
                <tr>
                    <td><?php echo $user_name; ?></td>
                    <td><?php echo $item_name; ?></td>
                    <td><?php echo $category; ?></td>
                    <td><?php echo $datestring; ?></td>
                    <td>
                        <a href="addNewSuggestion.php?id=<?php echo $uid;?>" class="btn btn-primary">Add Suggestion</a>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger" <?php echo "onClick='validate(`$uid`)'" ?>>Delete <span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </div>
        <script>
            function validate(id) {
              const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                      confirmButton: 'btn btn-success',
                      cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: true
                  })
                  swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "This suggestion will be deleted and cannot be reverted!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Delete It',
                    cancelButtonText: 'No, Cancel!',
                    reverseButtons: true
                  }).then((result) => {
                    if (result.value) {
                       var result = deleteSuggestion(id);
                      if(result){
                          swalWithBootstrapButtons.fire({
                            title: 'Success',
                            text: "Your response has been successfully marked!",
                            icon: 'success',
                            confirmButtonText: 'Okay!',
                    }) }
                    } else if (
                      /* Read more about handling dismissals below */
                      result.dismiss === Swal.DismissReason.cancel
                    ) {
                      swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your action is not marked :)',
                        'error',
                        
                      )
                    }
                })
            }

            function deleteSuggestion(id){
				$.ajax({
                    url: "deleteSuggestion.php",
                    type: "post",
                    data: {fid : id} ,
                    success : function (response) {
                        $( "#table1" ).load( "admindashboard.php #table1" );
                        $( "#card" ).load( "admindashboard.php #card" );
                        return true;
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                        return false;
                    }
                    
                });
			}
        </script>
    </body>
</html>