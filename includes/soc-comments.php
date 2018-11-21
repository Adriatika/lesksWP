<div class="comments">
	<input type="radio" class="comments__radio" name="comment" id="fbComment" checked><label for="fbComment" class="comments__cmntTgl">Комментировать FB</label>
	<input type="radio"  class="comments__radio" name="comment" id="vkComment"><label for="vkComment" class="comments__cmntTgl">Комментировать VK</label>
	<div class="comments__commentTab" id="blockFb">
		<div class="fb-comments" data-href="<?php the_permalink();?>" data-numposts="5" width="100%"></div>
	</div>
		<div class="comments__commentTab" id="blockVk">	
			<div id="vk_comments"></div>
			<script type="text/javascript">VK.Widgets.Comments("vk_comments", {limit: 5, attach: "*"});</script>
	</div>
</div>