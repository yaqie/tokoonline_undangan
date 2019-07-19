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
								<span class="text-uppercase">Sort By:</span>
								<select class="input">
										<option value="0">Position</option>
										<option value="0">Price</option>
										<option value="0">Rating</option>
									</select>
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
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