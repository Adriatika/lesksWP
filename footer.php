<a href="#upAnc" class="main__upArrowDouble"></a>
<a href="#upAnc" class="main__upArrow"></a>
		<footer class="mainFooter">
			<div class="mainFooter__social">
				<span class="mainFooter__drt">присоединяйтесь:</span>
				<div class="mainFooter__socRow">
					<a href="https://www.facebook.com/lesks.ru" class="mainFooter__socItem" id="fFb"></a>
					<a href="https://vk.com/lesks" class="mainFooter__socItem" id="fVk"></a>
					<a href="https://www.youtube.com/channel/UCULQejj6xoBbhYVev9x2aCw" class="mainFooter__socItem" id="fYotb"></a>
				</div>
			</div>
			<div class="mainFooter__addrBlock">
				<span class="mainFooter__address">
					660068, Красноярск Мичурина, 3в, оф. 405
				</span>
				<span class="mainFooter__phone">
					+7 391 237 15 37
				</span>
				<span class="mainFooter__email">
					lks@pgmedia.ru
				</span>
			</div>
			<div class="mainFooter__menu">
					<?php wp_nav_menu(array(
						'theme_location'  => 'bottomMenu',
						'menu'            => 'Меню внизу страницы', 
						'container'       => false, 
						'menu_class'      => 'mainFooter__nav', 
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,	
					));?>
				<span class="mainFooter__copyright">
					&copy; 2012-2019 PromoGroup Media
				</span>
			</div>
		</footer>
	</div>
	<!-- Yandex.Metrika counter -->
		<script type="text/javascript" >
		    (function (d, w, c) {
		        (w[c] = w[c] || []).push(function() {
		            try {
		                w.yaCounter32144599 = new Ya.Metrika({
		                    id:32144599,
		                    clickmap:true,
		                    trackLinks:true,
		                    accurateTrackBounce:true,
		                    webvisor:true,
		                    trackHash:true
		                });
		            } catch(e) { }
		        });

		        var n = d.getElementsByTagName("script")[0],
		            s = d.createElement("script"),
		            f = function () { n.parentNode.insertBefore(s, n); };
		        s.type = "text/javascript";
		        s.async = true;
		        s.src = "https://mc.yandex.ru/metrika/watch.js";

		        if (w.opera == "[object Opera]") {
		            d.addEventListener("DOMContentLoaded", f, false);
		        } else { f(); }
		    })(document, window, "yandex_metrika_callbacks");
		</script>
	<noscript>
		<div>
			<img src="https://mc.yandex.ru/watch/32144599" style="position:absolute; left:-9999px;" alt="" />
		</div>
	</noscript>
<!-- /Yandex.Metrika counter -->
<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-71308187-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-71308187-1');
		</script>
		<script src="//static-login.sendpulse.com/apps/fc3/build/loader.js" sp-form-id="3e44e4b6ab34aa68b0ae34210119b4de2181151ba4b5198a11284b00bb8014d8"></script>
	<?php wp_footer();?>
