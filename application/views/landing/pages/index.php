<!-- banner -->
<section class="banner_main" id="banner">
    <!-- Pesan Berhasil Buat Data -->
    <?php if ($this->session->flashdata('message', 'message_login_error')) : ?>
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('message', 'message_login_error'); ?>
        </div>
    <?php endif; ?>
    <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" src="<?= base_url('assets/assets_landing/') ?>images/car7.jpg" alt="First slide">
                <div class="container">
                </div>
            </div>
            <div class="carousel-item">
                <img class="second-slide" src="<?= base_url('assets/assets_landing/') ?>images/car8.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="third-slide" src="<?= base_url('assets/assets_landing/') ?>images/car9.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<!-- end banner -->
<!-- about -->
<div class="about mt-5" id="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="titlepage">
                    <h2><a href="<?= base_url('#about') ?>">About Us</a></h2>
                    <p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their
                        dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their
                        software. Today it's seen all around the web; on templates, websites, and stock designs. Use our
                        generator to get your own, or read on for the authoritative history of lorem ipsum. </p>
                </div>
            </div>
            <div class="col-md-7">
                <div class="about_img">
                    <figure><img src="<?= base_url('assets/assets_landing/') ?>images/about2.jpg" alt="#" /></figure>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="gallery mt-5" id="gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2><a href="#gallery">gallery</a></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="gallery_img">
                    <figure><img src="<?= base_url('assets/assets_landing/') ?>images/cars3.jpg" alt="#" /></figure>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="gallery_img">
                    <figure><img src="<?= base_url('assets/assets_landing/') ?>images/cars4.jpg" alt="#" /></figure>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="gallery_img">
                    <figure><img src="<?= base_url('assets/assets_landing/') ?>images/cars7.jpg" alt="#" /></figure>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="gallery_img">
                    <figure><img src="<?= base_url('assets/assets_landing/') ?>images/car6.jpg" alt="#" /></figure>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="gallery_img">
                    <figure><img src="<?= base_url('assets/assets_landing/') ?>images/cars1.jpg" alt="#" /></figure>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="gallery_img">
                    <figure><img src="<?= base_url('assets/assets_landing/') ?>images/cars3.jpg" alt="#" /></figure>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="gallery_img">
                    <figure><img src="<?= base_url('assets/assets_landing/') ?>images/cars4.jpg" alt="#" /></figure>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="gallery_img">
                    <figure><img src="<?= base_url('assets/assets_landing/') ?>images/cars8.jpg" alt="#" /></figure>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end gallery -->
<!-- contact -->
<div class="blog mt-5" id="contact" style="background: url(<?= base_url('assets/assets_landing/') ?>images/bg_contact1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2><a href="#contact" style="color: white;" onmouseover="this.style.color='#17a2b8'" onmouseout="this.style.color='white'">contact us</a></h2>
                    <p>Hubungi Kami di bawah ini</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form id="#request" class="main_form">
                    <div class="row">
                        <div class="col-md-12 ">
                            <input class="contactus" placeholder="Name" type="type" name="Name">
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Email" type="type" name="Email">
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Phone Number" type="type" name="Phone Number">
                        </div>
                        <div class="col-md-12">
                            <textarea class="textarea" placeholder="Message" type="type" Message="Name">Message</textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="send_btn" style="color: black;">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="map_main">
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2395.346162677992!2d106.83306531394307!3d-6.353358673166683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec6b07b68ea5%3A0x17da46bdf9308386!2sSTT%20Terpadu%20Nurul%20Fikri%20-%20Kampus%20B!5e0!3m2!1sen!2sid!4v1656597931085!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end contact -->