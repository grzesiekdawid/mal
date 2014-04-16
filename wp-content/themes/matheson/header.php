<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main>
 * and the left sidebar conditional
 *
 * @since 1.0.0
 */
global $woocommerce;
?><!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<script src="<?php echo BAVOTASAN_THEME_URL; ?>/library/js/jquery.js"></script>
<script src="<?php echo BAVOTASAN_THEME_URL; ?>/library/js/qtip.js"></script>
<script src="<?php echo BAVOTASAN_THEME_URL; ?>/library/js/custom.js"></script>
<script src="<?php echo BAVOTASAN_THEME_URL;  ?>/library/js/fb.js"></script>

<!--[if IE]><script src="<?php echo BAVOTASAN_THEME_URL; ?>/library/js/html5.js"></script><![endif]-->
<?php wp_head(); ?>

<?php

global $wp;
$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );

?>

</head>
<body <?php body_class(); ?>>

	<div id="page">

		<header id="header">
			<div class="container header-meta">
			<div class="fb-like" data-href="https://www.facebook.com/monkeyandleo" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false" style="display:inline"></div>

				<?php
					if ( class_exists( 'woocommerce' ) ) {
						echo '<ul class="wc-nav">';
							woocommerce_cart_link();
							echo '<li id="checkout" class="login"><a href="'.esc_url($woocommerce->cart->get_checkout_url()).'" title="Proceed to payment">'.__('Checkout','woothemes').'</a></li>';

							if ( is_user_logged_in() ) {
								echo '<li id="edit-profile" class="login"><a href="' . home_url() . '/?page_id=7" title="Edit">Edit profile</a></li>';
								echo '<li id="log-out" class="login"><a href="' . home_url() . '/wp-login.php?action=logout&redirect_to=' . wp_logout_url($current_url) . '" title="Log out">Log out</a></li>';
							} else {
								echo '<li id="log-in" class="login"><a href="' . home_url() . '/?page_id=7" title="Log in">Log in</a></li>';
								echo '<li id="register" class="login"><a href="' . home_url() . '/?page_id=7" title="Register">Register</a></li>';
							}

						echo '</ul>';
					}
				?>
				<div id="site-meta">
					<h1 class="site-title" >
						<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php //bloginfo( 'name' ); ?>
						<img src="<?php echo esc_url( home_url() ); ?>/wp-includes/images/header.png" alt="<?php bloginfo( 'name' ); ?>" class="header_image" />
						</a>
					</h1>

					<h2 class="site-description">
						<?php bloginfo( 'description' ); ?>
					</h2>
				</div>

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		          <i class="fa fa-bars"></i>
		        </button>

				<nav id="site-navigation" class="navbar" role="navigation">
					<h3 class="sr-only"><?php _e( 'Main menu', 'matheson' ); ?></h3>
					<a class="sr-only" href="#primary" title="<?php esc_attr_e( 'Skip to content', 'matheson' ); ?>"><?php _e( 'Skip to content', 'matheson' ); ?></a>

					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'collapse navbar-collapse', 'menu_class' => 'nav nav-justified', 'fallback_cb' => 'bavotasan_default_menu', 'depth' => 2 ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</header>
		<?php
		// Header image section
		//header_images();
		if ( !is_single($post) ) {
			easingsliderlite();
		}
		?>

		<main>