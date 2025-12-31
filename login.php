<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'connect.php';

if (isset($_POST['submit'])) {

  $email = trim($_POST['email']);
  $password = $_POST['password'];

if($password !==$password){
  echo "passwords do not match";
  exit;
}
  $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
   $sql = "INSERT INTO users (email,password)
   VALUES ('$email','$hashedpassword')";
   $result = mysqli_query($conn, $sql);

    if (mysqli_query($conn,$sql)){
  header("Location: homepage.php");
            exit;
        } else {
            echo "error:". mysqli_error($conn);
        }

    }    

  


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="center">
        <h1>Login</h1>

    <form action="" method="POST">

       <div> 
        <label>Email</label>
        <input type="text" name="email"><br><br>
        </div>

        <div>
        <label>Password</label>
        <input type="password" name="password"><br><br>
         </div>

        <button type="submit" name="submit">Login</button><br><br>

       <p>don't have an account?</p> <a href="signup.php">Signup</a>
  
    </form>
     </div>
       </div>
</body>
</html>
