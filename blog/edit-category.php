<?php
require 'connection.php';
session_start();
if ($_SESSION['isLogin'] !== true) {
    header("Location: login.php");
}

$catId = $_GET['id'];
$selectQuery = "SELECT * FROM categories WHERE id = '$catId'";
$results = mysqli_query($conn,$selectQuery);
$category = mysqli_fetch_assoc($results);


if (isset($_POST['save'])) {
    $name  = $_POST['name'];
    $slug  = $_POST['slug'];

    if (empty($name) && empty($slug)) {
        $message = 'All fields are reuired';
        $messageType = 'danger';
    }else{
        $sql = "UPDATE categories SET name = '$name', slug = '$slug' WHERE id = '$catId'";
        if(mysqli_query($conn, $sql)===TRUE){
            $message = 'Category Updated Successfully.';
            $messageType = 'success';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'include/navbar.php'; ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-3">
                <ul class="list-group">
                    <a href="dashboard.php" class="list-group-item list-group-item-action">
                        Dashboard
                    </a>

                    <a href="list-category.php" class="list-group-item list-group-item-action active">
                        Categories
                    </a>
                    
                    <a href="" class="list-group-item list-group-item-action">
                        Posts
                    </a>
                    
                    <a href="" class="list-group-item list-group-item-action">
                        Users
                    </a>
                    
                    <a href="" class="list-group-item list-group-item-action">
                        Comments
                    </a>

                    <a href="logout.php" class="list-group-item list-group-item-action">
                        Logout
                    </a>
                </ul>
            </div>
            <div class="col-lg-9">
                <a href="list-category.php" class="btn btn-primary">All Category</a>
                <?php if(!empty($message)){ ?>
                    <div class="alert alert-<?= $messageType ?>">
                        <?= $message ?>
                    </div>
                <?php } ?>
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="edit-category.php?id=<?=$category['id']?>" method="post">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="<?=$category['name']?>">
                            </div>

                            <div class="mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control" value="<?=$category['slug']?>">
                            </div>

                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <button type="submit" name="save" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>