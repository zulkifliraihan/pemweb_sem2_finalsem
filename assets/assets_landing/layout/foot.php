<!--  footer -->
<?php
require_once './layout/head.php';
?>
<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class=" col-md-4">
                    <h3>Contact US</h3>
                    <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>Jl. Setu Indah No.116, Tugu, Kec. Cimanggis, Kota Depok, Jawa Barat 16451</li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i>(+62)891230984565</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#">semobil_team@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Menu Link</h3>
                    <ul class="link_menu">
                        <li class="<?= ($file == 'index.php') ? 'active' : '' ?>"><a href="#">Home</a></li>
                        <li class="<?= ($file == 'about.php') ? 'active' : '' ?>"><a href="about.php">About</a></li>
                        <li class="<?= ($file == 'room.php') ? 'active' : '' ?>"><a href="room.php">Our Cars</a></li>
                        <li class="<?= ($file == 'gallery.php') ? 'active' : '' ?>"><a href="gallery.php">Gallery</a></li>
                        <li class="<?= ($file == 'contact.php') ? 'active' : '' ?>"><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>News letter</h3>
                    <form class="bottom_form">
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">subscribe</button>
                    </form>
                    <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">

                        <p>
                            &copy; 2022 All Rights Reserved. Design by <a href="https://html.design/">FranssMukti</a>
                            <br><br>
                            Develope by <a href="https://themewagon.com/" target="_blank">Semobil_Team</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/script.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<!-- Bootstrap Icons JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>