<?php
    session_start();
    include_once 'include/Class_User.php';
    $user = new User();
?>
<html>
<head>
    <title>LOGIN</title><link rel="icon" href="images/mycal.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="formstyle.css">		
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<?php
if (isset($_POST['submit'])) { 
        $emailusername = $_POST['emailusername'];
        $password = $_POST['password']; 
	    $login = $user->check_login($emailusername, $password);
	    if ($login) {
	        // Registration Success
	       header("location:adminhome.php");
	    } else {
	        // Registration Failed
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { Swal.fire({ title: \'Error!\', text: \'Sorry!!! Invalid Username or Password!\', type: \'warning\', confirmButtonText: \'OK\'})';
		    echo '}, 0);</script>';
	    }
	}


?>
<body>
    
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
                            'The Username?',
                            'Username Not Entered',
                            'error'
                    )
					return false;
				}
				else if(form.password.value == ""){
					Swal.fire(
                            'The Password?',
                            'Password is not Entered',
                            'error'
                    )
					return false;
				}
			}
</script>
</body>

</html>