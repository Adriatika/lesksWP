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
				<?php
				$caty = 1;
				 $args = array(
				 	'cat'=>$caty,
					'posts_per_page' =>2,
					'no_found_rows' => true,
					'post_type' => 'post',
					'orderby' => 'date',
					'order' => 'DESC'
				);
				$query = new WP_Query($args);
				if($query->have_posts()){
					?>
						<h2 class="content__title">
							<a href="<?php echo get_category_link($caty)?>"><?php echo get_cat_name($caty);?></a>
						</h2>
				<div class="dbbArts">
					<?php
					while($query->have_posts()){
						$query->the_post();?>
						<a href="<?php the_permalink();?>" class="dbbArts__item" style="background:url('<?php the_post_thumbnail_url();?>')no-repeat 50% 50%; background-size:cover;">
						<div class="dbbArts__cap"></div>
						<div class="dbbArts__promo">
							<h3 class="dbbArts__title">
								<?php $headTitle = get_the_title();
								echo kama_excerpt(array('maxchar'=>80));?>
							</h3>
							<span class="dbbArts__date">
								<?php the_time("j F Y"); ?>
							</span>
						</div>
					</a>
						<?php
					}
					?>
					</div>
					<?php
				}
				wp_reset_postdata();
				?>
				<?php
					$args = array(
					'cat' => 18,
					'posts_per_page' =>2,
					'no_found_rows' => true,
					'post_type' => 'post',
					'orderby' => 'date',
					'order' => 'DESC'
					);
					$query = new WP_Query($args);
					$i=0;
					if($query->have_posts()){ ?>
						<h2 class="content__title"><a href="<?php echo get_category_link('18')?>"><?php echo get_cat_name('18');?></a></h2>
						<div class="dbmArts">		
						<?php
							while($query->have_posts()){
								$query->the_post();
								$i++;
						?>
							<a href="<?php the_permalink();?>" class="dbmArts__item">
						<div class="dbmArts__promo">
							<h4 class="dbmArts__title">
								<?php $titleHead = get_the_title(); echo kama_excerpt(array('maxchar'=>60, 'text'=>$titleHead));?></h4>
							<p class="dbmArts__text"><?php echo kama_excerpt(array('maxchar'=>120));?></p>
							<span class="dbmArts__date"><?php the_time("j F Y");?></span>
						</div>
						<div class="dbmArts__img">
							<?php the_post_thumbnail();?>
							<span><?php the_time("j F Y");?></span>
						</div>	
					</a>
							<?php }?>	

				</div>
					<?php }
					wp_reset_postdata();
				?>
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