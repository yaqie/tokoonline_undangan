<!-- section -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
					<div class="col-md-12">
                        <div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Data Pesanan Anda</h4>
							</div>
						</div>
                    </div>
					<div class="col-md-4">
					<form id="checkout-form" class="clearfix" action="<?= base_url('p_user/konfirmasi_pesan')?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<input class="input" type="hidden" name="kode" value="<?= $transaksi->kode_transaksi ?>">
					<input class="input" type="hidden" name="id_transaksi" value="<?= $transaksi->id_transaksi ?>">
                        <div class="shiping-methods">
							<div class="section-title">
							<?php if ($transaksi->tipe == 1){ ?>
								<h4 class="title">Data Pengantin Pria</h4>
							<?php } else { ?>
								<h4 class="title">Data Khitan</h4>
							<?php } ?>
							</div>
                            <div class="caption">
								<div class="billing-details">
									<div class="form-group">
										<input class="input" type="text" name="nm1" placeholder="Nama Lengkap">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="nm_pang1" placeholder="Nama Panggilan">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="nm_ayah1" placeholder="Nama Ayah">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="nm_ibu1" placeholder="Nama Ibu">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="anak1" placeholder="Putra ke">
									</div>
								</div>
                            </div>
						</div>
						<?php
						if ($transaksi->tipe == 1){
						?>
						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Data Pengantin Wanita</h4>
							</div>
                            <div class="caption">
								<div class="billing-details">
									<div class="form-group">
										<input class="input" type="text" name="nm2" placeholder="Nama Lengkap">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="nm_pang2" placeholder="Nama Panggilan">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="nm_ayah2" placeholder="Nama Ayah">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="nm_ibu2" placeholder="Nama Ibu">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="anak2" placeholder="Putri ke">
									</div>
								</div>
                            </div>
						</div>
						<?php } ?>
                    </div>
					<div class="col-md-4">
                        <div class="shiping-methods">
							<div class="section-title">
								<?php if ($transaksi->tipe == 1){ ?>
									<h4 class="title">Akad Nikah</h4>
								<?php } else { ?>
									<h4 class="title">Acara</h4>
								<?php } ?>
							</div>
                            <div class="caption">
								<div class="billing-details">
									<div class="form-group">
										<input class="input" type="date" name="tgl1" placeholder="Tanggal">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="jam1" placeholder="Jam">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="tempat1" placeholder="Tempat">
									</div>
								</div>
                            </div>
						</div>
						<?php
						if ($transaksi->tipe == 1){
						?>
                        <div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Resepsi</h4>
							</div>
                            <div class="caption">
								<div class="billing-details">
									<div class="form-group">
										<input class="input" type="date" name="tgl2" placeholder="Tanggal">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="jam2" placeholder="Jam">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="tempat2" placeholder="Tempat">
									</div>
								</div>
                            </div>
						</div>
						<?php } ?>
                        <div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Hiburan</h4>
							</div>
                            <div class="caption">
								<div class="billing-details">
									<div class="form-group">
										<textarea class="input" name="hiburan" style="height:100px;" placeholder="Tambahkan Keterangan Hiburan (Kosongi jika tidak ada)"></textarea>
									</div>
								</div>
                            </div>
						</div>
                    </div>
					<div class="col-md-4">
						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Turut Mengundang</h4>
							</div>
                            <div class="caption">
								<div class="billing-details">
									<div class="form-group">
										<textarea class="input" name="mengundang" style="height:100px;" placeholder="Tambahkan Keterangan Hiburan (Kosongi jika tidak ada)"></textarea>
									</div>
								</div>
                            </div>
						</div>
						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Keterangan Tambahan</h4>
							</div>
                            <div class="caption">
								<div class="billing-details">
									<div class="form-group">
										<textarea class="input" name="ket_lain" style="height:100px;" placeholder="Tambahkan Keterangan Hiburan (Kosongi jika tidak ada)"></textarea>
									</div>
								</div>
                            </div>
						</div>
						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Tambahan Foto Prewed</h4>
							</div>
                            <div class="caption">
								<div class="billing-details">
									<div class="form-group">
										<input type="file" class="input" name="file"/>
									</div>
								</div>
							</div>
							<div class="section-title">
								<h4 class="title">Alamat Pengiriman</h4>
							</div>
                            <div class="caption">
								<div class="billing-details">
									<div class="form-group">
										<textarea class="input" name="alamat" style="height:100px;"><?= $profil->alamat ?></textarea>
									</div>
								</div>
								<div class="form-group">
                                    <button class="primary-btn">Simpan</button>
                                </div>
							</div>
						</div>						
					</form>
                    </div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->