<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "migwoo_enhancer";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */
	if ( file_exists( dirname( __FILE__ ) . '/migredux-functions.php' ) ) {
		require_once( dirname( __FILE__ ) . '/migredux-functions.php' );
	}

    $theme = wp_get_theme(); // For use with some settings. Not necessary.
	global $wp_filter;
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => 'WooEnhancer',
        // Name that appears at the top of your panel
        'display_version'      => '1.0',
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'WooEnhancer', 'mig_wooenhancer' ),
        'page_title'           => __( 'WooEnhancer', 'mig_wooenhancer' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );


    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.

    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/alborotadoweb/',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/alborotadoweb',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );


 
    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
	 
	 /*======================================= BASE 
	 Redux::setSection( $opt_name, array(
        'title'            => __( 'Checkout Page', 'migwoo_enhancer' ),
        'id'               => 'checkout-page',
        'desc'             => __( '', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Billing Fields', 'redux-framework-demo' ),
        'id'         => 'checkout_fields_sorter',
        'desc'       => __( '', 'redux-framework-demo' ),
        'subsection' => true,
        'fields'     => array(
			array()
		 )

    ) );
	*/

    // -> START Basic Fields
	 Redux::setSection( $opt_name, array(
        'title'            => __( 'General Options', 'redux-framework-demo' ),
        'desc'             => __( '', 'redux-framework-demo' ),
        'id'               => 'general-options-fields',
        'subsection'       => false,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'          => 'password-strength',
                'type'        => 'select',
                'title'       => __( 'Deactivate Password Strength Meter', 'redux-framework-demo' ),
                'subtitle'    => __( '', 'redux-framework-demo' ),
                'desc'        => __( '', 'redux-framework-demo' ),
                'options'	  => array(
					'enabled'	=> __('no', 'migwoo_enhancer'),
					'disabled'	=> __('Yes', 'migwoo_enhancer'),
				),
				'default' => 'enabled',
				'placeholder' => '',
            ),

        )
    ) );
	
	//======================================= PRODUCT PAGE
	 Redux::setSection( $opt_name, array(
        'title'            => __( 'Product Page', 'migwoo_enhancer' ),
        'id'               => 'product-page',
        'desc'             => __( '', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-shopping-cart'
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Colors & Text ', 'redux-framework-demo' ),
        'id'         => 'product-page-colors-and-text',
        'desc'       => __( '', 'redux-framework-demo' ),
        'subsection' => true,
        'fields'     => array(
			 array(
                'id'       => 'addtocart-section-start',
                'type'     => 'section',
                'title'    => __( 'Add to Cart Button Options', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
			
			 array(
                'id'       => 'add-to-cart-text',
                'type'     => 'text',
                'title'    => __( 'Add to cart button text', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'desc'     => __( '', 'redux-framework-demo' ),
                'default'  => __('Add to cart', 'mighoo_enhancer'),
            ),
			
			array(
                'id'       => 'add-to-cart-link-text-color',
                'type'     => 'link_color',
                'title'    => __( 'Add to cart button text color', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'desc'     => __( '', 'redux-framework-demo' ),
                'regular'   => true, // Disable Regular Color
                'hover'     => true, // Disable Hover Color
                'active'    => false, // Disable Active Color
                //'visited'   => true,  // Enable Visited Color
                
            ),
			
			array(
                'id'       => 'add-to-cart-link-background-color',
                'type'     => 'link_color',
                'title'    => __( 'Add to cart button background color', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'desc'     => __( '', 'redux-framework-demo' ),
                'regular'   => true, // Disable Regular Color
                'hover'     => true, // Disable Hover Color
                'active'    => false, // Disable Active Color
                //'visited'   => true,  // Enable Visited Color
                
            ),
			
			 array(
                'id'       => 'tabs-section-start',
                'type'     => 'section',
                'title'    => __( 'Tabs Options', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
			
			array(
                'id'       => 'tab-link-color',
                'type'     => 'link_color',
                'title'    => __( 'Tab text color', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'desc'     => __( '', 'redux-framework-demo' ),
                'regular'   => true, // Disable Regular Color
                'hover'     => true, // Disable Hover Color
                'active'    => true, // Disable Active Color
                //'visited'   => true,  // Enable Visited Color
                
            ),
			
			array(
                'id'       => 'tab-link-background-color',
                'type'     => 'link_color',
                'title'    => __( 'Tab background color', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'desc'     => __( '', 'redux-framework-demo' ),
                'regular'   => true, // Disable Regular Color
                'hover'     => true, // Disable Hover Color
                'active'    => true, // Disable Active Color
                //'visited'   => true,  // Enable Visited Color
                
            ),
			
		 )

    ) );
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Single Product Grid', 'redux-framework-demo' ),
        'id'         => 'single_product_grid',
        'desc'       => __( '', 'redux-framework-demo' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'single-product-hooks',
                'type'     => 'sorter',
				'class'		=> 'migwoo_enhancer_full_sorter',
                'title'    => 'Single Product Grid',
                'subtitle' => 'Drag and drop the fields inside the proper column',
                'compiler' => 'true',
                'options'  => array(
                    'before_summary'  => array(
						'woocommerce_show_product_sale_flash' => 'Sale Flash',
						'woocommerce_show_product_images' => 'Main Image',
					),
					
                    'summary' => array(
						'woocommerce_template_single_title' => 'Product Title',
						'woocommerce_template_single_rating' => 'Product Rating',
						'woocommerce_template_single_price' => 'Product Price',
						'woocommerce_template_single_excerpt' => 'Product Excerpt',
						'woocommerce_template_single_add_to_cart' => 'Add to cart button',
						'woocommerce_template_single_meta' => 'Product Meta',
						'woocommerce_template_single_sharing' => 'Product Sharing',
					),
					'thumbnails_area'  => array(
						'woocommerce_show_product_thumbnails' => 'Product Thumbnails',
					),
					
					'after_summary' => array(
						'woocommerce_output_product_data_tabs' => 'Tabs',
						'woocommerce_upsell_display' => 'Upsell Display',
						'woocommerce_output_related_products' => 'Related Products',
					),
					'disabled' => array(),
                ),

            ),
        )

    ) );
	
	 /*======================================= SHOP PAGE =====================*/
	 Redux::setSection( $opt_name, array(
        'title'            => __( 'Shop Page', 'migwoo_enhancer' ),
        'id'               => 'shop-page',
        'desc'             => __( '', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-th-list'
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Shop Grid', 'redux-framework-demo' ),
        'id'         => 'shop-grid',
        'desc'       => __( '', 'redux-framework-demo' ),
        'subsection' => true,
        'fields'     => array(
			array(
                'id'       => 'shop-page-hooks',
                'type'     => 'sorter',
				'class'		=> 'migwoo_enhancer_full_sorter',
                'title'    => 'Shop Page Grid',
                'subtitle' => 'Drag and drop the fields inside the proper column',
                'compiler' => 'true',
                'options'  => array(
                    'before_shop'  => array(
						'woocommerce_result_count' => 'Count',
						'woocommerce_catalog_ordering' => 'Order',
					),
                    'after_shop'  => array(
						'woocommerce_pagination' => 'Pagination'
					),
					'disabled' => array(
						'woocommerce_result_count' => 'Count',
						'woocommerce_catalog_ordering' => 'Order',
						'woocommerce_pagination' => 'Pagination'
					),
                ),

            ),
		 )

    ) );
	

	
	//================== CHECKOUT ===================
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Checkout Page', 'migwoo_enhancer' ),
        'id'               => 'checkout-page',
        'desc'             => __( '', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-check'
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Billing Fields', 'redux-framework-demo' ),
        'id'         => 'checkout_billing_fields_sorter',
		'class'		=> 'migwoo_enhancer_full_sorter',
        'desc'       => __( '', 'redux-framework-demo' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'checkout-billing-fields',
                'type'     => 'sorter',
                'title'    => 'Billing Fields',
                'subtitle' => 'Drag and drop the fields inside the proper column',
                'compiler' => 'true',
                'options'  => array(
                    'enabled'  => array(
						'billing_first_name' => 'First Name',
						'billing_last_name' => 'Last Name',
						'billing_company' => 'Company',
						'billing_address_1' => 'Address 1',
						'billing_address_2' => 'Address 2',
						'billing_city' => 'City',
						'billing_postcode' => 'Post Code',
						'billing_country' => 'Country',
						'billing_state' => 'State',
						'billing_email' => 'Email',
						'billing_phone' => 'Phone',
					),
                    'disabled' => array(),
                ),

            ),
        )

    ) );
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Shipping Fields', 'redux-framework-demo' ),
        'id'         => 'checkout_shipping_fields_sorter',
		'class'		=> 'migwoo_enhancer_full_sorter',
        'desc'       => __( '', 'redux-framework-demo' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'checkout-shipping-fields',
                'type'     => 'sorter',
                'title'    => 'Shipping Fields',
                'subtitle' => 'Drag and drop the fields inside the proper column',
                'compiler' => 'true',
                'options'  => array(
                    'enabled'  => array(
						'shipping_first_name' => 'First Name',
						'shipping_last_name' => 'Last Name',
						'shipping_company' => 'Company',
						'shipping_address_1' => 'Address One',
						'shipping_address_2' => 'Address Two',
						'shipping_city' => 'City',
						'shipping_postcode' => 'Postcode',
						'shipping_country' => 'Country',
						'shipping_state' => 'State',
					),
                    'disabled' => array(),
                ),

            ),
        )

    ) );
	
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Order Notes Fields', 'redux-framework-demo' ),
        'id'         => 'checkout_ordernotes_fields_sorter',
		'class'		=> 'migwoo_enhancer_full_sorter',
        'desc'       => __( '', 'redux-framework-demo' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'checkout-order-fields',
                'type'     => 'sorter',
                'title'    => 'Order Notes Fields',
                'subtitle' => 'Drag and drop the fields inside the proper column',
                'compiler' => 'true',
                'options'  => array(
                    'enabled'  => array(
						'order_comments' => 'Order Notes',
					),
                    'disabled' => array(),
                ),

            ),
        )

    ) );


	
	 /*======================================= Account Page ==============================*/
	 Redux::setSection( $opt_name, array(
        'title'            => __( 'Account Page', 'migwoo_enhancer' ),
        'id'               => 'account-page',
        'desc'             => __( '', 'redux-framework-demo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-torso'
    ) );
	
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'Design', 'redux-framework-demo' ),
        'id'         => 'account-page-design',
        'desc'       => __( '', 'redux-framework-demo' ),
        'subsection' => true,
        'fields'     => array(
			array(
                'id'       => 'account-link-color',
                'type'     => 'link_color',
                'title'    => __( 'menu links color', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'desc'     => __( '', 'redux-framework-demo' ),
                'regular'   => true, // Disable Regular Color
                'hover'     => true, // Disable Hover Color
                'active'    => false, // Disable Active Color
                //'visited'   => true,  // Enable Visited Color
                
            ),
			array(
                'id'       => 'account-link-background-color',
                'type'     => 'link_color',
                'title'    => __( 'menu links background color', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'desc'     => __( '', 'redux-framework-demo' ),
                'regular'   => true, // Disable Regular Color
                'hover'     => true, // Disable Hover Color
                'active'    => false, // Disable Active Color
                //'visited'   => true,  // Enable Visited Color
                
            ),
			array(
                'id'             => 'account-links-dimensions',
                'type'           => 'dimensions',
                'units'          => array( 'em', 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',  // Allow users to select any type of unit
                'title'          => __( 'Menu links padding', 'redux-framework-demo' ),
                'subtitle'       => __( '', 'redux-framework-demo' ),
                'desc'           => __( '', 'redux-framework-demo' ),
                'default'        => array(
                    'width'  => 20,
                    'height' => 10,
                )
            ),
			
			array(
                'id'             => 'account-links-width',
                'type'           => 'select',
                'title'          => __( 'Menu links fixed width', 'redux-framework-demo' ),
                'subtitle'       => __( '', 'redux-framework-demo' ),
                'desc'           => __( '', 'redux-framework-demo' ),
                'options'        => array(
                    'no'  => 'No',
                    'yes' => 'Yes',
                )
            ),
			
			array(
                'id'             => 'account-links-width-size',
                'type'           => 'dimensions',
                'units'          => array( 'em', 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',  // Allow users to select any type of unit
                'title'          => __( 'Fixed width size', 'redux-framework-demo' ),
                'subtitle'       => __( '', 'redux-framework-demo' ),
                'desc'           => __( '', 'redux-framework-demo' ),
                'height'		 => false,
				'default'        => array(
                    'width'  => 200,
                )
            ),
		 )

    ) );
	
  
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

