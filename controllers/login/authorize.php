<?php
session_start();

use Classes\User;

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = (new User)->authenticate($username, $password);
    // dd($user);

    if (!$user) {
        return view('login.view.php', [
            'error' => 'Invalid credentials' 
        ]);
        exit();
    }

    $_SESSION['name'] = $user['first_name'];
    $_SESSION['user_name'] = $user['user_name'];
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['msg'] = "Login Successful";

    header('location:/admin');
    exit();
}