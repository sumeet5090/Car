<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css')?>">
	<script type="text/javascript" src="<?= base_url('assets/jquery.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.js')?>"></script>
	<title>Car Insurance</title>
</head>
<body>
<div class="container-fluid">

	<?php if (isset($_SESSION['flash'])) :?>

	<div class="container" style="width: 28rem">
		<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">

			<?= $_SESSION['flash']?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>

		</div>
	</div>
	<?php endif;?>
	<br><br><br>
	<div class="container " style="width: 28rem">
		<div class="card shadow">
			<div class="card-header text-center">
				<span class="display-4">Login</span>
			</div>
			<div class="card-body">
				<?= form_open('auth/login')?>

					<div class="form-group border-bottom">
						<?= form_input('email', '', 'class="form-control border-0", placeholder="Email"')?>
					</div>
					<?= form_error('email')?>

					<div class="form-group border-bottom">
						<?= form_password('password', '', 'class="form-control border-0", placeholder="Password"')?>
					</div>
					<?= form_error('password')?>

					<?= form_submit('login', 'LOGIN', 'class= "btn btn-lg btn-info btn-block rounded-pill"')?>

				<?= form_close()?>
			</div>
			<div class="text-center">
				<?= anchor('auth/password/forgot', 'Forgot password?')?>
			</div>
			<br>
			<div class="card-footer text-center">
				<span>Don't have an account? </span><?= anchor('auth/register', 'Register Now')?>
			</div>
		</div>
	</div>
	<!--<div class="container" style="background-color: #0000FF">....</div>-->
	<!--<div class="container-fluid" style="background-color: #1e7e34">....</div>-->
</div>
</body>
</html>


