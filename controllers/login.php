<?php
session_start();
$title = "Login | EasyCoach Ke";

!isset($_SESSION['user_id']) ? require "views/login.view.php" : header("location:/admin");

use Classes\User;

function returnJson($data)
{
    ob_clean();
    header_remove();
    header('Access-Control-Allow-Origin: *');
    header("Content-type: application/json; charset=utf-8");
    http_response_code(200);
    echo json_encode($data);
    exit();
}

if (isset($_POST['uname']) && isset($_POST['password'])) {

    $username = validate($_POST['uname']);
    $password = validate($_POST['password']);

    $user = (new User)->authenticate($username, $password);

    if (!(new User)->authenticate($username, $password)) {
        returnJson(['message' => 2]);
    }

    $_SESSION['name'] = $user['first_name'];
    $_SESSION['user_name'] = $user['user_name'];
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['msg'] = "Login Successful";
    header("location:/admin");

    exit();
}
