<!-- section -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- MAIN -->
				<div id="main" class="col-md-12">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="sort-filter">
								<form id="filter" action="<?= base_url('p_user/pindahfilter')?>" method="post">
									<span class="text-uppercase">Sortir:</span>
									<select class="input" id="valfilter" name="valfilter">
										<option value="terbaru">Terbaru</option>
										<option value="terlama">Terlama</option>
										<option value="termurah">Termurah</option>
										<option value="termahal">Termahal</option>
									</select>
									<button type="submit" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></button>
								</form>
							</div>
						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">

						<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

							<div class="col-md-12" id="post-data">
								<?php $this->load->view('landingpage/data'); ?>
							</div>

							<div class="clearfix visible-sm visible-xs"></div>


							<div class="ajax-load text-center" style="display:none">
								<p><img src="<?= base_url('assets/loader.gif') ?>">Loading More post</p>
							</div>


						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->