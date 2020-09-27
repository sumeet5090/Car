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
<div class="container" style="width: 28rem">
	<div class="card">
		<div class="card-header text-center">
			<span class="display-4">Admin Login</span>
		</div>
		<div class="card-body">
			<?= form_open('admin/auth/login')?>

			<div class="form-group">
				<?= form_label('Email :', 'email')?>
				<?= form_input('email', '', 'class="form-control rounded-pill"')?>
				<?= form_error('email')?>
			</div>

			<div class="form-group">
				<?= form_label('Password : ', 'password')?>
				<?= form_password('password', '', 'class="form-control rounded-pill"')?>
				<?= form_error('password')?>
			</div>

			<?= form_submit('login', 'Sign In', 'class= "btn btn-lg btn-info btn-block rounded-pill"')?>

			<?= form_close()?>
		</div>
		<div class="text-center">
			<?= anchor('admin/auth/password/forgot', 'Forgot password?')?>
		</div>
		<br>
		<div class="card-footer text-center">
			<span>Dont have an account? </span><?= anchor('admin/auth/register', 'Create one')?>
		</div>
	</div>

</div>
<!--<div class="container" style="background-color: #0000FF">....</div>-->
<!--<div class="container-fluid" style="background-color: #1e7e34">....</div>-->
