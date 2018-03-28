<?php

//FUNCTION TO GET THE STYLESHEET
function getStyles() {
	wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'getStyles');


//FUNCTION TO CREATE THE MENUS WITHIN THE MENU LINK ON WORDPRESS
//MENUS WERE CREATED IN HEADER.PHP and FOOTER.PHP
register_nav_menus (array(
'primary' => __('Primary Menu'),
//'footer' => __ ('Footer Menu'),
));


//CUSTOMIZE APPEARANCE OPTIONS





//CREATE A COLOR PICKER
function casey_customize_register($wp_customize) { // ADD THE WP_CUSTOMIZE PARAMETER TO CUSTOMIZE LOCATION

//CONTROLS (USER INTERFACE - EX.. COLOR PICKER)
//SETTINGS (DATABSE - WHAT THE USER CHANGES)
//SECTIONS (A GROUP OF OPTIONS)

	$wp_customize->add_setting('casey_link_color', array (
		'default' => '#4CAF50', 
		'transport' => 'refresh',
	));

	$wp_customize->add_section('casey_standard_colors', array (
		'title' => __('Standard Colors', 'Sandbox'),
		'priority' => 30,
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'casey_link_color_control', array(

		'label'=> __('Link Color', 'Sandbox'),
		'section' => 'casey_standard_colors',
		'settings'=> 'casey_link_color',
	)));

}

add_action('customize_register', 'casey_customize_register'); // ADD ACTION HOOK (Tell wordpress where to run )this function)

//OUTPUT CUSTOMIZED CSS FOR THE COLOR PICKER

function casey_customize_css() { ?>

<style type = "text/css">

a:link,
a:visited {
	color: <?php echo get_theme_mod('casey_link_color');?>;
}

</style>

<?php
}

add_action('wp_head', 'casey_customize_css'); // ADD ACTION HOOK (Tell wordpress where to run )


/* 	
	=====================================================
	Custom Post Type
	====================================================
*/

	function caseys_custom_post_type() {

		// Not all of theses labels are needed. If it is not defined then wp
		// will roll back to the defaults. This is all of the options that can be
		// defined.
		$labels = array(
			'name' => 'My Projects',
			'singular_name' => 'Portfolio', // name used in the admin panel
			'add_new' => 'Add Item', //label in the button used to add a new portfolio
			'all_items' => 'All Items',
			'add_new_item' => 'Add Item',
			'edit_item' => 'Edit Item',
			'new_item' => 'New Item',
			'view_item' => 'View Item',
			'search_item' => 'Search Portfolio',
			'not_found' => 'No items found',
			'not_found_in_trash' => 'No items found in trash',
			'parent_item_colon' => 'Parent Item'
		);
		

		$args = array (
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'revisions',
			),
			'taxonomies' => array('category', 'post_tag'), 
				'menu_position' => 5,
				'exclude_from_search' => false
		);
			register_post_type('portfolio', $args);  // First parm is slug. Second is variable that contains all of the arguments in the post type
	}

	add_theme_support('post-thumbnails'); // Must add this in order to allow thumbnails to be added in the theme.
	add_action('init', 'caseys_custom_post_type');










