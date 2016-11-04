<?php
/**
 * Template Name: Patterns
 *
 * @package _s
 */

get_header();

/**
 * Build a pattern section.
 *
 * @param  array  $args  The pattern defaults.
 * @return string        The pattern documentation.
 * @author Greg Rickaby Carrie Ford
 */
function _s_get_pattern_section( $args = array() ) {

	// Set defaults.
	$defaults = array(
		'title'        => '',       // The pattern title.
		'description'  => '',       // The pattern description.
		'usage'        => '',       // The template tag or markup needed to display the pattern.
		'parameters'   => array(),  // Does the pattern have params? Like $args?
		'arguments'    => array(),  // If the pattern has params, what are the $args?
		'output'       => '',       // Use the template tag or pattern HTML markup here. It will be sanitized displayed.
	);

	// Parse arguments.
	$args = wp_parse_args( $args, $defaults );

	// Add additional HTML tags to the wp_kses() allowed html filter.
	$allowed_tags = array_merge( wp_kses_allowed_html( 'post' ), array(
		'svg' => array(
			'aria-hidden' => true,
			'class'       => true,
			'id'          => true,
			'role'        => true,
			'title'       => true,
		),
		'use' => array(
			'xlink:href' => true,
		)
	) );

	ob_start();

	?>

	<section class="pattern-section">

		<?php if ( $args['title'] ) : ?>
		<header class="pattern-section-header">
			<h2 class="pattern-section-title"><?php esc_html_e( $args['title'] ); ?></h2>
		</header><!-- .pattern-section-header -->
		<?php endif; ?>

		<div class="pattern-section-content">

			<div class="pattern-section-live">

			<?php if ( $args['output'] ) : ?>
				<?php echo wp_kses( $args['output'], $allowed_tags ); ?>
			<?php endif; ?>

			</div><!-- .pattern-section-live -->

			<div class="pattern-section-details">

			<?php if ( $args['description'] ) : ?>
				<p><strong><?php esc_html_e( 'Description', '_s' ); ?>:</strong></p>
				<p class="pattern-section-description"><?php echo esc_html( $args['description'] ); ?></p>
			<?php endif; ?>

			<?php if ( $args['parameters'] ) : ?>
				<p><strong><?php esc_html_e( 'Parameters', '_s' ); ?>:</strong></p>
				<?php foreach ( $args['parameters'] as $key => $value ) : ?>
					<p><code><?php echo esc_html( $key ); ?></code> <?php echo esc_html( $value ); ?></p>
				<?php endforeach; ?>
			<?php endif; ?>

			<?php if ( $args['arguments'] ) : ?>
				<p><strong><?php esc_html_e( 'Arguments', '_s' ); ?>:</strong></p>
				<?php foreach ( $args['arguments'] as $key => $value ) : ?>
					<p><code><?php echo esc_html( $key ); ?></code> <?php echo esc_html( $value ); ?></p>
				<?php endforeach; ?>
			<?php endif; ?>

			</div><!-- .pattern-section-details -->

			<div class="pattern-section-usage">

			<?php if ( $args['usage'] ) : ?>
				<p><strong><?php esc_html_e( 'Usage', '_s' ); ?>:</strong></p>
				<pre><?php esc_html_e( $args['usage'] ); ?></pre>
			<?php endif; ?>

			<?php if ( $args['output'] ) : ?>
				<p><strong><?php esc_html_e( 'HTML Output', '_s' ); ?>:</strong></p>
				<pre><?php echo esc_html( $args['output'] ); ?></pre>
			<?php endif; ?>

			</div><!-- .pattern-section-usage -->
		</div><!-- .pattern-section-content -->
	</section><!-- .pattern-section -->
	<?php
	return ob_get_clean();
}

