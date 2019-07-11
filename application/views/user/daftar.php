<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta information -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<!-- Title-->
<title>Daftar</title>
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

</head>
<body class="full-lg">
<div id="wrapper">

<div id="loading-top">
		<div id="canvas_loading"></div>
		<span>Checking...</span>
</div>

<div id="main">
		<div class="container">
				<div class="row">
						<div class="col-lg-12">

								<div class="account-wall">
										<section class="align-lg-center">
										<!-- <div class="site-logo"></div> -->
										<h1 class="login-title"><span>Selamat</span> Datang <small> Silahan daftar untuk membuat akun baru</small></h1>
										</section>
										<form class="form-signin" action="<?= base_url('p_user/daftar')?>" method="post">
											<?php echo $this->session->flashdata('message');?>
												<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
												<section>
														<div class="input-group">
															<div class="input-group-addon"><i class="fa fa-user"></i></div>
															<input  type="text" class="form-control" name="username" placeholder="Username">
														</div>
														<div class="input-group">
															<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
															<input  type="email" class="form-control" name="email" placeholder="E-mail">
														</div>
														<div class="input-group" style="margin-top:-20px">
															<div class="input-group-addon"><i class="fa fa-key"></i></div>
															<input type="password" class="form-control"  name="password" placeholder="Password">
														</div>
														<div class="input-group">
															<div class="input-group-addon"><i class="fa fa-key"></i></div>
															<input type="password" class="form-control"  name="password2" placeholder="Ulangi Password">
														</div>
														<button class="btn btn-lg btn-theme-inverse btn-block" type="submit" id="sign-in" style="background:#EB3E32;border:0px solid;">Daftar</button>
												</section>
												<section class="clearfix">
														<div class="iCheck pull-left"  data-color="red">
														<input type="checkbox" checked>
														<label>Remember</label>
														</div>
														<a href="#" class="pull-right help">Forget Password? </a>
												</section>
												<span class="or" data-text="Or"></span>
												<a class="btn btn-lg btn-inverse btn-block" href="<?= base_url('user/'); ?>" type="button"> Masuk </a>
										</form>
										<a href="#" class="footer-link">&copy; 2014 ziceinclude &trade; </a>
								</div>
								<!-- //account-wall-->

						</div>
						<!-- //col-sm-6 col-md-4 col-md-offset-4-->
				</div>
				<!-- //row-->
		</div>
		<!-- //container-->

</div>
<!-- //main-->


</div>
<!-- //wrapper-->


<!--
////////////////////////////////////////////////////////////////////////
//////////     JAVASCRIPT  LIBRARY     //////////
/////////////////////////////////////////////////////////////////////
-->

<!-- Jquery Library -->
<script type="text/javascript" src="<?= base_url('assets/user/assets/') ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/user/assets/') ?>js/jquery.ui.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/user/assets/') ?>plugins/bootstrap/bootstrap.min.js"></script>
<!-- Modernizr Library For HTML5 And CSS3 -->
<script type="text/javascript" src="<?= base_url('assets/user/assets/') ?>js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="<?= base_url('assets/user/assets/') ?>plugins/mmenu/jquery.mmenu.js"></script>
<script type="text/javascript" src="<?= base_url('assets/user/assets/') ?>js/styleswitch.js"></script>
<!-- Library 10+ Form plugins-->
<script type="text/javascript" src="<?= base_url('assets/user/assets/') ?>plugins/form/form.js"></script>
<!-- Datetime plugins -->
<script type="text/javascript" src="<?= base_url('assets/user/assets/') ?>plugins/datetime/datetime.js"></script>
<!-- Library Chart-->
<script type="text/javascript" src="<?= base_url('assets/user/assets/') ?>plugins/chart/chart.js"></script>
<!-- Library  5+ plugins for bootstrap -->
<script type="text/javascript" src="<?= base_url('assets/user/assets/') ?>plugins/pluginsForBS/pluginsForBS.js"></script>
<!-- Library 10+ miscellaneous plugins -->
<script type="text/javascript" src="<?= base_url('assets/user/assets/') ?>plugins/miscellaneous/miscellaneous.js"></script>
<!-- Library Themes Customize-->
<script type="text/javascript" src="<?= base_url('assets/user/assets/') ?>js/caplet.custom.js"></script>
<script type="text/javascript">
$(function() {
		   //Login animation to center
			function toCenter(){
					var mainH=$("#main").outerHeight();
					var accountH=$(".account-wall").outerHeight();
					var marginT=(mainH-accountH)/2;
						   if(marginT>30){
							   $(".account-wall").css("margin-top",marginT-15);
							}else{
								$(".account-wall").css("margin-top",30);
							}
				}
				toCenter();
				var toResize;
				$(window).resize(function(e) {
					clearTimeout(toResize);
					toResize = setTimeout(toCenter(), 500);
				});

			//Canvas Loading
			  var throbber = new Throbber({  size: 32, padding: 17,  strokewidth: 2.8,  lines: 12, rotationspeed: 0, fps: 15 });
			  throbber.appendTo(document.getElementById('canvas_loading'));
			  throbber.start();

	});
</script>
</body>
</html>
