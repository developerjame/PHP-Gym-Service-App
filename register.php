<?php

include('db_connect.php');

if(isset($_POST['submit']))
{
$name=$_POST['name'];
$username=$_POST['username'];
$password=($_POST['password']);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$query=mysqli_query($conn,"insert into users(name,username,password) values('$name','$username','$hashedPassword')");
if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";
	header('location:login.php');
}
}
?>



<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>login Form| online Clearance system</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
 <link rel="icon" type="image/png" sizes="16x16" href="images/logo2.png">
 <style type="text/css">
<!--
.style3 {
	color: #FF0000;
	font-weight: bold;
	font-size: 24px;
}
.style4 {color: #FF0000}
-->

</style>
<script type="text/javascript">
function valid()
{
 if(document.registration.password.value!= document.registration.password_again.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.registration.password_again.focus();
return false;
}
return true;
}
</script>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                
                <img src="images/logo1.png" alt="" width="200" height="100">
            </div>
            <p class="login-box-msg style2">REGISTER HERE TO INITIATE CLEARANCE</p>
            <form class="m-t" role="form" method= "POST" action="">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Full Name" required="">
                </div>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password_again" id="password_again" class="form-control" placeholder="Password Again" required="">
                </div>

                <button type="submit" name="submit" class="btn btn-primary block full-width m-b" id="submit">Register</button>




                <a href="#"><small>Forgot password?</small></a>
			
				
                <p class="text-muted text-center">&nbsp;</p>

            
                <a href="login.php">Login</a>
          </form>
            <p class="m-t"></p>
			
        </div>
    </div>
	
    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Success</strong> 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Error</strong> 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
</body>

</html>
