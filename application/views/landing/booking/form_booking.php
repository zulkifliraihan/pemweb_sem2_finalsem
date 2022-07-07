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
<div class="back_re">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h2>Form Booking</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Buat Tabel Kendaraan -->
<a href="<?= base_url('booking/') ?>" class="btn btn-outline-dark ml-3 mt-3"><i class="fa fa-long-arrow-left"></i>&nbsp;Back</a>
<div class="container">
    <div class="row mt-3" style="border: 3px solid green;">
        <div class="col-md-12 p-3">
            <div class="d-flex justify-content-around">
                <div>
                    <img src="<?= base_url('assets/assets_landing/images/' . $mobil->foto) ?>" alt="Mobil Terpilih" width="370">
                    <h1 class=""><?= $merk->nama . ' ' . $merk->produk ?></h1>
                    <div class="d-flex">
                        <p class="mr-3"><i class="fa fa-circle-user"></i>&nbsp;<?= $mobil->kapasitas ?></p>
                        <p><i class="fa fa-briefcase"></i>&nbsp;<?= $mobil->bagasi ?></p>
                    </div>
                    <p class="mt-3"><span style="color: blue; font-size: 30px;"><b>IDR <?= number_format($mobil->biaya_sewa); ?></b></span>/hari</p>
                </div>
                <form method="POST" action="<?= base_url('sewa/add_data') ?>" class="my-auto">
                    <input type="number" name="mobil_id" value="<?= $mobil->id ?>" hidden>
                    <input type="number" name="user_id" value="<?= $this->session->userdata('id') ?>" hidden>
                    <div class="form-group row">
                        <label for="tgl_pinjam" class="col-4 col-form-label">Tanggal Pinjam</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="tgl_pinjam" name="tgl_mulai" type="date" class="form-control" value="<?= date('Y-m-d') ?>" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar-check-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_kembali" class="col-4 col-form-label">Tanggal Kembali</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="tgl_kembali" name="tgl_akhir" type="date" class="form-control" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar-times-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tujuan" class="col-4 col-form-label">Tujuan</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="tujuan" name="tujuan" placeholder="Masukkan Tujuan" type="text" class="form-control" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fa fa-external-link"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ktp" class="col-4 col-form-label">No.KTP</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="ktp" name="noktp" placeholder="Masukkan Nomor KTP" type="text" class="form-control" pattern="[0-9]{0,}" title="Hanya Angka!" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fa fa-address-card-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>