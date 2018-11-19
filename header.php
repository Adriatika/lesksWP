<!DOCTYPE html>
<html lang="<?php bloginfo('language');?>">
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="icon" type="image/png" href="https://lesks.ru/wp-content/uploads/2017/04/favicon3.png">
	 <link rel="apple-touch-icon-precomposed" sizes="76x76" href="https://lesks.ru/wp-content/uploads/2017/04/favicon3.png"/>
	 <link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://lesks.ru/wp-content/uploads/2017/04/favicon3.png"/>
	 <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://lesks.ru/wp-content/uploads/2017/04/favicon3.png"/>
	 <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://lesks.ru/wp-content/uploads/2017/04/favicon3.png"/>
	 <meta property="fb:app_id" content="2005773896303783"/>
	 	<script type="text/javascript" src="https://vk.com/js/api/openapi.js?159"></script>
		<script type="text/javascript">
		  VK.init({apiId: 6756255, onlyWidgets: true});
		</script>
	<?php wp_head();?>
</head>
<body>
	<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v3.2&appId=2005773896303783&autoLogAppEvents=1';
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
	<div class="wrapper">
		<header class="header" id="upAnc">
			<div class="mainHeader">
				<input type="checkbox"  id="topBurger"  class="mainHeader__chkBurger">
				<label class="mainHeader__burger" for="topBurger"></label>
				<?php wp_nav_menu(array(
					'theme_location'  => 'topMenu',
					'menu'            => 'Верхнее меню', 
					'container'       => false, 
					'menu_class'      => 'mainHeader__menu', 
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',	
				));?>
				<a href="<?php echo home_url();?>" class="mainHeader__logo">
					<img src="<?php bloginfo('template_url');?>/img/logo2.svg" alt="Леснойкомплекс.рф">
				</a>	
				<div class="mainHeader__social">
					<input type="checkbox" class="mainHeader__visionForm" id="visionForm">
					<label for="visionForm" class="mainHeader__lblSearchForm"></label>
					<form class="mainHeader__searchForm" id="searchform" action="<?php echo home_url( '/' ) ?>" method="get" role="search">
						<input type="text" name="s" id="s" class="mainHeader__searchField" value="<?php echo get_search_query();?>" autocomplete="off">
						<input type="submit" name="searchButton" id="searchsubmit" class="mainHeader__searchSubmit" value="">
					</form>
					<div class="mainHeader__networks">
						<a href="<?php echo home_url();?>" class="mainHeader__netIcon" id="home"></a>
						<a href="https://www.youtube.com/channel/UCULQejj6xoBbhYVev9x2aCw" class="mainHeader__netIcon" id="ytb"></a>
						<a href="https://www.facebook.com/lesks.ru" class="mainHeader__netIcon" id="fb"></a>
						<a href="https://vk.com/lesks" class="mainHeader__netIcon" id="vk"></a>
					</div>
				</div>
			</div>
			<div class="hatch"></div>
			<input type="checkbox" class="mainHeader__headingToggle" id="headingToggle"><label for="headingToggle" class="mainHeader__lblHeadingTgl"></label>
				<?php wp_nav_menu(array(
					'theme_location'  => 'categoryMenu',
					'menu'            => 'Меню рубрик', 
					'container'       => false, 
					'menu_class'      => 'headingMenu', 
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,	
				));?>
		</header>