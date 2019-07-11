
        
        
        
        <!--
        /////////////////////////////////////////////////////////////////////////
        //////////     MAIN SHOW CONTENT     //////////
        //////////////////////////////////////////////////////////////////////
        -->
        <div id="main">
                <ol class="breadcrumb">
                        <li class="active"><?= $breadcrumb ?></li>
                </ol>
                <!-- //breadcrumb-->
                
                <div id="content">
                
                        <div class="row">
                        
                                <div class="col-lg-12">
                                <?php echo $this->session->flashdata('message');?>
                                        <section class="panel corner-flip">
                                                <header class="panel-heading sm" data-color="theme-inverse">
                                                        <h2><strong>Pengaturan</strong> profil</h2>
                                                        <label class="color">Lengkapi data di bawah ini untuk validasi akun anda.</label>
                                                </header>
                                                <div class="panel-body">
                                                        <form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="<?= base_url('p_user/edit_profil'); ?>" id="form_profil" method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                                <div class="form-group">
                                                                        <label class="control-label" for="inputTwo">Username*</label>
                                                                        <div>
                                                                                <input name="username" type="text" class="form-control" id="inputTwo" value="<?= $user->username ?>" required maxlength="15">
                                                                        </div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label class="control-label" for="inputTwo">Nama Lengkap*</label>
                                                                        <div>
                                                                                <input <?php if($user->nama == ""){ echo 'style="border:1px solid #cc0202"'; } ?> name="nama" type="text" class="form-control" id="inputTwo" value="<?= $user->nama ?>" required maxlength="150">
                                                                                <span class="help-block"><code>*Nama Lengkap Harus Sesuai Dengan Nama di Kartu Identitas</code></span>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label class="control-label" for="inputTwo">E-mail*</label>
                                                                        <div>
                                                                                <input name="email" type="email" class="form-control" id="inputTwo" value="<?= $user->email ?>" required>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label class="control-label" for="inputTwo">Nomor Whatsapp*</label>
                                                                        <div>
                                                                                <input name="nomor2" <?php if($user->nowa == ""){ echo 'style="border:1px solid #cc0202"'; } ?> type="text" class="form-control" id="inputTwo" value="<?= $user->nowa ?>" required>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label class="control-label" for="inputTwo">Nomor Telepon</label>
                                                                        <div>
                                                                                <input name="nomor1" type="text" class="form-control" id="inputTwo" value="<?= $user->nohp ?>">
                                                                        </div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label class="control-label" for="inputTwo">Upload Ktp<?php if($user->nama == "" && $user->nowa == ""){ echo '*'; } ?></label>
                                                                        <div>
                                                                                <input name="file" type="file" <?php if($user->gambar_ktp == ""){ echo 'style="border:1px solid #cc0202"'; } ?> class="form-control" id="inputTwo" <?php if($user->nama == "" && $user->nowa == ""){ echo 'required'; } ?>>
                                                                                <span class="help-block">Upload file dengan format .jpg , .png atau .jpeg</span>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group offset">
                                                                        <div>
                                                                                <button type="submit" class="btn btn-success" id="btnSubmit">Simpan</button>
                                                                                <button type="reset" class="btn">Batal</button>
                                                                        </div>
                                                                </div>
                                                        </form>
                                                </div>
                                        </section>

                                        <section class="panel corner-flip">
                                                <header class="panel-heading sm" data-color="theme-inverse">
                                                        <h2><strong>Ubah</strong> Password</h2>
                                                        <label class="color">Simpan dan jaga password anda.</label>
                                                </header>
                                                <div class="panel-body">
                                                        <form class="form-horizontal" data-collabel="3" data-alignlabel="left" action="<?= base_url('p_user/edit_password'); ?>" id="form_password" method="post">
                                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                                <div class="form-group">
                                                                        <label class="control-label" for="inputTwo">Password Lama*</label>
                                                                        <div>
                                                                                <input name="password_lama" type="password" class="form-control" id="inputTwo" required>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label class="control-label" for="inputTwo">Password Baru*</label>
                                                                        <div>
                                                                                <input name="password_baru" type="password" class="form-control" id="inputTwo" required>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label class="control-label" for="inputTwo">Konfirmasi Password*</label>
                                                                        <div>
                                                                                <input name="konfirmasi_password" type="password" class="form-control" id="inputTwo" required>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group offset">
                                                                        <div>
                                                                                <button type="submit" class="btn btn-success" id="btnSubmit3">Simpan</button>
                                                                                <button type="reset" class="btn">Batal</button>
                                                                        </div>
                                                                </div>
                                                        </form>
                                                </div>
                                        </section>
                                        
                                </div>

                                <script>
                                $(document).ready(function () {
                                    $('#form_profil').submit(function(){
                                        $('#btnSubmit').attr('disabled',true);
                                        $('#btnSubmit').html('Mengirim ...');
                                    });

                                    $('#form_password').submit(function(){
                                        $('#btnSubmit3').attr('disabled',true);
                                        $('#btnSubmit3').html('Mengirim ...');
                                    });
                                });
                                </script>
                                
                                <!-- //content > row > col-lg-12 -->
                                
                        </div>
                        <!-- //content > row-->
                        
                </div>
                <!-- //content-->
                
                
        </div>
        <!-- //main-->
        
        
        
        