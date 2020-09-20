<div class="form-row">
	<?= validation_errors()?>
	<?= form_open()?>

	<?= form_label('first_name', 'First Name')?>
	<?= form_input('first_name','')?>
	<!--	--><?//= form_error('first_name')?>

	<?= form_label('last_name', 'Last Name')?>
	<?= form_input('last_name','')?>
	<!--	--><?//= form_error('name')?>

	<?= form_label('email', 'Email')?>
	<?= form_input('email', '')?>
	<!--	--><?//= form_error('email')?>

	<?= form_label('phone', 'Phone')?>
	<?= form_input('phone', '')?>
	<!--	--><?//= form_error('email')?>

	<?= form_label('password', 'password')?>
	<?= form_password('password', '')?>
	<!--	--><?//= form_error('password')?>

	<?= form_label('password_c', 'password')?>
	<?= form_password('password_c', '')?>
	<!--	--><?//= form_error('password_c')?>

	<?= form_submit('register', 'Register', 'class="btn btn-primary"')?>

	<?= form_close()?>

	<?= anchor('admin/auth/login', 'Login', 'class="btn btn-success"')?>

</div>
