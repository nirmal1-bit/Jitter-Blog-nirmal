<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
                </li>
            </ul>
            <?php if (isset($_SESSION['isLogin'])) { ?>
                <a href="dashboard.php" class="btn btn-primary me-1">Dashboard</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>

            <?php } else { ?>

                <a href="register.php" class="btn btn-primary">Register</a>
                <a href="login.php" class="btn btn-outline-primary ms-2">Login</a>

            <?php  } ?>

        </div>
    </div>
</nav>