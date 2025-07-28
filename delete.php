<?php
  include 'connect.php';

  $id = $_GET['id'];
  $query= "DELETE FROM feed WHERE id='$id'";
  $run = mysqli_query($con, $query);

  if(!$run){
    echo "delete Operation Failed";
  }
  else{
    header("location: list.php");
  }
?>