<?php
require 'config.php';
if (!empty($_POST)) {
    $username=$_POST['username'];
    $email=$_POST['email'];
    $useremail=$_POST['email'];
    $password=$_POST['password'];
   
    if ($username == '' || $useremail == '' || $password =='') {
        echo "<script> alert('Fill the form data')</script>";
    } else {
        
        //query
        $sql="SELECT count(email) as numemail FROM users WHERE email = :useremail";
        $stmt = $pdo -> prepare($sql);
    
        //bind statment
       
        $stmt->bindValue(':useremail', $useremail);
        
        //execute statement
        $stmt->execute();

        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        //var_dump($row);
        if ($row['numemail'] > 0) {
            //echo "<script> alert ('This user\'s email already exists')</script>";
        } else {
            $passwordHash=password_hash($password, PASSWORD_BCRYPT);
            $sql="INSERT INTO users(username,email,password) VALUES (:username,:email,:password)";
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindValue(':username', $username);
            $stmt -> bindValue(':email', $email);
            $stmt -> bindValue(':password', $passwordHash);
            $result= $stmt->execute();
            if ($result) {
                echo "Thanks for your registeration!"." <a href=login.php>Login</a>";
            }
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
    <title>Registeration Form</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h1>Register</h1>
            <form class="" action="register.php" method="post">
                <div class="form-group">
                    <lable for="username">Name</lable>
                    <input class="form-control" type="text" name="username" value="" required>
                </div>
                <div class="form-group">
                    <lable for="email">Email</lable>
                    <input class="form-control" type="text" name="email" value="" required>
                </div>
                <div class="form-group">
                    <lable for="password">Password</lable>
                    <input class="form-control" type="password" name="password" value="" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="Register">
                    <a href="login.php">login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>