<?php
require 'config.php';
if (!empty($_POST)) {
    $title=$_POST['title'];
    $desc=$_POST['description'];
    $created_at=$_POST['created_at'];
    $id=$_GET['id'];
    if ($_FILES) {
        $targetFile= 'images/'.($_FILES['image']['name']);
        $imageName=$_FILES['image']['name'];
        $imageType=pathinfo($targetFile, PATHINFO_EXTENSION);
        
        if ($imageType != 'png' && $imageType != 'jpg' && $imageType != 'jpeg') {
            //validation code
            echo "<script> alert('Image must be png or jpeg.')</script>";
        } else {
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
            $pdo_statement= $pdo -> prepare("UPDATE post SET title='$title',description='$desc',image='$imageName',created_at='$created_at' WHERE post_id=$id");
            $result=$pdo_statement -> execute();
        }
    } else {
        $pdo_statement= $pdo -> prepare("UPDATE post SET title='$title',description='$desc',created_at='$created_at' WHERE post_id=$id");
        $result=$pdo_statement -> execute();
    }
    if ($result) {
        echo "<script>alert('Record is updated');window.location.href='index.php';</script>";
    }
}

$pdo_statement=$pdo -> prepare("SELECT * FROM post WHERE post_id=".$_GET['id']);
$pdo_statement->execute();
$result = $pdo_statement -> fetchAll();
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
            <h1>Edit Record</h1>
            <form class="" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name='id' value="<?php $result[0]['post_id']; ?>">
                <div class="form-group">
                    <lable for="title">Title</lable>
                    <input class="form-control" type="text" name="title" value="<?php echo $result[0]['title'];  ?>" required>
                </div>
                <div class="form-group">
                    <lable for="description">Description</lable>                   
                    <textarea name="description" class="form-control" rows="8" cols="5"><?php echo $result[0]['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <lable for="image">Image</lable>  </br>
                    <img src="images/<?php echo $result[0]['image'];?>" width="100px" height="100px" alt="">                
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="form-group">
                    <lable for="created_at">Date</lable>
                    <input class="form-control" type="date" name="created_at" value="<?php echo date('Y-m-d', strtotime($result[0]['created_at'])) ?>" >
                </div>
               
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="Update">
                    <a href="index.php" class="btn btn-warning" >Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>