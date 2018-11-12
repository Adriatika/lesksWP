<a href="#upAnc" class="main__upArrow"></a>
		<footer class="mainFooter">
			<div class="mainFooter__social">
				<span class="mainFooter__drt">присоединяйтесь:</span>
				<div class="mainFooter__socRow">
					<a href="https://www.facebook.com/lesks.ru" class="mainFooter__socItem" id="fFb"></a>
					<a href="https://vk.com/lesks" class="mainFooter__socItem" id="fVk"></a>
					<a href="https://www.youtube.com/channel/UCULQejj6xoBbhYVev9x2aCw" class="mainFooter__socItem" id="fYotb"></a>
				</div>
			</div>
			<div class="mainFooter__addrBlock">
				<span class="mainFooter__address">
					660068, Красноярск Мичурина, 3в, оф. 405
				</span>
				<span class="mainFooter__phone">
					+7 391 237 15 37
				</span>
				<span class="mainFooter__email">
					dprom@pgmedia.ru
				</span>
			</div>
			<div class="mainFooter__menu">
					<?php wp_nav_menu(array(
						'theme_location'  => 'bottomMenu',
						'menu'            => 'Меню внизу страницы', 
						'container'       => false, 
						'menu_class'      => 'mainFooter__nav', 
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,	
					));?>
				<span class="mainFooter__copyright">
					&copy; 2018-2019 PromoGroup Media
				</span>
			</div>
		</footer>
	</div>
	<?php wp_footer();?>
</body>
</html>