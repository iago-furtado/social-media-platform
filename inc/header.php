<?php 
    // starts the session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Coding Social Media</title>
      <meta name="description" content="Creating a social media for IT professionals.">
      <meta name="robots" content="noindex, nofollow">
      <!--  CSS  -->
      <link rel="stylesheet" href="./css/style.css">
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
      <!-- Fav icon -->
      <link rel="icon" type="image/x-icon" href="https://mpng.subpng.com/20190415/lja/kisspng-source-code-editor-text-editor-editing-computer-so-5cb40e54ec6435.7143285215553040209683.jpg">
      <!-- Google font -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
      <!-- Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- Header -->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2" href="index.php">
                <img class="logo-img"
                    src="https://t4.ftcdn.net/jpg/04/92/55/15/360_F_492551542_UiAoH0DyhL1ZHH9T24masCQZBa95DyW1.jpg"
                    alt="Logo"
                />
                </a>
                <!-- Toggle button -->
                <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarButtonsExample"
                aria-controls="navbarButtonsExample"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                <i class="fas fa-bars"></i>
                </button>
                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtonsExample">
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="about.php">ABOUT</a>
                        </li>
                        <?php
                        // User is legged in
                            if(isset($_SESSION["useruid"])) {
                                echo "<li class='nav-item'>
                                    <a class='nav-link' href='profile.php'>AVATAR</a>
                                    </li>";
                                echo "<li class='nav-item'>
                                    <a class='nav-link' href='users.php'>USER LIST</a>
                                    </li>";
                            }
                        ?>
                    </ul>
                    <!-- Left links -->
                    <?php
                        // User is Logged in
                        if(isset($_SESSION["useruid"])) {
                            echo '<a class="d-flex align-items-center" href="inc/logout.inc.php">
                                    <button type="button" class="btn btn-link px-3 me-2">
                                        Logout
                                    </button>
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                                 </a>';
                        }
                        // User is Logged off
                        else{
                            echo '<a class="d-flex align-items-center" href="https://lamp.computerstudi.es/~Iago200507139/project/login.php">
                                    <button type="button" class="btn btn-link px-3 me-2">
                                            Login
                                    </button>
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                                </a>
                                    <a class="d-flex align-items-center" href="https://lamp.computerstudi.es/~Iago200507139/project/signup.php">
                                    <button type="button" class="btn btn-link px-3 me-2">
                                        Register
                                    </button>
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                                </a>';
                        }
                    ?>
 
                </div>
            </div>
        </nav>
    </header>