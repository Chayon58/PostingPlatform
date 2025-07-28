<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "test";
$con = mysqli_connect($host, $username, $password, $db);


if (!$con) {
    echo "connection failed  <br> ";
}
else{
    // echo "connection successful  <br> ";
}
?>