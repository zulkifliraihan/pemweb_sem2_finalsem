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
                                    <img src="<?= base_url('assets/assets_landing/') ?>images/cars.png" alt="#" width="25%" height="25%">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navbar -->
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <nav class="navigation navbar navbar-expand-md navbar-dark" id="mainNav">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="#banner">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="#about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="#gallery">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="#contact">Contact Us</a>
                                </li>   
                                <?php if (($this->session->userdata('username')) and ($this->session->userdata('role') == 'public')) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?= base_url('booking/') ?>">Booking Car</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?= base_url('booking/riwayat') ?>">History</a>
                                    </li>
                                <?php elseif (($this->session->userdata('username')) and ($this->session->userdata('role') == 'administrator')) : ?>
                                    <li class="nav-item">
                                        <a class="btn btn-outline-warning mr-3" href="<?= base_url('admin/index') ?>">Admin Page</a>
                                    </li>
                                <?php endif; ?>
                                <!-- Jika sudah login munculkan button logout, jika belum munculkan button login -->
                                <?php if (!$this->session->userdata('username')) : ?>
                                    <li class="nav-item">
                                        <a class="btn btn-outline-info" href="<?= base_url('auth') ?>">Login</a>
                                    </li>
                                <?php else : ?>
                                    <li class="nav-item">
                                        <a class="btn btn-outline-danger" href="<?= base_url('auth/logout') ?>">Logout</a>
                                    </li>
                                <?php endif; ?>
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