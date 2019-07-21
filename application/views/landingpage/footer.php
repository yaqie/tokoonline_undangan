<!-- FOOTER -->
<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="<?= base_url('img_web/') ?><?= $web->logo ?>" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p><?= $web->deskripsi ?></p>

					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Informasi</h3>
						<ul class="list-links">
							<li>E-mail : <?= $admin->email ?></a></li>
							<li>No Telepon : <?= $admin->nohp ?></a></li>
							<li>Alamat : <?= $admin->alamat ?></a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Kategori Undangan</h3>
						<ul class="list-links">
						<?php foreach ($kategori as $k): ?>    
							<li><a href="#"><?= $k->nama_kategori ?></a></li>
						<?php endforeach ?>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Link</h3>
						<ul class="list-links">
							<li><a href="<?= base_url('tentang_kami') ?>">Tentang kami</a></li>
							<li><a href="https://api.whatsapp.com/send?phone=<?= $admin->nohp ?>">Kontak</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="<?= base_url(); ?>"><?= $web->judul ?></a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="<?= base_url('assets/landingpage/js/') ?>jquery.min.js"></script>
	<script src="<?= base_url('assets/landingpage/js/') ?>bootstrap.min.js"></script>
	<script src="<?= base_url('assets/landingpage/js/') ?>slick.min.js"></script>
	<script src="<?= base_url('assets/landingpage/js/') ?>nouislider.min.js"></script>
	<script src="<?= base_url('assets/landingpage/js/') ?>jquery.zoom.min.js"></script>
	<script src="<?= base_url('assets/landingpage/js/') ?>main.js"></script>
	<a href="https://api.whatsapp.com/send?phone=<?= $admin->nohp ?>" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
</body>

</html>
