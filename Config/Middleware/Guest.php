<?php

namespace Config\Middleware;

class Guest {

    public function handle()
    {
        if($_SESSION['user_id'] ?? false) {
            header('location: /admin');
            exit();
        }
    }
}