?>

	<div class="wrap">
		<div class="primary content-area">
			<main id="main" class="site-main" role="main">

				<section class="pattern-section">
					<header class="pattern-section-header">
						<h2 class="pattern-section-title"><?php esc_html_e( 'Colors', '_s' ); ?></h2>
					</header><!-- .pattern-section-header -->

					<div class="pattern-section-content">
						<div class="swatch-container">
						<?php

						// The list of theme colors.
						$colors = array(
							'Blue'         => '#21759b',
							'Light Yellow' => '#fff9c0',
							'Black'        => '#000000',
							'White'        => '#FFFFFF',
						);

						// Loop through and build swatches.
						foreach ( $colors as $name => $hex ) : ?>

							<div class="swatch" style="background-color: <?php echo esc_attr( $hex ); ?>;">
								<header><?php echo esc_html( $name ); ?></header>
								<footer>$color-<?php echo str_replace( ' ', '-', strtolower( $name ) ); ?></footer>
							</div><!-- .swatch -->

						<?php endforeach; ?>
						</div><!-- .swatch-container -->
					</div><!-- .pattern-section-content -->
				</section><!-- .pattern-section -->

				<?php
					/**
					 * Possible patterns baked in with wd_s...
					 *
					 * Colors
					 * Buttons
					 * Input
					 * Dropdown
					 * Fonts
					 * Search Form
					 * Hero
					 * Cards
					 * Modal
					 * Imitate a Gravity Form??
					 * SVG Icon
					 */

					/**
					 * H1.
					 */
					echo _s_get_pattern_section( array(
						'title'        => 'H1',
						'description'  => 'Display an H1',
						'usage'        => '<h1>This is a headline</h1> or <div class="h1">This is a headline</div>',
						'output'       => '<h1>This is a headline one</h1>',
					) );

					/**
					 * H2.
					 */
					echo _s_get_pattern_section( array(
						'title'        => 'H2',
						'description'  => 'Display an H2',
						'usage'        => '<h2>This is a headline</h2> or <div class="h2">This is a headline</div>',
						'output'       => '<h2>This is a headline two</h2>',
					) );

					/**
					 * H3.
					 */
					echo _s_get_pattern_section( array(
						'title'        => 'H3',
						'description'  => 'Display an H3',
						'usage'        => '<h3>This is a headline</h3> or <div class="h3">This is a headline</div>',
						'output'       => '<h3>This is a headline three</h3>',
					) );

					/**
					 * H4.
					 */
					echo _s_get_pattern_section( array(
						'title'        => 'H4',
						'description'  => 'Display an H4',
						'usage'        => '<h4>This is a headline</h4> or <div class="h4">This is a headline</div>',
						'output'       => '<h4>This is a headline four</h4>',
					) );

					/**
					 * H5.
					 */
					echo _s_get_pattern_section( array(
						'title'        => 'H5',
						'description'  => 'Display an H5',
						'usage'        => '<h5>This is a headline</h5> or <div class="h5">This is a headline</div>',
						'output'       => '<h5>This is a headline five</h5>',
					) );

					/**
					 * H6.
					 */
					echo _s_get_pattern_section( array(
						'title'        => 'H6',
						'description'  => 'Display an H6',
						'usage'        => '<h6>This is a headline</h6> or <div class="h6">This is a headline</div>',
						'output'       => '<h6>This is a headline six</h6>',
					) );

					/**
					 * SVGs.
					 */
					echo _s_get_pattern_section( array(
						'title'        => 'SVG',
						'description'  => 'Display inline SVGs.',
						'usage'        => '<?php _s_get_svg( array( \'icon\' => \'facebook-square\' ) ); ?>',
						'parameters'   => array(
							'$args' => '(required) Configuration arguments.',
						),
						'arguments'    => array(
							'icon'  => '(required) The SVG icon file name. Default none',
							'title' => '(optional) The title of the icon. Default: none',
							'desc'  => '(optional) The description of the icon. Default: none',
						),
						'output'       => _s_get_svg( array( 'icon' => 'facebook-square' ) ),
					) );

					/**
					 * Button.
					 */
					echo _s_get_pattern_section( array(
						'title'        => 'Button',
						'description'  => 'Display a button.',
						'usage'        => '<button class="button" href="#">Click Me</button>',
						'output'       => '<button class="button">Click Me</button>',
					) );

					/**
					 * Search Form.
					 */
					echo _s_get_pattern_section( array(
						'title'        => 'Search Form',
						'description'  => 'Display the search form.',
						'usage'        => '<?php get_search_form(); ?>',
						'output'       => get_search_form(),
					) );

					?>

			</main><!-- #main -->
		</div><!-- .primary -->
	</div><!-- .wrap -->

<?php get_footer(); ?>
