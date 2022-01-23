<?php
session_start();
require 'config.php';
if (!empty($_POST)) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM users WHERE email = :email";
    $stmt = $pdo ->prepare($sql);
    $stmt -> bindValue(':email', $email);
    $stmt -> execute();
    $user=$stmt->fetch(PDO::FETCH_ASSOC);
    
    print'<pre>';
    print_r($user);

    if (empty($user)) {
        echo "<script>alert('Incorrect credentials,Try Again')</script>";
    } else {
        $validPassword=password_verify($password, $user['password']);
        if ($validPassword) {
            //code
            $_SESSION['user_id']=$user['user_id'];
            $_SESSION['logged_id']=time();
            //echo $_SESSION['user_id'];
            header('Location:index.php');
            exit();
        } else {
            echo "<script>alert('Incorrect credentials,Try Again')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
        <div class="card-body">
            <h1>Login</h1>
            <form class="" action="login.php" method="post">
                <div class="form-group">
                    <lable for="email">Email</lable>
                    <input class="form-control" type="text" name="email" value="" required>
                </div>
                <div class="form-group">
                    <lable for="password">Password</lable>
                    <input class="form-control" type="password" name="password" value="" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="Login">
                    <a href="register.php">Register</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>