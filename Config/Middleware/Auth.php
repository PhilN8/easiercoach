<?php

namespace Config\Middleware;

class Auth
{
    public function handle()
    {
        if (!$_SESSION['user'] ?? false) {
            header('location: /');
            exit();
        }
    }
}
