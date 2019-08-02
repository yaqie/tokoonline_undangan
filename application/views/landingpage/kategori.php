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



							<div id="load_data"></div>
							<div id="load_data_message"></div>


							<script>
							$(document).ready(function(){

								var limit = 6;
								var start = 0;
								var action = 'inactive';
								var valfilter = '<?= $kode ?>';

								function lazzy_loader(limit)
								{
								var output = '';
								for(var count=0; count<1; count++)
								{
									output += '<div class="ajax-load text-center">';
									output += '<p><img src="<?= base_url('assets/loader.gif') ?>">Loading More post</p>';
									output += '</div>';
								}
								$('#load_data_message').html(output);
								}

								lazzy_loader(limit);

								function load_data(limit, start,valfilter)
								{
								$.ajax({
									url:"<?= base_url(); ?>home/loadmorekategori",
									method:"POST",
									data:{limit:limit, start:start,valfilter:valfilter},
									cache: false,
									success:function(data)
									{
									if(data == '')
									{
										$('#load_data_message').html('');
										action = 'active';
									}
									else
									{
										$('#load_data').append(data);
										$('#load_data_message').html("");
										action = 'inactive';
									}
									}
								})
								}


								if(action == 'inactive')
								{
								action = 'active';
								load_data(limit, start,valfilter);
								}

								$(window).scroll(function(){
								if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
								{
									lazzy_loader(limit);
									action = 'active';
									start = start + limit;
									setTimeout(function(){
									load_data(limit, start,valfilter);
									}, 1000);
								}
								});


							});
							</script>


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