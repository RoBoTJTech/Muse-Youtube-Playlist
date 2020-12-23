<?php
/*
Plugin Name: YouTube Integration
Description: An all-in-one ligthweight Youtube intergation tool to display SEO friendly YouTube Videos and Playlists into your site. Giving you complete control of which video/s or playlist/s to show, all without ever touching your database. Even setup custom caching and refresh times along with many other features.
Version: 1.0.1
Author: RoboT J Tech
Author URI: https://robotjtech.com
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action('init', 'register_styles');
function register_styles() {
		wp_register_style( 'rbtj_yt_styles', plugins_url('resources/css/rbtj-yt-styles.css', __FILE__), array(), time() );
}

// use the registered style above
add_action('wp_enqueue_scripts', 'enqueue_style');
function enqueue_style(){
   wp_enqueue_style( 'rbtj_yt_styles' );
}
// use custom js for long descritptions
add_action('wp_enqueue_scripts', 'enqueue_script');
function enqueue_script() {
	wp_enqueue_script( 'yt-integration', plugins_url('resources/js/yt-integration.js', __FILE__) );
}


include_once 'functions.php';
$rbtj_YT = new RBTJ_YT_Plugin;
$rbtj_YT->getConfigs();
$rbtj_YT->getVideoInfo('startup');

function rbtj_YT_outputMeta(){
      global $rbtj_YT;
      echo $rbtj_YT->showMetatags();
}

remove_action( 'wp_head', 'rel_canonical' );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
add_action('wp_head','rbtj_YT_outputMeta');

add_shortcode( 'yt_setup', array( $rbtj_YT, 'getVideoInfo' ));

add_shortcode( 'show_video', array( $rbtj_YT, 'showVideo' ));

add_shortcode( 'show_description', array( $rbtj_YT, 'showDescription' ));

add_shortcode( 'show_title', array( $rbtj_YT, 'showTitle' ));

add_shortcode( 'show_playlist', array( $rbtj_YT, 'showPlaylist' ));


?>
