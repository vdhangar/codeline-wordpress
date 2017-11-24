<?php
/**
 * _s functions and definitions
 *
 * @package unite
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width))
{
	$content_width = 730; /* pixels */
}

/**
 * Set the content width for full width pages with no sidebar.
 */
function unite_content_width()
{
	if (is_page_template('page-fullwidth.php') || is_page_template('front-page.php'))
	{
		global $content_width;
		$content_width = 1110; /* pixels */
	}
}

add_action('template_redirect', 'unite_content_width');


if (!function_exists('unite_setup')) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function unite_setup()
	{

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change 'unite' to the name of your theme in all the template files
		 */
		load_theme_textdomain('unite-child', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support('post-thumbnails');

		add_image_size('unite-featured', 730, 410, true);
		add_image_size('tab-small', 60, 60, true); // Small Thumbnail
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			   'primary' => __('Primary Menu', 'unite'),
			   'footer-links' => __('Footer Links', 'unite') // secondary nav in footer
		));

		// Enable support for Post Formats.
		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

		// Setup the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('unite_custom_background_args', array(
			   'default-color' => 'ffffff',
			   'default-image' => '',
		)));

		// Add WooCommerce support
		add_theme_support('woocommerce');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');
	}

endif; // unite_setup
add_action('after_setup_theme', 'unite_setup');


if (!function_exists('unite_widgets_init')) :

	/**
	 * Register widgetized area and update sidebar with default widgets.
	 */
	function unite_widgets_init()
	{
		register_sidebar(array(
			   'name' => __('Sidebar', 'unite'),
			   'id' => 'sidebar-1',
			   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			   'after_widget' => '</aside>',
			   'before_title' => '<h3 class="widget-title">',
			   'after_title' => '</h3>',
		));
		register_sidebar(array(
			   'id' => 'home1',
			   'name' => 'Homepage Widget 1',
			   'description' => 'Used only on the homepage page template.',
			   'before_widget' => '<div id="%1$s" class="widget %2$s">',
			   'after_widget' => '</div>',
			   'before_title' => '<h3 class="widgettitle">',
			   'after_title' => '</h3>',
		));

		register_sidebar(array(
			   'id' => 'home2',
			   'name' => 'Homepage Widget 2',
			   'description' => 'Used only on the homepage page template.',
			   'before_widget' => '<div id="%1$s" class="widget %2$s">',
			   'after_widget' => '</div>',
			   'before_title' => '<h3 class="widgettitle">',
			   'after_title' => '</h3>',
		));

		register_sidebar(array(
			   'id' => 'home3',
			   'name' => 'Homepage Widget 3',
			   'description' => 'Used only on the homepage page template.',
			   'before_widget' => '<div id="%1$s" class="widget %2$s">',
			   'after_widget' => '</div>',
			   'before_title' => '<h3 class="widgettitle">',
			   'after_title' => '</h3>',
		));

		register_widget('unite_popular_posts_widget');
		register_widget('unite_social_widget');
	}

endif;
add_action('widgets_init', 'unite_widgets_init');

/**
 * Include widgets for Unite theme
 */
include(get_template_directory() . "/inc/widgets/popular-posts-widget.php");
include(get_template_directory() . "/inc/widgets/widget-social.php");

/**
 * Include Metabox for Unite theme
 */
include(get_template_directory() . "/inc/metaboxes.php");



if (!function_exists('unite_scripts')) :

	/**
	 * Enqueue scripts and styles.
	 */
	function unite_scripts()
	{

		wp_enqueue_style('unite-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css');

		wp_enqueue_style('unite-icons', get_template_directory_uri() . '/inc/css/font-awesome.min.css');

		wp_enqueue_style('unite-style', get_stylesheet_uri());

		wp_enqueue_script('unite-bootstrapjs', get_template_directory_uri() . '/inc/js/bootstrap.min.js', array('jquery'));

		wp_enqueue_script('unite-functions', get_template_directory_uri() . '/inc/js/main.min.js', array('jquery'));

		if (is_singular() && comments_open() && get_option('thread_comments'))
		{
			wp_enqueue_script('comment-reply');
		}
	}

