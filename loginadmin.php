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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="formstyle.css">		
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" href="images/mycal.png" type="image/x-icon">
    <title>MyCalorie</title>
    <script> 
        $(function(){
            $("#includedContent").load("styles/header.html"); 
        });
    </script> 
    <style>
    </style>
</head>

<?php
if (isset($_POST['submit'])) { 
        $emailusername = $_POST['emailusername'];
        $password = $_POST['password']; 
	    $login = $user->check_login($emailusername, $password);
	    if ($login) {
	        // Login is successful
	       header("location:adminhome.php");
	    } else {
	        // Login failed
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
                    <li><a href="index.php#home">Home</a></li>
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="login-page">
    <div class="form">
        <h4 style="color:#CD1E79;">LOGIN TO MYCALORIE</h3>
        <br>
        <form class="login-form" action="" method="POST" name="login">
        <input type="text" placeholder="Enter e-mail" name="emailusername" required=""/>
        <input type="password" placeholder="Enter password" name="password" required=""/>
        <input onclick="return(submitlogin());" type="submit" name="submit" value="Login" class="btnlogin" />
        </form>
    </div>
    </div>
    <script type="text/javascript" language="javascript">
        function submitlogin() {
            var form = document.login;
            if(form.emailusername.value == ""){
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
</body>

</html>