<!-- section -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
					<div class="col-md-12">
                    <?php echo $this->session->flashdata('message');?>
                    </div>
					<div class="col-md-3">
					</div>

					<div class="col-md-6">
                        <form id="checkout-form" class="clearfix" action="<?= base_url('p_user/daftar')?>" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="shiping-methods">
                                <div class="section-title">
                                    <h4 class="title">Data diri</h4>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="email" name="email" placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="password" name="password2" placeholder="Ulangi Password">
                                </div>
                                <div class="form-group">
                                    <button class="primary-btn">Daftar</button>
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