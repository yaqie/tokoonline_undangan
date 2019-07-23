<!-- section -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
					<div class="col-md-12">
                        <div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Keranjang Anda</h4>
							</div>
                            <div class="caption">
                                <table class="shopping-cart-table table">
									<tr>
										<th>Kode Transaksi</th>
										<th>Produk</th>
										<th>Nama Produk</th>
										<th>Status</th>
										<th>#</th>
									</tr>
									<?php
									foreach($transaksi as $t){
										$produk = $this->db->query("SELECT * FROM produk WHERE id_produk = '$t->id_produk'")->row();
										$hitung_detail = $this->db->query("SELECT * FROM detail_pemesanan WHERE id_transaksi = '$t->id_transaksi'")->num_rows();
										$hitung_invoice = $this->db->query("SELECT * FROM konfirmasi_pembayaran WHERE kode_invoice = '$t->kode_transaksi'")->num_rows();
										// $hitung_invoice = $this->db->query("SELECT * FROM konfirmasi_pembayaran WHERE kode_invoice = '$t->kode_transaksi'")->num_rows();
									?>
									<tr>
										<td><?= $t->kode_transaksi ?></td>
										<td><img src="<?= base_url('produk_img/') ?><?= $produk->gambar ?>" style="width:50px;height:50px;border-radius:50%;" alt=""></td>
										<td><?= $produk->nama_produk ?></td>
										<td>
											<?php
											if($hitung_detail == 0){
												echo '<span class="label label-danger">Belanja anda belum selesai</span><br>';
												echo '<a style="color:blue;margin-top:100px;" href="'.base_url().'pesan/'.$t->kode_transaksi.'">Selesaikan belanjaan anda</a>';
											} else if($hitung_invoice == 0){
												echo '<span class="label label-warning">Belum konfirmasi pembayaran</span><br>';
												echo '<a style="color:blue;margin-top:100px;" href="'.base_url().'invoice/'.$t->kode_transaksi.'">Konfirmasi belanjaan anda</a>';
											} else if($t->status == 1){
												echo '<span class="label label-primary">Konfirmasi sedang di tinjau</span>';
											}
											else if($t->status == 3){
												echo '<span class="label label-success">Dp Telah di Konfirmasi</span>';
											}
											else if($t->status == 4){
												echo '<span class="label label-primary">Pelunasan sedang di tinjau</span>';
											}
											else if($t->status == 2){
												echo '<span class="label label-success">Pesanan Telah di Konfirmasi</span>';
											}
											else if($t->status == -1){
												echo '<span class="label label-danger">Pesanan di Tolak</span>';
											}
											?>
										</td>
										<td>
											<?php
											if($hitung_detail == 0){
											?>
											<a href="<?= base_url('p_user/hapus_pesanan/'.$t->kode_transaksi) ?>" class="label label-danger" onclick="return confirm('Anda yakin ingin menghapus pesanan ?')"><i class="fa fa-trash"></i></a>
											<?php
											} else if($hitung_invoice == 0){
											?>
											<a href="<?= base_url('p_user/hapus_pesanan/'.$t->kode_transaksi) ?>" class="label label-danger" onclick="return confirm('Anda yakin ingin menghapus pesanan ?')"><i class="fa fa-trash"></i></a>
											<?php
											} else if($t->status == -1){
											?>
											<a href="<?= base_url('p_user/hapus_pesanan/'.$t->kode_transaksi) ?>" class="label label-danger" onclick="return confirm('Anda yakin ingin menghapus pesanan ?')"><i class="fa fa-trash"></i></a>
											<?php
											} else if($t->status == 3){
											?>
											<a href="<?= base_url('invoice/'.$t->kode_transaksi) ?>" class="label label-success">Konfirmasi pelunasan pemesanan</a>
											<?php
											}
											?>
										</td>
									</tr>
									<?php
									}
									?>
								</table>
                            </div>
						</div>
                    </div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->