<?php

namespace Config\Middleware;

class Auth
{
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            header('location: /login');
            exit();
        }
    }
}
