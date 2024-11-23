<?php
/* ------------------------------------------------------------------------- *
 *  Base functionality
/* ------------------------------------------------------------------------- */
	
	// Content width
	if ( !isset( $content_width ) ) { $content_width = 720; }


/*  Theme setup
/* ------------------------------------ */
if ( ! function_exists( 'ufotimeline_setup' ) ) {
	
	function ufotimeline_setup() {
		// Enable title tag
		add_theme_support( 'title-tag' );
		
		// Enable automatic feed links
		add_theme_support( 'automatic-feed-links' );
		
		// Enable featured image
		add_theme_support( 'post-thumbnails' );
		
		// Enable responsive embeds
		add_theme_support( 'responsive-embeds' );
		
		// Thumbnail sizes
		add_image_size( 'ufotimeline-small', 100, 100, true );
		add_image_size( 'ufotimeline-medium', 150, 150, true );
		add_image_size( 'ufotimeline-medium-hd', 400, 225, true );
		add_image_size( 'ufotimeline-large-hd', 720, 405, true );

		// Custom menu areas
		register_nav_menus( array(
			'mobile' 	=> esc_html__( 'Mobile', 'ufotimeline' ),
			'header' 	=> esc_html__( 'Header', 'ufotimeline' ),
		) );
	}
	
}
add_action( 'after_setup_theme', 'ufotimeline_setup' );


/*  Custom navigation
/* ------------------------------------ */
if ( ! class_exists( '\Ufotimeline\Nav' ) ) {
	require_once 'inc/nav.php';
}
add_action( 'wp', function() {
	$nav = new \Ufotimeline\Nav();
	$nav->enqueue(
		[
			'script' => 'js/nav.js',
			'inline' => false,
		]
	);
	$nav->init();
} );