endif;
add_action('wp_enqueue_scripts', 'unite_scripts');


if (!function_exists('unite_ie_support_header')) :

	/**
	 * Add HTML5 shiv and Respond.js for IE8 support of HTML5 elements and media queries
	 */
	function unite_ie_support_header()
	{
		echo '<!--[if lt IE 9]>' . "\n";
		echo '<script src="' . esc_url(get_template_directory_uri() . '/inc/js/html5shiv.min.js') . '"></script>' . "\n";
		echo '<script src="' . esc_url(get_template_directory_uri() . '/inc/js/respond.min.js') . '"></script>' . "\n";
		echo '<![endif]-->' . "\n";
	}

endif;
add_action('wp_head', 'unite_ie_support_header', 1);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom nav walker
 */
require get_template_directory() . '/inc/navwalker.php';

/**
 * Load social nav
 */
require get_template_directory() . '/inc/socialnav.php';

/* All Globals variables */
global $text_domain;
$text_domain = 'unite';

global $site_layout;
$site_layout = array('side-pull-left' => esc_html__('Right Sidebar', 'dazzling'), 'side-pull-right' => esc_html__('Left Sidebar', 'dazzling'), 'no-sidebar' => esc_html__('No Sidebar', 'dazzling'), 'full-width' => esc_html__('Full Width', 'dazzling'));

// Option to switch between the_excerpt and the_content
global $blog_layout;
$blog_layout = array('1' => __('Display full content for each post', 'unite'), '2' => __('Display excerpt for each post', 'unite'));

// Typography Options
global $typography_options;
$typography_options = array(
	   'sizes' => array('6px' => '6px', '10px' => '10px', '12px' => '12px', '14px' => '14px', '15px' => '15px', '16px' => '16px', '18' => '18px', '20px' => '20px', '24px' => '24px', '28px' => '28px', '32px' => '32px', '36px' => '36px', '42px' => '42px', '48px' => '48px'),
	   'faces' => array(
			 'arial' => 'Arial',
			 'verdana' => 'Verdana, Geneva',
			 'trebuchet' => 'Trebuchet',
			 'georgia' => 'Georgia',
			 'times' => 'Times New Roman',
			 'tahoma' => 'Tahoma, Geneva',
			 'Open Sans' => 'Open Sans',
			 'palatino' => 'Palatino',
			 'helvetica' => 'Helvetica',
			 'helvetica-neue' => 'Helvetica Neue,Helvetica,Arial,sans-serif'
	   ),
	   'styles' => array('normal' => 'Normal', 'bold' => 'Bold'),
	   'color' => true
);

/**
 * Helper function to return the theme option value.
 * If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * Not in a class to support backwards compatibility in themes.
 */
if (!function_exists('of_get_option')) :

	function of_get_option($name, $default = false)
	{

		$option_name = '';
		// Get option settings from database
		$options = get_option('unite');

		// Return specific option
		if (isset($options[$name]))
		{
			return $options[$name];
		}

		return $default;
	}

endif;

/* * * Register Post Type Films ** */

