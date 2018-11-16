<?php
/*
Template Post Type:page
.....
Single page, theme @Lesks@
.....
Made by Adriatika in 2018 for @PromoGroup Media@
.....
Author https://vk.com/altman8  https://www.facebook.com/Altman8
*/
the_post();
get_template_part('header');
?>
		<div class="container">
			<main class="content">
				<h2 class="content__title"><?php echo the_title();?></h2>
				<div class="inform">
							<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
				</div>
				<article class="post">
					<?php the_content();?>
				</article>
				<div class="share">
				<?php get_template_part('includes/share');?>
				</div>
				<?php
						get_template_part('includes/hrBnr');
				
						$args = array(
							'cat' => 1,
							'posts_per_page'=>2,
							'post_type' => 'post',
							'post__not_in'=>array($postId),
							'no_found_rows' => true,
							'orderby'=>'date',
							'order'=>'DESC',
						);
						$query = new WP_Query($args);
						if($query->have_posts()){
						?>
							<h2 class="content__title">
								<a href="<?php echo get_category_link(1)?>"><?php echo get_cat_name(1);?></a>
							</h2>
							<div class="dbmArts">
						<?php
							while($query->have_posts()){
								$query->the_post();
								?>
									<a href="<?php the_permalink()?>" class="dbmArts__item">
										<div class="dbmArts__promo">
											<h4 class="dbmArts__title">
												<?php
												$text= get_the_title();
												echo kama_excerpt(array('maxchar'=>60, 'text'=>$text))
												?>
											</h4>
											<p class="dbmArts__text"><?php
												echo kama_excerpt(array('maxchar'=>90));
											?></p>
											<span class="dbmArts__date"><?php the_time('j F Y');?></span>
										</div>
										<div class="dbmArts__img">
											<?php the_post_thumbnail();?>
											<span><?php the_time('j F Y');?></span>
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
			</main>
			<aside class="sidebar">
				<?php get_template_part('includes/long-sidebar');?>
			</aside>
		</div>
<?php get_template_part('footer');?>