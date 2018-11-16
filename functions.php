<?php
/*Start STYLES/SCRIPTS*/
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style( 'style', get_stylesheet_uri());
	wp_enqueue_script('jquery-CDN','https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
	wp_enqueue_script('myscript', get_template_directory_uri() . '/js/libs.min.js', array('jquery'));
  // wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery'));
});
/*End STYLES/SCRIPTS*/
/*Start CUSTOM TITLE-TAG*/
add_theme_support( 'title-tag');
add_theme_support( 'post-thumbnails');
/*End CUSTOM TITLE-TAG*/
/*Start THEME WIDGETS SUPPORT*/
add_theme_support( 'widgets');
/*End THEME WIDGETS SUPPORT*/
/*Start REGISTER WIDGETS*/
function register_my_widgets(){
	register_sidebar(array(
		'name'=>__('Боковая панель', 'lesks'),
		'id' => 'main-panel',
		'description' => __('Находится справа от основного контента','lesks'),
		'before_widget'=> '',
		'after_widget'=>'',
		'before_title'  => '<h3 class="widgettitle sidebar__title">',
		'after_title'   => '</h3>'
	));
	register_sidebar(array(
		'name'=>__('Панель миниатюр выставок', 'lesks'),
		'id' => 'events-sidebar',
		'description' =>__('Картинки 100*100. Панель находится в нижней части страницы выставок', 'lesks'),
		'before_widget'=> '<div class="widget %2$s" id="%1$s">',
		'after_widget'=>'</div>',
		'before_title'  => '<h3 class="widgettitle sidebar__title">',
		'after_title'   => '</h3>'
	));
};
add_action( 'widgets_init', 'register_my_widgets' );
/*End REGISTER WIDGETS*/
/*Start MENUS*/
 register_nav_menu( 'topMenu', 'Верхнее меню');
 register_nav_menu( 'bottomMenu', 'Меню внизу страницы');
 register_nav_menu( 'categoryMenu', 'Меню рубрик');
/*End MENUS*/
/*Start EXCERPT*/
add_filter( 'excerpt_length', function(){
	return 20;
} );

function kama_excerpt( $args = '' ){
	global $post;
	if( is_string($args) )
		parse_str( $args, $args );
	$rg = (object) array_merge( array(
		'maxchar'   => 350, 
		'text'      => '', 
		'autop'     => true, 
		'save_tags' => '',   
		'more_text' => 'Читать дальше...', // 
	), $args );
	$rg = apply_filters( 'kama_excerpt_args', $rg );
	if( ! $rg->text )
		$rg->text = $post->post_excerpt ?: $post->post_content;
	$text = $rg->text;
	$text = preg_replace( '~\[([a-z0-9_-]+)[^\]]*\](?!\().*?\[/\1\]~is', '', $text ); 
	$text = preg_replace( '~\[/?[^\]]*\](?!\()~', '', $text ); 
	$text = trim( $text );
	if( strpos( $text, '<!--more-->') ){
		preg_match('/(.*)<!--more-->/s', $text, $mm );

		$text = trim( $mm[1] );

		$text_append = ' <a href="'. get_permalink( $post ) .'#more-'. $post->ID .'">'. $rg->more_text .'</a>';
	}
	else {
		$text = trim( strip_tags($text, $rg->save_tags) );

		if( mb_strlen($text) > $rg->maxchar ){
			$text = mb_substr( $text, 0, $rg->maxchar );
			$text = preg_replace( '~(.*)\s[^\s]*$~s', '\\1 ...', $text ); 
		}
	}
	if( $rg->autop ){
		$text = preg_replace(
			array("/\r/", "/\n{2,}/", "/\n/",   '~</p><br ?/?>~'),
			array('',     '</p><p>',  '<br />', '</p>'),
			$text
		);
	}
	$text = apply_filters( 'kama_excerpt', $text, $rg );
	if( isset($text_append) )
		$text .= $text_append;
	return ( $rg->autop && $text ) ? "$text" : $text;
}
/*End EXCERPT*/

