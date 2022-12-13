<?php

use Classes\User;

$user_records = User::all();
$all_ids = array_column($user_records, 'user_id');

if (isset($_POST['users']))
    echo json_encode(User::all());
