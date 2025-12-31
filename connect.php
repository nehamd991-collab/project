<?php
/*
$host ="localhost";
$user ="root";
$pwd ="";
$db ="work";

$conn = mysqli_connect(
 $host,
 $user,
 $pwd,
 $db
);*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "work";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){
   die("connection failed: " . $conn->connect_error);
}

//echo "connected successfully";//
?>