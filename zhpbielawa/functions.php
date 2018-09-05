<?php

	//Adding style.css
	function imp_style_script(){
		wp_enqueue_style('style', get_template_directory_uri().'/css/style.css', array(), '4.1.1', 'all');
		wp_enqueue_script('jquery', get_template_directory_uri().'/node_modules/bootstrap/dist/js/bootstrap.min.js', array(), '3.2.1', true);
		wp_enqueue_script('popper', get_template_directory_uri().'/node_modules/popper.js/dist/popper.min.js', array(), '1.14.3', true);
		wp_enqueue_script('bootstrap', get_template_directory_uri().'/node_modules/bootstrap/dist/js/bootstrap.min.js', array(), '4.1.1', true);
	}
	add_action('wp_enqueue_scripts', 'imp_style_script');

	//Supported options
	add_theme_support('custom-header');
	add_theme_support('post-thumbnails');
	add_theme_support('HTML5', array('search_form'));

	//Filter to add class for link
	add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );
	function wpse156165_menu_add_class( $atts, $item, $args ) {
		$class = 'nav-link'; // or something based on $item
		$atts['class'] = $class;
    return $atts;
	}


	//Filter to add clas for <li>
	add_filter('nav_menu_css_class', 'bpnav_menu_add_class', 10, 3);
	function bpnav_menu_add_class( $atts, $item, $args){
		$class = 'nav-item';
		$atts['class'] = $class;
	return $atts;
	}



	//Deleting default menu style
	function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
	}
	add_action('get_header', 'remove_admin_login_header');

	// Include custom navwalker
	require_once('bs4navwalker.php');

	// Register WordPress nav menu
	register_nav_menu('top', 'Top menu');

	//adding class for next and previous links
	add_filter('next_posts_link_attributes', 'addclass_nextpostslink');
	add_filter('previous_posts_link_attributes', 'addclass_previouspostslink');

	function addclass_nextpostslink(){
		return 'class="btn btn-primary"';
	}
	function addclass_previouspostslink(){
		return 'class="btn btn-primary"';
	}
?>
