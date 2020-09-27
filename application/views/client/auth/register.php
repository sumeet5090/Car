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
	<br>
	<?php if (isset($_SESSION['flash'])) :?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<?= $_SESSION['flash']?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif;?>
	<br>
	<div class="container" style="width: 40rem">

		<div class="card">
			<div class="card-header text-center">
				<span class="display-4">Sign Up !!!</span>
			</div>
			<div class="card-body">
				<?= form_open('auth/register')?>

				<div class="form-row">
					<div class="form-group col-sm-6">
						<?= form_label('First Name :', 'first_name')?>
						<?= form_input('first_name','', 'class="form-control rounded-pill"')?>
						<?= form_error('first_name')?>
					</div>
					<div class="form-group col-sm-6">
						<?= form_label('Last Name :', 'last_name')?>
						<?= form_input('last_name','',  'class="form-control rounded-pill"')?>
						<?= form_error('last_name')?>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-12">
						<?= form_label('Email :', 'email')?>
						<?= form_input('email', '',  'class="form-control rounded-pill"')?>
						<?= form_error('email')?>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-6">
						<?= form_label('Phone :', 'phone')?>
						<?= form_input('phone', '', 'class="form-control rounded-pill"')?>
						<?= form_error('phone')?>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-sm-6">
						<?= form_label('Password :', 'password')?>
						<?= form_password('password', '', 'class="form-control rounded-pill"')?>
						<?= form_error('password')?>
					</div>
					<div class="form-group col-sm-6">
						<?= form_label('Confirm Password :', 'password_c')?>
						<?= form_password('password_c', '', 'class="form-control rounded-pill"')?>
						<?= form_error('password_c')?>
					</div>
				</div>
				<div class="text-center">
					<?= form_submit('register', '              Sign Up             ', 'class="btn btn-info rounded-pill"')?>
				</div>


				<?= form_close()?>
			</div>
			<div class="card-footer">
				<span>Already have an account? <?= anchor('auth/login', 'Login') ?></span>
			</div>

		</div>
	</div>
</div>
</body>
</html>
