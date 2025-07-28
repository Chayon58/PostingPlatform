<?php
    include 'connect.php';

    $id= $_POST['id'];
    $uname= $_POST['uname'];
    $posts= $_POST['posts'];

    $query= "UPDATE feed SET username='$uname', posts"
?>