<?php if (isset($_SESSION['flash'])) :?>
	<?php //echo '<script>alert('.$_SESSION['flash'].')</script>'?>
	<?= $_SESSION['flash']?>
<?php endif;?>
<div class="form-row">

	<?= form_open()?>

	<?= form_label('email', 'Email')?>
	<?= form_input('email', '')?>
	<?= form_error('email')?>

	<?= form_label('password', 'password')?>
	<?= form_password('password', '')?>
	<?= form_error('password')?>

	<?= form_submit('login', 'Login', 'class= "btn btn-primary"')?>

	<?= form_close()?>

	<?= anchor('admin/auth/register', 'Register', 'class = "btn btn-success"')?>

</div>
