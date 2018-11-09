<?php
/*
Single-event page of theme @Lesks@
.....
Made by Adriatika in 2018 for @PromoGroup Media@
.....
Author https://vk.com/altman8  https://www.facebook.com/Altman8

*/
global $EM_Event;
the_post('event');
get_template_part('header');
?>
		<div class="container">
			<main class="content">
				<h2 class="content__title"><?php echo do_shortcode("[event post_id=' ' ] #_EVENTNAME[/event]");?></h2>
				<div class="inform">
							<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
				</div>
				<article class="post">
						<?php echo do_shortcode("[event post_id=' ' ] #_EVENTIMAGE[/event]");?>
						<span class="eventDate">
							<?php echo do_shortcode("[event post_id=' ' ] #_EVENTDATES[/event]");?>
						</span>
					<p><?php echo do_shortcode("[event post_id=' ' ] #_EVENTNOTES[/event]");?></p>
					<!--Здесь должна быть ваша инфа -->
					<div class="map">
						<div class="mapHolder">
								<?php echo do_shortcode("[event post_id=' ' ] #_LOCATIONMAP[/event]");?>
						</div>
					</div>	
				</article>
				<aside class="eventsSidebar">
					<?php dynamic_sidebar('events-sidebar');?>
				</aside>
				<?php get_template_part('includes/hrBnr');?>
				<h2 class="content__title"><a href="#">Новости</a></h2>
				<div class="dbmArts">
					<a href="#" class="dbmArts__item eventsNews">
						<div class="dbmArts__promo">
							<h4 class="dbmArts__title">Гибридный харвестер готовится к выходу на российский рынок</h4>
							<p class="dbmArts__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus perspiciatis fuga nulla ea, unde ullam commodi voluptatem</p>
							<span class="dbmArts__date">30 мая 2018</span>
						</div>
						<div class="dbmArts__img">
							<img src="img/mininews.jpg" alt="мелкая картинка">
							<span>30 мая 2018</span>
						</div>	
					</a>
					<a href="#" class="dbmArts__item eventsNews">
						<div class="dbmArts__promo">
							<h4 class="dbmArts__title">Гибридный харвестер готовится к выходу на российский рынок</h4>
							<p class="dbmArts__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus perspiciatis fuga nulla ea, unde ullam commodi voluptatem</p>
							<span class="dbmArts__date">30 мая 2018</span>
						</div>
						<div class="dbmArts__img eventsNews">
							<img src="img/mininews.jpg" alt="мелкая картинка">
							<span>30 мая 2018</span>
						</div>
					</a>
					<a href="#" class="dbmArts__item eventsNews">
						<div class="dbmArts__promo">
							<h4 class="dbmArts__title">Гибридный харвестер готовится к выходу на российский рынок</h4>
							<p class="dbmArts__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus perspiciatis fuga nulla ea, unde ullam commodi voluptatem</p>
							<span class="dbmArts__date">30 мая 2018</span>
						</div>
						<div class="dbmArts__img">
							<img src="img/mininews.jpg" alt="мелкая картинка">
							<span>30 мая 2018</span>
						</div>
					</a>
					<a href="#" class="dbmArts__item eventsNews">
						<div class="dbmArts__promo">
							<h4 class="dbmArts__title">Гибридный харвестер готовится к выходу на российский рынок</h4>
							<p class="dbmArts__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus perspiciatis fuga nulla ea, unde ullam commodi voluptatem</p>
							<span class="dbmArts__date">30 мая 2018</span>
						</div>
						<div class="dbmArts__img">
							<img src="img/mininews.jpg" alt="мелкая картинка">
							<span>30 мая 2018</span>
						</div>
					</a>
					<a href="#" class="dbmArts__item eventsNews">
						<div class="dbmArts__promo">
							<h4 class="dbmArts__title">Гибридный харвестер готовится к выходу на российский рынок</h4>
							<p class="dbmArts__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus perspiciatis fuga nulla ea, unde ullam commodi voluptatem</p>
							<span class="dbmArts__date">30 мая 2018</span>
						</div>
						<div class="dbmArts__img">
							<img src="img/mininews.jpg" alt="мелкая картинка">
							<span>30 мая 2018</span>
						</div>
					</a>
					<a href="#" class="dbmArts__item eventsNews">
						<div class="dbmArts__promo">
							<h4 class="dbmArts__title">Гибридный харвестер готовится к выходу на российский рынок</h4>
							<p class="dbmArts__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus perspiciatis fuga nulla ea, unde ullam commodi voluptatem</p>
							<span class="dbmArts__date">30 мая 2018</span>
						</div>
						<div class="dbmArts__img">
							<img src="img/mininews.jpg" alt="мелкая картинка">
							<span>30 мая 2018</span>
						</div>
					</a>
				</div>
			</main>

			<aside class="sidebar">
				<?php get_template_part('includes/long-sidebar');?>
			</aside>
		</div>
		<a href="#upAnc" class="main__upArrow"></a>
		<footer class="mainFooter">
			<div class="mainFooter__social">
				<span class="mainFooter__drt">присоединяйтесь:</span>
				<div class="mainFooter__socRow">
					<a href="#" class="mainFooter__socItem" id="fFb"></a>
					<a href="#" class="mainFooter__socItem" id="fVk"></a>
					<a href="#" class="mainFooter__socItem" id="fYotb"></a>
				</div>
			</div>
			<div class="mainFooter__addrBlock">
				<span class="mainFooter__address">
					660068, г. Красноярск ул.Мичурина, 3в, оф. 405
				</span>
				<span class="mainFooter__phone">
					+7 391 237 15 37
				</span>
				<span class="mainFooter__email">
					dprom@pgmedia.ru
				</span>
			</div>
			<div class="mainFooter__menu">
				<ul class="mainFooter__nav">
					<li class="mainFooter__menuItem"><a href="#" class="mainFooter__an">О проекте</a></li>
					<li class="mainFooter__menuItem"><a href="#" class="mainFooter__an">Архив номеров</a></li>
					<li class="mainFooter__menuItem"><a href="#" class="mainFooter__an">Подписка на журнал</a></li>
					<li class="mainFooter__menuItem"><a href="#" class="mainFooter__an">Фотогалерея</a></li>
					<li class="mainFooter__menuItem"><a href="#" class="mainFooter__an">Мероприятия</a></li>
					<li class="mainFooter__menuItem"><a href="#" class="mainFooter__an">Контакты</a></li>
				</ul>
				<span class="mainFooter__copyright">
					&copy; 2018-2019 PromoGroupMedia
				</span>
			</div>
		</footer>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/libs.min.js"></script>
</body>
</html>