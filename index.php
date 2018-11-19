<?php 
/*
Main page of theme @Lesks@
.....
Made by Adriatika in 2018 for @PromoGroup Media@
.....
Author https://vk.com/altman8  https://www.facebook.com/Altman8
*/
get_template_part('header')?>
		<div class="container">
			<main class="content">
				<h2 class="content__title"><a href="<?php echo get_category_link(1);?>"><?php echo get_cat_name(1);?></a></h2>
				<?php $args = array(
					'cat' => 1,
					'posts_per_page' => 5,
					'no_found_rows' => true,
					'post_type' => 'post',
					'orderby' => 'date',
					'order' => 'DESC'
				);
				$query = new WP_Query($args);
				if($query->have_posts()){
					$i=0;
					?>
				<div class="slider">
					<input type="radio" id="tg1" class="slider__check" name="sldr" checked>
					<input type="radio" id="tg2" class="slider__check" name="sldr">
					<input type="radio" id="tg3" class="slider__check" name="sldr">
					<input type="radio" id="tg4" class="slider__check" name="sldr">
					<input type="radio" id="tg5" class="slider__check" name="sldr">
					<div class="slider__controls">
						<label for="tg1" class="slider__toggle"></label>
						<label for="tg2" class="slider__toggle"></label>
						<label for="tg3" class="slider__toggle"></label>
						<label for="tg4" class="slider__toggle"></label>
						<label for="tg5" class="slider__toggle"></label>
					</div>
					<?php
					while($query->have_posts()){
						$query->the_post();
						$i++;
						?>
						<div class="slide <?php echo "slide".$i;?>">
						<div class="slide__holder"></div>
						<article class="slide__promo">
							<h3 class="slide__title">
								<a href="<?php the_permalink();?>" class="slide__anc">
									<?php $headText = get_the_title();
									echo kama_excerpt(array('maxchar'=>60, 'text' =>$headText));
									?>
								</a>
							</h3>
							<span class="slide__date"><?php the_time("j F Y");?></span>
							<a href="<?php the_permalink();?>" class="slide__text">
								<?php echo kama_excerpt(array('maxchar'=>130));?>	
							</a>
						</article>
						<a href="<?php the_permalink();?>" class="slide__ancImg" style="background-image:url(<?php the_post_thumbnail_url();?>);">
							<span><?php the_time("j F Y");?></span>
						</a>
					</div>
						<?php
					}
				}
				wp_reset_postdata();
				?>
				</div>
				<h2 class="content__title">
					<a href="<?php echo get_category_link(6);?>"><?php echo get_cat_name(6)?></a>
				</h2>
				<?php
				 $args = array(
					'cat' => 6,
					'posts_per_page' =>2,
					'no_found_rows' => true,
					'post_type' => 'post',
					'orderby' => 'date',
					'order' => 'DESC'
				);
				$query = new WP_Query($args);
				if($query->have_posts()){
					?>
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
				get_template_part('includes/hrBnr');
				?>
				<?php
					$args = array(
					'cat' => 9,
					'posts_per_page' =>2,
					'no_found_rows' => true,
					'post_type' => 'post',
					'orderby' => 'date',
					'order' => 'DESC'
					);
					$query = new WP_Query($args);
					$i=0;
					if($query->have_posts()){ ?>
						<h2 class="content__title"><a href="<?php echo get_category_link('9')?>"><?php echo get_cat_name('9');?></a></h2>
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
				$args = array(
					'cat'=>11,
					'posts_per_page'=>4,
					'no_found_rows' => true,
					'post_type' => 'post',
					'orderby' => 'date',
					'order' => 'DESC'
				);
				$query =new WP_Query($args);
				if($query->have_posts()){
					?>
					<h2 class="content__title">
						<a href="<?php echo get_category_link('11')?>"><?php echo get_cat_name('11')?></a>
					</h2>
					<div class="dbbArts">	
					<?php
					while($query->have_posts()){
						$query->the_post();
						?>
						<a href="<?php the_permalink();?>" class="dbbArts__item" style="background: url('<?php the_post_thumbnail_url();?>') no-repeat 50% 50%;background-size: cover;">
						<div class="dbbArts__cap"></div>
						<div class="dbbArts__promo">
							<h3 class="dbbArts__title">
								<?php $titleHead = get_the_title(); 
								echo kama_excerpt(array('maxchar'=>70, 'text'=>$titleHead));?>
							</h3>
							<span class="dbbArts__date">
								<?php the_time('j F Y');?>
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
					'cat' => 10,
					'posts_per_page' =>2,
					'no_found_rows' => true,
					'post_type' => 'post',
					'orderby' => 'date',
					'order' => 'DESC'
					);
					$query = new WP_Query($args);
					$i=0;
					if($query->have_posts()){ ?>
						<h2 class="content__title"><a href="<?php echo get_category_link('10')?>"><?php echo get_cat_name('10');?></a></h2>
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
				$args = array(
					'cat'=>12,
					'posts_per_page'=>4,
					'no_found_rows' => true,
					'post_type' => 'post',
					'orderby' => 'date',
					'order' => 'DESC'
				);
				$query =new WP_Query($args);
				if($query->have_posts()){
					?>
					<h2 class="content__title">
						<a href="<?php echo get_category_link('12')?>"><?php echo get_cat_name('12')?></a>
					</h2>
					<div class="dbbArts">	
					<?php
					while($query->have_posts()){
						$query->the_post();
						?>
						<a href="<?php the_permalink();?>" class="dbbArts__item" style="background: url('<?php the_post_thumbnail_url();?>') no-repeat 50% 50%;background-size: cover;">
						<div class="dbbArts__cap"></div>
						<div class="dbbArts__promo">
							<h3 class="dbbArts__title">
								<?php $titleHead = get_the_title(); 
								echo kama_excerpt(array('maxchar'=>70, 'text'=>$titleHead));?>
							</h3>
							<span class="dbbArts__date">
								<?php the_time('j F Y');?>
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
			</main>
			<aside class="sidebar">
				<?php if(is_home()){
					get_template_part('includes/main-sidebar');
				}?>
			</aside>
		</div>
		<?php get_template_part('footer');?>