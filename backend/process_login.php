<?php
// ob_start();
session_start();
require_once "../autoload.php";

use Classes\User;

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = (new User)->authenticate($username, $password);

    if (!$user) {
        returnJson(['message' => 1]);
    }

    $_SESSION['name'] = $user['first_name'];
    $_SESSION['user_name'] = $user['user_name'];
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['msg'] = "Login Successful";

    echo "<script>window.location.href = '/admin'</script>";
    exit();
}

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
