<?php

include 'connect.php';

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm = $_POST['confirm'];


if($password !==$confirm){
  echo "passwords do not match";
  exit;
}
  $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
  $sql ="INSERT INTO users(name,email,password)
  VALUES('$name','$email','$hashedpassword')";

  if (mysqli_query($conn,$sql)) {
    header("Location: login.php");
    exit;
  }else{
    echo "Error:" .mysqli_error($conn);
  }
  
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <div class="form">
     <div class="center">
        <h1>Sign Up</h1>
         
    <form action="signup.php" method="POST">
        <div>
        <label>Name</label>
        <input type="text" name="name"><br><br>
        </div>

        <div>
        <label>Email</label>
        <input type="text" name="email"><br><br>
        </div>

        <div>
        <label>Password</label>
        <input type="password" name="password"><br><br>
        </div>

        <div>
        <label>Confirm</label>
        <input type="password" name="confirm"><br><br>
        </div>
        
        <button type="submit"name="submit">Sign Up</button><br><br>

       <p>already have an account?</p> <a href="login.php">Login</a>
    </form>

    </div>
    </div>
</body>
</html>