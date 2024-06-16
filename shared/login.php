<?php

session_start();
$_SESSION['login_status'] = false;

$uname = $_POST['username'];
$upass = $_POST['password'];

$hostname = "localhost";
$user = "root";
$password = "";
$dbname = "jay_acme";
$port = 3306;

$conn = new mysqli($hostname, $user, $password, $dbname, $port);

$cipher_pwd = md5($upass);
$query = "select * from user where username = '$uname' and password = '$cipher_pwd'";

$sql_result = mysqli_query($conn, $query);

if (mysqli_num_rows($sql_result) > 0) {
    echo "Login Success";
    $dbrow = mysqli_fetch_assoc($sql_result);
    print_r($dbrow);

    $_SESSION['login_status'] = true;
    $_SESSION['usertype'] = $dbrow['usertype'];
    $_SESSION['userid'] = $dbrow['userid'];

    if ($dbrow["usertype"] == "Vendor") {
        header("location:../vendor/home.php");
    }
    elseif ($dbrow["usertype"] == "Customer") {
        header("location:../customer/home.php");
    }
}

else {
    echo "Login Failed"."<br>";
    echo "Incorrect Username or Password";
}

