<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title><?= $web->judul ?></title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/landingpage/css/') ?>bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/landingpage/css/') ?>slick.css" />
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/landingpage/css/') ?>slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/landingpage/css/') ?>nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="<?= base_url('assets/landingpage/css/') ?>font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/landingpage/css/') ?>style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<style>
.float{
position:fixed;
width:60px;
height:60px;
bottom:40px;
right:40px;
background-color:#25d366;
color:#FFF;
border-radius:50px;
text-align:center;
font-size:30px;
box-shadow: 2px 2px 3px #999;
z-index:100;
}

.my-float{
margin-top:16px;
}
</style>
</head>

<body>
	<!-- HEADER -->
	<header>

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="#">
							<img src="<?= base_url('img_web/') ?><?= $web->logo ?>" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form action="<?= base_url('p_user/search'); ?>" method="post">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<input class="input search-input" name="keyword" type="text" placeholder="Apa yang anda cari ?" required>
							<select class="input search-categories" name="kategori" required>
								<option value="semua_kategori">Semua Kategori</option>
								<?php
								foreach($kategori as $k2){
									echo "<option value='$k2->slug'>$k2->nama_kategori</option>";
								}
								?>
							</select>
							<button type="button" class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">Akun <i class="fa fa-caret-down"></i></strong>
							</div>
							<!-- <a href="<?= base_url('auth'); ?>" class="text-uppercase">Masuk</a> / <a href="<?= base_url('auth'); ?>" class="text-uppercase">Daftar</a> -->
							<ul class="custom-menu">
								<?php
								if ($this->session->userdata('status') != "login"){
								?>
								<li><a href="<?= base_url('auth'); ?>"><i class="fa fa-unlock-alt"></i> Masuk / Daftar</a></li>
								<?php
								} else {
								?>
								<li><a href="<?= base_url('profil'); ?>"><i class="fa fa-user-o"></i> Profil</a></li>
								<!-- <li><a href="#"><i class="fa fa-check"></i> Checkout</a></li> -->
								<li><a href="<?= base_url('p_user/logout'); ?>"><i class="fa fa-sign-out"></i> Keluar</a></li>
								<?php
								}
								?>
							</ul>
						</li>
						<!-- /Account -->

						<?php
						if ($this->session->userdata('status') == "login"){
						?>

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
						<a class="dropdown-toggle" href="<?= base_url('keranjang'); ?>" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
								</div>
								<strong class="text-uppercase">Keranjang</strong>
							</a>
						</li>
						<!-- /Cart -->

						<?php } ?>

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Kategori <i class="fa fa-list"></i></span>
					<ul class="category-list">
					<?php
					foreach($kategori as $k){
					?>
						<li><a href="<?= base_url('kategori/'.$k->slug) ?>"><?= $k->nama_kategori ?></a></li>
					<?php
					}
					?>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="<?= base_url() ?>">Home</a></li>
						<li><a href="<?= base_url('produk') ?>">Produk</a></li>
						<li><a href="<?= base_url('cara_pesan') ?>">Cara Pesan</a></li>
						<li><a href="<?= base_url('tentang_kami') ?>">Tentang Kami</a></li>
						<li><a href="https://api.whatsapp.com/send?phone=<?= $admin->nohp ?>" target="_blank">Kontak</a></li>
						<?php
						if ($this->session->userdata('status') == "login"){
						?>
						<li><a href="<?= base_url('p_user/logout'); ?>">Keluar</a></li>
						<?php
						}
						?>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	