<?php
require 'config.php';
if (!empty($_POST)) {
    $targetFile= 'images/'.($_FILES['image']['name']);
    $imageType=pathinfo($targetFile, PATHINFO_EXTENSION);
    
    if ($imageType != 'png' && $imageType != 'jpg' && $imageType != 'jpeg') {
        //validation code
        echo "<script> alert('Image must be png or jpeg.')</script>";
    } else {
        $move = move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
        $sql="INSERT INTO post(title,description,image,created_at) VALUES(:title,:description,:image,:created_at)";
        $pdo_statement = $pdo->prepare($sql);
        $result = $pdo_statement -> execute(array(":title" => $_POST['title'],':description' => $_POST ['description'],':image'=> $_FILES['image']['name'],':created_at' => $_POST['created_at']));
        if ($result) {
            echo "<script> alert('Record is added'); window.location.href='index.php';</script>";
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
    <title>New Record</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
        <div class="card-body">
            <h1>Add New Record</h1>
            <form class="" action="add.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <lable for="title">Title</lable>                  
                    <input class="form-control" type="text" name="title" value="" required>
                </div>
                <div class="form-group">
                    <lable for="description">Description</lable>                   
                    <textarea name="description" class="form-control" rows="8" cols="5"></textarea>
                </div>
                <div class="form-group">
                    <lable for="image">Image</lable>                   
                    <input class="form-control" type="file" name="image" required>
                </div>
                <div class="form-group">
                    <lable for="created_at">Date</lable>
                    <input class="form-control" type="date" name="created_at" value="" >
                </div>
               
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="ADD">
                    <a href="index.php" class="btn btn-warning" >Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>