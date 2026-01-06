<?php

$server = 'localhost';
$user = 'root';
$password = '';
$databaseName = 'blog_db';
$port = 3306;
$conn = mysqli_connect($server, $user, $password, $databaseName, $port);
if (!$conn) {
    echo "Coonection failed" ;
}else{
   // echo "Connected Successfully.";
}