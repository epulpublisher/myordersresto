<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Ogani Template">
	<meta name="keywords" content="Ogani, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Myordersresto | <?= $judul; ?></title>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

	<!-- Css Styles -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/elegant-icons.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/nice-select.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery-ui.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/slicknav.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css" type="text/css">
</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder"> -->
		<div class="loader"></div>
	</div>

	<!-- Humberger Begin -->
	<div class="humberger__menu__overlay"></div>
	<div class="humberger__menu__wrapper">
		<div class="humberger__menu__logo">
			<a href="#"><img src="<?= base_url('assets/'); ?>img/logo.png" alt=""></a>
		</div>
		<div class="humberger__menu__cart">
			<ul>
				<li><a href="<?= base_url("home/shopingcart"); ?>"><i class="fa fa-shopping-bag"></i> <span>69</span></a></li>
			</ul>
			<div class="header__cart__price">item: <span>Rp. mobile Ubah</span></div>
		</div>
		<div class="humberger__menu__widget">

			<div class="header__top__right__auth">
				<a href="#"><i class="fa fa-user"></i> Login</a>
			</div>
		</div>
		<nav class="humberger__menu__nav mobile-menu">
			<ul>
				<li><a href="<?= base_url(); ?>">Beranda</a></li>
				<li><a href="<?= base_url("beranda/kontak"); ?>">Kontak</a></li>
			</ul>
		</nav>
		<div id="mobile-menu-wrap"></div>
		<div class="humberger__menu__contact">
			<ul>
				<li>Nikmati voucher akhir tahun hingga 70%</li>
			</ul>
		</div>
	</div>
	<!-- Humberger End -->

	<!-- Header Section Begin -->
	<header class="header">
		<div class="header__top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="header__top__left">
							<ul>
								<li>Nikmati voucher akhir tahun hingga 70%</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="header__top__right">
							<div class="header__top__right__auth">
								<a href="<?= base_url('member'); ?>"><i class="fa fa-user"></i> Login</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="header__logo">
						<a href="<?= base_url(); ?>"><img src="<?= base_url('assets/'); ?>img/logo.png" alt=""></a>
					</div>
				</div>
				<div class="col-lg-6">
					<nav class="header__menu">
						<ul>
							<li><a href="<?= base_url(); ?>">Beranda<span class="sr-only">(current)</span></a></li>
							<li><a href="<?= base_url("beranda/kontak"); ?>">Kontak</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="humberger__open">
				<i class="fa fa-bars"></i>
			</div>
		</div>
	</header>
	<!-- Header Section End -->
