<?php
include 'connect.php'; 

$query = "SELECT * FROM feed";
$run = mysqli_query($con, $query);
if(mysqli_num_rows($run)>0) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewsFeed</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="table">
        <table>
            <tr>
                <th>User Name</th>
                <th>Posts</th>
                <th>Actions</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($run)){ ?>
            <tr>
                <td><?= $row['uname'] ?></td>
                <td><?= $row['posts'] ?></td>
                <td>
                    <a href="update.php?id=<?=$row['id'] ?>">Update</a> |
                    <a href="delete.php?id=<?=$row['id'] ?>">Delete</a> 
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>

<?php
}else{
    echo "No Records found";
}
?>