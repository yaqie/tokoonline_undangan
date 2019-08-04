

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<?php
						if ($produk->gambar2 == '' && $produk->gambar3 == '' && $produk->gambar4 == ''){
						?>
						<div id="product-main-view">
							<div class="product-view">
								<img src="<?= base_url('produk_img/') ?><?= $produk->gambar ?>" style="max-height:400px;" alt="">
							</div>
						</div>
						<?php } else { ?>
						<div id="product-main-view">
							<div class="product-view">
								<img src="<?= base_url('produk_img/'.$produk->gambar) ?>" style="max-height:400px;" alt="">
							</div>
							<?php
							if ($produk->gambar2 != '') {
							?>
							<div class="product-view">
								<img src="<?= base_url('produk_img/'.$produk->gambar2) ?>" style="max-height:400px;" alt="">
							</div>
							<?php
							}
							?>
							<?php
							if ($produk->gambar3 != '') {
							?>
							<div class="product-view">
								<img src="<?= base_url('produk_img/'.$produk->gambar3) ?>" style="max-height:400px;" alt="">
							</div>
							<?php
							}
							?>
							<?php
							if ($produk->gambar4 != '') {
							?>
							<div class="product-view">
								<img src="<?= base_url('produk_img/'.$produk->gambar4) ?>" style="max-height:400px;" alt="">
							</div>
							<?php
							}
							?>
						</div>
						<?php } ?>







						<?php
						if ($produk->gambar2 == '' && $produk->gambar3 == '' && $produk->gambar4 == ''){
						?>
						<?php } else { ?>
						<div id="product-view">
							<div class="product-view">
								<img src="<?= base_url('produk_img/'.$produk->gambar) ?>" style="max-height:100px;" alt="">
							</div>
							<?php
							if ($produk->gambar2 != '') {
							?>
							<div class="product-view">
								<img src="<?= base_url('produk_img/'.$produk->gambar2) ?>" style="max-height:100px;" alt="">
							</div>
							<?php
							}
							?>
							<?php
							if ($produk->gambar3 != '') {
							?>
							<div class="product-view">
								<img src="<?= base_url('produk_img/'.$produk->gambar3) ?>" style="max-height:100px;" alt="">
							</div>
							<?php
							}
							?>
							<?php
							if ($produk->gambar4 != '') {
							?>
							<div class="product-view">
								<img src="<?= base_url('produk_img/'.$produk->gambar4) ?>" style="max-height:100px;" alt="">
							</div>
							<?php
							}
							?>
						</div>
						<?php } ?>

					</div>
					<div class="col-md-6">
						<div class="product-body">							
							<h2 class="product-name"><?= $produk->nama_produk ?></h2>
							<h3 class="product-price">Rp <?= nominal($produk->harga) ?></h3>
							<br>
							<p><?= $produk->deskripsi ?></p>
							<br>

							<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

							<form action="<?= base_url('p_user/pesan'); ?>" method="post">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<input class="input" type="hidden" name="id" required>
								<div class="product-btns">
									<div class="qty-input">
										<input class="input" type="hidden" name="id" value="<?= $id ?>" required>
										<span class="text-uppercase">QTY: </span>
										<input type="hidden" id="textone" value="<?= $produk->harga ?>">
										<input class="input" type="number" name="qty" id="texttwo" required>
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
									<br>
									<br>
									<span  id="totalharga" style="display:none;" >Total Harga : <b>Rp<span id="result" ></b></span></span>
								</div>

							</form>

							<script>
							$('#texttwo').keyup(function(){
								$("#totalharga").show();

								var textone;
								var texttwo;
								textone = parseFloat($('#textone').val());
								texttwo = parseFloat($('#texttwo').val());
								var result = textone * texttwo;
								$("#result").text(formatRupiah(result.toFixed(0)));
								if($('#texttwo').val()==''){
									$("#totalharga").hide();
								}

								function formatRupiah(angka, prefix){
									var number_string = angka.replace(/[^,\d]/g, '').toString(),
									split   		= number_string.split(','),
									sisa     		= split[0].length % 3,
									rupiah     		= split[0].substr(0, sisa),
									ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
						
									// tambahkan titik jika yang di input sudah menjadi angka ribuan
									if(ribuan){
										separator = sisa ? '.' : '';
										rupiah += separator + ribuan.join('.');
									}
						
									rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
									return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
								}

							});
							</script>
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
