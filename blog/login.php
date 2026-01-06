<?php
  session_start();
  require 'connection.php';

//   $_SESSION['email'] = 'abc@gmail.com';
//   $_SESSION['password'] = 'abc';

  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) ) {
       $message = "Please enter your email";
       $messageType = 'danger';
    }
    if (empty($password) ) {
       $message = "Please enter your password";
       $messageType = 'danger';
    }

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['isLogin'] = true;
            $_SESSION['userId'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['fullname'];
            header("Location: dashboard.php");
        }
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Blog</title>
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
                        <form action="login.php" method="post">
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="Enter your email" class="form-control mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Enter your password" class="form-control mb-3">
                            <div class="d-flex gap-2">
                                <input type="submit" name="submit" value="Login" class="btn btn-primary w-50">
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