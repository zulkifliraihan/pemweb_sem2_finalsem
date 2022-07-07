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
                                    <a class="nav-link page-scroll" href="<?= base_url('landing/') ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?= base_url('booking/') ?>">Booking Car</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('booking/riwayat') ?>">History</a>
                                </li>
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
<div class="back_re">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h2>Booking A Car</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Buat Tabel Kendaraan -->
<div class="container">
    <?php foreach ($mobil as $mb) : ?>
        <div class="row mt-3" style="border: 3px solid green;">
            <div class="col-md-12 p-3">
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <img width="200" height="200" src="<?= base_url('assets/public/dashboard/mobil/' . $mb->foto) ?>" alt="Mitsubishi Xpander">
                        <div class="d-flex flex-column my-auto ml-3" style="width: 200px;">
                            <?php
                            $merk = $mb->merk_id;
                            $merk_nama = $this->db->get_where('merk', ['id' => $merk])->row();
                            ?>
                            <h3 class="text-center"><?= $merk_nama->nama . ' ' . $merk_nama->produk ?></h3>
                            <div class="d-flex justify-content-around">
                                <p><i class="fa fa-circle-user"></i>&nbsp;<?= $mb->kapasitas ?></p>
                                <p><i class="fa fa-briefcase"></i>&nbsp;<?= $mb->bagasi ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column text-right my-auto">
                        <p style="margin-bottom: 5px;">Mulai dari</p>
                        <p style="margin-bottom: 5px;"><span style="color: blue; font-size: 30px;"><b>IDR <?= number_format($mb->biaya_sewa); ?></b></span>/hari</p>
                        <form action="<?= base_url('booking/form') ?>" method="post">
                            <input type="number" name="id" value="<?= $mb->id ?>" hidden>
                            <input type="number" name="merk_id" value="<?= $mb->merk_id ?>" hidden>
                            <a href="<?= base_url('booking/form') ?>">
                                <input type="submit" class="btn btn-outline-primary align-self-end" style="border-radius: 30px; width: 50%;" value="PILIH">
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
