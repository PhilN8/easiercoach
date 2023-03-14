<?php

use Config\Response;

$title = "Thank You | EasyCoach Ke";

isset($_GET['id'])
    ? view("redirect.view.php", [
        'title' => "Thank You | EasyCoach Ke"
    ])
    : abort(Response::FORBIDDEN);
