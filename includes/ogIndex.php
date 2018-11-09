< meta property="og:title" content="<?php bloginfo('name'); ?>"/>
< meta property="og:description" content="<?php bloginfo('description');?>"/>
< meta property="og:image" content="<?php if(has_custom_logo()){
	the_custom_logo();
} else{
	echo get_template_directory() . "/img/logo2.png";
}?>" />
< meta property="og:url" content= "<?php site_url();?>" />