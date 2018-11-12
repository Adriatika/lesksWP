
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Леснойкомплекс.рф</title>
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="wrapper">
		<header class="header" id="upAnc">
			<div class="mainHeader">
				<input type="checkbox"  id="topBurger"  class="mainHeader__chkBurger">
				<label class="mainHeader__burger" for="topBurger"></label>
				<ul class="mainHeader__menu">
					<li class="mainHeader__item"><a href="#">О проекте</a></li>
					<li class="mainHeader__item"><a href="#">Архив номеров</a></li>
					<li class="mainHeader__item"><a href="#">Подписка на журнал</a></li>
					<li class="mainHeader__item"><a href="#">Контакты</a></li>
					<li class="mainHeader__item"><a href="#">Фотогалерея</a></li>
					<li class="mainHeader__item"><a href="#">Мероприятия</a></li>
				</ul>
				<a href="#" class="mainHeader__logo">
					<img src="img/logo2.svg" alt="Леснойкомплекс.рф">
				</a>	
				<div class="mainHeader__social">
						<input type="checkbox" class="mainHeader__visionForm" id="visionForm"><label for="visionForm" class="mainHeader__lblSearchForm"></label>
					<form class="mainHeader__searchForm" id="searchform" action="">
						<input type="text" name="searchField" id="searchtext" class="mainHeader__searchField">
						<input type="submit" name="searchButton" id="searchsubmit" class="mainHeader__searchSubmit" value="">
					</form>
					<div class="mainHeader__networks">
						<a href="#" class="mainHeader__netIcon" id="home"></a>
						<a href="#" class="mainHeader__netIcon" id="ytb"></a>
						<a href="#" class="mainHeader__netIcon" id="ml"></a>
						<a href="#" class="mainHeader__netIcon" id="fb"></a>
						<a href="#" class="mainHeader__netIcon" id="vk"></a>
					</div>
				</div>
			</div>
			<div class="hatch"></div>
			<input type="checkbox" class="mainHeader__headingToggle" id="headingToggle"><label for="headingToggle" class="mainHeader__lblHeadingTgl"></label>
			<ul class="headingMenu">
				<li class="headingMenu__item"><a href="#" class="headingMenu__anc">Лесозаготовка</a></li>
				<li class="headingMenu__item"><a href="#" class="headingMenu__anc">Обработка и станки</a></li>
				<li class="headingMenu__item"><a href="#" class="headingMenu__anc">Биоэнергетика</a></li>
				<li class="headingMenu__item"><a href="#" class="headingMenu__anc">Сушка древесины</a></li>
				<li class="headingMenu__item"><a href="#" class="headingMenu__anc">Домострой</a></li>
				<li class="headingMenu__item"><a href="#" class="headingMenu__anc">Развитие ЛПК</a></li>
				<li class="headingMenu__item"><a href="#" class="headingMenu__anc">Защита леса</a></li>
			</ul>
		</header>
		<div class="container">
			<main class="content">
				<!-->Здесь должна быть ваша инфа<-->
			</main>
			<aside class="sidebar">
				<div class="events">
					<h3 class="sidebar__title events__title">
						Мероприятия
					</h3>
					<div class="events__row">
						<div class="events__dates">04.09.2018 07.09.2018</div>
						<a href="#" class="events__expl">XX специализированная выставка «ЭКСПОДРЕВ» в МВДЦ «Сибирь г. Красноярск
						</a>
					</div>
					<div class="events__row">
						<div class="events__dates">22.10.2018 25.10.2025</div>
						<a href="#" class="events__expl">SibWoodExpo в СибЭкспоЦентре г. Иркутск</a>
						</div>
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
						<img src="img/mebel1.jpg" alt="comeAdds" class="foxAdd__img">
					</a>
				</div>
				<div class="widgetBlock textwidget">
					<a href="#" class="widget__anchor"><img src="img/Bohnenkamp_300x150_LesKompleks.gif" alt="" class="widget__image"></a>
					<a href="#" class="widget__anchor"><img src="img/umids_ticket.gif" alt="" class="widget__image"></a>
					<a href="#" class="widget__anchor"><img src="img/Bohnenkamp_300x150_LesKompleks.gif" alt="" class="widget__image"></a>
					<a href="#" class="widget__anchor"><img src="img/Bohnenkamp_300x150_LesKompleks.gif" alt="" class="widget__image"></a>
					<a href="#" class="widget__anchor"><img src="img/umids_ticket.gif" alt="" class="widget__image"></a>
					<a href="#" class="widget__anchor"><img src="img/LESDM_18_200x100_stat.jpg" alt="" class="widget__img"></a>
				</div>
				<div class="foxAdd">
					<a href="#" class="foxAdd__anc" traget="_blanc">
						<img src="img/mebel1.jpg" alt="comeAdds" class="foxAdd__img">
					</a>
					<a href="" class="foxAdd__anc" traget="_blanc">
						<img src="img/mebel1.jpg" alt="comeAdds" class="foxAdd__img">
					</a>
				</div>
			</aside>
		</div>
		<a href="#upAnc" class="main__upArrow"></a>
		<footer class="mainFooter">
			<div class="mainFooter__social">
				<span class="mainFooter__drt">присоединяйтесь:</span>
				<div class="mainFooter__socRow">
					<a href="#" class="mainFooter__socItem" id="fFb"></a>
					<a href="#" class="mainFooter__socItem" id="fVk"></a>
					<a href="#" class="mainFooter__socItem" id="fYotb"></a>
				</div>
			</div>
			<div class="mainFooter__addrBlock">
				<span class="mainFooter__address">
					660068, г. Красноярск ул.Мичурина, 3в, оф. 405
				</span>
				<span class="mainFooter__phone">
					+7 391 237 15 37
				</span>
				<span class="mainFooter__email">
					dprom@pgmedia.ru
				</span>
			</div>
			<div class="mainFooter__menu">
				<ul class="mainFooter__nav">
					<li class="mainFooter__menuItem"><a href="#" class="mainFooter__an">О проекте</a></li>
					<li class="mainFooter__menuItem"><a href="#" class="mainFooter__an">Архив номеров</a></li>
					<li class="mainFooter__menuItem"><a href="#" class="mainFooter__an">Подписка на журнал</a></li>
					<li class="mainFooter__menuItem"><a href="#" class="mainFooter__an">Фотогалерея</a></li>
					<li class="mainFooter__menuItem"><a href="#" class="mainFooter__an">Мероприятия</a></li>
					<li class="mainFooter__menuItem"><a href="#" class="mainFooter__an">Контакты</a></li>
				</ul>
				<span class="mainFooter__copyright">
					&copy; 2018-2019 PromoGroupMedia
				</span>
			</div>
		</footer>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/libs.min.js"></script>
</body>
</html>