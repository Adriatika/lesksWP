				<div class="events">
					<h3 class="sidebar__title events__title">
						Мероприятия
					</h3>
					<?php global $EM_Event;
						echo do_shortcode("[events_list scope='future' limit=5]
						<div class='events__row'>
						<div class='events__dates'>#_EVENTDATES</div>
						<a href='#_EVENTURL' class='events__expl'>#_EVENTNAME, #_LOCATIONTOWN </a>
					</div>
					[/events_list]"
						);
					?>
					<a href="https://lesks.ru/blizhajshie-meroprijatija/" class="events__btn">Календарь выставок</a>	
				</div>
				<div class="foxAdd">
				<?php dynamic_sidebar('main-panel');?>
				</div>
				<div class="widgetBlock textwidget">
				<?php dynamic_sidebar('gif-sidebar');?>
				</div>
				<div class="foxAdd">
				<?php dynamic_sidebar('main-panel2');?>
				</div>
				<div class="newsSidebar">
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