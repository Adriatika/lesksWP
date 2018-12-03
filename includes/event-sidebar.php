				<div class="newsSidebar">	
				<div class="foxAdd">
				<?php dynamic_sidebar('main-panel');?>
				</div>
				<div class="foxAdd">
				<?php dynamic_sidebar('main-panel2');?>
				</div>
					<?php 
						$args = array(
							'cat' => '1',
							'posts_per_page'=>3,
							'no_found_rows' => true,
							'post__not_in' =>array($postId),
							'post_type' => 'post',
							'orderby' => 'date',
							'order' => 'DESC',
						);
						$query = new WP_Query($args);
						if($query->have_posts()){
							?>
							<h2 class="newsSidebar__mainTitle"><?php echo get_cat_name(1)?></h2>
							<?php while($query->have_posts()){
								$query->the_post();
								?>
								<a href="<?php the_permalink();?>" class="newsSidebar__item" style="background:url('<?php the_post_thumbnail_url();?>') no-repeat; background-size: cover; ">
									<div class="newsSidebar__promo">
										<h3 class="newsSidebar__title">
											<?php
												$text = get_the_title();
												echo kama_excerpt(array('maxchar'=>60, $text));
											?>
										</h3>
										<p class="newsSidebar__text">
											<?php
											echo kama_excerpt(array('maxchar'=>120));
											?>
										</p>
										<span class="newsSidebar__time"><?php the_time('j F Y');?></span>
									</div>
								</a>
								<?php
							}?>		
							<?php
								}
						wp_reset_postdata();
					?>
				</div>
				
				<div class="widgetMagazine">
					<h3 class="sidebar__title widget__title widgetMagazine__title">
						свежий номер
					</h3>
					<a href="https://ru.calameo.com/read/003770176b1145a61799d" class="widget__anchor" target="_blanc">
						<img class ="widget__image" src="<?php bloginfo('template_url');?>/img/new1.jpg" alt="журнал">
					</a>
					<a href="https://ru.calameo.com/read/003770176b1145a61799d" class="widgetMagazine__anc" target="_blanc">Читать онлайн</a>
					<a href="https://lesks.ru/wp-content/uploads/Issue/LKS_6_34.pdf" class="widgetMagazine__anc" target="_blanc"> Скачать pdf</a>
				</div>
				<!-- <div class="subscribe">
					<a href="#" class="subscirbe__imgAnc">
						<img src="img/mag9.jpg" alt="" class="subscribe__img">
					</a>
					<span class="subscribe__appeal">Подписка</span>
					 <span class="subscribe__appealTwo">на журнал</span>
					<span class="subscribe__miniAppeal">Все самое интересное и актуальное в журнале Леснойкомплекс.рф</span>
					<a href="#" class="subscribe__anc">подписаться</a>
				</div>
 -->