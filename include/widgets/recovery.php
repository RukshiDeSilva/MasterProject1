<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Screen</title>
    <link rel="stylesheet" type="text/css" href="../../css/recover.css">
    <style>
        input[type=submit] {
            border-radius: 5px;
            font-family: Tahoma;
            background: ;
            /* Old browsers */
            background: -moz-linear-gradient(top, #f4f4f4 1%, #ededed 100%);
            /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(1%, #f4f4f4), color-stop(100%, #ededed));
            /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, #f4f4f4 1%, #ededed 100%);
            /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top, #f4f4f4 1%, #ededed 100%);
            /* Opera 11.10+ */
            background: -ms-linear-gradient(top, #f4f4f4 1%, #ededed 100%);
            /* IE10+ */
            background: linear-gradient(to bottom, #f4f4f4 1%, #ededed 100%);
        /

        }
    </style>
    <script>
        window.console = window.console || function(t) {};
        window.open = function(){ console.log('window.open is disabled.'); };
        window.print = function(){ console.log('window.print is disabled.'); };
        if (false) {
            window.ontouchstart = function(){};
        }
    </script>

    <script src='js/jquery.js'></script>
    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage('resize', "*");
        }
    </script>
    <script src="js/timeout.js"></script>
    <script>
        $('#login-button').click(function (event) {
            event.preventDefault();
            $('form').fadeOut(800);
            $('.wrapper').addClass('form-success');
        });
    </script>
</head>
<?php

include '../../core/init.php';


if (isset($_POST['send'])) {
$username = $_POST['username'];
$user_id= user_id_from_username($username);

$sql = "SELECT password FROM users WHERE user_id = '$user_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc() ){
$current_password = $row['password'];
 

  if (md5($_POST['current_password']) === $current_password) {

     if (trim($_POST['password']) != trim($_POST['password_again']) ) { ?>
     <script language='javascript'>
                alert("Passwords you entered do not match ! Please try again...") ;
            </script>
     <? }
	else {
  $user_id=user_id_from_username($username);
  $password = $_POST['password'];	 
  $password=md5($password);
  $conn= mysqli_connect('localhost','root','','warranty_management');
  mysqli_query($conn,"UPDATE users SET password = '$password' WHERE user_id = '$user_id'");?>
		<script language='javascript'>
                alert("Password Updated Successfully") ;
            </script>
		
	<?php }
  header('Location:http://localhost/MasterProject/login.php');
  } else {?>
    <script language='javascript'>
                alert("Your Current Password is incorrect !") ;
            </script>
 <?php }
	
	
}	
}
}





?>
<body>

<div class="wrap">

  

   

    <div class="container">
      
            <form class="form" action="" method="post">
				<input type="text" name="username" placeholder="Username" />
				<input type="password" name="current_password" placeholder="Current Password" />
                <input type="password" name="password" placeholder="New Password" />
				<input type="password" name="password_again" placeholder="Confirm Password" />
                <button class="submit" name="send" value="Login">Update</button><br/><br>
    </div>
	  <a href="http://localhost/MasterProject/login.php">
    <button class="backLg">Back to Login</button>
    </a>
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
</body>
</html>
