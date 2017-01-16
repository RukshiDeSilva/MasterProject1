<?php

//connect to the database

 $conn= mysqli_connect('localhost','root','','warranty_management');

 //check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

} 

?>
