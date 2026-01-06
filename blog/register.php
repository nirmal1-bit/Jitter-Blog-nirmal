<?php
require 'connection.php';

if (isset($_POST['submit'])) {
    $fullName = $_POST['fullname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    if (empty($fullName) ) {
       $message = "Please enter your fullname";
       $messageType = 'danger';
    }
    if (empty($number) ) {
       $message = "Please enter your number";
       $messageType = 'danger';
    }
    if (empty($email) ) {
       $message = "Please enter your email";
       $messageType = 'danger';
    }
    if (empty($password) ) {
       $message = "Please enter your password";
       $messageType = 'danger';
    }

    if (!empty($fullName) && !empty($number) && !empty($email) && !empty($password) ) {

        $timeStamp = date('Y-m-d H:i:s', time());

        $sql = "INSERT INTO users (fullname, phone, email, password, status, created_at) VALUE ('$fullName', '$number', '$email', '$passwordHash', 1, '$timeStamp')";

        if($conn->query($sql) === TRUE){
            $message = "User Registered Successfully!";
            $messageType = 'success';
        }
    }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php include 'include/navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-auto">
                <?php if(!empty($message)){ ?>
                    <div class="alert alert-<?= $messageType ?>">
                        <?= $message ?>
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="card-body">
                        <form action="register.php" method="post">
                            <label for="fname">Full Name</label>
                            <input type="text" name="fullname" placeholder="Enter your full name" class="form-control mb-3">
                            <label for="phone">Phone</label>
                            <input type="number" name="number" placeholder="Enter your number" class="form-control mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="Enter your email" class="form-control mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Enter your password" class="form-control mb-3">
                            <div class="d-flex gap-2">
                                <input type="submit" name="submit" value="Register" class="btn btn-primary w-50">
                                <input type="reset" value="Reset" class="btn btn-danger w-50">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="img/register.png" alt="Register" class="img-fluid">
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>