<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tyche
 */

get_header();
$breadcrumbs_enabled = get_theme_mod( 'tyche_enable_post_breadcrumbs', '1' );
if ( '1' === $breadcrumbs_enabled ) { ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php Tyche_Helper::add_breadcrumbs(); ?>
			</div>
		</div>
	</div>
<?php } ?>
<?php
$shop_page = Tyche_Helper::has_sidebar();
?>
	<div class="container">
		<div class="row">
			<div id="primary" class="content-area col-md-8 tyche-has-sidebar">
				<main id="main" class="site-main" role="main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php
			if ( $shop_page ) {
				get_sidebar( 'shop' );
			} else {
				get_sidebar();
			}
			?>
		</div>
	</div>
<?php
get_footer();
