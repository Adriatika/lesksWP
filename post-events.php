<?php
/*
Template Name: Все мероприятия
Template Post Type:page
.....
Page for events list, theme @Lesks@
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
			<main class="content" >
				<h2 class="content__title">Предстоящие мероприятия</h2>
				<div class="inform">
							<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
				</div>
					<?php echo do_shortcode("[events_list scope='future' limit=10]
					<div class='ctgWrapper'>
					<div class='ctgRow'>
						<a href='#_EVENTURL' class='ctgRow__ancImg'>
							<img src='#_EVENTIMAGEURL' alt='#_EVENTNAME' class='ctgRow__img'>
						</a>
						<div class='ctgRow__promo'>
							
							<a href='#_EVENTURL' class='ctgRow__ancTitle'>
							<h2>#_EVENTNAME</h2>
						</a>
						<div class='ctgRow__meta'>
								<span class='ctgRow__tag'>#_LOCATIONTOWN</span>
							</div>
							<p class='ctgRow__text'>#_EVENTEXCERPT{20, ...}</p>
						</div>
					</div>
						</div>
					[/events_list]"
						);
						?>
				<aside class="eventsSidebar">
					<?php dynamic_sidebar('events-sidebar');?>
				</aside>
				<?php get_template_part('includes/hrBnr');?>
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
							<?php 
							if($i%2==0){
								?>
							</div>
							<div class="dbmArts">
								<?php
							}
						}?>	

				</div>
					<?php }
					wp_reset_postdata();
				?>
				<?php
				$caty = 10;
				 $args = array(
				 	'cat'=>$caty,
					'posts_per_page' =>4,
					'no_found_rows' => true,
					'post_type' => 'post',
					'orderby' => 'date',
					'order' => 'DESC'
				);
				$query = new WP_Query($args);
				if($query->have_posts()){
					?>
				<h2 class="content__title">
					<a href="<?php echo get_category_link($caty);?>"><?php echo get_cat_name($caty)?></a>
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
					$caty=11;
					$args = array(
					'cat' => $caty,
					'posts_per_page' =>2,
					'no_found_rows' => true,
					'post_type' => 'post',
					'orderby' => 'date',
					'order' => 'DESC'
					);
					$query = new WP_Query($args);
					$i=0;
					if($query->have_posts()){ ?>
						<h2 class="content__title"><a href="<?php echo get_category_link($caty)?>"><?php echo get_cat_name($caty);?></a></h2>
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
							<?php 
							if($i%2==0){
								?>
							</div>
							<div class="dbmArts">
								<?php
							}
						}?>	

				</div>
					<?php }
					wp_reset_postdata();
				?>
			</main>

			<aside class="sidebar">
				<?php get_template_part('includes/event-sidebar');?>
			</aside>
		</div>
		<?php get_template_part('footer');?>