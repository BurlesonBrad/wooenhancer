<?php  	function migwoo_enhancer_dynamic_styles(){?>
<!-- Load dynamic styles from backend -->
<?php 
global $migwoo_enhancer;

?>

<style type="text/css">

/*=========== add to cart button*/
.single_add_to_cart_button.button {color: <?php echo $migwoo_enhancer['add-to-cart-link-text-color']['regular']?> !important;}
.single_add_to_cart_button.button:hover {color: <?php echo $migwoo_enhancer['add-to-cart-link-text-color']['hover']?> !important;}
.single_add_to_cart_button.button {background-color: <?php echo $migwoo_enhancer['add-to-cart-link-background-color']['regular']?> !important;}
.single_add_to_cart_button.button:hover {background-color: <?php echo $migwoo_enhancer['add-to-cart-link-background-color']['hover']?> !important;}

/*================= tabs button*/
.woocommerce div.product .woocommerce-tabs ul.tabs li a {color:<?php echo $migwoo_enhancer['tab-link-color']['regular']?> ;}
.woocommerce div.product .woocommerce-tabs ul.tabs li {background-color:<?php echo $migwoo_enhancer['tab-link-background-color']['regular']?> ;}

.tabs.wc-tabs li:hover a {color:<?php echo $migwoo_enhancer['tab-link-color']['hover']?> !important; background-color:<?php echo $migwoo_enhancer['tab-link-background-color']['hover']?> !important;}
.tabs.wc-tabs li:hover {background-color:<?php echo $migwoo_enhancer['tab-link-background-color']['hover']?> !important;}

.tabs.wc-tabs li.active a, .tabs.wc-tabs li.active a:hover {color:<?php echo $migwoo_enhancer['tab-link-color']['active']?> !important;}
.tabs.wc-tabs li.active, .tabs.wc-tabs li.active:hover, .tabs.wc-tabs li.active:hover a  {background-color:<?php echo $migwoo_enhancer['tab-link-background-color']['active']?> !important;}


/*================= Account Menu =====================*/
.woocommerce-MyAccount-navigation-link a {color:<?php echo $migwoo_enhancer['account-link-color']['regular']?> !important ; background-color:<?php echo $migwoo_enhancer['account-link-background-color']['regular']?> !important ;}
.woocommerce-MyAccount-navigation-link:hover a {color:<?php echo $migwoo_enhancer['account-link-color']['hover']?> !important ; background-color:<?php echo $migwoo_enhancer['account-link-background-color']['hover']?> !important ;}
.woocommerce-MyAccount-navigation-link.is_active a {color:<?php echo $migwoo_enhancer['account-link-color']['active']?> !important ; background-color:<?php echo $migwoo_enhancer['account-link-background-color']['active']?> !important ;}
.woocommerce-MyAccount-navigation-link a {padding:<?php echo $migwoo_enhancer['account-links-dimensions']['height']?> <?php echo $migwoo_enhancer['account-links-dimensions']['width']?> !important; }

<?php if($migwoo_enhancer['account-links-width'] == 'yes'):?>
.woocommerce-MyAccount-navigation-link a {display: block; width:<?php echo $migwoo_enhancer['account-links-width-size']['width']?> !important; }
<?php endif;?>


</style>


<?php } ?>