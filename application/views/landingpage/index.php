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
						<h2 class="title">Undangan Pernikahan</h2>
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
							<h2 class="white-color" style="color:#F8694A;">Undangan<br>Pernikahan</h2>
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
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Lihat</button>
									<img src="<?= base_url('produk_img/') ?><?= $p->gambar ?>" style="height:300px;" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">Rp <?= nominal($p->harga) ?></h3>
									<h2 class="product-name"><a href="#"><?= $p->nama_produk ?></a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
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
						<h2 class="title">Undangan Khitanan</h2>
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
							<h2 style="color:black;" class="white-color">Undangan<br>Khitanan</h2>
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
							<div class="product product-single">
								<div class="product-thumb">
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
									<img src="<?= base_url('assets/landingpage/img/') ?>/product06.jpg" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">$32.50</h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</div>
							</div>
							<!-- /Product Single -->

							<!-- Product Single -->
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span class="sale">-20%</span>
									</div>
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
									<img src="<?= base_url('assets/landingpage/img/') ?>/product05.jpg" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</div>
							</div>
							<!-- /Product Single -->

							<!-- Product Single -->
							<div class="product product-single">
								<div class="product-thumb">
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
									<img src="<?= base_url('assets/landingpage/img/') ?>/product04.jpg" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">$32.50</h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</div>
							</div>
							<!-- /Product Single -->

							<!-- Product Single -->
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>New</span>
										<span class="sale">-20%</span>
									</div>
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
									<img src="<?= base_url('assets/landingpage/img/') ?>/product03.jpg" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</div>
							</div>
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
    


    

	