/*  Custom logo
/* ------------------------------------ */
if ( ! function_exists( 'ufotimeline_custom_logo' ) ) {
	
	function ufotimeline_custom_logo() {
		$defaults = array(
			'height'		=> 120,
			'width'			=> 400,
			'flex-height'	=> true,
			'flex-width'	=> true,
			'header-text'	=> array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}

}	
add_action( 'after_setup_theme', 'ufotimeline_custom_logo' );


/*  Enqueue javascript
/* ------------------------------------ */	
if ( ! function_exists( 'ufotimeline_scripts' ) ) {
	
	function ufotimeline_scripts() {
		wp_enqueue_script( 'ufotimeline-slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ),'', false );
		wp_enqueue_script( 'ufotimeline-mixitup', get_template_directory_uri() . '/js/mixitup.min.js', array( 'jquery' ),'', false );
		wp_enqueue_script( 'ufotimeline-theme-toggle', get_template_directory_uri() . '/js/theme-toggle.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'ufotimeline-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ),'', true );
		if ( is_singular() && get_option( 'thread_comments' ) )	{ wp_enqueue_script( 'comment-reply' ); }
	}  
	
}
add_action( 'wp_enqueue_scripts', 'ufotimeline_scripts' ); 


/*  Enqueue css
/* ------------------------------------ */	
if ( ! function_exists( 'ufotimeline_styles' ) ) {
	
	function ufotimeline_styles() {
		wp_enqueue_style( 'ufotimeline-style', get_stylesheet_uri() );
		wp_enqueue_style( 'ufotimeline-light', get_template_directory_uri().'/light.css' );
		wp_enqueue_style( 'ufotimeline-font-awesome', get_template_directory_uri().'/fonts/all.min.css' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'ufotimeline_styles' );


/* ------------------------------------------------------------------------- *
 *  Dynamic styles
/* ------------------------------------------------------------------------- */

/*  Google fonts
/* ------------------------------------ */
if ( ! function_exists( 'ufotimeline_enqueue_google_fonts' ) ) {

	function ufotimeline_enqueue_google_fonts () {
		wp_enqueue_style( 'inter', '//fonts.googleapis.com/css?family=Inter:300,400,600,800' );
	}	
	
}
add_action( 'wp_enqueue_scripts', 'ufotimeline_enqueue_google_fonts' ); 	


/*  Dynamic css output
/* ------------------------------------ */
if ( ! function_exists( 'ufotimeline_dynamic_css' ) ) {

	function ufotimeline_dynamic_css() {
		
		// start output
		$styles = '';		
		
		// google fonts
		$styles .= 'body { font-family: "Inter", Arial, sans-serif; }'."\n";

		wp_add_inline_style( 'ufotimeline-style', $styles );	
		
	}
	
}
add_action( 'wp_enqueue_scripts', 'ufotimeline_dynamic_css' );


/* ------------------------------------------------------------------------- *
 *  Template functions
/* ------------------------------------------------------------------------- */	

/*  Site name/logo
/* ------------------------------------ */
if ( ! function_exists( 'ufotimeline_site_title' ) ) {

	function ufotimeline_site_title() {
		
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		
		// Text or image?
		if ( has_custom_logo() ) {
			$logo = '<img src="'. esc_url( $logo[0] ) .'" alt="'.esc_attr( get_bloginfo('name')).'">';;
		} else {
			$logo = esc_html( get_bloginfo('name') );
		}
		
		$link = '<a href="'.esc_url( home_url('/') ).'" rel="home"><strong>UFO</strong><i>Timeline</i></a>';
		
		if ( is_front_page() || is_home() ) {
			$sitename = '<h1 class="site-title">'.$link.'<span class="radar-outer"></span><span class="radar-inner"></span></h1>'."\n";
		} else {
			$sitename = '<p class="site-title">'.$link.'<span class="radar-outer"></span><span class="radar-inner"></span></p>'."\n";
		}
		
		return $sitename;
	}
	
}


/* ------------------------------------------------------------------------- *
 *  Filters
/* ------------------------------------------------------------------------- */

/*  Body class
/* ------------------------------------ */
if ( ! function_exists( 'ufotimeline_body_class' ) ) {
	
	function ufotimeline_body_class( $classes ) {
		if ( has_nav_menu( 'mobile' ) ) { $classes[] = 'mobile-menu'; }
		if (! ( is_user_logged_in() ) ) { $classes[] = 'logged-out'; }
		if ( is_singular('people') ) { $classes[] = 'post-type-archive-people'; }
		if ( is_singular('websites') ) { $classes[] = 'post-type-archive-websites'; }
		return $classes;
	}
	
}
add_filter( 'body_class', 'ufotimeline_body_class' );


/*  Has featured image body class
/* ------------------------------------ */
function ufotimeline_featured_image_body_class( $classes ) {    
	global $post;
		if ( isset ( $post->ID ) && get_the_post_thumbnail($post->ID)) {
			  $classes[] = 'has-featured-image';
	 }
			  return $classes;
	}
add_filter( 'body_class', 'ufotimeline_featured_image_body_class' );


/*  Excerpt ending
/* ------------------------------------ */
if ( ! function_exists( 'ufotimeline_excerpt_more' ) ) {

	function ufotimeline_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}
		return '&#46;&#46;&#46;';
	}
	
}
add_filter( 'excerpt_more', 'ufotimeline_excerpt_more' );


/*  OG image
/* ------------------------------------ */
function my_og_image_init($images)
{
    if ( is_front_page() || is_home() || is_archive() ) {
        $images[] = 'https://ufotimeline.com/wp-content/themes/ufotimeline/img/ufo-timeline-og.png';
    }
    return $images;
}
add_filter('og_image_init', 'my_og_image_init');


/*  Stop contact form 7 files from loading
/* ------------------------------------ */
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );


/* ------------------------------------------------------------------------- *
 *  Actions
/* ------------------------------------------------------------------------- */	

/*  Script for no-js / js class
/* ------------------------------------ */
if ( ! function_exists( 'ufotimeline_html_js_class' ) ) {

	function ufotimeline_html_js_class () {
		echo '<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>'. "\n";
	}
	
}
add_action( 'wp_head', 'ufotimeline_html_js_class', 1 );


/*  Admin panel css
/* ------------------------------------ */
if ( ! function_exists( 'ufotimeline_admin_panel_css' ) ) {
	
	function ufotimeline_admin_panel_css() {
		global $pagenow;
		if ( 'post.php' === $pagenow || 'post-new.php' === $pagenow ) {
			echo '<style>
				.rwmb-image-select { width: auto!important; height: auto!important; }
				.rwmb-text { width: 100%; }
			</style>';
		}
	}

}
add_action( 'admin_head', 'ufotimeline_admin_panel_css' );


/*  Exclude category
/* ------------------------------------ */
function exclude_post_categories($excl='', $spacer=' ') {
  $categories = get_the_category(get_the_ID());
  if (!empty($categories)) {
    $exclude = $excl;
    $exclude = explode(",", $exclude);
    $thecount = count(get_the_category()) - count($exclude);
    foreach ($categories as $cat) {
      $html = '';
      if (!in_array($cat->cat_ID, $exclude)) {
        $html .= '<a href="' . get_category_link($cat->cat_ID) . '" ';
        $html .= 'title="' . $cat->cat_name . '">' . $cat->cat_name . '</a>';
        if ($thecount > 0) {
          $html .= $spacer;
        }
        $thecount--;
        echo $html;
      }
    }
  }
}


