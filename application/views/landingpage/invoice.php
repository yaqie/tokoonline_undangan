<!-- section -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
					<div class="col-md-12">
                        <div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Invoice #<?= $kode; ?></h4>
							</div>
						</div>
                    </div>

					<div class="col-md-4">
                        <div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Dari</h4>
							</div>
                            <div class="caption">
                                <b><?= $profil->nama ?></b><br>
                                <?= $profil->email ?><br>
                                <?= $profil->nohp ?>
                            </div>
						</div>
                    </div>
					<div class="col-md-4">
                        <div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Kepada</h4>
							</div>
                            <div class="caption">
								<b>Admin</b><br>
								<?= $admin->email ?><br>
                                <?= $admin->nohp ?><br>
                                <?= $admin->alamat ?>
                            </div>
						</div>
                    </div>
					<div class="col-md-4">
                        <div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Kode Invoice</h4>
							</div>
                            <div class="caption">
								Invoice #<?= $kode; ?>
                            </div>
						</div>
                    </div>

					<div class="col-md-12">
                        <div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Detail Transaksi</h4>
							</div>
                            <div class="caption">
                                <table class="shopping-cart-table table">
									<tr>
										<th>Kode Transaksi</th>
										<th>Produk</th>
										<th>Nama Produk</th>
										<th>Kuantiti</th>
										<th>Harga</th>
									</tr>
									<tr>
										<td>#<?= $kode; ?></td>
										<td><img src="<?= base_url('produk_img/') ?><?= $produk->gambar ?>" style="width:70px;height:70px;border-radius:50%;" alt=""></td>
										<td><?= $produk->nama_produk ?></td>
										<td><?= $transaksi->kuantiti ?></td>
										<td>Rp <?= nominal($produk->harga * $transaksi->kuantiti) ?></td>
									</tr>
								</table>
                            </div>
						</div>
                    </div>



					<div class="col-md-6">
                        <div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Metode Pembayaran</h4>
							</div>
                            <div class="caption">
								<?php
								foreach($bank as $b){
									echo "<b>$b->nama_bank</b><br>";
									echo "Nomor Rekening : $b->rekening<br>";
									echo "Atas Nama : $b->atas_nama";
								}
								?>
                            </div>
						</div>
                    </div>
					<div class="col-md-6">
                        <div class="shiping-methods">
							<div class="section-title">
								<?php
								$tgl1 = date("Y-m-d H:i:s");
								$tgl2 = date('Y-m-d H:i:s', strtotime('+1 days', strtotime($tgl1)));
								?>
								<h4 class="title">Jatuh Tempo | <?= indonesian_date($tgl2) ?></h4>
							</div>
                            <div class="caption">
                                jabsd
                            </div>
						</div>
                    </div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->