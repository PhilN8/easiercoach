<?php

namespace Config\Middleware;

class Guest {

    public function handle()
    {
        if($_SESSION['user'] ?? false) {
            header('location:/admin');
            exit();
        }
    }
}