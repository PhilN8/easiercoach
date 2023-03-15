<?php

namespace Config\Middleware;

class Auth {

    public function handle()
    {
        if( !$_SESSION['user_id'] ?? false) {
            header('location: /');
            exit();
        }
    }
}