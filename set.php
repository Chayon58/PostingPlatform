<?php
    include 'connect.php';

    $id= $_POST['id'];
    $uname= $_POST['uname'];
    $posts= $_POST['posts'];

    $query= "UPDATE feed SET uname='$uname', posts= '$posts'
                WHERE id ='$id'";
    $run= mysqli_query($con, $query);

if(!$run){
    echo"Submission Failed";
}
else{
    echo("location: list.php");
}
?>