/*Start BREADCRUMS*/
/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2018.10.05
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = 'Главная'; // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

  $wrap_before = '<div class="inform__breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
  $wrap_after = '</div><!-- .inform__breadcrumbs -->'; // закрывающий тег обертки
  $sep = ''; // разделитель между "крошками"
  $before = '<span class="breadcrumbs__current inform__crumb">'; // тег перед текущей "крошкой"
  $after = '</span>'; // тег после текущей "крошки"

  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $show_last_sep = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_url = home_url('/');
  $link = '<span itemprop="itemListElement" class="inform__crumb" itemscope itemtype="http://schema.org/ListItem">';
  $link .= '<a class="breadcrumbs__link inform__crumbAnc" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
  $link .= '<meta itemprop="position" content="%3$s" />';
  $link .= '</span>';
  $parent_id = ( $post ) ? $post->post_parent : '';
  $home_link = sprintf( $link, $home_url, $text['home'], 1 );

  if ( is_home() || is_front_page() ) {

    if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

  } else {

    $position = 0;

    echo $wrap_before;

    if ( $show_home_link ) {
      $position += 1;
      echo $home_link;
    }

    if ( is_category() ) {
      $parents = get_ancestors( get_query_var('cat'), 'category' );
      foreach ( array_reverse( $parents ) as $cat ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
      }
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        $cat = get_query_var('cat');
        echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_current ) {
          if ( $position >= 1 ) echo $sep;
          echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
        } elseif ( $show_last_sep ) echo $sep;
      }

    } elseif ( is_search() ) {
      if ( $show_home_link && $show_current || ! $show_current && $show_last_sep ) echo $sep;
      if ( $show_current ) echo $before . sprintf( $text['search'], get_search_query() ) . $after;

    } elseif ( is_year() ) {
      if ( $show_home_link && $show_current ) echo $sep;
      if ( $show_current ) echo $before . get_the_time('Y') . $after;
      elseif ( $show_home_link && $show_last_sep ) echo $sep;

    } elseif ( is_month() ) {
      if ( $show_home_link ) echo $sep;
      $position += 1;
      echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
      if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_day() ) {
      if ( $show_home_link ) echo $sep;
      $position += 1;
      echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
      $position += 1;
      echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
      if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_single() && ! is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $position += 1;
        $post_type = get_post_type_object( get_post_type() );
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
        if ( $show_current ) echo $sep . $before . get_the_title() . $after;
        elseif ( $show_last_sep ) echo $sep;
      } else {
        $cat = get_the_category(); $catID = $cat[0]->cat_ID;
        $parents = get_ancestors( $catID, 'category' );
        $parents = array_reverse( $parents );
        $parents[] = $catID;
        foreach ( $parents as $cat ) {
          $position += 1;
          if ( $position > 1 ) echo $sep;
          echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
        }
        if ( get_query_var( 'cpage' ) ) {
          $position += 1;
          echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
          echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
        } else {
          if ( $show_current ) echo $sep . $before . get_the_title() . $after;
          elseif ( $show_last_sep ) echo $sep;
        }
      }

    } elseif ( is_post_type_archive() ) {
      $post_type = get_post_type_object( get_post_type() );
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . $post_type->label . $after;
        elseif ( $show_home_link && $show_last_sep ) echo $sep;
      }

    } elseif ( is_attachment() ) {
      $parent = get_post( $parent_id );
      $cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
      $parents = get_ancestors( $catID, 'category' );
      $parents = array_reverse( $parents );
      $parents[] = $catID;
      foreach ( $parents as $cat ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
      }
      $position += 1;
      echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
      if ( $show_current ) echo $sep . $before . get_the_title() . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_page() && ! $parent_id ) {
      if ( $show_home_link && $show_current ) echo $sep;
      if ( $show_current ) echo $before . get_the_title() . $after;
      elseif ( $show_home_link && $show_last_sep ) echo $sep;

    } elseif ( is_page() && $parent_id ) {
      $parents = get_post_ancestors( get_the_ID() );
      foreach ( array_reverse( $parents ) as $pageID ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
      }
      if ( $show_current ) echo $sep . $before . get_the_title() . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_tag() ) {
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        $tagID = get_query_var( 'tag_id' );
        echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
        elseif ( $show_home_link && $show_last_sep ) echo $sep;
      }

    } elseif ( is_author() ) {
      $author = get_userdata( get_query_var( 'author' ) );
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
        elseif ( $show_home_link && $show_last_sep ) echo $sep;
      }

    } elseif ( is_404() ) {
      if ( $show_home_link && $show_current ) echo $sep;
      if ( $show_current ) echo $before . $text['404'] . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( has_post_format() && ! is_singular() ) {
      if ( $show_home_link && $show_current ) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
} // end of dimox_breadcrumbs()

/*End BREADCRUMBS*/
/*Start ASYNC POSTS LOADER*/
function true_load_posts(){
  $args = unserialize( stripslashes( $_POST['query'] ) );
  $args['paged'] = $_POST['page'] + 1; // следующая страница
  $args['post_status'] = 'publish';
  // обычно лучше использовать WP_Query, но не здесь
  query_posts( $args );
  // если посты есть
  if( have_posts() ) :
    // запускаем цикл
    while( have_posts() ): the_post();
      get_template_part( 'includes/content', get_post_format() );
    endwhile;
  endif;
  die();
}
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
/*End ASYNC POSTS LOADER*/

/*Start CUSTOM WIDGETS*/
class AdFox extends WP_Widget{
    function __construct(){
       parent::__construct(
        'adfox',
        'Adfox баннер 250*450',
        array('description'=>'Виджет вставки банннера adfox')
       );
    }
    function form($instance){
      extract($instance);
      ?> 
      <p>
      <label for="<?php echo $this->get_field_id('title');?>">Заголовок(не требуется)</label>

        <input type="text" name="<?php echo $this->get_field_name('title');?>" id="<?php echo $this->get_field_id('title');?>" class="widefat" value="<?php if(isset($title)) echo esc_attr($title);?>">
       </p>
        <p>
          <label for="<?php echo $this->get_field_id('text');?>"> Текст(код баннера)</label>
          <textarea name="<?php echo $this->get_field_name('text');?>" id="<?php echo $this->get_field_id('text');?>" cols="20" rows="5" class="widefat">
            <?php if(isset($text))echo esc_attr($text);?>
          </textarea>
        </p>
      <?php
    }

    function widget($args, $instance){
      extract($args);
      extract($instance);
      $before_widget='<div class="widget foxAdd " >';
      $after_widget = '</div>';
    }
};
add_action('widgets_init', 'adFoxWidget');
function adFoxWidget(){
  register_widget('AdFox');
}
/*End CUSTOM WIDGETS*/
?>