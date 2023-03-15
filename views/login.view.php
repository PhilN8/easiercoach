<?php require base_path("views/partials/nav.php"); ?>

<head>
    <link rel="stylesheet" href="../css/login.css">
</head>

<section class="login animate-opacity">
    <div class="container">

        <form action="/login" method="post" class="login__form" id="loginForm">
            <h2 class="login__form--title">Login</h2>

            <div class="login__form--box">
                <input type="text" placeholder=" " name="username" id="username" class="login__form--input">
                <label for="username" class="login__form--label">User Name</label><br>
            </div>

            <div class="login__form--box">
                <input type="password" id="password" name="password" placeholder=" " class="login__form--input w3-input"><br>
                <label for="password" class="login__form--label">Password</label>
            </div>
            
            <?php if(isset($error)): ?>
                <p class="login__error">* Invalid Credentials</p>
            <?php endif; ?>
            
            <button type="button" class="login__form--btn">Login</button>

        </form>

    </div>
</section>

<?php require base_path("views/partials/footer.php"); ?>
<script src="../scripts/login.js"></script>