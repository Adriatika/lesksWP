<?php
/*Start STYLES/SCRIPTS*/
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style( 'style', get_stylesheet_uri());
	wp_enqueue_script('jquery-CDN','https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',array(),false, true);
	wp_enqueue_script('myscript', get_template_directory_uri() . '/js/libs.min.js', array('jquery'), false, true);
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
		'name'=>__('Панель под рекламу 250*450', 'lesks'),
		'id' => 'main-panel',
		'description' => __('Справа от основного контента, единичный баннер','lesks'),
    'before_widget'=> '<div class="widget %2$s foxAdd" id="%1$s">',
    'after_widget'=>'</div>',
		'before_title'  => '<h3 class="widgettitle sidebar__title">',
		'after_title'   => '</h3>'
	));
  register_sidebar(array(
    'name'=>__('Панель под рекламу 2,', 'lesks'),
    'id' => 'main-panel2',
    'description' =>__('Панель сбоку, под два баннера 250*450', 'lesks'),
    'before_widget'=> '<div class="widget %2$s foxAdd" id="%1$s">',
    'after_widget'=>'</div>',
    'before_title'  => '<h3 class="widgettitle sidebar__title">',
    'after_title'   => '</h3>'
  ));
  register_sidebar(array(
    'name'=>__('Панель под анимированные блоки', 'lesks'),
    'id' => 'gif-sidebar',
    'description' =>__('Панель под анимированные блоки рекламы 200*100', 'lesks'),
    'before_widget'=> '<div class="widget %2$s" id="%1$s">',
    'after_widget'=>'</div>',
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
        array('description'=>'Виджет вставки банннера adfox',)
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
      $title = apply_filters('widget_title', $title);
      $text = apply_filters('widget_text', $text);
      if(!empty($title)){
        echo $before_title . $title . $after_title;
      }
      echo  $text;
    }
};
add_action('widgets_init', 'adFoxWidget');
function adFoxWidget(){
  register_widget('AdFox');
}
/*End CUSTOM WIDGETS*/
/*Start Register ISSUE taxonomy*/
function add_new_taxonomies() {  
  register_taxonomy('issue',
    array('post'),
    array(
      'hierarchical' => true,
      'labels' => array(
        /* ярлыки, нужные при создании UI, можете
        не писать ничего, тогда будут использованы
        ярлыки по умолчанию */
        'name' => 'Выпуски журналов',
        'singular_name' => 'Журнал',
        'search_items' =>  'Найти журнал',
        'all_items' => 'Все журналы',
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => 'Редактировать номер журнала', 
        'update_item' => 'Обновить номер журнала',
        'add_new_item' => 'Добавить новый номер журнала',
        'new_item_name' => 'Название нового номера журнала',
        'menu_name' => 'Номера журналов'
      ),
      'public' => true, 
      'show_in_nav_menus' => true,
      'show_ui' => true,
      'show_tagcloud' =>false,
      'show_in_rest' => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var' => true,
      'rewrite' => array(
      /* настройки URL пермалинков */
        'slug' => 'issues', // ярлык
        'hierarchical' => false // разрешить вложенность
      ),
    )
  );
}
add_action( 'init', 'add_new_taxonomies', 0 );
/*End Register ISSUE taxonomy*/

/*Start TAXONOMY_IMAGES

 * Возможность загружать изображения для элементов указанных таксономий: категории, метки.
 *
 * Пример получения ID и URL картинки термина:
 * $image_id = get_term_meta( $term_id, '_thumbnail_id', 1 );
 * $image_url = wp_get_attachment_image_url( $image_id, 'thumbnail' );
 *
 * @author: Kama (http://wp-kama.ru)
 *
 * @ver: 2.8
 */
