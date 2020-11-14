<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function( $template ) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action('init', array($this, 'register_my_menu'));
		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_post_types() {

        register_taxonomy_for_object_type('category', 'case');
        register_taxonomy_for_object_type('post_tag', 'case');
        register_post_type('case',
            array(
                'labels' => array(
                    'name' => __('Case Study', 'case'),
                    'singular_name' => __('Case Study', 'case'),
                    'add_new' => __('Add New', 'case'),
                    'add_new_item' => __('Add New Case Study', 'case'),
                    'edit' => __('Edit', 'case'),
                    'edit_item' => __('Edit Case Study', 'case'),
                    'new_item' => __('New Case Study', 'case'),
                    'view' => __('View Case Study', 'case'),
                    'view_item' => __('View Case Study', 'case'),
                    'search_items' => __('Search Case Study', 'case'),
                    'not_found' => __('No Case Studies found', 'case'),
                    'not_found_in_trash' => __('No Case Studies found in Trash', 'case'),
                ),
                'public' => true,
                'hierarchical' => true,
                'has_archive' => true,
                'supports' => array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_rest' => true,
                'menu_icon' => 'dashicons-media-document',
                'can_export' => true,
                'taxonomies' => array(
                    'post_tag',
                    'category',
                ),
                'rewrite' => array(
                    'slug' => '/',
                    'with_front' => false,
                ),
                'show_in_graphql' => true,
                'graphql_single_name' => 'CaseStudy',
                'graphql_plural_name' => 'CaseStudies',
			));
			
		register_taxonomy_for_object_type('category', 'review');
        register_taxonomy_for_object_type('post_tag', 'review');
        register_post_type('review',
            array(
                'labels' => array(
                    'name' => __('Review', 'review'),
                    'singular_name' => __('Review', 'review'),
                    'add_new' => __('Add New', 'review'),
                    'add_new_item' => __('Add New Review', 'review'),
                    'edit' => __('Edit', 'review'),
                    'edit_item' => __('Edit Review', 'review'),
                    'new_item' => __('New Review', 'review'),
                    'view' => __('View Review', 'review'),
                    'view_item' => __('View Review', 'review'),
                    'search_items' => __('Search Review', 'review'),
                    'not_found' => __('No Reviews found', 'review'),
                    'not_found_in_trash' => __('No Reviews found in Trash', 'review'),
                ),
                'public' => true,
                'hierarchical' => true,
                'has_archive' => true,
                'supports' => array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_rest' => true,
                'menu_icon' => 'dashicons-format-status',
                'can_export' => true,
                'taxonomies' => array(
                    'post_tag',
                    'category',
                ),
                'show_in_graphql' => true,
                'graphql_single_name' => 'Review',
                'graphql_plural_name' => 'Reviews',
            ));
	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	public function register_my_menu()
    {
        register_nav_menus(array(
            'primary' => 'Main Menu',
            'secondary' => 'Secondary Menu',
        ));
    }

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['foo']   = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::context();';
		$context['menu']  = new Timber\Menu();
		$context['site']  = $this;
		return $context;
	}

	public function theme_supports() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig\Extension\StringLoaderExtension() );
		$twig->addFilter( new Twig\TwigFilter( 'myfoo', array( $this, 'myfoo' ) ) );
		return $twig;
	}

}

new StarterSite();
