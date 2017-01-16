<?php

// Start the session

session_start();


require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';



if (logged_in()===true) {
    $session_user_id=$_SESSION['user_id'];
   
}
else {
	echo "login failed" ;
}


?>
