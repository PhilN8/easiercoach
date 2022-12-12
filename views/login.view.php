<?php include("partials/nav.php"); ?>

<head>
    <link rel="stylesheet" href="../css/login.css">
</head>

<section class="login animate-opacity">
    <div class="container">

        <form action="backend/process_login.php" method="post" class="login__form" id="loginForm">
            <h2 class="login__form--title">Login</h2>

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?> <span onclick="this.parentElement.style.display = 'none';">&times;</span></p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?> <span onclick="this.parentElement.style.display = 'none';">&times;</span></p>
            <?php } ?>

            <!-- <?php if (isset($_GET['logout'])) { ?>
                        <p class="logout"><?php echo 'Logged out successfully'; ?> <span onclick="this.parentElement.style.display = 'none';">&times;</span></p>
                    <?php } ?> -->

            <div class="login__form--box">
                <input type="text" placeholder=" " name="uname" id="uname" class="login__form--input">
                <label for="uname" class="login__form--label">User Name</label><br>
            </div>

            <div class="login__form--box">
                <input type="password" id="password" name="password" placeholder=" " class="login__form--input w3-input"><br>
                <label for="password" class="login__form--label">Password</label>
            </div>

            <button type="submit" class="login__form--btn">Login</button>
        </form>

    </div>
</section>
<?php include("partials/footer.php"); ?>