/*  Count total posts
/* ------------------------------------ */
function ufotimeline_total_posts() { 
	$total = wp_count_posts()->publish;
	echo '' . $total;
}


/*  Count total posts: People
/* ------------------------------------ */
function ufotimeline_total_people() { 
	$total = wp_count_posts( 'people' )->publish;
	echo '' . $total;
} 


/*  Count total posts: Websites
/* ------------------------------------ */
function ufotimeline_total_websites() { 
	$total = wp_count_posts( 'websites' )->publish;
	echo '' . $total;
} 


/*  Count posts in category
/* ------------------------------------ */
function count_cat_post($category) {
	if(is_string($category)) {
		$catID = get_cat_ID($category);
	}
	elseif(is_numeric($category)) {
		$catID = $category;
	} else {
		return 0;
	}
	$cat = get_category($catID);
	return $cat->count;
}


/*  Category body class on single
/* ------------------------------------ */
add_filter('body_class','ufotimeline_add_category_to_single');

function ufotimeline_add_category_to_single($classes) {
	if (is_single() ) {
		global $post;
		$precategory = 'category-';
		foreach((get_the_category($post->ID)) as $category) {
			// add category slug to the $classes array
			$classes[] = $precategory.$category->category_nicename;
		}
	}
	// return the $classes array
	return $classes;
}


/*  Is old post
/* ------------------------------------ */
function is_old_post($days = 5) {
    $days = (int) $days;
    $offset = $days*60*60*24;
    if ( get_post_time() < date('U') - $offset )
         return true; 
    return false;
}
 

/*  Accessibility IE11 fix - https://git.io/vWdr2
/* ------------------------------------ */
function ufotimeline_skip_link_focus_fix() {
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'ufotimeline_skip_link_focus_fix' );


/*  Custom meta boxes
/* ------------------------------------ */
add_filter( 'rwmb_meta_boxes', 'ufotimeline_register_meta_boxes' );

function ufotimeline_register_meta_boxes( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'   => esc_html__( 'Meta Boxes', 'ufotimeline' ),
        'id'      => 'meta-boxes',
        'context' => 'normal',
        'fields'  => [
			[
                'type' => 'textarea',
                'name' => esc_html__( 'Extra', 'ufotimeline' ),
                'id'   => $prefix . 'extra',
            ],
            [
                'type' => 'textarea',
                'name' => esc_html__( 'Quote', 'ufotimeline' ),
                'id'   => $prefix . 'quote',
            ],
        ],
    ];

    return $meta_boxes;
}

