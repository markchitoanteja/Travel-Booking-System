<?php
$database = new Database();

if (session("user_id")) {
    $user_data = $database->select_one("users", ["id" => session("user_id")]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Grand Tours</title>

    <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/fonts.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">Grand<span>Tours</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= session("page") == "home" ? "active" : null ?>"><a href="/" class="nav-link">Home</a></li>
                    <li class="nav-item <?= session("page") == "about" ? "active" : null ?>"><a href="about" class="nav-link">About</a></li>
                    <li class="nav-item <?= session("page") == "vans" ? "active" : null ?>"><a href="vans" class="nav-link">Vans</a></li>
                    <li class="nav-item <?= session("page") == "contact" ? "active" : null ?>"><a href="contact" class="nav-link">Contact</a></li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= session("user_id") ? $user_data["name"] : "Account" ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if (session("user_id")): ?>
                                <a class="dropdown-item" href="javascript:void(0)" id="account_settings" user_id="<?= session("user_id") ?>">Account Settings</a>
                                <?php if (session("user_type") == "admin"): ?>
                                    <a class="dropdown-item <?= session("page") == "manage_bookings" ? "active" : null ?>" href="manage_bookings">Manage Bookings</a>
                                    <a class="dropdown-item <?= session("page") == "manage_vans" ? "active" : null ?>" href="manage_vans">Manage Vans</a>
                                    <a class="dropdown-item <?= session("page") == "manage_messages" ? "active" : null ?>" href="manage_messages">Manage Messages</a>
                                <?php else: ?>
                                    <a class="dropdown-item <?= session("page") == "my_bookings" ? "active" : null ?>" href="my_bookings">My Bookings</a>
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#system_description_modal">Developers</a>
                                <?php endif ?>
                                <a class="dropdown-item" href="javascript:void(0)" id="logout">Logout</a>
                            <?php else: ?>
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#login_modal">Login</a>
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#register_modal">Register</a>
                            <?php endif ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>