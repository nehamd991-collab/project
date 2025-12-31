<?php
include 'connect.php';
session_start();

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            // ✅ store only needed data
            $_SESSION['email'] = $row['email'];

            header("Location: homepage.php");
            exit;

        } else {
            echo "Wrong password";
        }

    } else {
        echo "User not found";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="home">
     <h1>Welcome   👋</h1>
   

<form action="login.php" method="POST">
     <button class="logout-btn" name=logout>Logout</button>
</form>
    </div>
</body>
</html>