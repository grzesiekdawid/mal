<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php get_header(); ?>

    <?php if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) { ?>
        
        <div class="homepage-banner">
            <?php
                if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) { $banner = $woo_options['woo_homepage_banner_path']; }
                if ( $woo_options[ 'woo_homepage_banner' ] == "true" && is_ssl() ) { $banner = preg_replace("/^http:/", "https:", $woo_options['woo_homepage_banner_path']); }
            ?>
                <img src="<?php echo $banner; ?>" alt="" />
            <h1><span><?php echo $woo_options['woo_homepage_banner_headline']; ?></span></h1>
            <div class="description"><?php echo wpautop($woo_options['woo_homepage_banner_standfirst']); ?></div>
        </div>
        
    <?php } ?>
       
    <div id="content" class="col-full">
    	
    	<?php woo_main_before(); ?>
    
		<section id="main" class="col-left">
                                                                                
            <div class="page">
				
				<header>
                	<h1><?php _e( 'Error 404 - Page not found!', 'woothemes' ); ?></h1>
                </header>
                <section class="entry">
                	<p><?php _e( 'The page you trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.', 'woothemes' ); ?></p>
                </section>

            </div><!-- /.post -->
                                                
        </section><!-- /#main -->
        
        <?php woo_main_after(); ?>

        <?php get_sidebar(); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>