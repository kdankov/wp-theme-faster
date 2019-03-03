<?php
/**
 * Template Name: Page with Sidebar
 *
 * @package Faster
 */

get_header();
?>

	<main class="site-content">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'page' ); ?>

		<?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?>

	<?php endwhile; ?>

	</main>

<?php
get_sidebar();
get_footer();
