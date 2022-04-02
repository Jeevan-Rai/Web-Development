<?php

$host = 'localhost';
$uname = 'root';
$pass = '';
$db = 'phone_shop';

$conn = mysqli_connect($host,$uname,$pass,$db);

if($conn->connect_error){
    die('Failed to connect to database'.$conn->connect_error);
}

echo 'Connected to database Successfully!!'; 

?>