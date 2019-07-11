
<!DOCTYPE html>
<html lang="en">
<head>

<!-- Meta information -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<!-- Title-->
<title>Selamat Datang, <?= $user->username ?></title>

<!-- Favicons -->
<!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/user/assets/') ?>ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/user/assets/') ?>ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/user/assets/') ?>ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/user/assets/') ?>ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="<?= base_url('assets/user/assets/') ?>ico/favicon.ico"> -->

<!-- CSS Stylesheet-->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/user/assets/') ?>css/bootstrap/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/user/assets/') ?>css/bootstrap/bootstrap-themes.css" />
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/user/assets/') ?>css/style.css" />

<!-- Styleswitch if  you don't chang theme , you can delete -->
<link type="text/css" rel="alternate stylesheet" media="screen" title="style1" href="<?= base_url('assets/user/assets/') ?>css/styleTheme1.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style2" href="<?= base_url('assets/user/assets/') ?>css/styleTheme2.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style3" href="<?= base_url('assets/user/assets/') ?>css/styleTheme3.css" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style4" href="<?= base_url('assets/user/assets/') ?>css/styleTheme4.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<body class="leftMenu nav-collapse">
<div id="wrapper">
		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     HEADER  CONTENT     ///////////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="header">
		
				<!-- <div class="logo-area clearfix">
						<a href="#" class="logo"></a>
				</div> -->
				<!-- //logo-area-->
				
				<div class="tools-bar">
						<ul class="nav navbar-nav nav-main-xs">
								<li><a href="#" class="icon-toolsbar nav-mini"><i class="fa fa-bars"></i></a></li>
						</ul>
						<ul class="nav navbar-nav nav-top-xs hidden-xs tooltip-area">
								<li class="h-seperate"></li>
						</ul>
						<ul class="nav navbar-nav navbar-right tooltip-area">
								<li>
                  <a href="#" class="nav-collapse avatar-header" data-toggle="tooltip" title="Show / hide  menu" data-container="body" data-placement="bottom">
                      <img alt="" src="<?= base_url('assets/') ?>user.jpg"  class="circle">
                      <span class="badge">3</span>
                  </a>
								</li>
								<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
											<em style="text-transform:capitalize"><strong>Hai</strong>, <?= $user->username ?> </em> <i class="dropdown-icon fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu pull-right icon-right arrow">
												<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
												<li><a href="#"><i class="fa fa-cog"></i> Setting </a></li>
												<li class="divider"></li>
												<li><a href="<?= base_url('p_user/logout') ?>"><i class="fa fa-sign-out"></i> Keluar </a></li>
										</ul>
										<!-- //dropdown-menu-->
								</li>
								<li class="visible-lg">
									<a href="#" class="h-seperate fullscreen" data-toggle="tooltip" title="Full Screen" data-container="body"  data-placement="left">
										<i class="fa fa-expand"></i>
									</a>
								</li>
						</ul>
				</div>
				<!-- //tools-bar-->
				
		</div>
		<!-- //header-->
		
		
		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     SLIDE LEFT CONTENT     //////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="nav">
				<div id="nav-title">
					<h3 style="text-transform:capitalize"><strong>Hai</strong>, <?= $user->username ?></h3>
				</div>
				<!-- //nav-title-->
				<div id="nav-scroll">
						<div class="avatar-slide">
						
								<span class="easy-chart avatar-chart" data-color="theme-inverse" data-percent="69" data-track-color="rgba(255,255,255,0.1)" data-line-width="5" data-size="118">
										<span class="percent"></span>
                    <img alt="" src="<?= base_url('assets/') ?>user.jpg" class="circle">
                  </span>
                  <!-- //avatar-chart-->
								
								<div class="avatar-detail">
										<p><button class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i> Edit Profile</button></p>
										<p><?= $user->email ?></p>
								</div>
								<!-- //avatar-detail-->
								
								<div class="avatar-link btn-group btn-group-justified">
										<a class="btn" href="profile.html"  title="Portfolio"><i class="fa fa-briefcase"></i></a>
										<a class="btn"  data-toggle="modal" href="#md-notification" title="Notification">
												<i class="fa fa-bell-o"></i><em class="green"></em>
										</a>
										<a class="btn"  data-toggle="modal" href="#md-messages"  title="Messages">
												<i class="fa fa-envelope-o"></i><em class="active"></em>
										</a>
										<a class="btn" href="#menu-right" title="Contact List"><i class="fa fa-book"></i></a>
								</div>
								<!-- //avatar-link-->
								
						</div>
						<!-- //avatar-slide-->
						
						
						<div class="widget-collapse dark">
								<header>
										<a data-toggle="collapse" href="#collapseSummary"><i class="collapse-caret fa fa-angle-up"></i> Summary Order </a>
								</header>
								<section class="collapse in" id="collapseSummary">
										<div class="collapse-boby" style="padding:0">
										
												<div class="widget-mini-chart align-xs-left">
														<div class="pull-right" >
																<div class="sparkline mini-chart" data-type="bar" data-color="warning" data-bar-width="10" data-height="35">2,3,4,5,7,4,5</div>
														</div>
														<p>This week's balance</p>
														<h4>$12,788</h4>
												</div>
												<!-- //widget-mini-chart -->
												
												<div class="widget-mini-chart align-xs-right">
														<div class="pull-left">
																<div class="sparkline mini-chart" data-type="bar" data-color="theme" data-bar-width="10" data-height="45">2,3,7,5,4,6,6,3</div>
														</div>
														<p>This week sales</p>
														<h4>1,325 item</h4>
												</div>
												<!-- //widget-mini-chart -->
												
										</div>
										<!-- //collapse-boby-->
										
								</section>
								<!-- //collapse-->
						</div>
						<!-- //widget-collapse-->
						
						
						
						<div class="widget-collapse dark">
								<header>
										<a data-toggle="collapse" href="#collapseTasks"><i class="collapse-caret fa fa-angle-down"></i> (2) Tasks processing </a>
								</header>
								<section class="collapse" id="collapseTasks">
								
										<div class="collapse-boby">
										
												<div class="widget-slider">
														<p>Upload status</p>
														<div class="progress progress-dark progress-xs tooltip-in">
																<div class="progress-bar bg-darkorange" aria-valuetransitiongoal="75"></div>
														</div>
														<label class="progress-label">Master.zip 4 / 5 </label>
														<!-- //progress-->
														
														<div class="progress progress-dark progress-xs">
																<div class="progress-bar bg-theme-inverse" aria-valuetransitiongoal="45"></div>
														</div>
														<label class="progress-label lasted">Profile 2 / 5 </label>
														<!-- //progress-->
														
												</div>
												<!-- //widget-slider-->
												
										</div>
										<!-- //collapse-boby-->
										
								</section>
								<!-- //collapse-->
						</div>
						<!-- //widget-collapse-->
						
						
						
						<div class="widget-collapse dark">
								<header>
										<a data-toggle="collapse" href="#collapseSetting"><i class="collapse-caret fa fa-angle-up"></i> Setting Option </a>
								</header>
								<section class="collapse in" id="collapseSetting">
										<div class="collapse-boby" style="padding:0">
										
												<ul class="widget-slide-setting">
														<li>
																<div class="ios-switch theme pull-right">
																		<div class="switch"><input type="checkbox" name="option"></div>
																</div>
																<label>Switch <span>OFF</span></label>
																<small>Lorem ipsum dolor sit amet</small>
														</li>
														<li>
																<div class="ios-switch theme-inverse pull-right">
																		<div class="switch"><input type="checkbox" name="option_1" checked></div>
																</div>
																<label>Switch <span>ON</span></label>
																<small>Lorem ipsum dolor sit amet</small>
														</li>
												</ul>
												<!-- //widget-slide-setting-->
												
										</div>
										<!-- //collapse-boby-->
										
								</section>
								<!-- //collapse-->
						</div>
						<!-- //widget-collapse-->
						
						
				</div>
				<!-- //nav-scroller-->
		</div>
		<!-- //nav-->