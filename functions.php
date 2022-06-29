<?php
/**
 * @神秘布偶猫
 * @https://www.ifalse.cn
 */
// ---------------------------------------------------------------------
// 自定义引入文件
function i_frame() {
  require('inc/frame.php');
}
function i_frame_js() {
  require('inc/frame-js.php');
}
function i_home() {
  require('inc/home.php');
}
function i_article() {
  require('inc/article.php');
}
function i_page() {
  require('inc/page-template.php');
}
function i_search() {
  require('inc/page-search.php');
}
function i_archive() {
  require('inc/page-archive.php');
}
function i_tag() {
  require('inc/page-tag.php');
}
function i_date() {
  require('inc/page-date.php');
}
function i_author() {
  require('inc/page-author.php');
}
function i_header_mb() {
  require('inc/header-mobile.php');
}
function i_searchform_mb() {
  require('inc/searchform-mobile.php');
}

// ---------------------------------------------------------------------
// 主题设置
add_action('admin_menu', 'ifalse_set');
function ifalse_set(){add_menu_page('iFalse主题', 'iFalse主题', 'edit_themes', 'i_opt', 'i_opt');}
function i_opt(){require get_template_directory()."/admin/i_opt.php";}

// 子菜单
add_action('admin_menu', 'ifalse_set_base'); 
add_action('admin_menu', 'ifalse_set_nav'); 
add_action('admin_menu', 'ifalse_set_index'); 
add_action('admin_menu', 'ifalse_set_post');
add_action('admin_menu', 'ifalse_set_footer');
add_action('admin_menu', 'ifalse_set_other');

function ifalse_set_base(){add_submenu_page('i_opt', '基本设置', '基本设置', 'edit_themes', 'i_base', 'i_base' );}  
function ifalse_set_nav(){add_submenu_page('i_opt', '导航设置', '导航设置', 'edit_themes', 'i_nav', 'i_nav' );}  
function ifalse_set_index(){add_submenu_page('i_opt', '首页设置', '首页设置', 'edit_themes', 'i_index', 'i_index' );}  
function ifalse_set_post(){add_submenu_page('i_opt', '文章设置', '文章设置', 'edit_themes', 'i_post', 'i_post' );}   
function ifalse_set_footer(){add_submenu_page('i_opt', '底部设置', '底部设置', 'edit_themes', 'i_footer', 'i_footer' );}  
function ifalse_set_other(){add_submenu_page('i_opt', '其他设置', '其他设置', 'edit_themes', 'i_other', 'i_other' );}  

function i_base(){require get_template_directory()."/admin/opt-sub/i_base.php";}
function i_nav(){require get_template_directory()."/admin/opt-sub/i_nav.php";}
function i_index(){require get_template_directory()."/admin/opt-sub/i_index.php";} 
function i_post(){require get_template_directory()."/admin/opt-sub/i_post.php";}
function i_footer(){require get_template_directory()."/admin/opt-sub/i_footer.php";}
function i_other(){require get_template_directory()."/admin/opt-sub/i_other.php";}

// ---------------------------------------------------------------------
// 网站标题
function show_wp_title(){
  global $page, $paged;
  wp_title( '-', true, 'right' );
  bloginfo( 'name' );
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo ' - ' . $site_description;
  if ( $paged >= 2 || $page >= 2 )
    echo ' - ' . sprintf( '第%s页', max( $paged, $page ) );
}

// ---------------------------------------------------------------------
// 默认封面图
function i_cover_pic() {
  $cover_pic = get_template_directory_uri() . '/static/img/thumbnail.png';
  return $cover_pic;
}
// 加载图
function i_loading_pic() {
  error_reporting(0);
  if($_COOKIE['night'] == 0) {
    $loading_pic = get_template_directory_uri() . '/static/img/loading.gif';
    return $loading_pic;
  } else {
    $loading_pic = get_template_directory_uri() . '/static/img/loading-night.gif';
    return $loading_pic;
  }
}

