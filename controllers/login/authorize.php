<?php
session_start();

use Classes\User;

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = (new User)->authenticate($username, $password);

    if (!$user) {
        return view('login.view.php', [
            'error' => 'Invalid credentials'
        ]);
        exit();
    }

    $_SESSION['user'] = $user;

    header('location:/admin');
    exit();
}
