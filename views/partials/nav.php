<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title  ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../../css/toastr.css" />
    <link rel="icon" href="../../img/title.jpeg" type="image/x-icon" />
</head>

<body>


    <header class="header">
        <div class="brand">
            <h1 class="brand__title">
                <a href="/" class="brand__title--link">EasyCoach Ke</a>
            </h1>
        </div>

        <nav class="navbar">
            <ul class="nav__list">
                <li class="nav__item"><a href="/" class="nav__link">Home</a></li>
                <li class="nav__item">
                    <a href="/about" class="nav__link">About Us</a>
                </li>
                <li class="nav__item">
                    <a href="/routes" class="nav__link">Routes</a>
                </li>
                <li class="nav__item">
                    <a href="/services" class="nav__link">Services</a>
                </li>
                <li class="nav__item">
                    <a href="/booking" class="nav__link nav__link--btn">Book Online</a>
                </li>
            </ul>
        </nav>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>