/*  Custom post type: People
/* ------------------------------------ */
add_action( 'init', 'ufotimeline_people_post_type' );
function ufotimeline_people_post_type() {
	$labels = [
		'name'                     => esc_html__( 'People', 'ufotimeline' ),
		'singular_name'            => esc_html__( 'People', 'ufotimeline' ),
		'add_new'                  => esc_html__( 'Add New', 'ufotimeline' ),
		'add_new_item'             => esc_html__( 'Add New People', 'ufotimeline' ),
		'edit_item'                => esc_html__( 'Edit People', 'ufotimeline' ),
		'new_item'                 => esc_html__( 'New People', 'ufotimeline' ),
		'view_item'                => esc_html__( 'View People', 'ufotimeline' ),
		'view_items'               => esc_html__( 'View People', 'ufotimeline' ),
		'search_items'             => esc_html__( 'Search People', 'ufotimeline' ),
		'not_found'                => esc_html__( 'No people found.', 'ufotimeline' ),
		'not_found_in_trash'       => esc_html__( 'No people found in Trash.', 'ufotimeline' ),
		'parent_item_colon'        => esc_html__( 'Parent People:', 'ufotimeline' ),
		'all_items'                => esc_html__( 'All People', 'ufotimeline' ),
		'archives'                 => esc_html__( 'People Archives', 'ufotimeline' ),
		'attributes'               => esc_html__( 'People Attributes', 'ufotimeline' ),
		'insert_into_item'         => esc_html__( 'Insert into people', 'ufotimeline' ),
		'uploaded_to_this_item'    => esc_html__( 'Uploaded to this people', 'ufotimeline' ),
		'featured_image'           => esc_html__( 'Featured image', 'ufotimeline' ),
		'set_featured_image'       => esc_html__( 'Set featured image', 'ufotimeline' ),
		'remove_featured_image'    => esc_html__( 'Remove featured image', 'ufotimeline' ),
		'use_featured_image'       => esc_html__( 'Use as featured image', 'ufotimeline' ),
		'menu_name'                => esc_html__( 'People', 'ufotimeline' ),
		'filter_items_list'        => esc_html__( 'Filter people list', 'ufotimeline' ),
		'filter_by_date'           => esc_html__( '', 'ufotimeline' ),
		'items_list_navigation'    => esc_html__( 'People list navigation', 'ufotimeline' ),
		'items_list'               => esc_html__( 'People list', 'ufotimeline' ),
		'item_published'           => esc_html__( 'People published.', 'ufotimeline' ),
		'item_published_privately' => esc_html__( 'People published privately.', 'ufotimeline' ),
		'item_reverted_to_draft'   => esc_html__( 'People reverted to draft.', 'ufotimeline' ),
		'item_scheduled'           => esc_html__( 'People scheduled.', 'ufotimeline' ),
		'item_updated'             => esc_html__( 'People updated.', 'ufotimeline' ),
		'text_domain'              => esc_html__( 'ufotimeline', 'ufotimeline' ),
	];
	$args = [
		'label'               => esc_html__( 'People', 'ufotimeline' ),
		'labels'              => $labels,
		'description'         => '',
		'public'              => true,
		'hierarchical'        => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'query_var'           => true,
		'can_export'          => true,
		'delete_with_user'    => true,
		'has_archive'         => true,
		'rest_base'           => '',
		'show_in_menu'        => true,
		'menu_position'       => '',
		'menu_icon'           => 'dashicons-admin-generic',
		'capability_type'     => 'post',
		'supports'            => ['title', 'editor', 'thumbnail', 'custom-fields', 'comments', 'excerpt'],
		'taxonomies'          => [],
		'rewrite'             => [
			'with_front' => true,
		],
	];

	register_post_type( 'people', $args );
}


/*  Custom meta boxes: People
/* ------------------------------------ */
add_filter( 'rwmb_meta_boxes', 'ufotimeline_people_meta_boxes' );

function ufotimeline_people_meta_boxes( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'   => esc_html__( 'People Meta Boxes', 'ufotimeline' ),
		'post_types' => 'people',
        'id'      => 'meta-boxes-people',
        'context' => 'normal',
        'fields'  => [
			[
                'type'    => 'select',
                'name'    => esc_html__( 'Filter Type', 'ufotimeline' ),
                'id'      => $prefix . 'people-filter-type',
                'options' => [
                    'past' => esc_html__( 'Past', 'ufotimeline' ),
					'present' => esc_html__( 'Present', 'ufotimeline' ),
                ],
				'placeholder' => esc_html__( 'Not selected', 'ufotimeline' ),
            ],
			[
                'type' => 'divider',
            ],
			[
                'type' => 'text',
                'name' => esc_html__( 'Living Years', 'ufotimeline' ),
                'id'   => $prefix . 'years',
            ],
			[
                'type' => 'text',
                'name' => esc_html__( 'Job', 'ufotimeline' ),
                'id'   => $prefix . 'job',
            ],
			[
                'type' => 'url',
                'name' => esc_html__( 'Website', 'ufotimeline' ),
                'id'   => $prefix . 'website',
            ],
            [
                'type' => 'url',
                'name' => esc_html__( 'Twitter', 'ufotimeline' ),
                'id'   => $prefix . 'twitter',
            ],
			[
                'type' => 'url',
                'name' => esc_html__( 'Text Source', 'ufotimeline' ),
                'id'   => $prefix . 'source',
            ],
        ],
    ];

    return $meta_boxes;
}


