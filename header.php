<?php
    require_once 'functions/config.php';
    $conn->close(); 
    if (!isset($_SESSION)) {
        session_start();
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Joojo's Cuisine</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/logo.jpg" alt="" width="120" height="120" class="d-inline-block align-text-center">
                    Joojo's Cuisine
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                About Us
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="about.php">What We Do</a></li>
                                <li><a class="dropdown-item" href="contact.php">Contact Us</a></li>
                            </ul>
                        </li>
                        <!-- Other nav items -->
                        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dashboards
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="admin.php">Admin Panel</a></li>
                                <li><a class="dropdown-item" href="chef.php">Chef Dashboard</a></li>
                            </ul>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="chef.php">Chef</a>
                        </li>
                        <?php endif; ?>
                        <!-- Other nav items -->
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Food Discovery
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="localfood.php">Local</a></li>
                                <li><a class="dropdown-item" href="continentalfood.php">Continental</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="forum.php">Forum</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php if (isset($_SESSION['user_name'])): ?>
        <nav class="navbar justify-content-end align-items-center"
            style="background-color: #e3f2fd; padding-right: 50px;">
            <div class="text-end">
                Welcome, <?= htmlspecialchars($_SESSION['user_name']); ?>!
                <a href="functions/logout.php">Logout</a>
            </div>
        </nav>
        <?php endif; ?>

    </header>