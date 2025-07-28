<?php
include 'connect.php';

$id = $_GET['id'];
$query = "SELECT * FROM feed WHERE id='$id'";
$run = mysqli_query($con, $query);
$row= mysqli_fetch_assoc($run);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab5</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
       <!-- Navbar -->
       <div class="navbar">
        <div class="logo">
            <img src="Assets/logo.png" alt="Logo"> <!-- Put logo.png in your project folder -->
            Posting Platform
        </div>
        <form action="search.php" method="GET">
            <input type="text" name="q" placeholder="Search by name">
            <button type="submit">Search</button>
        </form>
    </div>
    <form action="set.php" method="post">
        <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>" >
        <input type="text" name="uname" id="uname" value="<?= $row['uname'] ?>" >
        <br><br>
        <textarea name="posts" id="posts" cols="30" rows="10"><?=$row['posts'] ?>"  </textarea>
        <br><br>
        <button>Update</button>
    </form>
</body>
</html>