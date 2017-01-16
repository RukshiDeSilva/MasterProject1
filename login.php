<?php include 'core/init.php';
 if (empty($_POST) === false) {
       $username= $_POST['username'];
       $password=$_POST['password'];
       if (empty($username) === true or empty($password) === true) {?>
           <script language='javascript'>
                alert("Enter username and password!")
                </script>
      <?php 
        }
         else {
        $login=login($username,$password);
        if($login===false) {?>
          <script language='javascript'>
                alert("Invalid Username/Password combination! Please try again...") ;
            </script>
        <?php
        } 
        else{
          $_SESSION['user_id']=$login;
          header('Location:index.php');
          exit();
         }
       }
}
include 'include/headers/other.php';
?>













