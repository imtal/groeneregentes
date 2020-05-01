<?php

function register_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Hoofdmenu' ),
            'project-menu' => __( 'Projectmenu' ),
            'extra-menu' => __( 'Buurtmenu' ),
            'info-menu' => __( 'Info' ),
            'contact-menu' => __( 'Contactmenu' )
        )
    );
}
add_action( 'init', 'register_menus');

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Informatieblok',
        'id' => 'info',
        'description' => 'Verschijnt als blok onderaan iedere pagina',
        'before_widget' => '<div></div><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
        )
    );
}

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Projectoverzicht',
        'id' => 'projects',
        'description' => 'Overzicht op de startpagina',
        'before_widget' => '<div></div><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="projecttitle">',
        'after_title' => '</h2>',
        )
    );
}

function register_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'register_post_thumbnails' );

class Panels_With_Description extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;

        $output .= '<li class="wp3-project">';

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->title ) .'"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a class="wp3-project ' .  implode(' ', $item->classes) .'" '. $attributes .'>';
        $item_output .= '<h2>'. $item->attr_title .'</h2>';
        $item_output .= '<h3>'. $item->title .'</h3>';
        $item_output .= '<p>' . $item->description . '</p>';
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
/**
 * Add meta description (https://gretathemes.com/seo-add-meta-tags-without-plugins/)
 */
function meta_description() {
    if ( is_home() ) {
        echo '<meta name="description" content="' . get_bloginfo( "description" ) . '" />' . "\n";
		$cats = get_categories( );
		$keys = array();
		foreach ($cats as $c) {
			array_push( $keys, $c->name );
		}
		echo '<meta name="keywords" content="' . implode( ',', $keys ) . '" />' . "\n";
    }
    if ( is_page() ) {
		$excerpt = get_the_excerpt();
		$excerpt = substr($excerpt, 0, 160);
		$excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
		if ( empty( $excerpt ) ) {
			echo '<meta name="description" content="' . get_bloginfo( "description" ) . '" />' . "\n";
		} else {
			$excerpt = wp_strip_all_tags( $excerpt, true );
			$excerpt = strip_shortcodes( $excerpt );
			$excerpt = str_replace( array("\n", "\r", "\t"), ' ', $excerpt );
			$excerpt = mb_substr( $excerpt, 0, 300, 'utf8' );
			echo '<meta name="description" content="' . $excerpt . '" />' . "\n";
		}
    }
    if ( is_category() ) {
        $cat = wp_strip_all_tags( category_description() );
        echo '<meta name="description" content="' . $cat . '" />' . "\n";
    }
}
add_action( 'wp_head', 'meta_description');

/**
 * Disable the emoji's (https://kinsta.com/knowledgebase/disable-emojis-wordpress/#disable-emojis-code)
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
	return $urls;
}


?>