// ---------------------------------------------------------------------
// 延迟加载
function add_image_placeholders( $content ) {
  if( is_feed() || is_preview() || ( function_exists( 'is_mobile' ) && is_mobile() ) )
  return $content;
  if ( false !== strpos( $content, 'data-original' ) )
  return $content;
    $placeholder_image = apply_filters( 'lazyload_images_placeholder_image', i_loading_pic() );
  $content = preg_replace( '#<img([^>]+?)src=[\'"]?([^\'"\s>]+)[\'"]?([^>]*)>#', sprintf( '<img${1}src="%s" data-original="${2}"${3}><noscript><img${1}src="${2}"${3}></noscript>', $placeholder_image ), $content );
  return $content;
}
add_filter( 'the_content', 'add_image_placeholders', 99 );
add_filter( 'post_thumbnail_html', 'add_image_placeholders', 11 );

// ---------------------------------------------------------------------
// 说说
function shuoshuo_init() { 
  $labels = [ 
    'name' => '说说',
    'singular_name' => '说说', 
    'all_items' => '所有说说',
    'add_new' => '发表说说', 
    'add_new_item' => '撰写新说说',
    'edit_item' => '编辑说说', 
    'new_item' => '新说说', 
    'view_item' => '查看说说', 
    'search_items' => '搜索说说', 
    'not_found' => '暂无说说', 
    'not_found_in_trash' => '没有已遗弃的说说', 
    'parent_item_colon' => '',
    'menu_name' => '说说'
  ]; 
  $args = [ 
    'labels' => $labels, 
    'public' => true, 
    'publicly_queryable' => true, 
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true, 
    'rewrite' => true, 
    'capability_type' => 'post', 
    'has_archive' => true, 
    'hierarchical' => false, 
    'menu_position' => null, 
    'supports' => array('title','editor','author') 
  ]; 
  register_post_type('shuoshuo', $args); 
}
add_action('init', 'shuoshuo_init');

// ---------------------------------------------------------------------
// 分页第一页返回首页
$current_url = home_url(add_query_arg(array()));
$home_page_1 = home_url() . '/page/1';
if($current_url == $home_page_1) {
  wp_redirect(home_url(), 302);
}

// ---------------------------------------------------------------------
// 使用主题登录/注册/找回密码页面模板
if(get_option("i_login") == 1) {
  function redirect_login_page() {
    $login_page  = home_url( '/login/' );
    $page_viewed = basename($_SERVER['REQUEST_URI']);
    if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
      wp_redirect($login_page);
      exit;
    }
  }
  function login_failed() {
    $login_page  = home_url( '/login/' );
    wp_redirect( $login_page . '?login=failed' );
    exit;
  }
  add_action( 'wp_login_failed', 'login_failed' );
  function verify_username_password( $user, $username, $password ) {
    $login_page  = home_url( '/login/' );
      if( $username == "" || $password == "" ) {
          wp_redirect( $login_page . "?login=empty" );
          exit;
      }
  }
  add_filter( 'authenticate', 'verify_username_password', 1, 3);
  add_action('init','redirect_login_page');
}

// ---------------------------------------------------------------------
// 自动添加页面模板
function ashu_add_page($title,$slug,$page_template=''){   
  $allPages = get_pages();
  $exists = false;   
  foreach( $allPages as $page ){   
      if( strtolower( $page->post_name ) == strtolower( $slug ) ){   
          $exists = true;   
      }   
  }   
  if( $exists == false ) {   
    $new_page_id = wp_insert_post(   
        array(   
            'post_title' => $title,   
            'post_type'     => 'page',   
            'post_name'  => $slug,   
            'comment_status' => 'closed',   
            'ping_status' => 'closed',   
            'post_content' => '',   
            'post_status' => 'publish',   
            'post_author' => 1,   
            'menu_order' => 0   
        )   
    );   
    if($new_page_id && $page_template!=''){   
        update_post_meta($new_page_id, '_wp_page_template',  $page_template);   
    }   
  }   
}
// 使用
function ashu_add_pages() {   
	global $pagenow;   
	//判断是否为激活主题页面   
	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ){   
		ashu_add_page('会员登录','login','template/login.php');
		ashu_add_page('会员注册','register','template/register.php');   
		ashu_add_page('找回密码','forget','template/forget.php');   
    ashu_add_page('动态说说','say','template/say.php'); 
    ashu_add_page('友情链接','links','template/links.php'); 
	}   
}   
add_action( 'load-themes.php', 'ashu_add_pages' );  
  
