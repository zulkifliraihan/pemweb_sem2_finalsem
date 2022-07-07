<?php
require_once './layout/head.php';
?>
<!-- header -->
<header class="sticky-top">
    <!-- header inner -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="#banner" class="page-scroll">
                                    <img src="images/cars.png" alt="#" width="25%" height="25%">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navbar -->
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <nav class="navigation navbar navbar-expand-md navbar-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item <?= ($file == 'index.php') ? 'active' : '' ?>">
                                    <a class="nav-link page-scroll" href="index.php">Home</a>
                                </li>
                                <li class="nav-item <?= ($file == 'about.php') ? 'active' : '' ?>">
                                    <a class="nav-link page-scroll" href="about.php">About</a>
                                </li>
                                <li class="nav-item <?= ($file == 'room.php') ? 'active' : '' ?>">
                                    <a class="nav-link page-scroll" href="room.php">Our Cars</a>
                                </li>
                                <li class="nav-item <?= ($file == 'gallery.php') ? 'active' : '' ?>">
                                    <a class="nav-link page-scroll" href="gallery.php">Gallery</a>
                                </li>
                                <li class="nav-item <?= ($file == 'contact.php') ? 'active' : '' ?>">
                                    <a class="nav-link page-scroll" href="contact.php">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header inner -->
<!-- end header -->