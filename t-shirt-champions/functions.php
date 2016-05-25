<?php
function t_shirt_champions_enqueue_assets() {
	wp_enqueue_style( 'tsc-core', get_template_directory_uri() . '/style.css', array('tsc-slick-css', 'tsc-foundation') );
  wp_enqueue_style( 'tsc-foundation', get_template_directory_uri() . '/css/foundation.css', array() );
	wp_enqueue_style( 'tsc-media', get_template_directory_uri() . '/css/media.css', array() );
  wp_enqueue_style( 'tsc-responsive-generic', get_template_directory_uri() . '/css/responsive-generic.css', array() );
  wp_enqueue_style( 'tsc-responsive-site', get_template_directory_uri() . '/css/responsive-site.css', array() );
  wp_enqueue_style( 'tsc-slick-css', get_template_directory_uri() . '/slick/slick.css', array() );

  wp_enqueue_script( 'tsc-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), null, true );
  wp_enqueue_script( 'tsc-script', get_template_directory_uri() . '/js/script.js', array('tsc-jquery', 'tsc-foundation-js'), null, true );
  wp_enqueue_script( 'tsc-foundation-js', get_template_directory_uri() . '/js/foundation.js', array('tsc-jquery'), null, true );
  wp_enqueue_script( 'tsc-foundation-min-js', get_template_directory_uri() . '/js/foundation.min.js', array(), null, true );
//  wp_enqueue_script( 'tsc-frontend', get_template_directory_uri() . '/js/frontend.js', array(), null, true );
  wp_enqueue_script( 'tsc-site-js', get_template_directory_uri() . '/js/site_js.js', array('tsc-jquery'), null, true );
  wp_enqueue_script( 'tsc-slick-js', get_template_directory_uri() . '/slick/slick.js', array('tsc-jquery'), null, true);
  wp_enqueue_script( 'tsc-slick-min-js', get_template_directory_uri() . '/slick/slick.min.js', array('tsc-jquery'), null, true);
//  wp_enqueue_script( 'tsc-ship-js', get_template_directory_uri() . '/js/ship.js', array(), null, true);
}


// Our custom post type function
function create_posttype() {
    register_post_type( 'tsc_product',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Products' ),
                'singular_name' => __( 'Product' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'products'),
            'menu_icon' => 'dashicons-cart',
            'supports' => array( 'title', 'editor', 'thumbnail' )
        )
    );
    register_post_type( 'tsc_garment',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Garments' ),
                'singular_name' => __( 'Garment' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'garments'),
            'menu_icon' => 'dashicons-cart',
            'supports' => array( 'title', 'thumbnail', 'page-attributes')
        )
    );
 register_post_type( 'tsc_testimonials',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'testimonials'),
            'menu_icon' => 'dashicons-admin-users',
            'supports' => array( 'title', 'editor', 'thumbnail' )
        )
    );
 register_post_type( 'tsc_team',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Team' ),
                'singular_name' => __( 'Team' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'staff'),
            'menu_icon' => 'dashicons-admin-multisite',
            'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes')
        )
    );
 register_post_type( 'tsc_champion',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Champions' ),
                'singular_name' => __( 'Champion' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'champion'),
            'menu_icon' => 'dashicons-awards',
            'supports' => array( 'title', 'editor', 'thumbnail' )
        )
    );

}

// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
add_action( 'wp_enqueue_scripts', 't_shirt_champions_enqueue_assets' );
add_action( 'init', 'create_product_tax' );

// taxonomy
function create_product_tax() {
  register_taxonomy(
    'tsc_product_category',
    'tsc_product',
    array(
      'label' => __( 'Product Category' ),
      'rewrite' => array( 'slug' => 'product-category' ),
      'hierarchical' => true,
    )
  );

  register_taxonomy(
    'tsc_garment_category',
    'tsc_garment',
    array(
      'label' => __( 'Garment Category' ),
      'rewrite' => array( 'slug' => 'garment-category' ),
      'hierarchical' => true,
    )
  );
}
add_image_size ( 'home_champion_logo', 125, 100, true );
add_image_size ( 'product_cat_thumb', 190, 190, true );
add_image_size ( 'team_thumb', 200, 200, false );
add_image_size ( 'product_thumb', 180, 180, true );
add_image_size ( 'home_champion', 550, 300, true );
add_theme_support( 'post-thumbnails' );

function add_rewrite_rules( $wp_rewrite )
{
    $new_rules = array(
        'blog/page/(.+?)/?$' => 'index.php?post_type=post&paged='. $wp_rewrite->preg_index(1),
        'blog/(.+?)/amp/?$' => 'index.php?post_type=post&amp=1&name='. $wp_rewrite->preg_index(1),
        'blog/(.+?)/?$' => 'index.php?post_type=post&name='. $wp_rewrite->preg_index(1),
    );
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'add_rewrite_rules');
function change_blog_links($post_link, $id=0){
    $post = get_post($id);
    if( is_object($post) && $post->post_type == 'post'){
        return home_url('/blog/'. $post->post_name.'/');
    }
    return $post_link;
}
add_filter('post_link', 'change_blog_links', 1, 3);

function add_markup_pages($output) {
    $output= preg_replace('/page-item/', ' first-page-item page-item', $output, 1);
    return $output;
}
add_filter('wp_list_pages', 'add_markup_pages');
?>