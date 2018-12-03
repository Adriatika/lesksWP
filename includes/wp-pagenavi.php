<div class="wp-pagenavi">
	<?php
		$args=array(
			'prev_text'    => __('«'),
			'next_text'    => __('»'),
			'screen_reader_text' =>false);
		the_posts_pagination($args);?>
</div>