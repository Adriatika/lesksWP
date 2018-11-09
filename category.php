<?php 
/*
Main page of theme @Lesks@
.....
Made by Adriatika in 2018 for @PromoGroup Media@
.....
Author https://vk.com/altman8  https://www.facebook.com/Altman8
*/
get_template_part('header');
$catId = get_queried_object_id();
?>
		<div class="container">
			<main class="content">
				<h2 class="content__title"><?php echo get_queried_object()->name;?></h2>
				<div class="inform">
							<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
				</div>
					<?php
					if(have_posts()){
						while(have_posts()){
							the_post();
							$postId = get_the_ID();
						?>
							<div class="ctgWrapper">
								<div class="ctgRow">
									<a href="<?php the_permalink();?>" class="ctgRow__ancImg">
										<img src="<?php the_post_thumbnail_url();?>" alt="" class="ctgRow__img">
									</a>
									<div class="ctgRow__promo">
									<?php 
										$postTags = get_the_terms( $postId, 'post_tag');
									?>
									<?php if($postTags){ ?>
										<div class="ctgRow__meta">
											<?php
											$i=0;
											foreach ($postTags as $curTerm ) {
													echo '<a href="'.get_term_link( (int)$curTerm->term_id, $curTerm->taxonomy) .'" class="ctgRow__tag">'.$curTerm->name.'</a>';
													$i++;
													if($i==3){break;}
												}	
											?>
										</div>
									<?php
									};?>
										<a href="<?php the_permalink();?>" class="ctgRow__ancTitle">
											<h2>
											<?php the_title();?>
											</h2>
										</a>
										<p class="ctgRow__text"><?php echo kama_excerpt(array('maxchar'=>120));?></p>
									</div>
								</div>
							</div>	
							<?php
						} 
						get_template_part('includes/hrBnr');
						?>
						<?php if (  $wp_query->max_num_pages > 1 ) : ?>
							<script>
							var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
							var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
							var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
							var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
							</script>
							<div id="true_loadmore">Загрузить ещё</div>
						<?php endif; ?>
						<?php
					}
					?>	
				<h2 class="content__title"><a href="">Лесозаготовка</a></h2>
				<div class="dbbArts">
					<a href="#" class="dbbArts__item" style="background:url('https://picsum.photos/600/400?image=1055')no-repeat 50% 50%; background-size:cover;">
						<div class="dbbArts__cap"></div>
						<div class="dbbArts__promo">
							<h3 class="dbbArts__title">
								Интерактивный диалог алтайских властей и лесохозяйственников властей и лесохозяйственников
							</h3>
							<p class="dbbArts__text">
								По сообщению Рослесхоза, решением Арбитражного суда Томской области 12 апреля  расторгнут договор аренды лесного участка с ООО «Конкор» (г. Новосибирск). Лесной участок, по которому расторгнут договор аренды, расположен на территории Чаинского лесничества...
							</p>
							<span class="dbbArts__date">
								30 мая 2018
							</span>
						</div>
					</a>
					<a href="#" class="dbbArts__item" style="background:url('https://picsum.photos/600/400?image=1035')no-repeat 50% 50%; background-size:cover;">
						<div class="dbbArts__cap"></div>
						<div class="dbbArts__promo" >
							<h3 class="dbbArts__title">
								Интерактивный диалог алтайских властей и лесохозяйственников властей и лесохозяйственников
							</h3>
							<p class="dbbArts__text">
								По сообщению Рослесхоза, решением Арбитражного суда Томской области 12 апреля  расторгнут договор...
							</p>
							<span class="dbbArts__date">
								30 мая 2018
							</span>
						</div>
					</a>
				</div>
			</main>
			<aside class="sidebar">
				<?php get_template_part('includes/main-sidebar');?>
			</aside>
		</div>
		<?php get_template_part('footer');?>
</body>
</html>