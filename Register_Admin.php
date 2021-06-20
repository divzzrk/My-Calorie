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
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>LOGIN</title><link rel="icon" href="images/mycal.png" type="image/x-icon">
    <link rel="stylesheet" href="formstyle.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="formstyle.css">		
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

  </head>
  <body>
<?php 
include_once 'include/Class_User.php';
$user = new User();
if (isset($_REQUEST['submit'])){

       // extract($_POST);
       $fullname = $_POST['txtName'];
       $uname = $_POST['username'];
       $upass = $_POST['password'];
       $uemail = $_POST['email'];
        $register = $user->reg_user($fullname, $uname, $upass, $uemail);
        if ($register) {
            // Registration Success
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { Swal.fire({ title: \'Success!\', text: \'New Admin Registration successfull!\', type: \'success\', confirmButtonText: \'OK\', timer: 3000,onAfterClose: function() {location.assign(\'adminhome.php\')}})';
						echo '}, 0);</script>';
        } else {
            // Registration Failed
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { Swal.fire({ title: \'Error!\', text: \'Sorry!!! Username or Password already exists!\', type: \'warning\', confirmButtonText: \'OK\'})';
						echo '}, 0);</script>';
        }
    }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="formstyle.css" />
  </head>
  <body>
      <div class="login-page">
    <div class="form">
        <form class="login-form" action="" method="POST" name="reg">
        <input type="text" placeholder="User Name" name="username" required=""/>
        <input type="password" name="password" placeholder="Password" required=""/>
        <input type="text" placeholder="Enter Your Full Name" name="txtName" required=""/>
        <input type="email" placeholder="e-mail" name="email" required=""/>
        <input class="btnlogin" type="submit" name="submit" value="Register" onclick="return(submitreg());">       
        <p class="message">Already Have An ID? <a href="index.php">Login</a></p>
        </form>
    </div>
    </div>
    <script>
      function submitreg() {
        var form = document.reg;
        if (form.username.value == "") {
          alert("Enter name.");
          return false;
        } else if (form.txtName.value == "") {
          alert("Enter username.");
          return false;
        } else if (form.pass.value == "") {
          alert("Enter password.");
          return false;
        } else if (form.email.value == "") {
          alert("Enter email.");
          return false;
        }
      }
    </script>
  </body>

  </html>