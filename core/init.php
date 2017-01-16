<?php

// Start the session

session_start();


require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';



if (logged_in()===true) {
    $session_user_id=$_SESSION['user_id'];
    $user_data=user_data($session_user_id,'user_id','username','password','f_name','l_name','email','role');
   
}
else {
	echo "not sucess" ;
}

?>