// ---------------------------------------------------------------------
// 评论博主高亮
function filter_get_comment_author( $author, $comment_comment_id, $comment ) {
  error_reporting(0);
	$blogusers = get_user_by('id', get_the_author_ID());
	foreach ( $blogusers as $user ){
		if( $author == $user->display_name ){
			$webMaster = '<span class="master">'.$author.'</span>';
			return $webMaster;
		}
	};
	return $author;
};  
add_filter( 'get_comment_author', 'filter_get_comment_author', 10, 4);

function filter_pre_comment_author_name( $cookie_comment_author_cookiehash ) {
	$blogusers = get_user_by('id', 1);
	foreach ( $blogusers as $user ){
		if( $cookie_comment_author_cookiehash == $user->display_name ){
			return $cookie_comment_author_cookiehash.'的崇拜者';
		}
	};
	return $cookie_comment_author_cookiehash;
};
if( !is_user_logged_in() ){
	add_filter( 'pre_comment_author_name', 'filter_pre_comment_author_name', 10, 1 ); 
}

// ---------------------------------------------------------------------
// 自定义头像
require('avatar/wp-user-profile-avatar.php');

// ---------------------------------------------------------------------
// Gravatar国内头像
if ( ! function_exists( 'dr_filter_get_avatar' ) ) {
  function dr_filter_get_avatar( $avatar ) {
      $new_gravatar_sever = 'cravatar.cn';

      $sources = array(
          'www.gravatar.com/avatar/',
          '0.gravatar.com/avatar/',
          '1.gravatar.com/avatar/',
          '2.gravatar.com/avatar/',
          'secure.gravatar.com/avatar/',
          'cn.gravatar.com/avatar/'
      );

      return str_replace( $sources, $new_gravatar_sever.'/avatar/', $avatar );
  }
  add_filter( 'get_avatar', 'dr_filter_get_avatar' );
}

// ---------------------------------------------------------------------
// 获取用户头像
function get_user_avatar(){
  global $current_user;
  get_currentuserinfo();
  return get_avatar($current_user -> user_email, 400);
}

// ---------------------------------------------------------------------
// 文章目录
function insert_table_of_contents($content) {
  error_reporting(0);
	$html_comment = "<!--insert-toc-->";
	$comment_found = strpos($content, $html_comment) ? true : false;
	$fixed_location = true;
	if (!$fixed_location && !$comment_found) {
		return $content;
	}
	// 设置排除，默认页面文章不生成目录
  if (is_page()) {
    return $content;
  }
	$regex = "~(<h([1-6]))(.*?>(.*)<\/h[1-6]>)~";
	preg_match_all($regex, $content, $heading_results);
 
	// 默认小于1个段落标题不生成目录
	$num_match = count($heading_results[0]);
	if($num_match < 2) {
		return $content;
	}
	$link_list = "";
	for ($i = 0; $i < $num_match; ++ $i) {
	  $new_heading = $heading_results[1][$i] . " id='$i' " . $heading_results[3][$i];
	  $old_heading = $heading_results[0][$i];
	  $content = str_replace($old_heading, $new_heading, $content);
	  $link_list .= "<li class='heading-level-" . $heading_results[2][$i] .
	  "'><a href='#$i'>" . $heading_results[4][$i] . "</a></li>";
	}
	$start_nav = "<div id='article-toc-mb'>";
	$end_nav = "</div>";
	$title = "<div id=\"article-toc-title-mb\">文章目录</div>";
	$link_list = "<ul id=\"article-toc-ul-mb\">" . $link_list . "</ul>";
	$table_of_contents = $start_nav . $title . $link_list . $end_nav;
	if($fixed_location && !$comment_found) {
		$first_paragraph = strpos($content, '</p>', 0) + 4;
		$second_paragraph = strpos($content, '</p>', $first_p_pos);
		return substr_replace($content, $table_of_contents, $second_paragraph + 4 , 0);
	}
	else {
		return str_replace($html_comment, $table_of_contents, $content);
	}
}
add_filter('the_content', 'insert_table_of_contents');

