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
									echo "<br><b>$b->nama_bank</b><br>";
									echo "Nomor Rekening : $b->rekening<br>";
									echo "Atas Nama : $b->atas_nama<br>";
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
								<div class="form-group">
                                    <button class="primary-btn" data-toggle="modal" data-target="#myModal">Konfirmasi Pembayaran</button>
								</div>
								<!-- Modal -->
								<div id="myModal" class="modal fade" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Konfirmasi Pembayaran</h4>
									</div>
									<div class="modal-body">
									<form action="<?= base_url('p_user/konfirmasi_pembayaran'); ?>" method="post"enctype="multipart/form-data">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
											<div class="form-group">
												<label for="">Kode Transaksi</label>
												<input type="text" value="<?= $kode ?>" name="kode" class="input" readonly/>
											</div>
											<div class="form-group">
												<label for="">Pilih Bank Tujuan</label>
												<select class="input" name="banktujuan">
													<?php
													foreach($bank as $b){
													?>
														<option value="<?= $b->id_bank ?>"><?= $b->nama_bank ?></option>
													<?php
													}
													?>
												</select>
											</div>
											<div class="form-group">
												<label for="">Bank Pengirim</label>
												<input type="text" class="input" name="bankpengirim" placeholder="Bank Pengirim"/>
											</div>
											<div class="form-group">
												<label for="">Nomor Rekening Pengirim</label>
												<input type="text" name="norek" class="input"/>
											</div>
											<div class="form-group">
												<label for="">Nama Pengirim</label>
												<input type="text" name="nama" class="input" />
											</div>
											<div class="form-group">
												<label for="">Tanggal Kirim</label>
												<input type="date" name="tanggal" class="input" />
											</div>
											<div class="form-group">
												<label for="">Jumlah Transfer</label>
												<input type="text" name="jumlah" class="input" value="<?= $produk->harga * $transaksi->kuantiti ?>" readonly/>
											</div>
											<div class="form-group">
												<label for="">Upload Bukti Pembayaran</label>
												<input type="file" name="file" class="input" />
											</div>
											<div class="form-group">
												<label for="">Catatan</label>
												<textarea name="" name="catatan" id="" class="input" cols="30" style="height:100px;" rows="10"></textarea>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Kirim</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</form>
									</div>

								</div>
								</div>
                            </div>
						</div>
                    </div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->