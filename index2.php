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
					Еще интереснее
				</h2>
				<?php
				 $args = array(
					'posts_per_page' =>14,
					'no_found_rows' => true,
					'post_type' => 'post',
					'category__not_in'=> -1,
					'orderby' => 'date',
					'order' => 'DESC'
				);
				 $iter = 0;
				$query = new WP_Query($args);
				if($query->have_posts()){
					while($query->have_posts()){
						$query->the_post();
						$iter++;
						$buff = 0;
						if($iter<=2){
							if($buff==0 && $iter<2){
								echo "<div class='dbbArts'>";
								$buff =1;
							}
						?>
							<a href="<?php the_permalink();?>" class="dbbArts__item" style="background:url('<?php the_post_thumbnail_url();?>')no-repeat 50% 50%; background-size:cover;">
							<div class="dbbArts__cap"></div>
							<div class="dbbArts__promo">
								<h3 class="dbbArts__title">
									<?php 
									$headTitle = get_the_title();
									echo kama_excerpt(array('maxchar'=>80, 'text'=>$headTitle));?>
								</h3>
								<span class="dbbArts__date">
									<?php the_time("j F Y"); ?>
								</span>
							</div>
						</a>
						<?php
							if($iter==2){
								echo "</div>";
								get_template_part('includes/hrBnr');
								$buff = 0;
							}
						}
					}
					if($iter>2 && $iter<=4){
						if($boof == 0){
							echo "<div class='dbmArts'>";
							$boof = 1;
						}
						?>
							<a href="<?php the_permalink();?>" class="dbmArts__item">
								<div class="dbmArts__promo">
									<h4 class="dbmArts__title">
									<?php $titleHead = get_the_title(); 
									echo kama_excerpt(array('maxchar'=>60, 'text'=>$titleHead));?></h4>
									<p class="dbmArts__text"><?php echo kama_excerpt(array('maxchar'=>120));?></p>
									<span class="dbmArts__date"><?php the_time("j F Y");?></span>
								</div>
								<div class="dbmArts__img">
									<?php the_post_thumbnail();?>
									<span><?php the_time("j F Y");?></span>
								</div>	
							</a>
						<?php
						if($iter == 4){
							echo "</div>";
							$boof = 0;
						}
					}
					if($iter > 4 && $iter <= 8){
						if($boof == 0){
							echo "<div class='dbbArts'>";
							$boof = 1;
						}
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
						if($iter ==8){
							echo "</div>";
							$boof = 0;
						}
					}
					if($iter >8 && $iter<=10){
						if($boof == 0){
							echo "<div class='dbmAtrs'>";
							$boof = 1;
						};
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
						if($iter ==10){
							echo "</div>";
							$boof = 0;
						}
					}
					if($iter > 10 && $iter <= 14){
						if($boof = 0){
							echo "<div class='dbbArts'>";
							$boof = 1;
						}
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
						if($iter == 14){
							echo "</div>";
							$boof = 0;
						}
					}
				}
				?>
			</main>
			<aside class="sidebar">
				<?php if(is_home()){
					get_template_part('includes/main-sidebar');
				}?>
			</aside>
		</div>
		<?php get_template_part('footer');?>