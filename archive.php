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
				<h2 class="content__title">Архив журналов</h2>
				<?php
					$magazine = get_terms('issue', )
				?>
				<div class="archive">
					<div class="archive__item">
						<a href="#" class="archive__anc">
							<img src="img/mag2018_1.jpg" alt="">
						</a>
						<p class="archive__title">Лесной комплекс №1 2018</p>
					</div>
					<div class="archive__item">
						<a href="#" class="archive__anc">
							<img src="img/mag2018_2.jpg" alt="">
						</a>
						<p class="archive__title">Лесной комплекс №1 2018</p>
					</div>
					<div class="archive__item">
						<a href="#" class="archive__anc">
							<img src="img/mag2018_3.jpg" alt="">
						</a>
						<p class="archive__title">Лесной комплекс №1 2018</p>
					</div>
					<div class="archive__item">
						<a href="#" class="archive__anc">
							<img src="img/mag2018_2.jpg" alt="">
						</a>
						<p class="archive__title">Лесной комплекс №1 2018</p>
					</div>
				</div>
				<div class="wp-pagenavi">
					<?php
						$args=array(
						'prev_text'    => __('«'),
						'next_text'    => __('»'),
						'screen_reader_text' =>false);
						the_posts_pagination($args);
					?>
				</div>
				<div class="hrBnr">
					<a href="#" class="hrBnr__anc">
						<img src="https://picsum.photos/600/200?image=1045" class="hrBnr__img" alt="промобаннер">
					</a>
				</div>
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
				<aside class="sidebar">
				<?php if(is_home()){
					get_template_part('includes/main-sidebar');
				}?>
			</aside>
			</aside>
		</div>
		<?php

		get_template_part('footer');
		?>