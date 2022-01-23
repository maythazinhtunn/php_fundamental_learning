<?php
session_start();
require 'config.php';
if (empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])) {
    echo "<script>alert('please login to continue');
    window.location.href='login.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
  
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $pdo_statement= $pdo -> prepare("SELECT * FROM post ORDER BY post_id DESC");
        $pdo_statement->execute();
        $result = $pdo_statement -> fetchAll();
        // print'<pre>';
        // print_r($result);
    ?>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <h1>Post Management</h1>
                <div>
                    <a href="add.php" class="btn btn-primary">Create New</a>
                    <a href="logout.php" class="btn btn-success" style="float: right;">Logout</a>
                </div></br>
                <thead>
                    <tr>
                        <th width="20%">Title</th>
                        <th width="40%">Description</th>
                        <th width="20%">Created At</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result) {
                            foreach ($result as $value) {
                                ?>
                    <tr>
                        <td><?php echo $value['title'] ?></td>
                        <td><?php echo $value['description'] ?></td>
                        <td><?php echo date('d-m-Y', strtotime($value['created_at'])) ?></td>
                        <td><a href="edit.php?id=<?php echo $value['post_id']?>" >Edit</a>
                        <a href="delete.php?id=<?php echo $value['post_id']?>" >Delete</a></td>

                    </tr>
                    <?php
                            }
                        }
                    ?>
                   
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>