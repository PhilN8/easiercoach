<?php

use Config\Response;

isset($_GET['id'])
    ? view("redirect.view.php", [
        'title' => "Thank You | EasyCoach Ke"
    ])
    : abort(Response::FORBIDDEN);
