<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @since 1.0.0
 */
get_header();
?>

	<div class="container">
		<div class="row">
			<div id="primary" <?php bavotasan_primary_attr(); ?>>
				<?php
				while ( have_posts() ) : the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php
								add_filter( 'the_title', function( $title ) {
									if($title=='My Account'){
										if(is_user_logged_in()) return 'Edit pofile';
										else{
											if(isset($_GET['register'])) return _e( 'Register', 'woocommerce' );
											elseif(isset($_GET['lost-password'])) return 'Lost password';
											else return _e( 'Login', 'woocommerce' );
										}
									}
									else return $title;
								});
							?>
							<h1 class="entry-title"><?php the_title(); ?></h1>


							<hr class="separator" />



						    <div class="entry-content">
							    <?php the_content( __( 'Read more', 'matheson') ); ?>
						    </div><!-- .entry-content -->

						    <?php get_template_part( 'content', 'footer' ); ?>
					</article><!-- #post-<?php the_ID(); ?> -->

					<?php
					comments_template( '', true );
				endwhile;
				?>
			</div>
			<?php // get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>