

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/assets_login/css/login.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div id="back">
        <div class="backRight"></div>
        <div class="backLeft"></div>
    </div>

    <div id="slideBox">
        <div class="topLayer">
            <div class="left">
                <div class="content-register h-50">
                    <!-- Pesan -->
                    <?php if ($this->session->flashdata('message', 'message_login_error')) : ?>
                        <div class="alert alert-danger close" role="alert">
                            <?= $this->session->flashdata('message', 'message_login_error'); ?>
                        </div>
                    <?php endif; ?>
                    <h2 class="text-success">Sign Up</h2>
                    <form id="register-form" action="<?= base_url('auth/register') ?>"  method="post">
                        <div class="form-group">
                            <input name="email" type="email" placeholder="Email" />
                            <input name="username" type="text" placeholder="Username" />
                            <input name="password" type="password" placeholder="Password" />
                            <input name="password2" type="password" placeholder="Confirm Password" />
                        </div>
                        <input class="btn btn-success mt-2" type="submit" value="Sign Up">
                        <br>
                        <p class="text-center mt-5 text-white-50" style="font-size: smaller;">-- Already Have Account? Login Here! --</p>
                        <button id="goLeft" class="btn btn-outline-info w-100" type="button">Login</button>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="content h-50">
                    <h2>Login</h2>
                    <form id="login-form" action="<?= site_url('auth/check') ?>" method="post">
                        <div class="form-group">
                            <input type="text" id="username" name="username" placeholder="Username" />
                            <input type="password" id="password" name="password" placeholder="Password" />
                        </div>
                        <input class="btn btn-info mt-2" id="login" type="submit" value="Login">
                        <br>
                        <p class="text-white-50 mt-5 text-center" style="font-size: smaller;">-- Don't Have Account? Register Here! --</p>
                        <button id="goRight" class="btn btn-outline-success w-100" type="button">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/assets_login/js/script.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
	// Start : Submit Form Login
	$('#login-form').on('submit', function (event) {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		event.preventDefault();

		Swal.fire({
			text: "Mohon menunggu..."
		});

		Swal.showLoading();

		$.ajax({
			url: $(this).attr("action"),
			method: "POST",
			data: new FormData(this),
			dataType: 'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success: (data) => {
				if (data.status == "200" && data.response == "success" && data.success == true) {
					Swal.close();
					Swal.fire({
						icon: 'success',
						title: 'Sukses',
						text: data.success_message,
					});

					setTimeout(function(){
						window.location.href = data.redirect_url;
					}, 1500);
				}
			},
			error: (data) => {
				if (data.responseJSON.status == "400" && data.responseJSON.response == "fail" && data.responseJSON.error == true) {
					Swal.fire({
						title: 'Perhatian!',
						html: data.responseJSON.error_message,
						icon: 'error',
						confirmButtonText: 'Oke'
					});
				}
			}
		});
	});
	// End : Submit Form Login

	// Start : Submit Form Register
	$('#register-form').on('submit', function (event) {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		event.preventDefault();

		Swal.fire({
			text: "Mohon menunggu..."
		});

		Swal.showLoading();

		$.ajax({
			url: $(this).attr("action"),
			method: "POST",
			data: new FormData(this),
			dataType: 'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success: (data) => {
				if (data.status == "200" && data.response == "success" && data.success == true) {
					Swal.close();
					Swal.fire({
						icon: 'success',
						title: 'Sukses',
						text: data.success_message,
					});

					setTimeout(function(){
						location.reload();
					}, 1500);
				}
			},
			error: (data) => {
				if (data.responseJSON.status == "400" && data.responseJSON.response == "fail" && data.responseJSON.error == true) {
					Swal.fire({
						title: 'Perhatian!',
						html: data.responseJSON.error_message,
						icon: 'error',
						confirmButtonText: 'Oke'
					});
				}
			}
		});
	});
	// End : Submit Form Register
	</script>
</body>

</html>

