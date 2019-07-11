
		
		
		
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
								<div class="col-md-12">
									
									<?php if ($user->gambar_ktp == "" && $user->nowa == "" && $user->nama == "") {
									?>
									<div class="alert alert-danger">
											Sedikit lagi akunmu siap. Silahkan lakukan upgrade akun terlebih dahulu <a href="<?= base_url('user/profil') ?>">disini</a>
									</div>
									<?php
									}
									?>
									
								</div>
								<div class="col-md-8">
									<section class="panel">
										<header class="panel-heading no-borders  bg-purple-darken">
												<h2><strong>Vector</strong> map</h2><br>
										</header>
										<div id="vmap"></div>
										<div class="panel-body">
											<div class="row">
												<div class="col-md-7">
														<h3><strong>Customer </strong> Returning</h3>
														<br>
														<div class="progress progress-sm">
																<div class="progress-bar bg-purple" aria-valuetransitiongoal="45"></div>
														</div>
														<label class="progress-label">United States 45%</label>
														<!-- //progress-->
														<div class="progress progress-sm">
																<div class="progress-bar bg-danger" aria-valuetransitiongoal="62"></div>
														</div>
														<label class="progress-label">France 62%</label>
														<!-- //progress-->
														<div class="progress progress-shine progress-sm">
																<div class="progress-bar bg-inverse" aria-valuetransitiongoal="57"></div>
														</div>
														<label class="progress-label">Australia 57%</label>
														<!-- //progress-->
														<div class="progress progress-sm">
																<div class="progress-bar bg-theme-inverse" aria-valuetransitiongoal="33"></div>
														</div>
														<label class="progress-label">Brazil 33%</label>
														<!-- //progress-->
														<div class="progress progress-sm">
																<div class="progress-bar bg-info" aria-valuetransitiongoal="24"></div>
														</div>
														<label class="progress-label">Thailand 24%</label>
														<!-- //progress-->
												</div>
												<div class="col-md-5">
														<h3><strong>Country</strong> Visits</h3>
														<br>
														<ol class="rectangle-list">
																<li><a href="#">Canada <span class="pull-right">17,485</span></a></li>
																<li><a href="#">Brazil <span class="pull-right">11,452</span></a></li>		
																<li><a href="#">France <span class="pull-right">9,875</span></a></li>
																<li><a href="#">Thailand <span class="pull-right">9,214</span></a></li>	
														</ol>
												</div>
											</div>
										</div>
									</section>
									
										<section class="panel bg-inverse">
												<div class="tabbable">
														<ul class="nav nav-tabs chart-change">
																<li><a href="javascript:void(0)" data-change-type="bars" data-for-id="#stack-chart"><i class="fa fa-bar-chart-o"></i> &nbsp; Bars Chart</a></li>
																<li class="active"><a href="javascript:void(0)" data-change-type="lines" data-for-id="#stack-chart"><i class="fa fa-qrcode"></i> &nbsp; Lines Chart</a></li>
														</ul>
														<div class="tab-content">
															   <div class="tab-pane fade in active">
																	<div class="widget-chart chart-dark">
																			<table id="stack-chart" data-stack="true" class="flot-chart" data-type="lines"  data-yaxis-max="3000" data-tool-tip="show" data-width="100%" data-height="300px"  data-bar-width="0.5" data-tick-color="rgba(0,0,0,0.05)">
																					<thead>
																							<tr>
																									<th></th>
																									<th style="color : #3db9af;">Test</th>
																									<th style="color : #d9dfe3 ;">Page View</th>
																							</tr>
																					</thead>
																					<tbody>
																							<tr>
																									<th>JAN</th>
																									<td>250</td>
																									<td>295</td>
																							</tr>
																							<tr>
																									<th>FEB</th>
																									<td>145</td>
																									<td>425</td>
																							</tr>
																							<tr>
																									<th>MAR</th>
																									<td>758</td>
																									<td>986</td>
																							</tr>
																							<tr>
																									<th>APR</th>
																									<td>475</td>
																									<td>548</td>
																							</tr>
																							<tr>
																									<th>MAY</th>
																									<td>452</td>
																									<td>441</td>
																							</tr>
																							<tr>
																									<th>JUN</th>
																									<td>112</td>
																									<td>257</td>
																							</tr>
																							<tr>
																									<th>JUL</th>
																									<td>857</td>
																									<td>546</td>
																							</tr>
																							<tr>
																									<th>AUG</th>
																									<td>200</td>
																									<td>125</td>
																							</tr>
																							<tr>
																									<th>SEP</th>
																									<td>55</td>
																									<td>147</td>
																							</tr>
																							<tr>
																									<th>OCT</th>
																									<td>1900</td>
																									<td>315</td>
																							</tr>
																							<tr>
																									<th>NOV</th>
																									<td>578</td>
																									<td>425</td>
																							</tr>
																							<tr>
																									<th>DEC</th>
																									<td>1900</td>
																									<td>865</td>
																							</tr>
																					</tbody>
																			</table>
																	</div>
															   </div>
														</div>
												</div>
										</section>
										
										<section class="panel">
												<div class="panel-body">
														<div class="table-responsive">
																<table class="table table-striped table-hover" data-provide="data-table">
																		<thead>
																				<tr>
																						<th> Photo </th>
																						<th> Fullname </th>
																						<th> Username </th>
																						<th> Status </th>
																						<th>  View</th>
																				</tr>
																		</thead>
																		<tbody align="center">
																				<tr >
																						<td><img src="<?= base_url('assets/user/assets/') ?>img/avatar.png" alt="" class="img-circle avatar-mini"></td>
																						<td> Mark Nilson </td>
																						<td> makr124 </td>
																						<td><span class="label label-sm bg-theme-inverse"> Approved </span></td>
																						<td><a class="btn btn-inverse btn-sm" href="#"><i class="fa fa-pencil"></a></td>
																				</tr>
																				<tr>
																						<td><img src="<?= base_url('assets/user/assets/') ?>img/avatar2.png" alt="" class="img-circle avatar-mini"></td>
																						<td> Filip Rolton </td>
																						<td> jac123 </td>
																						<td><span class="label label-sm bg-darkorange"> Pending </span></td>
																						<td><a class="btn btn-inverse btn-sm" href="#"><i class="fa fa-pencil"></a></td>
																				</tr>
																				<tr>
																						<td><img src="<?= base_url('assets/user/assets/') ?>img/avatar3.png" alt="" class="img-circle avatar-mini"></td>
																						<td> Colin Fox </td>
																						<td> col </td>
																						<td><span class="label label-sm bg-theme"> Blocked </span</td>
																						<td><a class="btn btn-inverse btn-sm" href="#"><i class="fa fa-pencil"></a></td>
																				</tr>
																				<tr>
																						<td><img src="<?= base_url('assets/user/assets/') ?>img/avatar.png" alt="" class="img-circle avatar-mini"></td>
																						<td> Nick Stone </td>
																						<td> sanlim </td>
																						<td><span class="label label-sm bg-theme-inverse"> Approved </span></td>
																						<td><a class="btn btn-inverse btn-sm" href="#"><i class="fa fa-pencil"></a></td>
																				</tr>
																				<tr>
																						<td><img src="<?= base_url('assets/user/assets/') ?>img/avatar5.png" alt="" class="img-circle avatar-mini"></td>
																						<td> Edward Cook </td>
																						<td> sanlim </td>
																						<td><span class="label label-sm bg-theme"> Blocked </span</td>
																						<td><a class="btn btn-inverse btn-sm" href="#"><i class="fa fa-pencil"></a></td>
																				</tr>
																				<tr>
																						<td><img src="<?= base_url('assets/user/assets/') ?>img/avatar.png" alt="" class="img-circle avatar-mini"></td>
																						<td> Nick Stone </td>
																						<td> sanlim </td>
																						<td><span class="label label-sm bg-theme"> Blocked </span></td>
																						<td><a class="btn btn-inverse btn-sm" href="#"><i class="fa fa-pencil"></a></td>
																				</tr>
																				<tr>
																						<td><img src="<?= base_url('assets/user/assets/') ?>img/avatar6.png" alt="" class="img-circle avatar-mini"></td>
																						<td> Elis Lim </td>
																						<td> makr124 </td>
																						<td><span class="label label-sm bg-theme-inverse"> Approved </span></td>
																						<td><a class="btn btn-inverse btn-sm" href="#"><i class="fa fa-pencil"></a></td>
																				</tr>
																				<tr>
																						<td><img src="<?= base_url('assets/user/assets/') ?>img/avatar2.png" alt="" class="img-circle avatar-mini"></td>
																						<td> King Paul </td>
																						<td> king123 </td>
																						<td><span class="label label-sm bg-info"> Pending </span></td>
																						<td><a class="btn btn-inverse btn-sm" href="#"><i class="fa fa-pencil"></a></td>
																				</tr>
																				<tr>
																						<td><img src="<?= base_url('assets/user/assets/') ?>img/avatar3.png" alt="" class="img-circle avatar-mini"></td>
																						<td> Filip Larson </td>
																						<td> fil </td>
																						<td><span class="label label-sm bg-theme-inverse"> Approved </span></td>
																						<td><a class="btn btn-inverse btn-sm" href="#"><i class="fa fa-pencil"></a></td>
																				</tr>
																				<tr>
																						<td><img src="<?= base_url('assets/user/assets/') ?>img/avatar4.png" alt="" class="img-circle avatar-mini"></td>
																						<td> Martin Larson </td>
																						<td> larson12 </td>
																						<td><span class="label label-sm bg-theme"> Blocked </span></td>
																						<td><a class="btn btn-inverse btn-sm" href="#"><i class="fa fa-pencil"></a></td>
																				</tr>
																				<tr>
																						<td><img src="<?= base_url('assets/user/assets/') ?>img/avatar5.png" alt="" class="img-circle avatar-mini"></td>
																						<td> King Paul </td>
																						<td> sanlim </td>
																						<td><span class="label label-sm bg-theme"> Blocked </span></td>
																						<td><a class="btn btn-inverse btn-sm" href="#"><i class="fa fa-pencil"></a></td>
																				</tr>
																		</tbody>
																</table>
														</div>
												</div>
										</section>
								</div>
								<div class="col-md-4">
								
										<div class="well bg-theme-inverse">
												<div class="widget-tile">
													<section>
															<h5><strong>PAGES</strong> VIEWER </h5>
															<h2>97,584</h2>
															<div class="progress progress-xs progress-white progress-over-tile">
																	<div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="97584" aria-valuemax="300000"></div>
															</div>
															<label class="progress-label label-white">32.53% of  viewer target</label>
													</section>
													<div class="hold-icon"><i class="fa fa-laptop"></i></div>
												</div>
										</div>
										
										<div class="well bg-theme">
												<div class="widget-tile">
													<section>
															<h5><strong>REGISTERED</strong> USERS </h5>
															<h2>8,590</h2>
															<div class="progress progress-xs progress-white progress-over-tile">
																	<div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="8590" aria-valuemax="10000"></div>
															</div>
															<label class="progress-label label-white"> Just 1410 member to limit , <a href="#">Upgrade Now</a> </label>
													</section>
													<div class="hold-icon"><i class="fa fa-bar-chart-o"></i></div>
												</div>
										</div>
										
										<section class="panel">
												<header class="panel-heading no-borders">
														<label class="color">Custom <strong>Label and Title </strong></label>
												</header>												
														<div class="widget-chart">
																<div class="label-flot-custom-title"><span>Analysis title</span></div>
																<table id="example_pieDonut" class="flot-chart" data-type="pie" data-inner-radius="0.7" data-pie-style="shadow" data-tool-tip="show" data-width="100%" data-height="220px" >
																		<thead>
																				<tr>
																						<th></th>
																						<th style="color : #3db9af;">Other</th>
																						<th style="color : #DC4D79;">Webboard</th>
																						<th style="color : #BD3B47;">Article</th>
																						<th style="color : #DD4444;">Other</th>
																						<th style="color : #FD9C35;">Product Review</th>
																						<th style="color : #FEC42C;">Webboard</th>
																						<th style="color : #D4DF5A;">Article</th>
																						<th style="color : #575757;">Product Review</th>
																				</tr>
																		</thead>
																		<tbody>
																				<tr>
																						<th></th>
																						<td>44</td>
																						<td>8</td>
																						<td>8</td>
																						<td>8</td>
																						<td>8</td>
																						<td>8</td>
																						<td>8</td>
																						<td>8</td>
																				</tr>
																		</tbody>
																</table>
														</div><!-- // widget-chart -->
												
														<div class="panel-group" id="accordion">
																  <div class="panel panel-shadow">
																	    <header class="panel-heading bg-inverse" style="padding:0 10px; margin:20px">
																			<a class=" color-white" data-toggle="collapse" data-parent="#accordion" href="#accordionOne">
																				<i class="collapse-caret fa fa-angle-up"></i> Analysis  Chart
																			</a>
																	    </header>
																	    <div id="accordionOne" class="panel-collapse collapse">
																			 <div class="panel-body text-center">
																				<div class="label-flot-custom" data-flot-id="#example_pieDonut"></div>
																			 </div>
																				 <!-- //panel-body -->
																		    </div>
																		    <!-- //panel-collapse -->
																  </div>
																  <!-- //panel -->
														</div>
														<!-- //panel-group -->

										</section>	
										
										<section class="panel">
												<div class="widget-friend clearfix">
														<ul class="circle clearfix">
																<li>548 Follower Friends</li>
																<li class="online" title="zicdemo"><img alt="" src="<?= base_url('assets/user/assets/') ?>img/avatar.png"></li>
																<li class="online"><img alt="" src="<?= base_url('assets/user/assets/') ?>img/avatar2.png"></li>
																<li><img alt="" src="<?= base_url('assets/user/assets/') ?>img/avatar3.png"></li>
																<li class="online"><img alt="" src="<?= base_url('assets/user/assets/') ?>img/avatar4.png"></li>
																<li ><img alt="" src="<?= base_url('assets/user/assets/') ?>img/avatar5.png"></li>
																<li class="busy"><img alt="" src="<?= base_url('assets/user/assets/') ?>img/avatar6.png"></li>
																<li class="online"><img alt="" src="<?= base_url('assets/user/assets/') ?>photos_preview/50/people/1.jpg"></li>
																<li class="online"><img alt="" src="<?= base_url('assets/user/assets/') ?>photos_preview/50/people/2.jpg"></li>
																<li><a href="#"><i class="fa fa-plus"></i></a></li>
														</ul>
												</div>
												<footer class="panel-footer align-lg-right">
													<a href="#" >+ 542 more</a>
												</footer>
										</section>
										
										<section class="panel bg-inverse">
													<div id="owl-demo" class="owl-carousel carousel-white overflow">
															<div><img src="<?= base_url('assets/user/assets/') ?>photos_preview/thumbs/video.jpg" class="img-responsive"  alt=" "></div>
															<div><img src="<?= base_url('assets/user/assets/') ?>photos_preview/thumbs/3.jpg" class="img-responsive" alt=" "></div>
															<div><img src="<?= base_url('assets/user/assets/') ?>photos_preview/thumbs/1.jpg" class="img-responsive" alt=" "></div>
													</div>
										</section>	
										
										<section class="panel">
												<div class="widget-plan">
														<header>
																<h3>Premium</h3>
																<p class="color-theme">$59 / year</p>
														</header>
														<section>
																<i class="fa fa-dashboard"></i>
																<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
														</section>
														<footer>
																<button type="button" class="btn btn-theme">Choose</button>
														</footer>
												</div>
										</section>
										

										
								</div>
						</div>
						<!-- //content > row-->
						
				</div>
				<!-- //content-->
								
		</div>
		<!-- //main-->
		
		
		
		