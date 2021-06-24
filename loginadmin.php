<?php
    session_start();
    include_once 'include/Class_User.php';
    $user = new User();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title><link rel="icon" href="images/mycal.png" type="image/x-icon">
    <link rel="stylesheet" href="formstyle.css">		
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
</head>

<?php
$emailusername = "";
if (isset($_POST['submit'])) { 
        $emailusername = $_POST['username'];
        $password = $_POST['password']; 
	    $login = $user->check_login($emailusername, $password);
        
	    if ($login) {
	        // Login Success
	       header("location:admindashboard.php");
	    } else {
	        // Login Failed
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { Swal.fire({ title: \'Error!\', text: \'Sorry!!! Invalid Username or Password!\', type: \'warning\', confirmButtonText: \'OK\'})';
		    echo '}, 0);</script>';
	    }
	}
?>
<body>
    <header>
        <div class="container">
            <nav id="navigation vertical-center">
                <a href="#" class="page-title">My Calorie</a>
                <a aria-label="mobile menu" class="nav-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
                <ul class="menu-left">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="login-page">
        <div class="form">
            <h4 style="color:#CD1E79;">Admin Login</h3>
            <br>
            <form class="login-form" action="" method="POST" name="login">
            <input type="text" placeholder="Enter username" name="username" required="" value="<?php echo $emailusername;?>"/>
            <input type="password" placeholder="Enter password" name="password" required=""/>
            <input onclick="return(submitlogin());" type="submit" name="submit" value="Login" class="btnlogin" />
            </form>
        </div>
    </div>
    <script type="text/javascript" language="javascript">
        function validateEmail(email) {
            const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

        function submitlogin() {
            var form = document.login;
            if(!validateEmail(form.emailusername.value)){
                Swal.fire(
                        'Error',
                        'Please enter a valid email address',
                        'error'
                )
                return false;
            }
            else if(form.emailusername.value == ""){
                Swal.fire(
                        'Username?',
                        'Username Not Entered',
                        'error'
                )
                return false;
            }
            else if(form.password.value == ""){
                Swal.fire(
                        'Password?',
                        'Password is not Entered',
                        'error'
                )
                return false;
            }
        }
    </script>
    <script src="scripts/script.js"></script>
    </body>
</html>