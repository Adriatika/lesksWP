<?php
/*
Template Name: Статья(longread)
Template Post Type: post

Single  page for long posts and articles, theme @Lesks@
.....
Made by Adriatika in 2018 for @PromoGroup Media@
.....
Author https://vk.com/altman8  https://www.facebook.com/Altman8
*/
get_template_part('header');
the_post();
$category = get_the_category(get_the_ID());
//$category[0]->cat_name;
//$category[0]->cat_ID;
$postId = get_the_ID();
?>
	<div class="container">
			<main class="content">
				<article class="post">
					<h1 class="post__mainTitle"><?php the_title();?></h1>
					<div class="inform">
						<time class="inform__timeBlock"><?php the_time('j F Y')?></time>
						<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
					</div>
					<?php 
					$size = 'full';
					$attr = array(
						'src' => $src,
						'class' => "aligncenter",
						'alt' => trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
					);
					the_post_thumbnail($size,$attr); ?>
					<?php the_content();?>
					<div class="share">
						<?php get_template_part('includes/share');?>
					</div>
						<?php get_template_part('includes/soc-comments');?>
					<footer class="tags">
						<?php 
						$postTags = get_the_terms( get_the_ID(), 'post_tag');?>
						<?php if($postTags){ ?>
							<span class="tags__tagLabel">теги</span>
							<ul class="tags__tagList">	
								<?php 
							foreach( $postTags as $curTerm ){
								echo '<li class="tags__tagItem">';
								echo '<a href="'. get_term_link( (int)$curTerm->term_id, $curTerm->taxonomy ) .'" class="tags__tagAnc">'. $curTerm->name .'</a>';
								echo '</li>';	
									}
								?>
							</ul>
						<?php };?>
					</footer>
				</article>
				<?php
				get_template_part('includes/hrBnr');
					$args = array(
						'cat' => $category[0]->cat_ID,
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
						<h2 class="content__title"><a href="<?php echo get_category_link($category[0]->cat_ID)?>"><?php echo get_cat_name($category[0]->cat_ID);?></a></h2>
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