// ---------------------------------------------------------------------
// 主题自动/一键升级
require 'admin/update/update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://www.ifalse.cn/themes/info.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'iFalse'
);

// ---------------------------------------------------------------------
// 菜单
register_nav_menus( array(        
    'menu' => '顶部菜单'
) );

// ---------------------------------------------------------------------
//侧边栏
register_sidebar( array(
  'name'          => __( '首页侧边栏'),
  'id'            => 'sidebar-1',
  'description'   => '将显示在首页',
  'class'         => '',
  'before_widget' => '<li id="%1$s" class="widget %2$s">',
  'after_widget'  => '</li>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' 
) );

register_sidebar( array(
  'name'          => __( '文章侧边栏'),
  'id'            => 'sidebar-2',
  'description'   => '将显示在文章页',
  'class'         => '',
  'before_widget' => '<li id="%1$s" class="widget %2$s">',
  'after_widget'  => '</li>',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>' 
) );

// ---------------------------------------------------------------------
// 特色图
if(function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails',array('post','page'));
}

// ---------------------------------------------------------------------
// 设定摘要的长度
function new_excerpt_length($length) {
  return 100;
}
add_filter('excerpt_length', 'new_excerpt_length');

// ---------------------------------------------------------------------
// 显示文章浏览次数
function getPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta ( $postID, $count_key, true );
  if ($count == '') {
    delete_post_meta ( $postID, $count_key );
    add_post_meta ( $postID, $count_key, '0' );
    return "0";
  }
  return $count . '';
}
function setPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta ( $postID, $count_key, true );
  if ($count == '') {
    $count = 0;
    delete_post_meta ( $postID, $count_key );
    add_post_meta ( $postID, $count_key, '0' );
  } else {
    $count ++;
    update_post_meta ( $postID, $count_key, $count );
  }
}

// ---------------------------------------------------------------------
// 登录后重定向
function i_login_redirect($redirect_to, $request, $user) {
  error_reporting(0);
  return (is_array($user->roles) && in_array('administrator', $user->roles)) ? admin_url() : site_url();
}
add_filter('login_redirect', 'i_login_redirect', 10, 3);
// 登出后重定向
function auto_redirect_after_logout(){
  wp_redirect(home_url());
  exit();
}
add_action('wp_logout','auto_redirect_after_logout');

// ---------------------------------------------------------------------
// 文章页码
function wp_pagenavi() {
  global $wp_query, $wp_rewrite;
  $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;  
  $pagination = array(
    'base' => @add_query_arg('paged','%#%'),
    'format' => '',
    'total' => $wp_query->max_num_pages,
    'current' => $current,
    'show_all' => false,
    'type' => 'plain',
    'end_size'=>'1',
    'mid_size'=>'1',
    'prev_text' => '<', //♂
    'next_text' => '>' //♀
  ); 
  if( $wp_rewrite->using_permalinks() )
    $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');
  if( !empty($wp_query->query_vars['s']) )
    $pagination['add_args'] = array('s'=>get_query_var('s'));
  echo paginate_links($pagination);
}


// ---------------------------------------------------------------------
// 后台添加链接
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

// ---------------------------------------------------------------------
//搜索时排除页面
function exclude_page() {
	global $post;
	if ($post->post_type == 'page') {
		return true;
	} else {
		return false;
	}
}

// ---------------------------------------------------------------------
//禁用多语言
add_filter( 'login_display_language_dropdown', '__return_false' );

// ---------------------------------------------------------------------
//禁止空搜索
add_filter( 'request', 'uctheme_redirect_blank_search' );
function uctheme_redirect_blank_search( $query_variables ) {
if(isset($_GET['s']) && !is_admin()) {
if(empty($_GET['s']) || ctype_space($_GET['s'])) {
wp_redirect( home_url() );
exit;
}
}
return $query_variables;
}

