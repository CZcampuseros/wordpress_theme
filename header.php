<?php
	 include('Mobile_Detect.php');
	 $detect = new Mobile_Detect;
	 if($detect->isMobile() && !$detect->isTablet()) {
 		$_SESSION['screentype'] = 'mobile';
	} else {
 		$_SESSION['screentype'] = 'desktop';
 	}
	 unset($detect);
?>
<!doctype html>
<html lang="cs">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="author" content="Pavel Dostál">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/icon.png">
		<!-- START WP_HEAD --><?php wp_head(); ?><!-- STOP WP_HEAD -->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" media="all" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/print.css" media="print" />
<?php if($_SESSION['screentype'] == 'mobile') { ?>
		<meta name="viewport" content="width=420, user-scalable=no">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/mobile.css" media="all" />
<?php } ?>
		<script>
			function changeColorON(what, backgroundColor) {
				document.getElementById(what).style.backgroundColor="#EDEDED";
				document.getElementById(what).style.borderColor="#EDEDED";
				document.getElementById(what).style.color="#00F";
				var elements = document.getElementById(what).getElementsByTagName('a')
				for(var i=0; i<elements.length; i++) {
					var a = elements[i]
					a.style.backgroundColor="transparent";
					a.style.borderColor="transparent";
					a.style.color="#00F";
				}
			}
			function changeColorOUT(what, backgroundColor) {
				document.getElementById(what).style.backgroundColor=backgroundColor;
				document.getElementById(what).style.borderColor=backgroundColor;
				document.getElementById(what).style.color="#ffffff";
				var elements = document.getElementById(what).getElementsByTagName('a')
				for(var i=0; i<elements.length; i++) {
					var a = elements[i]
					a.style.backgroundColor=backgroundColor;
					a.style.borderColor=backgroundColor;
					a.style.color="#ffffff";
				}
			}
		</script>
	</head>
	<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=316849068409144";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<header>
			<h1><a href="<?php //bloginfo('url'); ?>http://czcampuseros.eu/"><img src="<?php header_image(); ?>" alt="Logo" /></a></h1>
			<div class="banner">
				<?php dynamic_sidebar( 'header' ); ?>
			</div>
			<nav>
				<?php wp_nav_menu( array( 'theme_location' => 'headermenu', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
			</nav>
		</header>
