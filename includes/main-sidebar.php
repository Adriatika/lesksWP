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
					<a href="#" class="events__btn">Календарь выставок</a>	
</div>
				<div class="widgetMagazine">
					<h3 class="sidebar__title widget__title widgetMagazine__title">
						свежий номер
					</h3>
					<a href="#" class="widget__anchor" target="_blanc">
						<img class ="widget__image" src="img/mag9.jpg" alt="журнал">
					</a>
					<a href="#" class="widgetMagazine__anc">Читать онлайн</a>
					<a href="#" class="widgetMagazine__anc"> Скачать pdf</a>
				</div>
				<div class="foxAdd">
					<a href="#" class="foxAdd__anc" target="_blanc">
						<img src="<?php bloginfo('template_url');?>/img/mebel1.jpg" alt="comeAdds" class="foxAdd__img">
					</a>
				</div>
				<div class="widgetBlock textwidget>"
				<?php dynamic_sidebar('main-panel');?>
				</div>
				<div class="foxAdd">
					<a href="#" class="foxAdd__anc" traget="_blanc">
						<img src="<?php bloginfo('template_url');?>/img/mebel1.jpg" alt="comeAdds" class="foxAdd__img">
					</a>
					<a href="" class="foxAdd__anc" traget="_blanc">
						<img src="<?php bloginfo('template_url');?>/img/mebel1.jpg" alt="comeAdds" class="foxAdd__img">
					</a>
				</div>