if( is_admin() && ! class_exists('Term_Meta_Image') ){
  add_action('admin_init', 'Term_Meta_Image_init');
  function Term_Meta_Image_init(){
    $GLOBALS['Term_Meta_Image'] = new Term_Meta_Image();
  }
  class Term_Meta_Image {

    static $taxes = array('issue'); // пример: array('category', 'post_tag');
    static $meta_key = '_thumbnail_id';
    static $add_img_url = 'http://farm5.staticflickr.com/4825/31010312577_eab528df67_b.jpg';

    public function __construct(){
      if( isset($GLOBALS['Term_Meta_Image']) ) return $GLOBALS['Term_Meta_Image']; // once

      $taxes = self::$taxes ? self::$taxes : get_taxonomies( array( 'public'=>true ), 'names' );

      foreach( $taxes as $taxname ){
        add_action("{$taxname}_add_form_fields",   array( & $this, 'add_term_image' ),     10, 2 );
        add_action("{$taxname}_edit_form_fields",  array( & $this, 'update_term_image' ),  10, 2 );
        add_action("created_{$taxname}",           array( & $this, 'save_term_image' ),    10, 2 );
        add_action("edited_{$taxname}",            array( & $this, 'updated_term_image' ), 10, 2 );

        add_filter("manage_edit-{$taxname}_columns",  array( & $this, 'add_image_column' ) );
        add_filter("manage_{$taxname}_custom_column", array( & $this, 'fill_image_column' ), 10, 3 );
      }
    }

    ## поля при создании термина
    public function add_term_image( $taxonomy ){
      wp_enqueue_media(); // подключим стили медиа, если их нет

      add_action('admin_print_footer_scripts', array( & $this, 'add_script' ), 99 );
      $this->css();
      ?>
      <div class="form-field term-group">
        <label><?php _e('Image', 'default'); ?></label>
        <div class="term__image__wrapper">
          <a class="termeta_img_button" href="#">
            <img src="<?php echo self::$add_img_url ?>" alt="">
          </a>
          <input type="button" class="button button-secondary termeta_img_remove" value="<?php _e( 'Remove', 'default' ); ?>" />
        </div>

        <input type="hidden" id="term_imgid" name="term_imgid" value="">
      </div>
      <?php
    }

    ## поля при редактировании термина
    public function update_term_image( $term, $taxonomy ){
      wp_enqueue_media(); // подключим стили медиа, если их нет

      add_action('admin_print_footer_scripts', array( & $this, 'add_script' ), 99 );

      $image_id = get_term_meta( $term->term_id, self::$meta_key, true );
      $image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'thumbnail' ) : self::$add_img_url;
      $this->css();
      ?>
      <tr class="form-field term-group-wrap">
        <th scope="row"><?php _e( 'Image', 'default' ); ?></th>
        <td>
          <div class="term__image__wrapper">
            <a class="termeta_img_button" href="#">
              <?php echo '<img src="'. $image_url .'" alt="">'; ?>
            </a>
            <input type="button" class="button button-secondary termeta_img_remove" value="<?php _e( 'Remove', 'default' ); ?>" />
          </div>

          <input type="hidden" id="term_imgid" name="term_imgid" value="<?php echo $image_id; ?>">
        </td>
      </tr>
      <?php
    }

    public function css(){
      ?>
      <style>
        .termeta_img_button{ display:inline-block; margin-right:1em; }
        .termeta_img_button img{ display:block; float:left; margin:0; padding:0; min-width:100px; max-width:150px; height:auto; background:rgba(0,0,0,.07); }
        .termeta_img_button:hover img{ opacity:.8; }
        .termeta_img_button:after{ content:''; display:table; clear:both; }
      </style>
      <?php
    }

    ## Add script
    public function add_script(){
      // выходим если не на нужной странице таксономии
      //$cs = get_current_screen();
      //if( ! in_array($cs->base, array('edit-tags','term')) || ! in_array($cs->taxonomy, (array) $this->for_taxes) )
      //  return;

      $title = __('Featured Image', 'default');
      $button_txt = __('Set featured image', 'default');
      ?>
      <script>
      jQuery(document).ready(function($){
        var frame,
          $imgwrap = $('.term__image__wrapper'),
          $imgid   = $('#term_imgid');

        // добавление
        $('.termeta_img_button').click( function(ev){
          ev.preventDefault();

          if( frame ){ frame.open(); return; }

          // задаем media frame
          frame = wp.media.frames.questImgAdd = wp.media({
            states: [
              new wp.media.controller.Library({
                title:    '<?php echo $title ?>',
                library:   wp.media.query({ type: 'image' }),
                multiple: false,
                //date:   false
              })
            ],
            button: {
              text: '<?php echo $button_txt ?>', // Set the text of the button.
            }
          });

          // выбор
          frame.on('select', function(){
            var selected = frame.state().get('selection').first().toJSON();
            if( selected ){
              $imgid.val( selected.id );
              $imgwrap.find('img').attr('src', selected.sizes.thumbnail.url );
            }
          } );

          // открываем
          frame.on('open', function(){
            if( $imgid.val() ) frame.state().get('selection').add( wp.media.attachment( $imgid.val() ) );
          });

          frame.open();
        });

        // удаление
        $('.termeta_img_remove').click(function(){
          $imgid.val('');
          $imgwrap.find('img').attr('src','<?php echo self::$add_img_url ?>');
        });
      });
      </script>

      <?php
    }

    ## Добавляет колонку картинки в таблицу терминов
    public function add_image_column( $columns ){
      // подправим ширину колонки через css
      add_action('admin_notices', function(){
        echo '<style>.column-image{ width:50px; text-align:center; }</style>';
      });

      $num = 1; // после какой по счету колонки вставлять

      $new_columns = array( 'image'=>'' ); // колонка без названия...

      return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
    }

    public function fill_image_column( $string, $column_name, $term_id ){
      // если есть картинка
      if( $image_id = get_term_meta( $term_id, self::$meta_key, 1 ) )
        $string = '<img src="'. wp_get_attachment_image_url( $image_id, 'thumbnail' ) .'" width="50" height="50" alt="" style="border-radius:4px;" />';

      return $string;
    }

    ## Save the form field
    public function save_term_image( $term_id, $tt_id ){
      if( isset($_POST['term_imgid']) && $image = (int) $_POST['term_imgid'] )
        add_term_meta( $term_id, self::$meta_key, $image, true );
    }

    ## Update the form field value
    public function updated_term_image( $term_id, $tt_id ){
      if( ! isset($_POST['term_imgid']) ) return;

      if( $image = (int) $_POST['term_imgid'] )
        update_term_meta( $term_id, self::$meta_key, $image );
      else
        delete_term_meta( $term_id, self::$meta_key );
    }

  }

}
/**
 * 2.8 - исправил ошибку удаления картинки.
 */

/*End TAXONOMY_IMAGES*/
?>