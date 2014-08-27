<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">
	
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/vendor/custom.modernizr.js"></script>
	<link href='//fonts.googleapis.com/css?family=Nobile:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/foundation.min.css" />
	<!-- Foundation 3 for IE 8 and earlier -->
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/foundation.ie8.css">
	<![endif]-->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/feature.css">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=329769627157474";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--[if lt IE 7]>
	<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<div id="wrap">

	<!-- Header -->

	<header id="header">
		<div class="row">
			<div class="large-3 columns left">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo_transparent.png" alt="Fake Friend Finder for Facebook"></a>
			</div>
			<div class="large-9 columns right">
				<div class="row">
					<div class="large-4 large-offset-2 columns">
						<div class="fb-like" data-href="https://www.facebook.com/" data-width="150" data-layout="button_count" data-show-faces="false" data-send="true"></div>
					</div>
<!--					<div class="large-3 columns">
						<ul>
							<li><a href="https://www.facebook.com/" target="_blank"><img src="img/icon-socialmedia-facebook.png" alt="Facebook" width="24" height="24" /></a></li>
							<li><a href="https://twitter.com/" target="_blank"><img src="img/icon-socialmedia-twitter.png" alt="Twitter" width="24" height="24" /></a></li>

							
						</ul>						
					</div>
-->					
					<!--<div class="large-3 columns">
						<ul class="nav">
							<li><a href="/about/" target="_self">About Us</a></li>
							<li><a href="/contact/" target="_self">Contact Us</a></li>
						</ul>
					</div>
					-->
					
				</div>
				<!--<div class="row">
					<div class="large-12 columns">
						<h1>Harnessing the sun to benefit people and the environment</h1>
					</div>
				</div>
				-->
				
			</div>
		</div>
	</header>

	<!-- Nav -->

	<div id="nav" class="row">
		<div class="large-12 columns">
			<div class="contain-to-grid sticky">
				<nav class="top-bar">
					<ul class="title-area">
						<li class="name"></li>
						<li class="toggle-topbar menu-icon"><a href=""><span>Menu</span></a></li>
					</ul>
					<section class="top-bar-section">
						
						<!--
						<ul class="nav left">
							<li><a href="/" target="_self">Home</a></li>
							<li><a href="#" target="_self">About FFF</a></li>
							<li><a href="#" target="_self">Contact Us</a></li>
							<li><a href="#" target="_self">Login / Account</a></li>
						</ul>
						-->
						<?php $this->widget('zii.widgets.CMenu',array(
							'items'=>array(
								array('label'=>'Home', 'url'=>array('/site/index')),
								array('label'=>'About FFF', 'url'=>array('/site/page', 'view'=>'about')),
								array('label'=>'Contact Us', 'url'=>array('/site/contact')),
                                                                 array('label'=>'Users List', 'url'=>array('/users/admin'), 'visible'=>(Yii::app()->user->name=="admin")),
                                                                 array('label'=>'Profile', 'url'=>array('/users/view','id'=>Yii::app()->user->getId()), 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->user->name!="admin")),
								array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
								array('label'=>'Register', 'url'=>array('/users/create'), 'visible'=>Yii::app()->user->isGuest),
								array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
							),
							'htmlOptions' => array(
                    				'class'=>'nav left',
                        	),
						)); ?>
						
					</section>
				</nav>
			</div>
		</div>
	</div>
	  
	<!-- Content -->
	
	<div id="content" class="row secondary">
		<div class="large-9 columns main">

	<!-- HEADER END //-->
	
			<?php echo $content; ?>	
					

		</div>
		<!--
		<div class="large-3 columns sidebar">
		
			<div style="border:1px solid black;height:140px;width:95%">FACEBOOK<br>LOGIN FORM GOES HERE</div>
		
			<ul class="nav">
				<li><a href="#">Link 1</a></li>
				<li><a href="#">Link 2</a></li>
				<li><a href="#">Link 3</a></li>
			</ul>

		</div>
		-->
	</div>

	<div id="push"></div>

</div> <!-- / Wrap -->
	
<!-- Footer -->

<footer id="footer">
	<div class="row">
		<div class="large-6 columns left">
			<div class="left"><p><em>Copyright 2014 Fake Friend Finder.</em><br /><em>All rights reserved.</em></p></div>
					
		<!--	<div class="left"><p><em><strong>Phone:</strong> +1 (916) 455-4499</em><br /><em><strong>Fax:</strong> +1 (916) 455-4497</em></p></div>-->
		</div>

		<div class="large-4 columns right">
			<!--
			<ul>
				<li><a href="/about/" target="_self">About Us</a></li>
				<li><a href="/contact/" target="_self">Contact Us</a></li>
				<li><a href="/privacy/" target="_self">Privacy</a></li>
			</ul>
			-->
			<?php $this->widget('zii.widgets.CMenu',array(
							'items'=>array(
								array('label'=>'About Us', 'url'=>array('/site/page', 'view'=>'about')),
								array('label'=>'Contact Us', 'url'=>array('/site/contact')),
								array('label'=>'Privacy', 'url'=>array('/site/index')), 
							),
							
						)); ?>
		</div>
		
		<div class="large-2 columns right">
			<ul>
							<li><a href="https://www.facebook.com/" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icon-socialmedia-facebook.png" alt="Facebook" width="24" height="24" /></a></li>
							<li><a href="https://twitter.com/" target="_blank"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icon-socialmedia-twitter.png" alt="Twitter" width="24" height="24" /></a></li>

							<!-- <li><a href="" target="_blank"><img src="img/icon-socialmedia-sharethis.png" alt="Share This" width="24" height="24"></a></li>
							<li><a href="" target="_blank"><img src="img/icon-socialmedia-rss.png" alt="RSS" width="24" height="24"></a></li> -->
							
						</ul>

		</div>
		
		
	</div>
</footer>

	<script>
		document.write('<script src=/js/vendor/'
		+ ('__proto__' in {} ? 'zepto' : 'jquery')
		+ '.js><\/script>');
	</script>
	
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/vendor/zepto.js"></script>

	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/foundation/foundation.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/foundation/foundation.topbar.js"></script>
	
	<script>
		$(document).foundation();
	</script>

</body>
</html>
	

	
