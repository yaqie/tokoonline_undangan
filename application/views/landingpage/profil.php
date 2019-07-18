<!-- section -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
					<div class="col-md-3">
					</div>

					<div class="col-md-6">
                    <?php
                    if ($profil->alamat == '') {
                    ?>
                    <div class="alert alert-warning"> Lengkapi biodata anda terlebih dahulu!
                    </div>
                    <?php
                    }
                    ?>
                    <?php echo $this->session->flashdata('message');?>
                    
                        <form id="checkout-form" class="clearfix" action="<?= base_url('p_user/edit_profil')?>" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="shiping-methods">
                                <div class="section-title">
                                    <h4 class="title">Data diri</h4>
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input class="input" type="text" name="username" style="background:#eee;cursor:no-drop;" value="<?= $profil->username ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input class="input" type="email" name="email" value="<?= $profil->email ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input class="input" type="text" name="nama" value="<?= $profil->nama ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Handphone</label>
                                    <input class="input" type="text" name="nohp" value="<?= $profil->nohp ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat Lengkap</label>
                                    <textarea class="input" name="alamat" style="height:100px" id="" cols="30" rows="10" required><?= $profil->alamat ?></textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <input class="input" type="password" name="password" placeholder="Password">
                                </div> -->
                                <div class="form-group">
                                    <button class="primary-btn">Simpan</button>
                                </div>
                            </div>
                        </form>
					</div>  

                    <div class="col-md-3">
					</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->