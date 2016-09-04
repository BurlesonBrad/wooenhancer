<?php 
/*=========================== DEACTIVATE CHECKOUT BILLING && SHIPPING FIELDS =================================*/

if(!function_exists('migwoo_enhancer_dequeue_checkout_fields')){
	function migwoo_enhancer_dequeue_checkout_fields($fields = NULL){
		global $migwoo_enhancer;
		
		$checkoutdisabled = array(
			'billing' => $migwoo_enhancer['checkout-billing-fields']['disabled'],
			'shipping' => $migwoo_enhancer['checkout-shipping-fields']['disabled'],
			'order'	=> $migwoo_enhancer['checkout-order-fields']['disabled']
		);
	
	
		if(isset($checkoutdisabled)){
			
			foreach($checkoutdisabled as $unset_key => $unset_value){
				foreach($unset_value as $unset_field_key => $unset_field_value){
					
					if($unset_field_value != 'placebo'){
					
						unset($fields[$unset_key][$unset_field_key]);
						
					}
				}

				
			}
		}
		
		
		
		return $fields;	
		
	}

}

add_filter( 'woocommerce_checkout_fields' , 'migwoo_enhancer_dequeue_checkout_fields' );

/*============================ Change Billing && Shipping Fields Order ==============================*/



if(!function_exists('migwoo_enhancer_order_checkout_fields')){
	
	function migwoo_enhancer_order_checkout_fields($fields = NULL){
		global $migwoo_enhancer;

		
		if(!empty($migwoo_enhancer['checkout-billing-fields']['enabled'])){
			$order = $migwoo_enhancer['checkout-billing-fields']['enabled'];
			if(isset($order)){
				foreach($order as $order_key => $order_value){
					if($order_value != 'placebo'){
						$billing_ordered_fields[$order_key] = $fields["billing"][$order_key];
					}
				}
			}
			
			$fields["billing"] = $billing_ordered_fields;
		}
		if(!empty($migwoo_enhancer['checkout-shipping-fields']['enabled'])){
			$order = $migwoo_enhancer['checkout-shipping-fields']['enabled'];
			if(isset($order)){
				foreach($order as $order_key => $order_value){
					if($order_value != 'placebo'){
						$shipping_ordered_fields[$order_key] = $fields["shipping"][$order_key];
					}
				}
			}
			
			$fields["shipping"] = $shipping_ordered_fields;
		}
		
		return $fields;	
		
		
	}
	
}
add_filter( 'woocommerce_checkout_fields' , 'migwoo_enhancer_order_checkout_fields' );


/*=================== deactivate password strength ============================*/

if(!function_exists('migwoo_enhancer_remove_password_strength')){
	function migwoo_enhancer_remove_password_strength() {
		global $migwoo_enhancer;
		$passwordstrength = $migwoo_enhancer['password-strength'];
		
		if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) && $passwordstrength == 'disabled') {
			wp_dequeue_script( 'wc-password-strength-meter' );
		}
	}
}
add_action( 'wp_print_scripts', 'migwoo_enhancer_remove_password_strength', 100 );


/*============================= add to cart button text ==========================================*/

if(!function_exists('migwoo_enhancer_custom_cart_button_text')){ 
	function migwoo_enhancer_custom_cart_button_text() {
		
	global $migwoo_enhancer;
	$addtocart = $migwoo_enhancer['add-to-cart-text']; 
			
			return __( $addtocart, 'woocommerce' );
	 
	}
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'migwoo_enhancer_custom_cart_button_text' );    // 2.1 +






/*===================== get pro functions =====================================*/
	if ( file_exists( dirname( __FILE__ ) . '/pro-functions.php' ) ) {
		require_once( dirname( __FILE__ ) . '/pro-functions.php' );
	}



/*========================== REMOVE HOOKS SINGLE PRODUCT PAGE ========================*/
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);


remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);


/*========================== REMOVE HOOKS SHOP PRODUCT PAGE ========================*/
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);



/*========================== ADD AND SORTER NEW HOOKS ==============================*/
function migwoo_enhancer_add_hooks(){
	global $migwoo_enhancer;
	
	
	$migwoo_all_hooks = array(
		'woocommerce_before_single_product_summary' => $migwoo_enhancer['single-product-hooks']['before_summary'],
		'woocommerce_product_thumbnails' => $migwoo_enhancer['single-product-hooks']['thumbnails_area'],
		'woocommerce_single_product_summary' => $migwoo_enhancer['single-product-hooks']['summary'],
		'woocommerce_after_single_product_summary' => $migwoo_enhancer['single-product-hooks']['after_summary'],
		'woocommerce_before_shop_loop' => $migwoo_enhancer['shop-page-hooks']['before_shop'],
		'woocommerce_after_shop_loop' => $migwoo_enhancer['shop-page-hooks']['after_shop'],
	);
	
	if(!empty($migwoo_all_hooks)){
		foreach($migwoo_all_hooks as $all_key => $all_value){
			foreach($all_value as $all_value_key => $all_value_value){
				
				if($all_value_key != 'placebo'){
				add_action($all_key, $all_value_key, 27);
				}
			}
			
		}
		
	}
	

	
}


add_action('init', 'migwoo_enhancer_add_hooks');


?>