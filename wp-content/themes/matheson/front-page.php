<?php
/**
 * The front page template.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @since 1.0.0
 */
get_header();

global $paged;
$bavotasan_theme_options = bavotasan_theme_options();

if ( 2 > $paged ) {
	// Display jumbo headline is the option is set
	if ( ! empty( $bavotasan_theme_options['jumbo_headline_title'] ) ) {
	?>
	<div class="home-top">
		<div class="container">
			<div class="home-jumbotron jumbotron row">
				<div class="col-md-6">
					<h1><?php echo apply_filters( 'the_title', html_entity_decode( $bavotasan_theme_options['jumbo_headline_title'] ) ); ?></h1>
				</div>
				<div class="col-md-6">
					<p class="lead"><?php echo wp_kses_post( html_entity_decode( $bavotasan_theme_options['jumbo_headline_text'] ) ); ?></p>
				</div>
			</div>
		</div>
	</div>
	<?php
	}
}

get_footer();