/*  Custom post type: Websites
/* ------------------------------------ */
add_action( 'init', 'ufotimeline_websites_post_type' );
function ufotimeline_websites_post_type() {
	$labels = [
		'name'                     => esc_html__( 'Websites', 'ufotimeline' ),
		'singular_name'            => esc_html__( 'Website', 'ufotimeline' ),
		'add_new'                  => esc_html__( 'Add New', 'ufotimeline' ),
		'add_new_item'             => esc_html__( 'Add New Website', 'ufotimeline' ),
		'edit_item'                => esc_html__( 'Edit Website', 'ufotimeline' ),
		'new_item'                 => esc_html__( 'New Website', 'ufotimeline' ),
		'view_item'                => esc_html__( 'View Website', 'ufotimeline' ),
		'view_items'               => esc_html__( 'View Websites', 'ufotimeline' ),
		'search_items'             => esc_html__( 'Search Websites', 'ufotimeline' ),
		'not_found'                => esc_html__( 'No websites found.', 'ufotimeline' ),
		'not_found_in_trash'       => esc_html__( 'No websites found in Trash.', 'ufotimeline' ),
		'parent_item_colon'        => esc_html__( 'Parent Website:', 'ufotimeline' ),
		'all_items'                => esc_html__( 'All Websites', 'ufotimeline' ),
		'archives'                 => esc_html__( 'Website Archives', 'ufotimeline' ),
		'attributes'               => esc_html__( 'Website Attributes', 'ufotimeline' ),
		'insert_into_item'         => esc_html__( 'Insert into website', 'ufotimeline' ),
		'uploaded_to_this_item'    => esc_html__( 'Uploaded to this website', 'ufotimeline' ),
		'featured_image'           => esc_html__( 'Featured image', 'ufotimeline' ),
		'set_featured_image'       => esc_html__( 'Set featured image', 'ufotimeline' ),
		'remove_featured_image'    => esc_html__( 'Remove featured image', 'ufotimeline' ),
		'use_featured_image'       => esc_html__( 'Use as featured image', 'ufotimeline' ),
		'menu_name'                => esc_html__( 'Websites', 'ufotimeline' ),
		'filter_items_list'        => esc_html__( 'Filter websites list', 'ufotimeline' ),
		'filter_by_date'           => esc_html__( '', 'ufotimeline' ),
		'items_list_navigation'    => esc_html__( 'Websites list navigation', 'ufotimeline' ),
		'items_list'               => esc_html__( 'Websites list', 'ufotimeline' ),
		'item_published'           => esc_html__( 'Website published.', 'ufotimeline' ),
		'item_published_privately' => esc_html__( 'Website published privately.', 'ufotimeline' ),
		'item_reverted_to_draft'   => esc_html__( 'Website reverted to draft.', 'ufotimeline' ),
		'item_scheduled'           => esc_html__( 'Website scheduled.', 'ufotimeline' ),
		'item_updated'             => esc_html__( 'Website updated.', 'ufotimeline' ),
		'text_domain'              => esc_html__( 'ufotimeline', 'ufotimeline' ),
	];
	$args = [
		'label'               => esc_html__( 'Websites', 'ufotimeline' ),
		'labels'              => $labels,
		'description'         => '',
		'public'              => true,
		'hierarchical'        => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'query_var'           => true,
		'can_export'          => true,
		'delete_with_user'    => true,
		'has_archive'         => true,
		'rest_base'           => '',
		'show_in_menu'        => true,
		'menu_position'       => '',
		'menu_icon'           => 'dashicons-admin-generic',
		'capability_type'     => 'post',
		'supports'            => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments'],
		'taxonomies'          => [],
		'rewrite'             => [
			'with_front' => true,
		],
	];

	register_post_type( 'websites', $args );
}


/*  Custom meta boxes: Websites
/* ------------------------------------ */
add_filter( 'rwmb_meta_boxes', 'ufotimeline_websites_meta_boxes' );

function ufotimeline_websites_meta_boxes( $meta_boxes ) {
    $prefix = '';

    $meta_boxes[] = [
        'title'   => esc_html__( 'Websites Meta Boxes', 'ufotimeline' ),
		'post_types' => 'websites',
        'id'      => 'meta-boxes-websites',
        'context' => 'normal',
        'fields'  => [
			[
                'type'    => 'select',
                'name'    => esc_html__( 'Filter Type', 'ufotimeline' ),
                'id'      => $prefix . 'websites-filter-type',
                'options' => [
                    'recommended' => esc_html__( 'Recommended', 'ufotimeline' ),
					'organization' => esc_html__( 'Organization', 'ufotimeline' ),
					'inactive' => esc_html__( 'Inactive', 'ufotimeline' ),
                ],
				'placeholder' => esc_html__( 'Not selected', 'ufotimeline' ),
            ],
			[
                'type' => 'divider',
            ],
			[
                'type' => 'url',
                'name' => esc_html__( 'Website Link', 'ufotimeline' ),
                'id'   => $prefix . 'website-link',
            ],
        ],
    ];

    return $meta_boxes;
}


/*  Hide admin bar on site
/* ------------------------------------ */
// add_filter('show_admin_bar', '__return_false');
if(wp_is_mobile()){
add_filter( 'show_admin_bar', '__return_false' );
}