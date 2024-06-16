<?php
$uname = $_POST['username'];
$upass = $_POST['password'];
$utype = $_POST['usertype'];

$cipher_password = md5($upass);

$conn = new mysqli("localhost", "root", "", "jay_acme", 3306);

$query = "insert into user(username,password,usertype) values('$uname', '$cipher_password', '$utype')";
mysqli_query($conn, $query);
echo"Form is submitted";

header("location:login.html");