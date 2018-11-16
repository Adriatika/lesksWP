<?php
/*
Search page of theme @Lesks@
.....
Made by Adriatika in 2018 for @PromoGroup Media@
.....
Author https://vk.com/altman8  https://www.facebook.com/Altman8
*/
get_template_part('header');
$count = 0;
?>
		<div class="container">
			<main class="content">
				<h2 class="content__title">Результаты поиска</h2>
				<div class="inform">
							<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
				</div>
					<?php
					if(have_posts()){
						while(have_posts()){
							the_post();
							$postId = get_the_ID();
							$count++;
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
						get_template_part('includes/wp-pagenavi');
						get_template_part('includes/hrBnr');
						?>
						<?php
					} else{
						echo '<p class="dontSearch"> По Вашему запросу ничего не найдено</p><br>';
						get_template_part('includes/hrBnr');
					}
					?>	
				<?php
					$caty = 1;
					$args = array(
						'cat'=>$caty,
						'posts_per_page'=>2,
						'post_type' => 'post',
						'tag__not_in'=> $tagId,
						'no_found_rows' => true,
						'orderby'=>'date',
						'order'=>'DESC',
					);
					$query = new WP_Query($args);
					if($query->have_posts()){
					?>
						<h2 class="content__title">
							<a href="<?php echo get_category_link($caty)?>"><?php echo get_cat_name($caty);?></a>
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
					<?php
					$postsCount=2;
					if ($count<=2){
						$postsCount= 8;
					} elseif($count <=6){
						$count = 4;
					};
					$caty2=6;
				 	$args = array(
					 	'cat'=>$caty2,
						'posts_per_page' =>$postsCount,
						'no_found_rows' => true,
						'post_type' => 'post',
						'orderby' => 'date',
						'order' => 'DESC'
					);
					$query = new WP_Query($args);
					if($query->have_posts()){
						?>
						<h2 class="content__title"><a href="<?php echo get_category_link($caty2)?>"><?php echo get_cat_name($caty2);?></a></h2>
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
					<?php }
					wp_reset_postdata();
					?>
			</main>
			<aside class="sidebar">
				<?php get_template_part('includes/long-sidebar');?>
			</aside>
		</div>
		<?php 
			get_template_part('footer');
		?>