<!DOCTYPE html>
<html lang="<?php bloginfo('language');?>">
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head();?>
</head>
<body>
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