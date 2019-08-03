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
						
                        <div class="shiping-methods">
							<div class="section-title">
							<?php
							if ($transaksi->tipe == 1){
							?>
								<h4 class="title">Resepsi</h4>
							<?php } else { ?>
								<h4 class="title">Acara Hari ke 2</h4>
								<small style="color:red;">Kosongi jika tidak ada</small>
							<?php } ?>
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
						
                    </div>
					<div class="col-md-4">
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
								<?php
								if ($transaksi->tipe == 1){
									?>
									<h4 class="title">Tambahan Foto Prewed</h4>
								<?php } else { ?>
									<h4 class="title">Tambahan Foto Manten</h4>
								<?php } ?>
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
										<?php
															
										$curl = curl_init();

										curl_setopt_array($curl, array(
										CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_ENCODING => "",
										CURLOPT_MAXREDIRS => 10,
										CURLOPT_TIMEOUT => 30,
										CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										CURLOPT_CUSTOMREQUEST => "GET",
										CURLOPT_HTTPHEADER => array(
											"key: c9cabd216f6e1c41af6e72b952a3c070"
										),
										));

										$response = curl_exec($curl);
										$err = curl_error($curl);
																
										echo "<select name='provinsi' class='input' id='provinsi' required>";
										echo "<option>Pilih Provinsi Tujuan</option>";
										$data = json_decode($response, true);
										for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
											echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
										}
										echo "</select>";
													
										?>
									</div>
									<div class="form-group">
										<select class="input" id="kabupaten" name="kabupaten" required>
											<option>Pilih Kabupaten Tujuan</option>
										</select>
									</div>
									<div class="form-group">
										<select class="input" id="kurir" name="kurir" required>
											<option value="jne">JNE</option>
											<option value="tiki">TIKI</option>
											<option value="pos">POS INDONESIA</option>
										</select>
									</div>
									
									<div class="form-group">
										<textarea class="input" name="alamat" style="height:100px;" required placeholder="detail alamat pengiriman"></textarea>
									</div>
									<div class="form-group">
										<input type="hidden" name="ongkir" id="ongkir2" required>
										Biaya Pengiriman <span  id="onp" >Rp.  <span id="ongkir" ></span></span>
									</div>
									<div class="form-group">
										<!-- <button id="cek" class="primary-btn" onclick="myFunction()">Cek Biaya Pengiriman</button> -->
										<input id="cek" type="button" value="Cek Biaya Pengiriman" class="primary-btn" onclick="myFunction()"/>
									</div>
									<input type="hidden" name="asal" id="asal" value="41">
									<input id="berat" class="" type="hidden" name="berat" value="<?= $produk->berat * $transaksi->kuantiti ?>">
								</div>
								
							</div>
							<div class="section-title">
								<h4 class="title">Tipe Pembayaran</h4>
							</div>
                            <div class="caption">
								<div class="billing-details">
									<div class="form-group">
										<input type="radio" value="1" name="tipe_pembayaran" checked> Langsung
										<input type="radio" value="2" name="tipe_pembayaran"> Dp 50%
									</div>
									<div class="form-group">
										<button class="primary-btn" disabled id="simpan">Simpan</button>
									</div>
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