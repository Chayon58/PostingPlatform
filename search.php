<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Results</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="logo">
      <img src="Assets/logo.png" alt="Logo">
      Posting Platform
    </div>
    <form action="search.php" method="GET">
      <input type="text" name="q" placeholder="Search by name or post">
      <button type="submit">Search</button>
    </form>
  </div>

  <div class="container">
    <?php
    if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
      $uname = trim($_GET['q']);
      $query = "SELECT * FROM feed WHERE uname LIKE ? OR posts LIKE ?";
      $stmt = mysqli_prepare($con, $query);
      $search = "%" . $uname . "%";
      mysqli_stmt_bind_param($stmt, "ss", $search, $search);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Username</th><th>Post</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($row['id']) . "</td>";
          echo "<td>" . htmlspecialchars($row['uname']) . "</td>";
          echo "<td>" . nl2br(htmlspecialchars($row['posts'])) . "</td>";
          echo "</tr>";
        }
        echo "</table>";
      } else {
        echo "<div class='message'>No post found for <strong>" . htmlspecialchars($uname) . "</strong>.</div>";
      }

      mysqli_stmt_close($stmt);
    } else {
      echo "<div class='message'>Please enter a name or post keyword to search.</div>";
    }
    ?>
  </div>
</body>
</html>
