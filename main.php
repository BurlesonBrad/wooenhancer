<?php 
/*
* Plugin Name: WooEnhancer - Improve and customize WooCommerce
* Plugin URI: http://alborotado.com
* Description: Extends Woocommerce capabilities and lets you customize the design.
* Version: 1.01
* Author: Miguras
* Author URI: http://alborotado.com
* License: GPLv2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/
if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly
}
define("MIGWOOPATH", plugin_dir_url( __FILE__ ));
	
	function migwoo_enhancer_plugins_loaded(){
		/*======================== FUNCTIONS ==============================*/
		
		if ( file_exists( dirname( __FILE__ ) . '/inc/functions.php' ) ) {
			require_once( dirname( __FILE__ ) . '/inc/functions.php' );
		}
		
		
		
		// ========================== REDUX FRAMEWORK =========================================
		if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/admin/redux-framework/framework.php' ) ) {
			require_once( dirname( __FILE__ ) . '/admin/redux-framework/framework.php' );
		}
		if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/admin/wooenhancer-options.php' ) ) {
			require_once( dirname( __FILE__ ) . '/admin/wooenhancer-options.php' );
		}
		
		
			
	

		
		/*=========================== DYNAMIC CSS ===================*/
		if ( file_exists( dirname( __FILE__ ) . '/assets/css/dynamic-styles.php' ) ) {
			require_once( dirname( __FILE__ ) . '/assets/css/dynamic-styles.php' );
		}
		
		if(!is_admin() && function_exists('wp_register_script')){
					add_action('wp_head', 'migwoo_enhancer_dynamic_styles');
		};
		

		
	
	}
	add_action('plugins_loaded', 'migwoo_enhancer_plugins_loaded');

	
	

?>