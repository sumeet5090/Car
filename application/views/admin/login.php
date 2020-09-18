<div class="form-row">

	<?= form_open()?>

	<?= form_label('email', 'Email')?>
	<?= form_input('email', '')?>
	<?= form_error('email')?>

	<?= form_label('password', 'password')?>
	<?= form_input('password', '')?>
	<?= form_error('password')?>

	<?= form_submit('login', 'Login')?>

	<?= form_close()?>

</div>