function register_post_type_films()
{
	$labels = array(
		   'name' => _x('Films', 'Post type general name'),
		   'singular_name' => _x('Film', 'Post type singular name'),
		   'menu_name' => _x('Films', 'Admin Menu text'),
		   'name_admin_bar' => _x('Film', 'Add New on Toolbar'),
		   'add_new' => __('Add New'),
		   'add_new_item' => __('Add New Film'),
		   'new_item' => __('New Film'),
		   'edit_item' => __('Edit Film'),
		   'view_item' => __('View Film'),
		   'all_items' => __('All Films'),
		   'search_items' => __('Search Films'),
		   'parent_item_colon' => __('Parent Film:'),
		   'not_found' => __('No films found.'),
		   'not_found_in_trash' => __('No films found in Trash.'),
		   'featured_image' => _x('Film Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3'),
		   'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3'),
		   'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3')
	);

	$args = array(
		   'labels' => $labels,
		   'public' => true,
		   'publicly_queryable' => true,
		   'show_ui' => true,
		   'show_in_menu' => true,
		   'query_var' => true,
		   'rewrite' => array('slug' => 'films'),
		   'capability_type' => 'post',
		   'has_archive' => true,
		   'hierarchical' => false,
		   'taxonomies' => array('Genre', 'Country', 'Year', 'Actors'),
		   'menu_position' => null,
		   'supports' => array('title', 'editor', 'author', 'thumbnail'),
	);

	register_post_type('films', $args);
}

add_action('init', 'register_post_type_films');

function wpdocs_register_private_taxonomy()
{
	$args = array(
		   'label' => __('Genre'),
		   'public' => true,
		   'rewrite' => false,
		   'hierarchical' => true
	);

	$country = array(
		   'label' => __('Country'),
		   'public' => true,
		   'rewrite' => false,
		   'hierarchical' => true
	);

	$year = array(
		   'label' => __('Year'),
		   'public' => true,
		   'rewrite' => false,
		   'hierarchical' => true
	);

	$actors = array(
		   'label' => __('Actors'),
		   'public' => true,
		   'rewrite' => false,
		   'hierarchical' => true
	);

	register_taxonomy('genre', 'films', $args);
	register_taxonomy('country', 'films', $country);
	register_taxonomy('year', 'films', $year);
	register_taxonomy('actors', 'films', $actors);
}

add_action('init', 'wpdocs_register_private_taxonomy');

function wpdocs_register_meta_boxes($post_type)
{
	if ($post_type == 'films')
	{
		add_meta_box('film-details', __('Additional Info'), 'wpdocs_my_display_callback', 'films');
	}
}

add_action('add_meta_boxes', 'wpdocs_register_meta_boxes');

function wpdocs_my_display_callback($post)
{
	wp_nonce_field('film_additional_info_box', 'film_additional_info_box_nonce');

	// Use get_post_meta to retrieve an existing value from the database.
	$date = get_post_meta($post->ID, '_film_release_date', true);
	$price = get_post_meta($post->ID, '_film_ticket_price', true);
	?>
	<label for="film_release_date">
	    <?php _e('Release Date'); ?>
	</label>
	<input type="date" id="film_release_date" name="film_release_date" value="<?php echo esc_attr($date); ?>" />

	<label for="film_ticket_price">
	    <?php _e('Ticket Price'); ?>
	</label>
	<input type="text" id="film_ticket_price" name="film_ticket_price" value="<?php echo esc_attr($price); ?>" />
	<?php
}

function wpdocs_save_meta_box($post_id)
{
	// Save logic goes here. Don't forget to include nonce checks!
	if (!isset($_POST['film_additional_info_box_nonce']))
	{
		return $post_id;
	}

	$nonce = $_POST['film_additional_info_box_nonce'];
	if (!wp_verify_nonce($nonce, 'film_additional_info_box'))
	{
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	{
		return $post_id;
	}

	// Check the user's permissions.
	if ('films' == $_POST['post_type'])
	{
		if (!current_user_can('edit_page', $post_id))
		{
			return $post_id;
		}
	}
	else
	{
		if (!current_user_can('edit_post', $post_id))
		{
			return $post_id;
		}
	}
	
	$date	= sanitize_text_field( $_POST['film_release_date'] );
	$price	= sanitize_text_field( $_POST['film_ticket_price'] );
 
	// Update the meta field.
	update_post_meta( $post_id, '_film_release_date', $date );
	update_post_meta( $post_id, '_film_ticket_price', $price );
}

add_action('save_post', 'wpdocs_save_meta_box');
