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
				<div class="foxAdd">
				<?php dynamic_sidebar('main-panel');?>
				</div>
				<div class="widgetBlock textwidget">
				<?php dynamic_sidebar('gif-sidebar');?>
				</div>
				<div class="foxAdd">
				<?php dynamic_sidebar('main-panel2');?>
				</div>
				