// ---------------------------------------------------------------------
// 去除分类
add_action( 'load-themes.php',  'no_category_base_refresh_rules');
add_action('created_category', 'no_category_base_refresh_rules');
add_action('edited_category', 'no_category_base_refresh_rules');
add_action('delete_category', 'no_category_base_refresh_rules');
function no_category_base_refresh_rules() {
  global $wp_rewrite;
  $wp_rewrite -> flush_rules();
}
add_action('init', 'no_category_base_permastruct');
function no_category_base_permastruct() {
  global $wp_rewrite, $wp_version;
  if (version_compare($wp_version, '3.4', '<')) {
    $wp_rewrite -> extra_permastructs['category'][0] = '%category%';
  } else {
    $wp_rewrite -> extra_permastructs['category']['struct'] = '%category%';
  }
}
add_filter('category_rewrite_rules', 'no_category_base_rewrite_rules');
function no_category_base_rewrite_rules($category_rewrite) {
  $category_rewrite = array();
  $categories = get_categories(array('hide_empty' => false));
  foreach ($categories as $category) {
    $category_nicename = $category -> slug;
    if ($category -> parent == $category -> cat_ID)
      $category -> parent = 0;
    elseif ($category -> parent != 0)
      $category_nicename = get_category_parents($category -> parent, false, '/', true) . $category_nicename;
    $category_rewrite['(' . $category_nicename . ')/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
    $category_rewrite['(' . $category_nicename . ')/page/?([0-9]{1,})/?$'] = 'index.php?category_name=$matches[1]&paged=$matches[2]';
    $category_rewrite['(' . $category_nicename . ')/?$'] = 'index.php?category_name=$matches[1]';
  }
  global $wp_rewrite;
  $old_category_base = get_option('category_base') ? get_option('category_base') : 'category';
  $old_category_base = trim($old_category_base, '/');
  $category_rewrite[$old_category_base . '/(.*)$'] = 'index.php?category_redirect=$matches[1]';
  return $category_rewrite;
}
add_filter('query_vars', 'no_category_base_query_vars');
function no_category_base_query_vars($public_query_vars) {
  $public_query_vars[] = 'category_redirect';
  return $public_query_vars;
}
add_filter('request', 'no_category_base_request');
function no_category_base_request($query_vars) {
  if (isset($query_vars['category_redirect'])) {
    $catlink = trailingslashit(get_option('home')) . user_trailingslashit($query_vars['category_redirect'], 'category');
    status_header(301);
    header("Location: $catlink");
    exit();
  }
  return $query_vars;
}

// ---------------------------------------------------------------------
//面包屑导航
function i_breadcrumb() {
  if ( is_front_page() ) {
    return;
  }
  global $post;
  $custom_taxonomy  = '';

  $defaults = array(
    'seperator'   =>  '>',
    'id'          =>  'i-breadcrumb',
    'classes'     =>  'i-breadcrumb',
    'home_title'  =>  esc_html__( '首页', '' )
  );
  $sep  = '<li class="seperator">'. esc_html( $defaults['seperator'] ) .'</li>';
  echo '<ul id="'. esc_attr( $defaults['id'] ) .'" class="'. esc_attr( $defaults['classes'] ) .'">';
  echo '<li class="item"><a href="'. get_home_url() .'">'. esc_html( $defaults['home_title'] ) .'</a></li>' . $sep;
  if ( is_single() ) {
    $post_type = get_post_type();
    if( $post_type != 'post' ) {
      $post_type_object   = get_post_type_object( $post_type );
      $post_type_link     = get_post_type_archive_link( $post_type );
      echo '<li class="item item-cat"><a href="'. $post_type_link .'">'. $post_type_object->labels->name .'</a></li>'. $sep;
    }
    $category = get_the_category( $post->ID );
    if( !empty( $category ) ) {
      $category_values      = array_values( $category );
      $get_last_category    = end( $category_values );
      $get_parent_category  = rtrim( get_category_parents( $get_last_category->term_id, true, ',' ), ',' );
      $cat_parent           = explode( ',', $get_parent_category );
      $display_category = '';
      foreach( $cat_parent as $p ) {
        $display_category .=  '<li class="item item-cat">'. $p .'</li>' . $sep;
      }
    }
    $taxonomy_exists = taxonomy_exists( $custom_taxonomy );
    if( empty( $get_last_category ) && !empty( $custom_taxonomy ) && $taxonomy_exists ) {
      $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
      $cat_id         = $taxonomy_terms[0]->term_id;
      $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
      $cat_name       = $taxonomy_terms[0]->name;
    }
    if( !empty( $get_last_category ) ) {
      echo $display_category;
      echo '<li class="item item-current">'. '正文' .'</li>';
    } else if( !empty( $cat_id ) ) {
      echo '<li class="item item-cat"><a href="'. $cat_link .'">'. $cat_name .'</a></li>' . $sep;
      echo '<li class="item-current item">'. '正文' .'</li>';
    } else {
      echo '<li class="item-current item">'. '正文' .'</li>';
    }
  } else if( is_archive() ) {
    if( is_tax() ) {
      $post_type = get_post_type();
      if( $post_type != 'post' ) {
        $post_type_object   = get_post_type_object( $post_type );
        $post_type_link     = get_post_type_archive_link( $post_type );
        echo '<li class="item item-cat item-custom-post-type-' . $post_type . '"><a href="' . $post_type_link . '">' . $post_type_object->labels->name . '</a></li>' . $sep;
      }
      $custom_tax_name = get_queried_object()->name;
      echo '<li class="item item-current">'. $custom_tax_name .'</li>';
    } else if ( is_category() ) {
      $parent = get_queried_object()->category_parent;
      if ( $parent !== 0 ) {
        $parent_category = get_category( $parent );
        $category_link   = get_category_link( $parent );
        echo '<li class="item"><a href="'. esc_url( $category_link ) .'">'. $parent_category->name .'</a></li>' . $sep;
      }
      echo '<li class="item item-current">'. single_cat_title( '', false ) .'</li>';
    } else if ( is_tag() ) {
      $term_id        = get_query_var('tag_id');
      $taxonomy       = 'post_tag';
      $args           = 'include=' . $term_id;
      $terms          = get_terms( $taxonomy, $args );
      $get_term_name  = $terms[0]->name;
      echo '<li class="item-current item">'. $get_term_name .'</li>';
    } else if( is_day() ) {
      echo '<li class="item-year item"><a href="'. get_year_link( get_the_time('Y') ) .'">'. get_the_time('Y') . ' Archives</a></li>' . $sep;
      echo '<li class="item-month item"><a href="'. get_month_link( get_the_time('Y'), get_the_time('m') ) .'">'. get_the_time('M') .' Archives</a></li>' . $sep;
      echo '<li class="item-current item">'. get_the_time('jS') .' '. get_the_time('M'). ' Archives</li>';
    } else if( is_month() ) {
      echo '<li class="item-year item"><a href="'. get_year_link( get_the_time('Y') ) .'">'. get_the_time('Y') . ' Archives</a></li>' . $sep;
      echo '<li class="item-month item-current item">'. get_the_time('M') .' Archives</li>';
    } else if ( is_year() ) {
      echo '<li class="item-year item-current item">'. get_the_time('Y') .' Archives</li>';
    } else if ( is_author() ) {
      global $author;
      $userdata = get_userdata( $author );
      echo '<li class="item-current item">'. 'Author: '. $userdata->display_name . '</li>';
    } else {
      echo '<li class="item item-current">'. post_type_archive_title() .'</li>';
    }
  } else if ( is_page() ) {
    if( $post->post_parent ) {
      $anc = get_post_ancestors( $post->ID );
      $anc = array_reverse( $anc );
      if ( !isset( $parents ) ) $parents = null;
      foreach ( $anc as $ancestor ) {
        $parents .= '<li class="item-parent item"><a href="'. get_permalink( $ancestor ) .'">'. get_the_title( $ancestor ) .'</a></li>' . $sep;
      }
      echo $parents;
      echo '<li class="item-current item">'. '正文' .'</li>';
    } else {
      echo '<li class="item-current item">'. '正文' .'</li>';
    }
  } else if ( is_search() ) {
    echo '<li class="item-current item">Search results for: '. get_search_query() .'</li>';
  } else if ( is_404() ) {
    echo '<li class="item-current item">' . 'Error 404' . '</li>';
  }
  echo '</ul>';
}