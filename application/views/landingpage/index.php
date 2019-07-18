	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container">
			<!-- home wrap -->
			<!-- <div class="home-wrap"> -->
				<!-- home slick -->
				<div id="home-slick" style="height:300px;">
					<!-- banner -->
					<div class="banner banner-1" style="height:300px;">
						<img src="<?= base_url('assets/landingpage/img/') ?>/banner01.jpg" alt="">
						<div class="banner-caption text-center">
							<h1>Bags sale</h1>
							<h3 class="white-color font-weak">Up to 50% Discount</h3>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="banner banner-1" style="height:300px;">
						<img src="<?= base_url('assets/landingpage/img/') ?>/banner02.jpg" alt="">
						<div class="banner-caption">
							<h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="banner banner-1" style="height:300px;">
						<img src="<?= base_url('assets/landingpage/img/') ?>/banner03.jpg" alt="">
						<div class="banner-caption">
							<h1 class="white-color">New Product <span>Collection</span></h1>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
					<!-- /banner -->
				</div>
				<!-- /home slick -->
			<!-- </div> -->
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title"><?= $kategori2->nama_kategori ?></h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="<?= base_url('assets/img_undangan') ?>/pernikahan.jpg" style="object-fit:cover;height:350px;" alt="">
						<div class="banner-caption">
							<h2 class="white-color" style="color:#F8694A;"><?= $kategori2->nama_kategori ?></h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">
							<!-- Product Single -->
							<?php foreach($produk as $p) { ?>
							<div class="product product-single">
								<div class="product-thumb">
									<img src="<?= base_url('produk_img/') ?><?= $p->gambar ?>" style="height:300px;" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">Rp <?= nominal($p->harga) ?></h3>
									<h2 class="product-name"><a href="#"><?= $p->nama_produk ?></a></h2>
									<div class="product-btns">
										<a class="primary-btn add-to-cart" href="<?= base_url('detail/'.$p->id_produk) ?>"> Lihat Detail</a>
									</div>
								</div>
							</div>
							<?php } ?>
							<!-- /Product Single -->

						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
            <!-- /row -->

            <!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title"><?= $kategori3->nama_kategori ?></h2>
						<div class="pull-right">
							<div class="product-slick-dots-2 custom-dots">
							</div>
						</div>
					</div>
				</div>
				<!-- section title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
					<img src="<?= base_url('assets/img_undangan') ?>/khitanan.png" style="object-fit:cover;height:350px;" alt="">
						<div class="banner-caption">
							<h2 style="color:black;" class="white-color"><?= $kategori3->nama_kategori ?></h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-2" class="product-slick">
							<!-- Product Single -->
							<?php foreach($produk2 as $p2) { ?>
							<div class="product product-single">
								<div class="product-thumb">
									<img src="<?= base_url('produk_img/') ?><?= $p2->gambar ?>" style="height:300px;" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">Rp <?= nominal($p2->harga) ?></h3>
									<h2 class="product-name"><a href="#"><?= $p2->nama_produk ?></a></h2>
									<div class="product-btns">
										<a class="primary-btn add-to-cart" href="<?= base_url('detail/'.$p2->id_produk) ?>"> Lihat Detail</a>
									</div>
								</div>
							</div>
							<?php } ?>
							<!-- /Product Single -->

						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
            

            

		</div>
		<!-- /container -->
	</div>
    <!-- /section -->
    


    

	