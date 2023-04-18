<?php

namespace Config\Middleware;

class Auth
{
    public function handle()
    {
<<<<<<< HEAD
        if (!isset($_SESSION['user'])) {
            header('location: /login');
=======
        if(!$_SESSION['user'] ?? false) {
            header('location: /');
>>>>>>> 994c099b6b55581098d98f8974b18f7dd135fe06
            exit();
        }
    }
}
