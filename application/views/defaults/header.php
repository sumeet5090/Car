<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/font_awesome/css/all.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/font_awesome/css/v4-shims.min.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/font_awesome/css/brands.min.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/font_awesome/css/fontawesome.min.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/font_awesome/css/regular.min.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/font_awesome/css/solid.min.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/font_awesome/css/svg-with-js.min.css')?>">
	<!--	<script src="less.js" type="text/javascript"></script>-->

	<!--	<script src="https://kit.fontawesome.com/02b7416ed0.js" crossorigin="anonymous"></script>-->
	<script type="text/javascript" src="<?= base_url('assets/jquery.js')?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.js')?>"></script>
	<title>Car Insurance</title>
</head>
<body>
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
				<a class="navbar-brand" href="#">Sumeet</a>
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item">
<!--						<a class="nav-link" href="--><?//= 'insurance/home'?><!--">Home <span class="sr-only">(current)</span></a>-->
						<?= anchor('insurance/home', 'HOME', 'class= "nav-link"')?>
					</li>
					<li class="nav-item">
<!--						<a class="nav-link" href="--><?//= 'insurance/about'?><!--">About Us</a>-->
						<?= anchor('insurance/about', 'ABOUT','class= "nav-link"')?>
					</li>
					<li class="nav-item">
<!--						<a class="nav-link" href="--><?//= 'insurance/services'?><!--">Services</a>-->
						<?= anchor('insurance/services', 'SERVICES', 'class= "nav-link"')?>
					</li>
					<li class="nav-item">
<!--						<a class="nav-link" href="--><?//= 'insurance/contact'?><!--">Contact</a>-->
						<?= anchor('insurance/contact', 'CONTACT', 'class= "nav-link"')?>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
				<?php $this->session->set_userdata('current_uri', $this->uri->uri_string) ?>
				<?php echo (is_user_logged_in()) ? anchor('auth/logout', 'Logout', 'class="btn btn-link"') : anchor('auth/login', 'Login', 'class="btn btn-link"') ?>
			</div>
		</nav>
