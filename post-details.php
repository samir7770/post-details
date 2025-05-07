<?php   

/**
 * Plugin Name: Post Details
 * Description: A simple plugin to display post details.
 * Version: 1.0
 * Author: Samir
 * Author URI: https://mashiuzzaman.com
**/

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}



class PostDetails{
    public function __construct(){
        add_filter('the_content', [$this, 'post_detail']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
    }

    public function enqueue_styles() {
        wp_enqueue_style( 
            'post-details-style', 
            plugin_dir_url( __FILE__ ) . 'inc/style.css',
            array(),
            '1.0.0',
            'all' 
        );
    }
    public function post_detail($content){
        $word_count = str_word_count( wp_strip_all_tags( $content ) );
        $min_need = ceil($word_count / 200);
        $post_id = get_the_ID();
        $cat_id = get_the_category($post_id);
        $cat_name = $cat_id[0]->name;
        
        ob_start(); 
        include plugin_dir_path( __FILE__ ) . 'template/info-box.php';
        $output = ob_get_clean(); 
        return $output . $content; 
    }
}

new PostDetails();