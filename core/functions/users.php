<?php


function user_data($user_id) {
    $data= array();
    $user_id=(int)$user_id;

    $func_num_args=func_num_args();
    $func_get_args=func_get_args();

    if ($func_num_args > 1) {
        unset($func_get_args[0]);

        $fields='`' . implode('`, `',$func_get_args) . '`';

        $conn= mysqli_connect('localhost','root','','warranty_management');
        $query=mysqli_query($conn,"SELECT $fields FROM users WHERE user_id=$user_id");
        $data=mysqli_fetch_assoc($query);
        return $data;
       die();

    }

}

//check the login
function logged_in() {

    return (isset($_SESSION['user_id'])) ? true : false;
}


//fetch id from username
function user_id_from_username($username) {
    $conn= mysqli_connect('localhost','root','','warranty_management');
    $username=sanitize($username);
    $query=mysqli_query($conn,"SELECT user_id FROM users WHERE username = '$username'");
    $fetcharray=mysqli_fetch_array($query,MYSQLI_NUM);
    return $fetcharray[0];
}




function login($username,$password) {
    $conn= mysqli_connect('localhost','root','','warranty_management');
    $user_id=user_id_from_username($username);
  


    $username=sanitize($username);
    $password=md5($password);
 





    $query=mysqli_query($conn,"SELECT * FROM users WHERE username= '$username' AND password='$password' AND active ='1'");
    $result=mysqli_num_rows($query);
    return ($result==1) ? $user_id :false;
    
}




function role_from_username($username,$password){
    $conn= mysqli_connect('localhost','root','','warranty_management');
    $username=sanitize($username);
	$password=md5($password);
    $query=mysqli_query($conn,"SELECT role FROM users WHERE username='$username' AND password = $password");
    $fetcharray=mysqli_fetch_array($query,MYSQLI_NUM);
	$role = $fetcharray[0];
    return $fetcharray[0];
	
}


  function output_errors($errors) {
    return '<ul><li>'. implode('</li><li>',$errors) . '</li></ul>';
}


/*function restrict_pages ($role){
	if (isset($role) {
      if ($role == 'admin') {
          if (!session_id())
              session_start();
          $_SESSION['logon'] = true;

          header('Location: .php');
          die();
      }
	
	
	
}

}
*/
 ?>
