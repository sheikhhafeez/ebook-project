<?php
session_start();
include "../assets/includes/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login-auth/login.php");
    exit();
}

?>
<div id="header-wrap">

    <div class="top-content">
        <div class="container-fluid">
            <div class="row">
                <header id="header">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <div class="main-logo">
                                    <a href="index.php"><img src="../assets/images/download1.png" alt="Logo" width="100" height="60"></a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <nav id="navbar">
                                    <div class="main-menu stellarnav">
                                        <ul class="menu-list d-flex justify-content-end gap-4">
                                            <li class="menu-item active"><a href="index.php">HOME</a></li>
                                            <li class="menu-item"><a href="about.php">ABOUT</a></li>
                                            <li class="menu-item"><a href="shop.php">SHOP</a></li>
                                            <li class="menu-item"><a href="contact.php">CONTACT</a></li>
                                            <li class="menu-item"><a href="download.php">DOWNLOAD APP</a></li>
                                            <li class="menu-item"><a href="competition.php">COMPETITION</a></li>
                                            <li class="menu-item"><a href="http://localhost/ebook-project/dashboard/login-auth/logout.php">Logout</a>
                                                </a></li>
                                        </ul>
                                        <div class="hamburger">
                                            <span class="bar"></span>
                                            <span class="bar"></span>
                                            <span class="bar"></span>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </div>