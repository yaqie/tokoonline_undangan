

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
                            <a href="<?= base_url('produk_img/'.$produk->gambar) ?>"><img src="<?= base_url('produk_img/') ?><?= $produk->gambar ?>" style="width:100%;height:400px;" alt=""></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">							
							<h2 class="product-name"><?= $produk->nama_produk ?></h2>
							<h3 class="product-price">Rp <?= nominal($produk->harga) ?></h3>
							<br>
							<p><?= $produk->deskripsi ?></p>
							<br>

							<form action="<?= base_url('p_user/pesan'); ?>" method="post">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<input class="input" type="hidden" name="id" required>
								<div class="product-btns">
									<div class="qty-input">
										<input class="input" type="hidden" name="id" value="<?= $id ?>" required>
										<span class="text-uppercase">QTY: </span>
										<input class="input" type="number" name="qty" required>
										<select class="input" name="tipe" id="" style="width:170px;" required>
											<option value="">Pilih Tipe Undangan</option>
											<option value="1">Undangan Pernikahan</option>
											<option value="2">Undangan Khitanan</option>
										</select>
									</div>
									<?php
									if ($this->session->userdata('status') != "login"){
									?>
									<a href="<?= base_url('auth'); ?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> &nbsp; Login untuk pesan</a>
									<?php } else { ?>
									<button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> &nbsp; Pesan Sekarang</button>
									<?php } ?>
								</div>

							</form>
						</div>
					</div>
					

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Produk lain dari kami</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				<?php foreach($produk_lain as $p) { ?>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<img src="<?= base_url('produk_img/') ?><?= $p->gambar ?>" style="height:300px;" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">Rp <?= nominal($p->harga) ?></h3>
							<h2 class="product-name"><a href="<?= base_url('detail/'.$p->id_produk) ?>"><?= $p->nama_produk ?></a></h2>
							<div class="product-btns">
								<a class="primary-btn add-to-cart" href="<?= base_url('detail/'.$p->id_produk) ?>"> Lihat Detail</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- /Product Single -->



			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
